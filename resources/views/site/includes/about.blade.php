@php
    use App\Models\PageSection;
    use App\Models\Setting;
    $section = PageSection::where('id', 1)->first();
    $settings = Setting::first();
@endphp
    <div class="space" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 mb-30 mb-xl-0">
                    <div class="img-box1">
                        <div class="img1">
                            <img src="{{ @$section->image }}" alt="{{@$section->caption }}">
                        </div>
                        {{-- <div class="shape1">
                            <img src="{{ asset('assets/site/img/normal/about_shape_1.png')}}" alt="shape">
                        </div> --}}
                        <div class="year-counter">
                            <h3 class="year-counter_number"><span class="counter-number">25</span></h3>
                            <p class="year-counter_text">Years Experience</p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="ps-xxl-4 ms-xl-3">
                        <div class="title-area mb-35">
                            <span class="sub-title"><img src="{{ asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="shape">{{ @$section->caption }}</span>
                            <h2 class="sec-title">{!! @$section->title !!}</h2>
                        </div>
                        <p class="mt-n2 mb-25">{!! @$section->main_text !!}</p>
                        <div class="about-feature-wrap">
                            <div class="about-feature">
                                <div class="about-feature_icon">
                                    <img src="{{ @$section->icon_01 }}" alt="{{ @$section->icon_01_caption }}">
                                </div>
                                <div class="media-body">
                                    <h3 class="about-feature_title">{{ @$section->icon_01_caption }}</h3>
                                    <p class="about-feature_text">{{ @$section->icon_01_text }}</p>
                                </div>
                            </div>
                            <div class="about-feature">
                                <div class="about-feature_icon">
                                    <img src="{{ @$section->icon_02 }}" alt="{{ @$section->icon_02_caption }}">
                                </div>
                                <div class="media-body">
                                    <h3 class="about-feature_title">{{ @$section->icon_02_caption }}</h3>
                                    <p class="about-feature_text">{{ @$section->icon_02_text }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="btn-group">
                            {{-- <a href="{{ route('about') }}" class="as-btn">DISCOVER MORE<i class="fa-regular fa-arrow-right ms-2"></i></a> --}}
                            <div class="call-btn">
                                <div class="play-btn">
                                    <i class="fas fa-phone"></i>
                                </div>
                                <div class="media-body">
                                    <span class="btn-text">Call Us On:</span>
                                    <a href="tel:{{ $settings->phone }}" class="btn-title">{{ $settings->phone }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>