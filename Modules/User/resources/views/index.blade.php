@extends('layouts.app')

@section('content')
    <div class="row page-titles">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0)">CMS</a></li>
            <li class="breadcrumb-item active"><a href="javascript:void(0)">Add User</a></li>
        </ol>
    </div>

    @if (session('success'))
        <x-flash-message type="success" :message="session('success')" />
    @endif

    @if ($errors->any())
        <x-flash-message type="danger" :messages="$errors->all()" />
    @endif


    <div class="row">
        <div class="col-lg-4 col-xl-3">
            <div class="card profile-card">
                @include('user::add-user-form')
            </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="users-table" class="display table table-sm">
                            <thead>
                                <tr>
                                    <th>S.N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Is Admin?</th>
                                    <th>Created Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $index => $user) 
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->is_admin ? 'Yes' : 'No' }}</td>
                                        <td>{{ $user->created_at }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <a href="{{ route('user.edit', $user->id) }}"
                                                    class="btn btn-primary shadow btn-xs sharp me-1"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="javascript:void(0);" data-link="{{ route('user.destroy', $user->id) }}" class="btn btn-danger shadow btn-xs sharp remove-item-btn"><i class="fa fa-trash"></i></a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('js')
    <script>
        $(document).ready(function() {
            $('#users-table').DataTable({
                language: {
                    paginate: {
                        next: '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                        previous: '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
                    }
                }
            });
        })
    </script>
@endpush
