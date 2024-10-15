@extends('layouts.app')
@section('content')
    <div class="page-head">
        <div class="row">
            <div class="col-12 mb-sm-4 mb-3">
                <h3 class="mb-0">Welcome to your dashboard, {{ auth()->user()->name }}</h3>
                <p class="mb-0">"Success is not final, failure is not fatal: It is the courage to continue that counts." — Winston Churchill</p>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12">
            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6">
                    <div class="widget-stat card">
                        <div class="card-body p-4">
                            <div class="media ai-icon">
                                <span class="me-3 bgl-primary text-primary">
                                    <i class="ti-user"></i>
                                </span>
                                <div class="media-body">
                                    <p class="mb-1">User</p>
                                    <h4 class="mb-0">3280</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card">
                        <div class="card-header border-0 pb-0">
                            <h5>People Contact</h5>
                        </div>
                        <div class="card-body">
                            <div class="row g-2">
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3">
                                        <img class="avatar avatar-lg avatar-circle mb-2" src="images/avatar/avatar1.jpg"
                                            alt>
                                        <h6 class="mb-0">Jordana Niclany</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3">
                                        <div
                                            class="avatar avatar-label avatar-lg bg-success-light text-success avatar-circle mb-2 mx-auto">
                                            KD</div>
                                        <h6 class="mb-0">Jacob Jack</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3 bg-purple-light">
                                        <img class="avatar avatar-lg avatar-circle mb-2" src="images/avatar/avatar3.jpg"
                                            alt>
                                        <h6 class="mb-0">Sammy Nico</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3 bg-cream-light">
                                        <img class="avatar avatar-lg avatar-circle mb-2" src="images/avatar/avatar4.jpg"
                                            alt>
                                        <h6 class="mb-0">Gibs Gibsy</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3">
                                        <img class="avatar avatar-lg avatar-circle mb-2" src="images/avatar/avatar5.jpg"
                                            alt>
                                        <h6 class="mb-0">Sam Sammy</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-sm-4 col-6">
                                    <div class="avatar-card text-center border-dashed rounded px-2 py-3">
                                        <img class="avatar avatar-lg avatar-circle mb-2" src="images/avatar/avatar6.jpg"
                                            alt>
                                        <h6 class="mb-0">Corey Core</h5>
                                            <span class="fs-12">jordan@mail.com</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
