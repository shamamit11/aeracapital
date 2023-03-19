@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Frequently Asked Question</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home')}}">Home</a></li>
                    <li>FAQ</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="space">
        <div class="container">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="shape">FAQ</span>
                <h2 class="sec-title">Talk To About Any <span class="text-theme">Question?</span></h2>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="accordion-area accordion" id="faqAccordion">
                        @foreach($faqs as $faq)
                        <div class="accordion-card style2 @if($faq->id == 1)active @endif">
                            <div class="accordion-header" id="collapse-item-{{$faq->id}}">
                                <button class="accordion-button @if($faq->id != 1)collapsed @endif" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{$faq->id}}" aria-expanded="false" aria-controls="collapse-{{$faq->id}}">{{$faq->title}}</button>
                            </div>
                            <div id="collapse-{{$faq->id}}" class="accordion-collapse collapse  @if($faq->id == 1)show @endif" aria-labelledby="collapse-item-{{$faq->id}}" data-bs-parent="#faqAccordion">
                                <div class="accordion-body">
                                    <p class="faq-text">{!!$faq->description!!}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach


                    </div>
                </div>
            </div>
    
        </div>
    </div>

@endsection