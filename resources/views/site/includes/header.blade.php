@php
    use App\Models\Setting;
    use App\Models\SocialLink;
    use App\Models\Product;

    $settings = Setting::first();
    $social_links = SocialLink::first();
    $products = Product::all();
@endphp

<header class="as-header header-layout1">
    <div class="header-top">
        <div class="container">
            <div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
                <div class="col-auto d-none d-lg-block">
                    <div class="header-links">
                        <ul>
                            <li><i class="fas fa-map-location"></i>{{ @$settings->address }}</li>
                            <li><i class="fas fa-phone"></i><a href="tel:{{ @$settings->phone }}">{{ @$settings->phone }}</a></li>
                            <li><i class="fas fa-envelope"></i><a href="mailto:{{ @$settings->email }}">{{ @$settings->email }}</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="header-social">
                        <span class="social-title">Follow Us On : </span>
                        <a href="{{ @$social_links->facebook }}" target="_blank"><i class="fab fa-facebook-f"></i></a>
                        <a href="{{ @$social_links->twitter }}" target="_blank"><i class="fab fa-twitter"></i></a>
                        <a href="{{ @$social_links->linkedin }}" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                        <a href="{{ @$social_links->instagram }}" target="_blank"><i class="fab fa-instagram"></i></a>
                        <a href="{{ @$social_links->youtube }}" target="_blank"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky-wrapper">
        <!-- Main Menu Area -->
        <div class="menu-area">
            <div class="container">
                <div class="row align-items-center justify-content-between">
                    <div class="col-auto">
                        <div class="header-logo">
                            <a href="{{route('home')}}"><img src="{{ asset('assets/site/img/logo.svg') }}" alt="Aera Capital"></a>
                        </div>
                    </div>
                    <div class="col-auto">
                        <nav class="main-menu d-none d-lg-inline-block">
                            <ul>
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About Us</a></li>
                                <li><a href="{{route('service')}}">Services</a></li>
                                <li class="menu-item-has-children">
                                    <a href="#">Products</a>
                                    <ul class="sub-menu">
                                        @foreach($products as $prod)
                                            <li><a href="{{route('product-detail', [$prod->slug])}}">{{ $prod->title }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                {{-- <li><a href="{{route('blog')}}">Blog</a></li> --}}
                                <li><a href="{{route('contact')}}">Contact</a></li>
                            </ul>
                        </nav>
                        <button type="button" class="as-menu-toggle d-inline-block d-lg-none"><i
                                class="far fa-bars"></i></button>
                    </div>
                </div>
            </div>
            <div class="logo-bg"></div>
        </div>
    </div>
</header>
