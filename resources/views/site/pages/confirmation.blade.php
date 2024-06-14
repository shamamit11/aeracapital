@extends('site.layout')
@section('content')
    @include('site.includes.header-inner')
    
    <section class="space">
        <div class="container">
            <div class="error-content">
                <h2 class="error-title"><span class="text-theme">Confirmation !!</span></h2>
                <p class="error-text">Thank you for submitting your information! We appreciate your interest and will review the information you provided promptly. Our team is dedicated to delivering exceptional service, and we will be in touch with you shortly to discuss your needs in more detail.  </p>
                <a href="{{ route('home') }}" class="as-btn"><i class="fa fa-home me-2"></i>Back To Home</a>
            </div>
        </div>
    </section>

@endsection
@section('footer-scripts')
       <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=AW-11138558949"></script>
    <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());

    gtag('config', 'AW-11138558949');
    </script>
@endsection