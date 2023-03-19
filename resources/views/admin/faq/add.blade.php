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
                                        <label class="form-label"> Description</label>
                                        <textarea class="form-control" name="description" id="description">{{ old('description', isset($row->description) ? $row->description : '') }}</textarea>
                                        <div class="error" id='error_description'></div>
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
                                            <input type="checkbox" class="switch-input" name="status" value="1"
                                                {{ (isset($row->status) && $row->status == 1) || !isset($row->status) ? 'checked' : '' }} />
                                            <span class="switch-label" data-on="Show" data-off="Hide"></span>
                                            <span class="switch-handle"></span> </label>
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
        @include('admin.faq.js.add')
    @endsection
