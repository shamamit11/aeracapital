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
                <p>Introducing our comprehensive digital transformation package designed specifically for existing
                    businesses seeking to thrive in the ever-evolving digital landscape. Our package encompasses a holistic
                    approach to revolutionizing your operations, processes, and customer experiences. With a team of
                    experienced experts, we will assess your current infrastructure, identify areas for improvement, and
                    implement tailored digital solutions that leverage the latest technologies. From streamlining internal
                    workflows to enhancing customer engagement, our digital transformation package will empower your
                    business to stay ahead of the competition, embrace innovation, and unlock new opportunities for
                    sustainable growth in the digital age.</p>
            </div>

            <div class="achivement-box-area">
                <div class="" style="background-color: #fff !important; padding: 35px;">
                    <div class="row mt-3">
                        <form action="{{ $form_action }}" method="POST" enctype="multipart/form-data" id="form">
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
                                            <input type="checkbox" id="crm" name="business_solutions[]"
                                                value="CRM System">
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
                                    <input type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" placeholder="Your Name"
                                        value="{{ old('name') }}">
                                    <i class="fa fa-user"></i>
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" placeholder="Email Address"
                                        value="{{ old('email') }}">
                                    <i class="fa fa-envelope"></i>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control @error('mobile') is-invalid @enderror"
                                        name="mobile" id="mobile" placeholder="Mobile / Phone Number"
                                        value="{{ old('mobile') }}">
                                    <i class="fa fa-phone"></i>
                                    @error('mobile')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mt-4">
                                    <input type="text" class="form-control @error('company') is-invalid @enderror"
                                        name="company" id="company" placeholder="Company Name"
                                        value="{{ old('company') }}">
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
                        <h2 class="sec-title">Digital Transformation: What It Is and Why It Matters?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        Digital transformation is the profound and strategic integration of digital technologies into all
                        aspects of a business, leading to significant changes in how organizations operate and deliver value
                        to their customers. It goes beyond merely adopting new tools or automating processes; it entails a
                        fundamental shift in mindset, culture, and operational models. In today's rapidly evolving digital
                        landscape, where technology is reshaping industries and customer expectations are constantly
                        evolving, embracing digital transformation is no longer a choice but a necessity for businesses to
                        remain competitive. It enables organizations to leverage the power of digital innovations such as
                        artificial intelligence, cloud computing, big data analytics, and the Internet of Things (IoT) to
                        optimize operations, enhance customer experiences, drive innovation, and unlock new revenue streams.
                        By harnessing the potential of digital transformation, businesses can adapt to changing market
                        dynamics, identify new growth opportunities, and future-proof their operations in an increasingly
                        digital-first world.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12 mb-40 mb-xl-40">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">How to Implement a Digital Transformation Strategy for Your Business?</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">
                        Implementing a digital transformation strategy for your business requires careful planning and
                        execution to ensure its success. First and foremost, it is essential to gain a deep understanding of
                        your business goals, customer needs, and market dynamics. This will help define the specific areas
                        where digital transformation can have the most impact. Next, assemble a cross-functional team of
                        stakeholders who will champion the transformation process and collaborate on developing a
                        comprehensive roadmap. Assess your existing technology infrastructure and identify gaps that need to
                        be addressed. Embrace a culture of innovation and encourage your employees to adapt to change by
                        providing training and support. Prioritize investments in digital technologies that align with your
                        strategic objectives and have the potential to deliver tangible benefits. Finally, monitor and
                        evaluate the progress of your digital transformation initiatives, making adjustments as needed, and
                        continuously seek opportunities for further optimization and innovation. By following these steps,
                        your business can navigate the digital transformation journey effectively and unlock its full
                        potential for growth and success.
                    </p>
                </div>

                <div class="col-xl-12 pe-xxl-12">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <h2 class="sec-title">Digital Transformation Packages for Small and Medium-Sized Businesses</h2>
                    </div>
                    <p class="mt-n2 text-xl-start text-center">
                        Our tailored digital transformation packages are specifically designed to empower small and
                        medium-sized businesses (SMBs) to embark on a successful digital transformation journey. Recognizing
                        the unique challenges and resource limitations faced by SMBs, our packages offer comprehensive
                        solutions that are scalable, cost-effective, and customized to meet the specific needs of your
                        business. We start by conducting a thorough assessment of your existing operations, technology
                        infrastructure, and customer engagement channels. Based on these insights, we develop a roadmap that
                        outlines the key digital initiatives needed to drive transformation and achieve your business goals.
                        Our packages encompass a wide range of services, including technology implementation, process
                        automation, data analytics, cloud migration, and digital marketing strategies. We provide ongoing
                        support and training to ensure a smooth transition and maximize the value derived from the digital
                        transformation process. With our expertise and tailored approach, SMBs can unlock new growth
                        opportunities, enhance operational efficiency, improve customer experiences, and stay competitive in
                        the digital age.
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
