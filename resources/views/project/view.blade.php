@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Project Details</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Projects</a></li>
                                    <li class="breadcrumb-item active">Project Details</li>
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
                        <i class="ri-user-smile-line me-3 align-middle"></i> {{ Session::get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Project Details</h4>
                                <div class="flex-shrink-0">
                                    <button class="btn btn-success full-height modal-btn" data-bs-toggle="modal"
                                        data-bs-target="#linkModal">
                                        <i class="ri-add-line align-bottom me-1"></i> Add Link</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="table-responsive table-card" style="border-right:1px solid #eee;">
                                            <table class="table table-nowrap mb-0">
                                                <tbody>
                                                    <tr>
                                                        <th>Survey ID</th>
                                                        <td>{{ $project->project->project_id }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Survey Name</th>
                                                        <td>{{ $project->project_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Client</th>
                                                        <td>{{ $project->project->client->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Project Manager</th>
                                                        <td>{{ $project->project->user->first_name }}
                                                            {{ $project->project->user->last_name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Project Length</th>
                                                        <td>{{ $project->loi }} Min</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Project CPI</th>
                                                        <td>${{ $project->cpi }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Country</th>
                                                        <td>{{ $project->country->name }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Expected IR</th>
                                                        <td>{{ $project->ir }}%</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Start Date</th>
                                                        <td>{{ $project->project->start_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>End Date</th>
                                                        <td>{{ $project->project->end_date }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Notes</th>
                                                        <td>{{ $project->notes }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header align-items-center d-flex">
                                <h4 class="card-title mb-0 flex-grow-1">Supplier Details</h4>
                                <div class="flex-shrink-0">
                                    <button class="btn btn-success full-height" data-bs-toggle="modal"
                                        data-bs-target="#supplierModal">
                                        <i class="ri-add-line align-bottom me-1"></i> Add Suppliers</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive table-bordered text-center">
                                    <table class="table table-nowrap mb-0">
                                        @if (count($vendors) > 0)
                                            <thead>
                                                <tr>
                                                    <th>SNAME</th>
                                                    <th>CPI</th>
                                                    <th>QUOTA</th>
                                                    <th>TOTAL</th>
                                                    <th>LINK</th>
                                                    <th>COMPLETE</th>
                                                    <th>TERMINATE</th>
                                                    <th>QUOTAFULL</th>
                                                    <th>INCOMPLETE</th>
                                                    <th>LOI</th>
                                                    <th>ACTION</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($vendors as $vendor)
                                                    <tr>
                                                        <td>{{ $vendor->supplier->name }}</td>
                                                        <td>{{ $vendor->cpi }}</td>
                                                        <td>{{ $vendor->no_of_completes }}</td>
                                                        <td>{{ $vendor->no_of_completes }}</td>
                                                        <td><button class="btn btn-secondary btn-sm link-btn"
                                                                data-link="{{ $vendor->survey_link }}">Copy Link</button>
                                                        </td>
                                                        <td>{{ count($vendor->completes) }}</td>
                                                        <td>{{ count($vendor->terminate) }}</td>
                                                        <td>{{ count($vendor->quotafull) }}</td>
                                                        <td>{{ count($vendor->incomplete) }}</td>
                                                        <td>{{ $vendor->project->loi }} Min</td>
                                                        <td>
                                                            <button class="btn btn-primary btn-sm edit-supplier"
                                                                data-id="{{ $vendor->id }}" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title="Edit Supplier"><i
                                                                    class=" ri-edit-box-line"></i></button>
                                                            <button class="btn btn-danger btn-sm delete-supplier"
                                                                href="/supplier/project/delete/{{ $vendor->id }}"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Delete Supplier"><i
                                                                    class="ri-delete-bin-line"></i></button>
                                                            <a target="_blank"
                                                                href="/supplier-project/download?pid={{ $vendor->id }}"
                                                                class="btn btn-success btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title="Download Report"><i
                                                                    class=" ri-download-cloud-2-line"></i></a>
                                                            <a href="{{ $vendor->survey_link }}" target="_blank"
                                                                class="btn btn-secondary btn-sm" data-bs-toggle="tooltip"
                                                                data-bs-placement="bottom" title="Test Link"><i
                                                                    class="ri-links-line"></i></a>
                                                            <button class="btn btn-info btn-sm btn-fetch"
                                                                data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                                title="Fetch Supplier Details"><i
                                                                    class=" ri-file-list-line"></i></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <td class="text-center">
                                                        <h4>No Result Found...</h4>
                                                    </td>
                                                </tr>
                                        @endif
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- container-fluid -->
        </div>

    </div>
    <!-- /.modal -->
    <div id="linkModal" class="modal fade" aria-labelledby="linkModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="linkModal">Add Link</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form action="/project/add/link" method="post" id="link-form">
                        <input type="hidden" name="pid" value="{{ $project->id }}">
                        @csrf
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label" for="project-live-url">Project Live URL</label>
                                <input type="text" class="form-control" id="project-test-url" name="client_live_url"
                                    placeholder="Enter Project Live URL">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="project-cpi">Project Cost/Interview</label>
                                <input type="text" name="project_cpi" class="form-control " id="project-cpi"
                                    placeholder="Enter Cost Per Complete">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="project-loi">Time Period (In Minutes)</label>
                                <input type="text" name="project_loi" class="form-control" id="project-loi"
                                    placeholder="Enter Length Of Interview">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="project-ir">Incedance Rate (IR)</label>
                                <input type="text" name="project_ir" class="form-control" id="project-ir"
                                    placeholder="Enter Incedance Rate">
                            </div>
                            <div class="col-6 mb-3">
                                <label class="form-label" for="project-complete">Number Of Completes</label>
                                <input type="text" name="completes" class="form-control" id="project-complete"
                                    placeholder="Enter Number Of Completes">
                            </div>
                            <div class="col-6 mb-3">
                                <label for="select-status" class="form-label">Project
                                    Status</label>
                                <select class="form-control" name="project_status" id="select-status">
                                    <option value="" selected="">Select Status</option>
                                    <option value="open">Open</option>
                                    <option value="close">Close</option>
                                    <option value="pause">Pause</option>
                                    <option value="achieved">Achieved</option>
                                </select>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="select-country" class="form-label">Project Country</label>
                                <select class="form-control" id="select-country" name="country">
                                    <option value="" selected="">Select Country</option>
                                    @foreach ($countries as $country)
                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="project-description">Project Description</label>
                                <textarea rows="5" class="form-control" name="description" id="project-description"
                                    placeholder="Type important message here..."></textarea>
                            </div>
                        </div>
                </div>
                <!-- end card body -->
                <div class="modal-footer">
                    <div class="text-end">
                        <a class="btn btn-primary waves-effect waves-light  w-sm" href="/project" role="button">Back</a>
                        <button type="submit" class="btn btn-success w-sm">Add</button>
                    </div>
                </div>
                </form>
            </div>
        </div><!-- /.modal-content -->
    </div>
    <div id="supplierModal" class="modal fade" aria-labelledby="supplierModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="supplierModal">Add Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <form class="row g-3" method="post" action="/supplier/project" id="supplier-form">
                        @csrf
                        <div class="col-md-6">
                            <label for="suppliers" class="form-label">Suppliers</label>
                            <select class="form-select" id="suppliers" name="sid" required>
                                <option selected disabled value="">Choose...</option>
                                @if (count($suppliers) > 0)
                                    @foreach ($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <input type="hidden" name="pid" value="{{ $project->id }}">
                        <input type="hidden" name="id" id="id" value="">
                        <div class="col-md-6">
                            <label for="pname" class="form-label">Partner Name</label>
                            <input type="text" class="form-control" id="pname" name="partner_name" readonly
                                disabled required>
                        </div>
                        <div class="col-md-6">
                            <label for="sname" class="form-label">Survey Name | ID</label>
                            <input type="text" class="form-control" id="sname" readonly disabled required
                                value="{{ $project->project->project_id }}">
                        </div>
                        <div class="col-md-6">
                            <label for="cpi" class="form-label">Cost/Interview (CPI)</label>
                            <input type="text" class="form-control" id="cpi" disabled name="cpi" required>
                        </div>
                        <div class="col-md-6">
                            <label for="terminate_url">Terminate Url</label>
                            <input type="text" class="form-control" id="terminate_url" disabled name="terminate_url"
                                required="" placeholder="Enter terminate url">
                        </div>
                        <div class="col-md-6">
                            <label for="quotafull_url">Quotafull URL</label>
                            <input type="text" class="form-control" id="quotafull_url" disabled name="quotafull_url"
                                required="" placeholder="Enter quotafull url">
                        </div>
                        <div class="form-group col-sm-6">
                            <label for="complete_url">Complete URL</label>
                            <input type="text" class="form-control" id="complete_url" disabled name="complete_url"
                                required="" placeholder="Enter complete url">
                        </div>
                        <div class="col-md-6">
                            <label for="security_terminate">Security Terminate URL</label>
                            <input type="text" class="form-control" id="security_terminate" disabled
                                name="security_terminate" required="" placeholder="Enter security terminate">
                        </div>
                        <div class="col-md-6">
                            <label for="number_of_completes">Number Of Completes Allocated</label>
                            <input type="text" class="form-control" id="number_of_completes" disabled
                                name="number_of_completes" required="" placeholder="Enter completes">
                        </div>
                        <div class="col-md-6">
                            <label for="select-status" class="form-label">Project
                                Status</label>
                            <select class="form-control" name="project_status" id="select-status" disabled>
                                <option value="" selected="">Select Status</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>
                        </div>
                        <div class="col-sm-12">
                            <label for="notes">Notes</label>
                            <textarea class="form-control" rows="5" id="notes" disabled name="notes" required=""
                                placeholder="Enter notes"></textarea>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary ">Save Changes</button>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    <!-- /.modal-dialog -->
    <div id="projectModal" class="modal fade" aria-labelledby="projectModal" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="projectModal">Add Supplier</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"> </button>
                </div>
                <div class="modal-body">
                    <table>
                        <tr>
                            <th>testing</th>
                            <td>testing</td>
                        </tr>
                    </table>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
    </div>
@endsection
@section('footer')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#link-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    cache: false,
                    data: form.serialize(),
                    beforeSend: function(xhr) {},
                    success: function(data, xhr) {
                        swal("Success", data.message, "success");
                    },
                    error: function(data, xhr, status, err) {
                        console.log(data)
                        if (xhr.status == 401) {
                            window.location.assign('/login')
                            return;
                        } else if (data.status == 400) {
                            swal("Error", data.responseJSON.message, "error");
                            return;
                        }
                        swal("Error", err, "error");
                    }
                });
            });
            $('#supplier-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);
                var actionUrl = form.attr('action');
                $.ajax({
                    type: "POST",
                    url: actionUrl,
                    cache: false,
                    data: form.serialize(),
                    beforeSend: function(xhr) {},
                    success: function(data, xhr) {
                        $("#supplierModal").modal('hide');
                        $('#projectModal').modal('show');
                    },
                    error: function(data, xhr, status, err) {
                        console.log(data)
                        if (xhr.status == 401) {
                            window.location.assign('/login')
                            return;
                        } else if (data.status == 400) {
                            swal("Error", data.responseJSON.message, "error");
                            return;
                        }
                        swal("Error", err, "error");
                    }
                });
            });
            $("#suppliers").change(function() {
                var id = $(this).val();
                var dataString = 'id=' + id;
                $.ajax({
                    type: "GET",
                    url: "/supplier/" + id,
                    cache: false,
                    beforeSend: function(xhr) {},
                    success: function(data) {
                        if (data) {
                            $("#supplier-form input").prop("disabled", false);
                            $("#supplier-form select").prop("disabled", false);
                            $("#supplier-form textarea").prop("disabled", false);
                            $("#sid").val(data.id)
                            $("#pname").val(data.name)
                            $("#terminate_url").val(data.terminate_url)
                            $("#quotafull_url").val(data.quotafull_url)
                            $("#complete_url").val(data.complete_url)
                            $("#security_terminate").val(data.security_term_url)
                        }
                    },
                    error: function(xhr, status, err) {
                        if (xhr.status == 401) {
                            window.location.assign('/login')
                        }
                        swal("Error", err, "error");
                    }
                });
            });
            $(".edit-supplier").click(function() {
                var id = $(this).attr('data-id');
                var form = $('#supplier-form');
                form.attr('action', '/supplier/project/update')
                $.ajax({
                    type: "GET",
                    url: '/supplier/project/' + id + '/edit',
                    cache: false,
                    beforeSend: function(xhr) {},
                    success: function(data, xhr) {
                        var data = data.data;
                        $("#supplier-form input").prop("disabled", false);
                        $("#supplier-form select").prop("disabled", false);
                        $("#supplier-form textarea").prop("disabled", false);
                        $("#id").val(data.id);
                        $("#suppliers").val(data.supplier_id);
                        $("#pname").val(data.supplier.name);
                        $("#cpi").val(data.cpi);
                        $("#terminate_url").val(data.terminate_url);
                        $("#complete_url").val(data.complete_url);
                        $("#quotafull_url").val(data.quotafull_url);
                        $("#security_terminate").val(data.security_terminate);
                        $("#number_of_completes").val(data.no_of_completes);
                        $("#select-status").val(data.status);
                        $("#notes").val(data.notes);
                        $("#suppliers").attr('disabled', true);
                        $("#supplierModal").modal('show');
                    },
                    error: function(data, xhr, status, err) {
                        if (xhr.status == 401) {
                            window.location.assign('/login')
                            return;
                        } else if (data.status == 400) {
                            swal("Error", data.responseJSON.message, "error");
                            return;
                        }
                        swal("Error", err, "error");
                    }
                });
            });
            $('.delete-supplier').on('click', function(event) {
                event.preventDefault();
                const url = $(this).attr('href');
                swal({
                    title: 'Are you sure?',
                    text: 'This record and it`s details will be permanantly deleted!',
                    icon: 'warning',
                    buttons: ["Cancel", "Yes!"],
                }).then(function(value) {
                    if (value) {
                        window.location.href = url;
                    }
                });
            });
        });
    </script>
@endsection
