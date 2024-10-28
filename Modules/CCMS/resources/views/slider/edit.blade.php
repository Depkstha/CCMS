@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <x-dashboard.breadcumb :title="$title" />

        {{ html()->modelForm($slider, 'PUT')->route('slider.update', $slider->id)->class(['needs-validation'])->attributes(['novalidate'])->open() }}

        @include('ccms::slider.partials._form')

        {{ html()->form()->close() }}

    </div>
@endsection
