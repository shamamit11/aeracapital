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
                                    <a href="{{ route('admin-blog-add') }}" class="btn btn-primary my-2 my-sm-0 ms-1">
                                        Add</a>
                                </nav>
                            </div>
                            <div class="card-body">
                                @if ($blogs->count() > 0)
                                    <table class="table">
                                        <thead class="table-light">
                                            <tr>
                                                <td width="50">#</td>
                                                <td width="150">Date</td>
                                                <td>Blog Title</td>
                                                <td align="center" width="200">Status</td>
                                                <td style="text-align:center" width="120">Action</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($blogs as $blog)
                                                <tr id="tr{{ $blog->id }}">
                                                    <td>{{ $count++ }}</td>
                                                    <td>{{ date('M d, Y', strtotime($blog->date)) }}</td>
                                                    <td>{{ $blog->title }}</td>
                                                    <td align="center"><label class="switch">
                                                            <input class="switch-input switch-status" type="checkbox"
                                                                data-id="{{ $blog->id }}"
                                                                data-status-value="{{ $blog->status }}"
                                                                @if ($blog->status == 1) checked @endif /> <span
                                                                class="switch-label" data-on="Show" data-off="Hide"></span>
                                                            <span class="switch-handle"></span> </label></td>
                                                    <td style="text-align:center"><a
                                                            href="{{ route('admin-blog-add', ['id=' . $blog->id]) }}"
                                                            class="btn btn-sm btn-warning rounded-pill" title="Edit"
                                                            data-bs-toggle="tooltip" data-bs-placement="top"><i
                                                                class="fas fa-pen"></i></a>
                                                        <button type="button"
                                                            class="btn btn-sm btn-danger rounded-pill delete-row-btn"
                                                            data-id="{{ $blog->id }}" title="Delete"
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
                                            <div class="float-end"> {{ $blogs->links('pagination::bootstrap-4') }} </div>
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
        @include('admin.blog.js.index')
    @endsection