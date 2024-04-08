@extends('layout.index')

@section('content')
    @include('training.banner')

    @include('training.programmes-alt')

    {{-- @include('training.programmes') --}}

    @include('training.approach')

    {{-- @include('training.testimonials') --}}

    @include('training.faqs')

    @include('home.cta')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
