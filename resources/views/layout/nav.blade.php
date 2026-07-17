@php
    /**
     * Parent-brand header configuration.
     *
     * `$wlCurrent` selects which platform this site represents. On the WhyLead
     * consultancy site it is "whylead" (shown beside the logo as "Consultancy").
     * ACEND / Thriving Boundlessly would set their own key on their own builds.
     *
     * NOTE: ACEND and Thriving Boundlessly URLs below are best-guess placeholders
     * — swap them for the real domains when confirmed.
     */
    $wlCurrent = $wlCurrent ?? 'whylead';

    $wlPlatforms = [
        'whylead' => [
            'label' => 'WhyLead',
            'here'  => 'Consultancy',
            'desc'  => 'Organizational transformation and advisory',
            'blurb' => 'Leadership programs, culture, team effectiveness, facilitation and organizational development.',
            'img'   => 'https://images.unsplash.com/photo-1531482615713-2afd69097998?q=80&w=640&auto=format&fit=crop',
            'url'   => 'https://whyleadothers.com',
            'cta'   => ['label' => 'Talk to WhyLead', 'url' => url('/contacts')],
        ],
        'acend' => [
            'label' => 'ACEND',
            'here'  => 'ACEND',
            'desc'  => 'Leadership intelligence for the middle',
            'blurb' => 'Assess, understand and develop the managers responsible for turning strategy into execution.',
            'img'   => 'https://images.unsplash.com/photo-1551288049-bebda4e38f71?q=80&w=640&auto=format&fit=crop',
            'url'   => 'https://acend.whyleadothers.com',
            'cta'   => ['label' => 'Assess Your Managers', 'url' => 'https://acend.whyleadothers.com'],
        ],
        'tb' => [
            'label' => 'Thriving Boundlessly',
            'here'  => 'Thriving Boundlessly',
            'desc'  => 'Performance intelligence',
            'blurb' => 'Turn fragmented people and performance data into better development, promotion, retention and succession decisions.',
            'img'   => 'https://images.unsplash.com/photo-1522071820081-009f0129c71c?q=80&w=640&auto=format&fit=crop',
            'url'   => 'https://www.thriveboundlessly.com',
            'cta'   => ['label' => 'Request a Demo', 'url' => 'https://www.thriveboundlessly.com'],
        ],
    ];

    $wlActive     = $wlPlatforms[$wlCurrent];
    $wlHereLabel  = $wlActive['here'];
    $wlCta        = $wlActive['cta'];
    $wlHomeUrl    = $wlPlatforms['whylead']['url'];

    // Global navigation — identical on every site. `tag` shows which platform
    // delivers an item; links that live off this site are absolute URLs.
    $wlNav = [
        'Solutions' => [
            ['label' => 'Strategy & Team Building Facilitation', 'url' => url('/consultancy/facilitation'),
             'desc' => 'Sessions and retreats that turn conversations into decisions.',
             'img' => 'https://images.unsplash.com/photo-1552664730-d307ca884978?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Explore facilitation',
             'icon' => 'M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z'],
            ['label' => 'Leadership Development Training', 'url' => url('/training'),
             'desc' => 'Programs that move leaders from knowledge to daily habits.',
             'img' => 'https://images.unsplash.com/photo-1517245386807-bb43f82c33c4?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Explore training',
             'icon' => 'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5'],
            ['label' => 'Performance Management', 'tag' => 'Thriving Boundlessly', 'url' => url('/thriving-boundlessly'),
             'desc' => 'A performance operating system for better people decisions.',
             'img' => 'https://images.unsplash.com/photo-1460925895917-afdab827c52f?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Discover Thriving Boundlessly',
             'icon' => 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z'],
            ['label' => 'Leadership Assessments', 'tag' => 'ACEND', 'url' => url('/acend'),
             'desc' => '360° leadership intelligence for your middle managers.',
             'img' => 'https://images.unsplash.com/photo-1454165804606-c3d57bc86b40?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Discover ACEND',
             'icon' => 'M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z'],
        ],
        'Ideas & Resources' => [
            ['label' => 'Leadership Podcast', 'url' => url('/podcast'),
             'desc' => 'Honest conversations on leading teams that thrive.',
             'img' => 'https://images.unsplash.com/photo-1590602847861-f357a9332bbc?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Browse episodes',
             'icon' => 'M12 18.75a6 6 0 0 0 6-6v-1.5m-6 7.5a6 6 0 0 1-6-6v-1.5m6 7.5v3.75m-3.75 0h7.5M12 15.75a3 3 0 0 1-3-3V4.5a3 3 0 1 1 6 0v8.25a3 3 0 0 1-3 3Z'],
            ['label' => 'Free Leadership Readiness Assessment', 'tag' => 'ACEND', 'url' => 'https://acend.whyleadothers.com/readiness',
             'desc' => 'A three-minute pulse on how ready a manager really is.',
             'img' => 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Take the assessment',
             'icon' => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z'],
            ['label' => 'Our Insights', 'url' => 'https://acend.whyleadothers.com/insights',
             'desc' => 'Articles and research from the WhyLead team.',
             'img' => 'https://images.unsplash.com/photo-1456324504439-367cee3b3c32?q=80&w=640&auto=format&fit=crop',
             'plink' => 'Read insights',
             'icon' => 'M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18'],
        ],
        // A group with a 'link' key is a direct link (no dropdown).
        'About' => ['link' => url('/about')],
    ];

    // Featured card on the right of each mega menu (images are Unsplash placeholders).
    $wlFeatured = [
        'Solutions' => [
            'kicker'  => 'Flagship program',
            'title'   => 'Thrive in the Middle',
            'caption' => 'A focused program for the managers who carry your strategy.',
            'link'    => 'Explore the program',
            'url'     => url('/thrive-in-the-middle'),
            'img'     => 'https://images.unsplash.com/photo-1524178232363-1fb2b075b655?q=80&w=640&auto=format&fit=crop',
        ],
        'Ideas & Resources' => [
            'kicker'  => 'Listen',
            'title'   => 'The Leadership Podcast',
            'caption' => 'Stories and lessons from leaders across East Africa.',
            'link'    => 'Browse episodes',
            'url'     => url('/podcast'),
            'img'     => 'https://images.unsplash.com/photo-1478737270239-2f02b77fc618?q=80&w=640&auto=format&fit=crop',
        ],
    ];

    $wlIsExternal = fn ($url) => str_starts_with($url, 'http');
@endphp

@php
    // Sun/moon icons reused by the desktop + mobile theme toggle.
    $wlThemeIcons = <<<'SVG'
        <svg class="wl-sun" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="4"/><path d="M12 2v2M12 20v2M4.93 4.93l1.41 1.41M17.66 17.66l1.41 1.41M2 12h2M20 12h2M6.34 17.66l-1.41 1.41M19.07 4.93l-1.41 1.41"/></svg>
        <svg class="wl-moon" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"/></svg>
    SVG;
@endphp

<style>
    #mainNavigationMenu {
        /* Header shares the site's canvas colour so there is no seam between
           the header and the content directly beneath it — one colour through,
           and it follows light / dark mode automatically. All colours come
           from the site's semantic tokens (style guide: /styleguide). */
        --wl-navy: rgb(var(--content-color));     /* primary text */
        --wl-orange: #F26B21;                     /* = primary */
        --wl-orange-dark: #D55612;                /* = primary-dark */
        --wl-warm: rgb(var(--canvas-color));      /* = page background */
        --wl-panel: rgb(var(--card-color));       /* dropdowns / pills / buttons */
        --wl-border: rgb(var(--stroke-color));
        --wl-muted: rgb(var(--content-color) / 0.55);
        --wl-hover: rgb(var(--content-color) / 0.05);
        --wl-tint: rgba(242, 107, 33, 0.09);

        position: sticky;
        top: 0;
        z-index: 60;
        background: var(--wl-warm);
        border-bottom: 1px solid transparent;
        transition: border-color .25s ease, box-shadow .25s ease;
    }

    /* On scroll: keep the exact same fill, only add a hairline + soft shadow
       so the bar separates from content without changing colour. */
    #mainNavigationMenu.wl-scrolled {
        border-bottom-color: var(--wl-border);
        box-shadow: 0 1px 2px rgb(var(--content-color) / 0.05);
    }

    .wl-inner {
        max-width: 80rem;
        margin: 0 auto;
        height: 74px;
        padding: 0 clamp(16px, 4vw, 40px);
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 20px;
    }

    /* ---- Brand lock-up ---- */
    .wl-brand { display: flex; align-items: center; gap: 14px; min-width: 0; }
    .wl-logo { display: inline-flex; align-items: center; color: var(--wl-navy); flex: none; }
    .wl-logo svg { height: 30px; width: auto; display: block; }
    .wl-divider { width: 1px; height: 26px; background: var(--wl-border); flex: none; }

    .wl-platform-btn {
        display: inline-flex; align-items: center; gap: 6px;
        background: transparent; border: 0; cursor: pointer;
        font: inherit; font-size: 13px; font-weight: 600; color: var(--wl-navy);
        text-transform: uppercase; letter-spacing: .06em;
        padding: 7px 9px; border-radius: 8px; transition: background .15s ease;
        white-space: nowrap;
    }
    .wl-platform-btn:hover { background: var(--wl-hover); }
    .wl-platform-btn svg { width: 15px; height: 15px; color: var(--wl-muted); transition: transform .2s ease; }

    /* ---- Center nav ---- */
    .wl-nav { display: flex; align-items: center; gap: 4px; }
    .wl-nav-trigger {
        display: inline-flex; align-items: center; gap: 5px;
        background: transparent; border: 0; cursor: pointer; font: inherit;
        font-size: 13px; font-weight: 600; color: var(--wl-navy);
        text-transform: uppercase; letter-spacing: .06em;
        padding: 9px 12px; border-radius: 8px; transition: color .15s ease, background .15s ease;
    }
    .wl-nav-trigger { text-decoration: none; }
    .wl-nav-trigger svg { width: 13px; height: 13px; color: var(--wl-muted); transition: transform .2s ease; }
    .wl-item:hover .wl-nav-trigger { color: var(--wl-orange); }
    .wl-item:hover .wl-nav-trigger svg { transform: rotate(180deg); color: var(--wl-orange); }
    .wl-nav-direct:hover { color: var(--wl-orange); }

    /* ---- Dropdown panels (desktop, hover/focus) ---- */
    .wl-item, .wl-switcher { position: relative; }
    .wl-pop {
        position: absolute; top: calc(100% + 10px); opacity: 0; visibility: hidden;
        transform: translateY(6px); transition: opacity .16s ease, transform .16s ease, visibility .16s;
        background: var(--wl-panel); border: 1px solid var(--wl-border); border-radius: 14px;
        box-shadow: 0 18px 40px -12px rgb(var(--content-color) / 0.18); padding: 8px; z-index: 70;
    }
    /* hover bridge so the pointer can cross the gap */
    .wl-pop::before { content: ""; position: absolute; top: -12px; left: 0; right: 0; height: 12px; }
    .wl-item:hover .wl-pop, .wl-item:focus-within .wl-pop,
    .wl-switcher:hover .wl-pop, .wl-switcher:focus-within .wl-pop {
        opacity: 1; visibility: visible; transform: translateY(0);
    }
    .wl-nav-pop { left: 50%; transform: translate(-50%, 6px); min-width: 320px; }
    .wl-item:hover .wl-nav-pop, .wl-item:focus-within .wl-nav-pop { transform: translate(-50%, 0); }

    .wl-tag {
        font-size: 11px; font-weight: 600; letter-spacing: .02em; color: var(--wl-muted);
        background: var(--wl-hover); padding: 3px 8px; border-radius: 999px; white-space: nowrap;
    }

    /* ---- Mega menu (Solutions / Ideas & Resources) ---- */
    .wl-mega { padding: 12px; }
    .wl-mega-grid { display: flex; gap: 12px; align-items: stretch; }
    .wl-mega-list { width: 490px; display: flex; flex-direction: column; gap: 2px; }
    .wl-mega-item {
        display: flex; align-items: flex-start; gap: 12px; padding: 11px 12px;
        border-radius: 11px; text-decoration: none; transition: background .13s ease;
    }
    .wl-mega-item:hover { background: var(--wl-hover); }
    .wl-mega-ico {
        flex: none; width: 34px; height: 34px; border-radius: 9px; margin-top: 1px;
        background: var(--wl-tint); color: var(--wl-orange);
        display: inline-flex; align-items: center; justify-content: center;
    }
    .wl-mega-ico svg { width: 18px; height: 18px; }
    .wl-mega-label {
        display: flex; align-items: center; gap: 8px; flex-wrap: wrap;
        font-size: 14px; font-weight: 600; color: var(--wl-navy); line-height: 1.25;
    }
    .wl-mega-desc { display: block; margin-top: 3px; font-size: 12.5px; line-height: 1.45; color: var(--wl-muted); }

    /* preview column on the right of the mega menu (default = featured card) */
    .wl-mega-preview { position: relative; width: 264px; flex: none; }

    /* ---- Platform switcher: list left, live preview right ---- */
    .wl-switch-pop { left: 0; width: 600px; padding: 12px; }
    .wl-switch-grid { display: flex; gap: 12px; align-items: stretch; }
    .wl-switch-list { width: 280px; flex: none; display: flex; flex-direction: column; gap: 2px; }
    .wl-switch {
        display: block; position: relative; padding: 12px 14px; border-radius: 11px;
        text-decoration: none; transition: background .13s ease;
    }
    .wl-switch:hover { background: var(--wl-hover); }
    .wl-switch-name { display: flex; align-items: center; gap: 8px; font-size: 14.5px; font-weight: 700; color: var(--wl-navy); }
    .wl-switch-desc { font-size: 12.5px; color: var(--wl-muted); margin-top: 2px; }
    .wl-switch.is-here { background: var(--wl-tint); }

    .wl-switch-preview { position: relative; flex: 1; min-width: 0; }
    .wl-preview {
        display: none; flex-direction: column; height: 100%;
        background: var(--wl-hover); border-radius: 12px; padding: 10px 12px 12px;
        text-decoration: none;
    }
    .wl-preview.is-shown { display: flex; animation: wlPreviewIn .18s ease; }
    @keyframes wlPreviewIn { from { opacity: 0; transform: translateY(3px); } to { opacity: 1; transform: none; } }
    .wl-preview-img {
        display: block; border-radius: 9px; overflow: hidden; aspect-ratio: 16 / 9;
        background: var(--wl-border);
    }
    .wl-preview-img img { width: 100%; height: 100%; object-fit: cover; display: block; }
    .wl-preview-kicker { margin-top: 10px; font-size: 10.5px; font-weight: 700; letter-spacing: .1em; text-transform: uppercase; color: var(--wl-muted); }
    .wl-preview-kicker + .wl-preview-title { margin-top: 3px; }
    .wl-preview-title { margin-top: 10px; font-size: 14.5px; font-weight: 700; color: var(--wl-navy); }
    .wl-preview-desc { margin-top: 3px; font-size: 12.5px; line-height: 1.45; color: var(--wl-muted); }
    .wl-preview-link { margin-top: auto; padding-top: 10px; font-size: 12.5px; font-weight: 600; color: var(--wl-orange); }
    .wl-here-pill {
        font-size: 10.5px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase;
        color: var(--wl-orange); background: var(--wl-panel); border: 1px solid rgba(242, 107, 33, 0.35);
        padding: 2px 7px; border-radius: 999px;
    }

    /* ---- CTA ---- */
    .wl-actions { display: flex; align-items: center; gap: 16px; flex: none; }
    .wl-secondary { font-size: 14px; font-weight: 500; color: var(--wl-muted); text-decoration: none; }
    .wl-secondary:hover { color: var(--wl-navy); }
    /* Matches the site .btn: uppercase tracked, primary → primary-dark, rounded-md */
    .wl-cta {
        display: inline-flex; align-items: center; gap: 8px; background: var(--wl-orange); color: #fff;
        font-size: 13px; font-weight: 600; text-transform: uppercase; letter-spacing: .04em;
        text-decoration: none; padding: 11px 16px; border-radius: 6px;
        border: 1px solid var(--wl-orange);
        transition: background .15s ease, transform .1s ease;
        white-space: nowrap;
    }
    .wl-cta:hover { background: var(--wl-orange-dark); }
    .wl-cta:active { transform: translateY(1px); }

    /* ---- Theme (light / dark) toggle ---- */
    .wl-theme {
        display: inline-flex; align-items: center; justify-content: center; flex: none;
        width: 40px; height: 40px; border: 1px solid var(--wl-border); border-radius: 10px;
        background: var(--wl-panel); color: var(--wl-navy); cursor: pointer; transition: background .15s ease;
    }
    .wl-theme:hover { background: var(--wl-hover); }
    .wl-theme svg { width: 18px; height: 18px; }
    body:not(.dark) .wl-moon { display: none; }
    body.dark .wl-sun { display: none; }

    /* ---- Mobile ---- */
    .wl-burger {
        display: none; align-items: center; justify-content: center; width: 42px; height: 42px;
        border: 1px solid var(--wl-border); border-radius: 11px; background: var(--wl-panel); color: var(--wl-navy); cursor: pointer;
    }
    .wl-burger svg { width: 20px; height: 20px; }
    .wl-mobile { display: none; }

    @media (max-width: 1023px) {
        .wl-nav, .wl-actions, .wl-divider { display: none; }
        .wl-burger { display: inline-flex; }
        .wl-platform-btn { pointer-events: none; }
        .wl-platform-btn svg { display: none; }

        .wl-mobile {
            display: block; position: fixed; inset: 74px 0 0; background: var(--wl-warm);
            overflow-y: auto; padding: 8px 20px 40px; z-index: 55;
            opacity: 0; visibility: hidden; transform: translateY(-8px);
            transition: opacity .2s ease, transform .2s ease, visibility .2s;
        }
        #mainNavigationMenu.wl-open .wl-mobile { opacity: 1; visibility: visible; transform: translateY(0); }

        .wl-m-home {
            display: inline-flex; align-items: center; gap: 6px; margin: 14px 0 6px;
            font-size: 14px; font-weight: 600; color: var(--wl-muted); text-decoration: none;
        }
        .wl-m-section { border-top: 1px solid var(--wl-border); padding: 18px 0 6px; }
        .wl-m-title { font-size: 12px; font-weight: 700; letter-spacing: .08em; text-transform: uppercase; color: var(--wl-muted); margin-bottom: 6px; }
        .wl-m-link {
            display: flex; align-items: center; justify-content: space-between; gap: 12px; padding: 11px 4px;
            font-size: 16px; font-weight: 600; color: var(--wl-navy); text-decoration: none;
        }
        .wl-m-link .wl-tag { font-size: 11px; font-weight: 600; color: var(--wl-muted); background: var(--wl-hover); padding: 3px 8px; border-radius: 999px; }
        .wl-m-switch { display: block; padding: 12px 14px; border-radius: 12px; border: 1px solid var(--wl-border); background: var(--wl-panel); margin-bottom: 8px; text-decoration: none; position: relative; }
        .wl-m-switch.is-here { background: var(--wl-tint); border-color: rgba(242,107,33,.3); }
        .wl-m-switch .wl-switch-name { justify-content: space-between; }
        .wl-m-cta { display: flex; justify-content: center; margin-top: 22px; }
        .wl-m-cta .wl-cta { width: 100%; justify-content: center; padding: 15px; font-size: 16px; }
        .wl-m-theme {
            display: flex; align-items: center; justify-content: space-between; width: 100%;
            padding: 4px 0; background: transparent; border: 0; cursor: pointer; font: inherit;
            font-size: 16px; font-weight: 600; color: var(--wl-navy);
        }
    }

    body.wl-menu-open { overflow: hidden; }
