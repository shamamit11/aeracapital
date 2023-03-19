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
                    <div class="contact-feature-wrap">
                        <div class="contact-feature">
                            <div class="icon-btn">
                                <i class="fa-solid fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Call Us On:</p>
                                <a href="tel:{{ @$settings->phone }}" class="contact-feature_link">{{ @$settings->phone }}</a>
                            </div>
                        </div>
                        <div class="contact-feature">
                            <div class="icon-btn">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <p class="contact-feature_label">Quick Mail Us:</p>
                                <a href="mailto:{{ @$settings->email }}" class="contact-feature_link" style="font-size: 15px">{{ @$settings->email }}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 ps-xl-4">
                    <h3 class="h4 mt-n2 mb-30 text-center">Make An Appointment</h3>
                    <form action="mail.php" method="POST" class="appoitment-form ajax-contact">
                        <div class="row">
                            <div class="form-group col-sm-6">
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name">
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="email" class="form-control" name="email" id="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group col-sm-6">
                                <select name="subject" id="subject" class="form-select">
                                    <option value="" disabled selected hidden>Select Subject</option>
                                    <option value="IT Consult">IT Consult</option>
                                    <option value="UI/UX Design">UI/UX Design</option>
                                    <option value="Branding Solution">Branding Solution</option>
                                    <option value="Product Marketing">Product Marketing</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
                                <input type="tel" class="form-control" name="number" id="number" placeholder="Phone Number">
                            </div>
                            <div class="form-group col-12">
                                <textarea name="message" id="message" cols="30" rows="3" class="form-control" placeholder="Write Your Message"></textarea>
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