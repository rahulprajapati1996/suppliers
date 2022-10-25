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
                            <form action="/supplier" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="supplier-name-input">Supplier Name</label>
                                            <input type="text" name="name"
                                                class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                id="supplier-name-input" placeholder="Enter supplier name">
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="supplier-sort-name" class="form-label">Supplier Sort Name</label>
                                            <input type="text" name="latter"
                                                class="form-control  {{ $errors->first('latter') ? 'is-invalid' : '' }} "
                                                id="supplier-sort-name" placeholder="Enter sort name">
                                            @if ($errors->has('latter'))
                                                <div class="invalid-feedback">{{ $errors->first('latter') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="email-address">Supplier Email Address</label>
                                            <input type="text" name="email_address"
                                                class="form-control {{ $errors->first('email_address') ? 'is-invalid' : '' }}"
                                                id="email-address" placeholder="Enter email address">
                                            @if ($errors->has('email_address'))
                                                <div class="invalid-feedback">{{ $errors->first('email_address') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="supplier-number">Supplier Contact Number</label>
                                            <input type="text" name="contact_number"
                                                class="form-control {{ $errors->first('contact_number') ? 'is-invalid' : '' }}"
                                                id="supplier-number" placeholder="Enter contact number">
                                            @if ($errors->has('contact_number'))
                                                <div class="invalid-feedback">{{ $errors->first('contact_number') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="complete_url">Complete Url</label>
                                            <input type="text" name="complete_url"
                                                class="form-control {{ $errors->first('complete_url') ? 'is-invalid' : '' }}"
                                                id="complete_url" placeholder="Enter complete url">
                                            @if ($errors->has('complete_url'))
                                                <div class="invalid-feedback">{{ $errors->first('complete_url') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="terminate-url">Terminate Url</label>
                                            <input type="text" name="terminate_url"
                                                class="form-control {{ $errors->first('terminate_url') ? 'is-invalid' : '' }}"
                                                id="terminate-url" placeholder="Enter terminate url">
                                            @if ($errors->has('terminate_url'))
                                                <div class="invalid-feedback">{{ $errors->first('terminate_url') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="quotafull_url">Quotafull Url</label>
                                            <input type="text" name="quotafull_url"
                                                class="form-control {{ $errors->first('quotafull_url') ? 'is-invalid' : '' }}"
                                                id="quotafull_url" placeholder="Enter quotafull url">
                                            @if ($errors->has('quotafull_url'))
                                                <div class="invalid-feedback">{{ $errors->first('quotafull_url') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="security_url">Security Terminate Url</label>
                                            <input type="text" name="security_url"
                                                class="form-control {{ $errors->first('security_url') ? 'is-invalid' : '' }}"
                                                id="security_url" placeholder="Enter security url">
                                            @if ($errors->has('security_url'))
                                                <div class="invalid-feedback">{{ $errors->first('security_url') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="panel_size">Panel Size</label>
                                            <input type="text" name="panel_size"
                                                class="form-control {{ $errors->first('panel_size') ? 'is-invalid' : '' }}"
                                                id="panel_size" placeholder="Enter security url">
                                            @if ($errors->has('panel_size'))
                                                <div class="invalid-feedback">{{ $errors->first('panel_size') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-country" class="form-label">Supplier Country</label>
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
                                            <label for="select-status" class="form-label">Supplier Status</label>
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
