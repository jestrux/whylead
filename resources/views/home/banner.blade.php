<style>
    .cube {
        transform-style: preserve-3d;
    }

    .face {
        backface-visibility: hidden;
        transform: translateZ(20px);
    }

    .face.second {
        transform: rotateX(-90deg) translateZ(20px)
    }

    .face.third {
        transform: rotateX(-180deg) translateZ(20px)
    }

    .face.fourth {
        transform: rotateX(-270deg) translateZ(20px)
    }

    .slide-image {
        transform: scale(0.7) translate(0, 3rem);
    }

    .slide-image.second {
        transform: scale(0.8) translate(0, 4rem);
    }

    .slide-image.third {
        transform: scale(0.75) translate(0, 3rem);
    }

    .slide-image.fourth {
        transform: scale(0.7) translate(0, 2rem);
    }

    @media (max-width: 767px) {
        .slide-image {
            top: auto;
            bottom: 0;
            transform-origin: bottom;
            object-fit: contain;
        }
    }

    @media (min-width: 768px) {
        .face {
            transform: translateZ(30px);
        }

        .face.second {
            transform: rotateX(-90deg) translateZ(30px)
        }

        .face.third {
            transform: rotateX(-180deg) translateZ(30px)
        }

        .face.fourth {
            transform: rotateX(-270deg) translateZ(30px)
        }

        .slide-image {
            transform: scale(0.9) translate(-5rem, 0rem);
        }

        .slide-image.second {
            transform: scale(0.9) translate(-2rem, 0.5rem);
        }

        .slide-image.third {
            transform: scale(0.95) translate(-5rem, 1.5rem);
        }

        .slide-image.fourth {
            transform: scale(1) translate(-4rem, 0rem);
        }
    }
</style>

<section class="px-4 md:px-0 relative">
    <div class="max-w-lg mx-auto overflow-hidden absolute inset-x-0">
        @foreach ([1, 2, 3, 4] as $item)
            <img class="absolute top-0 h-full" src="{{ asset('img/banner/img' . $item . '.png') }}"
                alt="" />
        @endforeach
    </div>

    <div class="w-full max-w-[1400px] mx-auto px-6 py-12 bg-canvas z-10 relative">
        <div class="px-8 max-w-7xl mx-auto md:grid grid-cols-2 h-screen max-h-[50vh] md:max-h-[65vh]"
            x-data="{
                index: 0,
                phrases: [
                    { image: '{{ asset('img/banner.png') }}', label: 'fear&nbsp;of&nbsp;change' },
                    { image: '{{ asset('img/banner.png') }}', label: 'Leadership&nbsp;fog' },
                    { image: '{{ asset('img/banner.png') }}', label: 'team&nbsp;discord' },
                    { image: '{{ asset('img/banner.png') }}', label: 'strategic&nbsp;drift' },
                ],
                get phrase() {
                    return this.phrases[this.index].label;
                },
                init() {
                    setInterval(() => {
                        this.index = this.index == this.phrases.length - 1 ? 0 : this.index + 1;
                    }, 3000)
                }
            }">
            <div class="flex items-center justify-center relative md:z-10" style="perspective: 2500px; ">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="relative h-full flex items-start py-4">
                        <span class="text-accent dark:text-content/80 text-[500px]/none md:text-[620px]/none"
                            style="font-family: 'Rocket', sans-serif;">
                            NO
                        </span>

                        <div x-cloak class="absolute top-28 md:top-40 h-10 md:h-16 inset-x-0"
                            style="transform: rotate3d(0, 1, 0, 20deg);">
                            <div class="relative w-full h-full cube transition-transform duration-1000"
                                x-bind:style="`transform: rotateX(${90*index}deg);`">
                                <template x-for="(phrase, index) in phrases">
                                    <div x-cloak
                                        class="face absolute inset-0 text-accent dark:text-content/80 px-3 bg-canvas flex items-center justify-between text-xl md:text-3xl uppercase"
                                        x-bind:class="{ 'second': index == 1, 'third': index == 2, 'fourth': index == 3 }"
                                        style="font-family: 'Rocket', sans-serif;">
                                        <template x-for="letter in phrase.label.split('')">
                                            <span x-html="letter"></span>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-show="false"
                            class="text-accent dark:text-content/80 absolute top-40 h-16 inset-x-0 px-3 bg-canvas flex items-center justify-between text-xl md:text-3xl uppercase"
                            style="font-family: 'Rocket', sans-serif">
                            <span>F</span>
                            <span>E</span>
                            <span>A</span>
                            <span>R</span>
                            <span>&nbsp;</span>
                            <span>O</span>
                            <span>F</span>
                            <span>&nbsp;</span>
                            <span>C</span>
                            <span>H</span>
                            <span>A</span>
                            <span>N</span>
                            <span>G</span>
                            <span>E</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-center bg-canvass">
                <img class="absolute h-5/6 md:h-full transition-transform duration-1000 slide-image"
                    x-bind:src="`{{ asset('img/banner/') }}/img${index + 1}.png`" alt=""
                    x-bind:class="{ 'second': index == 1, 'third': index == 2, 'fourth': index == 3 }" />
            </div>
        </div>
    </div>
