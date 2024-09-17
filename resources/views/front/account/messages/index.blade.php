@extends('front.layouts.app')

@section('main')
<h1>Messages</h1>

<div class="messages">
    @foreach($messages as $message)
    <div class="message">
        <p><strong>{{ $message->sender->name }}:</strong> {{ $message->message }}</p>
        <p><small>{{ $message->created_at }}</small></p>
    </div>
    @endforeach
</div>

<form action="{{ route('messages.store', $jobApplication->id) }}" method="POST">
    @csrf
    <div class="form-group">
        <label for="message">Message</label>
        <textarea name="message" id="message" class="form-control" required></textarea>
    </div>
    <input type="hidden" name="receiver_id" value="{{ Auth::user()->role === 'employer' ? $jobApplication->user_id : $jobApplication->job->user_id }}">
    <button type="submit" class="btn btn-primary">Send</button>
</form>
@endsection
