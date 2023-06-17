@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{ asset('assets/site/img/bg/breadcumb-bg.jpg') }}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Business Package</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li>Digital Transformation Package for Existing Business</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="space">
        <div class="container">

            @include('site.includes.alert')
            
            <div class="title-area text-center">
                <h2 class="sec-title">The Ultimate Digital Transformation Package for Existing Businesses</h2>
                <p>Introducing our comprehensive digital transformation package designed specifically for existing businesses seeking to thrive in the ever-evolving digital landscape. Our package encompasses a holistic approach to revolutionizing your operations, processes, and customer experiences. With a team of experienced experts, we will assess your current infrastructure, identify areas for improvement, and implement tailored digital solutions that leverage the latest technologies. From streamlining internal workflows to enhancing customer engagement, our digital transformation package will empower your business to stay ahead of the competition, embrace innovation, and unlock new opportunities for sustainable growth in the digital age.</p>
            </div>

            <div class="achivement-box-area">
                <div class="" style="background-color: #fff !important; padding: 35px;">
                    <div class="row mt-3">
                        <form action="{{$form_action}}" method="POST" enctype="multipart/form-data" id="form">
                            @csrf
                            <input type="hidden" class="form-control" id="package" name="package"
                                value="Business Package">
                            <div class="col-md-12">
                                <h6 class="">Business Consultation</h6>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="planalysis" name="business_consultation[]"
                                                value="Profit and Loss Analysis">
                                            <label for="planalysis">Profit and Loss Analysis</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="costred" name="business_consultation[]"
                                                value="Cost Reduction Management">
                                            <label for="costred">Cost Reduction Management</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="compete" name="business_consultation[]"
                                                value="Competition Analysis">
                                            <label for="compete">Competition Analysis</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="marketshare" name="business_consultation[]"
                                                value="Market Share Development">
                                            <label for="marketshare">Market Share Development</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="marketst" name="business_consultation[]"
                                                value="Marketing Strategies">
                                            <label for="marketst">Marketing Strategies</label>
                                        </div>
                                    </div>
                                </div>
                               
                            </div>
                            <div class="col-md-12 mt-5">
                                <h6 class="">Business Solutions</h6>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="ims" name="business_solutions[]"
                                                value="Inventory Management System">
                                            <label for="ims">Inventory Management System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="hrms" name="business_solutions[]"
                                                value="HR Management System">
                                            <label for="hrms">HR Management System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="crm" name="business_solutions[]" value="CRM System">
                                            <label for="crm">CRM System</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="pms" name="business_solutions[]"
                                                value="Property Management System">
                                            <label for="pms">Property Management System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="gms" name="business_solutions[]"
                                                value="Garage Management System">
                                            <label for="gms">Garage Management System</label>
                                        </div>
                                        <div class="form-group">
                                            <input type="checkbox" id="cms" name="business_solutions[]"
                                                value="Clinic Management System">
                                            <label for="cms">Clinic Management System</label>
                                        </div>
                                    </div>
                                </div>
                                
                                
                            </div>
                            <div class="col-md-12 mt-5">
                                <h6 class="">Development</h6>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="customweb" name="development[]"
                                                value="Custom Web Development">
                                            <label for="customweb">Custom Web Development</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="ecomm" name="development[]"
                                                value="E-commerce Web Development">
                                            <label for="ecomm">E-commerce Web Development</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="mobileapp" name="development[]"
                                                value="Mobile App Development">
                                            <label for="mobileapp">Mobile App Development</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="portal" name="development[]"
                                                value="Portal Development">
                                            <label for="portal">Portal Development</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 mt-5">
                                <h6 class="">Digital Marketing</h6>
                                <hr>
                                <div class="row mt-4">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="seo" name="marketing[]"
                                                value="Search Engine Optimization">
                                            <label for="seo">Search Engine Optimization</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="smm" name="marketing[]"
                                                value="Social Media Marketing">
                                            <label for="smm">Social Media Marketing</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="content" name="marketing[]"
                                                value="Content Marketing">
                                            <label for="content">Content Marketing</label>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="checkbox" id="ppc" name="marketing[]"
                                                value="Pay-Per-Click Campaign">
                                            <label for="ppc">Pay-Per-Click Campaign</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="email" name="marketing[]"
                                                value="Email Marketing">
                                            <label for="email">Email Marketing</label>
                                        </div>
                                        <div class="form-group mt-4">
                                            <input type="checkbox" id="video" name="marketing[]"
                                                value="Video Creation">
                                            <label for="video">Video Creation</label>
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
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control" name="website" id="website"
                                        placeholder="Website (if any)">
                                    <i class="fa fa-globe"></i>
                                </div>
                            </div>
                            <button class="as-btn">Request A Callback<i class="fa fa-arrow-right ms-2"></i></button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </section>

    <div class="space" id="contact-sec" data-bg-src="{{ asset('assets/site/img/bg/appointment_bg_1.jpg') }}">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 pe-xxl-12 mb-40 mb-xl-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">What is the Digital Transformation Package?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        The Digital Transformation Package is a comprehensive solution designed specifically for startup
                        businesses looking to make a big impact in the digital world. It includes a range of services such
                        as website design and development, search engine optimization, social media marketing, email
                        marketing, and more. Our team of experts will work with you to create a customized plan that meets
                        your unique needs and helps you achieve your business goals. Let us help you transform your startup
                        business and take it to the next level.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12 mb-40 mb-xl-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">How can it benefit startup businesses?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        The Digital Transformation Package can benefit startup businesses in many ways. By providing a
                        comprehensive solution that includes website design and development, search engine optimization,
                        social media marketing, email marketing, and more, we can help you establish a strong online
                        presence and reach your target audience more effectively. Our team of experts will work with you to
                        create a customized plan that meets your unique needs and helps you achieve your business goals.
                        With our help, you can transform your startup business and take it to the next level.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">How does the package help businesses achieve their goals?</h2>
                    </div>
                    <p class="mt-n2 text-xl-start text-center">
                        Our Digital Transformation Package is designed to provide startup businesses with a comprehensive
                        set of digital marketing tools and strategies that can help them achieve their goals. By working
                        with our team of experts, businesses can create a customized plan that addresses their unique needs
                        and challenges. Whether it's improving their website's design and functionality, optimizing their
                        content for search engines, or developing a social media marketing strategy, our package provides
                        the resources and support businesses need to succeed in today's digital landscape. With our help,
                        businesses can establish a strong online presence, reach their target audience more effectively, and
                        ultimately grow their business.
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
