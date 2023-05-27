
@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Contact Us</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="map-sec">
        {!! @$settings->google_map !!}
    </div>

    <div class="bg-smoke space">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="{{@$section->caption }}">{{@$section->caption }}</span>
                        <h2 class="sec-title">{!! @$section->title !!}</h2>
                        <p class="sec-text">{!! @$section->main_text !!}</p>
                    </div>
                    <form action="{{route('contact-form-action')}}" method="POST" class="contact-form ajax-contact" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <select name="service" id="service" class="form-select">
                                    <option value="" disabled selected hidden>Select Subject</option>
                                    <option value="Website Development">Website Development</option>
                                    <option value="Custom Web Development">Custom Web Development</option>
                                    <option value="Mobile App Development">Mobile App Development</option>
                                    <option value="E-commerce Solutions">E-commerce Solutions</option>
                                    <option value="Digital Marketing Solutions">Digital Marketing Solutions</option>
                                    <option value="Search Engine Optimization">Search Engine Optimization</option>
                                    <option value="CRM / ERP Solutions">CRM / ERP Solutions</option>
                                </select>
                                <i class="fa fa-chevron-down"></i>
                            </div>
                            <div class="form-group col-md-6">
                                <input type="tel" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile Number">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="form-btn text-xl-start text-center col-12">
                                <button class="as-btn">Send Message<i class="fa fa-arrow-right ms-2"></i></button>
                            </div>
                        </div>
                        <strong>
                            <p class="form-messages mb-0 mt-3"></p>
                        </strong>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection