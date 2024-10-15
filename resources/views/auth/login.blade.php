@extends('layouts.guest')
@section('content')
    <div class="login-aside text-center d-none d-sm-flex flex-column flex-row-auto">
        <div class="d-flex flex-column-auto flex-column pt-lg-40 pt-15">
            <div class="text-center mb-4 pt-5">
                <a href="{{ url('/') }}"><img src="{{ asset(setting('logo')) }}" class="dark-login" alt=""></a>
                <a href="{{ url('/') }}"><img src="{{ asset(setting('logo')) }}" class="light-login" alt=""></a>
            </div>
            <h3 class="mb-2">Welcome back!</h3>
            <p>Your Gateway to Expert Consultancy Solutions <br> Reach Out to Us for Tailored Website Design and Strategic
                Consulting</p>
        </div>
        <div class="aside-image" style="background-image:url({{ asset('assets/images/login.png') }});"></div>
    </div>
    <div
        class="container flex-row-fluid d-flex flex-column justify-content-center position-relative overflow-hidden p-7 mx-auto">
        <div class="d-flex justify-content-center h-100 align-items-center">
            <div class="authincation-content style-2">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="auth-form">
                            <div class="text-center d-block d-sm-none mb-4 pt-5">
                                <a href="{{ url('/') }}"><img src="{{ asset(setting('logo')) }}"
                                        class="dark-login" alt=""></a>
                                <a href="{{ url('/') }}"><img src="{{ asset(setting('logo')) }}"
                                        class="light-login" alt=""></a>
                            </div>

                            <h4 class="text-center mb-4">Sign in your account</h4>
                            {{ html()->form('POST', route('login'))->open() }}
                            <div class="mb-3">
                                {{ html()->label('Email')->for('email')->class('mb-1 form-label') }}
                                {{ html()->email('email')->class('form-control')->placeholder('Enter Email') }}
                            </div>
                            <div class="mb-3">
                                {{ html()->label('Password')->for('ic-password')->class('mb-1 form-label') }}
                                <div class="position-relative">
                                    {{ html()->password('password')->class('form-control')->placeholder('Enter Password') }}
                                    <span class="show-pass eye">
                                        <i class="fa fa-eye-slash"></i>
                                        <i class="fa fa-eye"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                <div class="mb-3">
                                    <div class="form-check custom-checkbox ms-1">
                                        {{ html()->checkbox('remember')->class('form-check-input') }}
                                        {{ html()->label('Remember me')->class('form-check-label')->for('remember') }}
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">Sign Me In</button>
                            </div>
                            {{ html()->form()->close() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
