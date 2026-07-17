@extends('layout.index')

@section('title', 'Leadership Development Training in Dar es Salaam, Tanzania | WhyLead')
@section('description',
    'WhyLead designs bespoke leadership development training for teams and organisations in Dar es Salaam,
    Tanzania and across East Africa — grounded in your strategy, operating model and culture, and built to
    change how people think, lead and work.')

@section('meta')
    <meta name="keywords"
        content="leadership development training, leadership training Tanzania, bespoke leadership programs, executive training East Africa, KASH model, manager training, middle management program, communication training, problem-solving training, feedback training, corporate training Dar es Salaam" />
@endsection

@php
    // Hero image — reuse existing programme imagery so the page always renders.
    $heroImage = asset('img/uploads/programmes-empowering-high-performing-teams.jpg');

    // The engagement journey — Brief → Diagnose → Design & Deliver → Embed.
    $engagement = [
        [
            'k' => 'Brief', 'sub' => 'Your challenge',
            'desc' => 'A briefing meeting to understand your goals, people and context.',
            'points' => ['Goal &amp; audience alignment', 'Context capture', 'Stakeholder mapping'],
            'icon' => 'M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z',
        ],
        [
            'k' => 'Diagnose', 'sub' => 'The real pain',
            'desc' => 'We assess the real pain points behind the request — not just the symptom.',
            'points' => ['Root-cause analysis', 'Signal gathering', 'Bespoke framing'],
            'icon' => 'M21 21l-5.197-5.197m0 0A7.5 7.5 0 1 0 5.196 5.196a7.5 7.5 0 0 0 10.607 10.607Z',
        ],
        [
            'k' => 'Design &amp; deliver', 'sub' => 'Contextual',
            'desc' => 'Customized, contextually relevant sessions, facilitated to transform.',
            'points' => ['Bespoke curriculum', 'Live facilitation', 'Real-time adaptation'],
            'icon' => 'm9.813 15.904 -.98-2.907a2.25 2.25 0 0 0-1.423-1.423L4.5 10.594l2.907-.98a2.25 2.25 0 0 0 1.423-1.423l.98-2.907.98 2.907a2.25 2.25 0 0 0 1.423 1.423l2.907.98-2.907.98a2.25 2.25 0 0 0-1.423 1.423ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z',
        ],
        [
            'k' => 'Embed', 'sub' => 'Support that lasts',
            'desc' => 'Post-engagement coaching, MEL, pulse sessions and accountability.',
            'points' => ['Coaching', 'MEL &amp; pulse sessions', 'Accountability'],
            'icon' => 'M12 6v12m-3-2.818.879.659c1.171.879 3.07.879 4.242 0 1.172-.879 1.172-2.303 0-3.182C13.536 12.219 12.768 12 12 12c-2.725 0-4.985-2.03-4.985-4.545S9.275 3 12 3s4.985 2.03 4.985 4.545',
        ],
    ];

    // The KASH model — Knowledge, Attitude, Skills, Habits.
    $kash = [
        [
            'letter' => 'K', 'name' => 'Knowledge', 'tag' => 'Learn',
            'lead' => 'Fresh frameworks and insight leaders can actually name and use.',
            'desc' => 'We introduce ideas and mental models that are research-backed and contextually relevant — grounded in what actually matters in the room, not textbook theory.',
            'points' => ['Research-backed', 'Contextually relevant', 'Frameworks that stick'],
            'icon' => 'M12 6.042A8.967 8.967 0 0 0 6 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 0 1 6 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 0 1 6-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0 0 18 18a8.967 8.967 0 0 0-6 2.292m0-14.25v14.25',
        ],
        [
            'letter' => 'A', 'name' => 'Attitude', 'tag' => 'Shift',
            'lead' => 'The mindset shift that changes how people show up.',
            'desc' => 'We surface the beliefs and stances behind current behaviour — because insight only sticks when the underlying attitude has moved.',
            'points' => ['Belief-level shifts', 'Ownership &amp; outlook', 'Honest reflection'],
            'icon' => 'M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18',
        ],
        [
            'letter' => 'S', 'name' => 'Skills', 'tag' => 'Practice',
            'lead' => 'The moves people can now make, in the moment.',
            'desc' => 'We build muscle through practice — hard conversations, decisions under pressure, coaching moments — until the new moves feel natural.',
            'points' => ['Rehearsal &amp; role-play', 'Real-time feedback', 'Immediately applicable'],
            'icon' => 'M11.42 15.17 17.25 21A2.652 2.652 0 0 0 21 17.25l-5.877-5.877M11.42 15.17l2.496-3.03c.317-.384.74-.626 1.208-.766M11.42 15.17l-4.655 5.653a2.548 2.548 0 1 1-3.586-3.586l6.837-5.63m5.108-.233c.55-.164 1.163-.188 1.743-.14a4.5 4.5 0 0 0 4.486-6.336l-3.276 3.277a3.004 3.004 0 0 1-2.25-2.25l3.276-3.276a4.5 4.5 0 0 0-6.336 4.486c.091 1.076-.071 2.264-.904 2.95l-.102.085m-1.745 1.437 1.03-1.244m0 0 6.53-7.884',
        ],
        [
            'letter' => 'H', 'name' => 'Habits', 'tag' => 'Stick',
            'lead' => 'The daily rhythms that make the shift last.',
            'desc' => 'We codify the small, repeatable behaviours that turn a great workshop into a lasting change in how a team leads and works.',
            'points' => ['Daily &amp; weekly rituals', 'Manager rhythms', 'Accountability built in'],
            'icon' => 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99',
        ],
    ];

    // The 6 modules taught inside Thrive in the Middle — sourced from the program's live page.
    // Each has a signature question and the outcomes participants leave with.
    $titmModules = [
        [
            'name'    => 'Self-leadership',
            'tag'     => 'Foundation',
            'icon'    => 'M15.75 6a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0ZM4.501 20.118a7.5 7.5 0 0 1 14.998 0A17.933 17.933 0 0 1 12 21.75c-2.676 0-5.216-.584-7.499-1.632Z',
            'lead'    => 'A mindset of continuous learning, aligned with your values.',
            'question'=> 'How do I cultivate a mindset that keeps me learning, adapting and aligning my actions with what I actually stand for?',
            'outcomes'=> ['Self-awareness anchored in values', 'Personal goals that stick', 'A mindset built to adapt'],
        ],
        [
            'name'    => 'Thriving under pressure',
            'tag'     => 'Resilience',
            'icon'    => 'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
            'lead'    => 'Turn competing demands into aligned outcomes.',
            'question'=> 'How do I negotiate win-win outcomes when senior leadership and my team are pulling in different directions?',
            'outcomes'=> ['Win-win negotiation under pressure', 'Obstacles reframed as opportunities', 'Composure that scales'],
        ],
        [
            'name'    => 'Cultural stewardship',
            'tag'     => 'Belonging',
            'icon'    => 'M12 21a9.004 9.004 0 0 0 8.716-6.747M12 21a9.004 9.004 0 0 1-8.716-6.747M12 21c2.485 0 4.5-4.03 4.5-9S14.485 3 12 3m0 18c-2.485 0-4.5-4.03-4.5-9S9.515 3 12 3m0 0a8.997 8.997 0 0 1 7.843 4.582M12 3a8.997 8.997 0 0 0-7.843 4.582m15.686 0A11.953 11.953 0 0 1 12 10.5c-2.998 0-5.74-1.1-7.843-2.918m15.686 0A8.959 8.959 0 0 1 21 12c0 .778-.099 1.533-.284 2.253m0 0A17.919 17.919 0 0 1 12 16.5c-3.162 0-6.133-.815-8.716-2.247m0 0A9.015 9.015 0 0 1 3 12c0-1.605.42-3.113 1.157-4.418',
            'lead'    => 'Make the culture something everyone belongs to.',
            'question'=> 'How do I make the culture something my team actively contributes to — not just something they inherit?',
            'outcomes'=> ['Real belonging across the team', 'Cross-functional collaboration that sticks', 'Culture propagation, not preservation'],
        ],
        [
            'name'    => 'Coaching for performance',
            'tag'     => 'Growth',
            'icon'    => 'M12 6v6h4.5m4.5 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z',
            'lead'    => 'Turn daily moments into coaching moments.',
            'question'=> 'How do I use everyday moments — feedback, delegation, a difficult conversation — as coaching opportunities?',
            'outcomes'=> ['Forward-focused feedback', 'Coaching in the flow of work', 'A team that keeps improving'],
        ],
        [
            'name'    => 'Building self-motivated teams',
            'tag'     => 'Motivation',
            'icon'    => 'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
            'lead'    => 'Free yourself for the strategic work.',
            'question'=> 'In a hybrid world, how do I build a team that motivates itself — so I can focus on being a change and alignment agent?',
            'outcomes'=> ['Intrinsically-motivated teams', 'Individual goals aligned to strategy', 'Resistance turned into buy-in'],
        ],
        [
            'name'    => 'Spearheading change',
            'tag'     => 'Change',
            'icon'    => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
            'lead'    => 'Lead your team through change, not around it.',
            'question'=> 'How do I make my team adaptable and proactive — treating failure as a learning asset, not a threat?',
            'outcomes'=> ['Adaptive teams that lean into change', 'Innovative problem-solving', 'A team that ships through disruption'],
        ],
    ];

    $titmStats = [
        ['num' => '7',  'label' => 'weeks'],
        ['num' => '6',  'label' => 'modules'],
        ['num' => '4',  'label' => 'stages'],
    ];

    // ACEND — the 360° leadership intelligence framework.
    // Colours match the ACEND product identity (acend.whyleadothers.com):
    // A navy, C orange, E navy, N emerald, D purple.
    $acend = [
        ['letter' => 'A', 'name' => 'Align',   'desc' => 'Turn strategy into shared direction.',       'bg' => '#19124B', 'fg' => '#ffffff'],
        ['letter' => 'C', 'name' => 'Change',  'desc' => 'Lead change and build momentum.',           'bg' => '#F26B21', 'fg' => '#ffffff'],
        ['letter' => 'E', 'name' => 'Execute', 'desc' => 'Drive outcomes with accountability.',       'bg' => '#19124B', 'fg' => '#ffffff'],
        ['letter' => 'N', 'name' => 'Nurture', 'desc' => 'Grow trust and psychological safety.',      'bg' => '#0E9F6E', 'fg' => '#ffffff'],
        ['letter' => 'D', 'name' => 'Develop', 'desc' => 'Coach others to stretch performance.',      'bg' => '#7C3AED', 'fg' => '#ffffff'],
    ];

    $impact = [
        [
            'percent'      => 100,
            'color'        => '#F26B21',
            'patternColor' => 'rgba(255, 255, 255, 0.35)',
            'glow'         => 'rgba(242,107,33,0.35)',
            'desc'         => 'of clients said our solutions addressed their pain points.',
        ],
        [
            'percent'      => 98,
            'color'        => 'url(#trainProgressGradient)',
            'patternColor' => 'rgba(255, 255, 255, 0.2)',
            'glow'         => 'rgba(25,18,75,0.35)',
            'desc'         => 'identified new possibilities for improvement after our sessions.',
        ],
        [
            'percent'      => 82,
            'color'        => '#EBB305',
            'patternColor' => 'rgba(0, 0, 0, 0.2)',
            'glow'         => 'rgba(235,179,5,0.35)',
            'desc'         => 'said the programs measurably improved their skills.',
        ],
    ];

    $contactUrl = url('/contacts?interest=Training');
@endphp

@section('content')
    <style>
        /* Scroll-reveal primitive — toggled by Alpine's x-intersect. */
        .t-reveal { opacity: 0; transform: translateY(26px); transition: opacity .7s cubic-bezier(.16,.84,.44,1), transform .7s cubic-bezier(.16,.84,.44,1); }
        .t-reveal.in { opacity: 1; transform: none; }
        .t-d1 { transition-delay: .08s } .t-d2 { transition-delay: .16s } .t-d3 { transition-delay: .24s } .t-d4 { transition-delay: .32s }

        @keyframes tFloat { 0%,100% { transform: translateY(0) } 50% { transform: translateY(-14px) } }
        .t-float { animation: tFloat 7s ease-in-out infinite; }

        .t-blob { filter: blur(60px); opacity: .5; }

        /* ---- Journey band: energy line + interactive nodes ---- */
        .t-track { position: relative; }
        .t-line {
            position: absolute; left: 8%; right: 8%; top: 28px; height: 3px; border-radius: 3px;
            overflow: hidden;
            background: linear-gradient(90deg, rgb(var(--content-color) / .22), #F26B21 55%, rgba(242,107,33,.28));
        }
        .t-line::after {
            content: ""; position: absolute; top: 0; bottom: 0; left: 0; width: 20%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,.95), transparent);
            filter: blur(.5px);
            animation: tflow 2.6s linear infinite;
        }
        @keyframes tflow { from { transform: translateX(-120%); } to { transform: translateX(560%); } }

        .t-node {
            transition: transform .28s cubic-bezier(.34,1.56,.64,1), box-shadow .28s ease,
                        border-color .28s ease, background-color .28s ease;
        }
        .t-num { transition: color .28s ease; }
        .t-item:hover .t-node {
            transform: translateY(-5px) scale(1.09);
            background-color: #F26B21; border-color: #F26B21;
            box-shadow: 0 14px 28px -8px rgba(242, 107, 33, .55);
        }
        .t-item:hover .t-num { color: #fff; }

        .t-pop {
            position: absolute; top: calc(100% + 14px); left: 50%;
            width: 240px; max-width: 80vw; padding: 15px 16px; z-index: 40; text-align: left;
            background: rgb(var(--card-color)); border: 1px solid rgb(var(--stroke-color));
            border-radius: 15px; box-shadow: 0 20px 40px -14px rgba(15, 27, 61, .28);
            opacity: 0; visibility: hidden; transform: translate(-50%, 8px);
            transition: opacity .2s ease, transform .2s ease, visibility .2s;
        }
        .t-item:hover .t-pop { opacity: 1; visibility: visible; transform: translate(-50%, 0); }
        @media (min-width: 768px) {
            .t-pop { left: 0; transform: translate(0, 8px); }
            .t-item:hover .t-pop { transform: translate(0, 0); }
        }
        @media (max-width: 767px) { .t-pop { display: none; } }

        @media (prefers-reduced-motion: reduce) {
            .t-line::after { animation: none; }
        }

        /* ---- KASH navigator (session-tab pattern) ---- */
        .t-nav { position: relative; display: grid; gap: 8px; align-content: start; padding: 6px 0; }
        .t-nav::before {
            content: ""; position: absolute; left: 26px; top: 30px; bottom: 30px; width: 2px; border-radius: 999px;
            background: linear-gradient(180deg, rgba(242, 107, 33, .35), rgb(var(--stroke-color)));
        }
        .t-nav::after {
            content: ""; position: absolute; left: 21px; top: 30px; width: 11px; height: 11px; border-radius: 50%;
            background: radial-gradient(circle, #F26B21 0%, rgba(242, 107, 33, .55) 45%, rgba(242, 107, 33, 0) 80%);
            box-shadow: 0 0 18px 4px rgba(242, 107, 33, .45); pointer-events: none; will-change: transform, opacity;
            animation: tComet 4.2s ease-in-out infinite;
        }
        .t-nav.is-touched::after { opacity: 0; animation-play-state: paused; transition: opacity .45s ease; }
        @keyframes tComet {
            0% { transform: translateY(0); opacity: 0; }
            8% { opacity: 1; }
            50% { transform: translateY(var(--rail, 260px)); opacity: 1; }
            92% { transform: translateY(0); opacity: 1; }
            100% { transform: translateY(0); opacity: 0; }
        }

        .t-nav-item {
            position: relative; display: grid; grid-template-columns: 54px minmax(0, 1fr); gap: 12px; align-items: center;
            width: 100%; text-align: left; border: 0; background: transparent; cursor: pointer;
            padding: 10px 14px 10px 0; border-radius: 16px; color: rgb(var(--content-color) / .55);
            transition: color .22s ease, background .22s ease, transform .22s ease;
        }
        .t-nav-item:hover { color: rgb(var(--content-color)); transform: translateX(2px); }
        .t-nav-item.is-active { color: rgb(var(--content-color)); background: rgb(var(--card-color)); box-shadow: 0 16px 34px rgba(15, 27, 61, .08); }
        .t-nav-ico {
            position: relative; z-index: 1; display: grid; place-items: center; width: 54px; height: 54px; border-radius: 999px;
            background: rgb(var(--card-color)); border: 1px solid rgb(var(--stroke-color));
            transition: border-color .22s ease, box-shadow .22s ease, transform .22s ease, color .22s ease;
            font-weight: 800; font-size: 20px; line-height: 1;
        }
        .t-nav-item:hover .t-nav-ico { transform: translateY(-2px); }
        .t-nav-item.is-active .t-nav-ico {
            color: #F26B21; border-color: rgba(242, 107, 33, .34);
            box-shadow: 0 0 0 7px rgba(242, 107, 33, .08), 0 14px 30px rgba(242, 107, 33, .16);
        }
        .t-nav-kicker { font-size: 10px; font-weight: 700; letter-spacing: .06em; text-transform: uppercase; color: rgb(var(--content-color) / .45); transition: color .22s ease; }
        .t-nav-item.is-active .t-nav-kicker { color: #F26B21; }
        .t-nav-title { font-size: 17px; font-weight: 700; line-height: 1.12; transition: font-weight .2s ease; }
        .t-nav-item.is-active .t-nav-title { font-weight: 800; }

        .t-stage {
            position: relative; min-height: 340px; border: 1px solid rgb(var(--stroke-color)); border-radius: 26px; overflow: hidden;
            background: radial-gradient(520px 260px at 60% 12%, rgba(242, 107, 33, .08), transparent 64%), rgb(var(--card-color));
            box-shadow: 0 26px 58px rgb(var(--content-color) / .08);
        }
        @media (prefers-reduced-motion: reduce) { .t-nav::after { animation: none; opacity: 0; } }

        /* KASH letter mark in the stage — big, brand-y (brand gradient: primary fading out) */
        .t-kash-letter {
            font-size: clamp(88px, 12vw, 148px); line-height: 1; font-weight: 800; letter-spacing: -.03em;
            background: linear-gradient(180deg, #F26B21 0%, rgba(242, 107, 33, .3) 100%); -webkit-background-clip: text; background-clip: text; color: transparent;
        }

        /* ---- Thrive modules: interactive spotlight (light card, orange accents, navy for active) ---- */
        .t-mod-nav-item {
            position: relative; display: grid; grid-template-columns: 44px minmax(0, 1fr) 20px;
            gap: 12px; align-items: center; padding: 12px 14px; border-radius: 14px; cursor: pointer;
            background: rgb(var(--content-color) / .03); border: 1px solid rgb(var(--content-color) / .08);
            color: rgb(var(--content-color) / .65); text-align: left; font: inherit; width: 100%;
            transition: background .22s ease, border-color .22s ease, color .22s ease, transform .22s ease;
        }
        .t-mod-nav-item:hover {
            color: rgb(var(--content-color));
            background: rgb(var(--content-color) / .06);
            border-color: rgb(var(--content-color) / .18);
            transform: translateX(2px);
        }
        .t-mod-nav-item.is-active {
            color: #fff;
            background: rgb(var(--accent-color));
            border-color: rgb(var(--accent-color));
            box-shadow: 0 14px 28px -12px rgb(var(--accent-color) / .5);
        }
        .t-mod-nav-num {
            width: 44px; height: 44px; border-radius: 12px; display: grid; place-items: center;
            background: rgb(var(--content-color) / .05); border: 1px solid rgb(var(--content-color) / .12);
            font-weight: 800; font-size: 13px; color: #F26B21;
            transition: background .22s ease, border-color .22s ease, color .22s ease;
        }
        .t-mod-nav-item.is-active .t-mod-nav-num {
            background: #F26B21; color: #fff; border-color: #F26B21;
        }
        .t-mod-nav-arrow { opacity: 0; transform: translateX(-4px); transition: opacity .2s ease, transform .2s ease, color .2s ease; color: #F26B21; }
        .t-mod-nav-item:hover .t-mod-nav-arrow, .t-mod-nav-item.is-active .t-mod-nav-arrow { opacity: 1; transform: translateX(0); }
        .t-mod-nav-item.is-active .t-mod-nav-arrow { color: #fff; }

        .t-mod-stage {
            position: relative; overflow: hidden; border-radius: 22px;
            background: radial-gradient(520px 260px at 80% 0%, rgba(242, 107, 33, .10), transparent 60%),
                        rgb(var(--content-color) / .02);
            border: 1px solid rgb(var(--content-color) / .1);
        }
        .t-mod-bignum {
            font-weight: 800; letter-spacing: -.06em; line-height: 1;
            font-size: clamp(64px, 12vw, 128px);
            background: linear-gradient(180deg, rgb(var(--content-color) / .18) 0%, rgb(var(--content-color) / .03) 100%);
            -webkit-background-clip: text; background-clip: text; color: transparent;
        }

        /* ACEND dimension cell — coloured to match the ACEND product identity */
        .t-dim {
            position: relative; overflow: hidden; padding: 18px 16px; border-radius: 18px;
            border: 1px solid rgb(var(--stroke-color)); background: rgb(var(--card-color));
            transition: transform .3s ease, box-shadow .3s ease, border-color .3s ease;
            display: flex; flex-direction: column; gap: 12px;
        }
        .t-dim:hover {
            transform: translateY(-4px);
            box-shadow: 0 20px 40px -18px rgba(15, 27, 61, .35);
        }
        .t-dim-tile {
            width: 56px; height: 56px; border-radius: 14px;
            display: grid; place-items: center;
            font-size: 30px; line-height: 1; font-weight: 800; letter-spacing: -.02em;
            box-shadow: 0 10px 22px -10px rgba(15, 27, 61, .35);
        }

        /* Programme spotlight card animation */
        @keyframes tPulse { 0%,100% { box-shadow: 0 0 0 0 rgba(242,107,33,.35); } 50% { box-shadow: 0 0 0 12px rgba(242,107,33,0); } }
        .t-pulse { animation: tPulse 2.5s ease-in-out infinite; }
    </style>

    {{-- ============================ HERO ============================ --}}
    <section class="relative overflow-hidden">
        <div class="absolute -top-32 -right-24 w-[36rem] h-[36rem] rounded-full bg-primary/25 t-blob pointer-events-none"></div>
        <div class="absolute top-40 -left-40 w-[32rem] h-[32rem] rounded-full bg-accent/30 t-blob pointer-events-none"></div>

        <div class="relative max-w-7xl mx-auto px-4 md:px-8 pt-6 md:pt-10 pb-10 md:pb-16">
            <div class="md:grid grid-cols-12 gap-12 lg:gap-16 items-start">
                <div class="col-span-6"
                    x-data x-intersect.once="$el.querySelectorAll('.t-reveal').forEach(e => e.classList.add('in'))">
                    <p class="t-reveal text-xs font-bold uppercase tracking-widest text-primary">
                        Leadership Training <span class="opacity-40">·</span> Bespoke Programs <span class="opacity-40">·</span> Flagship Cohorts
                    </p>

                    <h1 class="t-reveal t-d1 mt-5 text-4xl lg:text-[3.5rem] font-bold uppercase leading-[1.05]">
                        We Build The <span class="outline-text">Training</span>
                        <span class="block">Around <span class="text-primary">Your Challenge</span></span>
                    </h1>

                    <p class="t-reveal t-d2 mt-5 text-base/loose opacity-70 max-w-xl">
                        <strong>WhyLead</strong> designs leadership training programs for organisations that need more
                        than another workshop. Most of our work is bespoke &mdash; designed for your people, culture and
                        strategy &mdash; and built to change how leaders think, decide and show up.
                    </p>

                    <div class="t-reveal t-d3 mt-8 flex flex-wrap items-center gap-3">
                        <a href="{{ $contactUrl }}" class="btn">Plan Your Training</a>
                        <a href="#programs"
                            class="btn btn-outline group">
                            Explore Flagship Programs
                            <svg class="size-4 transition-transform group-hover:translate-y-0.5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19 9-7 7-7-7" />
                            </svg>
                        </a>
                    </div>

                    <p class="t-reveal t-d3 mt-5 inline-flex items-center gap-1.5 text-xs opacity-55">
                        <svg class="size-3.5 text-primary" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" /><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z" /></svg>
                        Training for teams in Tanzania, across East Africa, and the world
                    </p>

                    <div class="t-reveal t-d4 mt-10">
                        <p class="text-[11px] font-bold uppercase tracking-widest opacity-40">Trusted by</p>
                        <div class="mt-4 flex flex-wrap items-center gap-x-8 gap-y-5">
                            @php
                                $trusted = [
                                    ['src' => 'img/clients/vodacom.png',    'alt' => 'Vodacom',          'h' => 'h-6 md:h-7'],
                                    ['src' => 'img/clients/crdb.png',       'alt' => 'CRDB Bank',        'h' => 'h-8 md:h-9'],
                                    ['src' => 'img/clients/malala.svg',     'alt' => 'Malala Fund',      'h' => 'h-5 md:h-6'],
                                    ['src' => 'img/clients/women-lift.png', 'alt' => 'Womenlift Health', 'h' => 'h-6 md:h-7'],
                                ];
                            @endphp
                            @foreach ($trusted as $logo)
                                <img src="{{ asset($logo['src']) }}" alt="{{ $logo['alt'] }}"
                                    class="{{ $logo['h'] }} w-auto object-contain brightness-0 dark:invert opacity-55 hover:opacity-100 transition-opacity duration-300" />
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-span-6 mt-12 md:mt-0"
                    x-data x-intersect.once="$el.querySelector('.t-reveal').classList.add('in')">
                    <div class="t-reveal t-d2 relative">
                        <div class="relative aspect-[4/5] sm:aspect-[5/4] md:aspect-[4/5] rounded-3xl overflow-hidden shadow-2xl ring-1 ring-black/5">
                            <img src="{{ $heroImage }}" alt="WhyLead leadership development training session"
                                class="absolute inset-0 w-full h-full object-cover object-top" />
                            <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent"></div>
                        </div>

                        {{-- Floating stat card --}}
                        <div class="t-float absolute -bottom-6 -left-4 md:-left-8 max-w-[15rem]"
                            x-data="{ n: 0 }"
                            x-intersect.once="(() => { let s = setInterval(() => { n += 3; if (n >= 100) { n = 100; clearInterval(s); } }, 20); })()">
                            <div class="bg-card border border-stroke rounded-2xl shadow-xl p-4 flex items-center gap-3">
                                <div class="flex-shrink-0 size-14 rounded-xl bg-gradient-to-br from-primary to-accent text-white font-bold text-lg flex items-center justify-center">
                                    <span x-text="n + '%'">100%</span>
                                </div>
                                <p class="text-xs/snug opacity-70">
                                    of clients said our training solutions addressed their pain points
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ HOW WE WORK — engagement journey ============ --}}
    <section class="relative py-12 md:py-16">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl t-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">How we work</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    From your brief to <span class="outline-text">lasting change</span>
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    Organisations come to us with a specific challenge. We design and facilitate training that
                    meets it &mdash; grounded in your strategy, operating model and culture. Our facilitators lead
                    with questions and research-backed, contextually relevant content.
                </p>
            </div>

            <div class="mt-14 t-track"
                x-data x-intersect.once="$el.querySelectorAll('.t-reveal').forEach(e => e.classList.add('in'))">
                <div class="hidden md:block t-line"></div>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-x-6 gap-y-10">
                    @foreach ($engagement as $i => $j)
                        <div class="t-reveal t-d{{ $i + 1 }} t-item relative text-center md:text-left">
                            <div class="t-node relative z-10 mx-auto md:mx-0 size-14 rounded-2xl bg-card border border-stroke shadow-sm flex items-center justify-center text-lg">
                                <span class="t-num text-primary font-bold">{{ $i + 1 }}</span>
                            </div>
                            <span class="inline-block mt-3 text-[10px] font-bold uppercase tracking-widest text-primary">{{ $j['sub'] }}</span>
                            <h3 class="mt-1 text-lg font-bold uppercase">{!! $j['k'] !!}</h3>
                            <p class="mt-1 text-sm/relaxed opacity-70">{{ $j['desc'] }}</p>

                            <div class="t-pop">
                                <p class="text-[10px] font-bold uppercase tracking-widest text-primary">{{ $j['sub'] }}</p>
                                <h4 class="mt-1 text-base font-bold">{!! $j['k'] !!}</h4>
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

    {{-- ====================== KASH MODEL (tabs) ====================== --}}
    <section class="relative py-12 md:py-16 bg-accent/[0.04]">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            {{-- Section header: intro copy on the left, credibility stat on the right --}}
            <div class="grid lg:grid-cols-[minmax(0,1.55fr)_minmax(0,1fr)] gap-6 lg:gap-12 items-end t-reveal"
                x-data x-intersect.once="$el.classList.add('in')">
                <div class="max-w-2xl">
                    <p class="text-xs font-bold uppercase tracking-widest text-primary">Our methodology</p>
                    <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                        The <span class="outline-text">KASH</span> model
                    </h2>
                    <p class="mt-3 text-base/loose opacity-70">
                        We work the KASH model &mdash; <strong>Knowledge, Attitude, Skills</strong> and <strong>Habits</strong> &mdash;
                        so people don&rsquo;t just gain knowledge, they change how they lead and work.
                    </p>
                    <p class="mt-4 text-sm italic opacity-60 max-w-md">
                        Rooted in decades of adult-learning research &mdash; because knowing something rarely changes what you do.
                    </p>
                </div>
                <div class="lg:justify-self-end">
                    <div class="inline-flex items-center gap-4 rounded-2xl border border-stroke bg-card px-5 py-4 shadow-[0_18px_40px_-24px_rgba(15,27,61,0.18)]">
                        <span class="text-4xl md:text-5xl font-bold text-primary tabular-nums leading-none">100%</span>
                        <span class="text-sm/tight text-content/70 max-w-[190px]">
                            of clients said our solutions addressed their pain points.
                        </span>
                    </div>
                </div>
            </div>

            {{-- Contrast: what most training does vs. what KASH does --}}
            <div class="mt-10 grid md:grid-cols-2 gap-4 md:gap-5 t-reveal t-d1"
                x-data x-intersect.once="$el.classList.add('in')">
                <div class="relative rounded-2xl border border-stroke bg-card/60 p-5 md:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-content/45 mb-2">Training that fades</p>
                    <p class="text-lg md:text-xl font-semibold text-content/70 [text-wrap:balance]">
                        Sit through it. Certificate. Forget.
                    </p>
                    <p class="mt-3 text-sm/relaxed text-content/60">
                        Most leadership programs stop at &ldquo;know&rdquo; &mdash; a room, a slide deck, a certificate.
                        Thirty days later, the behaviours haven&rsquo;t moved.
                    </p>
                </div>
                <div class="relative rounded-2xl border border-primary/40 bg-primary/[0.05] p-5 md:p-6">
                    <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-primary mb-2">The WhyLead way</p>
                    <p class="text-lg md:text-xl font-semibold text-content [text-wrap:balance]">
                        Learn it. Own it. Practice it. Live it.
                    </p>
                    <p class="mt-3 text-sm/relaxed text-content/75">
                        We move people through <strong>Knowledge, Attitude, Skills</strong> and <strong>Habits</strong> &mdash; in that order &mdash;
                        so change shows up on Monday morning and stays.
                    </p>
                </div>
            </div>

            <div class="mt-10 grid lg:grid-cols-[minmax(260px,0.34fr)_minmax(0,0.66fr)] gap-6 lg:gap-10 items-start"
                x-data="{
                    active: 0,
                    touched: false,
                    count: {{ count($kash) }},
                    timer: null,
                    init() {
                        this.$nextTick(() => { const n = this.$refs.nav; if (n) n.style.setProperty('--rail', (n.offsetHeight - 58) + 'px'); });
                        this.timer = setInterval(() => { if (!this.touched) this.active = (this.active + 1) % this.count; }, 5000);
                    },
                    pick(i) { this.active = i; this.touched = true; },
                }">
                <div class="t-nav" x-ref="nav" x-bind:class="touched && 'is-touched'" x-on:mouseenter="touched = true">
                    @foreach ($kash as $i => $s)
                        <button type="button" class="t-nav-item" x-bind:class="active === {{ $i }} && 'is-active'"
                            x-on:click="pick({{ $i }})" x-on:mouseenter="pick({{ $i }})">
                            <span class="t-nav-ico">{{ $s['letter'] }}</span>
                            <span class="min-w-0">
                                <span class="t-nav-kicker block">{{ $s['tag'] }}</span>
                                <span class="t-nav-title block">{{ $s['name'] }}</span>
                            </span>
                        </button>
                    @endforeach
                </div>

                <div class="t-stage">
                    @foreach ($kash as $i => $s)
                        <div class="p-6 md:p-9 relative" x-show="active === {{ $i }}" x-cloak
                            x-transition:enter="transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-y-4"
                            x-transition:enter-end="opacity-100 translate-y-0">
                            <div class="flex items-center justify-between border-b border-stroke pb-4 mb-6">
                                <span class="text-[11px] font-bold uppercase tracking-widest text-primary">{{ $s['tag'] }}</span>
                                <span class="text-[11px] font-semibold tabular-nums opacity-40">0{{ $i + 1 }} &middot; 0{{ count($kash) }}</span>
                            </div>

                            <div class="grid sm:grid-cols-[auto_minmax(0,1fr)] gap-6 items-start">
                                <div class="t-kash-letter">{{ $s['letter'] }}</div>
                                <div>
                                    <h3 class="text-2xl lg:text-3xl font-bold">{{ $s['name'] }}</h3>
                                    <p class="mt-2 text-lg opacity-90">{!! $s['lead'] !!}</p>
                                    <p class="mt-3 text-base/loose opacity-70 max-w-xl">{!! $s['desc'] !!}</p>
                                </div>
                            </div>
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
                        </div>
                    @endforeach
                </div>
            </div>

        </div>
    </section>

    {{-- ============ FLAGSHIP PROGRAMS ============ --}}
    <section id="programs" class="relative py-12 md:py-16 bg-accent/[0.04]">
        <div class="max-w-7xl mx-auto px-4 md:px-8">
            <div class="max-w-2xl t-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <p class="text-xs font-bold uppercase tracking-widest text-primary">Programs we built ourselves</p>
                <h2 class="mt-3 text-3xl lg:text-4xl font-bold uppercase leading-tight">
                    Beyond bespoke &mdash; <span class="outline-text">flagship</span> programs
                </h2>
                <p class="mt-3 text-base/loose opacity-70">
                    Alongside our bespoke work, we run flagship programs for the people leading from the middle
                    &mdash; the layer where strategy quietly succeeds or fails.
                </p>
            </div>

            {{-- Thrive in the Middle — light-canvas hero card with orange accents --}}
            <div class="mt-10 t-reveal" x-data x-intersect.once="$el.classList.add('in')">
                <div class="relative overflow-hidden rounded-3xl bg-card text-content border border-stroke shadow-[0_24px_60px_-24px_rgba(15,27,61,0.18)] p-6 md:p-10">
                    {{-- Ambient accents — soft orange glow + a small navy corner mark --}}
                    <div aria-hidden="true"
                        class="absolute -top-32 -right-32 size-[460px] rounded-full t-blob t-float pointer-events-none"
                        style="background: radial-gradient(closest-side, rgba(242,107,33,.22), rgba(242,107,33,0));"></div>
                    <div aria-hidden="true"
                        class="absolute -bottom-20 -left-20 size-[220px] rounded-full t-blob t-float pointer-events-none"
                        style="background: radial-gradient(closest-side, rgba(25,18,75,.14), rgba(25,18,75,0)); animation-delay: -3s;"></div>

                    <div class="relative">
                        {{-- Header row: kicker on the left, program stats on the right --}}
                        <div class="flex flex-wrap items-start justify-between gap-4">
                            <span class="inline-flex items-center gap-2 text-[10px] font-bold uppercase tracking-[0.22em] text-primary">
                                <span class="inline-block h-1.5 w-1.5 rounded-full bg-primary t-pulse"></span>
                                Flagship &middot; 7-week cohort
                            </span>
                            <div class="flex items-stretch gap-3">
                                @foreach ($titmStats as $s)
                                    <div class="flex items-baseline gap-1.5 rounded-full border border-stroke bg-content/[0.03] px-3 py-1.5">
                                        <span class="text-base font-bold text-content tabular-nums">{{ $s['num'] }}</span>
                                        <span class="text-[10px] font-semibold uppercase tracking-widest text-content/60">{{ $s['label'] }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        {{-- Title + description on the left, cohort photo on the right — top-aligned so the h3 always sits at the photo's top edge --}}
                        <div class="mt-6 grid lg:grid-cols-[minmax(0,1.35fr)_minmax(0,1fr)] gap-8 lg:gap-10 items-start">
                            <div>
                                <h3 class="text-3xl md:text-4xl lg:text-5xl font-bold uppercase leading-[1.05] text-content">
                                    Thrive in the Middle
                                </h3>
                                <p class="mt-5 text-lg md:text-xl leading-relaxed text-content/75">
                                    A cohort-based program that strengthens an organisation&rsquo;s spinal cord &mdash; its
                                    <strong>middle managers</strong> &mdash; to lead as growth, alignment, culture and change catalysts.
                                    Participants move through a sequenced pathway that blends assessment, workshops,
                                    immersive challenges and coaching.
                                </p>
                            </div>
                            <div class="relative">
                                <div class="relative aspect-[4/3] rounded-2xl overflow-hidden ring-1 ring-white/10 shadow-2xl">
                                    <img src="{{ asset('img/uploads/home-thrive-in-the-middle.jpg') }}"
                                        alt="A Thrive in the Middle cohort" loading="lazy"
                                        class="absolute inset-0 w-full h-full object-cover" />
                                    <div class="absolute inset-0 bg-gradient-to-t from-accent/40 via-transparent to-transparent pointer-events-none"></div>
                                    <span class="absolute left-4 top-4 inline-flex items-center gap-1.5 text-[10px] font-bold uppercase tracking-widest text-white bg-black/30 backdrop-blur rounded-full px-2.5 py-1">
                                        <span class="inline-block h-1.5 w-1.5 rounded-full bg-primary"></span>
                                        Live cohort
                                    </span>
                                </div>
                            </div>
                        </div>

                        {{-- ============ THE MODULES (interactive spotlight) ============ --}}
                        <div class="mt-14"
                            x-data="{
                                active: 0,
                                touched: false,
                                count: {{ count($titmModules) }},
                                timer: null,
                                init() {
                                    this.timer = setInterval(() => { if (!this.touched) this.active = (this.active + 1) % this.count; }, 5000);
                                },
                                pick(i) { this.active = i; this.touched = true; },
                            }">
                            <div class="flex flex-wrap items-baseline justify-between gap-x-4 gap-y-1 mb-6">
                                <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-primary">The modules</p>
                                <p class="text-xs text-content/60">Six competencies the cohort works through together</p>
                            </div>

                            <div class="grid lg:grid-cols-[minmax(0,0.9fr)_minmax(0,1.1fr)] gap-5 lg:gap-6 items-start">
                                {{-- Left: numbered navigator --}}
                                <div class="space-y-2" x-on:mouseleave="touched = true">
                                    @foreach ($titmModules as $i => $m)
                                        <button type="button" class="t-mod-nav-item"
                                            x-bind:class="active === {{ $i }} && 'is-active'"
                                            x-on:click="pick({{ $i }})" x-on:mouseenter="pick({{ $i }})">
                                            <span class="t-mod-nav-num">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            <span class="min-w-0">
                                                <span class="block text-[9px] font-bold uppercase tracking-widest opacity-60">{{ $m['tag'] }}</span>
                                                <span class="block text-sm/tight font-bold">{{ $m['name'] }}</span>
                                            </span>
                                            <svg class="t-mod-nav-arrow size-4" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                            </svg>
                                        </button>
                                    @endforeach
                                </div>

                                {{-- Right: spotlight --}}
                                <div class="t-mod-stage p-6 md:p-8 min-h-[340px]">
                                    @foreach ($titmModules as $i => $m)
                                        <div class="relative" x-show="active === {{ $i }}" x-cloak
                                            x-transition:enter="transition ease-out duration-400"
                                            x-transition:enter-start="opacity-0 translate-y-3"
                                            x-transition:enter-end="opacity-100 translate-y-0">
                                            <div class="flex items-start justify-between gap-4">
                                                <div class="flex items-center gap-3">
                                                    <span class="size-11 rounded-xl bg-primary/10 border border-primary/30 text-primary flex items-center justify-center flex-none">
                                                        <svg class="size-5" fill="none" stroke="currentColor" stroke-width="1.7" viewBox="0 0 24 24">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="{{ $m['icon'] }}" />
                                                        </svg>
                                                    </span>
                                                    <div>
                                                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-primary">{{ $m['tag'] }}</p>
                                                        <h5 class="mt-0.5 text-xl md:text-2xl font-bold uppercase leading-tight text-content">{{ $m['name'] }}</h5>
                                                    </div>
                                                </div>
                                                <span class="t-mod-bignum leading-none opacity-90">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                            </div>

                                            <p class="mt-5 text-base/relaxed text-content font-semibold [text-wrap:balance]">{{ $m['lead'] }}</p>

                                            <div class="mt-4 rounded-xl border border-stroke bg-content/[0.03] p-4">
                                                <p class="text-[10px] font-bold uppercase tracking-widest text-primary mb-1.5">The question every participant tackles</p>
                                                <p class="text-sm/relaxed text-content/75 italic">&ldquo;{{ $m['question'] }}&rdquo;</p>
                                            </div>

                                            <div class="mt-5">
                                                <p class="text-[10px] font-bold uppercase tracking-widest text-primary mb-3">What they walk away with</p>
                                                <ul class="grid sm:grid-cols-3 gap-2">
                                                    @foreach ($m['outcomes'] as $o)
                                                        <li class="flex items-start gap-2 rounded-lg border border-stroke bg-content/[0.03] p-2.5">
                                                            <svg class="size-3.5 mt-0.5 text-primary flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.6" viewBox="0 0 24 24">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                                            </svg>
                                                            <span class="text-xs/relaxed font-medium text-content/80">{{ $o }}</span>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <div class="mt-10 flex flex-wrap items-center gap-3">
                            <a href="{{ url('/thrive-in-the-middle') }}" class="btn">Explore Thrive in the Middle</a>
                            <a href="{{ $contactUrl }}" class="btn btn-outline text-content">Bring it to your organisation</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- ACEND + Thrive on Feedback --}}
            <div class="mt-6 grid lg:grid-cols-[minmax(0,1.6fr)_minmax(0,1fr)] gap-6">
                {{-- ACEND card --}}
                <div class="t-reveal t-d1 relative overflow-hidden rounded-3xl bg-card border border-stroke p-6 md:p-8"
                    x-data x-intersect.once="$el.classList.add('in')">
                    <div class="flex flex-wrap items-center justify-between gap-3">
                        <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-primary">360° Leadership Intelligence</p>
                        <a href="https://acend.whyleadothers.com" target="_blank" rel="noopener"
                            class="text-[11px] font-semibold uppercase tracking-widest border border-stroke rounded-full px-3 py-1 opacity-70 hover:opacity-100 hover:border-primary/40 transition">
                            acend.whyleadothers.com
                        </a>
                    </div>
                    <h3 class="mt-3 text-2xl md:text-3xl font-bold uppercase">
                        ACEND<span class="text-primary">®</span>
                    </h3>
                    <p class="mt-3 text-base/relaxed opacity-70 max-w-2xl">
                        The intelligence layer behind Thrive in the Middle. It measures where your middle managers
                        truly are, surfaces the risks holding performance back and turns growth into trackable
                        outcomes &mdash; across individuals, cohorts and the organisation.
                    </p>

                    <div class="mt-6 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-3">
                        @foreach ($acend as $i => $d)
                            <div class="t-dim">
                                <div class="t-dim-tile" style="background: {{ $d['bg'] }}; color: {{ $d['fg'] }};">
                                    {{ $d['letter'] }}
                                </div>
                                <div>
                                    <p class="text-[10px] font-bold uppercase tracking-widest opacity-45">{{ $d['name'] }}</p>
                                    <p class="mt-1.5 text-sm/relaxed opacity-80">{{ $d['desc'] }}</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Thrive on Feedback card --}}
                <div class="t-reveal t-d2 relative overflow-hidden rounded-3xl border border-stroke bg-card flex flex-col"
                    x-data x-intersect.once="$el.classList.add('in')">
                    <div class="relative aspect-[16/8] overflow-hidden">
                        <img src="{{ asset('img/uploads/programmes-feedback.jpg') }}" alt="Thrive on Feedback training"
                            loading="lazy"
                            class="absolute inset-0 w-full h-full object-cover object-center" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/30 to-transparent pointer-events-none"></div>
                        <div class="absolute inset-x-0 bottom-0 p-5 md:p-6 flex flex-wrap items-center justify-between gap-2">
                            <p class="text-[10px] font-bold uppercase tracking-[0.22em] text-white">
                                <span class="inline-block h-1.5 w-1.5 rounded-full bg-primary align-middle mr-1.5"></span>
                                2-day intensive
                            </p>
                            <span class="text-[10px] font-semibold uppercase tracking-widest border border-white/30 text-white/90 rounded-full px-3 py-1 backdrop-blur bg-black/20">
                                Managers &amp; team leads
                            </span>
                        </div>
                    </div>
                    <div class="p-6 md:p-8 flex flex-col flex-1">
                        <h3 class="text-2xl md:text-3xl font-bold uppercase leading-tight">
                            Thrive on <span class="text-primary">Feedback</span>
                        </h3>
                        <p class="mt-3 text-base/relaxed opacity-70 flex-1">
                            <strong>Master forward-looking feedback.</strong> The most successful teams share one thing
                            &mdash; managers who give clear, future-focused feedback, often and well. This program unlocks
                            the habits, mindset and tools to lead with confidence.
                        </p>

                        <ul class="mt-5 space-y-2.5">
                            @foreach ([
                                'Future-focused feedback habits',
                                'Difficult conversations, without the sting',
                                'Coaching in the flow of work',
                            ] as $p)
                                <li class="flex items-start gap-2 text-sm">
                                    <svg class="size-4 mt-0.5 text-primary flex-shrink-0" fill="none" stroke="currentColor" stroke-width="2.4" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                    <span>{{ $p }}</span>
                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ url('/contacts?interest=Thrive on Feedback') }}" class="btn mt-6 w-full sm:w-auto self-start">Enrol your managers</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== IMPACT + BIG STATEMENT ====================== --}}
    <section class="relative py-10 md:py-14 overflow-hidden isolate">
        <div aria-hidden="true" class="absolute inset-0 -z-10 pointer-events-none">
            <div class="absolute -top-24 -left-24 size-[520px] rounded-full t-blob t-float"
                style="background: radial-gradient(closest-side, rgba(242,107,33,.35), rgba(242,107,33,0));"></div>
            <div class="absolute -bottom-32 -right-24 size-[560px] rounded-full t-blob t-float"
                style="background: radial-gradient(closest-side, rgba(25,18,75,.32), rgba(25,18,75,0)); animation-delay: -3.5s;"></div>
            <div class="absolute inset-0 opacity-[0.07]"
                style="background-image: radial-gradient(rgb(var(--content-color)) 1px, transparent 1px); background-size: 22px 22px;
                       -webkit-mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);
                       mask-image: radial-gradient(ellipse at center, black 40%, transparent 80%);"></div>
        </div>

        <div class="max-w-7xl mx-auto px-4 md:px-8 relative">
            <div class="t-reveal mx-auto text-center" x-data x-intersect.once="$el.classList.add('in')">
                {{-- Two-tone headline (style guide): light + bold segments, one primary phrase max --}}
                <h2 class="text-[clamp(1rem,2.7vw,2.25rem)] md:whitespace-nowrap font-bold uppercase leading-[1.15] tracking-wide">
                    <span class="block"><span class="outline-text">People leave</span> changed. <span class="outline-text">Teams leave</span> sharper.</span>
                    <span class="block"><span class="outline-text">Organisations leave</span> <span class="text-primary">measurably better</span>.</span>
                </h2>

                <div class="mt-8 flex justify-center items-center gap-2.5" aria-hidden="true">
                    <span class="h-[3px] w-3 rounded-full bg-primary/30"></span>
                    <span class="h-[3px] w-8 rounded-full bg-primary/50"></span>
                    <span class="h-[3px] w-16 rounded-full bg-primary/70"></span>
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
                        this.$el.querySelectorAll('.t-reveal').forEach(el => el.classList.add('in'));
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
                    <div class="t-reveal t-d{{ $i + 1 }} flex flex-col items-center text-center gap-3">
                        <div class="relative">
                            <div aria-hidden="true"
                                class="absolute inset-0 rounded-full t-blob"
                                style="background: radial-gradient(closest-side, {{ $m['glow'] }}, transparent 70%); transform: scale(1.6);"></div>

                            <svg class="relative -rotate-90 size-36 lg:size-40" viewBox="0 0 120 120" stroke-width="12">
                                <defs>
                                    <linearGradient id="trainProgressGradient" x1="100%" y1="100%" x2="50%" y2="0%">
                                        <stop offset="0%" style="stop-color: #F26B21; stop-opacity: 1" />
                                        <stop offset="100%" style="stop-color: #19124B; stop-opacity: 1" />
                                    </linearGradient>
                                    <pattern id="trainPattern{{ $i }}" viewBox="0 0 33.554 32.053" width="12%" height="12%">
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
                                    stroke="url(#trainPattern{{ $i }})" stroke-linecap="round" stroke-linejoin="round"
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

    @include('home.faqs')

    @include('home.cta', ['interest' => 'Training'])
@endsection

@section('scripts')
    <!-- Alpine Plugins -->
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
