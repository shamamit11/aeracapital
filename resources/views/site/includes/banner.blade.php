
@php
    use App\Models\Banner;
    $banners = Banner::where('status', 1)->get();
@endphp
<div class="as-hero-wrapper hero-2" id="hero">
    <div class="hero-slider-2 as-carousel" data-fade="true" data-arrows="true">
        @foreach($banners as $ban)
            <div class="as-hero-slide">
                <div class="as-hero-bg" data-bg-src="{{ $ban->image }}"
                    style="background-image:url('{{ $ban->image }}')"></div>
                <div class="container">
                    <div class="hero-style2">
                        <div class="ripple-shape">
                            <span class="ripple-1"></span><span class="ripple-2"></span><span class="ripple-3"></span><span
                                class="ripple-4"></span><span class="ripple-5"></span><span class="ripple-6"></span>
                        </div>
                        <span class="hero-subtitle" data-ani="slideinleft" data-ani-delay="0.1s">{{ $ban->caption }}</span>
                        <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.3s">{{ $ban->title }}</h1>
                        <h1 class="hero-title" data-ani="slideinleft" data-ani-delay="0.5s">{{ $ban->sub_title }}</h1>
                        <p class="hero-text" data-ani="slideinleft" data-ani-delay="0.7s">{{ $ban->main_text }}</p>
                        <div class="btn-group" data-ani="slideinleft" data-ani-delay="0.9s">
                            <a href="{{ $ban->cta_01_link }}" class="as-btn style3">{{ $ban->cta_01_text }}<i
                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                            <a href="{{ $ban->cta_02_link }}" class="as-btn style2">{{ $ban->cta_02_text }}<i
                                    class="fa-regular fa-arrow-right ms-2"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="hero-shape1">
        <img src="{{ asset('assets/site/img/hero/hero_shape_2_1.png') }}" alt="shape">
    </div>
    <div class="hero-shape2">
        <img src="{{ asset('assets/site/img/hero/hero_shape_2_2.png') }}" alt="shape">
    </div>
    <div class="hero-shape3">
        <img src="{{ asset('assets/site/img/hero/hero_shape_2_3.png') }}" alt="shape">
    </div>
</div>