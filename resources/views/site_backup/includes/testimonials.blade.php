    
    @php
        use App\Models\PageSection;
        use App\Models\Testimonial;
        $section = PageSection::where('id', 3)->first();
        $testimonials = Testimonial::where('status', 1)->orderBy('order', 'asc')->limit(4)->get();
    @endphp
    <section class="overflow-hidden space" data-bg-src="{{asset('assets/site/img/bg/testi_bg_1.jpg')}}" data-overlay="overlay1" data-opacity="9">
        <div class="container z-index-common">
            <div class="row align-items-center">
                <div class="col-xl-5">
                    <div class="pe-xxl-5 text-xl-start text-center">
                        <div class="title-area mb-35">
                            <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="{{ @$section->caption }}">{{ @$section->caption }}</span>
                            <h2 class="sec-title text-white">{!! @$section->title !!}</h2>
                        </div>
                        <p class="mt-n2 mb-35 text-white">{!! @$section->main_text !!}</p>
                    </div>
                </div>
                <div class="col-xl-7 mt-40 mt-xl-0">
                    <div class="testi-card-area">
                        <div class="testi-card-slide as-carousel" id="testiSlide1" data-slide-show="1" data-fade="true">

                            @foreach($testimonials as $item)
                                <div>
                                    <div class="testi-card">
                                        <div class="testi-card_review">
                                            {{Helper::getRatingStar($item->rating)}}
                                        </div>
                                        <p class="testi-card_text">“{!! $item->review !!}”</p>
                                        <div class="testi-card_profile">
                                            <div class="testi-card_avater">
                                                <img src="{{$item->image}}" alt="{{$item->name}}">
                                            </div>
                                            <div class="media-body">
                                                <h3 class="testi-card_name">{{$item->name}}</h3>
                                                <span class="testi-card_desig">{{$item->position}}</span>
                                            </div>
                                        </div>
                                        <div class="testi-card_quote">
                                            <img src="{{asset('assets/site/img/icon/quote_left.svg')}}" alt="quote">
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="testi-card-tab" data-asnavfor="#testiSlide1">
                            @php $cnt = 0 @endphp
                            @foreach($testimonials as $item)
                                <div class="tab-btn @if($cnt==0) active @endif">
                                    <img src="{{$item->image}}" alt="{{$item->name}}">
                                </div>
                                @php $cnt++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>