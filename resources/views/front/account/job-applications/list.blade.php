@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('account.profile') }}">Home</a></li>
                            <li class="breadcrumb-item active">Job Applications</li>
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
                    <div class="card border-0 shadow mb-4">
                        <div class="card-body card-form">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <h3 class="fs-4 mb-1">Job Applications</h3>
                                </div>
                                <div>
                                    <a style=" padding: 11px; font-size: 15px;" href="#" class="badge bg-success" id="scan-resumes">Scan resumes</a>
                                </div>
                            </div>

                            <!-- Popup Modal Structure -->
                            <div id="resumePopup" style="display: none;">
                                <div class="popup-content">
                                    <div class="text-center">
                                        <p>Analyzing your resume...</p>
                                        <div class="loader3">
                                            <span></span>
                                            <span></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="table-responsive">
                                <table class="table ">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Candidate</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">CV</th>
                                            <th scope="col">Applied Date</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($applications->isNotEmpty())
                                            @foreach ($applications as $application)
                                                <tr>
                                                    <td>
                                                        <p>{{ $application->job->title }}</p>
                                                    </td>
                                                    <td>{{ $application->user->name }}</td>
                                                    <td>{{ $application->user->mobile }}</td>
                                                    <td>
                                                        @if ($application->cv_path)
                                                            <a href="{{ asset('storage/' . $application->cv_path) }}"
                                                                target="_blank" class="badge bg-success">View CV</a>
                                                        @else
                                                            <span class="badge bg-danger">No CV</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ \Carbon\Carbon::parse($application->applied_date)->format('d M, Y') }}
                                                    </td>
                                                    <td>
                                                        <div class="action-dots">
                                                            <button href="#" class="btn" data-bs-toggle="dropdown"
                                                                aria-expanded="false">
                                                                <i class="fa fa-ellipsis-v" aria-hidden="true"></i>
                                                            </button>
                                                            <ul class="dropdown-menu dropdown-menu-end">
                                                                <li>
                                                                    <a class="dropdown-item"
                                                                        onclick="deletejobApplications({{ $application->id }})"
                                                                        href="#">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                        Delete
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="pagination">
                                {{ $applications->links() }}
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
        $(document).ready(function() {
            $('#scan-resumes').click(function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Show the popup
                $('#resumePopup').show();

                // Trigger AJAX request to scan resumes
                $.ajax({
                    url: '{{ route('account.jobApplications.scanResumes') }}',
                    type: 'get',
                    success: function(response) {
                        // Update the relevant part of the page
                        $('.col-lg-9').html($(response).find('.col-lg-9').html());

                        // Hide the popup after successful scan
                        $('#resumePopup').hide();
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                        alert('An error occurred while scanning resumes. Please try again.');

                        // Hide the popup in case of error
                        $('#resumePopup').hide();
                    }
                });
            });

            window.deletejobApplications = function(id) {
                if (confirm('Are you sure you want to delete this Job Application?')) {
                    $.ajax({
                        url: '{{ route('account.jobApplications.destroy') }}',
                        type: 'DELETE',
                        data: {
                            _token: '{{ csrf_token() }}',
                            id: id
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status) {
                                window.location.href = '{{ route('account.jobApplications') }}';
                            } else {
                                alert('Failed to delete the job application.');
                            }
                        },
                        error: function() {
                            alert('An error occurred. Please try again.');
                        }
                    });
                }
            }
        });
    </script>
@endsection
