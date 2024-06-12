@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('content')
    <div class="hidden md:block absolute inset-x-0 top-0 h-20 bg-accent">
    </div>

    <div class="relative">
        <div class="hidden md:block absolute inset-0 bg-accent">
        </div>
        @include('thrive-in-the-middle.banner')
    </div>


    @include('thrive-in-the-middle.about-programme')

    @include('thrive-in-the-middle.programmes')

    @include('thrive-in-the-middle.next-cohort')

    @include('thrive-in-the-middle.upcoming-cohorts')

    <div class="-mt-24 -mb-16 lg:-mb-6">
        @include('consultancy.testimonials')
    </div>

    @include('home.faqs')

    @include('home.cta', ['interest' => 'Thrive in the Middle'])
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
