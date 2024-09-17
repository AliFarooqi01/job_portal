@php
$categoryIcons = [
    'Accountant' => 'fas fa-calculator',
    'Engineering' => 'fas fa-cogs',
    'Fashion designing' => 'fas fa-tshirt',
    'Information Technology' => 'fas fa-laptop-code',
    'Web Developer' => 'fas fa-code'
];
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
    <section class="section-0 lazy d-flex bg-image-style dark align-items-center " class=""
        data-bg="{{ asset('assets/images/banner5.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-12 col-xl-8">
                    <h1>Find your dream job</h1>
                    <p>Thounsands of jobs available.</p>
                    <div class="banner-btn mt-5"><a href="#" class="btn btn-primary mb-4 mb-sm-0">Explore Now</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-1 py-5 ">
        <div class="container">
            <div class="card border-0 shadow p-5">
                <form action="{{ route('jobs') }}" method="get">
                    <div class="row">
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <input type="text" class="form-control" name="location" id="location"
                                placeholder="Location">
                        </div>
                        <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
                            <select name="category" id="category" class="form-control">
                                <option value="">Select a Category</option>
                                @if ($newCategories->isNotEmpty())
                                    @foreach ($newCategories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>

                        <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block">Search</button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <section class="section-2  py-5">
        <div class="container">
            <h2>Popular Categories</h2>
            <div class="row pt-5">
                @if ($categories->isNotEmpty())
                @foreach ($categories as $category)
                    <div class="col-lg-4 col-xl-4 col-md-6">
                        <div class="single_catagory">
                            <span class="icon">
                                <i class="{{ $categoryIcons[$category->name] ?? 'fas fa-briefcase' }}"></i>
                            </span>
                            <div>
                    
                            <a href="{{ route('jobs') . '?category=' . $category->id }}">
                                <h4 class="pb-2">{{ $category->name }}</h4>
                            </a>
                            <p class="mb-0"> <span>0</span> Available position</p>
                        </div>
                        </div>
                    </div>
                @endforeach
            @endif
            
            


            </div>
        </div>
    </section>

    <section class="section-3  py-5">
        <div class="container">
            <h2>Featured Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">
                    <div class="job_lists">
                        <div class="row">
                            @if ($featuredJobs->isNotEmpty())
                                @foreach ($featuredJobs as $featuredJob)
                                    <div class=" col-lg-6 col-md-12 col-sm-12">
                                        <div class="inner-box">
                                            <div class="content">
                                                <span class="company-logo"><img alt="item brand" loading="lazy"
                                                        width="50" height="49" decoding="async" data-nimg="1" src="{{ asset('assets/images/logo.webp') }}"
                                                        style="color: transparent;"></span>
                                                <h4><a href="{{ route('jobDetail', $featuredJob->id) }}">{{ $featuredJob->title }}</a>
                                                </h4>
                                                <ul class="job-info">
                                                    <li><span class="icon fa fa-map-marker"></span>{{ $featuredJob->location }}</li>
                                                    <li><span class="icon fa fa-clock-o"></span> {{ \Carbon\Carbon::parse($featuredJob->created_at)->format('d M, Y') }}</li>
                                                    @if (!is_null($featuredJob->salary))
                                                        <li><span class="icon fa fa-money"></span>
                                                            {{ $featuredJob->salary }} </li>
                                                   @endif
                                                </ul>
                                                <ul class="job-other-info">
                                                    <li class="{{ $jobTypeClasses[$featuredJob->jobType->id] ?? 'default_class' }}">
                                                        {{ $featuredJob->jobType->name }}
                                                    </li>
                                                    
                                                </ul>
                                                <div class="jobs_right">
                                                    <div class="apply_now">
                                                        <a class="heart_mark " href="javascript:void(0);" onclick="saveJob(37)"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-3  py-5">
        <div class="container">
            <h2>Latest Jobs</h2>
            <div class="row pt-5">
                <div class="job_listing_area">

                    <div class="job_lists">
                        <div class="row">
                            @if ($latestJobs->isNotEmpty())
                                @foreach ($latestJobs as $latestJob)
                                <div class=" col-lg-6 col-md-12 col-sm-12 ">
                                    <div class="inner-box">
                                        <div class="content">
                                            <span class="company-logo"><img alt="item brand" loading="lazy"
                                                    width="50" height="49" decoding="async" data-nimg="1" src="{{ asset('assets/images/logo.webp') }}"
                                                    style="color: transparent;"></span>
                                            <h4>
                                                <a href="{{ route('jobDetail', $latestJob->id) }}">{{ $latestJob->title }}</a>
                                            </h4>
                                            <ul class="job-info">
                                                <li><span class="icon fa fa-map-marker"></span>{{ $latestJob->location }}</li>
                                                <li><span class="icon fa fa-clock-o"></span> {{ \Carbon\Carbon::parse($latestJob->created_at)->format('d M, Y') }}</li>
                                                @if (!is_null($latestJob->salary))
                                                    <li><span class="icon fa fa-money"></span>
                                                        {{ $latestJob->salary }} </li>
                                               @endif
                                            </ul>
                                            <ul class="job-other-info">
                                                <li class="{{ $jobTypeClasses[$latestJob->jobType->id] ?? 'default_class' }}">
                                                    {{ $latestJob->jobType->name }}
                                                </li>
                                                
                                            </ul>
                                            <div class="jobs_right">
                                                <div class="apply_now">
                                                    <a class="heart_mark " href="javascript:void(0);" onclick="saveJob(37)"> <i class="fa fa-heart-o" aria-hidden="true"></i></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
