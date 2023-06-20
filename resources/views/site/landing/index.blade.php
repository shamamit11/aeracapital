@php
    use App\Models\Setting;
    use App\Models\Seo;
    $settings = Setting::first();
    $currenturl = url()->full();

    if (isset($landing) && !empty($landing)) {
        $meta_title = @$landing->meta_title;
        $meta_description = @$landing->meta_description;
    } else {
        $meta_title = @$settings->meta_title;
        $meta_description = @$settings->meta_description;
    }
@endphp
<!DOCTYPE html>
<html lang="en-AE">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ @$meta_title }}</title>
    <meta name="description" content="{{ @$meta_description }}" />
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    <link rel="canonical" href="{{ $currenturl }}" />
    <meta property="og:title" content="{{ @$meta_title }}" />
    <meta property="og:description" content="{{ @$meta_description }}" />
    <meta property="og:locale" content="en_AE" />
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

    <!-- CSS only -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/landing/css/bootstrap.min.css') }}">
    <!-- Font Awesome 6 -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/landing/css/jquery.fancybox.min.css') }}">
    <!-- style -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/style.css') }}">
    <!-- responsive -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/responsive.css') }}">
    <!-- color -->
    <link rel="stylesheet" href="{{ asset('assets/landing/css/color.css') }}">
</head>

