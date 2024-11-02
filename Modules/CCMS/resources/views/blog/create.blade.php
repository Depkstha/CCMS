@extends('layouts.app')
@section('content')
    <x-dashboard.breadcumb :title="$title" />
    <div class="container-fluid">
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif
        <div class="row">
            <div class="col-xl-12">
                {{ html()->form('POST')->route('blog.store')->class('needs-validation')->attributes(['novalidate'])->open() }}
                @include('ccms::blog.partials._form')
                {{ html()->form()->close() }}
            </div>
        </div>
    </div>
@endsection
