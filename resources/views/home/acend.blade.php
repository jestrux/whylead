<style>
    .acend-lettermark {
        --off-color: #d4d4d4;
    }
    .dark .acend-lettermark {
        --off-color: #3a3a3a;
    }
    .acend-letter {
        display: inline-flex;
        align-items: center;
        justify-content: center;
        width: 1.15em;
        height: 1.15em;
        border-radius: 0.22em;
        color: #fff;
        font-weight: 800;
        line-height: 1;
        background-color: var(--off-color);
        animation: acend-disco 1.6s steps(1, end) infinite;
        animation-delay: calc(var(--i) * 0.16s);
        will-change: background-color;
    }
    @keyframes acend-disco {
        0%, 45%   { background-color: var(--on-color); }
        45.01%, 100% { background-color: var(--off-color); }
    }
    @media (prefers-reduced-motion: reduce) {
        .acend-letter {
            animation: none;
            background-color: var(--on-color);
        }
    }

    .acend-checklist .acend-check-item {
        opacity: 0;
        transform: translateX(-48px) translateY(18px) rotate(-2deg);
        transition:
            opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1),
            transform 0.9s cubic-bezier(0.34, 1.45, 0.5, 1);
        transition-delay: calc(var(--i) * 180ms);
    }
    .acend-checklist .acend-check-box {
        position: relative;
        transform: scale(0) rotate(-200deg);
        transition: transform 0.85s cubic-bezier(0.34, 1.7, 0.5, 1);
        transition-delay: calc(var(--i) * 180ms + 120ms);
    }
    .acend-checklist .acend-check-box::before {
        content: '';
        position: absolute;
        inset: -2px;
        border-radius: inherit;
        border: 2px solid currentColor;
        opacity: 0;
        pointer-events: none;
        transform: scale(1);
    }
    .acend-checklist .acend-check-path {
        stroke-dasharray: 24;
        stroke-dashoffset: 24;
        transition: stroke-dashoffset 0.5s cubic-bezier(0.65, 0, 0.35, 1);
        transition-delay: calc(var(--i) * 180ms + 560ms);
    }
    .acend-checklist .acend-check-label {
        background-image: linear-gradient(120deg, rgba(242, 111, 31, 0.22), rgba(242, 111, 31, 0.22));
        background-repeat: no-repeat;
        background-size: 0% 60%;
        background-position: 0 88%;
        padding: 0 4px;
        margin: 0 -4px;
        transition: background-size 0.8s cubic-bezier(0.22, 1, 0.36, 1);
        transition-delay: calc(var(--i) * 180ms + 720ms);
    }
    .acend-checklist.is-visible .acend-check-item {
        opacity: 1;
        transform: translateX(0) translateY(0) rotate(0);
    }
    .acend-checklist.is-visible .acend-check-box {
        transform: scale(1) rotate(0);
        animation: acend-heartbeat 3.6s ease-in-out infinite;
        animation-delay: calc(var(--i) * 180ms + 1400ms);
    }
    .acend-checklist.is-visible .acend-check-box::before {
        animation: acend-burst 0.85s cubic-bezier(0.22, 1, 0.36, 1) forwards;
        animation-delay: calc(var(--i) * 180ms + 620ms);
    }
    .acend-checklist.is-visible .acend-check-path {
        stroke-dashoffset: 0;
    }
    .acend-checklist.is-visible .acend-check-label {
        background-size: 100% 60%;
    }
    @keyframes acend-burst {
        0%   { opacity: 0.65; transform: scale(1); }
        100% { opacity: 0;    transform: scale(2.2); }
    }
    @keyframes acend-heartbeat {
        0%, 88%, 100% { transform: scale(1) rotate(0); }
        92%           { transform: scale(1.12) rotate(-4deg); }
        96%           { transform: scale(0.98) rotate(3deg); }
    }
    .acend-check-item:hover .acend-check-box {
        transform: scale(1.15) rotate(-8deg);
        transition-duration: 0.28s;
        transition-delay: 0s;
        transition-timing-function: cubic-bezier(0.34, 1.7, 0.5, 1);
        animation-play-state: paused;
    }
    @media (prefers-reduced-motion: reduce) {
        .acend-checklist .acend-check-item,
        .acend-checklist .acend-check-box,
        .acend-checklist .acend-check-path,
        .acend-checklist .acend-check-label {
            opacity: 1;
            transform: none;
            stroke-dashoffset: 0;
            background-size: 100% 60%;
            animation: none !important;
            transition: none;
        }
    }

    .acend-typewriter .ac-char { visibility: hidden; }
    .acend-typewriter.is-done .ac-char { visibility: visible; }
    .acend-typewriter .ac-caret {
        display: inline-block;
        width: 0.08em;
        height: 0.95em;
        background-color: currentColor;
        vertical-align: -0.1em;
        margin-left: 0.02em;
        border-radius: 1px;
        opacity: 0;
    }
    .acend-typewriter.is-typing .ac-caret {
        opacity: 1;
        animation: acend-caret 0.9s steps(1) infinite;
    }
    .acend-typewriter.is-done .ac-caret { display: none; }
    @keyframes acend-caret {
        0%, 50%      { opacity: 1; }
        50.01%, 100% { opacity: 0; }
    }
    @media (prefers-reduced-motion: reduce) {
        .acend-typewriter .ac-char { visibility: visible; }
        .acend-typewriter .ac-caret { display: none; }
    }
