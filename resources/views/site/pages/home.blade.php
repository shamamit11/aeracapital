@extends('site.layout')
@section('content')
    @include('site.includes.header')
    @include('site.includes.banner')
    @include('site.includes.about')
    @include('site.includes.services')
    @include('site.includes.cta')
    @include('site.includes.feature')
    {{-- @include('site.includes.counter') --}}
    {{-- @include('site.includes.team') --}}
    @include('site.includes.testimonials')
    @include('site.includes.appointment')
    {{-- @include('site.includes.blog') --}}
@endsection