{{--
    The Team Tower — WhyLead's interactive leadership audit.
    Alpine.js + Tailwind. GSAP + canvas-confetti loaded from home/index.blade.php.
--}}

<style>
    .tt-section {
        /* Brand fixed */
        --tt-lavender: #C3BBFF;
        --tt-white: #FFFFFF;
        --tt-indigo: #19124B;
        --tt-orange: #F26B21;

        /* Theme (light-mode default: cream section, indigo text) */
        --tt-bg: #FEF1EA;
        --tt-text: #19124B;
        --tt-text-soft: rgba(25, 18, 75, 0.78);
        --tt-text-mid:  rgba(25, 18, 75, 0.60);
        --tt-text-faint:rgba(25, 18, 75, 0.45);
        --tt-border:    rgba(25, 18, 75, 0.14);
        --tt-shelf-line:rgba(25, 18, 75, 0.22);

        /* Block "B" — swaps between white (dark theme) and indigo (light theme) so
           it always contrasts against the section background */
        --tt-block-b-bg:   var(--tt-indigo);
        --tt-block-b-text: #FFFFFF;

        background-color: var(--tt-bg);
        color: var(--tt-text);

        /* Widget framing — subtle border + soft shadow so the section reads as a card */
        border: 1px solid rgba(25, 18, 75, 0.10);
        box-shadow:
            0 26px 60px -24px rgba(25, 18, 75, 0.22),
            0 8px 20px  -10px rgba(25, 18, 75, 0.10);
    }
    /* Accent corner brackets (top-right + bottom-left) — subtle orange edges */
    .tt-section::before,
    .tt-section::after {
        content: '';
        position: absolute;
        width: 44px;
        height: 44px;
        border-color: var(--tt-orange);
        pointer-events: none;
        z-index: 3;
        opacity: 0.85;
    }
    .tt-section::before {
        top: 14px; right: 14px;
        border-top: 2px solid var(--tt-orange);
        border-right: 2px solid var(--tt-orange);
        border-top-right-radius: 8px;
    }
    .tt-section::after {
        bottom: 14px; left: 14px;
        border-bottom: 2px solid var(--tt-orange);
        border-left: 2px solid var(--tt-orange);
        border-bottom-left-radius: 8px;
    }
    body.dark .tt-section {
        --tt-bg: rgb(36, 27, 99);
        --tt-text: #FFFFFF;
        --tt-text-soft: rgba(255, 255, 255, 0.85);
        --tt-text-mid:  rgba(255, 255, 255, 0.60);
        --tt-text-faint:rgba(255, 255, 255, 0.42);
        --tt-border:    rgba(255, 255, 255, 0.16);
        --tt-shelf-line:rgba(195, 187, 255, 0.35);

        --tt-block-b-bg:   #FFFFFF;
        --tt-block-b-text: var(--tt-indigo);

        border-color: rgba(255, 255, 255, 0.08);
        box-shadow:
            0 30px 70px -28px rgba(0, 0, 0, 0.55),
            0 10px 24px -12px rgba(0, 0, 0, 0.35);
    }

    /* Theme-aware text helpers used throughout the section */
    .tt-text        { color: var(--tt-text); }
    .tt-text-soft   { color: var(--tt-text-soft); }
    .tt-text-mid    { color: var(--tt-text-mid); }
    .tt-text-faint  { color: var(--tt-text-faint); }
    .tt-border-b    { border-bottom: 1px solid var(--tt-border); }

    .tt-tower {
        transform-origin: 50% 100%;
        will-change: transform;
    }

    .tt-block {
        position: relative;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 8px;
        padding: 10px 10px;
        font-size: 12.5px;
        line-height: 1.25;
        text-align: center;
        color: var(--tt-indigo);
        font-weight: 600;
        letter-spacing: 0.005em;
        min-height: 62px;
        cursor: pointer;
        transition:
            transform 260ms cubic-bezier(0.34, 1.4, 0.5, 1),
            opacity 260ms ease,
            box-shadow 200ms ease,
            background-color 200ms ease;
        box-shadow: 0 1px 0 rgba(0, 0, 0, 0.08), inset 0 -3px 0 rgba(0, 0, 0, 0.09);
        will-change: transform, opacity;
    }

    .tt-block-lavender { background-color: var(--tt-lavender);   color: var(--tt-indigo); }
    .tt-block-white    { background-color: var(--tt-block-b-bg); color: var(--tt-block-b-text); }
    .tt-block-orange   { background-color: var(--tt-orange);     color: #FFFFFF; }

    .tt-block-orange:focus-visible,
    .tt-block-white:focus-visible { outline-color: var(--tt-orange); }

    .tt-block:not([data-locked="true"]):not([data-picked="true"]):hover {
        transform: translateY(-2px) scale(1.02);
        box-shadow: 0 8px 18px rgba(0, 0, 0, 0.18), inset 0 -3px 0 rgba(0, 0, 0, 0.09);
    }

    .tt-block:focus-visible {
        outline: 2px solid var(--tt-orange);
        outline-offset: 3px;
    }

    .tt-block[data-picked="true"] {
        opacity: 0.14;
        transform: scale(0.94);
        pointer-events: none;
    }

    .tt-block[data-locked="true"]:not([data-picked="true"]) {
        cursor: default;
    }

    .tt-block[data-locked="true"]:not([data-picked="true"]):hover {
        transform: none;
    }

    @media (min-width: 1024px) {
        .tt-block { min-height: 68px; font-size: 13px; padding: 12px 12px; }
    }

    .tt-row-shift-1 { transform: translateX(-3px) rotate(-0.35deg); }
    .tt-row-shift-2 { transform: translateX(2px) rotate(0.25deg); }
    .tt-row-shift-3 { transform: translateX(-2px) rotate(-0.2deg); }
    .tt-row-shift-4 { transform: translateX(3px) rotate(0.3deg); }
    .tt-row-shift-5 { transform: translateX(0) rotate(0deg); }

    /* Tower shelf + shadow (grounds the tower visually) */
    .tt-tower-wrap { position: relative; padding-bottom: 22px; }
    .tt-tower-wrap::before {
        content: '';
        position: absolute;
        left: 6%; right: 6%;
        bottom: 8px;
        height: 14px;
        background: radial-gradient(ellipse at 50% 0%, rgba(0,0,0,0.35), transparent 65%);
        border-radius: 50%;
        pointer-events: none;
        opacity: 0.9;
        z-index: 0;
    }
    .tt-tower-wrap::after {
        content: '';
        position: absolute;
        left: -2%; right: -2%;
        bottom: 4px;
        height: 2px;
        background: linear-gradient(to right, transparent 0%, rgba(195,187,255,0.18) 15%, rgba(195,187,255,0.45) 50%, rgba(195,187,255,0.18) 85%, transparent 100%);
        border-radius: 2px;
        pointer-events: none;
    }

    .tt-tray-chip {
        background-color: rgba(242, 107, 33, 0.14);
        border: 1px solid rgba(242, 107, 33, 0.55);
        color: var(--tt-text);
        border-radius: 999px;
        padding: 7px 12px;
        font-size: 12px;
        line-height: 1.2;
        font-weight: 500;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background-color 160ms ease, transform 160ms ease;
        max-width: 100%;
    }
    .tt-tray-chip:hover { background-color: rgba(242, 107, 33, 0.26); transform: translateY(-1px); }
    .tt-tray-chip:focus-visible { outline: 2px solid var(--tt-orange); outline-offset: 2px; }
    .tt-tray-chip[disabled] { opacity: 0.75; cursor: default; }
    .tt-tray-chip .tt-x { opacity: 0.7; font-weight: 700; color: var(--tt-orange); }

    .tt-counter-warn { color: var(--tt-orange); }

    @keyframes tt-breathe {
        0%,100% { transform: rotate(-0.25deg); }
        50%     { transform: rotate(0.25deg); }
    }
    .tt-tower[data-css-sway="true"] { animation: tt-breathe 5s ease-in-out infinite; }

    @keyframes tt-creak {
        0%   { transform: rotate(-0.4deg); }
        25%  { transform: rotate(0.55deg); }
        50%  { transform: rotate(-0.35deg); }
        75%  { transform: rotate(0.25deg); }
        100% { transform: rotate(0deg); }
    }
    .tt-tower.tt-creaking { animation: tt-creak 620ms ease-out; }

    @keyframes tt-shake {
        0%,100% { transform: translate(0, 0); }
        20%     { transform: translate(-6px, 3px); }
        40%     { transform: translate(6px, -3px); }
        60%     { transform: translate(-4px, 2px); }
        80%     { transform: translate(4px, -2px); }
    }
    .tt-shake { animation: tt-shake 500ms ease-out; }

    .tt-reveal {
        opacity: 0;
        transform: translateY(14px);
        transition: opacity 400ms ease, transform 600ms cubic-bezier(0.22, 1, 0.36, 1);
    }
    .tt-reveal.is-in { opacity: 1; transform: translateY(0); }
    .tt-reveal-name  { transition-delay: 200ms; }
    .tt-reveal-desc  { transition-delay: 500ms; }
    .tt-reveal-cite  { transition-delay: 800ms; }
    .tt-reveal-cta   { transition-delay: 1100ms; }

    /* Avatar composition */
    .tt-avatar-wrap {
        position: relative;
        width: 100%;
        max-width: 320px;
        aspect-ratio: 1;
        margin: 0 auto;
        opacity: 0;
        transform: scale(0.85) translateY(10px);
        transition:
            opacity 620ms ease,
            transform 780ms cubic-bezier(0.34, 1.4, 0.5, 1);
    }
    .tt-avatar-wrap.is-in { opacity: 1; transform: scale(1) translateY(0); }
    .tt-avatar-wrap::before {
        content: '';
        position: absolute;
        inset: -6% -6% 4% -6%;
        border-radius: 50%;
        background: radial-gradient(circle at 50% 40%, rgba(195,187,255,0.18), rgba(195,187,255,0) 68%);
        pointer-events: none;
        z-index: 0;
    }
    .tt-avatar-wrap svg {
        position: relative;
        width: 100%;
        height: 100%;
        z-index: 1;
        overflow: visible;
        animation: tt-avatar-float 4.5s ease-in-out infinite;
    }
    @keyframes tt-avatar-float {
        0%,100% { transform: translateY(0); }
        50%     { transform: translateY(-6px); }
    }

    /* Reveal card two-column grid */
    .tt-reveal-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        align-items: center;
        text-align: center;
    }
    @media (min-width: 1024px) {
        .tt-reveal-grid {
            grid-template-columns: minmax(260px, 340px) 1fr;
            gap: 52px;
            text-align: left;
        }
        .tt-reveal-grid .tt-reveal-cta-row { justify-content: flex-start; }
    }

    .tt-recommend-pill {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        padding: 7px 14px;
        border-radius: 999px;
        background-color: rgba(242, 107, 33, 0.10);
        border: 1px solid rgba(242, 107, 33, 0.45);
        color: var(--tt-text);
        font-size: 11.5px;
        font-weight: 600;
        letter-spacing: 0.06em;
        text-transform: uppercase;
    }
    .tt-recommend-pill::before {
        content: '';
        display: inline-block;
        width: 7px; height: 7px;
        border-radius: 999px;
        background-color: var(--tt-orange);
    }

    @keyframes tt-cta-pulse {
        0%   { box-shadow: 0 0 0 0 rgba(242, 107, 33, 0.55); }
        70%  { box-shadow: 0 0 0 18px rgba(242, 107, 33, 0); }
        100% { box-shadow: 0 0 0 0 rgba(242, 107, 33, 0); }
    }
    .tt-cta {
        animation: tt-cta-pulse 1.8s ease-out 1.3s 2;
    }

    .tt-confetti-canvas {
        position: absolute;
        inset: 0;
        width: 100%;
        height: 100%;
        pointer-events: none;
        z-index: 40;
    }

    @media (prefers-reduced-motion: reduce) {
        .tt-tower[data-css-sway="true"],
        .tt-tower.tt-creaking,
        .tt-shake,
        .tt-cta,
        .tt-avatar-wrap svg {
            animation: none !important;
        }
        .tt-block,
        .tt-reveal,
        .tt-avatar-wrap {
            transition-duration: 150ms !important;
        }
        .tt-reveal-name, .tt-reveal-desc, .tt-reveal-cite, .tt-reveal-cta {
            transition-delay: 0ms !important;
        }
    }
