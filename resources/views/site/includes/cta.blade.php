@php
    use App\Models\Cta;
    $cta = Cta::where('id', 1)->first();
@endphp

<section class="bg-bottom-right position-relative"
    data-bg-src="{{ asset('assets/site/img/bg/cta_bg_1.png') }}" data-bg-color="#323041">
    <div class="img-half img-left as-video2">
        <img src="{{ @$cta->image }}" alt="{{ @$cta->title }}">
        <a href="{{ @$cta->video }}" class="play-btn popup-video"><i class="fas fa-play"></i></a>
    </div>
    <div class="container">
        <div class="row justify-content-end">
            <div class="col-xl-5 space">
                <div class="title-area mb-35">
                    <span class="sub-title"><img src="{{ asset('assets/site/img/theme-img/title_shape_1.svg') }}"
                            alt="shape">{{ @$cta->caption }}</span>
                    <h2 class="sec-title text-white">{!! @$cta->title !!}</h2>
                </div>
                <p class="mt-n2 mb-30 text-white">{!! @$cta->main_text !!}</p>
                <a href="{{ @$cta->cta_link }}" class="as-btn style3">{{ @$cta->cta_text }}<i
                        class="fa-regular fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </div>
    <div class="shape-mockup" data-bottom="0" data-right="0">
        <div class="particle-1" id="particle-1"></div>
    </div>
</section>
