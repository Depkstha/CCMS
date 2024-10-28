@extends('layouts.app')
@section('content')
    <div class="container-fluid">
        <x-dashboard.breadcumb :title="$title" />
        <div class="card">
            <div class="card-header align-items-center d-flex">
                <h5 class="card-title flex-grow-1 mb-0">{{ $title }}</h5>
                <div class="flex-shrink-0">
                    <a href="{{ route('menu.create') }}" class="btn waves-effect waves-light text-white" style="background-color: var(--vz-primary)"><i
                            class="ri-add-fill me-1 align-bottom"></i> Create</a>
                </div>
            </div>
            <div class="card-body">

                @php
                    $columns = [
                        ['title' => 'S.N', 'data' => 'DT_RowIndex', 'name' => 'DT_RowIndex', 'orderable' => false, 'searchable' => false],
                        ['title' => 'Location', 'data' => 'location', 'name' => 'location'],
                        ['title' => 'Title', 'data' => 'title', 'name' => 'title'],
                        ['title' => 'Order', 'data' => 'order', 'name' => 'order'],
                        ['title' => 'Status', 'data' => 'status', 'name' => 'status'],
                        ['title' => 'Action', 'data' => 'action', 'orderable' => false, 'searchable' => false],
                    ];
                @endphp
                <x-data-table-script :route="route('menu.index')" :reorder="route('menu.reorder')" :columns="$columns" />
            </div>
        </div>
    </div>
@endsection
