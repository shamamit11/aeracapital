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
                                </nav>
                            </div>
                            <div class="card-body">
                                @if ($leads->count() > 0)
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <td width="50">#</td>
                                                <td>Name</td>
                                                <td width="250">Email</td>
                                                <td width="200">Mobile</td>
                                                <td width="250">Company</td>
                                                <td width="200">Package</td>
                                                <td style="text-align:center" width="120">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($leads as $lead)
                                                <tr id="tr{{ $lead->id }}">
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $lead->name }}</td>
                                                    <td>{{ $lead->email }}</td>
                                                    <td>{{ $lead->mobile }}</td>
                                                    <td>{{ $lead->company }}</td>
                                                    <td>{{ $lead->package }}</td>
                                                    <td style="text-align:center"><a
                                                            href="{{ route('admin-lead-view', ['id=' . $lead->id]) }}"
                                                            class="btn btn-sm btn-warning rounded-pill" title="View"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="fas fa-eye"></i></a>
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger rounded-pill delete-row-btn"
                                                            data-id="{{ $lead->id }}" title="Delete"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><span
                                                                class="icon"><i class='fas fa-trash'></i></span></button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="row">
                                        <div class="col-md-4 col-sm-6 col-xs-12">
                                            Showing {{ $from_data }} to {{ $to_data }} of {{ $total_data }}
                                            records.
                                        </div>
                                        <div class="col-md-8 col-sm-6 col-xs-12">
                                            <div class="float-end"> {{ $leads->links('pagination::bootstrap-4') }} </div>
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
        @include('admin.lead.js.index')
    @endsection
