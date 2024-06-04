@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('content')
    @pierdata(["model" => "Content", "wherePage" => "Training"])
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

    <div class="relative">
        <div class="hidden md:block absolute inset-0 bg-accent">
        </div>
        @include('training.banner')
    </div>

    @include('training.programmes')

    @include('training.approach')

    @include('home.faqs')

    @include('home.cta', ['interest' => 'Training'])
    @endpierdata()
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
