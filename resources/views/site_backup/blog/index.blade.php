@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Blog Post</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>Blog Post</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="as-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    @foreach($blogs as $blog)
                        <div class="as-blog blog-single has-post-thumbnail">
                            <div class="blog-img">
                                <a href="{{route('blog-detail', [$blog->slug])}}"><img src="{{ $blog->main_image }}" alt="{{$blog->title}}"></a>
                            </div>
                            <div class="blog-content">
                                <div class="blog-meta">
                                    <a class="author" href="#">{{$blog->posted_by}}</a>
                                    <a href="#"><i class="fa-light fa-calendar-days"></i>{{$blog->date}}</a>
                                </div>
                                <h2 class="blog-title"><a href="{{route('blog-detail', [$blog->slug])}}">{{$blog->title}}</a>
                                </h2>
                                <p class="blog-text">{{$blog->sub_title}}</p>
                                <a href="{{route('blog-detail', [$blog->slug])}}" class="line-btn">Read More</a>
                            </div>
                        </div>
                    @endforeach

                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget  ">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach($blogs as $blog)
                                    <div class="recent-post">
                                        <div class="media-img">
                                            <a href="{{route('blog-detail', [$blog->slug])}}"><img src="{{ $blog->main_image }}" alt="{{$blog->title}}"></a>
                                        </div>
                                        <div class="media-body">
                                            <h4 class="post-title" style="margin:0; font-size: 16px;"><a class="text-inherit" href="{{route('blog-detail', [$blog->slug])}}">{{$blog->title}}</a></h4>
                                            <div class="recent-post-meta">
                                                <a href="#"><i class="fal fa-calendar-days"></i>{{$blog->date}}</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </div>
    </section>
@endsection