</style>

<section id="mainNavigationMenu" class="text-content">
    <div class="wl-inner">
        {{-- Brand lock-up: logo -> whyleadothers.com, product label -> switcher --}}
        <div class="wl-brand">
            <a href="{{ $wlHomeUrl }}" class="wl-logo" aria-label="WhyLead home">
                @include('common.logo', ['height' => 30])
            </a>
            <span class="wl-divider"></span>
            <div class="wl-switcher">
                <button type="button" class="wl-platform-btn" aria-haspopup="true">
                    {{ $wlHereLabel }}
                    <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
                </button>
                <div class="wl-pop wl-switch-pop" role="menu">
                    <div class="wl-switch-grid">
                        <div class="wl-switch-list">
                            @foreach ($wlPlatforms as $key => $p)
                                <a href="{{ $p['url'] }}" class="wl-switch {{ $key === $wlCurrent ? 'is-here' : '' }}"
                                    role="menuitem" data-preview-for="{{ $key }}">
                                    <span class="wl-switch-name">
                                        {{ $p['label'] }}
                                        @if ($key === $wlCurrent)
                                            <span class="wl-here-pill">You are here</span>
                                        @endif
                                    </span>
                                    <span class="wl-switch-desc">{{ $p['desc'] }}</span>
                                </a>
                            @endforeach
                        </div>
                        <div class="wl-switch-preview">
                            @foreach ($wlPlatforms as $key => $p)
                                <a href="{{ $p['url'] }}" class="wl-preview {{ $key === $wlCurrent ? 'is-shown' : '' }}" data-preview="{{ $key }}"
                                    @if ($key === $wlCurrent) data-default @endif
                                    @if ($wlIsExternal($p['url'])) target="_blank" rel="noopener" @endif>
                                    <span class="wl-preview-img"><img src="{{ $p['img'] }}" alt="{{ $p['label'] }}" loading="lazy" /></span>
                                    <span class="wl-preview-title">{{ $p['label'] }}</span>
                                    <span class="wl-preview-desc">{{ $p['blurb'] }}</span>
                                    <span class="wl-preview-link">{{ $p['cta']['label'] }} &rarr;</span>
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Center: global navigation --}}
        <nav class="wl-nav" aria-label="Primary">
            @foreach ($wlNav as $group => $items)
                @if (isset($items['link']))
                    <a href="{{ $items['link'] }}" class="wl-nav-trigger wl-nav-direct"
                        @if ($wlIsExternal($items['link'])) target="_blank" rel="noopener" @endif>
                        {{ $group }}
                    </a>
                @else
                    <div class="wl-item">
                        <button type="button" class="wl-nav-trigger" aria-haspopup="true">
                            {{ $group }}
                            <svg viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.17l3.71-3.94a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/></svg>
                        </button>
                        @php $gk = Str::slug($group); @endphp
                        <div class="wl-pop wl-nav-pop wl-mega" role="menu">
                            <div class="wl-mega-grid">
                                <div class="wl-mega-list">
                                    @foreach ($items as $i => $item)
                                        <a href="{{ $item['url'] }}" class="wl-mega-item" role="menuitem"
                                            data-preview-for="{{ $gk }}-{{ $i }}"
                                            @if ($wlIsExternal($item['url'])) target="_blank" rel="noopener" @endif>
                                            <span class="wl-mega-ico" aria-hidden="true">
                                                <svg fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $item['icon'] }}" /></svg>
                                            </span>
                                            <span class="min-w-0">
                                                <span class="wl-mega-label">
                                                    {{ $item['label'] }}
                                                    @isset($item['tag'])<span class="wl-tag">{{ $item['tag'] }}</span>@endisset
                                                </span>
                                                <span class="wl-mega-desc">{{ $item['desc'] }}</span>
                                            </span>
                                        </a>
                                    @endforeach
                                </div>

                                <div class="wl-mega-preview">
                                    @isset($wlFeatured[$group])
                                        @php $f = $wlFeatured[$group]; @endphp
                                        <a href="{{ $f['url'] }}" class="wl-preview is-shown" data-preview="{{ $gk }}-feat" data-default
                                            @if ($wlIsExternal($f['url'])) target="_blank" rel="noopener" @endif>
                                            <span class="wl-preview-img"><img src="{{ $f['img'] }}" alt="{{ $f['title'] }}" loading="lazy" /></span>
                                            <span class="wl-preview-kicker">{{ $f['kicker'] }}</span>
                                            <span class="wl-preview-title">{{ $f['title'] }}</span>
                                            <span class="wl-preview-desc">{{ $f['caption'] }}</span>
                                            <span class="wl-preview-link">{{ $f['link'] }} &rarr;</span>
                                        </a>
                                    @endisset
                                    @foreach ($items as $i => $item)
                                        <a href="{{ $item['url'] }}" class="wl-preview" data-preview="{{ $gk }}-{{ $i }}"
                                            @if ($wlIsExternal($item['url'])) target="_blank" rel="noopener" @endif>
                                            <span class="wl-preview-img"><img src="{{ $item['img'] }}" alt="{{ $item['label'] }}" loading="lazy" /></span>
                                            <span class="wl-preview-kicker">{{ $item['tag'] ?? 'WhyLead' }}</span>
                                            <span class="wl-preview-title">{{ $item['label'] }}</span>
                                            <span class="wl-preview-desc">{{ $item['desc'] }}</span>
                                            <span class="wl-preview-link">{{ $item['plink'] }} &rarr;</span>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endforeach
        </nav>

        {{-- Right: theme toggle + contextual CTA --}}
        <div class="wl-actions">
            <button type="button" class="wl-theme" onclick="toggleReadingMode()" aria-label="Toggle light / dark mode">
                {!! $wlThemeIcons !!}
            </button>
            <a href="{{ $wlCta['url'] }}" class="wl-cta"
                @if ($wlIsExternal($wlCta['url'])) target="_blank" rel="noopener" @endif>
                {{ $wlCta['label'] }}
            </a>
        </div>

        {{-- Mobile trigger --}}
        <button type="button" class="wl-burger" onclick="wlToggleMenu()" aria-label="Menu" aria-expanded="false">
            <svg class="wl-icon-open" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"/></svg>
            <svg class="wl-icon-close" style="display:none" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
    </div>

    {{-- Mobile menu --}}
    <div class="wl-mobile">
        <a href="{{ $wlHomeUrl }}" class="wl-m-home">&larr; WhyLead Home</a>

        <div class="wl-m-section" style="border-top:0">
            <div class="wl-m-title">Platforms</div>
            @foreach ($wlPlatforms as $key => $p)
                <a href="{{ $p['url'] }}" class="wl-m-switch {{ $key === $wlCurrent ? 'is-here' : '' }}">
                    <span class="wl-switch-name">
                        {{ $p['label'] }}
                        @if ($key === $wlCurrent)<span class="wl-here-pill">You are here</span>@endif
                    </span>
                    <span class="wl-switch-desc">{{ $p['desc'] }}</span>
                </a>
            @endforeach
        </div>

        @foreach ($wlNav as $group => $items)
            @if (isset($items['link']))
                <div class="wl-m-section">
                    <a href="{{ $items['link'] }}" class="wl-m-link" style="font-size:17px"
                        @if ($wlIsExternal($items['link'])) target="_blank" rel="noopener" @endif>
                        <span>{{ $group }}</span>
                    </a>
                </div>
            @else
                <div class="wl-m-section">
                    <div class="wl-m-title">{{ $group }}</div>
                    @foreach ($items as $item)
                        <a href="{{ $item['url'] }}" class="wl-m-link"
                            @if ($wlIsExternal($item['url'])) target="_blank" rel="noopener" @endif>
                            <span>{{ $item['label'] }}</span>
                            @isset($item['tag'])<span class="wl-tag">{{ $item['tag'] }}</span>@endisset
                        </a>
                    @endforeach
                </div>
            @endif
        @endforeach

        <div class="wl-m-cta">
            <a href="{{ $wlCta['url'] }}" class="wl-cta" @if ($wlIsExternal($wlCta['url'])) target="_blank" rel="noopener" @endif>
                {{ $wlCta['label'] }}
            </a>
        </div>

        <div class="wl-m-section">
            <button type="button" class="wl-m-theme" onclick="toggleReadingMode()">
                <span>Appearance</span>
                <span class="wl-theme" aria-hidden="true">{!! $wlThemeIcons !!}</span>
            </button>
        </div>
    </div>
