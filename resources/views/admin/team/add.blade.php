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
                                            <label class="form-label"> Name</label>
                                            <input type="text" class="form-control" name="name" id="name"
                                                value="{{ old('name', isset($row->name) ? $row->name : '') }}">
                                            <div class="error" id='error_name'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Position</label>
                                            <input type="text" class="form-control" name="position" id="position"
                                                value="{{ old('position', isset($row->position) ? $row->position : '') }}">
                                            <div class="error" id='error_position'></div>
                                        </div>

                                        <div class="mb-3 col-6">
                                            <div class="mb-1">
                                                <label class="form-label">Image </label> <small>(287px X 320px)</small>
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
                                            <label class="form-label"> Facebook</label>
                                            <input type="text" class="form-control" name="facebook" id="facebook"
                                                value="{{ old('facebook', isset($row->facebook) ? $row->facebook : '') }}">
                                            <div class="error" id='error_facebook'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Twitter</label>
                                            <input type="text" class="form-control" name="twitter" id="twitter"
                                                value="{{ old('twitter', isset($row->twitter) ? $row->twitter : '') }}">
                                            <div class="error" id='error_twitter'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Instagram</label>
                                            <input type="text" class="form-control" name="instagram" id="instagram"
                                                value="{{ old('instagram', isset($row->instagram) ? $row->instagram : '') }}">
                                            <div class="error" id='error_instagram'></div>
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label"> Linkedin</label>
                                            <input type="text" class="form-control" name="linkedin" id="linkedin"
                                                value="{{ old('linkedin', isset($row->linkedin) ? $row->linkedin : '') }}">
                                            <div class="error" id='error_linkedin'></div>
                                        </div>

                                        <div class="mb-3 col-3">
                                            <label class="form-label">Order By</label>
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

                                        <a href="{{route('admin-team')}}" class="btn btn-danger" style="margin-left:5px;">Cancel</a>
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
        @include('admin.team.js.add')
    @endsection
