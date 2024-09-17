<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\JobApplication;
use Illuminate\Http\Request;

class JobApplicationController extends Controller
{
    //
    public function index(){
        // Get all job applications
        $applications = JobApplication::orderBy('created_at' , 'DESC')
        ->with('job','user' , 'employer')
        ->paginate(10);
        return view('admin.job-applications.list' , [
            'applications' => $applications
        ]);
    }
    public function destroy(Request $request){
        $id = $request->id;

        $job = JobApplication::find($id);
        if($job == null){
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
}
