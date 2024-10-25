@extends('layouts.app')

@section('content')
    <x-dashboard.breadcumb :title="$title" />

    <div class="container-fluid">
        @if ($errors->any())
            <x-flash-message type="danger" :messages="$errors->all()" />
        @endif
        
        <div class="row">
            <div class="col-xl-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5 class="card-title mb-0">Page List</h5>
                        <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addPageModal"><i class="ri-add-line align-middle"></i> Create</h5>
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
                                ['title' => 'Title', 'data' => 'title', 'name' => 'title'],
                                ['title' => 'Type', 'data' => 'type', 'name' => 'type'],
                                ['title' => 'Published At', 'data' => 'date', 'name' => 'date'],
                                ['title' => 'Status', 'data' => 'status', 'name' => 'status'],
                                [
                                    'title' => 'Action',
                                    'data' => 'action',
                                    'orderable' => false,
                                    'searchable' => false,
                                ],
                            ];
                        @endphp

                        <x-data-table-script :route="route('page.index')" :reorder="route('user.reorder')" :columns="$columns" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('ccms::page.modal.create')
    @include('ccms::page.modal.edit')
@endsection
