@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Respondents</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Respondents</a></li>
                                    <li class="breadcrumb-item active">Respondents</li>
                                </ol>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <form method="get">
                                    <div class="row g-3">
                                        <div class="col-xxl-2 col-sm-6">
                                            <div>
                                                <input type="text" name="pid" required class="form-control search"
                                                    placeholder="Project ID">
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-sm-6">
                                            <div>
                                                <select class="form-control" name="status">
                                                    <option value="complete">Complete</option>
                                                    <option value="terminate">Terminate</option>
                                                    <option value="quotafull">Quotafull</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-xxl-2 col-sm-6">
                                            <div>
                                                <input type="text" name="uid" class="form-control search"
                                                    placeholder="User ID">
                                            </div>
                                        </div>
                                        <!--end col-->
                                        <div class="col-xxl-1 col-sm-4">
                                            <div>
                                                <button type="submit" class="btn btn-primary"> <i
                                                        class="ri-search-line search-icon"></i>

                                                    Search
                                                </button>
                                            </div>
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </form>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table ">
                                        <thead class="table-light">
                                            <th>S.NO</th>
                                            <th>Project ID </th>
                                            <th>Respondent ID</th>
                                            <th>Status</th>
                                            <th>IP Address</th>
                                            <th>Action</th>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1;
                                            $class = ''; ?>
                                            @foreach ($surveys as $survey)
                                                @if ($survey->status == 'complete')
                                                    <?php $class = 'table-success'; ?>
                                                @elseif($survey->status = 'terminate')
                                                    <?php $class = 'table-danger'; ?>
                                                @else
                                                    <?php $class = 'table-info'; ?>
                                                @endif
                                                <tr class="{{ $class }}">
                                                    <td>{{ $i++ }}</td>
                                                    <td>{{ $survey->pid }}</td>
                                                    <td>{{ $survey->uid }}</td>
                                                    <td>{{ ucfirst($survey->status) }}</td>
                                                    <td>{{ $survey->ip_address }}</td>
                                                    <td><a href="javascript:void(0);" class="link-secondary"
                                                            title="Delete Respondent"><i
                                                                class="ri-delete-bin-5-line"></i></a></td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="d-flex justify-content-end">
                                    {{ $surveys->links() }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
    </div>
    <div class="modal fade" id="linkModal" tabindex="-1" role="dialog" aria-labelledby="linkModal" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Supplier URL</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('footer')
    <script>
        $(function() {
            $('.link-btn').click(function() {
                var btn = $(this);
                $("#linkModal .modal-title").text('Supplier ' + btn.attr('data-value') + ' URL');
                $("#linkModal .modal-body").html('<a href="' + btn.attr('data-url') + '">' + btn.attr(
                    'data-url') + '</a>');
            })
        })
    </script>
@endsection
