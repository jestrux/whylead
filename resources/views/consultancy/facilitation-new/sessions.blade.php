{{-- ================================================================
     S3 — SESSION TYPES · BENTO
     Clerk-style bento: three cards up top, two wide below. Every
     scene is caught midway at rest and replays from zero on hover —
     the page's hover DNA. The fifth cell surfaces Ben's buried
     retainer offering.
================================================================= --}}

@php
    $sessions = [
        [
            'tag'  => 'Direction',
            'name' => 'Strategy Sessions',
            'desc' => 'We help leadership teams clarify vision, weigh the trade-offs and make the big calls that define the years ahead.',
            'link' => 'Plan a strategy session',
            'url'  => url('/contacts?interest=Facilitating Strategic Gatherings'),
        ],
        [
            'tag'  => 'Cohesion',
            'name' => 'Alignment Sessions',
            'desc' => 'We surface the hidden misalignment that quietly derails execution and rebuild shared understanding across teams and functions.',
            'link' => 'Plan an alignment session',
            'url'  => url('/contacts?interest=Facilitating Strategic Gatherings'),
        ],
        [
            'tag'  => 'Execution',
            'name' => 'Planning Sessions',
            'desc' => 'We translate ambition into concrete roadmaps, milestones and commitments — plans that are owned, not just written.',
            'link' => 'Plan a planning session',
            'url'  => url('/contacts?interest=Facilitating Strategic Gatherings'),
        ],
        [
            'tag'  => 'Momentum',
            'name' => 'Reflection Sessions',
            'desc' => 'We create the space to reflect on what is working, capture the lessons and build momentum for what comes next — so growth is deliberate rather than accidental.',
            'link' => 'Plan a reflection session',
            'url'  => url('/contacts?interest=Facilitating Strategic Gatherings'),
        ],
        [
            'tag'  => 'Partnership',
            'name' => 'The Ongoing Retainer',
            'desc' => 'For longer engagements: the same facilitation team in your corner across quarters — sessions, check-ins and retreats on a rhythm, not as one-offs.',
            'link' => 'Talk about a retainer',
            'url'  => url('/contacts?interest=Facilitation Retainer'),
        ],
    ];
@endphp

