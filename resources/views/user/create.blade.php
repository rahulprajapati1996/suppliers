@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Edit User</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/user">User</a></li>
                                    <li class="breadcrumb-item active">Edit User</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <form action="/user" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="first-name-input">First Name</label>
                                            <input type="text" name="first_name"
                                                class="form-control {{ $errors->first('first_name') ? 'is-invalid' : '' }}"
                                                id="first-name-input" placeholder="Enter first name">
                                            @if ($errors->has('first_name'))
                                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="last-name-input">Last Name</label>
                                            <input type="text" name="last_name"
                                                class="form-control {{ $errors->first('last_name') ? 'is-invalid' : '' }}"
                                                id="last-name-input" placeholder="Enter last name"
                                                >
                                            @if ($errors->has('first_name'))
                                                <div class="invalid-feedback">{{ $errors->first('first_name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="email-input">Email Address</label>
                                            <input type="text" name="email"
                                                class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                                id="email-input" placeholder="Enter email address">
                                            @if ($errors->has('email'))
                                                <div class="invalid-feedback">{{ $errors->first('email') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="dob-input">Date Of Birth</label>
                                            <input type="date" name="date_of_birth"
                                                class="form-control {{ $errors->first('date_of_birth') ? 'is-invalid' : '' }}"
                                                id="dob-input" placeholder="Enter date of birth">
                                            @if ($errors->has('date_of_birth'))
                                                <div class="invalid-feedback">{{ $errors->first('date_of_birth') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-status"
                                                class="form-label {{ $errors->first('role') ? 'is-invalid' : '' }}">Role</label>
                                            <select class="form-control" name="role" id="role">
                                                <option value="" selected="">Select Role</option>
                                                @foreach ($roles as $role)
                                                    <option value="{{$role->id}}">{{$role->title}}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('role'))
                                                <div class="invalid-feedback">{{ $errors->first('role') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-status"
                                                class="form-label {{ $errors->first('gender') ? 'is-invalid' : '' }}">Gender</label>
                                            <select class="form-control" name="gender" id="gender">
                                                <option value="" selected="">Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                            @if ($errors->has('gender'))
                                                <div class="invalid-feedback">{{ $errors->first('gender') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="password-input">Password</label>
                                            <input type="password" name="password"
                                                class="form-control {{ $errors->first('password') ? 'is-invalid' : '' }}"
                                                id="password-input" placeholder="Enter password">
                                            @if ($errors->has('password'))
                                                <div class="invalid-feedback">{{ $errors->first('password') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-status" class="form-label">User Status</label>
                                            <select
                                                class="form-control {{ $errors->first('status') ? 'is-invalid' : '' }}"
                                                name="status" id="select-status">
                                                <option value="" selected="">Select Status</option>
                                                <option value="1">Active
                                                </option>
                                                <option value="0">
                                                    Inactive</option>
                                            </select>
                                            @if ($errors->has('status'))
                                                <div class="invalid-feedback">{{ $errors->first('status') }}</div>
                                            @endif
                                        </div>
                                    </div>
                            </form>
                            <!-- end card body -->
                            <div class="card-footer">
                                <div class="text-end">
                                    <a class="btn btn-primary waves-effect waves-light  w-sm" href="/supplier"
                                        role="button">Back</a>
                                    <button type="submit" class="btn btn-success w-sm">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    </div>
@endsection
