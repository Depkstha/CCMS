@extends('layouts.app')
@section('content')
        <div class="container-fluid">

            <x-dashboard.breadcumb :title="$title" />

            {{ html()->form('POST')->route('testimonial.store')->class(['needs-validation'])->attributes(['enctype' => 'multipart/form-data', 'novalidate'])->open() }}

            @include('ccms::testimonial.partials._form')

            {{ html()->form()->close() }}

        </div>
@endsection
