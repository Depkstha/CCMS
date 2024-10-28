@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <x-dashboard.breadcumb :title="$title" />
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h5 class="card-title flex-grow-1 mb-0">{{ $title }}</h5>
                <div class="flex-shrink-0">
                    <a href="{{ route('team.create') }}" class="btn waves-effect waves-light text-white"
                        style="background-color: var(--vz-primary)"><i class="ri-add-fill me-1 align-bottom"></i> Create</a>
                </div>
            </div>
            <div class="card-body">
                @php
                    $columns = [
                        [
                            'title' => 'S.N',
                            'data' => 'DT_RowIndex',
                            'name' => 'DT_RowIndex',
                            'orderable' => false,
                            'searchable' => false,
                        ],
                        ['title' => 'Image', 'data' => 'image', 'name' => 'image'],
                        ['title' => 'Name', 'data' => 'title', 'name' => 'title'],
                        ['title' => 'Designation', 'data' => 'designation', 'name' => 'designation'],
                        ['title' => 'Status', 'data' => 'status', 'name' => 'status'],
                        ['title' => 'Action', 'data' => 'action', 'orderable' => false, 'searchable' => false],
                    ];
                @endphp

                <x-data-table-script :route="route('team.index')" :reorder="route('team.reorder')" :columns="$columns" />
            </div>
        </div>
    </div>
@endsection
