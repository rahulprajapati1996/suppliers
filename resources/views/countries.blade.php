@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0">Countries List</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Countries</a></li>
                                    <li class="breadcrumb-item active">Countries List</li>
                                </ol>
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
                                        <th>ISO3</th>
                                        <th>ISO2</th>
                                        <th>Phonecode</th>
                                        <th>Capital</th>
                                        <th>Currency</th>
                                        <th>Region</th>
                                        <th>Subregion</th>
                                        <th>Emoji</th>
                                    </thead>
                                    <tbody>
                                        @if (count($countries) > 0)
                                            @foreach ($countries as $country)
                                                <tr>
                                                    <td>{{$country->name}}</td>
                                                    <td>{{$country->iso3}}</td>
                                                    <td>{{$country->iso2}}</td>
                                                    <td>{{$country->phonecode}}</td>
                                                    <td>{{$country->capital}}</td>
                                                    <td>{{$country->currency}}</td>
                                                    <td>{{$country->region}}</td>
                                                    <td>{{$country->subregion}}</td>
                                                    <td>{{$country->emoji}}</td>
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
