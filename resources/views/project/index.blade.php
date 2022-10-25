@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Project List</h4>

                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="/project">Projects</a></li>
                                    <li class="breadcrumb-item active">Project List</li>
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
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row g-4 ">
                                    <div class="col-sm-auto">
                                        <div>
                                            <a href="/project/create" class="btn btn-success full-height"><i
                                                    class="ri-add-line align-bottom me-1"></i> Add New</a>
                                        </div>
                                    </div>
                                    <div class="col-sm">
                                        <form>
                                            <div class="d-flex justify-content-sm-end gap-2">
                                                <div class="search-box ms-2">
                                                    <input type="search" name="q" class="form-control" placeholder="Search...">
                                                    <i class="ri-search-line search-icon"></i>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (count($projects) > 0)
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">PNO</th>
                                                <th scope="col">PNAME</th>
                                                <th scope="col">CLINET</th>
                                                <th scope="col">PM</th>
                                                <th scope="col">COUNTRY</th>
                                                <th scope="col">LOI</th>
                                                <th scope="col">CPI</th>
                                                <th scope="col">IRATE</th>
                                                <th scope="col">STATUS</th>
                                                <th scope="col">ACTION</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($projects as $project)
                                                <tr>
                                                    <td>
                                                        {{ $project->project->project_id }}
                                                    </td>
                                                    <td><a target="_blank" href="/project/{{ $project->id }}"
                                                            class="fw-semibold">{{ $project->project_name }}</a></td>
                                                    <td>{{ $project->project->client->name }}</td>
                                                    <td>{{ $project->project->user->first_name }}</td>
                                                    <td>{{ $project->country->name }}
                                                    </td>
                                                    <td>{{ $project->loi }}</td>
                                                    <td>${{ $project->cpi }}</td>
                                                    <td>{{ $project->ir }}</td>
                                                    <td>{{ $project->status }}</td>
                                                    <td>
                                                        <a href="/project/{{ $project->id }}"
                                                            class="btn btn-sm btn-primary">View</a>
                                                        <a href="/project/{{ $project->id }}/edit"
                                                            class="btn btn-sm btn-info">Edit</a>
                                                        <button class="btn btn-sm btn-danger remove-btn"
                                                            data-id="{{ $project->id }}">Remove</button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="align-items-center justify-content-end d-flex">
                                        {{ $projects->render() }}
                                    </div>
                                @else
                                    <div class="row text-center">
                                        <div class="col-12">
                                            <h4>No Project Found</h4>

                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->
    @section('footer')
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script>
            $(function() {
                $('.remove-btn').click(function() {
                    var id = $(this).attr('data-id');
                    swal({
                            title: " Are you sure?",
                            text: "Once deleted, you will not be able to recover this project!",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willDelete) => {
                            if (willDelete) {
                                $.ajax({
                                    url: "/project/" + id,
                                    type: "delete",
                                    headers: {
                                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                    },
                                    data: {
                                        id: id
                                    },
                                    success: function(response) {
                                        swal(response.message, {
                                            icon: "success",
                                        }).then(()=>{
                                            location.reload();
                                        });
                                    }
                                });

                            } else {
                                swal("Your imaginary file is safe!");
                            }
                        });
                })
            });
        </script>
    @endsection
</div>
@endsection