</style>

<section class="py-10 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="lg:grid grid-cols-2 gap-12 lg:gap-20 items-center">

            {{-- Left Column --}}
            <div class="flex flex-col gap-5 lg:gap-6">
                <div class="acend-lettermark self-start flex gap-1.5 sm:gap-2 text-5xl sm:text-6xl lg:text-7xl"
                    aria-label="ACEND" role="img">
                    <span class="acend-letter" style="--on-color:#1e1e4e; --i:0" aria-hidden="true">A</span>
                    <span class="acend-letter" style="--on-color:#f26f1f; --i:1" aria-hidden="true">C</span>
                    <span class="acend-letter" style="--on-color:#1e1e4e; --i:2" aria-hidden="true">E</span>
                    <span class="acend-letter" style="--on-color:#10b981; --i:3" aria-hidden="true">N</span>
                    <span class="acend-letter" style="--on-color:#8b5cf6; --i:4" aria-hidden="true">D</span>
                </div>

                <h2 class="acend-typewriter acend-typewriter-title text-lg lg:text-2xl font-bold uppercase leading-tight text-balance max-w-xl text-accent dark:text-content">
                    Most Leadership Programs Inspire Change. Few Give You A System To Track, Scale, And Sustain It.
                </h2>

                <p class="acend-typewriter acend-typewriter-body text-base/loose opacity-70">
                    ACEND by WhyLead is the intelligence layer behind Thrive in the Middle. It's a competency
                    assessment tool that measures middle managers competency. It surfaces the risks holding performance
                    back, and the insights are translated into into clear, trackable growth plans, across individuals,
                    cohorts, and the organization.
                </p>

                <div>
                    <a href="https://acend.whyleadothers.com/landing" target="_blank" class="btn w-full md:w-auto">
                        Assess Your Middle Managers
                    </a>
                </div>

                <div class="mt-2">
                    <p class="text-[11px] font-bold uppercase tracking-widest opacity-40">Trusted by</p>
                    @include('partials.trusted-marquee')
                </div>
            </div>

            {{-- Right Column --}}
            <div class="flex flex-col gap-6 mt-8 lg:mt-0">
                <div class="-rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl flex items-center justify-center aspect-[2/1] relative">
                    <div class="relative rounded-xl overflow-hidden w-full h-full bg-neutral-300">
                        <img class="w-full h-full object-cover object-center"
                            src="{{ asset('img/uploads/acend-photo.jpg') }}" alt="ACEND participants" />
                    </div>
                </div>

                <p class="text-base/relaxed opacity-70">
                    ACEND gives senior leaders and HR teams a clear view of
                </p>

                <ul class="acend-checklist flex flex-col gap-4">
                    @foreach ([
                        'Where managers are underperforming',
                        'Where performance is plateauing',
                        'Where high-impact leaders are emerging',
                    ] as $i => $item)
                        <li class="acend-check-item flex items-center gap-3" style="--i: {{ $i }}">
                            <span
                                class="acend-check-box flex-none size-8 bg-primary text-white flex items-center justify-center rounded">
                                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                    stroke-width="3.5" stroke-linecap="round" stroke-linejoin="round">
                                    <path class="acend-check-path" d="M5 12.5l4.5 4.5L19 7.5" />
                                </svg>
                            </span>
                            <span class="acend-check-label font-bold uppercase tracking-wide">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>

                <div>
                    <a href="https://acend.whyleadothers.com/readiness" target="_blank" class="btn w-full md:w-auto">
                        Run The Free Readiness Assessment
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>

