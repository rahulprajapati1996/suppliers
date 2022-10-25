@extends('layouts.app')

@section('head')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Create Project</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Create Project</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end page title -->
                <form action="/project/{{ $project->id }}" method="post">
                    @method('PUT')
                    <div class="row">
                        <div class="col-lg-8">
                            @csrf
                            <input type="hidden" name="id" value="{{ $project->project->id }}">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-title-input">Project Title</label>
                                            <input type="text" name="name"
                                                class="form-control {{ $errors->first('name') ? 'is-invalid' : '' }}"
                                                id="project-title-input" placeholder="Enter project title"
                                                value="{{ $project->project_name }}" required>
                                            @if ($errors->has('name'))
                                                <div class="invalid-feedback">{{ $errors->first('name') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-client" class="form-label">Client Name</label>
                                            <select class="form-control {{ $errors->first('client') ? 'is-invalid' : '' }}"
                                                name="client" id="select-client" required>
                                                <option value="" selected="">Select Client</option>
                                                @foreach ($clients as $client)
                                                    <option value="{{ $client->id }}"
                                                        {{ $project->project->client_id == $client->id ? 'selected' : '' }}>
                                                        {{ $client->name }}</option>
                                                @endforeach
                                            </select>
                                            @if ($errors->has('client'))
                                                <div class="invalid-feedback">{{ $errors->first('client') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-cpi">Project Cost/Interview</label>
                                            <input type="text" name="project_cpi"
                                                class="form-control {{ $errors->first('project_cpi') ? 'is-invalid' : '' }}"
                                                id="project-cpi" placeholder="Enter Cost Per Complete"
                                                value="{{ $project->cpi }}" required>
                                            @if ($errors->has('project_cpi'))
                                                <div class="invalid-feedback">{{ $errors->first('project_cpi') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-loi">Time Period (In Minutes)</label>
                                            <input type="text" name="project_loi"
                                                class="form-control {{ $errors->first('project_loi') ? 'is-invalid' : '' }}"
                                                id="project-loi" placeholder="Enter Length Of Interview"
                                                value="{{ $project->loi }}" required>
                                            @if ($errors->has('project_loi'))
                                                <div class="invalid-feedback">{{ $errors->first('project_loi') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-ir">Incedance Rate (IR)</label>
                                            <input type="text" name="project_ir"
                                                class="form-control {{ $errors->first('project_ir') ? 'is-invalid' : '' }}"
                                                id="project-ir" placeholder="Enter Incedance Rate"
                                                value="{{ $project->ir }}" required>
                                            @if ($errors->has('project_ir'))
                                                <div class="invalid-feedback">{{ $errors->first('project_ir') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-complete">Number Of Completes</label>
                                            <input type="text" name="completes"
                                                class="form-control {{ $errors->first('completes') ? 'is-invalid' : '' }}"
                                                id="project-complete" placeholder="Enter Number Of Completes"
                                                value="{{ $project->completes }}" required>
                                            @if ($errors->has('completes'))
                                                <div class="invalid-feedback">{{ $errors->first('completes') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-start">Project Start Date</label>
                                            <input type="date" name="start_date"
                                                class="form-control {{ $errors->first('start_date') ? 'is-invalid' : '' }}"
                                                id="project-start" placeholder="Enter start date"
                                                value="{{ $project->project->start_date }}" required>
                                            @if ($errors->has('start_date'))
                                                <div class="invalid-feedback">{{ $errors->first('start_date') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label class="form-label" for="project-end">Project End Date</label>
                                            <input type="date" name="end_date"
                                                class="form-control {{ $errors->first('end_date') ? 'is-invalid' : '' }}"
                                                id="project-end" placeholder="Enter end date"
                                                value="{{ $project->project->end_date }}" required>
                                            @if ($errors->has('end_date'))
                                                <div class="invalid-feedback">{{ $errors->first('end_date') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="project-live-url">Project Live URL</label>
                                            <input type="text" class="form-control" id="project-test-url"
                                                name="client_live_url" placeholder="Enter Project Live URL"
                                                value="{{ $project->client_live_url }}" required>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-country" class="form-label">Project Country</label>
                                            <select class="form-control" id="select-country" name="country" required>
                                                <option value="" selected="">Select Country</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}"
                                                        {{ $project->country_id == $country->id ? 'selected' : '' }}>
                                                        {{ $country->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-6 mb-3">
                                            <label for="select-status"
                                                class="form-label {{ $errors->first('project_status') ? 'is-invalid' : '' }}">Project
                                                Status</label>
                                            <select class="form-control" name="project_status" id="select-status" required>
                                                <option value="" selected="">Select Status</option>
                                                <option value="open" {{ $project->status == 'open' ? 'selected' : '' }}>
                                                    Open</option>
                                                <option value="close"
                                                    {{ $project->status == 'close' ? 'selected' : '' }}>Close</option>
                                                <option value="pause"
                                                    {{ $project->status == 'pause' ? 'selected' : '' }}>Pause</option>
                                                <option value="achieved"
                                                    {{ $project->status == 'achieved' ? 'selected' : '' }}>Achieved
                                                </option>
                                            </select>
                                            @if ($errors->has('project_status'))
                                                <div class="invalid-feedback">{{ $errors->first('project_status') }}</div>
                                            @endif
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label" for="project-description">Project
                                                Description</label>
                                            <textarea rows="5" class="form-control" name="description" id="project-description"
                                                placeholder="Type important message here..." required>{{ $project->notes }}</textarea>
                                        </div>
                                    </div>
                                </div>
                                <!-- end card body -->
                                <div class="card-footer">
                                    <div class="text-end">
                                        <a class="btn btn-primary waves-effect waves-light  w-sm" href="/project"
                                            role="button">Back</a>
                                        <button type="submit" class="btn btn-success w-sm">Save</button>
                                    </div>
                                </div>
                            </div>
                            <!-- end card -->
                        </div>
                        <!-- end col -->
                    </div>
                </form>
                <!-- end row -->

            </div>
            <!-- container-fluid -->
        </div>
    </div>
@endsection
@section('footer')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script src="{{ asset('assets/libs/@simonwep/pickr/pickr.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    <script src="{{ asset('assets/js/select2.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("form").validate({
                highlight: function(element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().addClass(errorClass);
                    } else {
                        elem.addClass(errorClass);
                    }
                },
                unhighlight: function(element, errorClass, validClass) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        $("#select2-" + elem.attr("id") + "-container").parent().removeClass(
                            errorClass);
                    } else {
                        elem.removeClass(errorClass);
                    }
                },
                errorPlacement: function(error, element) {
                    var elem = $(element);
                    if (elem.hasClass("select2-hidden-accessible")) {
                        element = $("#select2-" + elem.attr("id") + "-container").parent();
                        error.insertAfter(element);
                    } else {
                        error.insertAfter(element);
                    }
                }
            });
            $('#select-country').select2({
                placeholder: 'Select Country'
            });
        });
    </script>
@endsection