<body>
    <a href="https://api.whatsapp.com/send?phone=97145299497&text=Hello" class="float" target="_blank">
        <i class="fa-brands fa-whatsapp my-float"></i>
    </a>

    <header id="">
        <div class="container">
            <div class="nav">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img alt="logo" src="{{ asset('assets/landing/img/aeralogo.svg') }}" height="50">
                    </a>
                </div>
                <div class="callto">
                    <a href="tel:+97145299497">+971 452 99497</a>
                    <i>
                        <svg fill="none" height="112" viewBox="0 0 24 24" width="112"
                            xmlns="http://www.w3.org/2000/svg">
                            <g clip-rule="evenodd" fill="rgb(0,0,0)" fill-rule="evenodd">
                                <path
                                    d="m7 2.75c-.41421 0-.75.33579-.75.75v17c0 .4142.33579.75.75.75h10c.4142 0 .75-.3358.75-.75v-17c0-.41421-.3358-.75-.75-.75zm-2.25.75c0-1.24264 1.00736-2.25 2.25-2.25h10c1.2426 0 2.25 1.00736 2.25 2.25v17c0 1.2426-1.0074 2.25-2.25 2.25h-10c-1.24264 0-2.25-1.0074-2.25-2.25z" />
                                <path
                                    d="m10.25 5c0-.41421.3358-.75.75-.75h2c.4142 0 .75.33579.75.75s-.3358.75-.75.75h-2c-.4142 0-.75-.33579-.75-.75z" />
                                <path
                                    d="m9.25 19c0-.4142.33579-.75.75-.75h4c.4142 0 .75.3358.75.75s-.3358.75-.75.75h-4c-.41421 0-.75-.3358-.75-.75z" />
                            </g>
                        </svg>
                    </i>
                </div>
            </div>
        </div>
    </header>
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="col-xl-6">
                    <div class="hero-section-text">
                        <h1>{{ $landing->hero_title }}</h1>
                        <p>{{ $landing->hero_description }}</p>
                        <div class="video">
                            @if($landing->video)
                                <div class="play-button">
                                    <a data-fancybox="" href="{{ @$landing->video }}">
                                        <i>
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" width="35" height="56"
                                                viewBox="0 0 35 56">
                                                <defs>
                                                    <clipPath id="clip-video_arrow">
                                                        <rect width="35" height="56"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="video_arrow" data-name="video arrow"
                                                    clip-path="url(#clip-video_arrow)">
                                                    <path data-name="Shape 1" d="M1362,5000.8,1327,4972V5027Z"
                                                        transform="translate(-1326.998 -4971.996)" fill="rgba(0,0,0,0)">
                                                    </path>
                                                    <path id="Shape_1_-_Outline" data-name="Shape 1 - Outline"
                                                        d="M1333,5015.017l19.29-14.437L1333,4984.7v30.313M1327,5027V4972l35,28.807Z"
                                                        transform="translate(-1326.998 -4971.996)"></path>
                                                </g>
                                            </svg>
                                        </i>
                                        <span>
                                            Watch Overview
                                        </span>
                                    </a>
                                </div>
                            @endif
                            <div class="review">
                                <h2>4.9 <span>out of 5</span></h2>
                                <ul class="star">
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                    <li><i class="fa-solid fa-star"></i></li>
                                </ul>
                                <img alt="img" src="{{ asset('assets/landing/img/google.png') }}">
                            </div>
                        </div>
                        <img alt="img" class="dots" src="{{ asset('assets/landing/img/dots.png') }}">
                    </div>
                </div>
                <div class="col-xl-6">
                    <form role="form" class="get-a-quote" id="contact-form" method="post"
                        action={{ route('landing-form-action') }} enctype="multipart/form-data">
                        @csrf
                        <div class="mb-lg-4 mb-4 d-flex align-items-center">
                            <i>
                                <svg enable-background="new 0 0 124 124" height="52" viewBox="0 0 124 124"
                                    width="52" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="m82.899 50.646c-6.059 0-10.988-4.918-10.988-10.963s4.929-10.963 10.988-10.963 10.988 4.918 10.988 10.963-4.929 10.963-10.988 10.963zm0-17.979c-3.877 0-7.031 3.147-7.031 7.015s3.154 7.015 7.031 7.015 7.031-3.147 7.031-7.015-3.154-7.015-7.031-7.015z" />
                                    <path
                                        d="m122.558 2.183c-.069-.986-.853-1.773-1.841-1.848-14.728-1.125-41.975-.347-58.941 17.482-.002.002-.005.004-.007.007-2.3 2.441-4.418 5.209-6.382 8.136-24.65 8.882-35.589 25.07-38.168 33.298-.376 1.202.496 2.487 1.756 2.582l17.94 1.359c-1.478 3.901-2.824 7.823-4.017 11.748-.215.706-.02 1.472.504 1.992l11.995 11.891c.513.508 1.288.703 1.98.495 4-1.194 7.996-2.545 11.97-4.027l1.381 17.923c.097 1.253 1.377 2.122 2.581 1.752 7.562-2.328 24.216-13.247 33.545-37.919 2.953-1.954 5.73-4.064 8.153-6.359 17.668-16.682 18.58-43.82 17.551-58.512-.07-.987 1.029 14.692 0 0zm-3.878 2.008c.413 7.551.219 17.908-2.38 28.202l-26.124-25.897c10.42-2.625 20.888-2.767 28.504-2.305zm-96.722 53.877c3.21-7.053 12.265-18.732 29.892-26.418-2.945 5.084-5.502 10.331-7.777 15.002-2.04 4.172-3.917 8.403-5.638 12.665zm42.549 42.183-1.267-16.452c4.264-1.695 8.496-3.541 12.668-5.545 4.732-2.244 10.045-4.763 15.169-7.669-7.959 17.563-19.588 26.513-26.57 29.666zm37.752-42.448c-7.489 7.094-18.422 12.277-28.076 16.854-8.762 4.212-17.778 7.744-26.816 10.507l-10.293-10.205c2.785-8.95 6.346-17.879 10.592-26.562 4.394-9.022 9.862-20.251 17.01-27.839 5.992-6.295 13.426-10.299 21.11-12.794l29.252 28.998c-2.497 7.687-6.497 15.108-12.779 21.041z" />
                                    <path
                                        d="m4.185 122.808c-1.728 0-2.631-2.145-1.437-3.378l27.357-28.26c1.788-1.841 4.666.918 2.874 2.77l-27.357 28.259c-.392.405-.914.609-1.437.609z" />
                                    <path
                                        d="m23.435 124c-1.688 0-2.609-2.063-1.493-3.318l17.73-19.91c1.71-1.913 4.7.723 2.987 2.648l-17.73 19.91c-.394.444-.943.67-1.494.67z" />
                                    <path
                                        d="m2.982 104.917c-1.688 0-2.609-2.063-1.493-3.318l17.731-19.91c1.709-1.914 4.7.724 2.987 2.648l-17.731 19.91c-.395.444-.943.67-1.494.67z" />
                                </svg>
                            </i>
                            <div>
                                <p class="p-0">For Professional Consultancy</p>
                                <h2>Request A Callback</h2>
                            </div>
                        </div>
                        <div class="group-img">
                            <input type="text" name="contact_name" id="contact_name" placeholder="Your Name" required>
                        </div>
                        <div class="group-img">
                            <input type="email" name="email_address" id="email_address" placeholder="Email Address" required>
                        </div>
                        <div class="group-img">
                            <input type="text" name="mobile_no" id="mobile_no" placeholder="Mobile Number"
                                required>
                        </div>


                        <div class="group-img">
                            <input type="text" name="company_name" id="company_name" placeholder="Company Name"
                                required>
                        </div>
                        <p>Brief about your requirement: </p>

                        <div class="">
                            <textarea rows="4" name="message" id="message"></textarea>
                        </div>

                        <input type="hidden" name="slug" id="slug" value="{{$landing->slug}}">
                        <button type="submit" class="btn batton">Book a Free Consultation</button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="mb-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="@if($landing->image_01) col-lg-7 @else col-lg-12 @endif">
                    <div class="heading">
                        <h2>{{ $landing->intro_title }}</h2>
                    </div>
                    <div class="we-are">
                        {{  $landing->intro_description }}
                    </div>
                </div>
                @if($landing->image_01)
                    <div class="col-lg-5">
                        <div class="we-are-img">
                            <img alt="{{ $landing->hero_title }}" alt="{{ $landing->hero_title }}" src="{{ $landing->image_01 }}">
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </section>

    <section class="how-it-works gap">
        <div class="container">
          <div class="heading">
              <h2>{{ $landing->content_title }}</h2>
          </div>
          <div class="row">
              <div class="col-xs-12">
                 {!! $landing->description !!}
              </div>
          </div>
        </div>
    </section>

    <div id="contact" style="position: relative; bottom: 60px;">
        <div class="container">
            <div class="col-xl-12">
                <div class="location">
                    <div class="address">
                        <i>
                            <svg height="512" viewBox="0 0 24 24" width="512"
                                xmlns="http://www.w3.org/2000/svg">
                                <g id="pin">
                                    <path
                                        d="m12 22c-.3632813 0-.6972656-.1967773-.8740234-.5141602l-2.3066406-4.1518555c-2.897461-1.2597655-4.819336-4.1606445-4.819336-7.3339843 0-4.4111328 3.5888672-8 8-8s8 3.5888672 8 8c0 3.1733398-1.921875 6.0742188-4.8193359 7.3339844l-2.3066406 4.1518555c-.1767579.3173828-.5107422.5141601-.8740235.5141601zm0-18c-3.3085938 0-6 2.6914063-6 6 0 2.4736328 1.5576172 4.7265625 3.8769531 5.605957.2207031.0839844.4052734.2431641.5195313.4492188l1.6035156 2.8857422 1.6035156-2.8857422c.1142578-.2060547.2988281-.3652344.5195313-.4492188 2.3193359-.8793945 3.8769531-3.1323242 3.8769531-5.605957 0-3.3085937-2.6914062-6-6-6zm0 9c-1.6542969 0-3-1.3457031-3-3s1.3457031-3 3-3 3 1.3457031 3 3-1.3457031 3-3 3zm0-4c-.5517578 0-1 .4487305-1 1s.4482422 1 1 1 1-.4487305 1-1-.4482422-1-1-1z">
                                    </path>
                                </g>
                            </svg>
                        </i>
                        <h6>Address:</h6>
                        <p>Office 2408, The Regal Tower, Business Bay<br>United Arab Emirates</p>
                    </div>
                    <div class="boder-line"></div>
                    <div class="address">
                        <i>
                            <svg width="800px" height="800px" viewBox="-0.5 0 25 25" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M16.0562 18.0437L6.45618 8.45374" stroke="#0F0F0F" stroke-miterlimit="10"
                                    stroke-linecap="round" stroke-linejoin="round"></path>
                                <path
                                    d="M9.94623 8.45373C11.1462 7.25373 11.1462 5.29373 9.94623 4.09373C8.49623 2.64373 6.15622 2.64373 4.71622 4.09373L3.40623 5.40374C2.20623 6.60374 2.20623 8.56374 3.40623 9.76374L5.14622 11.5037L12.9962 19.3537L14.7362 21.0937C15.9362 22.2937 17.8962 22.2937 19.0962 21.0937L20.4062 19.7837C21.8562 18.3337 21.8562 15.9937 20.4062 14.5537C19.2062 13.3537 17.2462 13.3537 16.0462 14.5537"
                                    stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M13.9363 7.39374C14.6963 7.39374 15.4663 7.68374 16.0563 8.27374C16.6463 8.86374 16.9363 9.63374 16.9363 10.3937"
                                    stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                                <path
                                    d="M14.6462 4.18372C16.0462 4.18372 17.4563 4.72372 18.5363 5.79372C19.6063 6.86372 20.1462 8.28372 20.1462 9.68372"
                                    stroke="#0F0F0F" stroke-miterlimit="10" stroke-linecap="round"
                                    stroke-linejoin="round"></path>
                            </svg>
                        </i>
                        <h6>Connect with us:</h6>
                        <p>Office:<a href="tel:+97145299497">+971 4 529 9497</a></p>
                        <p>Mobile:<a href="tel:+971503458335">+971 50 345 8335</a></p>
                    </div>
                    <div class="boder-line"></div>
                    <div class="address mb-0">
                        <i>
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                version="1.1" width="256" height="256" viewBox="0 0 256 256"
                                xml:space="preserve" style="">
                                <defs>
                                </defs>
                                <g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;"
                                    transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)">
                                    <path
                                        d="M 89.981 6.2 C 90 6.057 90.001 5.915 89.979 5.775 c -0.003 -0.021 -0.001 -0.041 -0.005 -0.062 c -0.033 -0.163 -0.098 -0.317 -0.183 -0.462 c -0.009 -0.016 -0.01 -0.033 -0.019 -0.049 c -0.015 -0.024 -0.039 -0.036 -0.055 -0.059 c -0.034 -0.048 -0.06 -0.102 -0.101 -0.146 c -0.051 -0.056 -0.113 -0.097 -0.17 -0.144 c -0.031 -0.025 -0.058 -0.054 -0.09 -0.076 c -0.134 -0.093 -0.28 -0.164 -0.436 -0.209 c -0.028 -0.008 -0.056 -0.009 -0.084 -0.015 c -0.132 -0.03 -0.267 -0.041 -0.404 -0.034 c -0.046 0.002 -0.089 0.006 -0.135 0.012 c -0.039 0.006 -0.079 0.002 -0.118 0.01 l -87 19.456 c -0.611 0.137 -1.073 0.639 -1.159 1.259 c -0.085 0.62 0.224 1.229 0.775 1.525 l 23.523 12.661 l 7.327 23.36 c 0.008 0.025 0.025 0.043 0.034 0.067 c 0.021 0.056 0.052 0.106 0.08 0.16 c 0.059 0.114 0.127 0.218 0.211 0.312 c 0.022 0.025 0.03 0.057 0.054 0.08 c 0.022 0.021 0.05 0.028 0.073 0.048 c 0.099 0.086 0.207 0.155 0.325 0.213 c 0.047 0.023 0.088 0.053 0.136 0.07 c 0.164 0.061 0.336 0.1 0.517 0.1 c 0.011 0 0.022 0 0.033 0 c 0.179 -0.004 0.349 -0.044 0.509 -0.107 c 0.041 -0.016 0.075 -0.044 0.114 -0.063 c 0.127 -0.063 0.244 -0.139 0.349 -0.235 c 0.02 -0.018 0.046 -0.024 0.065 -0.044 l 12.009 -12.209 l 23.18 12.477 c 0.221 0.119 0.466 0.18 0.711 0.18 c 0.188 0 0.378 -0.035 0.557 -0.107 c 0.412 -0.164 0.73 -0.504 0.869 -0.926 L 89.93 6.473 c 0.014 -0.044 0.015 -0.09 0.025 -0.135 C 89.966 6.292 89.975 6.247 89.981 6.2 z M 77.435 10.018 L 25.58 36.717 L 5.758 26.047 L 77.435 10.018 z M 74.32 14.997 L 36.813 43.768 c -0.003 0.002 -0.005 0.006 -0.007 0.008 c -0.112 0.087 -0.209 0.194 -0.294 0.314 c -0.018 0.025 -0.035 0.05 -0.051 0.076 c -0.017 0.028 -0.039 0.052 -0.055 0.081 c -0.054 0.1 -0.093 0.204 -0.122 0.309 c -0.001 0.005 -0.005 0.009 -0.006 0.014 L 32.96 56.977 l -5.586 -17.809 L 74.32 14.997 z M 35.992 57.249 l 2.693 -10.072 l 4.717 2.539 L 35.992 57.249 z M 69.177 60.184 L 40.479 44.737 l 45.09 -34.588 L 69.177 60.184 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                    <path
                                        d="M 12.9 85.482 c -0.38 0 -0.76 -0.144 -1.052 -0.431 c -0.591 -0.581 -0.599 -1.53 -0.018 -2.121 l 14.292 -14.528 c 0.581 -0.592 1.531 -0.598 2.121 -0.018 c 0.591 0.581 0.599 1.53 0.018 2.121 L 13.97 85.034 C 13.676 85.333 13.288 85.482 12.9 85.482 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                    <path
                                        d="M 36.431 79.593 c -0.38 0 -0.76 -0.144 -1.052 -0.431 c -0.591 -0.581 -0.599 -1.53 -0.018 -2.121 l 14.291 -14.527 c 0.582 -0.591 1.531 -0.598 2.121 -0.018 c 0.591 0.581 0.599 1.53 0.018 2.121 L 37.501 79.145 C 37.207 79.443 36.819 79.593 36.431 79.593 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                    <path
                                        d="M 8.435 67.229 c -0.38 0 -0.76 -0.144 -1.052 -0.431 c -0.591 -0.581 -0.599 -1.53 -0.018 -2.121 l 10.445 -10.618 c 0.581 -0.591 1.531 -0.598 2.121 -0.018 c 0.591 0.581 0.599 1.53 0.018 2.121 L 9.505 66.78 C 9.211 67.079 8.823 67.229 8.435 67.229 z"
                                        style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;"
                                        transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round"></path>
                                </g>
                            </svg>
                        </i>
                        <h6>Email:</h6>
                        <p>info@aera-capital.com</p>
                        <p>www.aera-capital.com</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="d-flax" style="background-color: #eee; padding: 30px 0;">
        <div class="container text-center">
            <?= date('Y') ?> © Aera Capital - Digital Transformation Company Dubai
        </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('assets/landing/js/jquery-3.6.0.min.js') }}"></script>
    <!-- Bootstrap Js -->
    <script src="{{ asset('assets/landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/custom.js') }}"></script>
    <!-- Email Js -->
    <script src="{{ asset('assets/landing/js/sweetalert.min.js') }}"></script>
    <script src="{{ asset('assets/landing/js/contact.js') }}"></script>

</body>
