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
                            <h3 class="box-title"><a href="{{route('service-detail', [$service->slug])}}">{{ $service->title }}</a></h3>
                            <p class="service-card_text">{{ $service->sub_description }}</p>
                            <a href="{{route('service-detail', [$service->slug])}}" class="as-btn">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                            <div class="bg-shape">
                                <img src="{{asset('assets/site/img/bg/service_card_bg.png')}}" alt="bg">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('site.includes.testimonials')

    <div class="">
        @include('site.includes.feature')
    </div>
@endsection