</section>

<script>
    (function () {
        const header = document.getElementById('mainNavigationMenu');
        const burger = header.querySelector('.wl-burger');
        const iconOpen = header.querySelector('.wl-icon-open');
        const iconClose = header.querySelector('.wl-icon-close');

        // Sticky blur once the page is scrolled.
        const onScroll = () => header.classList.toggle('wl-scrolled', window.scrollY > 4);
        onScroll();
        window.addEventListener('scroll', onScroll, { passive: true });

        // Mobile menu toggle.
        window.wlToggleMenu = function () {
            const open = header.classList.toggle('wl-open');
            document.body.classList.toggle('wl-menu-open', open);
            burger.setAttribute('aria-expanded', open ? 'true' : 'false');
            iconOpen.style.display = open ? 'none' : 'block';
            iconClose.style.display = open ? 'block' : 'none';
        };

        // Dropdown previews: hovering a list item swaps that panel's preview
        // card; leaving the menu restores its default card.
        header.querySelectorAll('.wl-pop').forEach((pop) => {
            const previews = pop.querySelectorAll('.wl-preview');
            if (!previews.length) return;
            const show = (key) => previews.forEach((p) => p.classList.toggle('is-shown', p.dataset.preview === key));
            const fallback = pop.querySelector('.wl-preview[data-default]') || previews[0];
            pop.querySelectorAll('[data-preview-for]').forEach((item) => {
                item.addEventListener('mouseenter', () => show(item.dataset.previewFor));
            });
            const root = pop.closest('.wl-item, .wl-switcher') || pop;
            root.addEventListener('mouseleave', () => show(fallback.dataset.preview));
        });
    })();
</script>

{{-- Preserve site dark-mode initialisation (the visible theme toggle was removed
     from the header per the redesign, but content dark mode still respects the
     stored / system preference). --}}
<script>
    (function () {
        function systemTheme() {
            return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
        }
        function setDarkMode(value, auto) {
            document.body.classList.toggle('dark', value == null ? systemTheme() : value);
            if (value == null) {
                window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', e => setDarkMode(e.matches, true));
            }
            if (!auto) {
                if (value == null) window.localStorage.removeItem('in-dark-mode');
                else window.localStorage.setItem('in-dark-mode', value);
            }
        }
        window.setDarkMode = setDarkMode;
        window.toggleReadingMode = function () {
            const newValue = !document.body.classList.contains('dark');
            setDarkMode(newValue == systemTheme() ? null : newValue);
        };
        if (window.localStorage.getItem('in-dark-mode') == null) setDarkMode(null, true);
        else setDarkMode(window.localStorage.getItem('in-dark-mode') != 'false');
    })();
</script>