<style>
    .lab-mono { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; }

    /* ---------- bento card ---------- */
    .b3-card {
        display: flex; flex-direction: column;
        border-radius: 14px; overflow: hidden; text-decoration: none;
        background: rgb(var(--card-color));
        border: 1px solid rgb(var(--stroke-color));
        transition: transform .3s cubic-bezier(.3,.7,.3,1), box-shadow .3s ease, border-color .3s ease;
    }
    .b3-card:hover {
        transform: translateY(-3px);
        border-color: rgba(242, 107, 33, .3);
        box-shadow: 0 24px 50px -24px rgb(var(--content-color) / .25);
    }
    .b3-scene {
        position: relative; overflow: hidden;
        background: linear-gradient(180deg, rgb(var(--content-color) / .035), transparent 70%);
    }

    /* Scene pieces: choreographed (staggered) animations live under :hover;
       base states carry a short uniform transition so mouse-leave resets quickly. */

    /* 1 · strategy: the needle swings past north, then settles */
    .b3-needle { transform: rotate(-42deg); transition: transform .3s ease; }
    .b3-card:hover .b3-needle { animation: b3NeedleFind 1.1s cubic-bezier(.3,.7,.3,1) both; }
    @keyframes b3NeedleFind {
        0% { transform: rotate(-42deg); }
        55% { transform: rotate(13deg); }
        80% { transform: rotate(-5deg); }
        100% { transform: rotate(0deg); } }

    /* 2 · alignment: each oar overshoots past level, then comes back aligned */
    .b3-oar { transform: rotate(var(--r, 6deg)) translateX(var(--x, 0px)); background: rgb(var(--content-color) / .18);
        transition: transform .25s ease, background .25s ease; }
    .b3-card:hover .b3-oar { animation: b3OarLevel .9s cubic-bezier(.3,.7,.3,1) var(--d, 0s) both; }
    @keyframes b3OarLevel {
        0% { transform: rotate(var(--r, 6deg)) translateX(var(--x, 0px)); background: rgb(var(--content-color) / .18); }
        50% { transform: rotate(calc(var(--r, 6deg) * -0.45)) translateX(calc(var(--x, 0px) * -0.4)); background: rgba(242, 107, 33, .55); }
        78% { transform: rotate(calc(var(--r, 6deg) * 0.15)) translateX(calc(var(--x, 0px) * 0.12)); background: rgba(242, 107, 33, .7); }
        100% { transform: rotate(0deg) translateX(0); background: rgba(242, 107, 33, .75); } }

    /* 3 · planning: caught mid-roadmap (two milestones in); hover replays the draw from zero.
       `.is-mid` = the rest state; hover keyframes carry their own `from`, so the scene
       resets to the beginning the moment the pointer lands. */
    /* transform here must carry the -50% Y shift itself — this rule clobbers the
       -translate-y-1/2 utility (both write `transform`), which left the line 1px low */
    .b3-track { transform: translateY(-50%) scaleX(.45); transform-origin: left; transition: transform .25s ease; }
    .b3-card:hover .b3-track { animation: b3TrackDraw .8s cubic-bezier(.3,.7,.3,1) .1s both; }
    @keyframes b3TrackDraw { from { transform: translateY(-50%) scaleX(0); } to { transform: translateY(-50%) scaleX(1); } }
    .b3-stop { background: rgb(var(--card-color)); border-color: rgb(var(--content-color) / .25);
        transition: background .2s ease, border-color .2s ease; }
    .b3-stop svg { opacity: 0; transform: scale(.4); transition: opacity .2s ease, transform .2s ease; }
    .b3-stop-n { transition: opacity .2s ease; }
    .b3-stop.is-mid { background: #F26B21; border-color: #F26B21; }
    .b3-stop.is-mid svg { opacity: 1; transform: scale(1); }
    .b3-stop.is-mid .b3-stop-n { opacity: 0; }
    .b3-card:hover .b3-stop { animation: b3StopFill .3s ease var(--d, 0s) both; }
    .b3-card:hover .b3-stop svg { animation: b3PopIn .25s cubic-bezier(.34,1.56,.64,1) var(--d, 0s) both; }
    .b3-card:hover .b3-stop .b3-stop-n { animation: b3FadeOut .2s ease var(--d, 0s) both; }
    @keyframes b3StopFill { from { background: rgb(var(--card-color)); border-color: rgb(var(--content-color) / .25); }
        to { background: #F26B21; border-color: #F26B21; } }
    @keyframes b3PopIn { from { opacity: 0; transform: scale(.4); } to { opacity: 1; transform: scale(1); } }
    @keyframes b3FadeOut { from { opacity: 1; } to { opacity: 0; } }

    /* 4 · reflection: each retro card walks a lifecycle — empty circle → checked → completed
       (title darkens, lines write themselves in). Rest = caught midway: card 1 done,
       card 2 checked, card 3 untouched. Hover replays the whole board from zero. */
    .b3-note { transform: translateY(7px) rotate(var(--r, 0deg)); opacity: .78;
        transition: transform .25s ease, opacity .25s ease, border-color .25s ease; }
    .b3-note.is-checked, .b3-note.is-done { transform: translateY(0) rotate(0deg); opacity: 1; border-color: rgb(var(--content-color) / .22); }
    .b3-card:hover .b3-note { animation: b3NoteIn .5s cubic-bezier(.3,.7,.3,1) var(--d, 0s) both; }
    @keyframes b3NoteIn {
        from { transform: translateY(7px) rotate(var(--r, 0deg)); opacity: .78; border-color: rgb(var(--content-color) / .12); }
        to { transform: translateY(0) rotate(0deg); opacity: 1; border-color: rgb(var(--content-color) / .22); } }
    .b3-tick { background: rgb(var(--card-color)); border: 1.5px solid rgb(var(--content-color) / .25);
        transition: background .2s ease, border-color .2s ease; }
    .b3-tick svg { opacity: 0; transform: scale(.4); transition: opacity .2s ease, transform .2s ease; }
    .b3-note.is-checked .b3-tick, .b3-note.is-done .b3-tick { background: #F26B21; border-color: #F26B21; }
    .b3-note.is-checked .b3-tick svg, .b3-note.is-done .b3-tick svg { opacity: 1; transform: scale(1); }
    .b3-card:hover .b3-tick { animation: b3StopFill .3s ease var(--dc, 0s) both; }
    .b3-card:hover .b3-tick svg { animation: b3PopIn .25s cubic-bezier(.34,1.56,.64,1) var(--dc, 0s) both; }
    .b3-note-t { color: rgb(var(--content-color) / .5); transition: color .25s ease; }
    .b3-line { display: block; height: 6px; border-radius: 4px; width: var(--w0, 60%);
        background: rgb(var(--content-color) / .1); transition: width .25s ease, background .25s ease; }
    .b3-note.is-done .b3-note-t { color: rgb(var(--content-color) / .85); }
    .b3-note.is-done .b3-line { width: var(--w1, 90%); background: rgb(var(--content-color) / .38); }
    .b3-card:hover .b3-note-t { animation: b3TitleFill .35s ease var(--df, 0s) both; }
    .b3-card:hover .b3-line { animation: b3LineGrow .45s cubic-bezier(.3,.7,.3,1) var(--df, 0s) both; }
    @keyframes b3TitleFill { from { color: rgb(var(--content-color) / .5); } to { color: rgb(var(--content-color) / .85); } }
    @keyframes b3LineGrow { from { width: var(--w0, 60%); background: rgb(var(--content-color) / .1); }
        to { width: var(--w1, 90%); background: rgb(var(--content-color) / .38); } }
    @keyframes b3TickIn { from { opacity: 0; scale: .4; } to { opacity: 1; scale: 1; } }
    /* the loop: a faint dashed guide runs the whole route at rest (no arrowhead);
       hover draws the solid orange stroke over it — same d, overlaid exactly */
    .b3-arc-guide { stroke: rgb(var(--content-color) / .16); }
    .b3-arc { stroke: #F26B21; stroke-dasharray: 100; stroke-dashoffset: 100; transition: stroke-dashoffset .25s ease; }
    .b3-card:hover .b3-arc { animation: b3ArcDraw .9s cubic-bezier(.3,.7,.3,1) 1.05s both; }
    @keyframes b3ArcDraw { from { stroke-dashoffset: 100; } to { stroke-dashoffset: 0; } }
    .b3-arc-head { opacity: 0; scale: .4; transform-origin: center; transform-box: fill-box;
        transition: opacity .15s ease, scale .15s ease; }
    .b3-card:hover .b3-arc-head { animation: b3TickIn .3s cubic-bezier(.34,1.56,.64,1) 1.85s both; }

    /* 5 · retainer: caught mid-conversation — the message sits there, typing dots frozen.
       Hover wakes it: dots start hopping, then the reply sends. */
    @keyframes b3Pulse { 0%, 100% { box-shadow: 0 0 0 0 rgba(242,107,33,.4); } 55% { box-shadow: 0 0 0 6px rgba(242,107,33,0); } }
    .b3-beat { animation: b3Pulse 2.6s ease-out infinite; }
    .b3-dot { opacity: .45; }
    .b3-card:hover .b3-dot { animation: b3DotHop 1.1s ease-in-out infinite var(--d, 0s); }
    @keyframes b3DotHop { 0%, 60%, 100% { transform: translateY(0); opacity: .45; } 30% { transform: translateY(-3px); opacity: 1; } }
    .b3-reply { opacity: 0; transition: opacity .2s ease; }
    .b3-card:hover .b3-typing { animation: b3TypingCycle 1.5s linear both; }
    .b3-card:hover .b3-reply { animation: b3MsgIn .45s cubic-bezier(.34,1.4,.64,1) 1.3s both; }
    @keyframes b3MsgIn { from { opacity: 0; transform: translateY(8px) scale(.96); } to { opacity: 1; transform: translateY(0) scale(1); } }
    @keyframes b3TypingCycle { 0%, 72% { opacity: 1; } 84%, 100% { opacity: 0; } }

    @media (prefers-reduced-motion: reduce) {
        #sessions .b3-card, #sessions [class^="b3-"], #sessions [class*=" b3-"] { transition: none !important; animation: none !important; }
    }
</style>

<section id="sessions" class="relative py-14 md:py-20 bg-canvas text-content">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="max-w-2xl">
            <h2 class="text-4xl lg:text-[2.85rem] font-bold uppercase leading-tight tracking-wide">
                Sessions <span class="outline-text">designed to shape</span> direction
            </h2>
            <p class="mt-3 text-base/loose opacity-70">
                Every gathering is built around your goals &mdash; each session shaped with you,
                and a retainer that strings them together.
            </p>
        </div>

        <div class="mt-10 grid gap-4 lg:grid-cols-6">
            @foreach (array_slice($sessions, 0, 3) as $si => $s)
                <a href="{{ $s['url'] }}" class="b3-card group lg:col-span-2">
                    <div class="b3-scene h-52">
                        @if ($si === 0)
                            {{-- compass: needle settles on north --}}
                            <div class="absolute inset-0 flex items-center justify-center">
                                <span class="absolute size-28 rounded-full border-2 border-content/20"></span>
                                <span class="absolute size-[74px] rounded-full border-[1.5px] border-content/10"></span>
                                <span class="absolute -translate-y-[62px] lab-mono text-[10px] text-primary font-semibold">N</span>
                                <span class="absolute translate-y-[62px] lab-mono text-[10px] opacity-30">S</span>
                                <span class="absolute translate-x-[62px] lab-mono text-[10px] opacity-30">E</span>
                                <span class="absolute -translate-x-[62px] lab-mono text-[10px] opacity-30">W</span>
                                <span class="b3-needle relative flex flex-col items-center" aria-hidden="true">
                                    <span class="block w-[3px] h-[34px] rounded-full bg-[#F26B21]"></span>
                                    <span class="block w-[3px] h-[34px] rounded-full bg-content/25"></span>
                                </span>
                                <span class="absolute size-2 rounded-full bg-content/60"></span>
                            </div>
                        @elseif ($si === 1)
                            {{-- oars: rows come level together --}}
                            <div class="absolute inset-0 flex flex-col items-center justify-center gap-3.5">
                                @foreach ([['-5deg', '-8px', '0s'], ['4deg', '7px', '.06s'], ['-3deg', '5px', '.12s'], ['6deg', '-7px', '.18s']] as [$r, $x, $d])
                                    <span class="b3-oar block w-32 h-2.5 rounded-full" style="--r: {{ $r }}; --x: {{ $x }}; --d: {{ $d }}"></span>
                                @endforeach
                            </div>
                        @else
                            {{-- roadmap: the line draws, milestones land --}}
                            <div class="absolute inset-0 flex items-center justify-center px-10">
                                <div class="relative w-full">
                                    <span class="absolute inset-x-0 top-1/2 -translate-y-1/2 h-[2px] rounded bg-content/15"></span>
                                    <span class="b3-track absolute inset-x-0 top-1/2 -translate-y-1/2 h-[2px] rounded bg-[#F26B21]"></span>
                                    <span class="relative flex justify-between">
                                        @foreach ([0.1, 0.37, 0.63, 0.9] as $mi => $d)
                                            <span class="b3-stop {{ $mi < 2 ? 'is-mid' : '' }} relative size-7 rounded-full border-2 flex items-center justify-center" style="--d: {{ $d }}s">
                                                <span class="b3-stop-n absolute text-[11px] font-bold text-content/45">{{ $mi + 1 }}</span>
                                                <svg class="size-3.5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                            </span>
                                        @endforeach
                                    </span>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="px-6 pb-6 pt-1">
                        <p class="text-[11px] font-bold uppercase tracking-widest text-primary">{{ $s['tag'] }}</p>
                        <h3 class="mt-1.5 text-lg font-bold">{{ $s['name'] }}</h3>
                        <p class="mt-1.5 text-sm/relaxed opacity-70">{{ $s['desc'] }}</p>
                        <span class="mt-3.5 inline-flex items-center gap-1.5 text-sm font-semibold opacity-60">
                            {{ $s['link'] }}
                            <svg class="size-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12l-7.5 7.5M21 12H3" /></svg>
                        </span>
                    </div>
                </a>
            @endforeach

            {{-- wide row: two equal halves --}}
            @foreach (array_slice($sessions, 3, 2) as $si => $s)
                <a href="{{ $s['url'] }}" class="b3-card group lg:col-span-3">
                    <div class="b3-scene h-52">
                        @if ($si === 0)
                            {{-- reflection: the retro board fills in, the loop feeds the next session --}}
                            <div class="absolute inset-0 flex flex-col justify-end px-8 pb-6">
                                <svg class="absolute inset-x-8 top-6 h-[96px] w-[calc(100%-4rem)] text-[#F26B21]" viewBox="0 0 560 60" fill="none" preserveAspectRatio="none" aria-hidden="true">
                                    <path class="b3-arc-guide" d="M472 59 C 436 4, 128 -2, 86 59" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-dasharray="3 6" />
                                    <path class="b3-arc" pathLength="100" d="M472 59 C 436 4, 128 -2, 86 59" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" />
                                    <path class="b3-arc-head" d="M100 54 86 59 82 49" stroke="currentColor" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                                <div class="grid grid-cols-3 gap-3">
                                    @foreach ([['What worked', '-1.2deg', 'is-done'], ['What to change', '0.9deg', 'is-checked'], ['What’s next', '-0.8deg', '']] as $ni => [$label, $r, $state])
                                        <div class="b3-note {{ $state }} relative rounded-lg border border-content/12 bg-card px-3.5 py-3"
                                            style="--r: {{ $r }}; --d: {{ $ni * 0.12 }}s; --dc: {{ 0.3 + $ni * 0.2 }}s; --df: {{ 0.5 + $ni * 0.2 }}s">
                                            <span class="b3-tick absolute -top-1.5 -right-1.5 size-4 rounded-full flex items-center justify-center">
                                                <svg class="size-2.5 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3.4" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                            </span>
                                            <p class="b3-note-t lab-mono text-[9.5px] uppercase tracking-[0.12em]">{{ $label }}</p>
                                            <span class="b3-line mt-2" style="--w0: 55%; --w1: 92%"></span>
                                            <span class="b3-line mt-1.5" style="--w0: 35%; --w1: 66%"></span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @else
                            {{-- retainer: mid-conversation with your team — typing at rest, reply on hover --}}
                            <div class="absolute inset-0 flex flex-col justify-center px-8">
                                <div class="flex items-center gap-2 lab-mono text-[9.5px] uppercase tracking-[0.14em] text-content/40">
                                    <span class="b3-beat size-1.5 rounded-full bg-[#F26B21]"></span>
                                    Your WhyLead team
                                    <span class="ml-auto text-primary/80">always on</span>
                                </div>
                                <div class="mt-4 w-full max-w-[400px] mx-auto">
                                    <div class="flex items-end gap-2.5">
                                        <span class="size-6 shrink-0 rounded-full bg-content/10 flex items-center justify-center">
                                            <svg class="size-3.5 text-content/50" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd" /></svg>
                                        </span>
                                        <div class="b3-msg rounded-2xl rounded-bl-md bg-content/[0.07] px-4 py-2.5 text-[12.5px]/relaxed text-content/80 max-w-[82%]">
                                            Board moved the strategy review up a week — can we prep sooner?
                                        </div>
                                    </div>
                                    <div class="mt-2.5 flex justify-end items-end gap-2.5">
                                        <div class="relative max-w-[82%]">
                                            <div class="b3-typing absolute right-0 bottom-0 rounded-2xl rounded-br-md bg-content/[0.07] px-3.5 py-[13px] flex gap-1">
                                                <span class="b3-dot size-1.5 rounded-full bg-content/40" style="--d: 0s"></span>
                                                <span class="b3-dot size-1.5 rounded-full bg-content/40" style="--d: .15s"></span>
                                                <span class="b3-dot size-1.5 rounded-full bg-content/40" style="--d: .3s"></span>
                                            </div>
                                            <div class="b3-reply rounded-2xl rounded-br-md bg-[#F26B21] px-4 py-2.5 text-[12.5px]/relaxed text-white">
                                                Already on it. Same room, Thursday 9am.
                                            </div>
                                        </div>
                                        <span class="size-6 shrink-0 rounded-full bg-accent flex items-center justify-center text-[10px] font-bold text-white">W</span>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="px-6 pb-6 pt-1">
                        <p class="text-[11px] font-bold uppercase tracking-widest text-primary">{{ $s['tag'] }}</p>
                        <h3 class="mt-1.5 text-lg font-bold">{{ $s['name'] }}</h3>
                        <p class="mt-1.5 text-sm/relaxed opacity-70 max-w-xl">{{ $s['desc'] }}</p>
                        <span class="mt-3.5 inline-flex items-center gap-1.5 text-sm font-semibold opacity-60">
                            {{ $s['link'] }}
                            <svg class="size-3.5 transition-transform duration-300 group-hover:translate-x-1" fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5 21 12l-7.5 7.5M21 12H3" /></svg>
                        </span>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</section>
