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
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <label class="form-label"> Business Name</label>
                                                <input type="text" class="form-control" name="business_name"
                                                    id="business_name"
                                                    value="{{ old('business_name', isset($row->business_name) ? $row->business_name : '') }}">
                                                <div class="error" id='error_business_name'></div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-lg-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">Logo Large</label>
                                                        <div class="input-group">
                                                            <input type="text" id="logo_large" class="form-control"
                                                                name="logo_large" aria-label="Image"
                                                                aria-describedby="button-logo_large"
                                                                value="{{ old('logo_large', isset($row->logo_large) ? $row->logo_large : '') }}"
                                                                readonly>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button"
                                                                    id="button-logo_large">Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="error" id='error_logo_large'></div>
                                                    </div>
                                                    @php
                                                        $logo_large_link = (isset($row->logo_large) ? $row->logo_large : asset('assets/admin/images/browser.png'));
                                                    @endphp
                                                    <img src="{{ $logo_large_link }}" id="logo_large_link" class="image-holder">
                                                </div>
        
                                                <div class="col-lg-6">
                                                    <div class="mb-1">
                                                        <label class="form-label">Logo Small</label>
                                                        <div class="input-group">
                                                            <input type="text" id="logo_small" class="form-control" name="logo_small"
                                                                aria-label="Image" aria-describedby="button-logo_small"
                                                                value="{{ old('logo_small', isset($row->logo_small) ? $row->logo_small : '') }}"
                                                                readonly>
                                                            <div class="input-group-append">
                                                                <button class="btn btn-primary" type="button"
                                                                    id="button-logo_small">Select</button>
                                                            </div>
                                                        </div>
                                                        <div class="error" id='error_logo_small'></div>
                                                    </div>
                                                    @php
                                                        $logo_small_link = (isset($row->logo_small) ? $row->logo_small : asset('assets/admin/images/icon.png'));
                                                    @endphp
                                                    <img src="{{ $logo_small_link }}" id="logo_small_link" class="icon-holder">
                                                </div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Email</label>
                                                <input type="text" class="form-control" name="email" id="email"
                                                    value="{{ old('email', isset($row->email) ? $row->email : '') }}">
                                                <div class="error" id='error_email'></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Address</label>
                                                <textarea class="form-control" name="address" id="address" rows="6">{{ old('address', isset($row->address) ? $row->address : '') }}</textarea>
                                                <div class="error" id='error_address'></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Phone</label>
                                                <input type="text" class="form-control" name="phone" id="phone"
                                                    value="{{ old('phone', isset($row->phone) ? $row->phone : '') }}">
                                                <div class="error" id='error_phone'></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Opening Hour</label>
                                                <textarea class="form-control" name="opening_hour" id="opening_hour" rows="6">{{ old('opening_hour', isset($row->opening_hour) ? $row->opening_hour : '') }}</textarea>
                                                <div class="error" id='error_opening_hour'></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Website</label>
                                                <input type="text" class="form-control" name="vat_no" id="vat_no"
                                                    value="{{ old('vat_no', isset($row->vat_no) ? $row->vat_no : '') }}">
                                                <div class="error" id='error_vat_no'></div>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Default Meta Title</label>
                                                <input type="text" class="form-control" name="meta_title" id="meta_title"
                                                    value="{{ old('meta_title', isset($row->meta_title) ? $row->meta_title : '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Default Meta Description</label>
                                                <textarea class="form-control" name="meta_description" id="meta_description" rows="3" maxlength="200">{{ old('meta_description', isset($row->meta_description) ? $row->meta_description : '') }}</textarea>
                                            </div>

                                            <button type="submit" class="btn btn-primary  btn-loading">Submit</button>

                                        </div>

                                        <div class="col-6">
                                            
                                            <div class="mb-3">
                                                <label class="form-label"> Google Site Verification Code</label>
                                                <input type="text" class="form-control" name="google_site_verification" id="google_site_verification"
                                                    value="{{ old('google_site_verification', isset($row->google_site_verification) ? $row->google_site_verification : '') }}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Google Map </label>
                                                <textarea class="form-control" name="google_map" id="google_map" rows="6">{{ old('google_map', isset($row->google_map) ? $row->google_map : '') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> Google Analytics Script</label>
                                                <textarea class="form-control" name="google_analytics" id="google_analytics" rows="6">{{ old('google_analytics', isset($row->google_analytics) ? $row->google_analytics : '') }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label"> External Javascript Code</label>
                                                <textarea class="form-control" name="ext_js_scripts" id="ext_js_scripts" rows="10">{{ old('ext_js_scripts', isset($row->ext_js_scripts) ? $row->ext_js_scripts : '') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
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
        @include('admin.setting.js.index')
    @endsection
