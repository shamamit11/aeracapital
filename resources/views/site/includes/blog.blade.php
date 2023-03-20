@php
use App\Models\Client;
use App\Models\Blog;
$blogs = Blog::where('status', 1)->limit(5)->get();
$clients = Client::where('status', 1)->get();
@endphp
    <section class="bg-top-right overflow-hidden space" id="blog-sec"
        data-bg-src="{{ asset('assets/site/img/bg/blog_bg_1.png') }}">

        @if(count($blogs) > 0)
        <div class="container space-bottom">
            <div class="title-area text-center">
                <span class="sub-title"><img src="{{ asset('assets/site/img/theme-img/title_shape_1.svg') }}"
                        alt="shape">NEWS & ARTICLES</span>
                <h2 class="sec-title">Get Every Single Update <span class="text-theme">Blog</span></h2>
            </div>
            <div class="row slider-shadow as-carousel" data-slide-show="3" data-lg-slide-show="2" data-md-slide-show="2"
                data-sm-slide-show="1" data-arrows="true">

                @foreach($blogs as $blog)
                <div class="col-md-6 col-xl-4">
                    <div class="blog-card">
                        <div class="blog-img">
                            <img src="{{ $blog->main_image }}" alt="{{$blog->title}}">
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a href="#"><i class="fal fa-calendar-days"></i>{{$blog->date}}</a>
                            </div>
                            <h3 class="box-title"><a href="{{route('blog-detail', [$blog->slug])}}">{{$blog->title}}</a></h3>
                            <div class="blog-bottom">
                                <a href="#" class="author"> {{$blog->posted_by}}</a>
                                <a  href="{{route('blog-detail', [$blog->slug])}}" class="line-btn">Read More<i
                                        class="fas fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
        @endif

        @if(count($clients) > 0)
            <div class="container">
                <div class="row as-carousel" id="brandSlide1" data-slide-show="5" data-lg-slide-show="4"
                    data-md-slide-show="3" data-sm-slide-show="3" data-xs-slide-show="2">
                    @foreach($clients as $client)
                        <div class="col-auto">
                            <div class="brand-box">
                                <img src="{{ $client->image }}" alt="{{ $client->name }}" style="height:80px;">
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="shape-mockup" data-bottom="0" data-left="0">
            <div class="particle-2 small" id="particle-4"></div>
        </div>
    </section>
