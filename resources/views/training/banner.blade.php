@php
    $image = $getImage('Banner Image');
@endphp

<section class="pt-12 pb-8 text-white">
    <div class="px-8 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-top" src="{{ $image }}" alt="" />

                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-accent">
                                {{-- <svg class="w-14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                                    <path d="M8 5v14l11-7z" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> --}}

                                <svg class="w-6 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>

                            </span>
                        </div>
                    </div>
                </a>
            </div>

            <div class="flex flex-col gap-2">
                <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                    Everything <span class="font-light">Rises and</span>
                    <span class="hidden md:inline"><br /></span>
                    Falls on Leadership
                </h2>

                <p class="mt-1 text-lg/relaxed uppercase">
                    Our Programmes Are Designed To Develop Leaders Who Can Lead Thriving Organizations In The 21st Century.
                </p>
            </div>

            <div class="flex-1">
                <div class="relative -rotate-1 shadow-xl hidden md:flex items-center justify-center aspect-[2/0.8]">
                    <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                        <img class="rotate-6 scale-125 size-full" src="{{ $image }}" alt="" />
                    </div>

                    <div class="rounded-xl absolute inset-0 flex items-center justify-center bg-black/50 text-white">
                        <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                            <span class="font-light">Invest in </span>
                            Your Leaders
                        </h2>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
