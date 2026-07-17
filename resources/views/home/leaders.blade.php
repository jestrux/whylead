{{--
    The Team Tower — WhyLead's interactive leadership audit.
    Alpine.js + Tailwind. GSAP + canvas-confetti loaded from home/index.blade.php.
--}}

<style>
    .tt-section {
        --tt-lavender: #C3BBFF;
        --tt-white: #FFFFFF;
        --tt-indigo: #19124B;
        --tt-orange: #F26B21;
    }

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

    .tt-block-lavender { background-color: var(--tt-lavender); }
    .tt-block-white    { background-color: var(--tt-white); }

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

    .tt-tray-chip {
        background-color: rgba(242, 107, 33, 0.12);
        border: 1px solid rgba(242, 107, 33, 0.55);
        color: #ffffff;
        border-radius: 999px;
        padding: 6px 10px 6px 10px;
        font-size: 11.5px;
        line-height: 1.2;
        font-weight: 500;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: background-color 160ms ease, transform 160ms ease;
        max-width: 100%;
    }
    .tt-tray-chip:hover { background-color: rgba(242, 107, 33, 0.22); transform: translateY(-1px); }
    .tt-tray-chip:focus-visible { outline: 2px solid var(--tt-orange); outline-offset: 2px; }
    .tt-tray-chip[disabled] { opacity: 0.75; cursor: default; }
    .tt-tray-chip .tt-x { opacity: 0.8; font-weight: 700; }

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
        .tt-cta {
            animation: none !important;
        }
        .tt-block,
        .tt-reveal {
            transition-duration: 150ms !important;
        }
        .tt-reveal-name, .tt-reveal-desc, .tt-reveal-cite, .tt-reveal-cta {
            transition-delay: 0ms !important;
        }
    }
</style>

