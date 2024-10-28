@extends('layouts.app')
@section('content')
    <div class="container-fluid">

        <x-dashboard.breadcumb :title="$title" />

        {{ html()->modelForm($team, 'PUT')->route('team.update', $team->id)->class(['needs-validation'])->attributes(['novalidate'])->open() }}

        @include('ccms::team.partials._form')

        {{ html()->form()->close() }}

    </div>
@endsection