</section>

<section class="px-6 mt-8 md:mt-12 mb-10 overflow-hidden">
    <div class="max-w-7xl mx-auto">
        {{-- Line 1: centered heading + tagline --}}
        <div class="text-center mb-5">
            <h2 class="text-2xl/none md:text-3xl/none font-bold">
                <span class="uppercase tracking-wide">
                    <span class="font-light text-primary">Trusted </span>
                    Globally
                </span>
            </h2>
            <p class="mt-2 text-[11px] md:text-xs text-content/60 uppercase tracking-[0.18em]">
                Across 12 industries and 3 continents
            </p>
        </div>

        @php
            // Two marquee rows. Each row = [ ['sector' => 'X', 'logos' => [...]], ... ].
            // Circled anchors (CRDB, Oryx, Ifakara, RTI) lead their industry groups.
            // A logo entry is either a real image (has 'src') or a text wordmark (has 'text').
            // Replace text entries with real images by adding an 'src' pointing at public/img/clients/…
            $rowA = [
                ['sector' => 'Banking',    'logos' => [['src' => 'img/clients/crdb.png',    'alt' => 'CRDB Bank',     'h' => 'h-8']]],
                ['sector' => 'Energy',     'logos' => [['src' => 'img/clients/oryx.png',    'alt' => 'Oryx Energies', 'h' => 'h-7']]],
                ['sector' => 'Mining',     'logos' => [['src' => 'img/clients/rida.png',    'alt' => 'RIDA',          'h' => 'h-8']]],
                ['sector' => 'Industry',   'logos' => [['src' => 'img/clients/knauf.svg',   'alt' => 'Knauf',         'h' => 'h-6']]],
                ['sector' => 'Shipping',   'logos' => [['src' => 'img/clients/cma-cgm.png', 'alt' => 'CMA CGM',       'h' => 'h-8']]],
                ['sector' => 'Telecom',    'logos' => [['src' => 'img/clients/vodacom.png', 'alt' => 'Vodacom',       'h' => 'h-7']]],
            ];
            $rowB = [
                ['sector' => 'Public Health', 'logos' => [
                    ['src' => 'img/clients/ifakara.png',    'alt' => 'Ifakara Health Institute', 'h' => 'h-10'],
                    ['src' => 'img/clients/women-lift.png', 'alt' => 'WomenLift Health',         'h' => 'h-8'],
                    ['src' => 'img/clients/d-tree.png',     'alt' => 'D-tree',                   'h' => 'h-7'],
                    ['src' => 'img/clients/nest.webp',      'alt' => 'NEST360',                  'h' => 'h-7'],
                ]],
                ['sector' => 'Development', 'logos' => [
                    ['src' => 'img/clients/rti.png',        'alt' => 'RTI International',        'h' => 'h-7'],
                    ['src' => 'img/clients/dot.png',        'alt' => 'Digital Opportunity Trust','h' => 'h-5'],
                    ['src' => 'img/clients/jane-goodall.png','alt' => 'Jane Goodall Institute',  'h' => 'h-7'],
                ]],
                ['sector' => 'Education', 'logos' => [
                    ['src' => 'img/clients/malala.svg',     'alt' => 'Malala Fund',              'h' => 'h-6'],
                    ['src' => 'img/clients/ubongo.png',     'alt' => 'Ubongo',                   'h' => 'h-7'],
                    ['src' => 'img/clients/uongozi.svg',    'alt' => 'Uongozi Institute',        'h' => 'h-6'],
                    ['src' => 'img/clients/haus.png',       'alt' => 'HAUS Finland',             'h' => 'h-7'],
                ]],
            ];
        @endphp

        {{-- Lines 2 & 3: two marquees, opposite directions, seamless loop --}}
        @foreach ([['groups' => $rowA, 'dir' => 'left', 'dur' => '55s'], ['groups' => $rowB, 'dir' => 'right', 'dur' => '65s']] as $row)
            <div class="tg-marquee group py-3 first:border-t first:border-stroke border-b border-stroke relative">
                {{-- edge fades --}}
                <div class="pointer-events-none absolute inset-y-0 left-0 w-16 md:w-24 z-10 bg-gradient-to-r from-canvas to-transparent"></div>
                <div class="pointer-events-none absolute inset-y-0 right-0 w-16 md:w-24 z-10 bg-gradient-to-l from-canvas to-transparent"></div>

                <div class="tg-track flex items-center gap-x-10 md:gap-x-14 whitespace-nowrap w-max"
                     style="animation: tg-scroll-{{ $row['dir'] }} {{ $row['dur'] }} linear infinite;">
                    @for ($copy = 0; $copy < 2; $copy++)
                        @foreach ($row['groups'] as $i => $group)
                            <div class="flex items-baseline gap-x-4 md:gap-x-5 shrink-0" aria-hidden="{{ $copy === 1 ? 'true' : 'false' }}">
                                <span class="text-xs md:text-sm font-semibold uppercase tracking-[0.16em] text-content/50 shrink-0">
                                    {{ $group['sector'] }}
                                </span>
                                <span class="text-content/25 shrink-0 font-light select-none" aria-hidden="true">/</span>
                                <div class="flex items-center gap-x-6 md:gap-x-8 shrink-0">
                                    @foreach ($group['logos'] as $logo)
                                        @if (isset($logo['src']))
                                            <img
                                                class="grayscale opacity-80 group-hover:opacity-100 group-hover:grayscale-0 transition-opacity duration-500 shrink-0 {{ $logo['h'] }}"
                                                src="{{ asset($logo['src']) }}"
                                                alt="{{ $copy === 0 ? $logo['alt'] : '' }}"
                                                loading="lazy"
                                            />
                                        @else
                                            <span
                                                class="text-content/80 font-bold tracking-[0.06em] text-lg md:text-xl shrink-0 opacity-80 group-hover:opacity-100 transition-opacity duration-500"
                                                aria-label="{{ $copy === 0 ? $logo['alt'] : '' }}"
                                            >{{ $logo['text'] }}</span>
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
</section>

@once
    <style>
        @keyframes tg-scroll-left  { from { transform: translate3d(0, 0, 0); }   to { transform: translate3d(-50%, 0, 0); } }
        @keyframes tg-scroll-right { from { transform: translate3d(-50%, 0, 0); } to { transform: translate3d(0, 0, 0); } }
        .tg-marquee { overflow: hidden; }
        .tg-marquee:hover .tg-track { animation-play-state: paused; }
        @media (prefers-reduced-motion: reduce) {
            .tg-track { animation: none !important; transform: translate3d(-25%, 0, 0); }
        }
    </style>
@endonce
