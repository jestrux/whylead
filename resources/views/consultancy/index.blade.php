@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('title', 'We Solve People & Culture Problems')
@section('description',
    'Build a thriving organization through our wide range of services tailored for leaders, teams
    and organizations.')
@section('image', asset('img/uploads/page-thumbnail-consultancy.jpg'))

@section('content')
    @pierdata(["model" => "Content", "wherePage" => "Consultancy"])
    @php
        $images = $data->filter(fn($item) => $item->type == 'image');
        $getImage = function ($name) use ($images) {
            return str_replace(
                'http://localhost:8000/',
                asset(''),
                $images->first(fn($item) => $item->name == $name)->image,
            );
        };
    @endphp

    <div class="hidden md:block absolute inset-x-0 top-0 h-20 bg-accent">
    </div>

    <div class="relative">
        <div class="hidden md:block absolute inset-0 bg-accent">
        </div>
        @include('consultancy.banner')
    </div>

    @include('consultancy.thriving-teams')

    @include('consultancy.performance-management')

    @include('consultancy.facilitating-strategic-gatherings')

    @include('consultancy.happier-workplace')

    <div class="-my-14">
        @include('consultancy.testimonials')
    </div>

    @include('home.unlock-potential')

    @include('home.faqs')

    @include('home.cta')
    @endpierdata()
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
