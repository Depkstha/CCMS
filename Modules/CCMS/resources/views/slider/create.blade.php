@extends('layouts.app')
@section('content')
        <div class="container-fluid">

            <x-dashboard.breadcumb :title="$title" />

            {{ html()->form('POST')->route('slider.store')->class(['needs-validation'])->attributes(['enctype' => 'multipart/form-data', 'novalidate'])->open() }}

            @include('ccms::slider.partials._form')

            {{ html()->form()->close() }}

        </div>
@endsection
