@php
    // Facilitation page entry — meta_title and meta_description are editable
    // from Statamic (Collections > Pages > Facilitation). Defaults below match
    // the design copy so the page reads well even if the entry is empty.
    $_g = \Statamic\Facades\Entry::query()
        ->where('collection', 'pages')
        ->where('slug', 'facilitation')
        ->first();
    $_metaTitle = $_g?->get('meta_title')
        ?: 'Strategy Facilitation & Team Building in Dar es Salaam, Tanzania | WhyLead';
    $_metaDescription = $_g?->get('meta_description')
        ?: 'WhyLead is a strategy facilitation, leadership retreat and corporate team-building partner in Dar es Salaam, Tanzania and across East Africa — helping leadership teams turn important conversations into clear decisions, shared priorities and practical next steps.';

    // Hero image — reuses the consultancy page's facilitating-gatherings image
    // from Statamic, with a safe fallback.
    $_consultancy = \Statamic\Facades\Entry::query()
        ->where('collection', 'pages')
        ->where('slug', 'consultancy')
        ->first();
    $heroImage = $_consultancy?->augmentedValue('facilitating_gatherings_image')->value()?->url()
        ?: asset('img/uploads/pier_files/MF_20221101_0338_1715093295.jpg');
@endphp

@extends('layout.index')

@section('title', $_metaTitle)
@section('description', $_metaDescription)

@section('meta')
    <meta name="keywords"
        content="strategy facilitation, corporate facilitation, team-building facilitation, leadership retreat facilitation, strategic planning workshop, executive retreat facilitation, workshop facilitator, facilitation services Tanzania, corporate team building Dar es Salaam, facilitation East Africa" />
@endsection

