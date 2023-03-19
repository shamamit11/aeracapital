@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    
    <section class="space">
        <div class="container">
            <div class="error-img">
                <img src="{{asset('assets/site/img/theme-img/error.svg')}}" alt="404 image" style="height:350px">
            </div>
            <div class="error-content">
                <h2 class="error-title"><span class="text-theme">OooPs!</span> Page Not Found</h2>
                <p class="error-text">Oops! The page you are looking for does not exist. It might have been moved or deleted.</p>
                <a href="{{ route('home') }}" class="as-btn"><i class="fal fa-home me-2"></i>Back To Home</a>
            </div>
        </div>
    </section>

@endsection