@php
    use App\Models\Setting;
    use App\Models\Seo;
    $settings = Setting::first();
    $currenturl = url()->full();
    
    if (isset($row) && !empty($row)) {
        $meta_title = isset($row->meta_title) && !empty($row->meta_title) ? $row->meta_title : @$settings->meta_title;
        $meta_description = isset($row->meta_description) && !empty($row->meta_description) ? $row->meta_description : @$settings->meta_description;
    } else {
        if (isset($seo_link) && !empty($seo_link)) {
            $seo = SEO::where('url', $seo_link)->first();
            if ($seo) {
                $meta_title = $seo->meta_title;
                $meta_description = $seo->meta_description;
            } else {
                $meta_title = @$settings->meta_title;
                $meta_description = @$settings->meta_description;
            }
        } else {
            $meta_title = @$settings->meta_title;
            $meta_description = @$settings->meta_description;
        }
    }
    
@endphp

<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $meta_title }}</title>
    <meta name="description" content="{{ $meta_description }}" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link rel="canonical" href="{{ $currenturl }}" />
    <meta property="og:title" content="{{ $meta_title }}" />
    <meta property="og:description" content="{{ $meta_description }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="page" />
    <meta property="og:url" content="{{ $currenturl }}" />
    <meta property="og:site_name" content="Aera Capital" />
    <meta property="og:image" content="{{ asset('assets/site/img/logo.svg') }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@AeraCapital" />
    <meta name="twitter:creator" content="@AeraCapital" />
    <meta name="Googlebot" content="follow">
    @if (@$settings->google_site_verification)
        <meta name="google-site-verification" content="{{ @$settings->google_site_verification }}" />
    @endif
    @if (@$settings->google_analytics)
        {!! @$settings->google_analytics !!}
    @endif

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Favicons - Place favicon.ico in the root directory -->
    <link rel="shortcut icon" href="{{ asset('assets/site/img/favicons/favicon.svg') }}">
    <meta name="theme-color" content="#ffffff">

    <!--==============================
 Google Fonts
 ============================== -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,200;0,400;0,500;0,600;0,700;1,200&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/bootstrap.min.css') }}">
    <!-- Fontawesome Icon -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/fontawesome.min.css') }}">
    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/magnific-popup.min.css') }}">
    <!-- Slick Slider -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/slick.min.css') }}">
    <!-- Theme Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/site/css/style.css') }}">

</head>

<body>
    {{-- <div class="preloader ">
        <!-- <button class="as-btn style3 preloaderCls">Cancel Preloader </button> -->
        <div class="preloader-inner">
            <span class="loader">
                <img src="{{ asset('assets/site/img/theme-img/preloader.svg') }}" alt="preloader">
            </span>
        </div>
    </div> --}}