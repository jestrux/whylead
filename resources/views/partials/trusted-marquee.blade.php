@php
    $trustedGroups = [
        ['sector' => 'Banking',       'logos' => [['src' => 'img/clients/crdb.png',        'alt' => 'CRDB Bank',                'h' => 'h-7']]],
        ['sector' => 'Telecom',       'logos' => [['src' => 'img/clients/vodacom.png',     'alt' => 'Vodacom',                  'h' => 'h-6']]],
        ['sector' => 'Public Health', 'logos' => [
            ['src' => 'img/clients/ifakara.png',    'alt' => 'Ifakara Health Institute', 'h' => 'h-8'],
            ['src' => 'img/clients/women-lift.png', 'alt' => 'WomenLift Health',         'h' => 'h-7'],
            ['src' => 'img/clients/nest.webp',      'alt' => 'NEST360',                  'h' => 'h-6'],
        ]],
        ['sector' => 'Education',     'logos' => [
            ['src' => 'img/clients/malala.svg',     'alt' => 'Malala Fund',              'h' => 'h-5'],
            ['src' => 'img/clients/ubongo.png',     'alt' => 'Ubongo',                   'h' => 'h-6'],
            ['src' => 'img/clients/uongozi.svg',    'alt' => 'Uongozi Institute',        'h' => 'h-5'],
        ]],
        ['sector' => 'Energy',        'logos' => [['src' => 'img/clients/oryx.png',        'alt' => 'Oryx Energies',            'h' => 'h-6']]],
        ['sector' => 'Mining',        'logos' => [['src' => 'img/clients/rida.png',        'alt' => 'RIDA',                     'h' => 'h-7']]],
        ['sector' => 'Industry',      'logos' => [['src' => 'img/clients/knauf.svg',       'alt' => 'Knauf',                    'h' => 'h-5']]],
        ['sector' => 'Shipping',      'logos' => [['src' => 'img/clients/cma-cgm.png',     'alt' => 'CMA CGM',                  'h' => 'h-7']]],
        ['sector' => 'Development',   'logos' => [
            ['src' => 'img/clients/rti.png',        'alt' => 'RTI International',        'h' => 'h-6'],
            ['src' => 'img/clients/dot.png',        'alt' => 'Digital Opportunity Trust','h' => 'h-4'],
            ['src' => 'img/clients/jane-goodall.png','alt' => 'Jane Goodall Institute',  'h' => 'h-6'],
        ]],
    ];
@endphp

<div class="tg-marquee-sm group mt-4 py-1 relative">
    <div class="pointer-events-none absolute inset-y-0 left-0 w-10 z-10 bg-gradient-to-r from-canvas to-transparent"></div>
    <div class="pointer-events-none absolute inset-y-0 right-0 w-10 z-10 bg-gradient-to-l from-canvas to-transparent"></div>

    <div class="tg-track-sm flex items-center gap-x-8 whitespace-nowrap w-max"
         style="animation: tg-scroll-left 60s linear infinite;">
        @for ($copy = 0; $copy < 2; $copy++)
            @foreach ($trustedGroups as $group)
                <div class="flex items-baseline gap-x-3 shrink-0" aria-hidden="{{ $copy === 1 ? 'true' : 'false' }}">
                    <span class="text-[10px] font-bold uppercase tracking-[0.16em] text-primary shrink-0">
                        {{ $group['sector'] }}
                    </span>
                    <span class="text-primary/40 shrink-0 font-light select-none" aria-hidden="true">/</span>
                    <div class="flex items-center gap-x-5 shrink-0">
                        @foreach ($group['logos'] as $logo)
                            <img
                                class="{{ $logo['h'] }} w-auto object-contain grayscale opacity-70 group-hover:opacity-100 group-hover:grayscale-0 transition-opacity duration-500 shrink-0"
                                src="{{ asset($logo['src']) }}"
                                alt="{{ $copy === 0 ? $logo['alt'] : '' }}"
                                loading="lazy"
                            />
                        @endforeach
                    </div>
                </div>
            @endforeach
        @endfor
    </div>
</div>

@once
    <style>
        @keyframes tg-scroll-left { from { transform: translate3d(0, 0, 0); } to { transform: translate3d(-50%, 0, 0); } }
        .tg-marquee-sm { overflow: hidden; }
        .tg-marquee-sm:hover .tg-track-sm { animation-play-state: paused; }
        @media (prefers-reduced-motion: reduce) {
            .tg-track-sm { animation: none !important; transform: translate3d(-25%, 0, 0); }
        }
    </style>
@endonce
