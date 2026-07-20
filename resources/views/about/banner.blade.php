{{-- Add the .js-story class synchronously so animated elements can be pre-hidden
     before first paint. Removed automatically if GSAP fails to load. --}}
<script>
    (function () {
        var html = document.documentElement;
        html.classList.add('js-story');
        setTimeout(function () {
            if (!window.gsap || !window.ScrollTrigger) {
                html.classList.remove('js-story');
            }
        }, 1500);
    })();
</script>

<style>
    /* -------------------------------------------------------------------- *
     * "Once Upon A Time" — scroll-story styles.
     *
     * `.js-story` is set by the inline bootstrap above; it scopes every
     * pre-hidden state so no-JS users see the fully rendered section.
     * -------------------------------------------------------------------- */
    #aboutUs .story-scope { position: relative; }

    /* Pinned viewport — vertically centers the story content during the pin. */
    #aboutUs .story-viewport {
        position: relative;
        min-height: 100vh;
        display: flex;
        align-items: center;
    }

    /* Progress thread down the left edge of the narrative column. */
    #aboutUs .story-thread {
        position: absolute;
        top: 0;
        left: -14px;
        bottom: 0;
        width: 2px;
        pointer-events: none;
    }
    #aboutUs .story-thread-fill {
        position: absolute;
        inset: 0;
        background: #F26B21;
        transform-origin: top center;
    }

    /* Headline word masking. */
    #aboutUs .story-headline-line {
        display: block;
        overflow: hidden;
    }
    #aboutUs .story-headline-word {
        display: inline-block;
        will-change: transform, opacity;
    }
    #aboutUs .story-once {
        display: inline-block;
    }

    /* Paragraph line masking. */
    #aboutUs .story-line-mask {
        display: block;
        overflow: hidden;
    }
    #aboutUs .story-line-inner {
        display: block;
        will-change: transform;
    }

    /* JS-story pre-hidden states — only apply once bootstrap runs.
       Paragraphs stay opacity 0 until the line-splitter marks them .is-split.
       By that point GSAP has been called with yPercent 110, so the split
       reveals a masked but transform-offset line rather than a raw paragraph. */
    html.js-story #aboutUs .story-p:not(.is-split) { opacity: 0; }
    html.js-story #aboutUs .story-p.is-split { opacity: 1; visibility: hidden; }
    html.js-story #aboutUs .story-p.is-split.story-p--armed { visibility: visible; }
    html.js-story #aboutUs .story-btn { opacity: 0; }
    html.js-story #aboutUs .story-card { opacity: 0; }
    html.js-story #aboutUs .story-badge { opacity: 0; }
    html.js-story #aboutUs .story-scrap { opacity: 0; }

    /* Scroll-to-see-more hint — visible on first paint below the heading.
       Fades out via GSAP once the first story beat is armed. */
    #aboutUs .story-scroll-hint {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        margin-top: 20px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 0.18em;
        text-transform: uppercase;
        color: #F26B21;
        opacity: 0.85;
        pointer-events: none;
    }
    #aboutUs .story-scroll-hint svg {
        width: 14px;
        height: 14px;
        animation: story-scroll-nudge 1.6s ease-in-out infinite;
    }
    @keyframes story-scroll-nudge {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(4px); }
    }
    @media (prefers-reduced-motion: reduce) {
        #aboutUs .story-scroll-hint svg { animation: none; }
    }

    /* Inline word treatments — "Intervene" underline. */
    #aboutUs .treat-underline {
        position: relative;
        display: inline-block;
        white-space: nowrap;
    }
    #aboutUs .treat-underline svg {
        position: absolute;
        left: 0;
        right: 0;
        bottom: -0.35em;
        width: 100%;
        height: 0.55em;
        overflow: visible;
    }

    /* "Thrive" highlight sweep. */
    #aboutUs .treat-highlight {
        position: relative;
        display: inline-block;
        white-space: nowrap;
    }
    #aboutUs .treat-highlight-sweep {
        position: absolute;
        left: -0.15em;
        right: -0.15em;
        top: 0.05em;
        bottom: 0.05em;
        background: rgba(242, 107, 33, 0.35);
        border-radius: 4px;
        z-index: 0;
    }
    #aboutUs .treat-highlight span {
        position: relative;
        z-index: 1;
    }

    /* "blue" → orange color change. */
    #aboutUs .treat-blue {
        color: #378ADD;
        transition: none;
    }

    /* Button outline draw. */
    #aboutUs .story-btn-wrap {
        position: relative;
        display: inline-block;
    }
    #aboutUs .story-btn-outline {
        position: absolute;
        inset: -3px;
        pointer-events: none;
        overflow: visible;
    }

    /* Card badges — mark for stamp-in animation. */
    #aboutUs .story-badge { transform-origin: center center; }

    /* -------------------------------------------------------------------- *
     * Scrap-style team photo — pinned to the section like a polaroid on a
     * cork board. Tilted, drop-shadowed, with a washi-tape strip.
     * -------------------------------------------------------------------- */
    #aboutUs .story-scrap {
        position: relative;
        display: block;
        width: 100%;
        max-width: 320px;
        margin-left: auto;
        margin-right: 0;
        padding: 12px 12px 40px;
        background: #ffffff;
        border-radius: 3px;
        box-shadow:
            0 1px 2px rgba(0, 0, 0, 0.08),
            0 12px 28px -6px rgba(0, 0, 0, 0.22),
            0 24px 48px -20px rgba(0, 0, 0, 0.18);
        transform: rotate(-3deg);
        transform-origin: 60% 40%;
        z-index: 2;
    }
    #aboutUs .story-scrap-photo {
        display: block;
        width: 100%;
        aspect-ratio: 3 / 2;
        object-fit: cover;
        background: #eee;
        border-radius: 1px;
    }
    #aboutUs .story-scrap-caption {
        display: block;
        margin-top: 10px;
        text-align: center;
        color: #1a1a1a;
        font-family: "Caveat", "Bradley Hand", "Segoe Script", cursive;
        font-size: 20px;
        line-height: 1;
        letter-spacing: 0.01em;
        transform: rotate(-1deg);
    }
    /* Washi-tape strip pinning the photo to the "page". */
    #aboutUs .story-scrap-tape {
        position: absolute;
        top: -14px;
        left: 50%;
        width: 96px;
        height: 26px;
        transform: translateX(-50%) rotate(-4deg);
        background:
            repeating-linear-gradient(
                135deg,
                rgba(255, 255, 255, 0.35) 0 6px,
                rgba(255, 255, 255, 0.15) 6px 12px
            ),
            rgba(242, 107, 33, 0.72);
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.12);
        pointer-events: none;
    }
    #aboutUs .story-scrap-tape::before,
    #aboutUs .story-scrap-tape::after {
        content: "";
        position: absolute;
        top: 0;
        bottom: 0;
        width: 6px;
        background: linear-gradient(90deg, rgba(0, 0, 0, 0.05), transparent 60%);
    }
    #aboutUs .story-scrap-tape::before { left: 0; }
    #aboutUs .story-scrap-tape::after {
        right: 0;
        background: linear-gradient(270deg, rgba(0, 0, 0, 0.05), transparent 60%);
    }
    /* In dark mode, the polaroid remains white (photos always sit on white
       paper), but nudge the caption a hair darker for contrast against the
       shadow. */
    body.dark #aboutUs .story-scrap {
        box-shadow:
            0 1px 2px rgba(0, 0, 0, 0.6),
            0 14px 32px -6px rgba(0, 0, 0, 0.55),
            0 28px 56px -18px rgba(0, 0, 0, 0.5);
    }
    @media (max-width: 1023px) {
        #aboutUs .story-scrap {
            margin-left: auto;
            margin-right: auto;
            max-width: 280px;
        }
    }

    /* Reduced-motion — belt & braces. */
    @media (prefers-reduced-motion: reduce) {
        html.js-story #aboutUs .story-p,
        html.js-story #aboutUs .story-headline-word,
        html.js-story #aboutUs .story-btn,
        html.js-story #aboutUs .story-card,
        html.js-story #aboutUs .story-badge,
        html.js-story #aboutUs .story-scrap {
            opacity: 1 !important;
        }
        html.js-story #aboutUs .story-thread { display: none; }
    }
