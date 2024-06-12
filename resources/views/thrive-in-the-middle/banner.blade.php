@php
    $image = asset('img/thrive-tail.png');
@endphp

<style>
    @keyframes plane {
        from {
            color: white;
            opacity: 0.35;
            transform: translate(0, 150%) rotate(-10deg);
        }

        60% {
            color: white;
            opacity: 0.45;
            transform: translate(400%, -430%) rotate(-50deg);
        }

        65% {
            color: white;
            opacity: 0.6;
            transform: translate(406%, -420%) rotate(-52deg);
        }

        70% {
            color: white;
            opacity: 0.75;
            transform: translate(412%, -430%) rotate(-55deg);
        }

        75% {
            color: white;
            opacity: 0.9;
            transform: translate(418%, -420%) rotate(-58deg);
        }

        80% {
            color: white;
            opacity: 1;
            transform: translate(420%, -430%) rotate(-60deg);
        }

        90% {
            color: #F26B21;
            opacity: 1;
            transform: translate(420%, -400%) rotate(-65deg);
        }

        95% {
            color: #F26B21;
            opacity: 1;
            transform: translate(440%, -370%) rotate(-90deg);
        }

        to {
            color: #F26B21;
            opacity: 1;
            transform: translate(-300%, -1200%) rotate(-80deg);
        }
    }

    @keyframes plane2 {
        from {
            color: white;
            opacity: 0.35;
            transform: translate(0, 150%) rotate(-90deg);
        }

        60% {
            color: white;
            opacity: 0.45;
            transform: translate(-500%, -430%) rotate(-55deg);
        }

        65% {
            color: white;
            opacity: 0.6;
            transform: translate(-506%, -420%) rotate(-52deg);
        }

        70% {
            color: white;
            opacity: 0.75;
            transform: translate(-512%, -430%) rotate(-50deg);
        }

        75% {
            color: white;
            opacity: 0.9;
            transform: translate(-518%, -420%) rotate(-47deg);
        }

        80% {
            color: white;
            opacity: 1;
            transform: translate(-520%, -430%) rotate(-45deg);
        }

        90% {
            color: #F26B21;
            opacity: 1;
            transform: translate(-520%, -400%) rotate(-35deg);
        }

        95% {
            color: #F26B21;
            opacity: 1;
            transform: translate(-540%, -370%) rotate(0deg);
        }

        95% {
            color: #F26B21;
            opacity: 1;
            transform: translate(-540%, -370%) rotate(0deg);
        }

        to {
            color: #F26B21;
            opacity: 1;
            transform: translate(300%, -1200%) rotate(0deg);
        }
    }

    .animate-plane .plane-2,
    .animate-plane-2 .plane {
        display: none;
    }

    @media (min-width: 1024px) {
        .animate-plane .plane {
            animation: plane 10s linear;
        }

        .animate-plane-2 .plane-2 {
            animation: plane2 10s linear;
        }

        .plane,
        .plane-2 {
            /* stroke: url(#gradient); */
            stroke: currentColor;
            stroke-width: 3;
        }
    }
</style>

<section class="lg:pt-12 px-8 pb-4 text-white relative">
    <div class="lg:hidden relative flex flex-col gap-5 py-8 px-4">
        {{-- <img class="h-14 object-contain" src="{{ asset('img/thrive-logo.png') }}" alt="" /> --}}

        <p class="pt-6 max-w-xl mx-auto text-2xl/[1.7] text-center font-light">
            A 12-week program designed to empower middle managers to thrive as growth, alignment, culture, and
            change catalysts within their organizations.
        </p>
    </div>

    <div class="hidden lg:block relative max-w-7xl mx-auto px-4 lg:px-8">
        <div class="h-60 flex gap-4 items-center">
            <div class="relative h-full flex items-center pb-24">
                <img class="h-[120px] object-contain" src="{{ asset('img/thrive-logo.png') }}" alt="" />
            </div>

            <div class="flex-1 pt-3 text-2xl lg:text-3xl text-center font-bold">
                <p class="pb-12 max-w-xl mx-auto text-2xl/[1.7] text-center font-light">
                    A 12-week program designed to empower middle managers to thrive as growth, alignment, culture, and
                    change catalysts within their organizations.
                </p>
            </div>

            <div class="h-full flex-shrink-0 w-[150px]">
                <img class="rotate-4 absolute -bottom-32 right-8 h-[380px] opacity-55" src="{{ $image }}"
                    alt="" />
            </div>
        </div>
    </div>

    <div class="hidden lg:block absolute bottom-10 left-0 right-0 pointer-events-none">
        <div x-data="{
            init() {
                var el = this.$root;
                this.$refs.plane.addEventListener('animationend', () => {
                    el.classList.remove('animate-plane');
                    el.classList.add('animate-plane-2');
                }, false);
                this.$refs.plane2.addEventListener('animationend', () => {
                    el.classList.add('animate-plane');
                    el.classList.remove('animate-plane-2');
                }, false);
            }
        }" class="animate-plane max-w-lg mx-auto flex justify-between relative h-12">
            <span class="plane absolute bottom-0 left-0 size-[50px] translate-y-full opacity-0" x-ref="plane">
                @include('common.thrive-plane')
            </span>
            <span class="plane-2 absolute bottom-0 right-0 size-[50px] translate-y-full -rotate-90 opacity-0"
                x-ref="plane2">
                @include('common.thrive-plane')
            </span>
        </div>
    </div>
</section>

{{-- <section class="text-white relative">
    <div class="lg:px-8 relative max-w-7xl mx-auto">
        <div class="lg:hidden relative flex flex-col gap-5 bg-accent py-8 px-4">
            <img class="h-14 object-contain" src="{{ asset('img/thrive-logo.png') }}" alt="" />

            <p class="text-xl/relaxed text-center font-light">
                A 12-week program designed to empower middle managers to thrive as growth, alignment, culture,
                and change catalysts within their organizations.
            </p>
        </div>

        <div class="pt-14 hidden lg:grid grid-cols-12 gap-16 items-center relative" style="height: 300px">
            <div class="col-span-3 relative h-full flex items-center pb-24">
                <img class="h-[120px] object-contain" src="{{ asset('img/thrive-logo.png') }}" alt="" />
            </div>

            <div class="col-span-6">
                <p class="pb-12 max-w-xl mx-auto text-2xl/[1.7] text-center font-light">
                    A 12-week program designed to empower middle managers to thrive as growth, alignment, culture, and
                    change catalysts within their organizations.
                </p>
            </div>

            <img class="rotate-4 absolute -bottom-32 right-8 h-[380px] opacity-55" src="{{ $image }}"
                alt="" />
        </div>
    </div>

    <div class="hidden lg:block absolute bottom-10 left-0 right-0 pointer-events-none">
        <div x-data="{
            init() {
                var el = this.$root;
                this.$refs.plane.addEventListener('animationend', () => {
                    el.classList.remove('animate-plane');
                    el.classList.add('animate-plane-2');
                }, false);
                this.$refs.plane2.addEventListener('animationend', () => {
                    el.classList.add('animate-plane');
                    el.classList.remove('animate-plane-2');
                }, false);
            }
        }" class="animate-plane max-w-lg mx-auto flex justify-between relative h-12">
            <span class="plane absolute bottom-0 left-0 size-[50px] translate-y-full opacity-0" x-ref="plane">
                @include('common.thrive-plane')
            </span>
            <span class="plane-2 absolute bottom-0 right-0 size-[50px] translate-y-full -rotate-90 opacity-0"
                x-ref="plane2">
                @include('common.thrive-plane')
            </span>
        </div>
    </div>
</section> --}}
