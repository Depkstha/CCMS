@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <x-dashboard.breadcumb :title="$title" />
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif

        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">{{ $title }}</h5>
                        <a href="{{ route('country.create') }}" class="btn text-white"
                            style="background-color: var(--vz-primary)"><i class="ri-add-line align-middle"></i> Create</a>
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
                                    'sortable' => false,
                                ],
                                ['title' => 'Image', 'data' => 'image', 'name' => 'image'],
                                ['title' => 'Title', 'data' => 'title', 'name' => 'title'],
                                ['title' => 'Slug', 'data' => 'slug', 'name' => 'slug'],
                                ['title' => 'Published Date', 'data' => 'date', 'name' => 'date'],
                                ['title' => 'Status', 'data' => 'status', 'name' => 'status'],
                                [
                                    'title' => 'Action',
                                    'data' => 'action',
                                    'orderable' => false,
                                    'searchable' => false,
                                ],
                            ];
                        @endphp
                        <x-data-table-script :route="route('country.index')" :reorder="route('country.reorder')" :columns="$columns" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
