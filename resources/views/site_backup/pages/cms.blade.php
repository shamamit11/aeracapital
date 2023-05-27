@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    <div class="breadcumb-wrapper " data-bg-src="{{asset('assets/site/img/bg/breadcumb-bg.jpg')}}">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">{{ $row->name }}</h1>
                <ul class="breadcumb-menu">
                    <li><a href="{{route('home')}}">Home</a></li>
                    <li>{{ $row->name }}</li>
                </ul>
            </div>
        </div>
    </div>
    
    <div class="py-50">
        <div class="container">
            {!! $row->description !!}
        </div>
    </div>

@endsection