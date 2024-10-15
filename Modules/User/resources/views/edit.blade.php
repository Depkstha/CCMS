@extends('layouts.app')

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Edit User</a></li>
        </ol>
    </div>

    @if (session('success'))
        <x-flash-message type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
        <x-flash-message type="danger" :messages="$errors->all()" />
    @endif

    <div class="row">
        <div class="col-xl-3 col-lg-4">
            <div class="card profile-card m-b30">
                {{ html()->modelForm($user, 'PUT')->route('user.update', $user->id)->class('needs-validation')->novalidate(true)->open() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="mb-3">
                                {{ html()->label('Name')->for('name')->class('form-label') }}
                                {{ html()->span('*')->class('text-danger') }}
                                {{ html()->text('name')->class('form-control')->value($user->name)->required() }}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="mb-3">
                                {{ html()->label('Email')->for('email')->class('form-label') }}
                                {{ html()->span('*')->class('text-danger') }}
                                {{ html()->text('email')->class('form-control')->value($user->email)->required() }}
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="mb-3">
                                <div class="form-check mb-2">
                                    {{ html()->checkbox('is_admin')->value(1)->class('form-check-input')->checked($user->is_admin == 1) }}
                                    {{ html()->label('Is Admin?')->for('is_admin')->class('form-check-label') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                {{ html()->closeModelForm() }}
            </div>
        </div>
        <div class="col-xl-9 col-lg-8">
            <div class="clearfix">
                <div class="card  profile-card author-profile m-b30">
                    <div class="card-header">
                        <h5 class="card-title mb-0">User Details</h3>
                    </div>
                    <div class="card-body d-flex align-items-center justify-content-evenly">
                        <div class="p-5">
                            <div class="author-profile">
                                <div class="author-media">
                                    <img src="{{ asset('assets/images/avatar/avatar.png') }}">
                                </div>
                                <div class="author-info">
                                    <h6 class="title">{{ $user->name }}</h6>
                                    <span>{{ $user->is_admin ? 'Admin' : 'User' }}</span>
                                </div>
                            </div>
                        </div>
                        <div class="info-list w-50">
                            <ul>
                                <li><a href="javascript:void(0)">Username</a><span>{{ $user->name }}</span></li>
                                <li><a href="javascript:void(0)">Email</a><span>{{ $user->email }}</span></li>
                                <li><a href="javascript:void(0)">Password</a><span>********</span></li>
                                <li><a href="javascript:void(0)">Is Admin?</a><span>{{ $user->is_admin ? 'Yes' : 'No' }}</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
