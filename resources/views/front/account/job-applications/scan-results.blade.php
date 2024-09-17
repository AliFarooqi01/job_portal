@extends('front.layouts.app')

@section('main')
    <section class="section-5 bg-2">
        <div class="container py-5">
            <div class="row">
                <div class="col">
                    <nav aria-label="breadcrumb" class="rounded-3 p-3 mb-4">
                        <ol class="breadcrumb mb-0">
                            <li class="breadcrumb-item"><a href="{{ route('account.profile') }}">Home</a></li>
                            <li class="breadcrumb-item active">Top Job Applications</li>
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
                            <h3 class="fs-4 mb-1">Top Job Applications</h3>
                            <div class="table-responsive">
                                <table class="table">
                                    <thead class="bg-light">
                                        <tr>
                                            <th scope="col">Job Title</th>
                                            <th scope="col">Candidate</th>
                                            <th scope="col">Contact</th>
                                            <th scope="col">CV</th>
                                            <th scope="col">Applied Date</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border-0">
                                        @if ($topApplications->isNotEmpty())
                                            @foreach ($topApplications as $application)
                                                <tr>
                                                    <td>{{ $application->job->title }}</td>
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
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center">No applications found.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
