@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Add Client</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/client">Clients</a></li>
                                    <li class="breadcrumb-item active">Create Client</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card">
                            <form action="/client" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="client-name-input">Client Name</label>
                                            <input type="text" name="name"
                                                class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                id="client-name-input" placeholder="Enter client name">
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="client-sort-name" class="form-label">Client Sort Name</label>
                                            <input type="text" name="latter"
                                                class="form-control  {{ $errors->first('latter') ? 'is-invalid' : '' }} "
                                                id="client-sort-name" placeholder="Enter sort name">
                                            @if ($errors->has('latter'))
                                                <div class="invalid-feedback">{{ $errors->first('latter') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="email-address">Client Email Address</label>
                                            <input type="text" name="email_address"
                                                class="form-control {{ $errors->first('email_address') ? 'is-invalid' : '' }}"
                                                id="email-address" placeholder="Enter email address">
                                            @if ($errors->has('email_address'))
                                                <div class="invalid-feedback">{{ $errors->first('email_address') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="client-number">Client Contact Number</label>
                                            <input type="text" name="contact_number"
                                                class="form-control {{ $errors->first('contact_number') ? 'is-invalid' : '' }}"
                                                id="client-number" placeholder="Enter contact number">
                                            @if ($errors->has('contact_number'))
                                                <div class="invalid-feedback">{{ $errors->first('contact_number') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-country" class="form-label">Client Country</label>
                                            <select class="form-control {{ $errors->first('country') ? 'is-invalid' : '' }}"
                                                name="country" id="select-country">
                                                <option value="" selected="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('country'))
                                                <div class="invalid-feedback">{{ $errors->first('country') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-status" class="form-label">Client Status</label>
                                            <select class="form-control {{ $errors->first('status') ? 'is-invalid' : '' }}"
                                                name="status" id="select-status">
                                                <option value="" selected="">Select Status</option>
                                                    <option value="1">Active</option>
                                                    <option value="0">Inactive</option>
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
                                    <a class="btn btn-primary waves-effect waves-light  w-sm" href="/project"
                                        role="button">Back</a>
                                    <button type="submit" class="btn btn-success w-sm">Create</button>
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
