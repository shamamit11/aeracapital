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
                                <div class="col-12">
                                    <form enctype="multipart/form-data" method="post" action="{{ $action }}" id="form">
                                        @csrf
                                        <input type="hidden" class="form-control" name="id" value="{{ isset($row->id) ? $row->id : '' }}">

                                        <div class="mb-3" @if(isset($row->id)) style="pointer-events: none;" @endif>
                                            <label class="form-label"> Section Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ old('name', isset($row->name) ? $row->name : '') }}">
                                            <div class="error" id='error_name'></div>
                                        </div>

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
                                                <div class="mb-1">
                                                    <label class="form-label">Icon Image 01</label>
                                                    <div class="input-group">
                                                        <input type="text" id="icon_01" class="form-control"
                                                            name="icon_01" aria-label="Image"
                                                            aria-describedby="button-icon_01"
                                                            value="{{ old('icon_01', isset($row->icon_01) ? $row->icon_01 : '') }}"
                                                            readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button"
                                                                id="button-icon_01">Select</button>
                                                        </div>
                                                    </div>
                                                    <div class="error" id='error_icon_01'></div>
                                                </div>
                                                @php
                                                    $image_link = (isset($row->icon_01) ? $row->icon_01 : asset('assets/admin/images/icon.png'));
                                                @endphp
                                                <img src="{{ $image_link }}" id="icon_01_link" class="icon-holder">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> Icon 01 Caption</label>
                                                <input type="text" class="form-control" name="icon_01_caption" id="icon_01_caption"
                                                    value="{{ old('icon_01_caption', isset($row->icon_01_caption) ? $row->icon_01_caption : '') }}">
                                                <div class="error" id='error_icon_01_caption'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> Icon 01 Text</label>
                                                <input type="text" class="form-control" name="icon_01_text" id="icon_01_text"
                                                    value="{{ old('icon_01_text', isset($row->icon_01_text) ? $row->icon_01_text : '') }}">
                                                <div class="error" id='error_icon_01_text'></div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <div class="mb-1">
                                                    <label class="form-label">Icon Image 02</label>
                                                    <div class="input-group">
                                                        <input type="text" id="icon_02" class="form-control"
                                                            name="icon_02" aria-label="Image"
                                                            aria-describedby="button-icon_02"
                                                            value="{{ old('icon_02', isset($row->icon_02) ? $row->icon_02 : '') }}"
                                                            readonly>
                                                        <div class="input-group-append">
                                                            <button class="btn btn-primary" type="button"
                                                                id="button-icon_02">Select</button>
                                                        </div>
                                                    </div>
                                                    <div class="error" id='error_icon_02'></div>
                                                </div>
                                                @php
                                                    $image_link = (isset($row->icon_02) ? $row->icon_02 : asset('assets/admin/images/icon.png'));
                                                @endphp
                                                <img src="{{ $image_link }}" id="icon_02_link" class="icon-holder">
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> Icon 02 Caption</label>
                                                <input type="text" class="form-control" name="icon_02_caption" id="icon_02_caption"
                                                    value="{{ old('icon_02_caption', isset($row->icon_02_caption) ? $row->icon_02_caption : '') }}">
                                                <div class="error" id='error_icon_02_caption'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> Icon 02 Text</label>
                                                <input type="text" class="form-control" name="icon_02_text" id="icon_02_text"
                                                    value="{{ old('icon_02_text', isset($row->icon_02_text) ? $row->icon_02_text : '') }}">
                                                <div class="error" id='error_icon_02_text'></div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-4">
                                            <div class="mb-1">
                                                <label class="form-label">List Icon Image</label>
                                                <div class="input-group">
                                                    <input type="text" id="list_icon" class="form-control"
                                                        name="list_icon" aria-label="Image"
                                                        aria-describedby="button-list_icon"
                                                        value="{{ old('list_icon', isset($row->list_icon) ? $row->list_icon : '') }}"
                                                        readonly>
                                                    <div class="input-group-append">
                                                        <button class="btn btn-primary" type="button"
                                                            id="button-list_icon">Select</button>
                                                    </div>
                                                </div>
                                                <div class="error" id='error_list_icon'></div>
                                            </div>
                                            @php
                                                $image_link = (isset($row->list_icon) ? $row->list_icon : asset('assets/admin/images/icon.png'));
                                            @endphp
                                            <img src="{{ $image_link }}" id="list_icon_link" class="icon-holder">
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 01 Text</label>
                                                <input type="text" class="form-control" name="list_01_text" id="list_01_text"
                                                    value="{{ old('list_01_text', isset($row->list_01_text) ? $row->list_01_text : '') }}">
                                                <div class="error" id='error_list_01_text'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 02 Text</label>
                                                <input type="text" class="form-control" name="list_02_text" id="list_02_text"
                                                    value="{{ old('list_02_text', isset($row->list_02_text) ? $row->list_02_text : '') }}">
                                                <div class="error" id='error_list_02_text'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 03 Text</label>
                                                <input type="text" class="form-control" name="list_03_text" id="list_03_text"
                                                    value="{{ old('list_03_text', isset($row->list_03_text) ? $row->list_03_text : '') }}">
                                                <div class="error" id='error_list_03_text'></div>
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 04 Text</label>
                                                <input type="text" class="form-control" name="list_04_text" id="list_04_text"
                                                    value="{{ old('list_04_text', isset($row->list_04_text) ? $row->list_04_text : '') }}">
                                                <div class="error" id='error_list_04_text'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 05 Text</label>
                                                <input type="text" class="form-control" name="list_05_text" id="list_05_text"
                                                    value="{{ old('list_05_text', isset($row->list_05_text) ? $row->list_05_text : '') }}">
                                                <div class="error" id='error_list_05_text'></div>
                                            </div>
                                            <div class="col-lg-4">
                                                <label class="form-label"> List 06 Text</label>
                                                <input type="text" class="form-control" name="list_06_text" id="list_06_text"
                                                    value="{{ old('list_06_text', isset($row->list_06_text) ? $row->list_06_text : '') }}">
                                                <div class="error" id='error_list_06_text'></div>
                                            </div>
                                        </div>

                                        <div class="mb-3 col-4">
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

                                        <button type="submit" class="btn btn-primary  btn-loading">Submit</button>

                                        <a href="{{route('admin-pagesection')}}" class="btn btn-danger" style="margin-left:5px;">Cancel</a>
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
        @include('admin.pagesection.js.add')
    @endsection
