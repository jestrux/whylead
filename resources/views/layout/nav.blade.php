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
            'url'   => 'https://whyleadothers.com',
            'cta'   => ['label' => 'Talk to WhyLead', 'url' => url('/contacts')],
        ],
        'acend' => [
            'label' => 'ACEND',
            'here'  => 'ACEND',
            'desc'  => 'Leadership intelligence for the middle',
            'blurb' => 'Assess, understand and develop the managers responsible for turning strategy into execution.',
            'url'   => 'https://acend.whyleadothers.com',
            'cta'   => ['label' => 'Assess Your Managers', 'url' => 'https://acend.whyleadothers.com'],
        ],
        'tb' => [
            'label' => 'Thriving Boundlessly',
            'here'  => 'Thriving Boundlessly',
            'desc'  => 'Performance intelligence',
            'blurb' => 'Turn fragmented people and performance data into better development, promotion, retention and succession decisions.',
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
            ['label' => 'Strategy Team Building Facilitation',              'url' => url('/consultancy')],
            ['label' => 'Leadership Development Training',                  'url' => url('/consultancy')],
            ['label' => 'Performance Management', 'tag' => 'Thriving Boundlessly', 'url' => 'https://www.thriveboundlessly.com'],
            ['label' => 'Leadership Assessments', 'tag' => 'ACEND',               'url' => 'https://acend.whyleadothers.com'],
        ],
        'Ideas & Resources' => [
            ['label' => 'Leadership Podcast',                        'url' => 'https://whyleadothers.com/podcast'],
            ['label' => 'Free Leadership Readiness Assessment', 'tag' => 'ACEND', 'url' => 'https://acend.whyleadothers.com/readiness'],
            ['label' => 'Our Insights',                             'url' => 'https://acend.whyleadothers.com/insights'],
        ],
        // A group with a 'link' key is a direct link (no dropdown).
        'About' => ['link' => url('/about')],
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
           and it follows light / dark mode automatically. */
        --wl-navy: #0F1B3D;                       /* primary text (light) */
        --wl-orange: #E8521A;
        --wl-warm: rgb(var(--canvas-color));      /* = page background */
        --wl-panel: rgb(var(--card-color));       /* dropdowns / pills / buttons */
        --wl-border: rgb(var(--stroke-color));
        --wl-muted: #667085;
        --wl-hover: rgba(15, 27, 61, 0.05);
        --wl-tint: rgba(232, 82, 26, 0.09);

        position: sticky;
        top: 0;
        z-index: 60;
        background: var(--wl-warm);
        border-bottom: 1px solid transparent;
        font-family: "Hanken Grotesk", -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
        transition: border-color .25s ease, box-shadow .25s ease;
    }

    body.dark #mainNavigationMenu {
        --wl-navy: #ffffff;
        --wl-muted: #9aa4b2;
        --wl-hover: rgba(255, 255, 255, 0.07);
    }

    /* On scroll: keep the exact same fill, only add a hairline + soft shadow
       so the bar separates from content without changing colour. */
    #mainNavigationMenu.wl-scrolled {
        border-bottom-color: var(--wl-border);
        box-shadow: 0 1px 2px rgba(15, 27, 61, 0.05);
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
        font: inherit; font-size: 15px; font-weight: 600; color: var(--wl-navy);
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
        font-size: 15px; font-weight: 500; color: var(--wl-navy);
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
        box-shadow: 0 18px 40px -12px rgba(15, 27, 61, 0.22); padding: 8px; z-index: 70;
    }
    /* hover bridge so the pointer can cross the gap */
    .wl-pop::before { content: ""; position: absolute; top: -12px; left: 0; right: 0; height: 12px; }
    .wl-item:hover .wl-pop, .wl-item:focus-within .wl-pop,
    .wl-switcher:hover .wl-pop, .wl-switcher:focus-within .wl-pop {
        opacity: 1; visibility: visible; transform: translateY(0);
    }
    .wl-nav-pop { left: 50%; transform: translate(-50%, 6px); min-width: 320px; }
    .wl-item:hover .wl-nav-pop, .wl-item:focus-within .wl-nav-pop { transform: translate(-50%, 0); }

    .wl-link {
        display: flex; align-items: center; justify-content: space-between; gap: 16px;
        padding: 11px 14px; border-radius: 10px; color: var(--wl-navy);
        font-size: 14.5px; font-weight: 500; text-decoration: none; transition: background .13s ease;
    }
    .wl-link:hover { background: var(--wl-hover); }
    .wl-link .wl-tag {
        font-size: 11px; font-weight: 600; letter-spacing: .02em; color: var(--wl-muted);
        background: var(--wl-hover); padding: 3px 8px; border-radius: 999px; white-space: nowrap;
    }

    /* ---- Platform switcher ---- */
    .wl-switch-pop { left: 0; width: 340px; }
    .wl-switch {
        display: block; position: relative; padding: 12px 14px 12px 16px; border-radius: 11px;
        text-decoration: none; transition: background .13s ease;
    }
    .wl-switch:hover { background: var(--wl-hover); }
    .wl-switch-name { display: flex; align-items: center; gap: 8px; font-size: 14.5px; font-weight: 700; color: var(--wl-navy); }
    .wl-switch-desc { font-size: 12.5px; color: var(--wl-muted); margin-top: 2px; }
    .wl-switch.is-here { background: var(--wl-tint); }
    .wl-switch.is-here::before {
        content: ""; position: absolute; left: 5px; top: 14px; bottom: 14px; width: 3px;
        border-radius: 3px; background: var(--wl-orange);
    }
    .wl-here-pill {
        font-size: 10.5px; font-weight: 700; letter-spacing: .04em; text-transform: uppercase;
        color: var(--wl-orange); background: var(--wl-panel); border: 1px solid rgba(232, 82, 26, 0.35);
        padding: 2px 7px; border-radius: 999px;
    }

    /* ---- CTA ---- */
    .wl-actions { display: flex; align-items: center; gap: 16px; flex: none; }
    .wl-secondary { font-size: 14px; font-weight: 500; color: var(--wl-muted); text-decoration: none; }
    .wl-secondary:hover { color: var(--wl-navy); }
    .wl-cta {
        display: inline-flex; align-items: center; gap: 8px; background: var(--wl-orange); color: #fff;
        font-size: 14.5px; font-weight: 600; text-decoration: none; padding: 11px 20px; border-radius: 10px;
        box-shadow: 0 1px 2px rgba(232, 82, 26, 0.25); transition: background .15s ease, transform .1s ease;
        white-space: nowrap;
    }
    .wl-cta:hover { background: #cf460f; }
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
        .wl-m-link .wl-tag { font-size: 11px; font-weight: 600; color: var(--wl-muted); background: rgba(15,27,61,.05); padding: 3px 8px; border-radius: 999px; }
        .wl-m-switch { display: block; padding: 12px 14px; border-radius: 12px; border: 1px solid var(--wl-border); background: var(--wl-panel); margin-bottom: 8px; text-decoration: none; position: relative; }
        .wl-m-switch.is-here { background: var(--wl-tint); border-color: rgba(232,82,26,.3); }
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
                    @foreach ($wlPlatforms as $key => $p)
                        <a href="{{ $p['url'] }}" class="wl-switch {{ $key === $wlCurrent ? 'is-here' : '' }}" role="menuitem">
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
                        <div class="wl-pop wl-nav-pop" role="menu">
                            @foreach ($items as $item)
                                <a href="{{ $item['url'] }}" class="wl-link" role="menuitem"
                                    @if ($wlIsExternal($item['url'])) target="_blank" rel="noopener" @endif>
                                    <span>{{ $item['label'] }}</span>
                                    @isset($item['tag'])
                                        <span class="wl-tag">{{ $item['tag'] }}</span>
                                    @endisset
                                </a>
                            @endforeach
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
