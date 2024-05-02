@extends('layout.index')

@section('content')
    @include('thrive-in-the-middle.banner')

    @include('thrive-in-the-middle.about-programme')

    @include('thrive-in-the-middle.next-cohort')

    @include('thrive-in-the-middle.upcoming-cohorts')

    <div class="-mb-6">
        @include('consultancy.testimonials')
    </div>

    @include('training.faqs')

    @include('home.cta')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