<div class="lg:mt-14 max-w-7xl mx-auto lg:px-8">
    <section
        class="tt-section lg:rounded-3xl bg-accent text-white relative overflow-hidden"
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
            <div class="lg:col-span-2 px-6 pt-8 pb-6 lg:pt-14 lg:pb-14 lg:pl-14 lg:pr-8">
                <p class="text-[11px] font-semibold tracking-[0.16em] uppercase text-white/70">
                    A 60-second leadership audit
                </p>
                <h2
                    id="teamTowerHeading"
                    class="mt-3 text-3xl lg:text-4xl font-bold leading-tight"
                >
                    <span class="uppercase">
                        <span class="outline-text">The </span>Team Tower
                    </span>
                </h2>
                <p class="mt-4 text-sm lg:text-[15px] text-white/85 leading-relaxed max-w-md">
                    Pull every block that's true for your team. Six pulls and the tower falls
                    &mdash; and we'll show you what kind of team you actually have.
                </p>

                <div class="mt-6 flex items-baseline gap-3">
                    <div
                        class="text-3xl lg:text-4xl font-bold tabular-nums transition-colors"
                        :class="picks.length >= 4 ? 'tt-counter-warn' : 'text-white'"
                        aria-hidden="true"
                    >
                        <span x-text="picks.length"></span><span class="opacity-60 text-xl lg:text-2xl"> / 6</span>
                    </div>
                    <div class="text-xs uppercase tracking-[0.14em] text-white/60">Pulled</div>
                </div>

                <div class="sr-only" aria-live="polite" x-text="liveStatus"></div>

                <p class="mt-8 text-[11px] leading-relaxed text-white/50 max-w-md">
                    Built on research from Google's Project Aristotle, Amy Edmondson,
                    Patrick Lencioni, McKinsey &amp; Gallup.
                </p>
            </div>

            <div class="lg:col-span-3 px-6 pb-8 lg:py-14 lg:pr-14 lg:pl-4">
                <div class="mx-auto max-w-[520px] lg:max-w-none">
                    <div
                        class="tt-tower grid grid-cols-3 gap-2 lg:gap-2.5"
                        x-ref="tower"
                        data-css-sway="true"
                    >
                        <template x-for="(t, idx) in truths" :key="t.id">
                            <button
                                type="button"
                                class="tt-block"
                                :class="[
                                    (Math.floor(idx / 3) % 2 === 0) ? 'tt-block-lavender' : 'tt-block-white',
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

                    <div class="mt-5 lg:mt-6" x-show="picks.length > 0" x-transition.opacity>
                        <div class="text-[11px] uppercase tracking-[0.14em] text-white/60 mb-2">
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
            <div class="w-full max-w-3xl mx-auto text-center">
                <template x-if="activeArchetype">
                    <div>
                        <p class="tt-reveal text-[11px] font-semibold tracking-[0.18em] uppercase text-white/70"
                           :class="revealStage >= 1 && 'is-in'">
                            Your team is
                        </p>

                        <h3 class="tt-reveal tt-reveal-name mt-3 text-3xl lg:text-5xl font-bold leading-tight"
                            :class="revealStage >= 1 && 'is-in'"
                            x-text="activeArchetype.name"
                        ></h3>

                        <p class="tt-reveal tt-reveal-desc mt-5 text-base lg:text-lg text-white/90 leading-relaxed max-w-2xl mx-auto"
                           :class="revealStage >= 1 && 'is-in'"
                           x-text="activeArchetype.description"
                        ></p>

                        <div class="tt-reveal tt-reveal-cite mt-6 max-w-2xl mx-auto"
                             :class="revealStage >= 1 && 'is-in'"
                        >
                            <div class="text-[11px] uppercase tracking-[0.16em] text-white/50">
                                What the research says
                            </div>
                            <p class="mt-1.5 text-sm lg:text-[15px] text-white/80 leading-relaxed"
                               x-text="activeArchetype.research"
                            ></p>
                        </div>

                        <div class="tt-reveal tt-reveal-cta mt-8 flex flex-col sm:flex-row items-center justify-center gap-4"
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
                                class="text-sm text-white/70 underline decoration-white/30 underline-offset-4 hover:text-white transition"
                            >
                                Rebuild the tower
                            </button>
                        </div>

                        <p class="tt-reveal tt-reveal-cta mt-6 text-[11px] uppercase tracking-[0.14em] text-white/50"
                           :class="revealStage >= 1 && 'is-in'"
                        >
                            Recommended: <span class="text-white/80" x-text="activeArchetype.service"></span>
                        </p>
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

            archetypes: {
                T: {
                    key: 'T',
                    name: 'The Polite Pressure Cooker',
                    description: "Everyone is friendly, but nothing real gets said. Ideas and early warnings die in silence before they reach the table.",
                    research: "Psychological safety is the #1 predictor of team performance — Google's Project Aristotle & Amy Edmondson (Harvard).",
                    service: 'Thriving Teams retreat',
                    interestedIn: 'Strategy & Team Building Facilitation',
                    label: 'Thriving Teams',
                },
                C: {
                    key: 'C',
                    name: 'The Busy Blur',
                    description: "Lots of motion, little direction. Effort is high but pointed in five directions at once.",
                    research: "Structure and clarity rank among the five conditions of effective teams — Google's Project Aristotle.",
                    service: 'Facilitated strategic gathering',
                    interestedIn: 'Strategy & Team Building Facilitation',
                    label: 'Facilitating Strategic Gatherings',
                },
                A: {
                    key: 'A',
                    name: 'The Accountability Drift',
                    description: "Standards exist on paper. In practice, results are optional — and your stars pay the price.",
                    research: "Avoidance of accountability is dysfunction #4 of Lencioni's Five Dysfunctions of a Team.",
                    service: 'Performance management redesign',
                    interestedIn: 'Performance Management',
                    label: 'Performance Management',
                },
                M: {
                    key: 'M',
                    name: 'The Bottlenecked Engine',
                    description: "Your middle managers relay instead of lead, so every decision climbs to the top and waits.",
                    research: "Middle managers drive up to 22% of variance in team engagement — McKinsey & Gallup.",
                    service: 'Thrive in the Middle program',
                    interestedIn: 'Leadership Development Training',
                    label: 'Thrive in the Middle',
                },
                E: {
                    key: 'E',
                    name: 'The Running-on-Empty Team',
                    description: "Capable people, drained batteries. Engagement is leaking, and your best people know their market value.",
                    research: "Low-engagement teams see 18–43% higher turnover — Gallup's global workplace research.",
                    service: 'Happier Workplace Index',
                    interestedIn: 'Leadership Assessments',
                    label: 'Happier Workplace',
                },
                X: {
                    key: 'X',
                    name: 'The Wobbling Tower',
                    description: "Your cracks run across several dimensions at once — no single fix will hold. You need the full picture first.",
                    research: "Multi-dimension patterns call for diagnosis before intervention — the ACEND leadership intelligence platform.",
                    service: 'ACEND diagnostic',
                    interestedIn: 'Leadership Assessments',
                    label: 'Leadership Development',
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

                const dimsHit = dims.filter(d => counts[d] > 0);
                const maxCount = Math.max.apply(null, dims.map(d => counts[d]));

                if (maxCount < 3 && dimsHit.length >= 4) {
                    return this.archetypes.X;
                }

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
