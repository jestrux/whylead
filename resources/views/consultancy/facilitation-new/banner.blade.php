{{-- ================================================================
     FACILITATION · S1 — HERO ("Live session")
     The right side is the demo: a session player surrounded by the
     room (sticky tensions + named cursors). Replay fills the room,
     runs the day (arrivals → break → commit), ships a decision and
     re-runs the TTI. Locked in from the /lab redesign process.
================================================================= --}}

@php
    $contactUrl = url('/contacts?interest=Facilitating Strategic Gatherings');

    // The scripted day — five agenda beats (incl. arrival + break), one line from the room per act.
    $agenda = [
        'Arrivals & check-in',
        'Surface the real issues',
        'Weigh the real trade-offs',
        'Break — lunch & a walk',
        'Commit — owners & dates',
    ];
    $script = [
        ['quote' => 'Karibuni. Let\'s put our phones in the basket and get started.', 'who' => 'Ben · facilitator',   'color' => '#F26B21'],
        ['quote' => 'Say the real problem out loud &mdash; we&rsquo;ll handle it from there.',        'who' => 'Ben · facilitator',   'color' => '#F26B21'],
        ['quote' => 'We can&rsquo;t fund both. Which one hurts more to kill?',                        'who' => 'Amina · CEO',         'color' => '#7C3AED'],
        ['quote' => 'That walk helped &mdash; I know what I want to say now.',                        'who' => 'David · Head of Ops', 'color' => '#0E9F6E'],
        ['quote' => 'Decided. David owns the call &mdash; we review in two weeks.',                   'who' => 'Ben · facilitator',   'color' => '#F26B21'],
        ['quote' => 'Good session. See you at the re-measure &mdash; go ship it.',                    'who' => 'Ben · facilitator',   'color' => '#F26B21'],
    ];
    $agendaTimes = ['09:00', '09:30', '11:30', '13:00', '15:30'];

    // Adapted from consultancy/testimonials.blade.php
    $quote = [
        'text' => 'The sessions Ben delivered truly helped the team think critically and open up about our culture, values, and norms.',
        'name' => 'Gloria Kahamba',
        'role' => 'Country Director, D-Tree',
    ];
@endphp

<style>
    /* ---------- live session ---------- */
    .lv-mono { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; }
    @keyframes lvPulse { 0%,100% { box-shadow: 0 0 0 0 rgba(242,107,33,.55) } 60% { box-shadow: 0 0 0 9px rgba(242,107,33,0) } }
    .lv-pulse { animation: lvPulse 2.2s ease-out infinite; }
    @keyframes lvHead { 0%,100% { opacity: .9 } 50% { opacity: .4 } }
    .lv-playhead { animation: lvHead 1.6s ease-in-out infinite; }

    /* active-act indicator — one element gliding between agenda rows */
    .lv-indicator { transition: transform .55s cubic-bezier(.3,.7,.3,1), height .55s cubic-bezier(.3,.7,.3,1), opacity .4s ease; will-change: transform; }

    /* waveform bars — height = act amplitude (--amp) × per-bar voice (--h), never fully silent */
    .lv-bar {
        transform-origin: center;
        transform: scaleY(calc(max(var(--amp, 1) * var(--h, 0.6), 0.08)));
        animation: lvBar 1.1s ease-in-out infinite alternate;
        transition: transform .6s ease;
    }
    @keyframes lvBar {
        from { transform: scaleY(calc(max(var(--amp, 1) * var(--h, 0.6) * 0.3, 0.08))); }
        to   { transform: scaleY(calc(max(var(--amp, 1) * var(--h, 0.6), 0.08))); }
    }

    /* ---------- canvas layer ---------- */
    @keyframes mpDriftA { 0%,100% { transform: translate(0,0) } 50% { transform: translate(9px,-12px) } }
    @keyframes mpDriftB { 0%,100% { transform: translate(0,0) } 50% { transform: translate(-12px,9px) } }
    @keyframes mpDriftC { 0%,100% { transform: translate(0,0) } 50% { transform: translate(7px,11px) } }
    .mp-cursor-a { animation: mpDriftA 9s ease-in-out infinite; }
    .mp-cursor-b { animation: mpDriftB 11s ease-in-out infinite; }
    .mp-cursor-c { animation: mpDriftC 10s ease-in-out infinite; }
    @keyframes mpFloat { 0%,100% { transform: translateY(0) rotate(var(--r, 0deg)) } 50% { transform: translateY(-8px) rotate(var(--r, 0deg)) } }
    .mp-float { animation: mpFloat 8s ease-in-out infinite; }

    @media (prefers-reduced-motion: reduce) {
        .mp-cursor-a, .mp-cursor-b, .mp-cursor-c, .mp-float, .lv-pulse, .lv-playhead, .lv-bar { animation: none; }
    }
