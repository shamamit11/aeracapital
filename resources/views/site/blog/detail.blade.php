@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{$row->title}}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{$row->title}}</li>
                </ul>
            </div>
        </div>
    </div>

    <section class="as-blog-wrapper blog-details space-top space-extra-bottom">
        <div class="container">
            <div class="row">
                <div class="col-xxl-8 col-lg-7">
                    <div class="as-blog blog-single">
                        @if($row->main_image)
                            <div class="blog-img">
                                <img src="{{$row->main_image}}" alt="{{$row->title}}">
                            </div>
                        @endif
                        <div class="blog-content">
                            <div class="blog-meta">
                                <a class="author" href="#">Posted By: {{$row->posted_by}}</a>
                            </div>
                            <h2 class="blog-title">{{$row->title}}</h2>
                            {!!$row->description!!}
                        </div>
                    </div>
                </div>
                <div class="col-xxl-4 col-lg-5">
                    <aside class="sidebar-area">
                        <div class="widget  ">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach($blogs as $blog)
                                    <div class="recent-post">
                                        @if($blog->main_image)
                                            <div class="media-img">
                                                <a href="{{route('blog-detail', [$blog->slug])}}"><img src="{{ $blog->main_image }}" alt="{{$blog->title}}"></a>
                                            </div>
                                        @endif
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