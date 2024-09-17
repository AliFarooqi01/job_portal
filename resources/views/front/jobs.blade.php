@php
$jobTypeClasses = [
    1 => 'full_time',
    2 => 'part_time',
    3 => 'freelance',
    4 => 'remote',
    5 => 'contract'
];
@endphp
@extends('front.layouts.app')

@section('main')
    <section class="section-3 py-5 bg-2 ">
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-10 ">
                    <h2>Find Jobs</h2>
                </div>
                <div class="col-6 col-md-2">
                    <div class="align-end">
                        <select name="sort" id="sort" class="form-control">
                            <option value="1" {{ Request::get('sort') == '1' ? 'selected' : '' }}>Latest</option>
                            <option value="0" {{ Request::get('sort') == '0' ? 'selected' : '' }}>Oldest</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row pt-5">

                <div class="col-md-4 col-lg-3 sidebar mb-4">
                    <form id="searchForm" action="" name="searchForm" method="GET">
                        <div class="card border-0 shadow p-4">
                            <div class="mb-4">
                                <h2>Keywords</h2>
                                <input value="{{ Request::get('keyword') }}" type="text" name="keyword" id="keyword"
                                    placeholder="Keywords" class="form-control">
                            </div>

                            <div class="mb-4">
                                <h2>Location</h2>
                                <input value="{{ Request::get('location') }}" type="text" name="location" id="location"
                                    placeholder="Location" class="form-control">
                            </div>

                            <div class="mb-4">
                                <h2>Category</h2>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select a Category</option>
                                    @if ($categories->isNotEmpty())
                                        @foreach ($categories as $category)
                                            <option {{ Request::get('category') == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>

                            <div class="mb-4">
                                <h2>Job Type</h2>
                                @if ($jobTypes->isNotEmpty())
                                    @foreach ($jobTypes as $jobType)
                                        <div class="form-check mb-2">
                                            <input {{ in_array($jobType->id, $jobTypeArray) ? 'checked' : '' }}
                                                class="form-check-input" name="job_type[]" type="checkbox"
                                                value="{{ $jobType->id }}" id="job-type-{{ $jobType->id }}">
                                            <label class="form-check-label"
                                                for="job-type-{{ $jobType->id }}">{{ $jobType->name }}</label>
                                        </div>
                                    @endforeach
                                @endif
                            </div>

                            <div class="mb-4">
                                <h2>Experience</h2>
                                <select name="experience" id="experience" class="form-control">
                                    <option value="">Select Experience</option>
                                    <option value="fresh" {{ Request::get('experience') == 'fresh' ? 'selected' : '' }}>
                                        Fresh</option>
                                    <option value="1" {{ Request::get('experience') == 1 ? 'selected' : '' }}>1
                                        Year
                                    </option>
                                    <option value="2" {{ Request::get('experience') == 2 ? 'selected' : '' }}>2
                                        Years</option>
                                    <option value="3" {{ Request::get('experience') == 3 ? 'selected' : '' }}>3
                                        Years</option>
                                    <option value="4" {{ Request::get('experience') == 4 ? 'selected' : '' }}>4
                                        Years</option>
                                    <option value="5" {{ Request::get('experience') == 5 ? 'selected' : '' }}>5
                                        Years</option>
                                    <option value="6" {{ Request::get('experience') == 6 ? 'selected' : '' }}>6
                                        Years</option>
                                    <option value="7" {{ Request::get('experience') == 7 ? 'selected' : '' }}>7
                                        Years</option>
                                    <option value="8" {{ Request::get('experience') == 8 ? 'selected' : '' }}>8
                                        Years</option>
                                    <option value="9" {{ Request::get('experience') == 9 ? 'selected' : '' }}>9
                                        Years</option>
                                    <option value="10" {{ Request::get('experience') == 10 ? 'selected' : '' }}>10
                                        Years</option>
                                    <option value="10_plus"
                                        {{ Request::get('experience') == '10_plus' ? 'selected' : '' }}>10+ Years
                                    </option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary">Search</button>
                            <a href="{{ route('jobs') }}" class="btn btn-primary mt-3">Reset</a>

                        </div>
                    </form>
                </div>
                <div class="col-md-8 col-lg-9 ">
                    <div class="job_listing_area">
                        <div class="job_lists">
                            <div class="row">
                                @if ($jobs->isNotEmpty())
                                    @foreach ($jobs as $job)
                                    <div class=" col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img alt="item brand" loading="lazy"
                                                        width="50" height="49" decoding="async" data-nimg="1" src="{{ asset('assets/images/logo.webp') }}"
                                                        style="color: transparent;"></span>
                                                <h4><a href="{{ route('jobDetail', $job->id) }}">{{ $job->title }}</a>
                                                </h4>
                                                <ul class="job-info">
                                                    <li><span class="icon fa fa-map-marker"></span>{{ $job->location }}</li>
                                                    <li><span class="icon fa fa-clock-o"></span> {{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</li>
                                                    @if (!is_null($job->salary))
                                                        <li><span class="icon fa fa-money"></span>
                                                            {{ $job->salary }} </li>
                                                   @endif
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="{{ $jobTypeClasses[$job->jobType->id] ?? 'default_class' }}">
                                                        {{ $job->jobType->name }}
                                                    </li>
                                                    
                                                </ul>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <div class="col-md-12 text-center">
                                        {{ $jobs->withQueryString()->links() }}
                                    </div>
                                @else
                                    <div class="col-md-12 text-center">No jobs found</div>
                                @endif


                            </div>
                        </div>
                    </div>
                </div>

            </div>
           
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            $('#searchForm').on('submit', function(e) {
                e.preventDefault();

                var url = '{{ route('jobs') }}';
                var params = [];

                var keyword = $('#keyword').val();
                if (keyword) {
                    params.push('keyword=' + encodeURIComponent(keyword));
                }

                var location = $('#location').val();
                if (location) {
                    params.push('location=' + encodeURIComponent(location));
                }

                var category = $('#category').val();
                if (category) {
                    params.push('category=' + encodeURIComponent(category));
                }

                var experience = $('#experience').val();
                if (experience) {
                    params.push('experience=' + encodeURIComponent(experience));
                }

                var checkedJobTypes = Array.from(document.querySelectorAll(
                    "input[name='job_type[]']:checked")).map(function(checkbox) {
                    return checkbox.value;
                }).join(',');
                if (checkedJobTypes) {
                    params.push('jobType=' + encodeURIComponent(checkedJobTypes));
                }
                var sort = $('#sort').val();
                if (sort) {
                    params.push('sort=' + encodeURIComponent(sort));
                }
                if (params.length > 0) {
                    url += '?' + params.join('&');
                }
                window.location.href = url;
            });

            $('#sort').change(function(e) {
                $("#searchForm").submit();
            })
        });
    </script>
@endsection
