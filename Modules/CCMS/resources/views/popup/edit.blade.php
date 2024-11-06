@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <x-dashboard.breadcumb :title="$title" />

        {{ html()->modelForm($popup, 'PUT')->route('popup.update', $popup->id)->class(['needs-validation'])->attributes(['novalidate'])->open() }}

        @include('ccms::popup.partials._form')

        {{ html()->form()->close() }}

    </div>
@endsection
