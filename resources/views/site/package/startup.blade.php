@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('assets/site/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Startup Package</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Digital Transformation Package for Startup Business</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space-top mb-5">
        <div class="container">
            
            @include('site.includes.alert')

            <div class="title-area text-center">
                <h2 class="sec-title">Transform Your Startup Business with Our Digital Package</h2>
                <p>Are you a startup business looking to make a big impact in the digital world? Our Digital Transformation Package is designed to help you achieve your goals and grow your business. With our expertise in digital marketing and technology, we can help you transform your business and stay ahead of the competition.</p>
            </div>

            

            <div class="achivement-tab filter-menu-active indicator-active"><button data-filter=".cat1" class="active"
                    type="button" onclick="setPackage('Start-up Basic')">Start-up Basic</button> <button data-filter=".cat2" type="button" onclick="setPackage('Start-up Plus')">Start-up Plus</button>
            </div>

            <div class="achivement-box-area filter-active-cat1">
                <div class="filter-item w-100 cat1">
                    <div class="" style="background-color: #fff; padding: 35px;">
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="price-card">
                                    <div class="price-card_top">
                                        {{-- <h3 class="price-card_title">Start-up Basic</h3> --}}
                                        {{-- <p class="price-card_text">Pricing plan for IT Solution company</p> --}}
                                        <h4 class="price-card_price"><span style="text-decoration: line-through">AED
                                                10,000</span> AED
                                            7,000 <span class="duration">/ One-time Setup Price, you will get:</span></h4>
                                    </div>
                                    <div class="price-card_content">
                                        <div class="checklist">
                                            <ul>
                                                <li><i class="fas fa-circle-check"></i> 5-7 Pages Basic Website with
                                                    WordPress CMS</li>
                                                <li><i class="fas fa-circle-check"></i> Domain Name Registration</li>
                                                <li><i class="fas fa-circle-check"></i> Web Hosting and Website Maintenance
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> 2 Email Address</li>
                                                <li><i class="fas fa-circle-check"></i> Business Logo Design</li>
                                                <li><i class="fas fa-circle-check"></i> Letter Head & Business Card Design
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> Google My Business Setup</li>
                                                <li><i class="fas fa-circle-check"></i> Social Media Page Creation (Facebook
                                                    &
                                                    Instagram)</li>
                                                <li><i class="fas fa-circle-check"></i> Human Resource Management System
                                                    (HRMS)</li>
                                                <li><i class="fas fa-circle-check"></i> Free for Lifetime Technical Support
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> Free CMS Training - 2.5 Hours</li>
                                                <li><i class="fas fa-circle-check"></i> Annual Charge: AED 999 / Year</li>
                                                <li><i class="fas fa-circle-check"></i> Go LIVE within 48 Hrs</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="filter-item w-100 cat2">
                    <div class="" style="background-color: #fff; padding: 35px;">
                        <div class="row justify-content-center">
                            <div class="col-xl-12 col-md-12">
                                <div class="price-card">
                                    <div class="price-card_top">
                                        {{-- <h3 class="price-card_title">Start-up Basic</h3> --}}
                                        {{-- <p class="price-card_text">Pricing plan for IT Solution company</p> --}}
                                        <h4 class="price-card_price"><span style="text-decoration: line-through">AED
                                                15,000</span> AED
                                            10,000 <span class="duration">/ One-time Setup Price, you will get:</span></h4>
                                    </div>
                                    <div class="price-card_content">
                                        <div class="checklist">
                                            <ul>
                                                <li><i class="fas fa-circle-check"></i> 10 Pages Standard Website with Custom CMS</li>
                                                <li><i class="fas fa-circle-check"></i> Domain Name Registration</li>
                                                <li><i class="fas fa-circle-check"></i> Web Hosting and Website Maintenance
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> 5 Email Address</li>
                                                <li><i class="fas fa-circle-check"></i> Business Logo Design</li>
                                                <li><i class="fas fa-circle-check"></i> Letter Head & Business Card Design
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> Google My Business Setup</li>
                                                <li><i class="fas fa-circle-check"></i> Social Media Page Creation (Facebook
                                                    &
                                                    Instagram)</li>
                                                <li><i class="fas fa-circle-check"></i> Human Resource Management System
                                                    (HRMS)</li>
                                                <li><i class="fas fa-circle-check"></i> Client Resource Management (CRM)
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> Free for Lifetime Technical Support
                                                </li>
                                                <li><i class="fas fa-circle-check"></i> Free CMS Training - 3.5 Hours</li>
                                                <li><i class="fas fa-circle-check"></i> Annual Charge: AED 1,499 / Year</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="achivement-box-area">
                <div class="" style="background-color: #fff !important; padding: 35px;">
                    <div class="row mt-3">
                        <form action="{{$form_action}}" method="POST" enctype="multipart/form-data" id="form">
                            @csrf
                            <input type="hidden" class="form-control" id="package" name="package" value="Start-up Basic">
                            <div class="col-md-12">
                                <h6 class="">Addons</h6>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="seo" name="addons[]" value="Search Engine Optimization">
                                            <label for="seo">Search Engine Optimization</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="socialmedia" name="addons[]" value="Social Media Campaign">
                                            <label for="socialmedia">Social Media Campaign</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="branding" name="addons[]" value="Branding">
                                            <label for="branding">Branding (Company Profile, Brand Guidelines, Stationary Design)</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="content" name="addons[]" value="Content Writing">
                                            <label for="content">Content Writing</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="mobileapp" name="addons[]" value="Mobile App Development">
                                            <label for="mobileapp">Mobile App Development</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="ppc" name="addons[]" value="PPC Campaign">
                                            <label for="ppc">Pay-Per-Click Campaign</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="inventory" name="addons[]" value="Inventory Management System">
                                            <label for="inventory">Inventory Management System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="crm" name="addons[]" value="CRM System">
                                            <label for="crm">CRM System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="ecomm" name="addons[]" value="E-commerce Development">
                                            <label for="ecomm">E-commerce Development</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12 mt-5">
                                <h6 class="">Provide Your Information</h6>
                                <hr>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" placeholder="Your Name" value="{{ old('name')}}">
                                    <i class="fa fa-user"></i>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" id="email" placeholder="Email Address" value="{{ old('email')}}">
                                    <i class="fa fa-envelope"></i>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror" name="mobile" id="mobile" placeholder="Mobile / Phone Number" value="{{ old('mobile')}}">
                                    <i class="fa fa-phone"></i>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control @error('company') is-invalid @enderror" name="company" id="company" placeholder="Company Name" value="{{ old('company')}}">
                                    <i class="fa fa-building"></i>
                                    @error('company')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <button class="as-btn" type="submit">Request A Callback<i class="fa fa-arrow-right ms-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="mt-5 text-center">
                <h5>Are you an Existing Business looking for Digital Transformation?</h5>
                <p>Our package encompasses a holistic approach to revolutionizing your operations, processes, and customer experiences.</p>
                <a href="{{route('digital-transformation-existing')}}" class="as-btn">Click Here</a>
            </div>
        </div>
    </section>

    <div class="space" id="contact-sec" data-bg-src="{{asset('assets/site/img/bg/appointment_bg_1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pe-xxl-12 mb-40 mb-xl-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">What is the Digital Transformation Package?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        The Digital Transformation Package is a comprehensive solution designed specifically for startup businesses looking to make a big impact in the digital world. It includes a range of services such as website design and development, search engine optimization, social media marketing, email marketing, and more. Our team of experts will work with you to create a customized plan that meets your unique needs and helps you achieve your business goals. Let us help you transform your startup business and take it to the next level.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12 mb-40 mb-xl-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">How can it benefit startup businesses?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        The Digital Transformation Package can benefit startup businesses in many ways. By providing a comprehensive solution that includes website design and development, search engine optimization, social media marketing, email marketing, and more, we can help you establish a strong online presence and reach your target audience more effectively. Our team of experts will work with you to create a customized plan that meets your unique needs and helps you achieve your business goals. With our help, you can transform your startup business and take it to the next level.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">How does the package help businesses achieve their goals?</h2>
                    </div>
                    <p class="mt-n2 text-xl-start text-center">
                        Our Digital Transformation Package is designed to provide startup businesses with a comprehensive set of digital marketing tools and strategies that can help them achieve their goals. By working with our team of experts, businesses can create a customized plan that addresses their unique needs and challenges. Whether it's improving their website's design and functionality, optimizing their content for search engines, or developing a social media marketing strategy, our package provides the resources and support businesses need to succeed in today's digital landscape. With our help, businesses can establish a strong online presence, reach their target audience more effectively, and ultimately grow their business.
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script>
        function setPackage(val) {
            document.getElementById("package").value = val;
        }
    </script>
@endsection
