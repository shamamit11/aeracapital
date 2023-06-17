@php
use App\Models\PageSection;
use App\Models\Setting;
$section = PageSection::where('id', 4)->first();
$settings = Setting::first();
@endphp
    
    <div class="space" id="contact-sec" data-bg-src="{{asset('assets/site/img/bg/appointment_bg_1.jpg')}}">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 pe-xxl-5 mb-40 mb-xl-0">
                    <div class="title-area mb-35 text-xl-start text-center">
                        <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="{{@$section->caption }}">{{@$section->caption }}</span>
                        <h2 class="sec-title">{!! @$section->title !!}</h2>
                    </div>
                    <p class="mt-n2 mb-30 text-xl-start text-center">{!! @$section->main_text !!}</p>
                </div>
                <div class="col-xl-6 ps-xl-4">
                    <h3 class="h4 mt-n2 mb-30 text-center">Make An Appointment</h3>
                    <form action="{{route('contact-form-action')}}" method="POST" class="contact-form ajax-contact" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Your Name">
                                <i class="fa fa-user"></i>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Email Address">
                                <i class="fa fa-envelope"></i>
                            </div>
                            <div class="form-group col-sm-6">
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
                            <div class="form-group col-sm-6">
                                <input type="tel" class="form-control" name="mobile_no" id="mobile_no" placeholder="Mobile Number">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="form-group col-12">
                                <textarea name="remarks" id="remarks" cols="30" rows="3" class="form-control" placeholder="Your Message"></textarea>
                                <i class="fa fa-comment"></i>
                            </div>
                            <div class="form-btn col-12">
                                <button class="as-btn w-100">MAKE AN APPOINTMENT</button>
                            </div>
                        </div>
                        <p class="form-messages mb-0 mt-3"></p>
                    </form>
                </div>
            </div>
        </div>
    </div>