</style>

<div class="lg:mt-14 max-w-7xl mx-auto lg:px-8">
    <section
        class="tt-section lg:rounded-3xl relative overflow-hidden"
        x-data="teamTower()"
        x-init="init()"
        x-ref="section"
        aria-labelledby="teamTowerHeading"
    >
        <canvas x-ref="confetti" class="tt-confetti-canvas" aria-hidden="true"></canvas>

        <div
            class="relative lg:grid lg:grid-cols-5 lg:min-h-[560px]"
            x-show="!revealed"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
        >
            <div class="lg:col-span-2 px-6 pt-10 pb-8 lg:pt-16 lg:pb-16 lg:pl-14 lg:pr-8 flex flex-col">
                <p class="text-[11px] font-semibold tracking-[0.18em] uppercase tt-text-mid">
                    <span class="uppercase">
                        <span class="outline-text">The </span>Team Tower
                    </span>
                </p>
                <h2
                    id="teamTowerHeading"
                    class="mt-4 text-4xl lg:text-5xl font-bold leading-[1.05] tt-text"
                >
                    <span class="uppercase">
                        <span class="outline-text">A </span>60-Second<br class="hidden lg:inline"> Leadership Audit
                    </span>
                </h2>
                <p class="mt-6 text-lg lg:text-xl tt-text-soft leading-[1.55] max-w-md">
                    Click every block that's true for your team. Six clicks and the tower falls
                    &mdash; and we'll show you what kind of team you actually have.
                </p>

                <div class="mt-8 lg:mt-10 flex items-baseline gap-4">
                    <div
                        class="text-6xl lg:text-8xl font-bold tabular-nums leading-none transition-colors"
                        :class="picks.length >= 4 ? 'tt-counter-warn' : 'tt-text'"
                        aria-hidden="true"
                    >
                        <span x-text="picks.length"></span><span class="tt-text-faint text-4xl lg:text-5xl align-baseline"> / 6</span>
                    </div>
                    <div class="text-xs uppercase tracking-[0.18em] font-semibold tt-text-mid">Selected</div>
                </div>

                <div class="sr-only" aria-live="polite" x-text="liveStatus"></div>

                <p class="mt-auto pt-10 lg:pt-14 text-[11px] leading-relaxed tt-text-faint max-w-md">
                    Built on organisational development research.
                </p>
            </div>

            <div class="lg:col-span-3 px-6 pb-8 lg:py-14 lg:pr-14 lg:pl-4">
                <div class="mx-auto max-w-[520px] lg:max-w-none">
                    <div class="tt-tower-wrap">
                        <div
                            class="tt-tower grid grid-cols-3 gap-2 lg:gap-2.5 relative z-[1]"
                            x-ref="tower"
                            data-css-sway="true"
                        >
                            <template x-for="(t, idx) in truths" :key="t.id">
                                <button
                                    type="button"
                                    class="tt-block"
                                    :class="[
                                        colorClassFor(idx),
                                        'tt-row-shift-' + ((Math.floor(idx / 3)) + 1)
                                    ]"
                                    :data-picked="isPicked(t.id) ? 'true' : 'false'"
                                    :data-locked="locked ? 'true' : 'false'"
                                    :aria-pressed="isPicked(t.id) ? 'true' : 'false'"
                                    :aria-label="'Truth: ' + t.text + (isPicked(t.id) ? ' (selected)' : '')"
                                    :disabled="locked && !isPicked(t.id)"
                                    x-on:click="toggle(t.id)"
                                    x-text="t.text"
                                ></button>
                            </template>
                        </div>
                    </div>

                    <div class="mt-5 lg:mt-6" x-show="picks.length > 0" x-transition.opacity>
                        <div class="text-[11px] uppercase tracking-[0.16em] font-semibold tt-text-mid mb-2">
                            True for us
                        </div>
                        <div class="flex flex-wrap gap-2">
                            <template x-for="pid in picks" :key="'chip-' + pid">
                                <button
                                    type="button"
                                    class="tt-tray-chip"
                                    :disabled="locked"
                                    x-on:click="!locked && toggle(pid)"
                                    :aria-label="'Return to tower: ' + truthById(pid).text"
                                >
                                    <span x-text="truthById(pid).text"></span>
                                    <span class="tt-x" aria-hidden="true" x-show="!locked">×</span>
                                </button>
                            </template>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div
            class="relative px-6 py-10 lg:px-14 lg:py-16 lg:min-h-[560px] flex items-center"
            x-show="revealed"
            x-cloak
        >
            <div class="w-full max-w-5xl mx-auto">
                <template x-if="activeArchetype">
                    <div class="tt-reveal-grid">
                        {{-- Avatar column --}}
                        <div class="tt-avatar-wrap"
                             :class="revealStage >= 1 && 'is-in'"
                             x-html="activeArchetype.avatar"
                             aria-hidden="true"
                        ></div>

                        {{-- Text column --}}
                        <div>
                            <p class="tt-reveal text-[11px] font-semibold tracking-[0.18em] uppercase tt-text-mid"
                               :class="revealStage >= 1 && 'is-in'">
                                Your team is
                            </p>

                            <h3 class="tt-reveal tt-reveal-name mt-2 text-3xl lg:text-[42px] font-bold leading-[1.05] tt-text"
                                :class="revealStage >= 1 && 'is-in'"
                                x-text="activeArchetype.name"
                            ></h3>

                            <p class="tt-reveal tt-reveal-desc mt-4 text-base lg:text-[17px] tt-text-soft leading-relaxed"
                               :class="revealStage >= 1 && 'is-in'"
                               x-text="activeArchetype.description"
                            ></p>

                            <div class="tt-reveal tt-reveal-cite mt-6 pt-5 tt-border-b border-t border-t-[var(--tt-border)]"
                                 :class="revealStage >= 1 && 'is-in'"
                                 style="border-top-color: var(--tt-border);"
                            >
                                <div class="text-[10.5px] font-semibold uppercase tracking-[0.16em] tt-text-mid">
                                    What the research says
                                </div>
                                <p class="mt-1.5 text-sm lg:text-[15px] tt-text-soft leading-relaxed"
                                   x-text="activeArchetype.research"
                                ></p>
                            </div>

                            <div class="tt-reveal tt-reveal-cta mt-7"
                                 :class="revealStage >= 1 && 'is-in'"
                            >
                                <span class="tt-recommend-pill">
                                    <span>Recommended:&nbsp;</span>
                                    <span class="tt-text" x-text="activeArchetype.service"></span>
                                </span>
                            </div>

                            <div class="tt-reveal tt-reveal-cta tt-reveal-cta-row mt-4 flex flex-col sm:flex-row items-center gap-4 justify-center"
                                 :class="revealStage >= 1 && 'is-in'"
                            >
                                <a
                                    :href="ctaUrl()"
                                    target="_blank"
                                    rel="noopener"
                                    x-on:click="trackCta()"
                                    class="tt-cta btn"
                                >
                                    Reveal how WhyLead can help  →
                                </a>

                                <button
                                    type="button"
                                    x-on:click="replay()"
                                    class="text-sm tt-text-soft underline decoration-current/40 underline-offset-4 hover:opacity-100 opacity-80 transition"
                                >
                                    Rebuild the tower
                                </button>
                            </div>
                        </div>
                    </div>
                </template>
            </div>
        </div>
    </section>
