@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <x-dashboard.breadcumb />

        <div class="row project-wrapper">
            <div class="col-xxl-8">
                <div class="row">
                    <div class="col-xl-4">
                        <div class="card card-animate">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="avatar-sm flex-shrink-0">
                                        <span class="avatar-title bg-primary-subtle text-primary rounded-2 fs-2">
                                            <i data-feather="briefcase" class="text-primary"></i>
                                        </span>
                                    </div>
                                    <div class="flex-grow-1 overflow-hidden ms-3">
                                        <p class="text-uppercase fw-medium text-muted text-truncate mb-3">Active Projects
                                        </p>
                                        <div class="d-flex align-items-center mb-3">
                                            <h4 class="fs-4 flex-grow-1 mb-0"><span class="counter-value"
                                                    data-target="825">0</span></h4>
                                            <span class="badge bg-danger-subtle text-danger fs-12"><i
                                                    class="ri-arrow-down-s-line fs-13 align-middle me-1"></i>5.02 %</span>
                                        </div>
                                        <p class="text-muted text-truncate mb-0">Projects this month</p>
                                    </div>
                                </div>
                            </div><!-- end card body -->
                        </div>
                    </div>
                </div><!-- end row -->
            </div><!-- end col -->
        </div><!-- end row -->
    </div>
@endsection