<script>
    (() => {
        const scope = document.currentScript.previousElementSibling;
        const list = scope.querySelector('.acend-checklist');
        const title = scope.querySelector('.acend-typewriter-title');
        const body = scope.querySelector('.acend-typewriter-body');
        const reduced = matchMedia('(prefers-reduced-motion: reduce)').matches;
        const canObserve = 'IntersectionObserver' in window;

        function wrap(el) {
            const text = el.textContent.replace(/\s+/g, ' ').trim();
            el.textContent = '';
            for (const ch of text) {
                const span = document.createElement('span');
                span.className = 'ac-char';
                span.textContent = ch;
                el.appendChild(span);
            }
            const caret = document.createElement('span');
            caret.className = 'ac-caret';
            caret.setAttribute('aria-hidden', 'true');
            el.insertBefore(caret, el.firstChild);
            return { chars: el.querySelectorAll('.ac-char'), caret };
        }

        function type(el, meta, speed) {
            return new Promise(resolve => {
                el.classList.add('is-typing');
                let i = 0;
                const { chars, caret } = meta;
                function tick() {
                    if (i >= chars.length) {
                        el.classList.remove('is-typing');
                        el.classList.add('is-done');
                        return resolve();
                    }
                    const ch = chars[i];
                    ch.style.visibility = 'visible';
                    ch.parentNode.insertBefore(caret, ch.nextSibling);
                    const c = ch.textContent;
                    const jitter = (Math.random() - 0.5) * speed * 0.5;
                    let pause = speed + jitter;
                    if (c === ' ') pause *= 0.7;
                    else if (/[,;:]/.test(c)) pause += 180;
                    else if (/[.!?]/.test(c)) pause += 320;
                    i++;
                    setTimeout(tick, Math.max(6, pause));
                }
                tick();
            });
        }

        // Setup: hide text immediately by wrapping chars (visibility:hidden per char keeps layout).
        const titleMeta = title ? wrap(title) : null;
        const bodyMeta = body ? wrap(body) : null;

        function revealChecklist() {
            if (list) list.classList.add('is-visible');
        }
        function revealTypewriter() {
            if (reduced) {
                title?.classList.add('is-done');
                body?.classList.add('is-done');
                return;
            }
            const seq = [];
            if (title && titleMeta) seq.push(() => type(title, titleMeta, 38));
            if (body && bodyMeta) seq.push(() => type(body, bodyMeta, 14));
            seq.reduce((p, fn) => p.then(fn), Promise.resolve());
        }

        if (!canObserve) {
            revealChecklist();
            revealTypewriter();
            return;
        }

        if (list) {
            const io1 = new IntersectionObserver((entries, obs) => {
                entries.forEach(e => {
                    if (e.isIntersecting) { revealChecklist(); obs.unobserve(e.target); }
                });
            }, { threshold: 0.35 });
            io1.observe(list);
        }

        const typeAnchor = title || body;
        if (typeAnchor) {
            const io2 = new IntersectionObserver((entries, obs) => {
                entries.forEach(e => {
                    if (e.isIntersecting) { revealTypewriter(); obs.unobserve(e.target); }
                });
            }, { threshold: 0.4 });
            io2.observe(typeAnchor);
        }
    })();
</script>
