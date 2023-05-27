
@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">About Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>About Us</li>
                </ul>
            </div>
        </div>
    </div>
    @include('site.includes.about')

    <div class="bg-theme space-extra" data-bg-src="{{asset('assets/site/img/bg/counter_bg_1.png')}}">
        <div class="container py-2">
            <div class="row gy-40 justify-content-between">
                @foreach($counters as $count)
                    <div class="col-6 col-lg-auto">
                        <div class="counter-card">
                            <div class="counter-card_icon">
                                <img src="{{$count->image}}" alt="{{$count->caption}}">
                            </div>
                            <div class="media-body">
                                <h2 class="counter-card_number"><span class="counter-number">{{$count->title}}</span></h2>
                                <p class="counter-card_text">{{$count->caption}}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="">
        @include('site.includes.feature')
    </div>
@endsection