@php
    /**
     * Ecosystem footer — a shared closing statement for the WhyLead system.
     *
     * The same component is dropped into WhyLead Consultancy, ACEND and
     * Thriving Boundlessly. `$wlCurrent` (set the same way the header uses it)
     * decides which platform gets the "You are here" marker and the
     * contextual CTA. If unset, we default to the WhyLead parent brand.
     */
    $wlCurrent = $wlCurrent ?? 'whylead';

    $wfPlatforms = [
        'whylead' => [
            'label'       => 'WhyLead',
            'tagline'     => 'Organisational transformation, leadership development, facilitation, coaching, and culture work.',
            'url'         => 'https://whyleadothers.com',
            'mark_class'  => 'wf-mark--whylead',
            'contextual_cta' => ['label' => 'Talk to WhyLead', 'url' => url('/contacts')],
        ],
        'acend' => [
            'label'       => 'ACEND',
            'tagline'     => 'Leadership intelligence for middle managers.',
            'url'         => 'https://acend.whyleadothers.com',
            'mark_class'  => 'wf-mark--acend',
            'contextual_cta' => ['label' => 'Assess your managers', 'url' => 'https://acend.whyleadothers.com'],
        ],
        'tb' => [
            'label'       => 'Thriving Boundlessly',
            'tagline'     => 'Performance intelligence for better people decisions.',
            'url'         => 'https://www.thriveboundlessly.com',
            'mark_class'  => 'wf-mark--tb',
            'contextual_cta' => ['label' => 'Request a demo', 'url' => 'https://www.thriveboundlessly.com'],
        ],
    ];

    $wfActive = $wfPlatforms[$wlCurrent] ?? $wfPlatforms['whylead'];
    $wfContextualCta = $wfActive['contextual_cta'];

    $wfIsExternal = fn ($url) => ($h = parse_url($url, PHP_URL_HOST)) && $h !== request()->getHost();
    $wfYear = now()->year;
@endphp

{{-- Fonts used only inside the footer (loaded here to keep the change scoped). --}}
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=JetBrains+Mono:wght@400;500;600&display=swap" rel="stylesheet">

