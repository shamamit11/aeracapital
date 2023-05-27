@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Services</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Services</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space" id="service-sec">
        <div class="container">
            <div class="row gy-4">
                @foreach($services as $service)
                    <div class="col-md-6 col-xl-4">
                        <div class="service-card">
                            <div class="service-card_number">{{ $service->order }}</div>
                            <div class="shape-icon">
                                <img src="{{ $service->icon }}" alt="{{ $service->title }}">
                                <span class="dots"></span>
                            </div>
                            <h3 class="box-title"><a href="{{route('service', [$service->slug])}}">{{ $service->title }}</a></h3>
                            <p class="service-card_text">{{ $service->sub_description }}</p>
                            <a href="{{route('service-detail', [$service->slug])}}" class="as-btn">Read More<i class="fa-regular fa-arrow-right ms-2"></i></a>
                            <div class="bg-shape">
                                <img src="{{asset('assets/site/img/bg/service_card_bg.png')}}" alt="bg">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    
    <section class="position-relative space">
        <div class="as-bg-img" data-bg-src="{{@$cta->image}}">
            <img src="{{asset('assets/site/img/bg/bg_overlay_1.png')}}" alt="overlay">
        </div>
        <div class="container z-index-common">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-7 col-md-9 text-center">
                    <div class="title-area mb-35">
                        <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="{{@$cta->caption}}">{{@$cta->caption}}</span>
                        <h2 class="sec-title text-white">{!!@$cta->title!!}</h2>
                    </div>
                    <a href="{{@$cta->cta_link}}" class="as-btn style3">{{@$cta->cta_text}}</a>
                </div>
            </div>
        </div>
    </section>
    
    <section class="bg-smoke" id="process-sec" data-bg-src="{{asset('assets/site/img/bg/process_bg_1.png')}}">
        <div class="container space">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="shape">WORK PROCESS</span>
                <h2 class="sec-title">How to work <span class="text-theme">it!</span></h2>
            </div>
            <div class="process-card-area">
                <div class="process-line">
                    <img src="{{asset('assets/site/img/bg/process_line.svg')}}" alt="line">
                </div>
                <div class="row gy-40">

                    @foreach($process as $item)
                    <div class="col-sm-6 col-xl-3 process-card-wrap">
                        <div class="process-card">
                            <div class="process-card_number">{{ $item->order }}</div>
                            <div class="process-card_icon">
                                <img src="{{ $item->image }}" alt="{{ $item->caption }}">
                            </div>
                            <h2 class="box-title">{{ $item->caption }}</h2>
                            <p class="process-card_text">{{ $item->title }}</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    @include('site.includes.testimonials')

    <div class="pb-120">
        @include('site.includes.feature')
    </div>
@endsection