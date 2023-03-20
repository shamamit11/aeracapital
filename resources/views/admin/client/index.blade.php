@extends('admin.layout')
@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <h3>{{ $page_title }}</h3>
                                <nav class="navbar navbar-light">
                                    <form method="get" class="d-flex">
                                        <div class="input-group"> @csrf
                                            <input type="text" name="q" value="{{ @$q }}"
                                                class="form-control" placeholder="Search">
                                            <button class="btn btn-success my-2 my-sm-0" type="submit"><i
                                                    class="align-middle" data-feather="search"></i></button>
                                        </div>
                                    </form>
                                    <a href="{{ route('admin-client-add') }}" class="btn btn-primary my-2 my-sm-0 ms-1">
                                        Add</a>
                                </nav>
                            </div>
                            <div class="card-body">
                                @if ($clients->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <td width="50">#</td>
                                                    <td>Image</td>
                                                    <td> Name</td>
                                                    <td> Order</td>
                                                    <td width="200">Status</td>
                                                    <td style="text-align:center" width="120">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($clients as $client)
                                                    <tr id="tr{{ $client->id }}">
                                                        <td>{{ $count++ }}</td>
                                                        <td> <img
                                                                src="{{ $client->image }}"
                                                                height="30"></td>
                                                        <td>{{ $client->name }}</td>
                                                        <td>{{ $client->order }}</td>
                                                        <td><label class="switch">
                                                                <input class="switch-input switch-status" type="checkbox"
                                                                    data-id="{{ $client->id }}"
                                                                    data-status-value="{{ $client->status }}"
                                                                    @if ($client->status == 1) checked @endif />
                                                                <span class="switch-label" data-on="Show"
                                                                    data-off="Hide"></span> <span
                                                                    class="switch-handle"></span> </label></td>
                                                        <td style="text-align:center"><a
                                                                href="{{ route('admin-client-add', ['id=' . $client->id]) }}"
                                                                class="btn btn-sm btn-warning rounded-pill" title="Edit"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger rounded-pill delete-row-btn"
                                                                data-id="{{ $client->id }}" title="Delete"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"><span
                                                                    class="icon"><i
                                                                        class='fas fa-trash'></i></span></button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            Showing {{ $from_data }} to {{ $to_data }} of {{ $total_data }}
                                            records.
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <div class="float-end"> {{ $clients->links('pagination::bootstrap-4') }}
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-info" role="alert"> No data found. </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    @endsection
    @section('footer-scripts')
        @include('admin.client.js.index')
    @endsection