</style>

<section class="relative overflow-hidden bg-canvas text-content"
    x-data="{
        step: 2,
        inRoom: 3,
        pinned: true,
        playing: false,
        played: false,
        prog: [5, 16, 42, 60, 82, 100],
        times: ['09:00', '09:30', '11:30', '13:00', '15:30', '16:45'],
        hours: [1, 1, 3, 5, 7, 8],
        token: 0,
        wait(ms) { return new Promise(r => setTimeout(r, ms)); },
        stop() {
            this.token++;
            this.playing = false;
            this.played = true;
            this.step = 2; this.inRoom = 3; this.pinned = true;
        },
        async play() {
            if (this.playing) return;
            const t = ++this.token;
            if (window.matchMedia('(max-width: 1023px)').matches) this.$refs.player.scrollIntoView({ behavior: 'smooth', block: 'center' });
            this.playing = true;
            this.step = 0; this.inRoom = 0; this.pinned = false;
            await this.wait(500); if (t !== this.token) return;
            for (let i = 1; i <= 3; i++) { await this.wait(420); if (t !== this.token) return; this.inRoom = i; }
            await this.wait(450); if (t !== this.token) return;
            this.pinned = true;
            for (let s = 1; s <= 5; s++) { await this.wait(2600); if (t !== this.token) return; this.step = s; }
            this.playing = false; this.played = true;
        },
    }">
    {{-- glows spotlight the media, not the text --}}
    <div aria-hidden="true" class="absolute -top-32 right-[-8%] size-[680px] rounded-full pointer-events-none"
        style="background: radial-gradient(closest-side, rgba(242,107,33,.18), transparent 70%); filter: blur(30px);"></div>
    {{-- <div aria-hidden="true" class="absolute bottom-[-30%] right-[18%] size-[520px] rounded-full pointer-events-none"
        style="background: radial-gradient(closest-side, rgba(60,50,160,.13), transparent 70%); filter: blur(36px);"></div> --}}

    <div class="relative max-w-7xl mx-auto px-4 md:px-8 py-20 lg:py-24">
        <div class="lg:grid grid-cols-12 gap-14 items-center">
            <div class="col-span-6">
                <h1 class="text-4xl lg:text-[2.85rem] font-bold uppercase leading-[1.08] tracking-wide">
                    <span class="outline-text">Turn</span> important <span class="text-primary">conversations</span>
                    <span class="outline-text">into</span> clear <span class="text-primary">decisions</span>.
                </h1>

                <p class="mt-6 max-w-xl text-base/loose opacity-70">
                    We provide <span class="font-semibold">strategy facilitation</span>,
                    <span class="font-semibold">leadership retreat</span> design and
                    <span class="font-semibold">team-building</span> experiences for organisations that need
                    more than another meeting. We help teams in <span class="font-semibold">Tanzania</span>, across <span class="font-semibold">East Africa</span>, and around <span class="font-semibold">the world</span> surface the
                    real issues and leave with shared priorities, named owners and practical next steps.
                </p>

                <div class="mt-8 flex flex-wrap items-center gap-3">
                    <a href="{{ $contactUrl }}" class="btn h-10">Plan Your Session</a>
                    <button type="button" x-on:click="playing ? stop() : play()" class="btn h-10 btn-outline">
                        <span class="flex size-5 items-center justify-center rounded-full bg-primary/15 mr-1.5">
                            <svg x-show="!playing" class="size-2.5 text-primary translate-x-px" viewBox="0 0 12 14" fill="currentColor"><path d="M0 0l12 7-12 7z"/></svg>
                            <span x-show="playing" x-cloak class="size-2 rounded-sm bg-primary lv-pulse"></span>
                        </span>
                        <span x-text="playing ? 'Session running…' : (played ? 'Replay the session' : 'See a session unfold')">See a session unfold</span>
                    </button>
                </div>

                {{-- proof: a voice from the room (adapted from /consultancy testimonials) --}}
                <div class="relative mt-10 max-w-md border-t border-stroke pt-6">
                    {{-- quote mark hangs outside the block so the text stays flush with the stars --}}
                    <span aria-hidden="true" class="hidden lg:block absolute -left-14 top-5 text-7xl font-bold text-content/10 leading-none select-none">&ldquo;</span>

                    <div class="flex flex-wrap items-center gap-x-2.5 gap-y-1">
                        <span class="flex items-center gap-0.5 text-primary">
                            @for ($s = 0; $s < 4; $s++)
                                <svg class="size-4" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"/></svg>
                            @endfor
                            {{-- half star for the 4.5 --}}
                            <span class="relative size-4">
                                <svg class="absolute inset-0 size-4 text-primary/20" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"/></svg>
                                <span class="absolute inset-0 w-1/2 overflow-hidden">
                                    <svg class="size-4 text-primary" viewBox="0 0 24 24" fill="currentColor"><path fill-rule="evenodd" d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.006 5.404.434c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.434 2.082-5.005Z" clip-rule="evenodd"/></svg>
                                </span>
                            </span>
                        </span>
                        <span class="text-sm translate-y-0.5"><span class="font-bold">4.5</span><span class="opacity-50"> / 5 · from post-session surveys</span></span>
                    </div>

                    <p class="mt-3 text-[15px]/relaxed italic opacity-75">{{ $quote['text'] }}</p>

                    <div class="mt-4 flex items-center gap-2.5">
                        {{-- transparent cutout on D-Tree's brand teal --}}
                        <span class="size-8 rounded-full bg-[#007581] overflow-hidden flex-none">
                            <img src="{{ asset('img/testimonials/gloria-kahamba.png') }}" alt="{{ $quote['name'] }}"
                                class="w-full h-full object-cover object-top" />
                        </span>
                        <p class="text-[13px]"><span class="font-semibold">{{ $quote['name'] }}</span><span class="opacity-55"> · {{ $quote['role'] }}</span></p>
                    </div>
                </div>
            </div>

            {{-- the session, running — with the room around it --}}
            <div class="col-span-6 mt-14 lg:mt-0">
                <div class="relative max-w-lg mx-auto lg:ml-auto lg:mr-0" x-ref="player">

                    {{-- canvas layer: pinned tensions --}}
                    <div aria-hidden="true" class="hidden lg:block">
                        <div class="mp-float absolute -top-12 -left-16 w-40 z-10" style="--r: -5deg">
                            <div class="p-3.5 bg-[#FFF3C4] shadow-[0_10px_30px_-12px_rgba(0,0,0,.3)] rounded-sm" x-show="pinned"
                                x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0 -translate-y-2 scale-90" x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                                <p class="text-[12.5px]/snug font-medium text-[#6b5d1f]">why do we keep re-deciding this??</p>
                            </div>
                        </div>
                        <div class="mp-float absolute -top-9 -right-9 w-40 z-10" style="--r: 4deg; animation-delay: -3s">
                            <div class="p-3.5 bg-[#FFE4D6] shadow-[0_10px_30px_-12px_rgba(0,0,0,.3)] rounded-sm" x-show="pinned"
                                x-transition:enter="transition duration-500 delay-150" x-transition:enter-start="opacity-0 -translate-y-2 scale-90" x-transition:enter-end="opacity-100 translate-y-0 scale-100">
                                <p class="text-[12.5px]/snug font-medium text-[#7c3f1d]">Q3 — focus or expand?</p>
                            </div>
                        </div>

                        {{-- cursors: arrive on replay, light up during their act --}}
                        <div class="mp-cursor-a absolute -left-24 top-28 z-10">
                            <div class="flex items-start gap-1" x-show="inRoom >= 1"
                                x-transition:enter="transition duration-400" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100">
                                <span class="mt-2 -mr-1 rounded-full bg-primary text-white text-[11px] font-semibold px-2.5 py-1 transition-all duration-500"
                                    x-bind:class="(step === 0 || step === 1 || step >= 4) ? 'ring-4 ring-[#F26B21]/25 scale-110' : 'opacity-60'">Ben · facilitator</span>
                                <svg class="size-5 text-primary -scale-x-100 rotate-[20deg]" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l14 8.5-6.6 1.5L9 20z"/></svg>
                            </div>
                        </div>
                        <div class="mp-cursor-b absolute -right-14 top-[58%] z-10">
                            <div class="flex items-start gap-1" x-show="inRoom >= 2"
                                x-transition:enter="transition duration-400" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100">
                                <svg class="size-5 text-[#7C3AED]" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l14 8.5-6.6 1.5L9 20z"/></svg>
                                <span class="mt-3 rounded-full bg-[#7C3AED] text-white text-[11px] font-semibold px-2.5 py-1 transition-all duration-500"
                                    x-bind:class="step === 2 ? 'ring-4 ring-[#7C3AED]/25 scale-110' : 'opacity-60'">Amina · CEO</span>
                            </div>
                        </div>
                        {{-- David: pill outside, cursor tip just touching the card edge --}}
                        <div class="mp-cursor-c absolute bottom-44 z-10" style="right: calc(100% - 12px)">
                            <div class="flex items-start gap-1" x-show="inRoom >= 3"
                                x-transition:enter="transition duration-400" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100">
                                <span class="mt-2 -mr-1 rounded-full bg-[#0E9F6E] text-white text-[11px] font-semibold px-2.5 py-1 transition-all duration-500"
                                    x-bind:class="(step === 3 || step === 5) ? 'ring-4 ring-[#0E9F6E]/25 scale-110' : 'opacity-60'">David</span>
                                <svg class="size-5 text-[#0E9F6E] -scale-x-100 rotate-[20deg]" viewBox="0 0 24 24" fill="currentColor"><path d="M5 3l14 8.5-6.6 1.5L9 20z"/></svg>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl bg-card border border-stroke shadow-[0_40px_80px_-32px_rgba(0,0,0,.35)] p-6">
                        {{-- header indents to align with the agenda rows' internals --}}
                        <div class="flex items-center justify-between gap-4 px-3">
                            <p class="flex items-center gap-2 text-sm font-semibold text-content/85">
                                <span class="relative flex size-1.5">
                                    <span class="absolute inline-flex h-full w-full rounded-full bg-primary opacity-75 animate-ping"></span>
                                    <span class="relative inline-flex size-1.5 rounded-full bg-primary"></span>
                                </span>
                                Strategy reset — day 1 of 2
                            </p>
                            <p class="lv-mono text-[11px] text-content/40">
                                <span x-text="times[step]">11:30</span>
                                <span class="text-content/25">·</span>
                                <span x-show="step < 5">hour <span x-text="hours[step]">3</span></span>
                                <span x-show="step === 5" x-cloak class="text-[#10B981]">wrapped</span>
                            </p>
                        </div>

                        <div class="mt-4 mx-3 h-1 rounded-full bg-content/10 overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-primary/60 to-primary"
                                x-bind:class="step < 5 && 'lv-playhead'"
                                x-bind:style="`width: ${prog[step]}%; transition: width 1.1s cubic-bezier(.3,.7,.3,1)`"
                                style="width: 42%"></div>
                        </div>

                        <div class="mt-6 flex flex-col gap-1 relative">
                            @foreach ($agenda as $i => $item)
                                <div class="relative z-[1] flex items-center gap-3 rounded-lg px-3 py-2.5" x-ref="row{{ $i }}">
                                    <span class="relative size-5 flex-none">
                                        <span x-show="step > {{ $i }}" x-cloak
                                            x-transition:enter="transition duration-300" x-transition:enter-start="opacity-0 scale-50" x-transition:enter-end="opacity-100 scale-100"
                                            class="absolute inset-0 rounded-full bg-[#0E9F6E]/90 flex items-center justify-center">
                                            <svg class="size-3 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                                        </span>
                                        <span x-show="step === {{ $i }}" class="absolute inset-0 rounded-full bg-primary lv-pulse"></span>
                                        <span x-show="step < {{ $i }}" class="absolute inset-0 rounded-full border border-content/20"></span>
                                    </span>

                                    <p class="text-sm transition-colors duration-500"
                                        x-bind:class="step > {{ $i }} ? 'text-content/45 line-through decoration-content/25'
                                            : (step === {{ $i }} ? 'font-medium text-content' : 'text-content/50')">
                                        {{ $item }}
                                    </p>

                                    <span class="ml-auto">
                                        <span x-show="step === {{ $i }}" class="rounded-full bg-primary/15 text-primary text-[10px] font-bold uppercase tracking-wider leading-none px-2 h-6 pt-0.5 flex items-center">now</span>
                                        <span x-show="step !== {{ $i }}" class="lv-mono text-[11px] text-content/30">{{ $agendaTimes[$i] }}</span>
                                    </span>
                                </div>
                            @endforeach

                            {{-- one indicator gliding between acts; at the wrap it stays put and fades --}}
                            <div aria-hidden="true" class="lv-indicator absolute left-0 right-0 top-0 z-0 rounded-lg bg-content/[0.04] border border-content/10 opacity-0 pointer-events-none"
                                x-bind:style="(() => { const el = $refs['row' + Math.min(step, 4)]; return el ? `opacity: ${step === 5 ? 0 : 1}; transform: translateY(${el.offsetTop}px); height: ${el.offsetHeight}px;` : 'opacity: 0;'; })()"></div>
                        </div>

                        {{-- the room speaks — tinted by whoever holds the floor --}}
                        <div class="relative mt-5 rounded-xl border p-4 soverflow-hidden transition-colors duration-700"
                            x-bind:class="({
                                orange: 'bg-primary/[0.06] border-primary/20',
                                violet: 'bg-[#7C3AED]/[0.06] border-[#7C3AED]/25',
                                green: 'bg-[#0E9F6E]/[0.07] border-[#0E9F6E]/25',
                            })[['orange','orange','violet','green','orange','orange'][step]]">
                            <span aria-hidden="true" class="bg-card h-6 px-1 -mr-1 rounded-3xl absolute -top-3.5 left-2.5 text-5xl font-bold text-content/15 leading-none select-none">
                                &ldquo;
                            </span>
                            @foreach ($script as $i => $line)
                                <div x-show="step === {{ $i }}" x-cloak
                                    x-transition:enter="transition duration-500 delay-150" x-transition:enter-start="opacity-0 translate-y-1.5" x-transition:enter-end="opacity-100 translate-y-0">
                                    <p class="text-sm/relaxed text-content/80">{!! $line['quote'] !!}</p>
                                    <p class="mt-1.5 flex items-center gap-1.5 text-[11px] font-medium text-content/40">
                                        <span class="size-1.5 rounded-full" style="background: {{ $line['color'] }}"></span>
                                        {{ $line['who'] }}
                                    </p>
                                </div>
                            @endforeach
                        </div>

                        {{-- the measured layer: the TTI listens to the room; the pulse follows the act --}}
                        <div class="mt-4 flex items-center gap-4 rounded-xl border border-content/10 bg-content/[0.02] px-4 py-3">
                            <p class="text-[11px] font-semibold uppercase tracking-wider text-content/40 flex-none">Thriving Teams Index</p>

                            <div class="flex-1 flex items-center justify-center gap-[3px] h-6 min-w-0 overflow-hidden" aria-hidden="true"
                                x-bind:style="`--amp: ${[0.35, 0.7, 1, 0.25, 0.85, 0][step]}`" style="--amp: 1">
                                @php $heights = [.45, .8, .6, 1, .5, .75, .35, .9, .65, .5, .95, .4, .7, 1, .55, .85, .45, .75, .6, .9, .4, .65, .95, .5, .8, .45, .7, .35]; @endphp
                                @foreach ($heights as $bi => $h)
                                    <span class="lv-bar w-[2.5px] h-full rounded-full bg-primary/70 flex-none"
                                        style="--h: {{ $h }}; animation-delay: -{{ ($bi % 7) * 0.13 }}s"></span>
                                @endforeach
                            </div>

                            <p class="lv-mono text-[12px] text-content/50 flex-none">
                                <span x-show="step < 5">baseline <span class="text-content">60</span></span>
                                <span x-show="step === 5" x-cloak
                                    x-transition:enter="transition duration-500" x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100">
                                    60 <span class="text-content/30">&rarr;</span> <span class="text-[#10B981]">74 · +14</span>
                                </span>
                            </p>
                        </div>
                    </div>

                    {{-- the committed decision — shipped at the wrap --}}
                    <div x-show="step === 5" x-cloak
                        x-transition:enter="transition duration-500 delay-500 ease-out" x-transition:enter-start="opacity-0 translate-y-4" x-transition:enter-end="opacity-100 translate-y-0"
                        class="absolute -bottom-12 -left-3 md:-left-10 w-72 rounded-xl bg-card border border-stroke shadow-[0_24px_60px_-16px_rgba(0,0,0,.4)] p-4 z-10">
                        <div class="flex items-center gap-2">
                            <span class="size-5 rounded-full bg-[#0E9F6E] text-white flex items-center justify-center">
                                <svg class="size-3" fill="none" viewBox="0 0 24 24" stroke-width="3.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5"/></svg>
                            </span>
                            <p class="text-[11px] font-semibold uppercase tracking-wide text-content/40">Decision · committed</p>
                        </div>
                        <p class="mt-2 text-[15px] font-semibold text-content">Kill the pilot. Enterprise first.</p>
                        <div class="mt-3 flex items-center gap-1.5">
                            <div class="flex -space-x-1.5">
                                <span class="size-6 rounded-full ring-2 ring-card bg-[#0E9F6E] text-white text-[10px] font-bold flex items-center justify-center">D</span>
                                <span class="size-6 rounded-full ring-2 ring-card bg-[#7C3AED] text-white text-[10px] font-bold flex items-center justify-center">A</span>
                                <span class="size-6 rounded-full ring-2 ring-card bg-primary text-white text-[10px] font-bold flex items-center justify-center">B</span>
                            </div>
                            <p class="text-[11px] text-content/45 font-medium">Owner: David · review in 2 wks</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
