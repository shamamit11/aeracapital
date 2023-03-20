@php
    use App\Models\Product;
    $products = Product::all();
@endphp

<div class="as-menu-wrapper">
    <div class="as-menu-area text-center">
        <button class="as-menu-toggle"><i class="fal fa-times"></i></button>
        <div class="mobile-logo">
            <a href="{{route('home')}}"><img src="{{ asset('assets/site/img/logo.svg') }}" alt="Aera Capital"></a>
        </div>
        <div class="as-mobile-menu">
            <ul>
                <li><a href="{{route('home')}}">Home</a></li>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="{{route('service')}}">Services</a></li>
                <li class="menu-item-has-children">
                    <a href="#">Products</a>
                    <ul class="sub-menu">
                        @foreach($products as $prod)
                            <li><a href="{{route('product-detail', [$prod->slug])}}">{{ $prod->title }}</a></li>
                        @endforeach
                    </ul>
                </li>
                {{-- <li><a href="{{route('blog')}}">Blog</a></li> --}}
                <li><a href="{{route('contact')}}">Contact</a></li>
            </ul>
        </div>
    </div>
</div>