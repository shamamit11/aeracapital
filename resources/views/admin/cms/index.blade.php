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
                                    {{-- <a href="{{ route('admin-cms-add') }}" class="btn btn-primary my-2 my-sm-0 ms-1">
                                        Add</a> --}}
                                </nav>
                            </div>
                            <div class="card-body">
                                @if ($cmss->count() > 0)
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <td width="50">#</td>
                                                <td>Cms Name</td>
                                                <td align="center" width="200">Is Footer Link</td>
                                                <td style="text-align:center" width="200">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($cmss as $cms)
                                                <tr id="tr{{ $cms->id }}">
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ $cms->name }}</td>
                                                    <td align="center"><label class="switch">
                                                            <input class="switch-input switch-is_footer_link"
                                                                type="checkbox" data-id="{{ $cms->cms_id }}"
                                                                data-is_footer_link-value="{{ $cms->cms->is_footer_link }}"
                                                                @if ($cms->cms->is_footer_link == 1) checked @endif /> <span
                                                                class="switch-label" data-on="Yes" data-off="No"></span>
                                                            <span class="switch-handle"></span> </label></td>
                                                    <td style="text-align:center">
                                                        <a href="{{ route('admin-cms-add', ['id=' . $cms->id]) }}"
                                                            class="btn btn-sm btn-warning rounded-pill" title="Edit"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="fas fa-pen"></i></a>

                                                        <button type="button"
                                                            class="btn btn-sm btn-danger rounded-pill delete-row-btn"
                                                            data-id="{{ $cms->id }}" title="Delete"
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
                                            <div class="float-end"> {{ $cmss->links('pagination::bootstrap-4') }} </div>
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
        @include('admin.cms.js.index')
    @endsection
