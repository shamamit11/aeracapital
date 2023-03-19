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
                                <form enctype="multipart/form-data" method="post" action="{{ $action }}" id="form">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id" id='id'
                                        value="{{ isset($row->cms_id) ? $row->cms_id : 0 }}">

                                    <div class="mb-3">
                                        <label class="form-label"> Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', isset($row->name) ? $row->name : '') }}">
                                        <div class="error" id='error_name'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Description</label>
                                        <textarea class="form-control inputerror" name="description" id="description">{{ old('description', isset($row->description) ? $row->description : '') }}</textarea>
                                        <div class="error" id='error_description'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Is Footer Link</label>
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="is_footer_link"
                                                id="is_footer_link" value="1"
                                                {{ (isset($row->cms->is_footer_link) && $row->cms->is_footer_link == 1) || !isset($row->cms->is_footer_link)
                                                    ? 'checked'
                                                    : '' }} />
                                            <span class="switch-label" data-on="Yes" data-off="No"></span>
                                            <span class="switch-handle"></span> </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title" id="meta_title"
                                            value="{{ old('meta_title', isset($row->meta_title) ? $row->meta_title : '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Description</label>
                                        <textarea class="form-control" name="meta_description" id="meta_description" rows="5" maxlength="200">{{ old('meta_description', isset($row->meta_description) ? $row->meta_description : '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Slug</label>
                                        <input type="text" class="form-control" name="slug" id="slug"
                                            value="{{ old('slug', isset($row->cms->slug) ? $row->cms->slug : '') }}">
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
        @include('admin.cms.js.add')
    @endsection
