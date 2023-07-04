@php
    use App\Models\Setting;
    use App\Models\SocialLink;
    use App\Models\Product;
    use App\Models\Blog;
    use App\Models\Cms;
    use App\Models\PageSection;
    
    $settings = Setting::first();
    $social_links = SocialLink::first();
    $products = Product::limit(5)->get();
    $blogs = Blog::where('status', 1)
        ->limit(3)
        ->get();
    $cms = Cms::where('is_footer_link', 1)->get();
    $section = PageSection::where('id', 5)->first();
@endphp
<footer class="footer-wrapper footer-layout1">
    <div class="footer-top">
        <div class="logo-bg"></div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-2">
                    <div class="footer-logo">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/site/img/logo-white.svg') }}"
                                alt="Aera Capital"></a>
                    </div>
                </div>
                <div class="col-xl-10">
                    <div class="footer-contact-wrap">
                        <div class="footer-contact">
                            <div class="footer-contact_icon">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-contact_text">Quick Call Us:</span>
                                <a href="tel:{{ @$settings->phone }}"
                                    class="footer-contact_link">{{ @$settings->phone }}</a>
                            </div>
                        </div>
                        <div class="footer-contact">
                            <div class="footer-contact_icon">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-contact_text">Mail Us On:</span>
                                <a href="mailto:{{ @$settings->email }}"
                                    class="footer-contact_link">{{ @$settings->email }}</a>
                            </div>
                        </div>
                        <div class="footer-contact">
                            <div class="footer-contact_icon">
                                <i class="fas fa-location-dot"></i>
                            </div>
                            <div class="media-body">
                                <span class="footer-contact_text">Visit Location:</span>
                                <a href="{{ route('contact') }}"
                                    class="footer-contact_link">{{ @$settings->address }}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="widget-area">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-6 col-xxl-3 col-xl-4">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">{!! @$section->title !!}</h3>
                        <div class="as-widget-about">
                            <p class="about-text">{!! @$section->main_text !!}</p>
                            <div class="as-social">
                                <a href="{{ @$social_links->facebook }}" target="_blank"><i
                                        class="fab fa-facebook-f"></i></a>
                                <a href="{{ @$social_links->twitter }}" target="_blank"><i
                                        class="fab fa-twitter"></i></a>
                                <a href="{{ @$social_links->linkedin }}" target="_blank"><i
                                        class="fab fa-linkedin-in"></i></a>
                                <a href="{{ @$social_links->whatsapp }}" target="_blank"><i
                                        class="fab fa-whatsapp"></i></a>
                                <a href="{{ @$social_links->youtube }}" target="_blank"><i
                                        class="fab fa-youtube"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">Quick Links</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{ route('about') }}">About Us</a></li>
                                <li><a href="{{ route('service') }}">Services We Offer</a></li>
                                {{-- <li><a href="{{route('blog')}}">Blogs</a></li> --}}
                                <li><a href="{{ route('faq') }}">Help & FAQs</a></li>
                                <li><a href="{{ route('contact') }}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget widget_nav_menu footer-widget">
                        <h3 class="widget_title">PRODUCTS</h3>
                        <div class="menu-all-pages-container">
                            <ul class="menu">
                                @foreach ($products as $prod)
                                    <li><a href="{{ route('product-detail', [$prod->slug]) }}">{{ $prod->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-xl-auto">
                    <div class="widget footer-widget">
                        <h3 class="widget_title">Recent Posts</h3>
                        <div class="recent-post-wrap">

                            @foreach ($blogs as $blog)
                                <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{ route('blog-detail', [$blog->slug]) }}"><img
                                                src="{{ $blog->main_image }}" alt="{{ $blog->title }}"></a>
                                    </div>
                                    <div class="media-body">
                                        <h4 class="post-title" style="margin:0; font-size: 15px;"><a
                                                class="text-inherit"
                                                href="{{ route('blog-detail', [$blog->slug]) }}">{{ $blog->title }}</a>
                                        </h4>
                                        <div class="recent-post-meta">
                                            <a href="#"><i
                                                    class="fal fa-calendar-days"></i>{{ $blog->date }}</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-wrap bg-title">
        <div class="container">
            <div class="row justify-content-between align-items-center">
                <div class="col-lg-6">
                    <p class="copyright-text">Copyright © <?php echo date('Y'); ?> <a
                            href="{{ @$settings->vat_no }}">{{ @$settings->business_name }}</a>. All Rights Reserved.
                    </p>
                </div>
                <div class="col-lg-6 text-end d-none d-lg-block">
                    <div class="footer-links">
                        <ul>
                            @foreach ($cms as $c)
                                <li><a href="{{ route('page', [$c->slug]) }}">{{ $c->content->name }}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Scroll To Top -->
<div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
        <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
            style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;">
        </path>
    </svg>
</div>

<a href="https://api.whatsapp.com/send?phone=97145299497&text=Hello"
    class="float" target="_blank">
    <i class="fa-brands fa-whatsapp my-float"></i>
</a>

@include('site.includes.scripts')

@yield('footer-scripts')
</body>

</html>
