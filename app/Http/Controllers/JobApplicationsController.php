<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Smalot\PdfParser\Parser;

class JobApplicationsController extends Controller
{
    public function index()
    {
        $employerId = Auth::id();

        // Get all job applications for the logged-in employer
        $applications = JobApplication::where('employer_id', $employerId)
            ->orderBy('created_at', 'DESC')
            ->with('job', 'user', 'employer')
            ->paginate(10);

        return view('front.account.job-applications.list', [
            'applications' => $applications
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;

        $job = JobApplication::find($id);
        if ($job == null) {
            session()->flash('error', 'Either Job Application deleted or not found.');
            return response()->json([
                'status' => false,
            ]);
        }
        $job->delete();
        session()->flash('success', 'Job Application deleted successfully.');
        return response()->json([
            'status' => true,
        ]);
    }

    public function scanResumes()
    {
        try {
            $employerId = Auth::id();

            // Get all job applications for the logged-in employer
            $applications = JobApplication::where('employer_id', $employerId)
                ->with('job', 'user', 'employer')
                ->get();

            // Scan resumes and find the top 4 matches
            $topApplications = collect($this->analyzeResumes($applications))
                ->sortByDesc('matchScore')
                ->take(4); // Top 4 matches

            // Return a view with the top applications
            return view('front.account.job-applications.scan-results', [
                'topApplications' => $topApplications,
                'applications' => $applications // Pass the paginated result for links
            ]);
        } catch (\Exception $e) {
            // Log the exact error message for debugging
            Log::error('Error scanning resumes: ' . $e->getMessage());

            // Optionally, log the stack trace
            Log::error($e->getTraceAsString());

            // Return a more detailed error response for debugging purposes
            return response()->json(['error' => 'An error occurred while scanning resumes. Please try again. Error: ' . $e->getMessage()], 500);
        }
    }

    private function analyzeResumes($applications)
    {
        foreach ($applications as $application) {
            // Check if the application object is not null
            if ($application) {
                if ($application->cv_path) {
                    $cvText = $this->getCVText(storage_path('app/public/' . $application->cv_path));

                    if ($cvText) {
                        $job = $application->job;

                        // Combine job description, qualifications, responsibilities, and keywords
                        $jobText = strtolower($job->description . ' ' . $job->qualifications . ' ' . $job->responsibility . ' ' . $job->keywords);

                        // Calculate match score based on CV text matching job details
                        $application->matchScore = $this->calculateMatchScore($cvText, $jobText);
                    } else {
                        $application->matchScore = 0;
                    }
                } else {
                    $application->matchScore = 0;
                }
            } else {
                // Log the null application for debugging
                Log::error('Null JobApplication encountered.');
            }
        }

        return $applications;
    }

    private function getCVText($filePath)
    {
        if (!file_exists($filePath)) {
            return null;
        }

        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        if ($extension === 'txt') {
            return file_get_contents($filePath);
        } elseif ($extension === 'pdf') {
            // Use Smalot\PdfParser to extract text from PDF
            try {
                $parser = new Parser();
                $pdf = $parser->parseFile($filePath);
                return $pdf->getText();
            } catch (\Exception $e) {
                // Log the exact error for debugging
                Log::error('Error extracting text from PDF: ' . $e->getMessage());
                return null;
            }
        }

        return null;
    }

    private function calculateMatchScore($cvText, $jobText)
    {
        $cvText = strtolower($cvText);
        $score = 0;

        // Keywords matching
        $keywords = explode(' ', $jobText);
        foreach ($keywords as $keyword) {
            if (strpos($cvText, strtolower($keyword)) !== false) {
                $score++;
            }
        }

        // Experience matching
        if (strpos($cvText, 'work experience') !== false) {
            $score += 2;
        }

        // Project matching
        if (strpos($cvText, 'projects') !== false) {
            $score += 2;
        }

        return $score;
    }
}
