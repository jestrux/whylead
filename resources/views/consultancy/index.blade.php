@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('content')
    <div class="absolute inset-0 h-[400px] bg-accent">
    </div>

    @pierdata(["model" => "Content", "wherePage" => "Consultancy"])
    @php
        $images = $data->filter(fn($item) => $item->type == 'image');
        $getImage = function ($name) use ($images) {
            return $images->first(fn($item) => $item->name == $name)->image;
        };
    @endphp

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
    @endpierdata()
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
