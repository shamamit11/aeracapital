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

                                        @if(!isset($row->id))
                                            <div class="mb-3">
                                                <label class="form-label"> Position</label>
                                                <select class="form-control" name="location" id="location">
                                                    <option value="default" @if(@$row->location == 'default') selected @endif>Default</option>
                                                </select>
                                            </div>
                                        @else
                                            <div class="mb-3" style="pointer-events: none;">
                                                <label class="form-label"> Position</label>
                                                <select class="form-control" name="location" id="location" readonly>
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
                                                <label class="form-label"> CTA Text</label>
                                                <input type="text" class="form-control" name="cta_text" id="cta_text"
                                                    value="{{ old('cta_text', isset($row->cta_text) ? $row->cta_text : '') }}">
                                                <div class="error" id='error_cta_text'></div>
                                            </div>
                                            <div class="col-lg-8">
                                                <label class="form-label"> CTA Link</label>
                                                <input type="text" class="form-control" name="cta_link" id="cta_link"
                                                    value="{{ old('cta_link', isset($row->cta_link) ? $row->cta_link : '') }}">
                                                <div class="error" id='error_cta_link'></div>
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

                                        <div class="mb-3">
                                            <label class="form-label">Video Link</label>
                                            <input type="text" class="form-control" name="video" id="video"
                                                value="{{ old('video', isset($row->video) ? $row->video : '') }}">
                                            <div class="error" id='error_video'></div>
                                        </div>

                                        <button type="submit" class="btn btn-primary  btn-loading">Submit</button>

                                        <a href="{{route('admin-cta')}}" class="btn btn-danger" style="margin-left:5px;">Cancel</a>
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
        @include('admin.cta.js.add')
    @endsection
