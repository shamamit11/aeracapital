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
                                <div class="col-6">
                                    <form enctype="multipart/form-data" method="post" action="{{ $action }}" id="form">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id" value="{{ isset($row->id) ? $row->id : '' }}">

                                        <div class="mb-3">
                                            <label class="form-label"> Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ old('name', isset($row->name) ? $row->name : '') }}">
                                            <div class="error" id='error_name'></div>
                                        </div>

                                        @if(!isset($row->id))
                                            <div class="mb-3">
                                                <label class="form-label"> Location</label>
                                                <select class="form-control" name="location" id="location">
                                                    <option value="home" @if(@$row->location == 'home') selected @endif>Home Page</option>
                                                    <option value="about" @if(@$row->location == 'about') selected @endif>About Page</option>
                                                    <option value="service" @if(@$row->location == 'service') selected @endif>Service Page</option>
                                                    <option value="product" @if(@$row->location == 'product') selected @endif>Product Page</option>
                                                    <option value="blog" @if(@$row->location == 'blog') selected @endif>Blog Page</option>
                                                    <option value="contact" @if(@$row->location == 'contact') selected @endif>Contact Page</option>
                                                    <option value="default" @if(@$row->location == 'default') selected @endif>Default</option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="mb-3" style="pointer-events: none;">
                                                <label class="form-label"> Location</label>
                                                <select class="form-control" name="location" id="location" readonly>
                                                    <option value="home" @if(@$row->location == 'home') selected @endif>Home Page</option>
                                                    <option value="about" @if(@$row->location == 'about') selected @endif>About Page</option>
                                                    <option value="service" @if(@$row->location == 'service') selected @endif>Service Page</option>
                                                    <option value="product" @if(@$row->location == 'product') selected @endif>Product Page</option>
                                                    <option value="blog" @if(@$row->location == 'blog') selected @endif>Blog Page</option>
                                                    <option value="contact" @if(@$row->location == 'contact') selected @endif>Contact Page</option>
                                                    <option value="default" @if(@$row->location == 'default') selected @endif>Default</option>
                                                </select>
                                            </div>
                                        @endif

                                        <div class="mb-3">
                                            <label class="form-label"> Caption</label>
                                            <input type="text" class="form-control" name="caption" id="caption"
                                                value="{{ old('caption', isset($row->caption) ? $row->caption : '') }}">
                                            <div class="error" id='error_caption'></div>
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
                                            <label class="form-label"> Main Text </label>
                                            <textarea class="form-control" name="main_text" id="main_text" rows="3">{{ old('main_text', isset($row->main_text) ? $row->main_text : '') }}</textarea>
                                            <div class="error" id='error_main_text'></div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class="form-label"> CTA 01 Text</label>
                                                <input type="text" class="form-control" name="cta_01_text" id="cta_01_text"
                                                    value="{{ old('cta_01_text', isset($row->cta_01_text) ? $row->cta_01_text : '') }}">
                                                <div class="error" id='error_cta_01_text'></div>
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="form-label"> CTA 01 Link</label>
                                                <input type="text" class="form-control" name="cta_01_link" id="cta_01_link"
                                                    value="{{ old('cta_01_link', isset($row->cta_01_link) ? $row->cta_01_link : '') }}">
                                                <div class="error" id='error_cta_01_link'></div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class="form-label"> CTA 02 Text</label>
                                                <input type="text" class="form-control" name="cta_02_text" id="cta_02_text"
                                                    value="{{ old('cta_02_text', isset($row->cta_02_text) ? $row->cta_02_text : '') }}">
                                                <div class="error" id='error_cta_02_text'></div>
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="form-label"> CTA 02 Link</label>
                                                <input type="text" class="form-control" name="cta_02_link" id="cta_02_link"
                                                    value="{{ old('cta_02_link', isset($row->cta_02_link) ? $row->cta_02_link : '') }}">
                                                <div class="error" id='error_cta_02_link'></div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <div class="mb-1">
                                                <label class="form-label">Image</label>
                                                <div class="input-group">
                                                    <input type="text" id="image" class="form-control"
                                                        name="image" aria-label="Image"
                                                        aria-describedby="button-image"
                                                        value="{{ old('image', isset($row->image) ? $row->image : '') }}"
                                                        readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="button-image">Select</button>
                                                    </div>
                                                </div>
                                                <div class="error" id='error_image'></div>
                                            </div>
                                            @php
                                                $image_link = (isset($row->image) ? $row->image : asset('assets/admin/images/browser.png'));
                                            @endphp
                                            <img src="{{ $image_link }}" id="image_link" class="image-holder">
                    
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">Order</label>
                                            <input type="text" class="form-control" name="order" id="order"
                                                value="{{ old('order', isset($row->order) ? $row->order : $order) }}">
                                            <div class="error" id='error_order'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <label class="switch">
                                                <input type="checkbox" class="switch-input" name="status" value="1" id="status"
                                                    {{ (isset($row->status) && $row->status == 1) || !isset($row->status) ? 'checked' : '' }} />
                                                <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                                <span class="switch-handle"></span> </label>
                                        </div>

                                        <button type="submit" class="btn btn-primary  btn-loading">Submit</button>

                                        <a href="{{route('admin-banner')}}" class="btn btn-danger btn-loading" style="margin-left:5px;">Cancel</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @include('admin.includes.footer')
        </div>
    @endsection
    @section('footer-scripts')
        @include('admin.banner.js.add')
    @endsection
