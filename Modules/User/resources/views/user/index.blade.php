@extends('layouts.app')

@section('content')

<div class="container-fluid">
        <x-dashboard.breadcumb :title="$title" />
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif

        <div class="row">
            <div class="col-lg-4 col-xl-3">
                <div class="card profile-card">
                    @include('user::user.add-user-form')
                </div>
            </div>

            <div class="col-lg-xl-8 col-lg-9">
                <div class="card">
                    <div class="card-body">
                        @php
                            $columns = [
                                [
                                    'title' => 'S.N',
                                    'data' => 'DT_RowIndex',
                                    'name' => 'DT_RowIndex',
                                    'orderable' => false,
                                    'searchable' => false,
                                    'sortable' => false,
                                ],
                                ['title' => 'Name', 'data' => 'name', 'name' => 'name'],
                                ['title' => 'Email', 'data' => 'email', 'name' => 'email'],
                                ['title' => 'Is Admin?', 'data' => 'is_admin', 'name' => 'is_admin'],
                                [
                                    'title' => 'Action',
                                    'data' => 'action',
                                    'orderable' => false,
                                    'searchable' => false,
                                ],
                            ];
                        @endphp

                        <x-data-table-script :route="route('user.index')" :reorder="route('user.reorder')" :columns="$columns" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
