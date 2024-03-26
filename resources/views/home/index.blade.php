@extends('layout.index')

@section('content')
    @include('home.popup')

    @include('home.banner')

    @include('home.leaders')

    <div class="relative">
        <div class="absolute inset-0 bg-gradient-to-t from-primary/10 via-primary/10 to-transparent"></div>

        <div class="relative">
            @include('home.challenges')
            @include('home.thriving-in-the-middle')
        </div>
    </div>

    @include('home.impact')

    @include('home.faqs')

    @include('home.cta')
@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

    {{-- <script src="{{ asset('js/Slider.min.js') }}"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
    <script defer src="https://cdn.jsdelivr.net/gh/dixonandmoe/rellax@master/rellax.min.js"></script>
    <script nonce="{{ csp_nonce() }}">
        window.addEventListener("load", function() {
            if (window.innerWidth > 768)
                new Rellax('.rellax');
        })
    </script> --}}
@endsection
