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
                                    <div class="mb-3">
                                        <label class="form-label"> Facebook</label>
                                        <input type="text" class="form-control" name="facebook" id="facebook"
                                            value="{{ old('facebook', isset($row->facebook) ? $row->facebook : '') }}">
                                        <div class="error" id='error_facebook'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Instagram</label>
                                        <input type="text" class="form-control" name="instagram" id="instagram"
                                            value="{{ old('instagram', isset($row->instagram) ? $row->instagram : '') }}">
                                        <div class="error" id='error_instagram'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Twitter</label>
                                        <input type="text" class="form-control" name="twitter" id="twitter"
                                            value="{{ old('twitter', isset($row->twitter) ? $row->twitter : '') }}">
                                        <div class="error" id='error_twitter'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Youtube</label>
                                        <input type="text" class="form-control" name="youtube" id="youtube"
                                            value="{{ old('youtube', isset($row->youtube) ? $row->youtube : '') }}">
                                        <div class="error" id='error_youtube'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Whats App</label>
                                        <input type="text" class="form-control" name="whatsapp" id="whatsapp"
                                            value="{{ old('whatsapp', isset($row->whatsapp) ? $row->whatsapp : '') }}">
                                        <div class="error" id='error_whatsapp'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Linkedin</label>
                                        <input type="text" class="form-control" name="linkedin" id="linkedin"
                                            value="{{ old('linkedin', isset($row->linkedin) ? $row->linkedin : '') }}">
                                        <div class="error" id='error_linkedin'></div>
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
        @include('admin.social-link.js.index')
    @endsection