</div>

<script>
(function () {
    if (window.teamTowerRegistered) return;
    window.teamTowerRegistered = true;

    window.teamTower = function () {
        return {
            truths: [
                { id: 1,  dim: 'T', text: "People hold back their honest opinions in meetings" },
                { id: 2,  dim: 'C', text: "Priorities shift without explanation" },
                { id: 3,  dim: 'A', text: "Underperformance slides for months before anyone acts" },
                { id: 4,  dim: 'M', text: "Managers were promoted for skill, not leadership" },
                { id: 5,  dim: 'E', text: "Sunday nights come with dread" },
                { id: 6,  dim: 'T', text: "Mistakes get hidden, not discussed" },
                { id: 7,  dim: 'C', text: "Two teams would describe our strategy differently" },
                { id: 8,  dim: 'A', text: "Real feedback happens once a year, if at all" },
                { id: 9,  dim: 'M', text: "Decisions bottleneck at the top" },
                { id: 10, dim: 'E', text: "Firefighting is constant; celebration is rare" },
                { id: 11, dim: 'T', text: "Feedback only flows downward" },
                { id: 12, dim: 'C', text: "Everyone is busy, but no one is sure what winning looks like" },
                { id: 13, dim: 'A', text: "A few stars quietly carry the whole team" },
                { id: 14, dim: 'M', text: "Managers relay messages instead of leading" },
                { id: 15, dim: 'E', text: "Our best people are quietly job-hunting" },
            ],

            // Decorative color pattern — 5 lavender, 5 white, 5 orange.
            // Exactly ONE orange per dimension so color reveals nothing about scoring.
            // Truth order dim mapping (idx 0..14): T C A M E T C A M E T C A M E
            // Orange indices: 1(C), 5(T), 8(M), 9(E), 12(A) — one per dim, one per row.
            colors: ['L','O','L', 'W','W','O', 'L','W','O', 'O','W','W', 'O','L','L'],

            archetypes: {
                T: {
                    key: 'T',
                    name: 'The Polite Pressure Cooker',
                    description: "Everyone is friendly, but nothing real gets said. Ideas and early warnings die in silence before they reach the table.",
                    research: "Psychological safety is the #1 predictor of team performance — Google's Project Aristotle & Amy Edmondson (Harvard).",
                    service: 'Thriving Teams retreat',
                    interestedIn: 'Strategy & Team Building Facilitation',
                    label: 'Thriving Teams',
                    // Pressure gauge, needle pinned to danger — silence at the seams.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <defs>
                            <linearGradient id="tt-t-danger" x1="0" y1="0" x2="1" y2="0">
                                <stop offset="0" stop-color="#C3BBFF"/>
                                <stop offset="0.55" stop-color="#C3BBFF"/>
                                <stop offset="1" stop-color="#F26B21"/>
                            </linearGradient>
                        </defs>
                        <path d="M 32 138 A 68 68 0 0 1 168 138" stroke="url(#tt-t-danger)" stroke-width="10" stroke-linecap="round"/>
                        <g stroke="#19124B" stroke-width="2.5" stroke-linecap="round" opacity="0.55">
                            <line x1="38"  y1="120" x2="46"  y2="123"/>
                            <line x1="60"  y1="88"  x2="65"  y2="94"/>
                            <line x1="100" y1="72"  x2="100" y2="80"/>
                            <line x1="140" y1="88"  x2="135" y2="94"/>
                            <line x1="162" y1="120" x2="154" y2="123"/>
                        </g>
                        <line x1="100" y1="138" x2="152" y2="102" stroke="#19124B" stroke-width="5.5" stroke-linecap="round"/>
                        <circle cx="100" cy="138" r="10" fill="#19124B"/>
                        <circle cx="100" cy="138" r="3.5" fill="#C3BBFF"/>
                        <g stroke="#C3BBFF" stroke-width="4" stroke-linecap="round" fill="none">
                            <path d="M 74 50 Q 82 38 74 26" opacity="0.55"/>
                            <path d="M 100 42 Q 108 30 100 18" opacity="0.75"/>
                            <path d="M 126 50 Q 134 38 126 26" opacity="0.55"/>
                        </g>
                    </svg>`,
                },
                C: {
                    key: 'C',
                    name: 'The Busy Blur',
                    description: "Lots of motion, little direction. Effort is high but pointed in five directions at once.",
                    research: "Structure and clarity rank among the five conditions of effective teams — Google's Project Aristotle.",
                    service: 'Facilitated strategic gathering',
                    interestedIn: 'Strategy & Team Building Facilitation',
                    label: 'Facilitating Strategic Gatherings',
                    // Five arrows in disagreement — motion without direction.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <g stroke="#C3BBFF" stroke-width="6" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M 100 100 L 100 40"/>
                            <path d="M 100 100 L 150 62"/>
                            <path d="M 100 100 L 148 148"/>
                            <path d="M 100 100 L 46 148"/>
                            <path d="M 100 100 L 50 66"/>
                        </g>
                        <g fill="#C3BBFF">
                            <path d="M 100 30 L 92 46 L 108 46 Z"/>
                            <path d="M 158 56 L 140 58 L 148 74 Z"/>
                            <path d="M 156 154 L 138 148 L 146 164 Z"/>
                            <path d="M 40 154 L 58 148 L 50 164 Z"/>
                            <path d="M 42 58 L 58 60 L 50 76 Z"/>
                        </g>
                        <circle cx="100" cy="100" r="22" fill="#F26B21"/>
                        <circle cx="100" cy="100" r="8" fill="#FEF1EA"/>
                    </svg>`,
                },
                A: {
                    key: 'A',
                    name: 'The Accountability Drift',
                    description: "Standards exist on paper. In practice, results are optional — and your stars pay the price.",
                    research: "Avoidance of accountability is dysfunction #4 of Lencioni's Five Dysfunctions of a Team.",
                    service: 'Performance management redesign',
                    interestedIn: 'Performance Management',
                    label: 'Performance Management',
                    // Hourglass — time already ran out; the standard slid away.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <rect x="52" y="30" width="96" height="8" rx="3" fill="#C3BBFF"/>
                        <rect x="52" y="162" width="96" height="8" rx="3" fill="#C3BBFF"/>
                        <path d="M 66 38 L 134 38 L 100 100 L 134 162 L 66 162 L 100 100 Z"
                              stroke="#C3BBFF" stroke-width="5" stroke-linejoin="round" fill="none"/>
                        <path d="M 92 92 L 108 92 L 100 100 Z" fill="#F26B21"/>
                        <path d="M 74 162 L 126 162 L 116 138 L 84 138 Z" fill="#F26B21"/>
                        <circle cx="100" cy="118" r="2.5" fill="#F26B21"/>
                        <circle cx="100" cy="128" r="2" fill="#F26B21" opacity="0.7"/>
                    </svg>`,
                },
                M: {
                    key: 'M',
                    name: 'The Bottlenecked Engine',
                    description: "Your middle managers relay instead of lead, so every decision climbs to the top and waits.",
                    research: "Middle managers drive up to 22% of variance in team engagement — McKinsey & Gallup.",
                    service: 'Thrive in the Middle program',
                    interestedIn: 'Leadership Development Training',
                    label: 'Thrive in the Middle',
                    // Funnel with a stacked backup at the top and a trickle out.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <path d="M 30 32 L 170 32 L 116 112 L 116 168 L 84 168 L 84 112 Z"
                              stroke="#C3BBFF" stroke-width="5" stroke-linejoin="round" fill="none"/>
                        <g fill="#F26B21">
                            <circle cx="54" cy="52" r="6"/>
                            <circle cx="72" cy="48" r="6"/>
                            <circle cx="90" cy="52" r="6"/>
                            <circle cx="108" cy="48" r="6"/>
                            <circle cx="126" cy="52" r="6"/>
                            <circle cx="144" cy="52" r="6"/>
                            <circle cx="64" cy="66" r="6"/>
                            <circle cx="82" cy="70" r="6"/>
                            <circle cx="100" cy="66" r="6"/>
                            <circle cx="118" cy="70" r="6"/>
                            <circle cx="136" cy="66" r="6"/>
                            <circle cx="76" cy="86" r="5.5"/>
                            <circle cx="94" cy="88" r="5.5"/>
                            <circle cx="112" cy="86" r="5.5"/>
                        </g>
                        <circle cx="100" cy="118" r="4.5" fill="#C3BBFF"/>
                        <circle cx="100" cy="140" r="3.5" fill="#C3BBFF" opacity="0.7"/>
                        <circle cx="100" cy="158" r="2.5" fill="#C3BBFF" opacity="0.45"/>
                        <line x1="88" y1="176" x2="112" y2="176" stroke="#C3BBFF" stroke-width="2.5" stroke-linecap="round" opacity="0.35"/>
                    </svg>`,
                },
                E: {
                    key: 'E',
                    name: 'The Running-on-Empty Team',
                    description: "Capable people, drained batteries. Engagement is leaking, and your best people know their market value.",
                    research: "Low-engagement teams see 18–43% higher turnover — Gallup's global workplace research.",
                    service: 'Thriving Teams Index',
                    interestedIn: 'Leadership Assessments',
                    label: 'Thriving Teams Index',
                    // Low-charge battery with a warning triangle — energy running out.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <rect x="24" y="76" width="140" height="52" rx="10" stroke="#C3BBFF" stroke-width="5" fill="none"/>
                        <rect x="164" y="90" width="12" height="24" rx="2.5" fill="#C3BBFF"/>
                        <rect x="34" y="86" width="18" height="32" rx="2" fill="#F26B21"/>
                        <g stroke="#C3BBFF" stroke-width="2.5" stroke-linecap="round" opacity="0.35" stroke-dasharray="2 4">
                            <line x1="62" y1="90" x2="62" y2="114"/>
                            <line x1="82" y1="90" x2="82" y2="114"/>
                            <line x1="102" y1="90" x2="102" y2="114"/>
                            <line x1="122" y1="90" x2="122" y2="114"/>
                            <line x1="142" y1="90" x2="142" y2="114"/>
                        </g>
                        <path d="M 130 40 L 168 40 L 149 74 Z" fill="#F26B21" stroke="var(--tt-bg, #FEF1EA)" stroke-width="3" stroke-linejoin="round"/>
                        <rect x="147.5" y="48" width="3" height="12" rx="1.5" fill="#FEF1EA"/>
                        <circle cx="149" cy="66" r="1.8" fill="#FEF1EA"/>
                    </svg>`,
                },
                X: {
                    key: 'X',
                    name: 'The Wobbling Tower',
                    description: "Your cracks run across several dimensions at once — no single fix will hold. You need the full picture first.",
                    research: "Multi-dimension patterns call for diagnosis before intervention — the ACEND leadership intelligence platform.",
                    service: 'ACEND diagnostic',
                    interestedIn: 'Leadership Assessments',
                    label: 'Leadership Development',
                    // Tilting stack with a falling top block — multi-dimensional cracks.
                    avatar: `<svg viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" fill="none">
                        <line x1="24" y1="172" x2="176" y2="172" stroke="#C3BBFF" stroke-width="2" opacity="0.4"/>
                        <ellipse cx="100" cy="176" rx="54" ry="4" fill="#19124B" opacity="0.20"/>
                        <g transform="rotate(-1.5 100 156)">
                            <rect x="50" y="140" width="100" height="32" rx="5" fill="#C3BBFF"/>
                        </g>
                        <g transform="rotate(3 100 122)">
                            <rect x="50" y="106" width="100" height="32" rx="5" fill="#C3BBFF" opacity="0.75"/>
                        </g>
                        <g transform="rotate(-5 100 88)">
                            <rect x="55" y="72" width="90" height="32" rx="5" fill="#C3BBFF" opacity="0.55"/>
                        </g>
                        <g transform="translate(28, -6) rotate(38 100 44)">
                            <rect x="60" y="30" width="80" height="28" rx="5" fill="#F26B21"/>
                        </g>
                        <g stroke="#F26B21" stroke-width="3" stroke-linecap="round" fill="none">
                            <path d="M 24 58 Q 36 52 28 42" opacity="0.65"/>
                            <path d="M 168 90 Q 178 84 170 74" opacity="0.55"/>
                        </g>
                        <path d="M 96 156 L 98 160 L 94 164 L 96 168" stroke="#19124B" stroke-width="2" fill="none" opacity="0.45"/>
                    </svg>`,
                },
            },

            picks: [],
            locked: false,
            revealed: false,
            revealStage: 0,
            activeArchetype: null,
            started: false,
            liveStatus: '',
            _idleTween: null,
            _reduced: false,

            init() {
                this._reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;

                if (window.gsap && !this._reduced) {
                    this.$refs.tower.dataset.cssSway = 'false';
                    this._idleTween = window.gsap.to(this.$refs.tower, {
                        rotation: 0.35,
                        duration: 3.2,
                        ease: 'sine.inOut',
                        yoyo: true,
                        repeat: -1,
                        transformOrigin: '50% 100%',
                    });
                }
            },

            isPicked(id) { return this.picks.indexOf(id) !== -1; },
            truthById(id) { return this.truths.find(t => t.id === id) || { text: '' }; },

            colorClassFor(idx) {
                const c = this.colors[idx] || 'L';
                if (c === 'O') return 'tt-block-orange';
                if (c === 'W') return 'tt-block-white';
                return 'tt-block-lavender';
            },

            toggle(id) {
                if (this.locked) return;

                if (this.isPicked(id)) {
                    this.picks = this.picks.filter(p => p !== id);
                    this.liveStatus = this.picks.length + ' of 6 selected';
                    return;
                }

                if (this.picks.length >= 6) return;

                if (!this.started) {
                    this.started = true;
                    this.dl({ event: 'tower_start' });
                }

                this.picks.push(id);
                this.dl({ event: 'tower_pull', count: this.picks.length });
                this.liveStatus = this.picks.length + ' of 6 selected';

                this.wobble(this.picks.length);

                if (this.picks.length === 6) {
                    this.locked = true;
                    setTimeout(() => this.collapse(), 600);
                }
            },

            wobble(count) {
                if (this._reduced) return;

                if (window.gsap && this._idleTween) {
                    const amp = count <= 3 ? 0.5 : (count <= 5 ? 1.0 : 1.4);
                    const dur = count <= 3 ? 2.6 : (count <= 5 ? 1.6 : 1.1);
                    this._idleTween.kill();
                    this._idleTween = window.gsap.to(this.$refs.tower, {
                        rotation: amp,
                        duration: dur,
                        ease: 'sine.inOut',
                        yoyo: true,
                        repeat: -1,
                        transformOrigin: '50% 100%',
                    });

                    if (count >= 4 && count <= 5) {
                        window.gsap.fromTo(this.$refs.tower,
                            { rotation: -amp * 1.4 },
                            { rotation: amp * 1.4, duration: 0.35, yoyo: true, repeat: 1, ease: 'sine.inOut', overwrite: false }
                        );
                    }
                } else {
                    const t = this.$refs.tower;
                    t.classList.remove('tt-creaking');
                    void t.offsetWidth;
                    t.classList.add('tt-creaking');
                }
            },

            collapse() {
                this.activeArchetype = this.computeArchetype();

                if (this._reduced || !window.gsap) {
                    this.reveal();
                    return;
                }

                const tower = this.$refs.tower;
                const section = this.$refs.section;
                const blocks = Array.from(tower.querySelectorAll('.tt-block'));

                let done = false;
                const finish = () => {
                    if (done) return;
                    done = true;
                    section.classList.remove('tt-shake');
                    void section.offsetWidth;
                    section.classList.add('tt-shake');
                    this.confettiBurst();
                    this.reveal();
                };
                // Safety fallback in case GSAP RAF is throttled (background tab, low-power mode)
                setTimeout(finish, 2200);

                const tl = window.gsap.timeline({ onComplete: finish });

                if (this._idleTween) this._idleTween.kill();

                tl.to(tower, { rotation: -6, duration: 0.35, ease: 'power2.in', transformOrigin: '50% 100%' })
                  .to(tower, { rotation: -14, duration: 0.25, ease: 'power2.in' });

                blocks.forEach((b, i) => {
                    if (b.dataset.picked === 'true') return;
                    const tx = (Math.random() - 0.5) * 260;
                    const ty = 80 + Math.random() * 220;
                    const rot = (Math.random() - 0.5) * 140;
                    tl.to(b, {
                        x: tx,
                        y: ty,
                        rotation: rot,
                        opacity: 0,
                        duration: 0.75,
                        ease: 'power2.in',
                    }, '<' + (i * 0.03));
                });
            },

            confettiBurst() {
                if (this._reduced || !window.confetti) return;
                try {
                    const c = window.confetti.create(this.$refs.confetti, { resize: true, useWorker: true });
                    const colors = ['#F26B21', '#C3BBFF', '#FFFFFF'];
                    c({ particleCount: 90, spread: 70, origin: { x: 0.3, y: 0.55 }, colors, scalar: 0.9 });
                    c({ particleCount: 90, spread: 70, origin: { x: 0.7, y: 0.55 }, colors, scalar: 0.9 });
                    setTimeout(() => {
                        c({ particleCount: 60, spread: 100, origin: { x: 0.5, y: 0.35 }, colors, scalar: 1.1 });
                    }, 250);
                } catch (e) { /* no-op */ }
            },

            reveal() {
                this.revealed = true;
                requestAnimationFrame(() => requestAnimationFrame(() => {
                    this.revealStage = 1;
                }));
                this.liveStatus = 'Your team type: ' + (this.activeArchetype ? this.activeArchetype.name : '');
                this.dl({ event: 'tower_reveal', archetype: this.activeArchetype ? this.activeArchetype.key : null });
            },

            computeArchetype() {
                const dims = ['T', 'C', 'A', 'M', 'E'];
                const counts = { T: 0, C: 0, A: 0, M: 0, E: 0 };
                const firstIdx = { T: 999, C: 999, A: 999, M: 999, E: 999 };

                this.picks.forEach((pid, order) => {
                    const t = this.truthById(pid);
                    counts[t.dim]++;
                    if (order < firstIdx[t.dim]) firstIdx[t.dim] = order;
                });

                // Winner = dimension with the highest pick count. Ties broken by
                // whichever of the tied dims the visitor picked FIRST — surfaces
                // their gut instinct even when picks are evenly spread.
                //
                // Note: archetype X (The Wobbling Tower) is kept in the archetypes
                // map but is no longer returned from the standard flow — it read
                // as "the widget couldn't decide" too often. Retained for possible
                // reuse as a rare/hidden result.
                const maxCount = Math.max.apply(null, dims.map(d => counts[d]));
                const winners = dims.filter(d => counts[d] === maxCount);
                winners.sort((a, b) => firstIdx[a] - firstIdx[b]);
                return this.archetypes[winners[0]];
            },

            replay() {
                this.picks = [];
                this.locked = false;
                this.revealed = false;
                this.revealStage = 0;
                this.activeArchetype = null;
                this.started = false;
                this.liveStatus = '';
                this.dl({ event: 'tower_replay' });

                if (window.gsap) {
                    const blocks = Array.from(this.$refs.tower.querySelectorAll('.tt-block'));
                    window.gsap.set(blocks, { x: 0, y: 0, rotation: 0, opacity: 1, clearProps: 'all' });
                    window.gsap.set(this.$refs.tower, { rotation: 0, clearProps: 'transform' });

                    if (!this._reduced) {
                        this._idleTween = window.gsap.to(this.$refs.tower, {
                            rotation: 0.35,
                            duration: 3.2,
                            ease: 'sine.inOut',
                            yoyo: true,
                            repeat: -1,
                            transformOrigin: '50% 100%',
                        });
                    }
                }
            },

            ctaUrl() {
                if (!this.activeArchetype) return 'https://acend.whyleadothers.com/workshop-registration';
                const payload = {
                    archetype: this.activeArchetype.name,
                    service: this.activeArchetype.service,
                    interested_in: this.activeArchetype.interestedIn,
                    picks: this.picks.map(pid => this.truthById(pid).text),
                };
                const json = JSON.stringify(payload);
                const b64 = btoa(unescape(encodeURIComponent(json)))
                    .replace(/\+/g, '-')
                    .replace(/\//g, '_')
                    .replace(/=+$/, '');
                const params = new URLSearchParams({
                    tower: b64,
                    interested_in: this.activeArchetype.interestedIn,
                });
                return 'https://acend.whyleadothers.com/workshop-registration?' + params.toString();
            },

            trackCta() {
                this.dl({ event: 'tower_cta_click', archetype: this.activeArchetype ? this.activeArchetype.key : null });
            },

            dl(payload) {
                window.dataLayer = window.dataLayer || [];
                window.dataLayer.push(payload);
            },
        };
    };
})();
</script>
