@extends('layouts.app')
@section('content')
        <div class="container-fluid">

            <x-dashboard.breadcumb :title="$title" />

            {{ html()->modelForm($menu, 'PUT')->route('menu.update', $menu->id)->class(['needs-validation'])->attributes(['novalidate'])->open() }}

            @include('menu::menu.partials._form')

            {{ html()->form()->close() }}

        </div>
@endsection
