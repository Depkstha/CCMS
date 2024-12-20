@extends('layouts.guest')
@section('content')
    <div class="auth-page-wrapper pt-5">
        <!-- auth page bg -->
        <div class="auth-one-bg-position auth-one-bg" id="auth-particles">
            <div class="bg-overlay"></div>

            <div class="shape">
                <svg xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink"
                    viewBox="0 0 1440 120">
                    <path d="M 0,36 C 144,53.6 432,123.2 720,124 C 1008,124.8 1296,56.8 1440,40L1440 140L0 140z"></path>
                </svg>
            </div>
        </div>

        <!-- auth page content -->
        <div class="auth-page-content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center mt-sm-5 mb-4 text-white-50">
                            <div>
                                <a href="{{ url('/') }}" class="d-inline-block auth-logo"><img
                                        src="{{ asset(setting('logo')) }}" class="dark-login" alt=""></a>

                            </div>
                            <p class="mt-3 fs-15 fw-medium">{{ setting('title') }}</p>
                        </div>
                    </div>
                </div>
                <!-- end row -->

                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card mt-4">

                            <div class="card-body p-4">
                                <div class="text-center mt-2">
                                    <h5 class="text-primary">Welcome Back !</h5>
                                    <p class="text-muted">Sign in to continue to {{ setting('title') }} Admin Portal.
                                    </p>
                                </div>
                                <div class="p-2 mt-4">
                                    {{ html()->form('POST', route('login'))->open() }}
                                    <div class="mb-3">
                                        {{ html()->label('Email')->for('email')->class('mb-1 form-label') }}
                                        {{ html()->email('email')->class('form-control')->placeholder('Enter Email')->required() }}
                                        @error('email')
                                            <p class="text-danger mb-0">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        {{ html()->label('Password')->for('password')->class('form-label') }}
                                        <div class="position-relative auth-pass-inputgroup mb-3">
                                            {{ html()->password('password')->class('form-control pe-5 password-input')->placeholder('Enter Password')->required() }}
                                            <button
                                                class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted password-addon"
                                                type="button" id="password-addon"><i
                                                    class="ri-eye-fill align-middle"></i></button>
                                            @error('password')
                                                <p class="text-danger mb-0">{{ $message }}</p>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        {{ html()->checkbox('remember')->class('form-check-input') }}
                                        {{ html()->label('Remember me')->class('form-check-label')->for('remember') }}
                                    </div>

                                    <div class="mt-4">
                                        <button class="btn text-white w-100" type="submit"
                                            style="background-color: var(--vz-primary)">Sign Me In</button>
                                    </div>

                                    {{ html()->form()->close() }}

                                </div>
                            </div>
                            <!-- end card body -->
                        </div>
                        <!-- end card -->

                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end auth page content -->

        <!-- footer -->
        <footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="text-center">
                            <p class="mb-0 text-muted">&copy;
                                {{ date('Y') }} Consultancy CMS by Bibhuti Solutions
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <!-- end Footer -->
    </div>
@endsection
