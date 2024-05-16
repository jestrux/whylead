<style>
    .cube {
        transform-style: preserve-3d;
    }

    .face {
        backface-visibility: hidden;
        transform: translateZ(30px);
    }
</style>

<section class="px-4 md:px-0 relative">
    <div class="w-full max-w-[1400px] mx-auto px-6 py-12">
        <div class="px-8 max-w-7xl mx-auto grid grid-cols-2" x-data="{
            index: 0,
            phrases: [
                { image: '{{ asset('img/banner.png') }}', label: 'fear&nbsp;of&nbsp;change' },
                { image: '{{ asset('img/banner.png') }}', label: 'worry&nbsp;or&nbsp;fear' },
                { image: '{{ asset('img/banner.png') }}', label: 'slow&nbsp;days' },
                { image: '{{ asset('img/banner.png') }}', label: 'disconnect' },
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
                        <span class="text-accent dark:text-content/80"
                            style="font-size: 620px; line-height: 1; font-family: 'Rocket', sans-serif;">
                            NO
                        </span>

                        <div x-cloak class="absolute top-40 h-16 inset-x-0"
                            style="transform: rotate3d(0, 1, 0, 20deg);">
                            <div class="relative w-full h-full cube transition-transform duration-1000"
                                x-bind:style="`transform: rotateX(${90*index}deg);`">
                                <template x-for="(phrase, index) in phrases">
                                    <div x-cloak
                                        class="face absolute inset-0 text-accent dark:text-content/80 px-3 bg-canvas flex items-center justify-between text-3xl uppercase"
                                        style="font-family: 'Rocket', sans-serif;"
                                        x-bind:style="index > 0 && `transform: rotateX(-${90*index}deg) translateZ(30px)`">
                                        <template x-for="letter in phrase.label.split('')">
                                            <span x-html="letter"></span>
                                        </template>
                                    </div>
                                </template>
                            </div>
                        </div>

                        <div x-show="false"
                            class="text-accent dark:text-content/80 absolute top-40 h-16 inset-x-0 px-3 bg-canvas flex items-center justify-between text-3xl uppercase"
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
            <div class="flex items-center justify-center h-screen max-h-[65vh]">
                <img class="absolute h-full transition-transform duration-1000"
                    x-bind:src="`{{ asset('img/banner/') }}/${index + 1}.png`" alt=""
                    x-bind:style="index == 0 ? 'transform: scale(0.9) translate(-5rem, 0rem)' :
                        index == 1 ? 'transform: scale(1) translate(-5rem, 0rem)' :
                        index == 2 ? 'transform: scale(0.9) translate(-2rem, 0rem)' :
                        'transform: scale(0.9) translate(-5rem, -2rem)'" />
            </div>
        </div>
    </div>
</section>

<section class="px-6">
    <div class="flex flex-col items-center justify-center">
        <div class="max-w-2xl mx-auto mb-7 text-center">
            <h2 class="text-2xl/none lg:text-3xl/none font-bold">
                <span class="uppercase tracking-wide">
                    <span class="font-light text-primary">Trusted </span>
                    Globally
                </span>
            </h2>
        </div>

        <div class="px-8 space-y-6">
            <div class="grid grid-cols-3 lg:flex gap-6 lg:gap-8 items-center justify-between">
                <img class="grayscale h-6" src="{{ asset('img/clients/malala.svg') }}" />

                <img class="grayscale h-12" src="{{ asset('img/clients/women-lift.png') }}" />

                <img class="grayscale h-10" src="{{ asset('img/clients/crdb.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/oryx.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/jane-goodall.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/ubongo.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/rti.png') }}" />
            </div>

            <div class="grid grid-cols-3 lg:flex gap-6 lg:gap-8 items-center justify-between">
                <img class="grayscale h-8" src="{{ asset('img/clients/vodacom.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/knauf.svg') }}" />

                <img class="grayscale h-6" src="{{ asset('img/clients/uongozi.svg') }}" />


                <img class="grayscale h-8" src="{{ asset('img/clients/d-tree.png') }}" />

                <img class="grayscale h-14" src="{{ asset('img/clients/ifakara.png') }}" />

                <img class="grayscale h-5" src="{{ asset('img/clients/dot.png') }}" />

                <img class="grayscale h-8" src="{{ asset('img/clients/nest.webp') }}" />
            </div>
        </div>
    </div>
</section>
