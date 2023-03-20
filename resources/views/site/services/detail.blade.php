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
                        @if($row->image_01)
                            <div class="page-img">
                                <img src="{{ $row->image_01 }}" alt="{{ $row->title }}">
                            </div>
                        @endif
                        <div class="page-content">
                            <h2 class="h3 page-title">{{ $row->sub_title }}</h2>
                            {!! $row->description !!}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-4">
                    <aside class="sidebar-area">
                        <div class="widget widget_nav_menu  ">
                            <h3 class="widget_title">All Services</h3>
                            <div class="menu-all-pages-container">
                                <ul class="menu">
                                    @foreach($services as $item)
                                        <li><a href="{{route('service-detail', [$item->slug])}}">{{$item->title}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
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