<?php

namespace App\Http\Controllers;

use App\Mail\JobNotificationEmail;
use App\Models\Category;
use App\Models\Job;
use App\Models\JobApplication;
use App\Models\JobType;
use App\Models\SavedJob;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobsController extends Controller
{
    //This method will show Jobs Page
    public function index(Request $request)
        {
        $categories = Category::where('status', 1)->get();
        $jobTypes = JobType::where('status', 1)->get();

        $jobs = Job::where('status', 1);

        // Search Using Keyword
        if (!empty($request->keyword)) {
            $jobs = $jobs->where(function ($query) use ($request) {
                $query->orWhere('title', 'LIKE', '%' . $request->keyword . '%');
                $query->orWhere('keywords', 'LIKE', '%' . $request->keyword . '%');
            });
        }
        // Search Using Location 
        if (!empty($request->location)) {
            $jobs = $jobs->where('location', $request->location);
        }
        // Search Using Category
        if (!empty($request->category)) {
            $jobs = $jobs->where('category_id', $request->category);
        }

        $jobTypeArray = [];
        // Search Using job_type
        if (!empty($request->jobType)) {
            ///1 2 3 
            $jobTypeArray = explode(',', $request->jobType);
            $jobs = $jobs->whereIn('job_type_id', $jobTypeArray);
        }

        // Search Using Experience
        if (!empty($request->experience)) {
            $jobs = $jobs->where('experience', $request->experience);
        }

        $jobs = $jobs->with(['jobType', 'category']);

        if ($request->sort == '0') {
            $jobs = $jobs->orderBy('created_at', 'ASC');
        } else {
            $jobs = $jobs->orderBy('created_at', 'DESC');
        }


        $jobs = $jobs->paginate(9);

        return view('front.jobs', [
            'categories' => $categories,
            'jobTypes' => $jobTypes,
            'jobs' => $jobs,
            'jobTypeArray' => $jobTypeArray
        ]);
    }
    // this method will show a detail page
    public function detail($id)
    {

        $job = Job::where(['id' => $id, 'status' => 1])
            ->with(['jobType', 'category'])
            ->first();

        if ($job == null) {
            abort(404);
        }
        $count = 0;
        if (Auth::user()) {
            $count = SavedJob::where([
                'user_id' => Auth::user()->id,
                'job_id' => $id,
            ])->count();
        }
        // check if user already save the job
        // Fetch applications
        $applications = JobApplication::where('job_id', $id)->with('user')->get();

        return view("front.jobDetail", [
            'job' => $job,
            'count' => $count,
            'applications' => $applications,
        ]);
    }
    // this method will show a detail page
    public function applyJob(Request $request)
    {
        $request->validate([
            'job_id' => 'required|exists:jobs,id',
            'attachments.*' => 'required|mimes:doc,docx,pdf|max:2048',
            'message' => 'required|string'
        ]);

        $id = $request->job_id;
        $job = Job::find($id);

        if ($job == null) {
            session()->flash('error', 'Job does not exist');
            return response()->json([
                'status' => false,
                'message' => 'Job does not exist',
            ]);
        }

        if ($job->user_id == Auth::id()) {
            session()->flash('error', 'You cannot apply to your own job');
            return response()->json([
                'status' => false,
                'message' => 'You cannot apply to your own job',
            ]);
        }

        $jobApplicationCount = JobApplication::where([
            'user_id' => Auth::id(),
            'job_id' => $id,
        ])->count();

        if ($jobApplicationCount > 0) {
            session()->flash('error', 'You have already applied for this job');
            return response()->json([
                'status' => false,
                'message' => 'You have already applied for this job',
            ]);
        }

        $application = new JobApplication();
        $application->job_id = $id;
        $application->user_id = Auth::id();
        $application->employer_id = $job->user_id;
        $application->applied_date = now();

        if ($request->hasFile('attachments')) {
            $file = $request->file('attachments')[0];
            $filePath = $file->store('cv_uploads', 'public');
            $application->cv_path = $filePath;
        }

        $application->message = $request->message;
        $application->save();

        $employer = User::find($job->user_id);
        if ($employer && $employer->email) {
            $mailData = [
                'employer' => $employer,
                'user' => Auth::user(),
                'job' => $job
            ];
            Mail::to($employer->email)->send(new JobNotificationEmail($mailData));
        }

        session()->flash('success', 'You have successfully applied');
        return response()->json([
            'status' => true,
            'message' => 'You have successfully applied',
        ]);
    }


    // this method will save a job  in DB 
    public function saveJob(Request $request)
    {
        $id = $request->id;

        $job =  Job::find($id);
        if ($job == null) {
            session()->flash('error', 'Job does not exist');
            return response()->json([
                'status' => false,
            ]);
        }

        // check if user already save the job
        $count = SavedJob::where([
            'user_id' => Auth::user()->id,
            'job_id' => $id,
        ])->count();

        if ($count > 0) {
            session()->flash('error', 'You already save this Job');
            return response()->json([
                'status' => false,
            ]);
        }

        $savedJob = new SavedJob();
        $savedJob->user_id = Auth::user()->id;
        $savedJob->job_id = $id;
        $savedJob->save();

        session()->flash('success', 'You have successfully saved the Job. ');
        return response()->json([
            'status' => true,
        ]);
    }
}
