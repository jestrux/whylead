@extends('layout.index')

@section('title', 'Strategy Facilitation & Team Building in Dar es Salaam, Tanzania | WhyLead')
@section('description',
    'WhyLead is a strategy facilitation, leadership retreat and corporate team-building partner in Dar es Salaam,
    Tanzania and across East Africa — helping leadership teams turn important conversations into clear decisions,
    shared priorities and practical next steps.')

@section('meta')
    <meta name="keywords"
        content="strategy facilitation, corporate facilitation, team-building facilitation, leadership retreat facilitation, strategic planning workshop, executive retreat facilitation, workshop facilitator, facilitation services Tanzania, corporate team building Dar es Salaam, facilitation East Africa" />
@endsection

@section('content')
    @include('consultancy.facilitation-new.banner')
    @include('consultancy.facilitation-new.journey')
    @include('consultancy.facilitation-new.sessions')
@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
