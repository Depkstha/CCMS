@extends('layouts.app')
@section('content')
    <x-dashboard.breadcumb :title="$title" />
    <div class="container-fluid">
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif
        <div class="row">
            <div class="col-xl-12">
                {{ html()->modelForm($blog, 'PUT')->route('blog.update', $blog->id)->class('needs-validation')->attributes(['novalidate'])->open() }}
                @include('ccms::blog.partials._form')
                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>
@endsection
