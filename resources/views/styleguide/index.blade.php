@extends('layout.index')

@section('title', 'Style Guide — WhyLead')
@section('description', 'The WhyLead design system reference: tokens, components, section patterns, and usage screenshots.')

@section('content')
    {{-- ============================================================
         WHYLEAD STYLE GUIDE
         Internal reference for developers, designers, and AI agents.
         Live examples use the exact utility classes shipped on the
         public pages; screenshots under public/img/styleguide/ show
         each pattern in real usage (captured from the live pages).
         ============================================================ --}}

    <section class="py-12 lg:py-16 border-b border-stroke">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <p class="text-primary uppercase tracking-widest text-sm font-semibold">Internal reference</p>
            <h1 class="mt-3 text-3xl md:text-5xl font-bold uppercase tracking-wide">
                <span class="outline-text">WhyLead</span> Style Guide
            </h1>
            <p class="mt-4 text-lg/relaxed opacity-70 max-w-3xl">
                The single source of truth for how WhyLead pages look and feel. Before building a new page or
                section: pick the closest section archetype below, reuse its classes and structure, and only
                invent something new when no archetype fits — then add it here.
            </p>

            <nav class="mt-8 flex flex-wrap gap-2">
                @foreach ([
                    'foundations' => 'Foundations',
                    'components' => 'Components',
                    'archetypes' => 'Section archetypes',
                    'motifs' => 'Motifs & art direction',
                    'voice' => 'Voice',
                    'checklist' => 'Cohesion checklist',
                ] as $anchor => $label)
                    <a href="#{{ $anchor }}"
                        class="rounded-full border border-stroke px-4 py-2 text-sm font-semibold uppercase tracking-wide hover:border-primary hover:text-primary transition-colors">
                        {{ $label }}
                    </a>
                @endforeach
            </nav>
        </div>
    </section>

    {{-- ============================== FOUNDATIONS ============================== --}}
    <section id="foundations" class="py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 flex flex-col gap-14">
            <div class="max-w-3xl">
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">01.</span> Foundations
                </h2>
            </div>

            {{-- Color --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Color</h3>
                <p class="mt-2 opacity-70 max-w-3xl">
                    Two brand colors carry the whole site: <strong>orange for action</strong> (CTAs, links, icons,
                    accents) and <strong>navy for depth</strong> (dark cards, panels, display text). Everything else
                    is a neutral driven by CSS variables so dark mode works for free — always use the semantic
                    classes (<code class="text-primary">bg-canvas, bg-card, text-content, border-stroke</code>),
                    never raw white/black.
                </p>

                <div class="mt-6 grid grid-cols-2 md:grid-cols-4 gap-4">
                    <div class="rounded-2xl border border-stroke overflow-hidden">
                        <div class="h-24 bg-primary"></div>
                        <div class="p-4">
                            <p class="font-bold">Primary</p>
                            <p class="text-sm opacity-70">#F26B21 · <code>bg-primary</code></p>
                            <p class="mt-1 text-sm opacity-70">Buttons, links, icons, accents. Hover: #D55612
                                (<code>primary-dark</code>)</p>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-stroke overflow-hidden">
                        <div class="h-24 bg-accent"></div>
                        <div class="p-4">
                            <p class="font-bold">Accent (navy)</p>
                            <p class="text-sm opacity-70">#19124B · <code>bg-accent</code></p>
                            <p class="mt-1 text-sm opacity-70">Dark cards & panels, display type, dark forms. Dark
                                mode: #241B63</p>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-stroke overflow-hidden">
                        <div class="h-24 bg-gradient-to-t from-primary/10 via-primary/10 to-transparent"></div>
                        <div class="p-4">
                            <p class="font-bold">Peach wash</p>
                            <p class="text-sm opacity-70"><code>from-primary/10</code></p>
                            <p class="mt-1 text-sm opacity-70">Warm section backdrop (home mid-page, testimonial
                                cards). Chips: #FEF1EA</p>
                        </div>
                    </div>
                    <div class="rounded-2xl border border-stroke overflow-hidden">
                        <div class="h-24 grid grid-cols-4">
                            <div class="bg-canvas border-r border-stroke"></div>
                            <div class="bg-card border-r border-stroke"></div>
                            <div class="bg-content"></div>
                            <div class="bg-stroke"></div>
                        </div>
                        <div class="p-4">
                            <p class="font-bold">Neutrals (themed)</p>
                            <p class="text-sm opacity-70"><code>canvas / card / content / stroke</code></p>
                            <p class="mt-1 text-sm opacity-70">Light: #FFF · #FFF · #000 · #E2E8F0<br />
                                Dark: #181818 · #252525 · #FFF · #353535</p>
                        </div>
                    </div>
                </div>

                <div class="mt-4 rounded-2xl border border-stroke p-4 flex flex-col md:flex-row md:items-center gap-4">
                    <div class="size-14 rounded-xl bg-gradient-to-br from-primary to-primary/20 flex-none flex items-center justify-center text-white">
                        <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v18m9-9H3" />
                        </svg>
                    </div>
                    <p class="text-sm opacity-70">
                        <strong>Brand gradient</strong> — orange fading out (<code>bg-gradient-to-br from-primary
                        to-primary/20</code>) for icon chips, and orange → navy for the site-loader ring. Never
                        introduce new hues; yellows/purples appear only inside photography and the impact rings.
                    </p>
                </div>
            </div>

            {{-- Typography --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Typography</h3>
                <p class="mt-2 opacity-70 max-w-3xl">
                    One family: <strong>Gotham</strong> (300 light / 500 book / 600 medium / 700 bold), self-hosted.
                    Body text is weight 500. No other typefaces — if a heading looks off-brand, it's usually a
                    wrong weight, not a missing font.
                </p>

                <div class="mt-6 grid md:grid-cols-2 gap-4">
                    <div class="rounded-2xl border border-stroke p-6 flex flex-col gap-5">
                        <p class="text-xs uppercase tracking-widest opacity-50">The signature: two-tone headline</p>
                        <h4 class="text-2xl md:text-4xl font-bold text-center uppercase tracking-wide">
                            <span class="outline-text">Frequently</span><br />
                            <span class="outline-text">asked</span> questions
                        </h4>
                        <p class="text-sm opacity-70">
                            Alternate a light segment (<code>.outline-text</code> = weight 300, 70% opacity) with
                            bold segments. Centered + uppercase for section headers. Used on almost every section.
                        </p>
                        <h4 class="text-2xl md:text-3xl font-bold text-center uppercase tracking-wide">
                            <span class="text-primary font-light opacity-90">Trusted</span> globally
                        </h4>
                        <p class="text-sm opacity-70">Orange-lead variant — reserve for proof/brand moments (logo strip).</p>
                        <h4 class="text-2xl md:text-3xl font-bold italic uppercase">
                            Why <span class="outline-text">thrive?</span>
                        </h4>
                        <p class="text-sm opacity-70">Italic variant — inline emphasis inside split sections.</p>
                        <div class="border-t border-stroke pt-5">
                            <p class="text-primary uppercase tracking-widest text-sm font-semibold">Our methodology</p>
                            <h4 class="mt-2 text-2xl md:text-3xl font-bold uppercase tracking-wide">
                                The <span class="outline-text">KASH</span> model
                            </h4>
                            <p class="mt-3 text-sm opacity-70">
                                <strong>Kicker line</strong> — orange uppercase tracked micro-label above a headline.
                                Optional; use on subpage sections that need labeling. At most <em>one</em>
                                primary-colored word inside the headline itself.
                            </p>
                        </div>
                    </div>

                    <div class="rounded-2xl border border-stroke p-6 flex flex-col gap-5">
                        <p class="text-xs uppercase tracking-widest opacity-50">Left-aligned split headline</p>
                        <div>
                            <h4 class="text-2xl md:text-3xl font-bold uppercase text-accent dark:text-content">
                                Develop thriving teams
                            </h4>
                            <p class="mt-2 uppercase text-sm font-semibold tracking-wide">
                                We help teams unleash collective potential
                            </p>
                        </div>
                        <p class="text-base/loose opacity-80">
                            Body copy is Gotham 500 with generous line height (<code>text-base/loose</code> or
                            <code>text-lg/relaxed</code>) and usually 70–80% opacity against the canvas.
                            <strong>Bold spans</strong> pull key phrases.
                        </p>
                        <div class="text-sm opacity-70 border-t border-stroke pt-4">
                            Scale: section headers <code>text-2xl md:text-4xl</code> · page heroes up to
                            <code>text-5xl</code> · sub-lines <code>text-lg opacity-70</code> · microcopy
                            <code>text-[11px] font-semibold opacity-50</code>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Buttons --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Buttons & links</h3>
                <p class="mt-2 opacity-70 max-w-3xl">
                    One button system (<code>.btn</code> in <code>resources/css/app.css</code>): solid orange,
                    uppercase, tracked, rounded-md. CTAs read as verbs — "Get in touch", "Enroll today",
                    "Assess your middle managers".
                </p>
                <div class="mt-6 rounded-2xl border border-stroke p-6 flex flex-wrap items-center gap-4">
                    <button class="btn">Primary action</button>
                    <button class="btn btn-sm">Small</button>
                    <button class="btn btn-xs"><span class="capitalize my-1 mx-2">Nav CTA</span></button>
                    <button class="btn btn-outline">Outline</button>
                    <a href="#" class="text-primary font-semibold underline">Inline text link</a>
                    <span class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold bg-primary text-white">Form submit (rounded-lg)</span>
                </div>
            </div>

            {{-- Shape --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Shape, borders & elevation</h3>
                <div class="mt-6 grid grid-cols-2 md:grid-cols-5 gap-4 items-end">
                    <div class="text-center">
                        <div class="h-16 rounded-md border-2 border-primary/60"></div>
                        <p class="mt-2 text-sm opacity-70"><code>rounded-md</code><br />buttons</p>
                    </div>
                    <div class="text-center">
                        <div class="h-16 rounded-lg border-2 border-primary/60"></div>
                        <p class="mt-2 text-sm opacity-70"><code>rounded-lg</code><br />inputs, chips</p>
                    </div>
                    <div class="text-center">
                        <div class="h-20 rounded-2xl border-2 border-primary/60"></div>
                        <p class="mt-2 text-sm opacity-70"><code>rounded-2xl</code><br />cards</p>
                    </div>
                    <div class="text-center">
                        <div class="h-24 rounded-3xl border-2 border-primary/60"></div>
                        <p class="mt-2 text-sm opacity-70"><code>rounded-3xl</code><br />panels</p>
                    </div>
                    <div class="text-center">
                        <div class="h-16 rounded-full border-2 border-primary/60"></div>
                        <p class="mt-2 text-sm opacity-70"><code>rounded-full</code><br />pills, badges</p>
                    </div>
                </div>
                <p class="mt-4 text-sm opacity-70 max-w-3xl">
                    Borders are hairlines (<code>border-stroke</code>, <code>border-black/5..15</code>). Shadows are
                    subtle (<code>shadow</code> / <code>shadow-sm</code>) and only on cards. Photos sit in rounded
                    cards, often tilted ±1–3° (<code>rotate-1</code>-style) with a floating chip overlapping a corner
                    — the "casual photo" treatment.
                </p>
            </div>

            {{-- Layout --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Layout & rhythm</h3>
                <ul class="mt-4 flex flex-col max-w-3xl">
                    @foreach ([
                        'Container: <code>mx-auto max-w-7xl px-4 sm:px-6 md:px-8</code> — everything aligns to it.',
                        'Section padding: <code>py-10 lg:py-14</code> (hero/feature sections up to <code>py-12 md:py-20</code>).',
                        'Backgrounds alternate to create rhythm: white canvas → gray <code>bg-content/5</code> → peach wash → navy/photo dark band. Never two dark bands in a row.',
                        'Content splits are 2-col (<code>md:grid grid-cols-2 gap-8+</code>) with photo on one side; card grids are 3–4 col with <code>gap-6</code>.',
                        'Section headers are centered with the sub-line <code>mt-2 md:mt-5 text-lg opacity-70</code>; left-aligned only inside split sections.',
                    ] as $rule)
                        <li class="flex items-start gap-3 py-3 border-b border-stroke last:border-0">
                            <span class="text-primary font-bold flex-none">+</span>
                            <p class="text-base/relaxed opacity-80">{!! $rule !!}</p>
                        </li>
                    @endforeach
                </ul>
            </div>

            {{-- Dark mode --}}
            <div>
                <h3 class="text-xl font-bold uppercase tracking-wide">Dark mode</h3>
                <p class="mt-2 opacity-70 max-w-3xl">
                    Site-wide, class-based (<code>body.dark</code>, toggled from the nav). It works through the
                    semantic color vars — so every new section must be built with <code>bg-canvas / bg-card /
                    text-content / border-stroke</code> plus explicit <code>dark:</code> overrides where a raw
                    color is unavoidable. Test both themes before shipping.
                </p>
                <div class="mt-6 grid md:grid-cols-2 gap-4">
                    <figure>
                        <img class="w-full rounded-2xl border border-stroke" src="{{ asset('img/styleguide/dark-challenge-grid.jpg') }}" alt="Challenge grid in dark mode" />
                        <figcaption class="mt-2 text-sm opacity-60">Cards switch to <code>bg-card</code> gray; navy accent cards stay navy.</figcaption>
                    </figure>
                    <figure>
                        <img class="w-full rounded-2xl border border-stroke" src="{{ asset('img/styleguide/dark-cta.jpg') }}" alt="CTA panel in dark mode" />
                        <figcaption class="mt-2 text-sm opacity-60">Panels use <code>bg-content/5</code> so they tint correctly on any theme.</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================== COMPONENTS ============================== --}}
    <section id="components" class="py-12 lg:py-16 bg-content/5">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 flex flex-col gap-10">
            <div class="max-w-3xl">
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">02.</span> Components
                </h2>
                <p class="mt-3 opacity-70">Live examples — inspect this page's markup and copy the classes.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-4">
                {{-- Icon chip --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Icon chip (on dark cards)</p>
                    <div class="rounded-xl bg-accent p-5 inline-flex">
                        <div class="size-10 rounded-xl bg-gradient-to-br from-primary to-primary/20 text-white flex items-center justify-center">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941" />
                            </svg>
                        </div>
                    </div>
                    <p class="mt-4 text-sm opacity-70"><code>size-10 rounded-xl bg-gradient-to-br from-primary to-primary/20</code></p>
                </div>

                {{-- Outline info chip --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Outline info chip</p>
                    <div class="flex items-center gap-3 rounded-lg border border-stroke px-4 py-3.5">
                        <span class="size-8 rounded bg-primary/10 text-primary flex items-center justify-center flex-none">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18" />
                            </svg>
                        </span>
                        <span class="font-medium">Innovative</span>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Benefit chips in split sections; contact info rows.</p>
                </div>

                {{-- Plus list --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Plus-list</p>
                    <ul>
                        @foreach (['Holistic Leadership Development', 'Intensive Personalized Feedback', 'Pioneering Synergy'] as $item)
                            <li class="flex items-center gap-4 py-2.5 border-b border-stroke last:border-0">
                                <span class="text-primary text-lg font-light">+</span>
                                <span class="text-base">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 text-sm opacity-70">Outcome/benefit lists inside split sections.</p>
                </div>

                {{-- Check list --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Check-list (emphatic)</p>
                    <ul class="flex flex-col gap-3">
                        @foreach (['Where managers are underperforming', 'Where performance is plateauing'] as $item)
                            <li class="flex items-center gap-3">
                                <span class="size-7 rounded bg-primary text-white flex items-center justify-center flex-none">
                                    <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                    </svg>
                                </span>
                                <span class="font-bold uppercase text-sm tracking-wide">{{ $item }}</span>
                            </li>
                        @endforeach
                    </ul>
                    <p class="mt-4 text-sm opacity-70">Orange square + bold uppercase label. Circle-check variant for team values.</p>
                </div>

                {{-- Pills --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Pills & badges</p>
                    <div class="flex flex-wrap items-center gap-3">
                        <span class="rounded-full bg-card border border-stroke shadow-sm px-4 py-1.5 text-xs font-bold uppercase tracking-wide">1st May 2026</span>
                        <span class="rounded-full border border-white/70 px-3 py-1 text-xs font-semibold uppercase tracking-wide bg-accent text-white">Step 01</span>
                        <span class="rounded-full bg-content/5 px-3 py-1.5 text-xs font-bold uppercase tracking-wide">Essentials edition</span>
                        <span class="rounded-full bg-primary text-white px-4 py-1.5 text-xs font-bold uppercase tracking-wide">Our values</span>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Date pills, photo-overlay step pills, tag pills, active tab pill.</p>
                </div>

                {{-- Label chips --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Sticky-note label chips</p>
                    <div class="relative rounded-xl bg-content/5 p-5 pt-6 -rotate-1">
                        <span class="absolute -top-3 left-4 rounded bg-accent text-white px-3 py-1.5 text-xs font-bold uppercase tracking-wide">Who we are</span>
                        <p class="text-sm opacity-80">Tilted tinted note card with a small label chip breaking the top edge (navy, black, or orange).</p>
                    </div>
                </div>

                {{-- Quote card --}}
                <div class="rounded-2xl bg-card border border-stroke p-6 lg:col-span-2">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Quote card (testimonials)</p>
                    <div class="rounded-2xl bg-gradient-to-b from-primary/10 to-primary/5 p-6">
                        <div class="text-5xl font-bold opacity-15 leading-none">&ldquo;</div>
                        <p class="mt-1 text-base/relaxed">The sessions truly helped the team think critically and open up about how we understand our culture, values, and norms.</p>
                        <div class="mt-6 flex items-center gap-3">
                            <span class="size-9 rounded-full bg-content/10 flex-none"></span>
                            <div>
                                <p class="text-sm font-semibold">Gloria Kahamba</p>
                                <p class="text-sm opacity-60">Country Director, D-Tree</p>
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Peach gradient, oversized quote glyph, avatar + name + muted role. Shown in a slider with minimal arrows.</p>
                </div>

                {{-- Navy info card --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Navy info card</p>
                    <div class="relative rounded-3xl bg-gradient-to-br from-accent via-accent/90 to-accent/95 text-white px-6 py-6 shadow overflow-hidden">
                        <div class="size-10 rounded-xl bg-gradient-to-br from-primary to-primary/20 flex items-center justify-center">
                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z" />
                            </svg>
                        </div>
                        <h4 class="mt-4 font-semibold text-lg">Effective</h4>
                        <p class="mt-2 text-sm/relaxed text-white/80">We use your business model, strategy, and culture to develop the context of our solutions.</p>
                    </div>
                    <p class="mt-4 text-sm opacity-70"><code>rounded-3xl bg-gradient-to-br from-accent via-accent/90 to-accent/95</code> + icon chip + dotted watermark.</p>
                </div>

                {{-- Floating stat chip --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Floating stat chip</p>
                    <div class="flex rounded-lg overflow-hidden shadow-lg bg-accent text-white max-w-sm -rotate-1">
                        <div class="bg-gradient-to-b from-primary-dark to-accent px-3 py-4 flex items-center font-bold">84%</div>
                        <p class="p-3 text-xs/relaxed">of clients say they identified new possibilities for action & improvement</p>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Overlaps a photo-card corner in split sections.</p>
                </div>

                {{-- Form fields --}}
                <div class="rounded-2xl bg-card border border-stroke p-6 lg:col-span-2">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Form fields — light & dark contexts</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="text-sm">Work Email <span class="text-red-500">*</span></label>
                            <input type="email" class="mt-1.5 w-full rounded bg-content/5 border-0 px-3 py-3 text-sm focus:outline-none focus:ring-1 focus:ring-primary" placeholder="" />
                            <p class="mt-2 text-xs opacity-60">Light: label above, gray fill, no border, red asterisk.</p>
                        </div>
                        <div class="rounded-xl bg-accent p-4">
                            <label class="text-sm text-white">First Name <span class="text-red-400">*</span></label>
                            <input type="text" class="mt-1.5 w-full rounded bg-white px-3 py-3 text-sm text-black focus:outline-none" />
                            <p class="mt-2 text-xs text-white/60">Dark (enroll): white fields on navy.</p>
                        </div>
                    </div>
                </div>

                {{-- Accordion --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">FAQ accordion row</p>
                    <div class="border-b border-stroke py-4 flex items-center justify-between gap-4">
                        <p class="font-semibold">What types of training does WhyLead offer?</p>
                        <span class="text-2xl font-light flex-none">+</span>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Hairline rows, semibold question, thin plus toggle.</p>
                </div>

                {{-- Letter tile --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Letter tiles (brand system)</p>
                    <div class="flex items-center gap-2">
                        <span class="size-10 rounded-lg bg-accent text-white font-bold flex items-center justify-center">A</span>
                        <span class="size-10 rounded-lg bg-primary text-white font-bold flex items-center justify-center">C</span>
                        <span class="size-10 rounded-lg bg-accent text-white font-bold flex items-center justify-center">E</span>
                        <span class="size-10 rounded-lg bg-[#10B981] text-white font-bold flex items-center justify-center">N</span>
                        <span class="size-10 rounded-lg bg-[#7C3AED] text-white font-bold flex items-center justify-center">D</span>
                    </div>
                    <p class="mt-4 text-sm opacity-70">ACEND product mark; navy/orange singles identify sub-brands (ecosystem footer). Green/violet appear ONLY inside the ACEND wordmark.</p>
                </div>

                {{-- Stat pills --}}
                <div class="rounded-2xl bg-card border border-stroke p-6">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Stat pill row</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach (['7 weeks', '6 modules', '4 stages'] as $stat)
                            <span class="rounded-full bg-content/5 px-4 py-2 text-xs uppercase tracking-wide"><strong class="font-bold">{{ explode(' ', $stat)[0] }}</strong> {{ explode(' ', $stat)[1] }}</span>
                        @endforeach
                    </div>
                    <p class="mt-4 text-sm opacity-70">Program fast-facts on showcase cards (bold number + muted label).</p>
                </div>

                {{-- Contrast pair --}}
                <div class="rounded-2xl bg-card border border-stroke p-6 lg:col-span-3">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Contrast pair (problem vs. the WhyLead way)</p>
                    <div class="grid md:grid-cols-2 gap-4">
                        <div class="rounded-2xl bg-content/5 p-6">
                            <p class="text-xs uppercase tracking-widest opacity-50">Training that fades</p>
                            <p class="mt-2 font-semibold text-lg">Sit through it. Certificate. Forget.</p>
                            <p class="mt-2 text-sm/relaxed opacity-70">Most leadership programs stop at "know" — thirty days later, the behaviours haven't moved.</p>
                        </div>
                        <div class="rounded-2xl bg-primary/10 border border-primary/30 p-6">
                            <p class="text-xs uppercase tracking-widest text-primary font-semibold">The WhyLead way</p>
                            <p class="mt-2 font-semibold text-lg">Learn it. Own it. Practice it. Live it.</p>
                            <p class="mt-2 text-sm/relaxed opacity-70">We move people through <strong>Knowledge, Attitude, Skills</strong> and <strong>Habits</strong> — so change shows up on Monday morning and stays.</p>
                        </div>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Muted gray for the problem, peach (<code>bg-primary/10</code>) + primary kicker for the answer. Never a new hue.</p>
                </div>

                {{-- Process timeline --}}
                <div class="rounded-2xl bg-card border border-stroke p-6 lg:col-span-3">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Process timeline</p>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
                        @foreach ([['1', 'Your challenge', 'Brief'], ['2', 'The real pain', 'Diagnose'], ['3', 'Contextual', 'Design & deliver'], ['4', 'Support that lasts', 'Embed']] as [$n, $kicker, $name])
                            <div>
                                <div class="flex items-center gap-3">
                                    <span class="size-10 rounded-xl border border-stroke bg-card shadow-sm text-primary font-bold flex items-center justify-center flex-none">{{ $n }}</span>
                                    <span class="hidden md:block h-px flex-1 bg-gradient-to-r from-primary/60 to-stroke"></span>
                                </div>
                                <p class="mt-3 text-xs uppercase tracking-widest text-primary font-semibold">{{ $kicker }}</p>
                                <p class="mt-1 font-bold">{{ $name }}</p>
                            </div>
                        @endforeach
                    </div>
                    <p class="mt-4 text-sm opacity-70">Lightweight “how we work” explainer: numbered badges on a fading line, orange step kicker, bold step name, short body. Photo-card calendar (thrive) remains the choice for date-based timelines.</p>
                </div>

                {{-- Explorer --}}
                <div class="rounded-2xl bg-card border border-stroke p-6 lg:col-span-3">
                    <p class="text-xs uppercase tracking-widest opacity-50 mb-4">Explorer (rail + detail card)</p>
                    <div class="grid md:grid-cols-[280px_1fr] gap-6">
                        <div class="flex flex-col">
                            <div class="rounded-xl bg-accent text-white px-4 py-3 flex items-center gap-3 shadow">
                                <span class="size-8 rounded-lg bg-white/10 text-white font-bold flex items-center justify-center flex-none text-sm">K</span>
                                <div>
                                    <p class="text-[10px] uppercase tracking-widest text-white/60">Learn</p>
                                    <p class="font-semibold text-sm">Knowledge</p>
                                </div>
                            </div>
                            @foreach ([['A', 'Shift', 'Attitude'], ['S', 'Practice', 'Skills']] as [$l, $k, $n])
                                <div class="px-4 py-3 flex items-center gap-3 opacity-60">
                                    <span class="size-8 rounded-lg border border-stroke font-bold flex items-center justify-center flex-none text-sm">{{ $l }}</span>
                                    <div>
                                        <p class="text-[10px] uppercase tracking-widest opacity-60">{{ $k }}</p>
                                        <p class="font-semibold text-sm">{{ $n }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="relative rounded-2xl border border-stroke bg-gradient-to-br from-primary/10 via-transparent to-transparent p-6 overflow-hidden">
                            <span class="absolute top-4 right-5 text-xs opacity-40 font-semibold">01 · 04</span>
                            <p class="text-xs uppercase tracking-widest text-primary font-semibold">Learn</p>
                            <p class="mt-1 text-2xl font-bold">Knowledge</p>
                            <p class="mt-2 text-sm/relaxed opacity-70 max-w-md">Fresh frameworks and insight leaders can actually name and use.</p>
                            <div class="mt-4 flex flex-wrap gap-2">
                                @foreach (['Research-backed', 'Contextually relevant'] as $chip)
                                    <span class="rounded-lg border border-stroke bg-card px-3 py-2 text-xs flex items-center gap-1.5"><span class="text-primary font-bold">✓</span> {{ $chip }}</span>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <p class="mt-4 text-sm opacity-70">Interactive rail (active row = navy card) + detail card washed with peach gradient. Used for KASH, facilitation session types, Thrive modules. Active state is always navy; accents primary; no graph-paper textures.</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============================== ARCHETYPES ============================== --}}
    <section id="archetypes" class="py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 flex flex-col gap-12">
            <div class="max-w-3xl">
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">03.</span> Section archetypes
                </h2>
                <p class="mt-3 opacity-70">
                    The reusable sections that make up every page, captured from the live site. Reach for one of
                    these before designing anything new.
                </p>
            </div>

            @php
                $archetypes = [
                    [
                        'group' => 'Structure',
                        'items' => [
                            ['nav.jpg', 'Navigation (unified parent brand)', 'Sticky bg-card bar on theme vars: logo left, uppercase tracked links with dropdowns (Solutions, Ideas & Resources, About), right theme toggle + primary .btn CTA. Raises shadow/border on scroll. Gotham only.', 'layout/nav.blade.php'],
                            ['footer.jpg', 'Ecosystem footer', 'Parent-brand closer: headline + brand-system cards (WhyLead / ACEND / Thriving Boundlessly with letter tiles), latest-podcast strip, newsletter + socials + copyright. Built on canvas/card/stroke vars so it themes in dark mode; labels are Gotham uppercase tracked (no mono).', 'layout/footer.blade.php'],
                        ],
                    ],
                    [
                        'group' => 'Heroes',
                        'items' => [
                            ['hero-home.jpg', 'Home hero', 'Rotating "NO ___" statements: giant navy display type stacked behind cut-out people photos on white. Bold, unmissable, zero chrome.', 'home/banner.blade.php'],
                            ['hero-page.jpg', 'Page hero (navy)', 'Full-width navy band: left bold uppercase white headline with orange/bold emphasis + sub-line; right rounded photo card with overlay text.', 'training/banner.blade.php'],
                        ],
                    ],
                    [
                        'group' => 'Explainers',
                        'items' => [
                            ['split-feature-solution.jpg', 'Split feature (the workhorse)', 'Tilted rounded photo card (often with floating stat chip) on one side; on the other: bold uppercase headline, uppercase sub-headline, body, plus-list or outline chips, orange CTA. Used for every solution/program pitch.', 'consultancy/*.blade.php, home/acend, thrive'],
                            ['split-feature-thrive.jpg', 'Split feature — program variant', 'Same skeleton pitching a program: title, uppercase sub, body, icon chip grid, CTA + photo card.', 'home/thriving-in-the-middle.blade.php'],
                            ['navy-cards.jpg', 'Navy card trio', 'Centered two-tone header + 3–4 navy gradient cards (icon chip, white title, white/80 body, dotted watermark), optional CTA line below.', 'home/working-with-whylead, about/values'],
                            ['steps-trio.jpg', 'Steps trio', 'Numbered photo cards with outline STEP pills and white titles; centered question + CTA below.', 'home/unlock-potential.blade.php'],
                            ['audit-panel.jpg', 'Audit panel', 'Navy rounded-3xl split panel: white embedded card + icon-chip bullet list; circular connector badge breaking the bottom edge.', 'home/leaders.blade.php'],
                            ['program-stepper.jpg', 'Program stepper (scroll-pinned)', 'Numbered vertical rail with progress line; program title, body, key-outcomes list, CTA + playful photo. Pinned while scrolling through programs.', 'training/programs.blade.php'],
                            ['sticky-notes.jpg', 'Story + sticky notes', 'Prose column beside tilted tinted note cards with label chips (WHO WE ARE / OUR WHAT / OUR WHY). Includes the pill tab bar.', 'about/index.blade.php'],
                            ['process-timeline.jpg', 'Process timeline', 'Kicker + two-tone headline + numbered badges on a fading line; each step gets an orange kicker, bold name, short body. For "how we work" explainers (date-based timelines keep the photo-card calendar).', 'training, facilitation'],
                            ['explorer-kash.jpg', 'Explorer (rail + detail card)', 'Interactive rail of steps/letters (active row = navy card) beside a peach-washed detail card with kicker, title, body, check chips and counter. Used for KASH, session types, Thrive modules.', 'training, facilitation'],
                            ['program-showcase.jpg', 'Program showcase composite', 'Flagship program card: kicker + stat pill row + photo, module explorer, dual CTA (.btn + .btn-outline); companion cards for ACEND (letter tiles) and intensives.', 'training/index.blade.php'],
                        ],
                    ],
                    [
                        'group' => 'Proof',
                        'items' => [
                            ['logo-strip.jpg', 'Logo strip', 'Two-tone header ("TRUSTED GLOBALLY") + grayscale client logos in calm rows.', 'home/banner.blade.php (logos)'],
                            ['marquee.jpg', 'Sector marquee (logo strip variant)', 'Scrolling rows mixing grayscale logos with muted uppercase sector labels ("across 12 industries and 3 continents"). Labels stay quiet — content color at ~50% opacity, never orange.', 'home/banner.blade.php'],
                            ['impact-light.jpg', 'Impact band — light variant', 'Ring stats on a soft light wash for subpages; headline stays strictly two-tone (no multicolor underlines). Home keeps the dark photo version.', 'training, facilitation'],
                            ['testimonials.jpg', 'Testimonials slider', 'Peach gradient quote cards with oversized quote glyph, avatar + role; minimal arrows.', 'common/testimonials'],
                            ['impact-band.jpg', 'Impact band', 'Full-bleed fixed dark photo; white two-tone header; three ring stats (dotted texture) with captions.', 'home/unleash.blade.php'],
                            ['team-cards.jpg', 'Team showcase', 'Blob-radius cards: featured white card with yellow-backed cutout portrait, orange role, bio; compact navy cards with circular portraits + values checklist; slider arrows.', 'about (team)'],
                        ],
                    ],
                    [
                        'group' => 'Conversion',
                        'items' => [
                            ['challenge-grid.jpg', 'Challenge card grid', '3-col alternating white/navy rounded-2xl cards with orange line icons; hover = subtle blob + scale. Opens the challenge modal.', 'home/challenges.blade.php'],
                            ['calendar-timeline.jpg', 'Program calendar', 'Dashed timeline with hollow circle ends, white date pills, dark photo label cards; CTA line below.', 'thrive-in-the-middle'],
                            ['cohorts-split.jpg', 'Cohort listing', 'Photo title card + uppercase note + italic WHY THRIVE? + plus-list; right column of dated entries (two-tone date, tag pill, body, CTA) with hairline dividers.', 'thrive-in-the-middle/programmes.blade.php'],
                            ['cta-panel.jpg', 'CTA panel', 'Rounded-3xl bg-content/5 panel, centered two-tone header, one-line body, single orange button. Closes almost every page.', 'home/cta.blade.php'],
                            ['contact-form.jpg', 'Contact split', '"Reach out" info chips + social circles | "Send us a message" light form (gray fills, labels above, red asterisks).', 'contacts.blade.php'],
                            ['dark-form.jpg', 'Dark enroll form', 'Navy full-bleed form: white labels, white fields, radios, orange submit; paper-plane motifs.', 'thrive-in-the-middle/enroll'],
                        ],
                    ],
                ];
            @endphp

            @foreach ($archetypes as $group)
                <div>
                    <h3 class="text-xl font-bold uppercase tracking-wide mb-6">
                        <span class="text-primary">/</span> {{ $group['group'] }}
                    </h3>
                    <div class="grid md:grid-cols-2 gap-6">
                        @foreach ($group['items'] as [$img, $name, $desc, $src])
                            <figure class="rounded-2xl border border-stroke overflow-hidden bg-card flex flex-col">
                                <a href="{{ asset('img/styleguide/' . $img) }}" target="_blank" class="block border-b border-stroke bg-content/5">
                                    <img class="w-full" src="{{ asset('img/styleguide/' . $img) }}" alt="{{ $name }}" loading="lazy" />
                                </a>
                                <figcaption class="p-5">
                                    <p class="font-bold">{{ $name }}</p>
                                    <p class="mt-1.5 text-sm/relaxed opacity-70">{{ $desc }}</p>
                                    <p class="mt-2 text-xs opacity-50 font-mono">{{ $src }}</p>
                                </figcaption>
                            </figure>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- ============================== MOTIFS ============================== --}}
    <section id="motifs" class="py-12 lg:py-16 bg-content/5">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8">
            <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide max-w-3xl">
                <span class="outline-text">04.</span> Motifs & art direction
            </h2>
            <div class="mt-8 grid md:grid-cols-2 gap-x-10">
                @foreach ([
                    ['Photography', 'Real program photos of people — warm, candid, African professional settings. Cut-out people on white for heroes; photo cards elsewhere: rounded corners, slight tilt, subtle shadow, often a floating chip overlapping a corner. Grayscale only for client logos and calendar cards.'],
                    ['Paper planes', 'Scattered orange/navy paper-plane doodles — celebration/journey accents on Thrive pages. Source: common/thrive-plane.blade.php. Use sparingly, near section tops.'],
                    ['Dotted watermark', 'The honeycomb-dot logo mark, faint white, bleeding off navy card corners (home/working-with-whylead.blade.php). Only on navy surfaces.'],
                    ['Ring stats', 'Circular progress rings with dotted texture in yellow/purple/orange over dark photo bands; big white % centered.'],
                    ['Peach washes', 'Warm gradient backdrops (from-primary/10) that group related sections on home; testimonial cards reuse the tint.'],
                    ['Connector accents', 'Circular badges breaking panel edges ("DEVELOP THRIVING LEADERS ↓"), dashed timeline lines, thin vertical progress rails — quiet wayfinding devices.'],
                ] as [$name, $desc])
                    <div class="py-4 border-b border-stroke flex items-start gap-4">
                        <span class="text-primary font-bold text-lg flex-none">+</span>
                        <div>
                            <p class="font-bold">{{ $name }}</p>
                            <p class="mt-1 text-sm/relaxed opacity-70">{{ $desc }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ============================== VOICE ============================== --}}
    <section id="voice" class="py-12 lg:py-16">
        <div class="mx-auto max-w-7xl px-4 sm:px-6 md:px-8 grid md:grid-cols-2 gap-10">
            <div>
                <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide">
                    <span class="outline-text">05.</span> Voice
                </h2>
                <ul class="mt-6 flex flex-col">
                    @foreach ([
                        'Headlines pose outcomes or contrasts: "Ready to build a thriving organization?", "Most programs inspire change. Few give you a system…"',
                        'CTAs are specific verbs, never generic: "Assess your middle managers", "Enroll to next cohort now", "Tell us your needs".',
                        'Bold spans emphasize the payoff words inside sentences.',
                        'Occasional warmth/personality: "organizational paramedics", "leadership miyagis", "Mondays are no longer blue".',
                    ] as $rule)
                        <li class="flex items-start gap-3 py-3 border-b border-stroke last:border-0">
                            <span class="text-primary font-bold flex-none">+</span>
                            <p class="text-base/relaxed opacity-80">{{ $rule }}</p>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="rounded-3xl bg-content/5 p-8 self-start">
                <p class="text-xs uppercase tracking-widest opacity-50">Anatomy of a section</p>
                <p class="mt-4 text-2xl font-bold uppercase tracking-wide text-center">
                    <span class="outline-text">Two-tone</span> headline
                </p>
                <p class="mt-2 text-center opacity-70">One supporting sentence, ~70% opacity.</p>
                <div class="mt-6 rounded-2xl bg-card border border-stroke h-24 flex items-center justify-center text-sm opacity-50">content (cards / split / list)</div>
                <p class="mt-6 text-center opacity-70 text-sm">Ready to take the next step?</p>
                <div class="mt-3 text-center"><span class="btn btn-sm">Specific verb CTA</span></div>
            </div>
        </div>
    </section>

    {{-- ============================== CHECKLIST ============================== --}}
    <section id="checklist" class="py-12 lg:py-16 bg-content/5">
        <div class="mx-auto max-w-5xl px-4 sm:px-6 md:px-8">
            <h2 class="text-2xl md:text-4xl font-bold uppercase tracking-wide text-center">
                <span class="outline-text">06.</span> Cohesion checklist
            </h2>
            <p class="mt-3 text-center opacity-70">Run every new or changed section through this before shipping.</p>
            <div class="mt-10 grid md:grid-cols-2 gap-6">
                <div class="rounded-3xl bg-card border border-stroke p-8">
                    <p class="font-bold uppercase tracking-wide text-primary">Do</p>
                    <ul class="mt-4 flex flex-col gap-3 text-sm/relaxed">
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> Reuse a section archetype and its exact spacing/type classes.</li>
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> Use semantic colors (canvas/card/content/stroke) + test dark mode.</li>
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> Headline with the two-tone pattern; keep it uppercase + tracked.</li>
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> One orange CTA per section, verb-first, using <code>.btn</code>.</li>
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> Photos in rounded, softly tilted cards with real program imagery.</li>
                        <li class="flex gap-3"><span class="text-primary font-bold">✓</span> Keep borders hairline (<code>border-stroke</code>) and shadows subtle.</li>
                    </ul>
                </div>
                <div class="rounded-3xl bg-card border border-stroke p-8">
                    <p class="font-bold uppercase tracking-wide opacity-60">Don't</p>
                    <ul class="mt-4 flex flex-col gap-3 text-sm/relaxed opacity-80">
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Introduce new fonts — Gotham only, no Google-Fonts links. "Technical" labels are Gotham uppercase tracked, never a mono face.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Use any orange other than #F26B21 (<code>primary</code>) / #D55612 hover — no #E8521A-style variants. Navy is <code>accent</code> #19124B, not #0F1B3D lookalikes.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Hardcode palettes (cream, slate, white/black) — semantic vars only, or dark mode breaks.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Color more than one headline word primary; never multicolor/underline headline words.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Add new surface textures (graph-paper grids etc.) — motifs are the dotted watermark, paper planes, peach washes.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Stack two dark bands back-to-back, mix button styles, or end a page without its CTA panel.</li>
                        <li class="flex gap-3"><span class="font-bold opacity-50">✕</span> Ship a section that hasn't been checked in dark mode and at md/mobile widths.</li>
                    </ul>
                </div>
            </div>

            <p class="mt-10 text-center text-sm opacity-60">
                Screenshots live in <code>public/img/styleguide/</code> · captured from the live pages ·
                update them when a pattern changes.
            </p>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- Alpine Core -->
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