@php

    $sessions = [
        [
            'name' => 'Strategy Sessions',
            'tag' => 'Direction',
            'icon' => 'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5',
            'lead' => 'Shape where the organization is going.',
            'desc' => 'We help leadership teams clarify vision, weigh the trade-offs and make the big calls that define the years ahead — turning ambiguity into a direction everyone can commit to.',
            'points' => ['Vision &amp; purpose alignment', 'Strategic priority setting', 'Scenario &amp; trade-off discussions'],
        ],
        [
            'name' => 'Alignment Sessions',
            'tag' => 'Cohesion',
            'icon' => 'M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z',
            'lead' => 'Get everyone rowing in the same direction.',
            'desc' => 'We surface the hidden misalignment that quietly derails execution and rebuild shared understanding across teams, functions and leadership — so effort compounds instead of cancelling out.',
            'points' => ['Cross-functional alignment', 'Role &amp; ownership clarity', 'Conflict navigation'],
        ],
        [
            'name' => 'Planning Sessions',
            'tag' => 'Execution',
            'icon' => 'M3.75 5.25h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5m-16.5 4.5h16.5',
            'lead' => 'Turn strategy into a plan people own.',
            'desc' => 'We translate ambition into concrete roadmaps, milestones and commitments — plans that are not just written, but owned and integrated into how the organization actually works.',
            'points' => ['Actionable roadmaps', 'Milestone &amp; accountability design', 'Resource &amp; capacity planning'],
        ],
        [
            'name' => 'Reflection Sessions',
            'tag' => 'Momentum',
            'icon' => 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99',
            'lead' => 'Pause, learn and integrate.',
            'desc' => 'We create the space to reflect on what is working, capture the lessons and build momentum for what comes next — so growth is deliberate rather than accidental.',
            'points' => ['Retrospectives &amp; learning', 'Team health check-ins', 'Momentum &amp; integration'],
        ],
    ];

    $principles = [
        [
            'title' => 'A safe space for collaboration',
            'body' => 'Our approach emphasizes inclusivity and authenticity. We create a space where all voices are heard, valued and respected — allowing for diverse viewpoints and genuinely constructive contributions.',
            'icon' => 'M12 21a9 9 0 0 0 9-9V6.75L12 3 3 6.75V12a9 9 0 0 0 9 9Z',
        ],
        [
            'title' => 'Challenging assumptions',
            'body' => 'Through thoughtful facilitation and active participation techniques, we empower teams to challenge assumptions, manage emotions and navigate conflict effectively.',
            'icon' => 'M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z',
        ],
        [
            'title' => 'Integration that lasts',
            'body' => 'We instil momentum after the session by ensuring plans and solutions are not only developed but owned — integrated into the organization&rsquo;s culture and day-to-day operations.',
            'icon' => 'M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244',
        ],
    ];

    // The arc from high-level (strategy) to human-level (team & retreats).
    $journey = [
        ['k' => 'Strategy',      'sub' => 'High-level',  'desc' => 'Direction, priorities and the big calls.',   'points' => ['Vision &amp; priorities', 'The big trade-offs', 'Where we&rsquo;re going']],
        ['k' => 'Alignment',     'sub' => null,          'desc' => 'Shared understanding across the team.',       'points' => ['Shared understanding', 'Role &amp; ownership clarity', 'Rowing together']],
        ['k' => 'Team building', 'sub' => null,          'desc' => 'Trust, honesty and real connection.',         'points' => ['Trust &amp; safety', 'Honest feedback', 'Real connection']],
        ['k' => 'Retreats',      'sub' => 'Human-level', 'desc' => 'Space to reflect, recharge, reconnect.',      'points' => ['Reflect &amp; recharge', 'Reconnect with purpose', 'Measured with the TTI']],
    ];

    $teamCards = [
        [
            'title' => 'Out of the comfort zone',
            'body' => 'Activity-based challenges blend the physical and the intellectual &mdash; pushing people past their comfort zone to solve things together.',
            'icon' => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
        ],
        [
            'title' => 'Communication &amp; negotiation',
            'body' => 'Real collaboration is a skill. We build the communication and negotiation muscles teams rely on when the pressure is on.',
            'icon' => 'M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z',
        ],
        [
            'title' => 'The give-and-take of honest feedback',
            'body' => 'We make honest, two-way feedback normal &mdash; so teams can challenge and support each other without bruising.',
            'icon' => 'M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5',
        ],
        [
            'title' => 'Bonding that lasts',
            'body' => 'We create a genuinely fun environment for bonding &mdash; grounded in your strategy, operating model and culture.',
            'icon' => 'M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12Z',
        ],
    ];

    $retreatFormats = ['Team-building retreats', 'Retreat facilitation', 'Leadership retreats', 'Team off-sites', 'Culture &amp; values labs', 'Strategy &amp; bonding getaways'];

    // The Thriving Teams Index — measurement + decision engine (illustrative,
    // made-up data for demonstration; not a real client's scores).
    $ttiScore = 60;
    $ttiDims = [
        [
            'label' => 'Trust &amp; safety', 'val' => 74, 'note' => 'strength',
            'today' => 'A genuine strength &mdash; people broadly feel safe to speak up and disagree.',
            'after' => 'Protected and deepened, so the harder ownership conversations can actually happen.',
            'decision' => 'Protect this strength', 'why' => 'Trust is the foundation the other fixes stand on &mdash; don&rsquo;t spend it while resetting ownership.',
        ],
        [
            'label' => 'Communication', 'val' => 66, 'note' => null,
            'today' => 'Information moves, but honest, forward-looking feedback is inconsistent.',
            'after' => 'Two-way, future-focused feedback becomes a habit, not a once-a-year event.',
            'decision' => 'Build the feedback habit', 'why' => 'Better feedback quietly compounds every other dimension over time.',
        ],
        [
            'label' => 'Alignment', 'val' => 59, 'note' => 'watch',
            'today' => 'People are working hard, but not always in the same direction; priorities compete quietly.',
            'after' => 'A shared picture of what matters most, and why &mdash; so effort compounds instead of cancelling out.',
            'decision' => 'Realign around the top 3', 'why' => 'Alignment is close to tipping; a focused reset locks in the gains from fixing ownership.',
        ],
        [
            'label' => 'Ownership', 'val' => 41, 'note' => 'constraint',
            'today' => 'Good ideas stall because no one clearly owns the follow-through. Decisions get re-opened and momentum leaks between meetings.',
            'after' => 'Clear owners, visible commitments and a shared bar for &ldquo;done&rdquo; &mdash; so the team moves without being pushed.',
            'decision' => 'Reset ownership first', 'why' => 'It&rsquo;s the single highest-leverage lever. Fix it before adding operating complexity and the other scores rise with it.',
        ],
    ];
    $ttiConstraint = collect($ttiDims)->search(fn ($d) => ($d['note'] ?? null) === 'constraint') ?: 0;
    $ttiSteps = [
        ['n' => '01', 'k' => 'Measure',  'title' => 'A baseline score',      'desc' => 'Before we facilitate, the team scores itself 0&ndash;100 across the dimensions that make a team thrive &mdash; trust, ownership, alignment and more.'],
        ['n' => '02', 'k' => 'Diagnose', 'title' => 'The one constraint',     'desc' => 'A decision engine reads the signals and names the single lever holding the team back &mdash; and the strength worth protecting while you fix it.'],
        ['n' => '03', 'k' => 'Track',    'title' => 'The shift, in evidence', 'desc' => 'Re-run after the retreat to see what actually moved &mdash; so leadership can act on evidence, not just a good day out.'],
    ];

    // Illustrative examples (anonymized, representative — not real client data).
    $cases = [
        ['org' => 'A global education nonprofit', 'title' => 'Global team gathering', 'desc' => 'After years apart &mdash; and a near-doubling of staff &mdash; the team needed to reconnect. We designed, planned and facilitated an organization-wide retreat to deepen relationships, align around a common purpose and set direction for the year ahead.'],
        ['org' => 'A health research institute', 'title' => 'Leadership reigniting session', 'desc' => 'A department that needed to be reignited and equipped to lead. We facilitated &ldquo;The Evolving Purpose of Leadership&rdquo; &mdash; training, peer and applied learning, and team-building for project leaders, administrators and the executive team.'],
    ];

    $impact = [
        [
            'percent'      => 100,
            'color'        => '#F26B21',
            'patternColor' => 'rgba(255, 255, 255, 0.35)',
            'glow'         => 'rgba(242,107,33,0.35)',
            'desc'         => 'of clients said our facilitation addressed their pain points.',
        ],
        [
            'percent'      => 98,
            'color'        => 'url(#facProgressGradient)',
            'patternColor' => 'rgba(255, 255, 255, 0.2)',
            'glow'         => 'rgba(25,18,75,0.35)',
            'desc'         => 'identified new possibilities for improvement after our sessions.',
        ],
        [
            'percent'      => 82,
            'color'        => '#EBB305',
            'patternColor' => 'rgba(0, 0, 0, 0.2)',
            'glow'         => 'rgba(235,179,5,0.35)',
            'desc'         => 'said the experience measurably improved how their team works.',
        ],
    ];

    $contactUrl = 'https://acend.whyleadothers.com/workshop-registration?interested_in=' . rawurlencode('Strategy Facilitation');
@endphp

