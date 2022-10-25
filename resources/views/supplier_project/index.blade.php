@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Suppliers List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Suppliers</a></li>
                                    <li class="breadcrumb-item active">Suppliers List</li>
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
                @endif
                <div class="row g-4 mb-3">
                    <div class="col-sm-auto">
                        <div>
                            <a href="/supplier/create" class="btn btn-success full-height"><i
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
                                        <th>Name</th>
                                        <th>Sort Name</th>
                                        <th>Email Address</th>
                                        <th>Contact Number</th>
                                        <th>Country</th>
                                        <th>Panel Size</th>
                                        <th>CURL</th>
                                        <th>TURL</th>
                                        <th>QURL</th>
                                        <th>SURL</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </thead>
                                    <tbody>
                                        @if (count($suppliers) > 0)
                                            @foreach ($suppliers as $supplier)
                                                <tr>
                                                    <td>{{ $supplier->name }}</td>
                                                    <td>{{ $supplier->latter }}</td>
                                                    <td>{{ $supplier->email_address }}</td>
                                                    <td>{{ $supplier->contact_number }}</td>
                                                    <td>{{ $supplier->country->name }}</td>
                                                    <td>{{ $supplier->panel_size }}</td>
                                                    <td>{{ $supplier->complete_url }}</td>
                                                    <td>{{ $supplier->terminate_url }}</td>
                                                    <td>{{ $supplier->quotafull_url }}</td>
                                                    <td>{{ $supplier->security_term_url }}</td>
                                                    <td>
                                                        @if ($supplier->status == 0)
                                                            <span class='badge bg-danger'>Inactive</span>
                                                        @else
                                                            <span class='badge bg-success'>Active</span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <a href="/supplier/{{ $supplier->id }}/edit"
                                                            class="btn btn-primary btn-sm"> <i class="ri-pencil-line"></i>
                                                            Edit</a>
                                                        <button class="btn btn-danger btn-sm" data-toggle="modal"
                                                            data-target="#exampleModalLong"><i
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
    <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
@endsection
