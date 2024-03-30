@extends('layout.index')

@section('content')
    @include('consultancy.thriving-teams')

    @include('consultancy.working-with-whylead')

    @include('consultancy.performance-management')

    @include('consultancy.faqs')

    @include('consultancy.facilitating-strategic-gatherings')

    @include('consultancy.testimonials')

    @include('consultancy.happier-workplace')

    @include('home.cta')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
