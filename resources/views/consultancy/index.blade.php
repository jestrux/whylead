@extends('layout.index')

@section('content')
    @include('consultancy.banner')

    @include('consultancy.thriving-teams')

    @include('consultancy.performance-management')

    @include('consultancy.facilitating-strategic-gatherings')

    @include('consultancy.happier-workplace')

    @include('consultancy.testimonials')

    @include('home.unlock-potential')

    @include('home.working-with-whylead')

    @include('home.faqs')

    @include('home.cta')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
