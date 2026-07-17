@extends('layout.index')

@section('title', 'ACEND — Leadership Intelligence for Middle Managers | WhyLead')
@section('description',
    'ACEND is WhyLead\'s leadership intelligence layer for the middle: 360° feedback, capability data and manager
    development turned into a practical system for better people and business decisions.')

@php
    // ACEND capability dimensions — colours match the ACEND product identity
    // (green/violet appear ONLY inside the ACEND wordmark, per the style guide).
    $dimensions = [
        ['letter' => 'A', 'tag' => 'Align',   'name' => 'Align',   'bg' => '#19124B',
         'desc' => 'The capability to translate strategy into clear direction, shared goals and culture norms.'],
        ['letter' => 'C', 'tag' => 'Change',  'name' => 'Change',  'bg' => '#F26B21',
         'desc' => 'The ability to lead change, reduce resistance and create momentum for new ways of working.'],
        ['letter' => 'E', 'tag' => 'Execute', 'name' => 'Execute', 'bg' => '#19124B',
         'desc' => 'The discipline to drive outcomes through plan, process and delivery accountability.'],
        ['letter' => 'N', 'tag' => 'Nurture', 'name' => 'Nurture', 'bg' => '#0E9F6E',
         'desc' => 'The practice of growing people, trust and psychological safety in a team system.'],
        ['letter' => 'D', 'tag' => 'Develop', 'name' => 'Develop', 'bg' => '#7C3AED',
         'desc' => 'The legacy-building work of developing others, resolving tension and coaching to stretch performance.'],
    ];

    // The leadership continuum — where a manager sits between effort and impact.
    $levels = [
        ['name' => 'Groundbreaker', 'range' => '0–39%',   'desc' => 'Working hard — but progress isn\'t compounding yet.'],
        ['name' => 'Pacesetter',    'range' => '40–59%',  'desc' => 'Momentum exists, but it\'s inconsistent.'],
        ['name' => 'Pathfinder',    'range' => '60–74%',  'desc' => 'Clarity is improving. Execution is becoming reliable.'],
        ['name' => 'Trailblazer',   'range' => '75–89%',  'desc' => 'Ahead of most — performance is visible and repeatable.'],
        ['name' => 'Thriving',      'range' => '90–100%', 'desc' => 'This is where teams win. Consistently.'],
    ];

    $readinessUrl = 'https://acend.whyleadothers.com/readiness';
    $platformUrl  = 'https://acend.whyleadothers.com';
@endphp

@section('content')
    <style>
        .a-reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s cubic-bezier(.16,.84,.44,1), transform .7s cubic-bezier(.16,.84,.44,1); }
        .a-reveal.in { opacity: 1; transform: none; }
        .a-d1 { transition-delay: .08s } .a-d2 { transition-delay: .16s } .a-d3 { transition-delay: .24s }
        .a-blob { filter: blur(60px); opacity: .5; }
    </style>

    {{-- ============================ HERO ============================ --}}
    <section class="relative overflow-hidden">
        <div class="absolute -top-32 -right-24 w-[36rem] h-[36rem] rounded-full bg-primary/20 a-blob pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 md:px-8 pt-6 md:pt-10 pb-10 md:pb-16">
            <div class="md:grid grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="col-span-7" x-data x-intersect.once="$el.querySelectorAll('.a-reveal').forEach(e => e.classList.add('in'))">
                    <div class="a-reveal flex items-center gap-1.5">
                        @foreach ($dimensions as $d)
                            <span class="size-9 rounded-lg text-white font-bold flex items-center justify-center"
                                style="background: {{ $d['bg'] }}">{{ $d['letter'] }}</span>
                        @endforeach
                    </div>

                    <p class="a-reveal a-d1 mt-6 text-xs font-bold uppercase tracking-widest text-primary">
                        360&deg; Leadership Intelligence
                    </p>

                    <h1 class="a-reveal a-d1 mt-4 text-3xl lg:text-5xl font-bold uppercase leading-[1.1]">
                        <span class="outline-text">Most organizations don't fail at strategy.</span>
                        <span class="block mt-1">They fail <span class="text-primary">in the middle</span>.</span>
                    </h1>

                    <p class="a-reveal a-d2 mt-5 text-base/loose opacity-70 max-w-xl">
                        ACEND shows you exactly where your middle managers are driving performance — and where
                        they're quietly slowing everything down. It turns 360&deg; feedback, capability data and
                        manager development into a practical system for better people and business decisions.
                    </p>

                    <div class="a-reveal a-d3 mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ $readinessUrl }}" target="_blank" rel="noopener" class="btn">Try the free readiness tool</a>
                        <a href="{{ $platformUrl }}" target="_blank" rel="noopener" class="btn btn-outline">Explore the full platform</a>
                    </div>

                    <p class="a-reveal a-d3 mt-4 text-xs opacity-55">
                        The readiness tool takes ~3 minutes. No account needed.
                    </p>
                </div>

                {{-- The leadership continuum, interactive --}}
                <div class="col-span-5 mt-12 md:mt-0" x-data="{ sel: 3 }">
                    <div class="rounded-3xl border border-stroke bg-card shadow p-6">
                        <p class="text-[11px] font-bold uppercase tracking-widest opacity-50">The leadership continuum</p>
                        <p class="mt-1.5 text-sm opacity-70">Where is each of your managers really operating?</p>

                        <div class="mt-5 flex flex-col gap-2">
                            @foreach ($levels as $i => $lv)
                                <button type="button" x-on:click="sel = {{ $i }}"
                                    class="w-full text-left rounded-xl border px-4 py-3 transition-colors"
                                    x-bind:class="sel === {{ $i }} ? 'border-primary/40 bg-primary/10' : 'border-stroke hover:bg-content/5'">
                                    <span class="flex items-center justify-between gap-3">
                                        <span class="font-semibold text-sm"
                                            x-bind:class="sel === {{ $i }} && 'text-primary'">{{ $lv['name'] }}</span>
                                        <span class="text-xs opacity-50">{{ $lv['range'] }}</span>
                                    </span>
                                    <span class="block mt-1 text-xs/relaxed opacity-70" x-show="sel === {{ $i }}">
                                        {{ $lv['desc'] }}
                                    </span>
                                </button>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= WHAT ACEND READS — dimension explorer ================= --}}
    <section class="py-12 md:py-16 bg-content/5">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl a-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">The capability model</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    Five dimensions. <span class="outline-text">One clear picture.</span>
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    Every middle manager creates — or erodes — momentum across five capabilities. ACEND measures
                    all of them, so development stops being guesswork.
                </p>
            </div>

            <div class="mt-10 grid lg:grid-cols-[minmax(260px,0.36fr)_minmax(0,0.64fr)] gap-6 lg:gap-10 items-start"
                x-data="{ sel: 0 }">
                {{-- Rail --}}
                <div class="flex flex-col gap-2">
                    @foreach ($dimensions as $i => $d)
                        <button type="button" x-on:click="sel = {{ $i }}"
                            class="w-full text-left rounded-xl border px-4 py-3 flex items-center gap-3 transition-all"
                            x-bind:class="sel === {{ $i }} ? 'bg-accent border-accent text-white shadow' : 'border-stroke bg-card hover:bg-content/5'">
                            <span class="size-9 rounded-lg text-white font-bold flex items-center justify-center flex-none"
                                style="background: {{ $d['bg'] }}">{{ $d['letter'] }}</span>
                            <span>
                                <span class="block text-[10px] font-bold uppercase tracking-widest"
                                    x-bind:class="sel === {{ $i }} ? 'text-white/60' : 'text-primary'">{{ $d['tag'] }}</span>
                                <span class="block font-semibold">{{ $d['name'] }}</span>
                            </span>
                        </button>
                    @endforeach
                </div>

                {{-- Detail card --}}
                <div class="relative rounded-3xl border border-stroke bg-gradient-to-br from-primary/10 via-transparent to-transparent bg-card p-8 min-h-[280px] overflow-hidden">
                    @foreach ($dimensions as $i => $d)
                        <div x-show="sel === {{ $i }}" x-cloak>
                            <span class="absolute top-6 right-8 text-xs font-semibold opacity-40">{{ sprintf('%02d', $i + 1) }} &middot; {{ sprintf('%02d', count($dimensions)) }}</span>
                            <span class="text-[9rem] leading-none font-bold absolute -bottom-8 right-4 opacity-[0.06] select-none" aria-hidden="true">{{ $d['letter'] }}</span>
                            <p class="text-xs font-bold uppercase tracking-widest text-primary">{{ $d['tag'] }}</p>
                            <h3 class="mt-2 text-2xl lg:text-3xl font-bold">{{ $d['name'] }}</h3>
                            <p class="mt-3 text-base/loose opacity-70 max-w-lg">{{ $d['desc'] }}</p>
                            <p class="mt-6 text-sm/relaxed opacity-60 max-w-lg border-t border-stroke pt-4">
                                ACEND scores this dimension for every manager — individually, per cohort, and across
                                the organization — and tracks how it moves as development lands.
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ================= PRODUCT LADDER — contrast pair ================= --}}
    <section class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl mx-auto text-center a-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">Start with clarity.</span> Scale what works.
                </h2>
                <p class="mt-3 text-lg opacity-70">
                    Most organizations make decisions about middle managers with incomplete signals. ACEND gives
                    you a fast, credible starting point — and a system to turn insight into performance.
                </p>
            </div>

            <div class="mt-10 grid md:grid-cols-2 gap-6 max-w-5xl mx-auto">
                <div class="rounded-3xl bg-content/5 p-8 flex flex-col">
                    <p class="text-xs uppercase tracking-widest opacity-50 font-semibold">Free &middot; ~3 minutes</p>
                    <h3 class="mt-2 text-xl font-bold">Readiness Tool</h3>
                    <p class="mt-1 text-sm font-medium opacity-80">Know who is ready — before it becomes a performance risk.</p>
                    <p class="mt-3 text-sm/relaxed opacity-70">
                        Ten evidence-based questions that tell you whether a manager is ready to scale
                        responsibility or needs structured development. Used by HR and leadership teams to
                        de-risk promotions and surface hidden gaps.
                    </p>
                    <a href="{{ $readinessUrl }}" target="_blank" rel="noopener" class="btn btn-outline mt-6 self-start">Try it free</a>
                </div>
                <div class="rounded-3xl bg-primary/10 border border-primary/30 p-8 flex flex-col">
                    <p class="text-xs uppercase tracking-widest text-primary font-semibold">Full platform</p>
                    <h3 class="mt-2 text-xl font-bold">ACEND 360</h3>
                    <p class="mt-1 text-sm font-medium opacity-80">Turn leadership insight into measurable performance.</p>
                    <p class="mt-3 text-sm/relaxed opacity-70">
                        Go beyond signals. Diagnose gaps, uncover blind spots and deploy structured development
                        pathways across your managers — from individual growth to cohort-level performance to
                        organizational impact.
                    </p>
                    <a href="{{ $platformUrl }}" target="_blank" rel="noopener" class="btn mt-6 self-start">Explore the platform</a>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= SPLIT FEATURE — the intelligence layer ================= --}}
    <section class="py-12 md:py-16 bg-content/5">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="lg:grid grid-cols-2 gap-12 lg:gap-20 items-center">
                <div class="flex flex-col gap-5">
                    <p class="text-xs font-bold uppercase tracking-widest text-primary">ACEND &times; Thrive in the Middle</p>
                    <h2 class="text-2xl lg:text-4xl font-bold uppercase leading-tight text-accent dark:text-content">
                        The intelligence layer behind the work
                    </h2>
                    <p class="text-base/loose opacity-70">
                        ACEND powers Thrive in the Middle — measuring where your middle managers truly are,
                        surfacing the risks holding performance back, and translating growth into clear, trackable
                        outcomes. So you're not just running a programme. You're building a system for consistent
                        performance.
                    </p>
                    <ul class="flex flex-col gap-4">
                        @foreach ([
                            'Where managers are underperforming',
                            'Where performance is plateauing',
                            'Where high-impact leaders are emerging',
                        ] as $item)
                            <li class="flex items-center gap-3">
                                <span class="flex-none size-8 bg-primary text-white flex items-center justify-center rounded">
                                    <svg class="size-4" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
                                    </svg>
                                </span>
                                <span class="font-bold uppercase tracking-wide">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <div>
                        <a href="{{ url('/thrive-in-the-middle') }}" class="btn btn-outline">Explore Thrive in the Middle</a>
                    </div>
                </div>

                <div class="mt-10 lg:mt-0">
                    <div class="-rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl relative">
                        <div class="relative rounded-xl overflow-hidden w-full aspect-[2/1] bg-neutral-300">
                            <img class="w-full h-full object-cover object-center"
                                src="{{ asset('img/uploads/acend-photo.jpg') }}" alt="ACEND participants" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('home.cta', ['interest' => 'ACEND'])
@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
