@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $row->title }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{ $row->title }}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-8">
                    <div class="page-single">
                        {{-- <div class="page-img">
                            <img src="{{ $row->image_01 }}" alt="{{ $row->title }}">
                        </div> --}}
                        <div class="page-img">
                            <iframe style="width: 100%" height="450" src="{{ $row->demo_link }}" title="{{ $row->title }}" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe> 
                        </div>
                        <div class="page-content">
                            {{-- <h2 class="h3 page-title">{{ $row->sub_title }}</h2> --}}
                            {!! $row->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        {{-- <div class="widget widget_download">
                            <div class="download-widget-wrap">
                                <a href="{{ $row->demo_link }}" class="as-btn" target="_blank"><i class="fa fa-globe me-2"></i>View Demo</a>
                            </div>
                        </div> --}}
                        <div class="widget widget_banner" data-bg-src="{{@$cta->image}}">
                            <div class="widget-banner">
                                <span class="text">{{@$cta->caption}}</span>
                                <h2 class="title">{{@$cta->title}}</h2>
                                <a href="{{@$cta->cta_link}}" class="as-btn style3">{{@$cta->cta_text}}<i class="fas fa-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection