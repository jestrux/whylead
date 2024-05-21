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
        transform: scale(0.6);
    }

    .slide-image.second {
        transform: scale(0.55);
    }

    .slide-image.third {
        transform: scale(0.6);
    }

    .slide-image.fourth {
        transform: scale(0.55);
    }

    @media (max-width: 1023px) {
        .slide-image {
            top: auto;
            bottom: 0;
            transform-origin: bottom;
        }
    }

    @media (min-width: 1024px) {
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
            transform: scale(1) translate(-5rem, 0rem);
        }

        .slide-image.third {
            transform: scale(0.9) translate(-2rem, 0rem);
        }

        .slide-image.fourth {
            transform: scale(0.9) translate(-5rem, -2rem);
        }
    }
</style>

<section class="px-4 md:px-0 relative">
    <div class="w-full max-w-[1400px] mx-auto px-6 py-12">
        <div class="px-8 max-w-7xl mx-auto lg:grid grid-cols-2 h-screen max-h-[50vh] lg:max-h-[65vh]"
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
            <div class="flex items-center justify-center relative" style="perspective: 2500px; ">
                <div class="absolute inset-0 flex items-center justify-center">
                    <div class="relative h-full flex items-start py-4">
                        <span class="text-accent dark:text-content/80 text-[500px]/none lg:text-[620px]/none"
                            style="font-family: 'Rocket', sans-serif;">
                            NO
                        </span>

                        <div x-cloak class="absolute top-28 lg:top-40 h-10 lg:h-16 inset-x-0"
                            style="transform: rotate3d(0, 1, 0, 20deg);">
                            <div class="relative w-full h-full cube transition-transform duration-1000"
                                x-bind:style="`transform: rotateX(${90*index}deg);`">
                                <template x-for="(phrase, index) in phrases">
                                    <div x-cloak
                                        class="face absolute inset-0 text-accent dark:text-content/80 px-3 bg-canvas flex items-center justify-between text-xl lg:text-3xl uppercase"
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
                            class="text-accent dark:text-content/80 absolute top-40 h-16 inset-x-0 px-3 bg-canvas flex items-center justify-between text-xl lg:text-3xl uppercase"
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

            <div class="flex items-center justify-center">
                <img class="absolute h-5/6 lg:h-full transition-transform duration-1000 slide-image"
                    x-bind:src="`{{ asset('img/banner/') }}/${index + 1}.png`" alt=""
                    x-bind:class="{ 'second': index == 1, 'third': index == 2, 'fourth': index == 3 }" />
            </div>
        </div>
    </div>
</section>

<section class="px-6 mt-8 lg:mt-0">
    <div class="flex flex-col items-center justify-center">
        <div class="max-w-2xl mx-auto mb-7 text-center">
            <h2 class="text-2xl/none lg:text-3xl/none font-bold">
                <span class="uppercase tracking-wide">
                    <span class="font-light text-primary">Trusted </span>
                    Globally
                </span>
            </h2>
        </div>

        <div class="max-w-5xl mx-auto flex flex-wrap gap-6 lg:gap-8 items-center justify-center">
            <img class="grayscale h-6" src="{{ asset('img/clients/malala.svg') }}" />

            <img class="grayscale h-12" src="{{ asset('img/clients/women-lift.png') }}" />

            <img class="grayscale h-10" src="{{ asset('img/clients/crdb.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/oryx.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/jane-goodall.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/ubongo.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/rti.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/vodacom.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/knauf.svg') }}" />

            <img class="grayscale h-6" src="{{ asset('img/clients/uongozi.svg') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/d-tree.png') }}" />

            <img class="grayscale h-14" src="{{ asset('img/clients/ifakara.png') }}" />

            <img class="grayscale h-5" src="{{ asset('img/clients/dot.png') }}" />

            <img class="grayscale h-8" src="{{ asset('img/clients/nest.webp') }}" />
        </div>
    </div>
</section>
