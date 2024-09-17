<?php

namespace App\Http\Controllers;

use App\Models\JobApplication;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index($jobApplicationId)
    {
        $jobApplication = JobApplication::findOrFail($jobApplicationId);

        if (Auth::id() !== $jobApplication->user_id && Auth::id() !== $jobApplication->job->user_id) {
            abort(403, 'Unauthorized action.');
        }

        $messages = Message::where('job_application_id', $jobApplicationId)
            ->orderBy('created_at', 'asc')
            ->get();

        return view('front.account.messages.index', compact('jobApplication', 'messages'));
    }



    public function store(Request $request, $jobApplicationId)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        $jobApplication = JobApplication::findOrFail($jobApplicationId);
        $sender = Auth::user();

        $receiverId = ($sender->role === 'employer') ? $jobApplication->user_id : $jobApplication->job->user_id;

        Message::create([
            'job_application_id' => $jobApplication->id,
            'sender_id' => $sender->id,
            'receiver_id' => $receiverId,
            'message' => $request->message,
        ]);

        return redirect()->route('messages.index', $jobApplicationId)->with('success', 'Message sent successfully.');
    }
}
