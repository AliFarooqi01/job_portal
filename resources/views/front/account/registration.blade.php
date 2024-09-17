@extends('front.layouts.app')
@section('main')
    <section class="section-5">
        <div class="container my-5">
            <div class="py-lg-2">&nbsp;</div>
            <div class="row d-flex justify-content-center">
                <div class="col-md-5">
                    <div class="card shadow border-0 p-5">
                        <h1 class="h3">Register</h1>
                        <form action="" name="registrationForm" id="registrationForm">
                            <div class="form-group register-dual">
                                <ul class="btn-box row" role="tablist">
                                    <li class="col-lg-6 col-md-12 react-tabs__tab--selected" id="candidateTab">
                                        <button type="button" class="theme-btn btn-style-four selected-role"
                                            id="candidateRole">
                                            <i class="fas fa-user"></i> Candidate
                                        </button>
                                    </li>
                                    <li class="col-lg-6 col-md-12" id="employerTab">
                                        <button type="button" class="theme-btn btn-style-four" id="employerRole">
                                            <i class="fas fa-briefcase"></i> Employer
                                        </button>
                                    </li>
                                </ul>
                                <!-- Hidden input to store the role -->
                                <input type="hidden" name="role" id="role" value="user">
                            </div>
                            <!-- Other form fields -->
                            <div class="mb-3">
                                <label for="" class="mb-2">Name*</label>
                                <input type="text" name="name" id="name" class="form-control"
                                    placeholder="Enter Name">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Email*</label>
                                <input type="text" name="email" id="email" class="form-control"
                                    placeholder="Enter Email">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Password*</label>
                                <input type="password" name="password" id="password" class="form-control"
                                    placeholder="Enter Password">
                                <p></p>
                            </div>
                            <div class="mb-3">
                                <label for="" class="mb-2">Confirm Password*</label>
                                <input type="password" name="confirm_password" id="confirm_password" class="form-control"
                                    placeholder="Please Confirm Password">
                                <p></p>
                            </div>
                            <button class="btn btn-primary mt-2">Register</button>
                        </form>

                    </div>
                    <div class="mt-4 text-center">
                        <p>Have an account? <a href="{{ route('account.login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('customJs')
    <script>
        $(document).ready(function() {
            // Set default role as 'user' (candidate)
            $('#role').val('user');

            // Apply selected-role class to the default candidate button
            $('#candidateRole').addClass('selected-role');

            // On candidate button click
            $('#candidateRole').on('click', function() {
                $('#role').val('user');
                $('#candidateRole').addClass('selected-role');
                $('#employerRole').removeClass('selected-role');
            });

            // On employer button click
            $('#employerRole').on('click', function() {
                $('#role').val('employer');
                $('#employerRole').addClass('selected-role');
                $('#candidateRole').removeClass('selected-role');
            });

            // Handle form submission
            $('#registrationForm').submit(function(e) {
                e.preventDefault();

                $.ajax({
                    url: '{{ route('account.processRegistration') }}',
                    type: 'POST',
                    data: $("#registrationForm").serializeArray(),
                    dataType: 'json',
                    success: function(response) {
                        if (response.status == false) {
                            var errors = response.errors;
                            if (errors.name) {
                                $('#name').addClass('is-invalid').siblings('p').addClass(
                                        'invalid-feedback')
                                    .html(errors.name)
                            } else {
                                $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html('')
                            }
                            if (errors.email) {
                                $('#email').addClass('is-invalid').siblings('p').addClass(
                                        'invalid-feedback')
                                    .html(errors.email)
                            } else {
                                $('#email').removeClass('is-invalid').siblings('p').removeClass(
                                    'invalid-feedback').html('')
                            }
                            if (errors.password) {
                                $('#password').addClass('is-invalid').siblings('p').addClass(
                                        'invalid-feedback')
                                    .html(errors.password)
                            } else {
                                $('#password').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html('')
                            }
                            if (errors.confirm_password) {
                                $('#confirm_password').addClass('is-invalid').siblings('p')
                                    .addClass(
                                        'invalid-feedback')
                                    .html(errors.confirm_password)
                            } else {
                                $('#confirm_password').removeClass('is-invalid').siblings('p')
                                    .removeClass(
                                        'invalid-feedback').html('')
                            }

                        } else {
                            $('#name').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('');
                            $('#email').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('');
                            $('#password').removeClass('is-invalid').siblings('p').removeClass(
                                'invalid-feedback').html('');
                            $('#confirm_password').removeClass('is-invalid').siblings('p')
                                .removeClass(
                                    'invalid-feedback').html('');

                            window.location.href = '{{ route('account.login') }}';

                        }
                    }
                })
            });
        });
    </script>
@endsection
