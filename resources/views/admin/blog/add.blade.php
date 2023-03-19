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
                                <form enctype="multipart/form-data" method="post" action="{{ $action }}"
                                    id="form">
                                    @csrf
                                    <input type="hidden" class="form-control" name="id" id='id'
                                        value="{{ isset($row->id) ? $row->id : 0 }}">
                                    <div class="row">
                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">Date</label>
                                                <input type="text" class="form-control date" name="date"
                                                    id="date"
                                                    value="{{ old('date', isset($row->date) ? date('m/d/Y', strtotime($row->date)) : date('m/d/Y')) }}"
                                                    placeholder="MM/DD/YY" data-date-format="mm/dd/yyyy"
                                                    data-date-autoclose="true">
                                                <div class="error" id='error_date'></div>
                                            </div>
                                        </div>

                                        <div class="col-lg-3">
                                            <div class="mb-3">
                                                <label class="form-label">Posted By</label>
                                                <input type="text" class="form-control" name="posted_by" id="posted_by"
                                            value="{{ old('posted_by', isset($row->posted_by) ? $row->posted_by : '') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Title</label>
                                        <input type="text" class="form-control" name="title" id="title"
                                            value="{{ old('title', isset($row->title) ? $row->title : '') }}">
                                        <div class="error" id='error_title'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Sub Title</label>
                                        <input type="text" class="form-control" name="sub_title" id="sub_title"
                                            value="{{ old('sub_title', isset($row->sub_title) ? $row->sub_title : '') }}">
                                        <div class="error" id='error_sub_title'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Description</label>
                                        <textarea class="form-control" name="description" id="description">{{ old('description', isset($row->description) ? $row->description : '') }}</textarea>
                                        <div class="error" id='error_description'></div>
                                    </div>
                                    <div class="mb-3 col-4">
                                        <div class="mb-1">
                                            <label class="form-label">Image</label>
                                            <div class="input-group">
                                                <input type="text" id="main_image" class="form-control"
                                                    name="main_image" aria-label="Image"
                                                    aria-describedby="button-main_image"
                                                    value="{{ old('main_image', isset($row->main_image) ? $row->main_image : '') }}"
                                                    readonly>
                                                <div class="input-group-append">
                                                    <button class="btn btn-primary" type="button"
                                                        id="button-main_image">Select</button>
                                                </div>
                                            </div>
                                            <div class="error" id='error_main_image'></div>
                                        </div>
                                        <div id="image_01_select">
                                            @php
                                                $main_image_link = (isset($row->main_image) ? $row->main_image : asset('assets/admin/images/browser.png'));
                                            @endphp
                                            <img src="{{ $main_image_link }}" id="main_image_link" class="image-holder">
                                        </div>
                   
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Status</label>
                                        <label class="switch">
                                            <input type="checkbox" class="switch-input" name="status" value="1"
                                                {{ (isset($row->status) && $row->status == 1) || !isset($row->status) ? 'checked' : '' }} />
                                            <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                            <span class="switch-handle"></span> </label>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Title</label>
                                        <input type="text" class="form-control" name="meta_title"
                                            value="{{ old('meta_title', isset($row->meta_title) ? $row->meta_title : '') }}">
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Meta Description</label>
                                        <textarea class="form-control" name="meta_description" rows="5" maxlength="200">{{ old('meta_description', isset($row->meta_description) ? $row->meta_description : '') }}</textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Slug</label>
                                        <div class="input-group">
                                            <input type="text" class="form-control" name="slug" id="slug"
                                                value="{{ old('slug', isset($row->slug) ? $row->slug : '') }}">
                                        </div>
                                        <div class="error" id='error_slug'></div>
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
        @include('admin.blog.js.add')
    @endsection
