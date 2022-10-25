@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Users List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Users</a></li>
                                    <li class="breadcrumb-item active">Users List</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                @if (Session::has('success'))
                    <!-- Primary Alert -->
                    <div class="alert alert-success alert-border-left alert-dismissible fade show" role="alert">
                        <i class="ri-user-smile-line me-3 align-middle"></i> {{ Session::get('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @elseif (Session::has('error'))
                    <!-- Primary Alert -->
                    <div class="alert alert-danger alert-border-left alert-dismissible fade show" role="alert">
                        <i class="ri-error-warning-line me-3 align-middle"></i> {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a href="/user/create" class="btn btn-success full-height"><i
                                    class="ri-add-line align-bottom me-1"></i> Add New</a>
                        </div>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end gap-2">
                            <div class="search-box ms-2">
                                <input type="text" class="form-control" placeholder="Search...">
                                <i class="ri-search-line search-icon"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="col-12">
                                <table class="table table-responsive">
                                    <thead>
                                        <th>First Name</th>
                                        <th>Last Name</th>
                                        <th>Email Address</th>
                                        <th>Gender</th>
                                        <th>Date Of Birth</th>
                                        <th>Role</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if (count($users) > 0)
                                            @foreach ($users as $user)
                                                <tr>
                                                    <td>{{ $user->first_name }}</td>
                                                    <td>{{ $user->last_name }}</td>
                                                    <td>{{ $user->email }}</td>
                                                    <td>{{ Str::ucfirst($user->gender) }}</td>
                                                    <td>{{ $user->dob }}</td>
                                                    <td>{{ $user->role->title }}</td>
                                                    <td>
                                                        @if ($user->status == 0)
                                                            <span class='badge bg-danger'>Inactive</span>
                                                        @else
                                                            <span class='badge bg-success'>Active</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/user/{{ $user->id }}/edit"
                                                            class="btn btn-primary btn-sm {{ $user->id == 1 ? 'disabled' : '' }}">
                                                            <i class="ri-pencil-line"></i>
                                                            Edit</a>
                                                        <button
                                                            class="btn btn-danger btn-sm  {{ $user->id == 1 ? 'disabled' : '' }}"
                                                            data-toggle="modal" data-target="#exampleModalLong"><i
                                                                class="ri-delete-bin-line"></i>Delete</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
    </div>
@endsection
