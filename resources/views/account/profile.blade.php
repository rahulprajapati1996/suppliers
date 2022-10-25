@extends('layouts.app')
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <div class="position-relative mx-n4 mt-n4">
                    <div class="profile-wid-bg profile-setting-img">
                        <img src="{{ asset('assets/images/profile-bg.jpg') }}" class="profile-wid-img" alt="">
                        <div class="overlay-content">
                            <div class="text-end p-3">
                                <div class="p-0 ms-auto rounded-circle profile-photo-edit">
                                    <input id="profile-foreground-img-file-input" type="file"
                                        class="profile-foreground-img-file-input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-xxl-3">
                        <div class="card mt-n5">
                            <div class="card-body p-4">
                                <div class="text-center">
                                    <div class="profile-user position-relative d-inline-block mx-auto  mb-4">
                                        <img src="{{ asset('assets/images/users/avatar-1.jpg') }}"
                                            class="rounded-circle avatar-xl img-thumbnail user-profile-image"
                                            alt="user-profile-image">
                                        <div class="avatar-xs p-0 rounded-circle profile-photo-edit">
                                            <input id="profile-img-file-input" type="file"
                                                class="profile-img-file-input">
                                        </div>
                                    </div>
                                    <h5 class="fs-16 mb-1">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                                </div>
                            </div>
                        </div>
                        <!--end card-->
                    </div>
                    <!--end col-->
                    <div class="col-xxl-9">
                        <div class="card mt-xxl-n5">
                            <div class="card-header">
                                <ul class="nav nav-tabs-custom rounded card-header-tabs border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#personalDetails"
                                            role="tab" aria-selected="true">
                                            <i class="fas fa-home"></i> Personal Details
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body p-4">
                                <div class="tab-content">
                                    <div class="tab-pane active" id="personalDetails" role="tabpanel">
                                        @if (Session::has('success'))
                                            <!-- Primary Alert -->
                                            <div class="alert alert-success alert-border-left alert-dismissible fade show"
                                                role="alert">
                                                <i class="ri-user-smile-line me-3 align-middle"></i>
                                                {{ Session::get('success') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @elseif (Session::has('error'))
                                            <!-- Primary Alert -->
                                            <div class="alert alert-danger alert-border-left alert-dismissible fade show"
                                                role="alert">
                                                <i class="ri-user-smile-line me-3 align-middle"></i>
                                                {{ Session::get('error') }}
                                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                                    aria-label="Close"></button>
                                            </div>
                                        @endif
                                        <form action="/account/profile/{{ $user->id }}" method="post">
                                            @method('PUT')
                                            @csrf
                                            <div class="card-body">
                                                <div class="row">
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label" for="first-name-input">First Name</label>
                                                        <input type="text" name="first_name"
                                                            class="form-control {{ $errors->first('first_name') ? 'is-invalid' : '' }}"
                                                            id="first-name-input" placeholder="Enter first name"
                                                            value="{{ $user->first_name }}">
                                                        @if ($errors->has('first_name'))
                                                            <div class="invalid-feedback">{{ $errors->first('first_name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label" for="last-name-input">Last Name</label>
                                                        <input type="text" name="last_name"
                                                            class="form-control {{ $errors->first('last_name') ? 'is-invalid' : '' }}"
                                                            id="last-name-input" placeholder="Enter last name"
                                                            value="{{ $user->last_name }}">
                                                        @if ($errors->has('last_name'))
                                                            <div class="invalid-feedback">{{ $errors->first('last_name') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label" for="email-input">Email Address</label>
                                                        <input type="text" name="email"
                                                            class="form-control {{ $errors->first('email') ? 'is-invalid' : '' }}"
                                                            id="email-input" placeholder="Enter email address"
                                                            value="{{ $user->email }}">
                                                        @if ($errors->has('email'))
                                                            <div class="invalid-feedback">{{ $errors->first('email') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label class="form-label" for="dob-input">Date Of Birth</label>
                                                        <input type="date" name="date_of_birth"
                                                            class="form-control {{ $errors->first('date_of_birth') ? 'is-invalid' : '' }}"
                                                            id="dob-input" placeholder="Enter date of birth"
                                                            value="{{ $user->dob }}">
                                                        @if ($errors->has('date_of_birth'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('date_of_birth') }}</div>
                                                        @endif
                                                    </div>
                                                    <div class="col-6 mb-3">
                                                        <label for="select-status"
                                                            class="form-label {{ $errors->first('gender') ? 'is-invalid' : '' }}">Gender</label>
                                                        <select class="form-control" name="gender" id="gender">
                                                            <option value="" selected="">Select Gender</option>
                                                            <option value="male"
                                                                {{ $user->gender == 'male' ? 'selected' : '' }}>Male
                                                            </option>
                                                            <option value="female"
                                                                {{ $user->gender == 'female' ? 'selected' : '' }}>Female
                                                            </option>
                                                        </select>
                                                        @if ($errors->has('gender'))
                                                            <div class="invalid-feedback">{{ $errors->first('gender') }}
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-footer">
                                                <div class="text-end">
                                                    <a class="btn btn-primary waves-effect waves-light  w-sm"
                                                        href="/" role="button">Back</a>
                                                    <button type="submit" class="btn btn-success w-sm">Update</button>
                                                </div>
                                            </div>
                                        </form>
                                        <form action="/account/password" method="post">
                                            @csrf
                                            @method('PUT')
                                            <div class="row g-2">
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="currentpasswordInput" class="form-label">Current
                                                            Password*</label>
                                                        <input type="password" name="current_password"
                                                            class="form-control {{ $errors->first('current_password') ? 'is-invalid' : '' }}"
                                                            id="currentpasswordInput" placeholder="Enter Current Password"
                                                            value="{{ $user->dob }}">
                                                        @if ($errors->has('current_password'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('current_password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="newPassword" class="form-label">New
                                                            Password*</label>
                                                        <input type="password" name="new_password"
                                                        class="form-control {{ $errors->first('new_password') ? 'is-invalid' : '' }}"
                                                        id="newPassword" placeholder="Enter New Password"
                                                        value="{{ $user->dob }}">
                                                    @if ($errors->has('new_password'))
                                                        <div class="invalid-feedback">
                                                            {{ $errors->first('new_password') }}</div>
                                                    @endif
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-4">
                                                    <div>
                                                        <label for="new_confirm_password" class="form-label">Confirm
                                                            Password*</label>
                                                            <input type="password" name="new_confirm_password"
                                                            class="form-control {{ $errors->first('new_confirm_password') ? 'is-invalid' : '' }}"
                                                            id="newPassword" placeholder="Enter Confirm Password"
                                                            value="{{ $user->dob }}">
                                                        @if ($errors->has('new_confirm_password'))
                                                            <div class="invalid-feedback">
                                                                {{ $errors->first('new_confirm_password') }}</div>
                                                        @endif
                                                    </div>
                                                </div>
                                                <!--end col-->
                                                <div class="col-lg-12">
                                                    <div class="text-end">
                                                        <button type="submit" class="btn btn-success">Change
                                                            Password</button>
                                                    </div>
                                                </div>
                                                <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                    <!--end tab-pane-->
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
                <!--end row-->

            </div>
            <!-- container-fluid -->
        </div><!-- End Page-content -->

        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <script>
                            document.write(new Date().getFullYear())
                        </script>2022 © Velzon.
                    </div>
                    <div class="col-sm-6">
                        <div class="text-sm-end d-none d-sm-block">
                            Design &amp; Develop by Themesbrand
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
@endsection
