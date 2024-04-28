@extends('layout.index')

@section('content')
    @include('about.banner')

    @include('about.our-values')

    {{-- @include('about.team-alt') --}}

    @include('about.team-alt-scale')

    @include('about.what-we-offer')

    @include('about.careers')
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
