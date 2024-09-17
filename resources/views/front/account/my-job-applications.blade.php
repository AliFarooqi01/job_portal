@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                        <li class="breadcrumb-item active">Account Settings</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">Jobs Applied</h3>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Applied Date</th>
                                        <th scope="col">Applicants</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($JobApplications->isNotEmpty())
                                    @foreach ($JobApplications as $JobApplication)
                                    <tr class="{{ $JobApplication->status == 'active' ? 'active' : 'pending' }}">
                                        <td>
                                            <div class="job-name fw-500">{{ $JobApplication->job->title }}</div>
                                            <div class="info1">{{ $JobApplication->job->jobType->name }} . {{ $JobApplication->job->location }}</div>
                                        </td>
                                        <td>{{ \Carbon\Carbon::parse($JobApplication->applied_date)->format('d M, Y') }}</td>
                                        <td>{{ $JobApplication->job->applications->count() }} Applications</td>
                                        <td>
                                            @if ($JobApplication->job->status == 1)
                                            <div class="job-status text-capitalize">Active</div>
                                            @else
                                            <div class="job-status text-capitalize">Blocked</div>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="action-dots float-end">
                                                <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                </button>
                                                <ul class="dropdown-menu dropdown-menu-end">
                                                    <li>
                                                        <a class="dropdown-item" href="{{ route('jobDetail', $JobApplication->job_id) }}">
                                                            <i class="fa fa-eye" aria-hidden="true"></i> View
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a class="dropdown-item" href="#" onclick="removeJob({{ $JobApplication->id }})">
                                                            <i class="fa fa-trash" aria-hidden="true"></i> Remove
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="{{ route('messages.index', $JobApplication->id) }}" class="dropdown-item">
                                                            <i class="fa fa-envelope" aria-hidden="true"></i> Message Employer
                                                        </a>
                                                    </li>
                                                    
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr class="text-center">
                                        <td colspan="5" class="text-center">No job applications found.</td>
                                    </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="pagination">
                            {{ $JobApplications->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
<script type="text/javascript">
    function removeJob(id) {
        if (confirm('Are you sure you want to remove this job?')) {
            $.ajax({
                url: "{{ route('account.removeJobs') }}",
                type: 'POST',
                data: {
                    id: id,
                    _token: '{{ csrf_token() }}'
                },
                dataType: 'json',
                success: function(response) {
                    window.location.href = "{{ route('account.myJobApplications') }}";
                },
                error: function(xhr, status, error) {
                    alert('An error occurred: ' + error);
                }
            });
        }
    }
</script>
@endsection