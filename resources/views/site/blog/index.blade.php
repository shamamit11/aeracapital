@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Blog Post</h1>
                <ul class="breadcumb-menu">
                    <li><a href="./">Home</a></li>
                    <li>Blog Post</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="as-blog-wrapper space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-12 col-lg-12">
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
            </div>
        </div>
    </section>
@endsection