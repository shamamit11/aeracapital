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
                        </div>
                        <div class="card-body">
                            <form enctype="multipart/form-data" method="post" action="{{$action}}" id="form">
                                @csrf
                                <input type="hidden" class="form-control" name="id"
                                    value="{{ isset($row->id)? $row->id : '' }}">
                                <div class="mb-3">
                                    <label class="form-label"> Name</label>
                                    <input type="text" class="form-control" name="name" id="name" value="{{old('name' , isset($row->name)? $row->name : '' )}}">
                                    <div class="error" id='error_name'></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> URL</label>
                                    <input type="text" class="form-control" name="url" id="url"  value="{{old('url' , isset($row->url)? $row->url : '' )}}">
                                    <div class="error" id='error_url'></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Meta Title</label>
                                    <input type="text" class="form-control" name="meta_title" id="meta_title"
                                        value="{{old('meta_title' , isset($row->meta_title) ? $row->meta_title : '')}}">
                                        <div class="error" id='error_meta_title'></div>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label"> Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="5"  maxlength="200">{{old('meta_description' , isset($row->meta_description)? $row->meta_description : '' )}}</textarea>
                                    <div class="error" id='error_meta_description'></div>
                                </div>
                                <button type="submit" class="btn btn-primary  btn-loading">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('admin.includes.footer')
    </div>
    @endsection
    @section('footer-scripts')
    @include('admin.seo.js.add')
    @endsection