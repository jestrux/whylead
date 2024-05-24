@php
    $isThriveFormPage = true;
@endphp

@extends('layout.index')

@section('title', 'Thrive In The Middle')
@section('description', 'Being a middle manager is challenging. Those above have priorities.')

@section('content')
    <style>
        :root,
        body {
            background: rgb(25, 18, 75) !important;
            --canvas-color: 25 18 75 !important;
            --card-color: 255 255 255 !important;
            --content-color: 255 255 255 !important;
        }

        #mainNavigationMenu {
            border-color: #251E54 !important;
        }

        #mainNavigationMenu.md\:bg-card {
            background: #251E54 !important;
            border-color: #251E54 !important;
        }

        footer {
            border-color: #342e61 !important;
        }

        .pier-form-field .pier-select,
        .pier-form-field .pier-textarea,
        .pier-form-field .pier-input {
            background-color: white !important;
            color: black !important;
        }
    </style>

    <div class="relative w-full">
        <div class="absolute -top-20 inset-0 bg-content/5 z-10">
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
