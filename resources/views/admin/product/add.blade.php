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
                                        <label class="form-label"> Sub Description</label>
                                        <textarea class="form-control" name="sub_description" id="sub_description" rows="5">{{ old('sub_description', isset($row->sub_description) ? $row->sub_description : '') }}</textarea>
                                        <div class="error" id='error_sub_description'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Description</label>
                                        <textarea class="form-control" name="description" id="description">{{ old('description', isset($row->description) ? $row->description : '') }}</textarea>
                                        <div class="error" id='error_description'></div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label">Product Image 01</label>
                                                <div class="input-group">
                                                    <input type="text" id="image_01" class="form-control"
                                                        name="image_01" aria-label="Image"
                                                        aria-describedby="button-image_01"
                                                        value="{{ old('image_01', isset($row->image_01) ? $row->image_01 : '') }}"
                                                        readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="button-image_01">Select</button>
                                                    </div>
                                                </div>
                                                <div class="error" id='error_image_01'></div>
                                            </div>
                                            <div id="image_01_select">
                                                @php
                                                    $image_01_link = (isset($row->image_01) ? $row->image_01 : asset('assets/admin/images/browser.png'));
                                                @endphp
                                                <img src="{{ $image_01_link }}" id="image_01_link" class="image-holder">
                                            </div>
                                        </div>

                                        <div class="col-lg-4">
                                            <div class="mb-1">
                                                <label class="form-label">Icon Image</label>
                                                <div class="input-group">
                                                    <input type="text" id="icon" class="form-control" name="icon"
                                                        aria-label="Image" aria-describedby="button-icon"
                                                        value="{{ old('icon', isset($row->icon) ? $row->icon : '') }}"
                                                        readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="button-icon">Select</button>
                                                    </div>
                                                </div>
                                                <div class="error" id='error_icon'></div>
                                            </div>
                                            <div id="icon_select">
                                                @php
                                                    $icon_link = (isset($row->icon) ? $row->icon : asset('assets/admin/images/icon.png'));
                                                @endphp
                                                <img src="{{ $icon_link }}" id="icon_link" class="icon-holder">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Demo Link</label>
                                        <input type="text" class="form-control" name="demo_link" id="demo_link"
                                            value="{{ old('demo_link', isset($row->demo_link) ? $row->demo_link : '') }}">
                                        <div class="error" id='error_demo_link'></div>
                                    </div>

                                    <div class="row">
                                        <div class="col-2">
                                            <div class="mb-3">
                                                <label class="form-label">Order</label>
                                                <input type="text" class="form-control" name="order" id="order"
                                                    value="{{ old('order', isset($row->order) ? $row->order : $order) }}">
                                                <div class="error" id='error_order'></div>
                                            </div>
                                        </div>
                                        <div class="col-2" style="display: none">
                                            <div class="mb-3">
                                                <label class="form-label">Status</label>
                                                <label class="switch">
                                                    <input type="checkbox" class="switch-input" name="status"
                                                        value="1"
                                                        {{ (isset($row->status) && $row->status == 1) || !isset($row->status) ? 'checked' : '' }} />
                                                    <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                                    <span class="switch-handle"></span> </label>
                                            </div>
                                        </div>
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
        @include('admin.product.js.add')
    @endsection
