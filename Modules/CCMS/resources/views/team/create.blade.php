@extends('layouts.app')
@section('content')
        <div class="container-fluid">

            <x-dashboard.breadcumb :title="$title" />

            {{ html()->form('POST')->route('team.store')->class(['needs-validation'])->attributes(['enctype' => 'multipart/form-data', 'novalidate'])->open() }}

            @include('ccms::team.partials._form')

            {{ html()->form()->close() }}

        </div>
@endsection
