@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <x-dashboard.breadcumb :title="$title" />

        {{ html()->modelForm($testimonial, 'PUT')->route('testimonial.update', $testimonial->id)->class(['needs-validation'])->attributes(['novalidate'])->open() }}

        @include('ccms::testimonial.partials._form')

        {{ html()->form()->close() }}

    </div>
@endsection