@section('content')
    <style>
        /* Scroll-reveal primitive — toggled by Alpine's x-intersect. */
        .f-reveal { opacity: 0; transform: translateY(26px); transition: opacity .7s cubic-bezier(.16,.84,.44,1), transform .7s cubic-bezier(.16,.84,.44,1); }
        .f-reveal.in { opacity: 1; transform: none; }
        .f-d1 { transition-delay: .08s } .f-d2 { transition-delay: .16s } .f-d3 { transition-delay: .24s } .f-d4 { transition-delay: .32s }

        @keyframes fFloat { 0%,100% { transform: translateY(0) } 50% { transform: translateY(-14px) } }
        .f-float { animation: fFloat 7s ease-in-out infinite; }

        .f-blob { filter: blur(60px); opacity: .5; }

        /* Session tab underline slide */
        .f-tab { position: relative; transition: color .2s ease; }
        .f-tab[aria-selected="true"] { color: rgb(var(--content-color)); }
        .f-tab[aria-selected="false"] { color: rgb(var(--content-color) / .5); }
        .f-tab::after { content: ""; position: absolute; left: 0; right: 0; bottom: -1px; height: 2px; background: #F26B21; transform: scaleX(0); transform-origin: left; transition: transform .25s ease; }
        .f-tab[aria-selected="true"]::after { transform: scaleX(1); }

        /* ---- Journey band: energy line + interactive nodes ---- */
        .j-track { position: relative; }
        .j-line {
            position: absolute; left: 8%; right: 8%; top: 28px; height: 3px; border-radius: 3px;
            overflow: hidden;
            background: linear-gradient(90deg, rgb(var(--content-color) / .22), #F26B21 55%, rgba(242,107,33,.28));
        }
        /* the moving pulse of "energy" travelling along the line */
        .j-line::after {
            content: ""; position: absolute; top: 0; bottom: 0; left: 0; width: 20%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.95), transparent);
            filter: blur(.5px);
            animation: jflow 2.6s linear infinite;
        }
        @keyframes jflow { from { transform: translateX(-120%); } to { transform: translateX(560%); } }

        .j-node {
            transition: transform .28s cubic-bezier(.34,1.56,.64,1), box-shadow .28s ease,
                        border-color .28s ease, background-color .28s ease;
        }
        .j-num { transition: color .28s ease; }
        .j-item:hover .j-node {
            transform: translateY(-5px) scale(1.09);
            background-color: #F26B21; border-color: #F26B21;
            box-shadow: 0 14px 28px -8px rgba(242, 107, 33, .55);
        }
        .j-item:hover .j-num { color: #fff; }

        /* hover popover ("drop down" of detail) */
        .j-pop {
            position: absolute; top: calc(100% + 14px); left: 50%;
            width: 240px; max-width: 80vw; padding: 15px 16px; z-index: 40; text-align: left;
            background: rgb(var(--card-color)); border: 1px solid rgb(var(--stroke-color));
            border-radius: 15px; box-shadow: 0 20px 40px -14px rgba(15, 27, 61, .28);
            opacity: 0; visibility: hidden; transform: translate(-50%, 8px);
            transition: opacity .2s ease, transform .2s ease, visibility .2s;
        }
        .j-item:hover .j-pop { opacity: 1; visibility: visible; transform: translate(-50%, 0); }
        @media (min-width: 768px) {
            .j-pop { left: 0; transform: translate(0, 8px); }
            .j-item:hover .j-pop { transform: translate(0, 0); }
        }
        @media (max-width: 767px) { .j-pop { display: none; } }

        @media (prefers-reduced-motion: reduce) {
            .j-line::after { animation: none; }
        }

        /* ---- Session navigator (inspired by the TB "real decisions" section) ---- */
        .f-nav { position: relative; display: grid; gap: 8px; align-content: start; padding: 6px 0; }
        .f-nav::before {
            content: ""; position: absolute; left: 26px; top: 30px; bottom: 30px; width: 2px; border-radius: 999px;
            background: linear-gradient(180deg, rgba(232, 82, 26, .35), rgb(var(--stroke-color)));
        }
        /* energy "comet" travelling down the rail */
        .f-nav::after {
            content: ""; position: absolute; left: 21px; top: 30px; width: 11px; height: 11px; border-radius: 50%;
            background: radial-gradient(circle, #f26a22 0%, rgba(232, 82, 26, .55) 45%, rgba(232, 82, 26, 0) 80%);
            box-shadow: 0 0 18px 4px rgba(232, 82, 26, .45); pointer-events: none; will-change: transform, opacity;
            animation: fComet 4.2s ease-in-out infinite;
        }
        .f-nav.is-touched::after { opacity: 0; animation-play-state: paused; transition: opacity .45s ease; }
        @keyframes fComet {
            0% { transform: translateY(0); opacity: 0; }
            8% { opacity: 1; }
            50% { transform: translateY(var(--rail, 260px)); opacity: 1; }
            92% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(0); opacity: 0; }
        }

        .f-nav-item {
            position: relative; display: grid; grid-template-columns: 54px minmax(0, 1fr); gap: 12px; align-items: center;
            width: 100%; text-align: left; border: 0; background: transparent; cursor: pointer;
            padding: 10px 14px 10px 0; border-radius: 16px; color: rgb(var(--content-color) / .55);
            transition: color .22s ease, background .22s ease, transform .22s ease;
        }
        .f-nav-item:hover { color: rgb(var(--content-color)); transform: translateX(2px); }
        .f-nav-item.is-active { color: rgb(var(--content-color)); background: rgb(var(--card-color)); box-shadow: 0 16px 34px rgba(15, 27, 61, .08); }
        .f-nav-ico {
            position: relative; z-index: 1; display: grid; place-items: center; width: 54px; height: 54px; border-radius: 999px;
            background: rgb(var(--card-color)); border: 1px solid rgb(var(--stroke-color));
            transition: border-color .22s ease, box-shadow .22s ease, transform .22s ease, color .22s ease;
        }
        .f-nav-item:hover .f-nav-ico { transform: translateY(-2px); }
        .f-nav-item.is-active .f-nav-ico {
            color: #e8521a; border-color: rgba(232, 82, 26, .34);
            box-shadow: 0 0 0 7px rgba(232, 82, 26, .08), 0 14px 30px rgba(232, 82, 26, .16);
        }
        .f-nav-kicker { font-size: 10px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: rgb(var(--content-color) / .45); transition: color .22s ease; }
        .f-nav-item.is-active .f-nav-kicker { color: #e8521a; }
        .f-nav-title { font-size: 17px; font-weight: 700; line-height: 1.12; transition: font-weight .2s ease; }
        .f-nav-item.is-active .f-nav-title { font-weight: 800; }

        .f-stage {
            position: relative; min-height: 340px; border: 1px solid rgb(var(--stroke-color)); border-radius: 26px; overflow: hidden;
            background: radial-gradient(520px 260px at 60% 12%, rgba(232, 82, 26, .08), transparent 64%), rgb(var(--card-color));
            box-shadow: 0 26px 58px rgba(15, 27, 61, .08);
        }
        .f-stage::before {
            content: ""; position: absolute; inset: 0; pointer-events: none;
            background: linear-gradient(90deg, rgb(var(--content-color) / .03) 1px, transparent 1px),
                        linear-gradient(180deg, rgb(var(--content-color) / .03) 1px, transparent 1px);
            background-size: 64px 64px; mask-image: linear-gradient(180deg, transparent, #000 16%, #000 82%, transparent);
        }
        @media (prefers-reduced-motion: reduce) { .f-nav::after { animation: none; opacity: 0; } }

        /* ---- Team-building photo composition ---- */
        .tb-photo { animation: tbFloat var(--dur, 7s) ease-in-out infinite; animation-delay: var(--del, 0s); will-change: transform; }
        .tb-photo img { transition: transform .6s cubic-bezier(.2, .8, .2, 1); }
        .tb-photo:hover img { transform: scale(1.05); }
        @keyframes tbFloat { 0%, 100% { transform: translateY(0); } 50% { transform: translateY(-8px); } }
        @media (prefers-reduced-motion: reduce) { .tb-photo { animation: none; } }
    </style>

    {{-- ============================ HERO ============================ --}}
    <section class="relative overflow-hidden">
        <div class="absolute -top-32 -right-24 w-[36rem] h-[36rem] rounded-full bg-primary/25 f-blob pointer-events-none"></div>
        <div class="absolute top-40 -left-40 w-[32rem] h-[32rem] rounded-full bg-accent/30 f-blob pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 md:px-8 pt-6 md:pt-10 pb-10 md:pb-16">
            <div class="md:grid grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="col-span-6"
                    x-data x-intersect.once="$el.querySelectorAll('.f-reveal').forEach(e => e.classList.add('in'))">
                    <p class="f-reveal text-xs font-bold uppercase tracking-widest text-primary">
                        Strategy Facilitation <span class="opacity-40">·</span> Team Building <span class="opacity-40">·</span> Leadership Retreats
                    </p>

                    <h1 class="f-reveal f-d1 mt-5 text-4xl lg:text-[3.5rem] font-bold uppercase leading-[1.05]">
                        Turn Important <span class="outline-text">Conversations</span>
                        <span class="block">Into <span class="text-primary">Clear Decisions</span></span>
                    </h1>

                    <p class="f-reveal f-d2 mt-5 text-base/loose opacity-70 max-w-xl">
                        <strong>WhyLead</strong> provides strategy facilitation, leadership retreat design and
                        team-building experiences for organisations that need more than another meeting. We help teams
                        surface the real issues, make better decisions and leave with shared priorities, named owners
                        and practical next steps.
                    </p>

                    <div class="f-reveal f-d3 mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ $contactUrl }}" target="_blank" rel="noopener" class="btn">Plan Your Session</a>
                        <a href="#sessions"
                            class="btn btn-outline group">
                            Explore Facilitation Services
                            <svg class="size-4 transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </a>
                    </div>

                    <p class="f-reveal f-d3 mt-5 inline-flex items-center gap-1.5 text-xs opacity-55">
                        <svg class="size-3.5 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        Facilitation for teams in Tanzania, across East Africa, and the world
                    </p>

                    <div class="f-reveal f-d4 mt-10">
                        <p class="text-[11px] font-bold uppercase tracking-widest opacity-40">Trusted by</p>
                        @include('partials.trusted-marquee')
                    </div>
                </div>

                <div class="col-span-6 mt-12 md:mt-0"
                    x-data x-intersect.once="$el.querySelector('.f-reveal').classList.add('in')">
                    <div class="f-reveal f-d2 relative">
                        <div class="relative aspect-[4/5] sm:aspect-[5/4] md:aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-black/5">
                            <img src="{{ $heroImage }}" alt="WhyLead strategy facilitation and leadership retreat session"
                                class="absolute inset-0 w-full h-full object-cover object-top" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        </div>

                        {{-- Floating stat card --}}
                        <div class="f-float absolute -bottom-6 -left-4 md:-left-8 max-w-[15rem]"
                            x-data="{ n: 0 }"
                            x-intersect.once="(() => { let s = setInterval(() => { n += 2; if (n >= 82) { n = 82; clearInterval(s); } }, 20); })()">
                            <div class="bg-card border border-stroke rounded-2xl shadow-xl p-4 flex items-center gap-3">
                                <div class="flex-shrink-0 size-14 rounded-xl bg-gradient-to-br from-primary to-accent text-white font-bold text-lg flex items-center justify-center">
                                    <span x-text="n + '%'">82%</span>
                                </div>
                                <p class="text-xs/snug opacity-70">
                                    of clients said our facilitation aligned with their goals and expectations
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ THE ARC: high-level → human-level ============ --}}
    <section class="relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl f-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">The facilitation journey</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    One journey, <span class="outline-text">two altitudes</span>
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    Great facilitation moves fluidly between altitudes &mdash; from the boardroom where strategy is
                    set, to the room where a group of capable people actually becomes a team. We facilitate the
                    whole arc.
                </p>
            </div>

            <div class="mt-14 j-track"
                x-data x-intersect.once="$el.querySelectorAll('.f-reveal').forEach(e => e.classList.add('in'))">
                <div class="hidden md:block j-line"></div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
                    @foreach ($journey as $i => $j)
                        <div class="f-reveal f-d{{ $i + 1 }} j-item relative text-center md:text-left">
                            <div class="j-node relative z-10 mx-auto md:mx-0 size-14 rounded-2xl bg-card border border-stroke shadow-sm flex items-center justify-center text-lg">
                                <span class="j-num text-primary font-bold">{{ $i + 1 }}</span>
                            </div>
                            @if ($j['sub'])
                                <span class="inline-block mt-3 text-[10px] font-bold uppercase tracking-widest {{ $i === 0 ? 'opacity-50' : 'text-primary' }}">{{ $j['sub'] }}</span>
                            @endif
                            <h3 class="mt-1 text-lg font-bold uppercase">{{ $j['k'] }}</h3>
                            <p class="mt-1 text-sm/relaxed opacity-70">{{ $j['desc'] }}</p>

                            {{-- hover popover --}}
                            <div class="j-pop">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-primary">{{ $j['sub'] ?: 'Stage ' . ($i + 1) }}</p>
                                <h4 class="mt-1 text-base font-bold">{{ $j['k'] }}</h4>
                                <ul class="mt-2.5 space-y-2">
                                    @foreach ($j['points'] as $pt)
                                        <li class="flex items-start gap-2 text-xs/relaxed opacity-80">
                                            <svg class="size-3.5 flex-shrink-0 text-primary mt-0.5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                            </svg>
                                            <span>{!! $pt !!}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== SESSION TYPES (tabs) ====================== --}}
    <section id="sessions" class="relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl f-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">Four ways we facilitate</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    <span class="outline-text">Sessions</span> designed to shape direction
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    Every gathering is built around your goals. Explore the four session types we collaboratively
                    shape with you.
                </p>
            </div>

            <div class="mt-10 grid lg:grid-cols-[minmax(260px,0.34fr)_minmax(0,0.66fr)] gap-6 lg:gap-10 items-start"
                x-data="{
                    active: 0,
                    touched: false,
                    count: {{ count($sessions) }},
                    timer: null,
                    init() {
                        this.$nextTick(() => { const n = this.$refs.nav; if (n) n.style.setProperty('--rail', (n.offsetHeight - 58) + 'px'); });
                        this.timer = setInterval(() => { if (!this.touched) this.active = (this.active + 1) % this.count; }, 5000);
                    },
                    pick(i) { this.active = i; this.touched = true; },
                }">
                {{-- Navigator --}}
                <div class="f-nav" x-ref="nav" x-bind:class="touched && 'is-touched'" x-on:mouseenter="touched = true">
                    @foreach ($sessions as $i => $s)
                        <button type="button" class="f-nav-item" x-bind:class="active === {{ $i }} && 'is-active'"
                            x-on:click="pick({{ $i }})" x-on:mouseenter="pick({{ $i }})">
                            <span class="f-nav-ico">
                                <svg class="size-[22px]" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $s['icon'] }}" />
                                </svg>
                            </span>
                            <span class="min-w-0">
                                <span class="f-nav-kicker block">{{ $s['tag'] }}</span>
                                <span class="f-nav-title block">{{ \Illuminate\Support\Str::before($s['name'], ' Sessions') }}</span>
                            </span>
                        </button>
                    @endforeach
                </div>

                {{-- Stage --}}
                <div class="f-stage">
                    @foreach ($sessions as $i => $s)
                        <div class="p-6 md:p-9" x-show="active === {{ $i }}" x-cloak
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0">
                            <div class="flex items-center justify-between border-b border-stroke pb-4 mb-6">
                                <span class="text-[11px] font-bold uppercase tracking-widest text-primary">{{ $s['tag'] }}</span>
                                <span class="text-[11px] font-semibold tabular-nums opacity-40">0{{ $i + 1 }} &middot; 0{{ count($sessions) }}</span>
                            </div>
                            <h3 class="text-2xl lg:text-3xl font-bold">{{ $s['name'] }}</h3>
                            <p class="mt-2 text-lg opacity-90">{!! $s['lead'] !!}</p>
                            <p class="mt-3 text-base/loose opacity-70 max-w-xl">{!! $s['desc'] !!}</p>
                            <ul class="mt-6 grid sm:grid-cols-3 gap-2.5">
                                @foreach ($s['points'] as $p)
                                    <li class="flex items-start gap-2 rounded-xl border border-stroke p-3">
                                        <svg class="size-4 flex-shrink-0 text-primary mt-0.5" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                        </svg>
                                        <span class="text-sm/relaxed font-medium">{!! $p !!}</span>
                                    </li>
                                @endforeach
                            </ul>
                            <a href="{{ $contactUrl }}" target="_blank" rel="noopener" class="btn mt-7">Plan a {{ \Illuminate\Support\Str::before($s['name'], ' Sessions') }} session</a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- ============ TEAM BUILDING & RETREATS (human level) ============ --}}
    <section class="relative py-12 md:py-16 bg-accent/[0.04]">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            @php $tbPhotos = ['retreat-1.jpg', 'retreat-2.jpg', 'retreat-3.jpg', 'retreat-4.jpg']; @endphp
            <div class="lg:grid grid-cols-2 gap-12 xl:gap-16 items-center"
                x-data="{ active: 0, rx: 0, ry: 0,
                    tilt(e) { const r = e.currentTarget.getBoundingClientRect(); this.ry = ((e.clientX - r.left) / r.width - .5) * 7; this.rx = -((e.clientY - r.top) / r.height - .5) * 7; },
                    reset() { this.rx = 0; this.ry = 0; } }">

                {{-- Left: intro + interactive triggers --}}
                <div class="f-reveal" x-data x-intersect.once="$el.classList.add('in')">
                    <p class="text-xs font-bold uppercase tracking-widest text-primary">Team building &amp; retreat facilitation</p>
                    <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                        Healthy teams are <span class="text-primary">thriving teams</span>
                    </h2>
                    <p class="mt-4 text-base/loose opacity-70 max-w-xl">
                        We work with your teams to reach a healthier place through our <strong>SPR model</strong> &mdash;
                        facilitating offsite retreats and, for longer engagements, a retainer.
                    </p>

                    <div class="mt-7 grid sm:grid-cols-2 gap-3">
                        @foreach ($teamCards as $i => $c)
                            <button type="button" class="group text-left rounded-2xl border p-5 transition-all duration-300 focus:outline-none"
                                x-on:mouseenter="active = {{ $i }}" x-on:focus="active = {{ $i }}"
                                x-bind:class="active === {{ $i }} ? 'border-primary/50 bg-primary/[0.06] shadow-lg -translate-y-0.5' : 'border-stroke bg-card hover:border-primary/30'">
                                <div class="size-10 rounded-xl flex items-center justify-center transition-colors"
                                    x-bind:class="active === {{ $i }} ? 'bg-primary text-white' : 'bg-primary/10 text-primary'">
                                    <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $c['icon'] }}" /></svg>
                                </div>
                                <h3 class="mt-3 text-sm font-bold leading-snug">{!! $c['title'] !!}</h3>
                                <p class="mt-1 text-xs/relaxed opacity-65">{!! $c['body'] !!}</p>
                            </button>
                        @endforeach
                    </div>

                    <div class="mt-6 flex flex-wrap gap-2">
                        @foreach ($retreatFormats as $f)
                            <span class="text-xs font-semibold rounded-full border border-stroke px-3 py-1.5 opacity-80">{!! $f !!}</span>
                        @endforeach
                    </div>
                </div>

                {{-- Right: interactive photo stage — 3D tilt on move, cross-fades with the active card --}}
                <div class="mt-12 lg:mt-0 f-reveal f-d2" x-data x-intersect.once="$el.classList.add('in')">
                    <div class="tb-stage relative w-full max-w-md mx-auto lg:ml-auto lg:mr-0 aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-black/5"
                        style="transition: transform .25s ease; transform-style: preserve-3d"
                        x-bind:style="`transform: perspective(1000px) rotateX(${rx}deg) rotateY(${ry}deg)`"
                        x-on:mousemove="tilt($event)" x-on:mouseleave="reset()">
                        @foreach ($tbPhotos as $i => $ph)
                            <img src="{{ asset('img/facilitation/' . $ph) }}" alt="Team-building retreat"
                                class="absolute inset-0 w-full h-full object-cover" x-show="active === {{ $i }}" x-cloak
                                x-transition:enter="transition ease-out duration-500" x-transition:enter-start="opacity-0 scale-105" x-transition:enter-end="opacity-100 scale-100"
                                x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0" />
                        @endforeach
                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/5 to-transparent pointer-events-none"></div>
                        @foreach ($teamCards as $i => $c)
                            <p x-show="active === {{ $i }}" x-cloak x-transition
                                class="absolute left-6 bottom-6 right-6 text-white font-bold text-lg leading-snug pointer-events-none">{{ strip_tags(html_entity_decode($c['title'])) }}</p>
                        @endforeach
                        <span class="absolute left-6 top-6 text-[10px] font-bold uppercase tracking-widest text-white/70 pointer-events-none">On retreat, together</span>
                    </div>
                    <p class="mt-4 text-center lg:text-left text-xs opacity-50">Hover a card to explore &middot; move your cursor over the photo</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ THRIVING TEAMS INDEX (measured retreats) ============ --}}
    <section class="relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl f-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">Now included with every retreat</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    Every retreat now comes <span class="outline-text">measured</span>
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    A pulse across the whole team turns a great experience into a measured, trackable outcome &mdash;
                    the <strong>Thriving Teams Index</strong>.
                </p>
            </div>

            @php
                $sig = [
                    'constraint' => ['The constraint', 'text-primary', 'bg-primary/10'],
                    'strength'   => ['Strength',       'text-emerald-500', 'bg-emerald-500/10'],
                    'watch'      => ['Watch',          'text-amber-500', 'bg-amber-500/10'],
                ];
            @endphp

            <div class="mt-12 grid lg:grid-cols-2 gap-6 items-stretch f-reveal"
                x-data="{ sel: {{ $ttiConstraint }} }" x-intersect.once="$el.classList.add('in')">

                {{-- Dashboard: score gauge + clickable dimension signals --}}
                <div class="relative overflow-hidden rounded-3xl bg-accent text-white p-6 md:p-8"
                    x-data="{ score: 0, bars: false, run() { let s = setInterval(() => { this.score += 2; if (this.score >= {{ $ttiScore }}) { this.score = {{ $ttiScore }}; clearInterval(s); } }, 25); this.bars = true; } }"
                    x-intersect.once="run()">
                    <div class="flex items-center justify-between">
                        <p class="text-[11px] font-bold uppercase tracking-widest text-primary">Sponsor dashboard</p>
                        <p class="text-[10px] font-semibold uppercase tracking-widest text-white/40">Thriving Teams Index</p>
                    </div>
                    <div class="mt-6 flex items-center gap-6">
                        <div class="relative size-28 flex-shrink-0">
                            <svg viewBox="0 0 120 120" class="size-28 -rotate-90">
                                <circle cx="60" cy="60" r="52" fill="none" stroke="rgba(255,255,255,.12)" stroke-width="10" />
                                <circle cx="60" cy="60" r="52" fill="none" stroke="#F26B21" stroke-width="10" stroke-linecap="round"
                                    pathLength="100" stroke-dasharray="100" x-bind:stroke-dashoffset="100 - score"
                                    style="transition: stroke-dashoffset .1s linear" />
                            </svg>
                            <div class="absolute inset-0 flex flex-col items-center justify-center">
                                <span class="text-3xl font-bold" x-text="Math.round(score)">{{ $ttiScore }}</span>
                                <span class="text-[9px] uppercase tracking-widest text-white/50">Team score</span>
                            </div>
                        </div>
                        <p class="flex-1 text-xs/relaxed text-white/60">
                            Tap a dimension to see what the engine reads &mdash; and the decision it points to.
                        </p>
                    </div>

                    <div class="mt-6 space-y-2">
                        @foreach ($ttiDims as $i => $d)
                            <button type="button" class="w-full text-left rounded-xl px-3 py-2 -mx-1 transition-colors"
                                x-bind:class="sel === {{ $i }} ? 'bg-white/10' : 'hover:bg-white/5'"
                                x-on:click="sel = {{ $i }}" x-on:mouseenter="sel = {{ $i }}">
                                <div class="flex justify-between text-xs mb-1">
                                    <span x-bind:class="sel === {{ $i }} ? 'text-white font-semibold' : 'text-white/80'">{{ $d['label'] }}</span>
                                    <span class="font-semibold {{ $d['note'] === 'constraint' ? 'text-primary' : ($d['note'] === 'strength' ? 'text-emerald-400' : 'text-white/60') }}">{{ $d['val'] }}@if ($d['note']) &middot; {{ $d['note'] }}@endif</span>
                                </div>
                                <div class="h-1.5 rounded-full bg-white/10 overflow-hidden">
                                    <div class="h-full rounded-full {{ $d['note'] === 'strength' ? 'bg-emerald-400' : 'bg-primary' }}"
                                        style="transition: width 1s ease .1s" x-bind:style="`width:${bars ? {{ $d['val'] }} : 0}%`"></div>
                                </div>
                            </button>
                        @endforeach
                    </div>
                </div>

                {{-- Decision engine: reacts to the selected dimension --}}
                <div class="relative rounded-3xl border border-stroke bg-card p-6 md:p-8">
                    <div class="flex items-center justify-between border-b border-stroke pb-4 mb-6">
                        <span class="text-[11px] font-bold uppercase tracking-widest text-primary">Decision engine</span>
                        <span class="text-[11px] font-semibold tabular-nums opacity-40" x-text="(sel + 1) + ' · {{ count($ttiDims) }}'"></span>
                    </div>

                    @foreach ($ttiDims as $i => $d)
                        @php $s = $sig[$d['note']] ?? ['Signal', 'opacity-60', 'bg-content/5']; @endphp
                        <div x-show="sel === {{ $i }}" x-cloak
                            x-transition:enter="transition ease-out duration-400"
                            x-transition:enter-start="opacity-0 translate-y-3"
                            x-transition:enter-end="opacity-100 translate-y-0">
                            <div class="flex items-center gap-3">
                                <span class="text-[10px] font-bold uppercase tracking-widest {{ $s[1] }} {{ $s[2] }} rounded-full px-2.5 py-1">{{ $s[0] }}</span>
                                <h3 class="text-xl font-bold">{{ $d['label'] }} <span class="text-primary">&middot; {{ $d['val'] }}</span></h3>
                            </div>

                            <div class="mt-5 grid sm:grid-cols-2 gap-3">
                                <div class="rounded-2xl border border-stroke p-4">
                                    <span class="text-[10px] font-bold uppercase tracking-widest opacity-40">Today</span>
                                    <p class="mt-1.5 text-sm/relaxed opacity-75">{!! $d['today'] !!}</p>
                                </div>
                                <div class="rounded-2xl border border-primary/25 bg-primary/[0.05] p-4">
                                    <span class="text-[10px] font-bold uppercase tracking-widest text-primary">After the retreat</span>
                                    <p class="mt-1.5 text-sm/relaxed opacity-80">{!! $d['after'] !!}</p>
                                </div>
                            </div>

                            <div class="mt-4 rounded-2xl bg-accent text-white p-4">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-primary">Recommended decision</p>
                                <p class="mt-1 font-bold">{{ $d['decision'] }}</p>
                                <p class="mt-1 text-sm text-white/70">{!! $d['why'] !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Measure → Diagnose → Track --}}
            <div class="mt-6 grid md:grid-cols-3 gap-4">
                @foreach ($ttiSteps as $i => $s)
                    <div class="f-reveal f-d{{ $i + 1 }} rounded-2xl border border-stroke bg-card p-5 flex gap-4"
                        x-data x-intersect.once="$el.classList.add('in')">
                        <div class="text-primary font-bold">{{ $s['n'] }}</div>
                        <div>
                            <p class="text-[11px] font-bold uppercase tracking-widest text-primary">{{ $s['k'] }}</p>
                            <h3 class="mt-0.5 text-base font-bold">{{ $s['title'] }}</h3>
                            <p class="mt-1 text-sm/relaxed opacity-70">{!! $s['desc'] !!}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== IMPACT STATEMENT + RINGS ====================== --}}
    <section class="relative py-10 md:py-14 overflow-hidden isolate bg-accent/[0.04]">
        {{-- Ambient colour flare --}}
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            {{-- Soft orange blob top-left --}}
            <div class="absolute -top-24 -left-24 size-[520px] rounded-full f-blob f-float"
                style="background: radial-gradient(closest-side, rgba(242,107,33,.35), rgba(242,107,33,0));"></div>
            {{-- Indigo blob bottom-right --}}
            <div class="absolute -bottom-32 -right-24 size-[560px] rounded-full f-blob f-float"
                style="background: radial-gradient(closest-side, rgba(25,18,75,.32), rgba(25,18,75,0)); animation-delay: -3.5s;"></div>
            {{-- Amber accent mid --}}
            <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 size-[420px] rounded-full f-blob"
                style="background: radial-gradient(closest-side, rgba(235,179,5,.22), rgba(235,179,5,0)); opacity:.4;"></div>
            {{-- Faint dotted grid --}}
            <div class="absolute inset-0 opacity-[0.07]"
                style="background-image: radial-gradient(rgb(var(--content-color)) 1px, transparent 1px); background-size: 22px 22px;
                       -webkit-mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
                       mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 md:px-8 relative">
            {{-- Overline chip --}}
            <div class="f-reveal inline-flex items-center gap-2.5 mb-6" x-data x-intersect.once="$el.classList.add('in')">
                <span class="inline-block h-2 w-2 rounded-full bg-primary shadow-[0_0_0_4px_rgba(242,107,33,0.18)]"></span>
                <span class="text-[11px] font-bold uppercase tracking-[0.22em] text-primary">The outcome</span>
                <span class="hidden sm:inline-block h-px w-16 bg-gradient-to-r from-primary/60 to-transparent"></span>
            </div>

            {{-- Big statement --}}
            <div class="f-reveal max-w-5xl" x-data x-intersect.once="$el.classList.add('in')">
                <h2 class="text-3xl sm:text-4xl md:text-5xl lg:text-6xl font-bold uppercase leading-[1.08] tracking-tight [text-wrap:balance]">
                    Teams leave <span class="relative inline-block align-baseline"><span class="relative z-10 bg-gradient-to-r from-primary to-[#EBB305] bg-clip-text text-transparent">aligned</span><span aria-hidden="true" class="absolute left-0 right-0 bottom-[0.12em] h-[0.18em] bg-primary/25 rounded-sm -z-0"></span></span>, <span class="relative inline-block align-baseline"><span class="relative z-10 bg-gradient-to-r from-primary via-[#c94210] to-accent bg-clip-text text-transparent">stronger</span><span aria-hidden="true" class="absolute left-0 right-0 bottom-[0.12em] h-[0.18em] bg-primary/25 rounded-sm -z-0"></span></span> and <span class="relative inline-block align-baseline"><span class="relative z-10 bg-gradient-to-r from-[#EBB305] via-primary to-accent bg-clip-text text-transparent">united</span><span aria-hidden="true" class="absolute left-0 right-0 bottom-[0.12em] h-[0.18em] bg-primary/25 rounded-sm -z-0"></span></span> as a result of our facilitation.
                </h2>

                {{-- Decorative flourish --}}
                <div class="mt-8 flex items-center gap-2.5" aria-hidden="true">
                    <span class="h-[3px] w-16 rounded-full bg-gradient-to-r from-primary to-[#EBB305]"></span>
                    <span class="h-[3px] w-8 rounded-full bg-primary/50"></span>
                    <span class="h-[3px] w-3 rounded-full bg-primary/30"></span>
                </div>
            </div>

            {{-- Impact stats — animated progress rings --}}
            <div class="mt-10 md:mt-14 grid sm:grid-cols-3 gap-8"
                x-data="{
                    current: 0,
                    target: 1,
                    roll() {
                        this.$el.querySelectorAll('.f-reveal').forEach(el => el.classList.add('in'));
                        this.current = 0;
                        const step = 0.1;
                        const handle = () => {
                            if (this.current < this.target) {
                                this.current += step;
                                setTimeout(() => requestAnimationFrame(handle), 80);
                            } else {
                                this.current = this.target;
                            }
                        };
                        requestAnimationFrame(handle);
                    }
                }"
                x-intersect.once.threshold.65="roll()">
                @foreach ($impact as $i => $m)
                    @php
                        $percent  = (int) $m['percent'];
                        $progress = $percent < 100 ? $percent - 4 : $percent;
                    @endphp
                    <div class="f-reveal f-d{{ $i + 1 }} flex flex-col items-center text-center gap-3">
                        <div class="relative">
                            {{-- Coloured halo behind the ring --}}
                            <div aria-hidden="true"
                                class="absolute inset-0 rounded-full f-blob"
                                style="background: radial-gradient(closest-side, {{ $m['glow'] }}, transparent 70%); transform: scale(1.6);"></div>

                            <svg class="relative -rotate-90 size-36 lg:size-40" viewBox="0 0 120 120" stroke-width="12">
                                <defs>
                                    <linearGradient id="facProgressGradient" x1="100%" y1="100%" x2="50%" y2="0%">
                                        <stop offset="0%" style="stop-color: #F26B21; stop-opacity: 1" />
                                        <stop offset="100%" style="stop-color: #19124B; stop-opacity: 1" />
                                    </linearGradient>
                                    <pattern id="facPattern{{ $i }}" viewBox="0 0 33.554 32.053" width="12%" height="12%">
                                        <path fill="{{ $m['patternColor'] }}"
                                            d="M 26.5547 0.00391 C 24.7619 -0.0498739 23.0305 0.659684 21.791 1.95614 C 20.5515 3.25259 19.9204 5.01414 20.0547 6.80273 C 20.1547 10.4027 22.0531 13.0024 24.9531 14.9023 C 26.7531 16.1023 28.1535 16.0035 29.8535 14.6035 C 32.1052 12.8362 33.4601 10.1636 33.5547 7.30273 C 33.5547 2.80274 30.6547 0.00391 26.5547 0.00391 Z M 6.35352 0.90234 C 4.44899 0.835557 2.62148 1.65718 1.40736 3.12605 C 0.193246 4.59493 -0.269738 6.54442 0.1543 8.40234 C 0.711812 11.1705 2.42046 13.5708 4.85352 15.0039 C 5.37355 15.4062 5.99906 15.6491 6.6543 15.7031 C 7.02312 15.7696 7.40305 15.7352 7.75391 15.6035 C 8.34533 15.4212 8.89079 15.1141 9.35352 14.7031 C 11.1915 13.1515 12.4005 10.9828 12.7539 8.60352 C 13.1588 6.6938 12.667 4.70382 11.4193 3.20247 C 10.1715 1.70112 8.30508 0.853657 6.35352 0.90234 Z M 16.6191 13.5859 C 16.4655 13.5881 16.3106 13.5941 16.1543 13.6035 C 13.9658 13.6967 11.9228 14.7256 10.545 16.4285 C 9.16722 18.1314 8.58743 20.3442 8.95312 22.5039 C 9.55312 26.8039 12.0543 29.6035 15.6543 31.6035 C 17.0508 32.3521 18.7657 32.1526 19.9531 31.1035 C 22.771 28.9755 24.5234 25.7267 24.7539 22.2031 C 24.8508 16.875 21.3818 13.5178 16.6191 13.5859 Z" />
                                    </pattern>
                                </defs>

                                <circle cx="60" cy="60" r="54" fill="none" stroke="currentColor" stroke-opacity="0.15" />

                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $m['color'] }}" stroke-linecap="round" stroke-linejoin="round"
                                    pathLength="100" stroke-dasharray="100"
                                    stroke-dashoffset="100"
                                    x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />

                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="url(#facPattern{{ $i }})" stroke-linecap="round" stroke-linejoin="round"
                                    pathLength="100" stroke-dasharray="100"
                                    stroke-dashoffset="100"
                                    x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />
                            </svg>

                            <div class="absolute inset-0 flex items-center justify-center text-3xl lg:text-4xl font-bold">
                                <span x-text="Math.min({{ $percent }}, Math.floor({{ $percent }} * current))">0</span>%
                            </div>
                        </div>

                        <p class="mt-2 text-sm/relaxed opacity-70 max-w-[15rem] mx-auto [text-wrap:balance]">
                            {{ $m['desc'] }}
                        </p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
