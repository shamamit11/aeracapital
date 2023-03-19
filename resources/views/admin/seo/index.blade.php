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
                                    <a href="{{ route('admin-seo-add') }}" class="btn btn-primary my-2 my-sm-0 ms-1">
                                        Add</a>
                                </nav>
                            </div>
                            <div class="card-body">
                                @if ($seos->count() > 0)
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="table-light">
                                                <tr>
                                                    <td width="50">#</td>
                                                    <td>Page Name</td>
                                                    <td style="text-align:center" width="120">Action</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($seos as $seo)
                                                    <tr id="tr{{ $seo->id }}">
                                                        <td>{{ $count++ }}</td>
                                                        <td>{{ $seo->name }}</td>
                                                        <td style="text-align:center"><a
                                                                href="{{ route('admin-seo-add', ['id=' . $seo->id]) }}"
                                                                class="btn btn-sm btn-warning rounded-pill" title="Edit"
                                                                data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                    class="fas fa-pen"></i></a>
                                                            <button type="button"
                                                                class="btn btn-sm btn-danger rounded-pill delete-row-btn"
                                                                data-id="{{ $seo->id }}" title="Delete"
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
                                            <div class="float-end"> {{ $seos->links('pagination::bootstrap-4') }} </div>
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
        @include('admin.seo.js.index')
    @endsection
