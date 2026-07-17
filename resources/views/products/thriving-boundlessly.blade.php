@extends('layout.index')

@section('title', 'Thriving Boundlessly — Performance Intelligence | WhyLead')
@section('description',
    'Thriving Boundlessly turns scattered performance data into a calm, decision-ready operating system — for
    people leaders, HR teams and executives making promotion, retention, development and succession decisions.')

@php
    // The patterns organisations pay for every month without a performance system.
    $pains = [
        ['title' => 'Promotions go to whoever argues loudest.',
         'desc'  => 'The most vocal, not the most ready. Capability stays invisible without a shared way to see it.'],
        ['title' => 'Flight risk is noticed the day someone resigns.',
         'desc'  => 'By then the decision is made. The signals were there — they simply were not being read.'],
        ['title' => 'Development budgets go to whoever asked.',
         'desc'  => 'Without gap data, learning investment follows relationships instead of real operating need.'],
        ['title' => 'Managers rate the same behaviour differently.',
         'desc'  => 'The ratings exist, but without a shared standard they are not reliable enough for high-stakes calls.'],
        ['title' => 'Reviews generate tension, not direction.',
         'desc'  => 'The same conversation repeats each year because there is no common language for growth and evidence.'],
        ['title' => 'Your best people cannot see a path.',
         'desc'  => 'Ambiguity about what next-level readiness looks like quickly becomes a retention problem.'],
    ];

    // How it gets introduced — start with one decision, prove value, expand.
    $steps = [
        ['kicker' => 'Pick the moment',   'name' => 'Identify the decisions', 'desc' => 'Which calls does your leadership team need to make with confidence? Promotions. Succession. Development cycles. We start there.'],
        ['kicker' => 'Shared standards',  'name' => 'Build the framework',    'desc' => 'Turn judgment into a common operating model your managers actually agree on.'],
        ['kicker' => 'Confident action',  'name' => 'Run a first cycle',      'desc' => 'Move from discussion to a calibrated, evidence-backed decision round.'],
        ['kicker' => 'Earned trust',      'name' => 'Expand when ready',      'desc' => 'Grow the system only after it has proven itself on real decisions.'],
    ];

    $audiences = [
        'People leaders making promotion and succession decisions',
        'HR teams moving beyond annual review theatre',
        'Executives who need performance data to drive strategy',
        'Organisations with data but no shared framework to interpret it',
    ];

    $tbUrl = 'https://www.thriveboundlessly.com';
@endphp

@section('content')
    <style>
        .tb-reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s cubic-bezier(.16,.84,.44,1), transform .7s cubic-bezier(.16,.84,.44,1); }
        .tb-reveal.in { opacity: 1; transform: none; }
        .tb-d1 { transition-delay: .08s } .tb-d2 { transition-delay: .16s } .tb-d3 { transition-delay: .24s }
        .tb-blob { filter: blur(60px); opacity: .5; }
    </style>

    {{-- ============================ HERO ============================ --}}
    <section class="relative overflow-hidden">
        <div class="absolute -top-32 -left-24 w-[34rem] h-[34rem] rounded-full bg-primary/20 tb-blob pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 md:px-8 pt-6 md:pt-10 pb-10 md:pb-16">
            <div class="md:grid grid-cols-12 gap-12 lg:gap-16 items-center">
                <div class="col-span-6" x-data x-intersect.once="$el.querySelectorAll('.tb-reveal').forEach(e => e.classList.add('in'))">
                    <p class="tb-reveal text-xs font-bold uppercase tracking-widest text-primary">
                        Performance Intelligence
                    </p>

                    <h1 class="tb-reveal tb-d1 mt-4 text-3xl lg:text-5xl font-bold uppercase leading-[1.1]">
                        <span class="outline-text">Your performance system isn't broken.</span>
                        <span class="block mt-1">It was <span class="text-primary">never built</span>.</span>
                    </h1>

                    <p class="tb-reveal tb-d2 mt-5 text-base/loose opacity-70 max-w-xl">
                        Every month your team decides who gets promoted, developed and retained — without a shared
                        way to see clearly. Thriving Boundlessly turns scattered performance data into a calm,
                        decision-ready operating system.
                    </p>

                    <div class="tb-reveal tb-d3 mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ $tbUrl }}" target="_blank" rel="noopener" class="btn">Book a demo</a>
                        <a href="#how-it-works" class="btn btn-outline">See how it works</a>
                    </div>

                    <p class="tb-reveal tb-d3 mt-4 text-xs opacity-55">
                        For people leaders, HR teams and executives making promotion, retention, development and
                        succession decisions.
                    </p>
                </div>

                <div class="col-span-6 mt-12 md:mt-0">
                    <div class="relative">
                        <div class="-rotate-1 relative rounded-xl overflow-hidden aspect-[5/4] shadow-xl bg-neutral-300">
                            <img class="w-full h-full object-cover"
                                src="{{ asset('img/uploads/pier_files/team-alignment_1716522161.jpg') }}"
                                alt="Leaders reviewing team performance data" />
                        </div>

                        {{-- Floating decision-signals chip (baseline navy stat chip) --}}
                        <div class="absolute -bottom-6 -left-3 md:-left-6 max-w-[16rem] rotate-1">
                            <div class="rounded-lg overflow-hidden shadow-lg bg-accent text-white">
                                <p class="px-4 pt-3 text-[10px] font-bold uppercase tracking-widest text-white/60">Decision signals</p>
                                <div class="px-4 pb-3 pt-1 flex flex-col gap-1.5 text-xs">
                                    @foreach ([['Evidence logged', '92%'], ['Calibration ready', '81%'], ['Learning activation', '67%']] as [$k, $v])
                                        <span class="flex items-center justify-between gap-6">
                                            <span class="text-white/80">{{ $k }}</span>
                                            <span class="font-bold">{{ $v }}</span>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ================= THE PRICE YOU ARE ALREADY PAYING ================= --}}
    <section class="py-12 md:py-16 bg-content/5">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl a-center text-center mx-auto tb-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">The price you are</span> already paying
                </h2>
                <p class="mt-3 text-lg opacity-70">
                    These are not abstract risks. They are the patterns that show up every month in organisations
                    without a structured performance system.
                </p>
            </div>

            <ul class="mt-10 grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($pains as $i => $p)
                    <li class="tb-reveal tb-d{{ ($i % 3) + 1 }} rounded-2xl bg-card border border-black/5 shadow px-6 py-6"
                        x-data x-intersect.once="$el.classList.add('in')">
                        <span class="block h-[3px] w-6 rounded-full bg-primary"></span>
                        <h3 class="mt-4 font-semibold">{{ $p['title'] }}</h3>
                        <p class="mt-2 text-sm/relaxed opacity-70">{{ $p['desc'] }}</p>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    {{-- ================= HOW IT GETS INTRODUCED — process timeline ================= --}}
    <section id="how-it-works" class="py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl tb-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">How it gets introduced</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    Start small. <span class="outline-text">Prove value. Expand.</span>
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    You do not overhaul everything. You start with the one decision that matters most right now,
                    prove value, and expand from there.
                </p>
            </div>

            <div class="mt-12 grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
                @foreach ($steps as $i => $s)
                    <div class="tb-reveal tb-d{{ $i + 1 }}" x-data x-intersect.once="$el.classList.add('in')">
                        <div class="flex items-center gap-3">
                            <span class="size-12 rounded-xl border border-stroke bg-card shadow-sm text-primary font-bold flex items-center justify-center flex-none">{{ $i + 1 }}</span>
                            @if (! $loop->last)
                                <span class="hidden md:block h-px flex-1 bg-gradient-to-r from-primary/60 to-stroke"></span>
                            @endif
                        </div>
                        <p class="mt-3 text-[10px] font-bold uppercase tracking-widest text-primary">{{ $s['kicker'] }}</p>
                        <h3 class="mt-1 text-lg font-bold">{{ $s['name'] }}</h3>
                        <p class="mt-1 text-sm/relaxed opacity-70">{{ $s['desc'] }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ================= WHO IT'S FOR + WHYLEAD'S ROLE ================= --}}
    <section class="py-12 md:py-16 bg-content/5">
        <div class="max-w-7xl mx-auto px-4 md:px-8 lg:grid grid-cols-2 gap-12 items-start">
            <div>
                <h2 class="text-2xl md:text-3xl font-bold uppercase tracking-wide">
                    <span class="outline-text">Built for the people</span> making the calls
                </h2>
                <ul class="mt-6 grid sm:grid-cols-2 gap-3">
                    @foreach ($audiences as $a)
                        <li class="flex items-start gap-3 rounded-lg border border-stroke bg-card px-4 py-3.5">
                            <span class="size-8 rounded bg-primary/10 text-primary flex items-center justify-center flex-none">
                                <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z" />
                                </svg>
                            </span>
                            <span class="text-sm/relaxed font-medium">{{ $a }}</span>
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="mt-10 lg:mt-0">
                <div class="relative rounded-3xl bg-gradient-to-br from-accent via-accent/90 to-accent/95 text-white px-8 py-8 shadow overflow-hidden">
                    <div class="size-10 rounded-xl bg-gradient-to-br from-primary to-primary/20 flex items-center justify-center">
                        <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <h3 class="mt-4 font-semibold text-lg">WhyLead's role</h3>
                    <p class="mt-2 text-sm/relaxed text-white/80">
                        WhyLead does not hand you a platform and disappear. We build the framework with you, run
                        the first cycle with you, and stay until the outputs are shaping real decisions.
                    </p>
                    <a href="{{ $tbUrl }}" target="_blank" rel="noopener" class="btn mt-6">Request a demo</a>
                </div>
            </div>
        </div>
    </section>

    @include('home.cta', ['interest' => 'Performance Management'])
@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