</style>

<section id="aboutUs" x-intersect.threshold.15="activeSection = 'aboutUs'" class="py-12 lg:pt-16 lg:pb-0">
    <div class="story-scope">
        <div class="story-viewport">
            <div class="relative max-w-7xl mx-auto px-4 md:px-8 w-full">
                <div class="flex flex-col lg:grid grid-cols-12 gap-6 lg:gap-12 items-start">
                    {{-- Narrative column --}}
                    <div class="col-span-5 relative">
                        {{-- Progress thread (desktop only) --}}
                        <div class="story-thread hidden lg:block" aria-hidden="true">
                            <div class="story-thread-fill"></div>
                        </div>

                        <h2 class="text-2xl lg:text-4xl/[1.4] font-bold uppercase">
                            <span class="story-headline-line">
                                <span class="story-once font-light story-headline-word">Once</span>
                                <span class="story-headline-word">Upon</span>
                                <span class="story-headline-word">A</span>
                                <span class="story-headline-word">Time</span>
                            </span>
                        </h2>

                        {{-- Scroll hint — nudges the reader into the pinned
                             timeline. Fades out once the first story beat is
                             armed. --}}
                        <div class="story-scroll-hint" aria-hidden="true">
                            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14M6 13l6 6 6-6" />
                            </svg>
                            <span>Scroll to see more</span>
                        </div>

                        <p class="story-p mt-1 text-base/loose opacity-70" data-story-p="1">
                            We began with a simple but profound question: <span class="treat-whylead">Why lead?</span>
                            This inquiry sparked a survey distributed to leaders across numerous organizations, and the
                            findings were startling.
                        </p>

                        <p class="story-p mt-3 text-base/loose opacity-70" data-story-p="2">
                            Leaders were facing significant challenges; although much of an organization's
                            success depended on their involvement, they often felt isolated in their efforts.
                            Recognizing the crucial role and challenges of leadership, we knew it was time to <span
                                class="treat-underline">Intervene<svg viewBox="0 0 200 20" preserveAspectRatio="none"
                                    aria-hidden="true">
                                    <path d="M 4 14 C 30 6, 70 18, 108 10 C 148 4, 180 16, 196 10"
                                        fill="none" stroke="#F26B21" stroke-width="2.5" stroke-linecap="round"
                                        pathLength="1" stroke-dasharray="1" stroke-dashoffset="1" />
                                </svg></span>.
                        </p>

                        <p class="story-p mt-3 text-base/loose opacity-70" data-story-p="3">
                            This was the genesis of WhyLead &mdash; created to forge partnerships with leaders and
                            organizations, providing the essential support they need to <span
                                class="treat-highlight"><span
                                    class="treat-highlight-sweep" aria-hidden="true"></span><span>Thrive</span></span>.
                        </p>

                        <p class="story-p mt-3 text-base/loose opacity-70" data-story-p="4">
                            We are committed to empowering leaders and organizations to thrive. We achieve this by
                            nurturing leadership talent and cultivating a workplace culture that serves the
                            organization's mission and strategic goals.
                        </p>

                        <div class="mt-4 gap-3">
                            <span class="story-btn-wrap">
                                <a href="#ourValues" x-on:click="smoothScrollTo($event, 'ourValues')"
                                    class="btn story-btn w-full md:w-auto">
                                    Our values
                                </a>
                                <svg class="story-btn-outline" preserveAspectRatio="none" aria-hidden="true">
                                    <rect x="1" y="1" width="calc(100% - 2px)" height="calc(100% - 2px)"
                                        rx="6" ry="6" fill="none" stroke="#F26B21" stroke-width="2"
                                        pathLength="1" stroke-dasharray="1" stroke-dashoffset="1" />
                                </svg>
                            </span>
                        </div>
                    </div>

                    {{-- Cards column --}}
                    <div class="col-span-7 pt-4 lg:pb-16 flex items-start flex-col lg:gap-2">
                        {{-- Scrap-style team photo, pinned above the cards like a polaroid. --}}
                        <figure class="story-scrap">
                            <span class="story-scrap-tape" aria-hidden="true"></span>
                            <img src="{{ asset('img/uploads/about-thrive-team.jpg') }}"
                                alt="WhyLead team at a Thrive in the Middle session"
                                class="story-scrap-photo" loading="lazy" width="600" height="400">
                            <figcaption class="story-scrap-caption">the thrive squad</figcaption>
                        </figure>

                        <div
                            class="story-card mt-8 max-w-lg ml-auto w-full bg-accent/5 dark:bg-content/5 border border-stroke shadow-sm rotate-1 rounded-2xl items-center justify-center relative">
                            <div
                                class="story-badge bg-accent text-white border border-stroke dark:border-content/20 shadow-sm absolute -top-2 -left-2 rounded-md overflow-hidden">
                                <div class="text-xs/none font-bold uppercase tracking-wide relative py-2 px-2.5 ">
                                    Who we are
                                </div>
                            </div>

                            <div class="px-6 pt-7 pb-4 text-base/loose font-light">
                                We've been called trainers, coaches, and consultants. But we call ourselves
                                organizational paramedics, leadership miyagis, and the thrive squad.
                                We are who you call when you want your leaders and organization to thrive.
                            </div>
                        </div>

                        <div
                            class="story-card mt-10 max-w-lg w-full bg-content/[0.02] border border-stroke shadow-sm -rotate-1 rounded-2xl items-center justify-center relative">
                            <div
                                class="story-badge bg-content text-card border dark:border-content/10 absolute -top-2 -left-2 rounded-md overflow-hidden shadow-sm">
                                <div class="text-xs/none font-bold uppercase tracking-wide relative py-2 px-2.5">
                                    Our What
                                </div>
                            </div>

                            <div class="px-6 pt-8 pb-6 text-xl/loose font-light">
                                To help organizations thrive by developing thriving leaders, teams, and cultures.
                            </div>
                        </div>

                        <div
                            class="story-card mt-14 max-w-lg ml-auto w-full bg-primary/5 dark:bg-content/5 border border-stroke shadow-sm rotate-1 rounded-2xl items-center justify-center relative">
                            <div
                                class="story-badge bg-primary text-white border border-stroke absolute -top-2 -left-2 rounded-md overflow-hidden">
                                <div class="text-xs/none font-bold uppercase tracking-wide relative py-2 px-2.5">
                                    Our Why
                                </div>
                            </div>

                            <div class="px-6 pt-7 pb-4 text-xl/relaxed font-light">
                                We aspire to live in a world where Mondays are no longer <span
                                    class="treat-blue">blue</span> and everyone is happy and
                                fulfilled to go to work.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
