@extends('layouts.app')
@section('content')
    <x-dashboard.breadcumb :title="$title" />
    <div class="container-fluid">
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif
        <div class="row">
            <div class="col-xl-12">
                {{ html()->modelForm($country, 'PUT')->route('country.update', $country->id)->class('needs-validation')->attributes(['novalidate'])->open() }}
                @include('ccms::country.partials._form')
                {{ html()->closeModelForm() }}
            </div>
        </div>
    </div>
@endsection
