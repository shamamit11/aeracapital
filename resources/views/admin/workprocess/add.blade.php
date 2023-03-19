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
                                        <input type="hidden" class="form-control" name="id"
                                            value="{{ isset($row->id) ? $row->id : '' }}">
                                        <div class="mb-3">
                                            <label class="form-label"> Title</label>
                                            <input type="text" class="form-control" name="title" id="title"
                                                value="{{ old('title', isset($row->title) ? $row->title : '') }}">
                                            <div class="error" id='error_title'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Caption</label>
                                            <input type="text" class="form-control" name="caption" id="caption"
                                                value="{{ old('caption', isset($row->caption) ? $row->caption : '') }}">
                                            <div class="error" id='error_caption'></div>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <div class="mb-1">
                                                <label class="form-label">Icon</label>
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
                                                $image_link = (isset($row->image) ? $row->image : asset('assets/admin/images/icon.png'));
                                            @endphp
                                            <img src="{{ $image_link }}" id="image_link" class="icon-holder">
                    
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">Order</label>
                                            <input type="text" class="form-control" name="order" id="order"
                                                value="{{ old('order', isset($row->order) ? $row->order : $order) }}">
                                            <div class="error" id='error_order'></div>
                                        </div>

                                        <button type="submit" class="btn btn-primary  btn-loading">Submit</button>

                                        <a href="{{route('admin-workprocess')}}" class="btn btn-danger btn-loading" style="margin-left:5px;">Cancel</a>
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
        @include('admin.workprocess.js.add')
    @endsection