<style>
    #wlFooter {
        /* Deep navy panel, always dark — this is the site's closing statement,
           independent of the reading canvas above it. */
        --wf-navy: #0B1330;
        --wf-navy-2: #0F1B3D;
        --wf-indigo: #1a1c4a;
        --wf-orange: #E8521A;
        --wf-orange-strong: #ff6a2b;
        --wf-white: #F5F1EA;
        --wf-warm: #ffffff;
        --wf-muted: #8b95a8;
        --wf-muted-strong: #b6bfd0;
        --wf-border: rgba(255,255,255,0.09);
        --wf-border-strong: rgba(255,255,255,0.18);
        --wf-panel: rgba(255,255,255,0.03);
        --wf-panel-hover: rgba(255,255,255,0.055);
        --wf-tint: rgba(232,82,26,0.12);

        position: relative;
        isolation: isolate;
        background: var(--wf-navy);
        color: var(--wf-white);
        font-family: "Inter", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        font-size: 15px;
        line-height: 1.55;
        overflow: hidden;
    }

    /* Radial orange glow drifts across the deep navy — restrained, mostly
       hidden behind the composition. */
    #wlFooter::before {
        content: "";
        position: absolute; inset: -20% -10% -30% -10%;
        background:
            radial-gradient(60% 55% at 12% 8%, rgba(232,82,26,0.16) 0%, rgba(232,82,26,0) 65%),
            radial-gradient(45% 50% at 88% 100%, rgba(60,74,180,0.28) 0%, rgba(60,74,180,0) 60%),
            linear-gradient(180deg, var(--wf-navy) 0%, var(--wf-navy-2) 55%, #0a1330 100%);
        z-index: -2;
        opacity: 1;
        pointer-events: none;
    }

    /* Faint structural grid lines. */
    #wlFooter::after {
        content: "";
        position: absolute; inset: 0;
        background:
            linear-gradient(90deg, rgba(255,255,255,0.03) 1px, transparent 1px) 0 0/72px 100%,
            linear-gradient(180deg, rgba(255,255,255,0.02) 1px, transparent 1px) 0 0/100% 72px;
        z-index: -1;
        pointer-events: none;
        mask-image: radial-gradient(120% 120% at 50% 30%, #000 30%, transparent 85%);
        -webkit-mask-image: radial-gradient(120% 120% at 50% 30%, #000 30%, transparent 85%);
    }

    #wlFooter a { color: inherit; text-decoration: none; }
    #wlFooter :focus-visible {
        outline: 2px solid var(--wf-orange);
        outline-offset: 3px;
        border-radius: 6px;
    }

    .wf-inner {
        max-width: 1520px;
        margin: 0 auto;
        padding: clamp(40px, 5vw, 64px) clamp(22px, 5vw, 56px) 0;
    }

    /* ---------- Typography helpers ---------- */
    .wf-label {
        font-family: "JetBrains Mono", ui-monospace, SFMono-Regular, Menlo, monospace;
        font-size: 11px;
        font-weight: 500;
        letter-spacing: 0.14em;
        text-transform: uppercase;
        color: var(--wf-muted);
    }
    .wf-h,
    .wf-headline {
        font-family: "Hanken Grotesk", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        color: var(--wf-warm);
        line-height: 1.14;
        letter-spacing: -0.015em;
    }
    .wf-headline {
        font-size: clamp(30px, 3.4vw, 46px);
        font-weight: 600;
        max-width: 640px;
        margin: 22px 0 20px;
    }
    .wf-lead {
        color: var(--wf-muted-strong);
        font-size: 15.5px;
        line-height: 1.65;
        max-width: 560px;
    }
    .wf-lead + .wf-lead { margin-top: 14px; }

    /* ---------- Actions ---------- */
    .wf-cta {
        display: inline-flex; align-items: center; gap: 10px;
        background: var(--wf-orange); color: #fff;
        font-family: "Inter", sans-serif;
        font-size: 14px; font-weight: 600; letter-spacing: 0.005em;
        padding: 12px 20px; border-radius: 10px;
        box-shadow: 0 1px 0 rgba(255,255,255,0.06) inset, 0 10px 24px -14px rgba(232,82,26,0.7);
        transition: background .18s ease, transform .1s ease, box-shadow .18s ease;
    }
    .wf-cta:hover { background: var(--wf-orange-strong); box-shadow: 0 1px 0 rgba(255,255,255,0.08) inset, 0 14px 30px -14px rgba(232,82,26,0.75); }
    .wf-cta:active { transform: translateY(1px); }
    .wf-cta .wf-arrow { transition: transform .2s ease; }
    .wf-cta:hover .wf-arrow { transform: translateX(3px); }

    .wf-textlink {
        display: inline-flex; align-items: center; gap: 8px;
        color: var(--wf-white);
        font-weight: 500; font-size: 14px;
        border-bottom: 1px solid rgba(255,255,255,0.15);
        padding-bottom: 3px;
        transition: color .18s ease, border-color .18s ease, transform .18s ease;
    }
    .wf-textlink:hover { color: var(--wf-orange-strong); border-color: var(--wf-orange-strong); }
    .wf-textlink .wf-arrow { transition: transform .2s ease; }
    .wf-textlink:hover .wf-arrow { transform: translateX(3px); }

    /* ---------- Layer 1: Brand statement + ecosystem ---------- */
    .wf-layer-brand {
        display: grid;
        grid-template-columns: minmax(0, 1.15fr) minmax(0, 1fr);
        gap: clamp(40px, 6vw, 88px);
        align-items: start;
        padding-bottom: clamp(28px, 3vw, 40px);
    }
    .wf-brand-actions {
        display: flex; align-items: center; gap: 22px;
        margin-top: 28px;
        flex-wrap: wrap;
    }

    /* Ecosystem card */
    .wf-eco {
        position: relative;
        background: linear-gradient(180deg, rgba(255,255,255,0.04) 0%, rgba(255,255,255,0.015) 100%);
        border: 1px solid var(--wf-border);
        border-radius: 20px;
        padding: 28px 28px 20px;
        backdrop-filter: blur(2px);
    }
    .wf-eco-head {
        display: flex; align-items: center; justify-content: space-between;
        margin-bottom: 22px;
    }
    .wf-eco-parent {
        font-family: "JetBrains Mono", monospace;
        font-size: 10.5px; font-weight: 500; letter-spacing: 0.16em; text-transform: uppercase;
        color: var(--wf-muted);
    }
    .wf-eco-list { display: flex; flex-direction: column; gap: 8px; }
    .wf-eco-card {
        display: grid;
        grid-template-columns: 44px 1fr auto;
        align-items: center;
        gap: 16px;
        padding: 16px 16px 16px 14px;
        border: 1px solid var(--wf-border);
        background: rgba(255,255,255,0.02);
        border-radius: 14px;
        transition: background .18s ease, border-color .18s ease, transform .18s ease;
    }
    .wf-eco-card:hover {
        background: var(--wf-panel-hover);
        border-color: var(--wf-border-strong);
    }
    .wf-eco-card.is-here {
        background: var(--wf-tint);
        border-color: rgba(232,82,26,0.35);
    }
    .wf-eco-mark {
        width: 44px; height: 44px;
        border-radius: 12px;
        display: flex; align-items: center; justify-content: center;
        font-family: "JetBrains Mono", monospace;
        font-size: 14px; font-weight: 600;
        letter-spacing: 0.02em;
        flex: none;
    }
    .wf-mark--whylead {
        background: linear-gradient(135deg, var(--wf-orange) 0%, #c94210 100%);
        color: #fff;
    }
    .wf-mark--acend {
        background: rgba(255,255,255,0.06);
        color: var(--wf-white);
        border: 1px solid var(--wf-border-strong);
    }
    .wf-mark--tb {
        background: rgba(255,255,255,0.03);
        color: var(--wf-orange-strong);
        border: 1px solid rgba(232,82,26,0.4);
    }
    .wf-eco-body { min-width: 0; }
    .wf-eco-name {
        display: flex; align-items: center; gap: 10px; flex-wrap: wrap;
        color: var(--wf-warm);
        font-family: "Hanken Grotesk", sans-serif;
        font-size: 16px; font-weight: 600; letter-spacing: -0.005em;
        line-height: 1.2;
    }
    .wf-eco-desc {
        color: var(--wf-muted-strong);
        font-size: 13px; line-height: 1.5;
        margin-top: 4px;
    }
    .wf-here-pill {
        font-family: "JetBrains Mono", monospace;
        font-size: 9.5px; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
        color: var(--wf-orange-strong);
        border: 1px solid rgba(232,82,26,0.4);
        padding: 2px 8px 3px;
        border-radius: 999px;
    }
    .wf-eco-arrow {
        color: var(--wf-muted);
        transition: color .18s ease, transform .2s ease;
    }
    .wf-eco-card:hover .wf-eco-arrow { color: var(--wf-orange-strong); transform: translateX(3px); }

    .wf-eco-note {
        margin-top: 18px;
        padding-top: 18px;
        border-top: 1px solid var(--wf-border);
        font-size: 12.5px;
        color: var(--wf-muted);
    }
    .wf-eco-note strong { color: var(--wf-muted-strong); font-weight: 600; }

    /* Divider between layers */
    .wf-divider {
        height: 1px;
        background: linear-gradient(90deg, transparent 0%, var(--wf-border-strong) 12%, var(--wf-border-strong) 88%, transparent 100%);
        border: 0; margin: 0;
    }


    /* ---------- Layer 3: Podcast ---------- */
    .wf-podcast-wrap { padding: 18px 0 clamp(20px, 2.5vw, 32px); }
    .wf-podcast-label { margin-bottom: 12px; }

    .wf-podcast {
        display: grid;
        grid-template-columns: 120px minmax(0, 1fr) auto;
        gap: 24px;
        align-items: center;
        padding: 18px 22px 18px 18px;
        border: 1px solid var(--wf-border);
        background: linear-gradient(180deg, rgba(255,255,255,0.045) 0%, rgba(255,255,255,0.02) 100%);
        border-radius: 18px;
        transition: border-color .2s ease, background .2s ease, box-shadow .25s ease;
        position: relative;
    }
    .wf-podcast::before {
        content: "";
        position: absolute; inset: 0;
        border-radius: 18px;
        pointer-events: none;
        box-shadow: inset 0 0 0 1px transparent;
        transition: box-shadow .25s ease;
    }
    .wf-podcast:hover {
        border-color: rgba(232,82,26,0.35);
        background: linear-gradient(180deg, rgba(255,255,255,0.06) 0%, rgba(255,255,255,0.025) 100%);
        box-shadow: 0 20px 44px -24px rgba(0,0,0,0.5);
    }
    .wf-podcast-art {
        position: relative;
        width: 120px; height: 120px;
        border-radius: 12px;
        overflow: hidden;
        flex: none;
        background: #0a0f24;
        border: 1px solid var(--wf-border);
        transition: transform .3s ease;
    }
    .wf-podcast-art img {
        width: 100%; height: 100%; object-fit: cover;
        display: block;
    }
    .wf-podcast:hover .wf-podcast-art { transform: scale(1.02); }

    .wf-podcast-body { min-width: 0; }
    .wf-podcast-meta {
        display: inline-flex; align-items: center; gap: 10px;
        font-family: "JetBrains Mono", monospace;
        font-size: 10.5px; font-weight: 500; letter-spacing: 0.12em; text-transform: uppercase;
        color: var(--wf-muted);
        margin-bottom: 8px;
    }
    .wf-podcast-meta .wf-dot {
        width: 3px; height: 3px; border-radius: 50%;
        background: var(--wf-muted); display: inline-block;
    }
    .wf-podcast-title {
        color: var(--wf-warm);
        font-family: "Hanken Grotesk", sans-serif;
        font-size: 19px; font-weight: 600; line-height: 1.3;
        letter-spacing: -0.005em;
        margin-bottom: 6px;
    }
    .wf-podcast-excerpt {
        color: var(--wf-muted-strong);
        font-size: 14px; line-height: 1.55;
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .wf-podcast-actions {
        display: flex; flex-direction: column; align-items: flex-end; gap: 8px;
        flex: none;
    }
    .wf-podcast-play {
        display: inline-flex; align-items: center; gap: 8px;
        color: var(--wf-warm);
        font-family: "Hanken Grotesk", sans-serif;
        font-size: 14px; font-weight: 600;
        transition: color .18s ease;
    }
    .wf-podcast:hover .wf-podcast-play { color: var(--wf-orange-strong); }
    .wf-podcast-play .wf-arrow { transition: transform .2s ease; }
    .wf-podcast:hover .wf-podcast-play .wf-arrow { transform: translateX(3px); }
    .wf-podcast-browse {
        font-family: "JetBrains Mono", monospace;
        font-size: 11px; font-weight: 500; letter-spacing: 0.08em; text-transform: uppercase;
        color: var(--wf-muted);
        transition: color .18s ease;
    }
    .wf-podcast-browse:hover { color: var(--wf-white); }

    /* Full-card link overlay (keeps sub-links accessible above it). */
    .wf-podcast-stretch {
        position: absolute; inset: 0;
        border-radius: 18px;
    }
    .wf-podcast-browse,
    .wf-podcast-play { position: relative; z-index: 2; }

    /* Legal bar */
    .wf-legal {
        padding: 20px 0 26px;
        display: flex; align-items: center; justify-content: space-between;
        gap: 18px; flex-wrap: wrap;
        border-top: 1px solid var(--wf-border);
    }
    .wf-legal-left {
        display: flex; align-items: center; gap: 14px; flex-wrap: wrap;
        font-family: "JetBrains Mono", monospace;
        font-size: 11.5px; font-weight: 400; letter-spacing: 0.06em;
        color: var(--wf-muted);
    }
    .wf-legal-left a:hover { color: var(--wf-white); }
    .wf-legal-right { display: flex; align-items: center; gap: 8px; }
    .wf-social {
        display: inline-flex; align-items: center; justify-content: center;
        width: 34px; height: 34px;
        color: var(--wf-muted);
        border: 1px solid var(--wf-border);
        border-radius: 9px;
        transition: color .18s ease, border-color .18s ease, background .18s ease;
    }
    .wf-social:hover { color: var(--wf-white); border-color: var(--wf-border-strong); background: var(--wf-panel-hover); }
    .wf-social svg { width: 15px; height: 15px; }

    /* ---------- Entrance animation ---------- */
    .wf-reveal {
        opacity: 0;
        transform: translateY(14px);
        transition: opacity .55s ease, transform .55s cubic-bezier(.2,.7,.2,1);
    }
    .wf-reveal.is-visible {
        opacity: 1;
        transform: translateY(0);
    }
    .wf-reveal[data-delay="1"] { transition-delay: .06s; }
    .wf-reveal[data-delay="2"] { transition-delay: .12s; }
    .wf-reveal[data-delay="3"] { transition-delay: .18s; }
    .wf-reveal[data-delay="4"] { transition-delay: .24s; }
    .wf-reveal[data-delay="5"] { transition-delay: .32s; }

    @media (prefers-reduced-motion: reduce) {
        .wf-reveal, .wf-podcast-art, .wf-cta, .wf-textlink, .wf-eco-card, .wf-col-link {
            transition: none !important;
            transform: none !important;
        }
        .wf-reveal { opacity: 1 !important; }
    }

    /* ---------- Responsive ---------- */
    @media (max-width: 900px) {
        .wf-layer-brand {
            grid-template-columns: 1fr;
            gap: 40px;
        }
    }

    @media (max-width: 640px) {
        #wlFooter { font-size: 14.5px; }
        .wf-inner { padding-left: 20px; padding-right: 20px; }
        .wf-eco { padding: 22px 20px 16px; }
        .wf-eco-card { grid-template-columns: 40px 1fr auto; padding: 14px 12px; gap: 12px; }
        .wf-eco-mark { width: 40px; height: 40px; }
        .wf-brand-actions { gap: 16px; }

        .wf-podcast {
            grid-template-columns: 88px 1fr;
            grid-template-rows: auto auto;
            padding: 14px 16px 16px 14px;
            gap: 16px;
        }
        .wf-podcast-art { width: 88px; height: 88px; }
        .wf-podcast-actions {
            grid-column: 1 / -1;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
            padding-top: 4px;
            border-top: 1px solid var(--wf-border);
            margin-top: 4px;
            padding-top: 12px;
        }

        .wf-legal {
            flex-direction: column;
            align-items: flex-start;
            gap: 16px;
            padding: 24px 0 28px;
        }
    }
</style>

<footer id="wlFooter" role="contentinfo" aria-labelledby="wlFooterHeading">
    <div class="wf-inner">

        {{-- ============================================================
             Layer 1 — Closing brand statement + ecosystem card
        ============================================================ --}}
        <section class="wf-layer-brand" aria-labelledby="wlFooterHeading">
            <div class="wf-brand-copy">
                <div class="wf-reveal" data-delay="0">
                    <div class="wf-label">WHYLEAD — LEADERSHIP &amp; PERFORMANCE SYSTEMS</div>
                    <h2 id="wlFooterHeading" class="wf-headline">
                        Build the leadership and performance systems that make strategy work.
                    </h2>
                    <p class="wf-lead">
                        WhyLead helps organisations develop stronger leaders, healthier teams,
                        more effective cultures, and clearer performance systems.
                    </p>
                    <p class="wf-lead">
                        Through advisory, facilitation, leadership development, coaching, ACEND
                        and Thriving Boundlessly, we help organisations move from isolated
                        interventions to measurable, sustained change.
                    </p>
                    <div class="wf-brand-actions">
                        <a href="{{ $wfContextualCta['url'] }}" class="wf-cta"
                            @if ($wfIsExternal($wfContextualCta['url'])) target="_blank" rel="noopener" @endif>
                            {{ $wfContextualCta['label'] }}
                            <svg class="wf-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                        <a href="{{ url('/consultancy') }}" class="wf-textlink">
                            Explore how we work
                            <svg class="wf-arrow" width="12" height="12" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </a>
                    </div>
                </div>
            </div>

            <aside class="wf-eco wf-reveal" data-delay="2" aria-label="The WhyLead system">
                <div class="wf-eco-head">
                    <span class="wf-eco-parent">THE WHYLEAD SYSTEM</span>
                    <span class="wf-eco-parent" style="color: var(--wf-muted-strong);">Parent brand</span>
                </div>

                <div class="wf-eco-list">
                    @foreach ($wfPlatforms as $key => $p)
                        @php
                            $isHere = $key === $wlCurrent;
                            $markInitial = ['whylead' => 'W', 'acend' => 'A', 'tb' => 'T'][$key] ?? '';
                        @endphp
                        <a href="{{ $p['url'] }}"
                            class="wf-eco-card {{ $isHere ? 'is-here' : '' }}"
                            @if (! $isHere && $wfIsExternal($p['url'])) target="_blank" rel="noopener" @endif
                            aria-label="{{ $p['label'] }} — {{ $p['tagline'] }}{{ $isHere ? ' (you are here)' : '' }}">
                            <span class="wf-eco-mark {{ $p['mark_class'] }}" aria-hidden="true">
                                {{ $markInitial }}
                            </span>
                            <span class="wf-eco-body">
                                <span class="wf-eco-name">
                                    {{ $p['label'] }}
                                    @if ($isHere)
                                        <span class="wf-here-pill">You are here</span>
                                    @endif
                                </span>
                                <span class="wf-eco-desc">{{ $p['tagline'] }}</span>
                            </span>
                            <svg class="wf-eco-arrow" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M7 17L17 7M9 7h8v8"/></svg>
                        </a>
                    @endforeach
                </div>

                <p class="wf-eco-note">
                    <strong>WhyLead</strong> is the parent brand. ACEND and Thriving Boundlessly
                    are the intelligence layers behind the work.
                </p>
            </aside>
        </section>

        <hr class="wf-divider" aria-hidden="true">

        {{-- ============================================================
             Latest podcast episode (dynamic via @pierdata)
        ============================================================ --}}
        <section class="wf-podcast-wrap wf-reveal" data-delay="4" aria-label="Latest podcast episode">
            @pierdata(["model" => "Podcast", "first" => true])
                @php $episode = $data; @endphp

                <div class="wf-podcast-label wf-label">LATEST FROM THE WHYLEAD PODCAST</div>

                <div class="wf-podcast">
                    <a href="{{ url('/podcast/' . $episode->slug) }}"
                        class="wf-podcast-stretch"
                        aria-label="Listen to episode {{ str_pad($episode->number, 3, '0', STR_PAD_LEFT) }}: {{ $episode->title }}"></a>

                    <div class="wf-podcast-art">
                        <img src="{{ $episode->image }}"
                            alt="Episode {{ $episode->number }}: {{ $episode->title }} — cover art"
                            loading="lazy" decoding="async" />
                    </div>

                    <div class="wf-podcast-body">
                        <div class="wf-podcast-meta">
                            <span>EP {{ str_pad($episode->number, 3, '0', STR_PAD_LEFT) }}</span>
                            @if (! empty($episode->featuring))
                                <span class="wf-dot"></span>
                                <span>FT. {{ strtoupper($episode->featuring) }}</span>
                            @endif
                            @if (! empty($episode->date))
                                <span class="wf-dot"></span>
                                <span>{{ \Carbon\Carbon::parse($episode->date)->format('M Y') }}</span>
                            @endif
                        </div>
                        <div class="wf-podcast-title">{{ $episode->title }}</div>
                        @if (! empty($episode->description))
                            <p class="wf-podcast-excerpt">
                                {{ \Illuminate\Support\Str::limit(strip_tags($episode->description), 180) }}
                            </p>
                        @endif
                    </div>

                    <div class="wf-podcast-actions">
                        <span class="wf-podcast-play">
                            Listen to the episode
                            <svg class="wf-arrow" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M5 12h14M13 5l7 7-7 7"/></svg>
                        </span>
                        <a href="{{ url('/podcast') }}" class="wf-podcast-browse">Browse all episodes</a>
                    </div>
                </div>
            @endpierdata()
        </section>

        {{-- Legal bar --}}
        <div class="wf-legal">
            <div class="wf-legal-left">
                <span>© {{ $wfYear }} WhyLead Consultancy. All rights reserved.</span>
                <a href="{{ url('/about') }}">Privacy</a>
                <a href="{{ url('/about') }}">Terms</a>
            </div>
            <div class="wf-legal-right">
                <a class="wf-social" href="https://www.linkedin.com/company/whyleadconsultancy" target="_blank" rel="noopener" aria-label="WhyLead on LinkedIn">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/></svg>
                </a>
                <a class="wf-social" href="https://www.instagram.com/whyleadothers" target="_blank" rel="noopener" aria-label="WhyLead on Instagram">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077"/></svg>
                </a>
                <a class="wf-social" href="https://twitter.com/whyleadothers" target="_blank" rel="noopener" aria-label="WhyLead on X">
                    <svg viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"><path d="M13.3174 10.7749L19.1457 4H17.7646L12.7039 9.88256L8.66193 4H4L10.1122 12.8955L4 20H5.38119L10.7254 13.7878L14.994 20H19.656L13.3171 10.7749zM11.4257 12.9738L10.8064 12.0881L5.87886 5.03974H8.00029L11.9769 10.728L12.5962 11.6137L17.7652 19.0075H15.6438L11.4257 12.9742z"/></svg>
                </a>
            </div>
        </div>

    </div>

    <script>
        (function () {
            var footer = document.getElementById('wlFooter');
            if (!footer) return;

            var reduced = window.matchMedia && window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var targets = footer.querySelectorAll('.wf-reveal');

            if (reduced || !('IntersectionObserver' in window)) {
                targets.forEach(function (el) { el.classList.add('is-visible'); });
                return;
            }

            var io = new IntersectionObserver(function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        io.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -60px 0px' });

            targets.forEach(function (el) { io.observe(el); });
        })();
    </script>
</footer>
