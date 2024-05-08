@php
    $image = asset('img/thrive-tail.png');
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
                <div class="relative">
                    <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase opacity-0">
                        Build
                        <span class="font-light">
                            a Thriving
                        </span>
                        Organization
                        <span class="font-light">Through Our Tailored</span>
                        Services
                    </h2>

                    <img class="absolute top-8 bottom-0 my-auto left-0 h-[120px] object-contain"
                        src="{{ asset('img/thrive-logo.png') }}" alt="" />
                </div>

                <p class="mt-1 text-lg/relaxed uppercase opacity-0">
                    WE PROVIDE A WIDE RANGE OF SERVICES TO LEADERS, TEAMS AND ORGANIZATIONS.
                </p>
            </div>

            <div class="absolute inset-0 top-6 flex items-center">
                <p class="max-w-lg mx-auto text-[36px]/[1.4] text-center font-serif tracking-wide">
                    Build a Thriving Organization Through Our Tailored Services
                </p>
            </div>

            <div class="flex-1 relative h-full">
                <img class="rotate-4 absolute right-8 h-[380px]" src="{{ $image }}" alt="" />
            </div>
        </div>
    </div>
</section>
