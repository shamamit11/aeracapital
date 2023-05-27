@php
    use App\Models\Service;
    $services = Service::where('status', 1)->limit(6)->orderBy('order', 'asc')->get();
@endphp

    <section class="service-sec space" id="service-sec" data-bg-src="{{asset('assets/site/img/bg/service_bg_1.png')}}">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-md-7 col-sm-10 px-xl-4">
                    <div class="title-area text-center">
                        <span class="sub-title"><img src="{{asset('assets/site/img/theme-img/title_shape_1.svg')}}" alt="shape">OUR SERVICES</span>
                        <h2 class="sec-title">We Provide Exclusive <span class="text-theme"> Service</span> For Your Business</h2>
                    </div>
                </div>
            </div>

            <div class="row gy-4">

                @foreach($services as $service)
                    <div class="col-md-6 col-xl-4">
                        <div class="service-card">
                            <div class="service-card_number">{{ $service->order }}</div>
                            <div class="shape-icon">
                                <img src="{{ $service->icon }}" alt="{{ $service->title }}">
                                <span class="dots"></span>
                            </div>
                            <h3 class="box-title"><a href="{{route('service', [$service->slug])}}">{{ $service->title }}</a></h3>
                            <p class="service-card_text">{{ $service->sub_description }}</p>
                            <a href="{{route('service-detail', [$service->slug])}}" class="as-btn">Read More<i class="fa fa-arrow-right ms-2"></i></a>
                            <div class="bg-shape">
                                <img src="{{asset('assets/site/img/bg/service_card_bg.png')}}" alt="bg">
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{route('service')}}" class="as-btn">VIEW ALL SERVICES<i class="fa fa-arrow-right ms-2"></i></a>
            </div>
        </div>
    </section>