@php
    $isHomePage = true;
@endphp

@extends('layout.index')

@section('title', 'Thrive In The Middle')
@section('description', 'Being a middle manager is challenging. Those above have priorities.')

@section('content')
    <div class="relative w-full">
        <div class="absolute -top-20 inset-0 bg-[#19124B] z-10">
        </div>

        <div class="relative z-10">
            @include('thrive-in-the-middle.enroll.banner')
        </div>
    </div>

    @include('thrive-in-the-middle.enroll.form')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
