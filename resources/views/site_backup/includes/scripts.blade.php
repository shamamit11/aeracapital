@php
    use App\Models\Setting;
    $settings = Setting::first();
@endphp
    <!-- Jquery -->
    <script src="{{ asset('assets/site/js/vendor/jquery-3.6.0.min.js')}}"></script>
    <!-- Slick Slider -->
    <script src="{{ asset('assets/site/js/slick.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('assets/site/js/bootstrap.min.js')}}"></script>
    <!-- Magnific Popup -->
    <script src="{{ asset('assets/site/js/jquery.magnific-popup.min.js')}}"></script>
    <!-- Counter Up -->
    <script src="{{ asset('assets/site/js/jquery.counterup.min.js')}}"></script>
    <!-- Circle Progress -->
    <script src="{{ asset('assets/site/js/circle-progress.js')}}"></script>
    <!-- Range Slider -->
    <script src="{{ asset('assets/site/js/jquery-ui.min.js')}}"></script>
    <!-- Isotope Filter -->
    <script src="{{ asset('assets/site/js/imagesloaded.pkgd.min.js')}}"></script>
    <script src="{{ asset('assets/site/js/isotope.pkgd.min.js')}}"></script>
    <!-- Tilt JS -->
    <script src="{{ asset('assets/site/js/tilt.jquery.min.js')}}"></script>
    <!-- Particles JS -->
    <script src="{{ asset('assets/site/js/particles.min.js')}}"></script>


    <script src="{{ asset('assets/site/js/particles-config.js')}}"></script>
    <!-- Main Js File -->
    <script src="{{ asset('assets/site/js/main.js')}}"></script>

    @if(@$settings->ext_js_scripts )
        {!!@$settings->ext_js_scripts!!}
    @endif