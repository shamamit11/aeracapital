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
                                        <label class="form-label"> Page Name</label>
                                        <input type="text" class="form-control" name="name" id="name"
                                            value="{{ old('name', isset($row->name) ? $row->name : '') }}">
                                        <div class="error" id='error_name'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Hero Title</label>
                                        <input type="text" class="form-control" name="hero_title" id="hero_title"
                                            value="{{ old('hero_title', isset($row->hero_title) ? $row->hero_title : '') }}">
                                        <div class="error" id='error_hero_title'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Hero Description</label>
                                        <textarea class="form-control" name="hero_description" id="hero_description" rows="5">{{ old('hero_description', isset($row->hero_description) ? $row->hero_description : '') }}</textarea>
                                        <div class="error" id='error_hero_description'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Video</label>
                                        <input type="text" class="form-control" name="video" id="video"
                                            value="{{ old('video', isset($row->video) ? $row->video : '') }}">
                                        <div class="error" id='error_video'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Intro Title</label>
                                        <input type="text" class="form-control" name="intro_title" id="intro_title"
                                            value="{{ old('intro_title', isset($row->intro_title) ? $row->intro_title : '') }}">
                                        <div class="error" id='error_intro_title'></div>
                                    </div>
                                    
                                    <div class="mb-3">
                                        <label class="form-label"> Intro Description</label>
                                        <textarea class="form-control" name="intro_description" id="intro_description" rows="5">{{ old('intro_description', isset($row->intro_description) ? $row->intro_description : '') }}</textarea>
                                        <div class="error" id='error_intro_description'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Content Title</label>
                                        <input type="text" class="form-control" name="content_title" id="content_title"
                                            value="{{ old('content_title', isset($row->content_title) ? $row->content_title : '') }}">
                                        <div class="error" id='error_content_title'></div>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label"> Description</label>
                                        <textarea class="form-control" name="description" id="description">{{ old('description', isset($row->description) ? $row->description : '') }}</textarea>
                                        <div class="error" id='error_description'></div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-lg-6">
                                            <div class="mb-1">
                                                <label class="form-label">Intro Image</label>
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
                                        <label class="form-label">Schema</label>
                                        <textarea class="form-control" name="schema" id="schema" rows="10">{{ old('schema', isset($row->schema) ? $row->schema : '') }}</textarea>
                                        <div class="error" id='error_schema'></div>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label"> Faq Schema</label>
                                        <textarea class="form-control" name="faq_schema" id="faq_schema" rows="10">{{ old('faq_schema', isset($row->faq_schema) ? $row->faq_schema : '') }}</textarea>
                                        <div class="error" id='error_faq_schema'></div>
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
        @include('admin.landing_page.js.add')
    @endsection
