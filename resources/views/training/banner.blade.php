@php
    $image = $getImage('Banner Image');
@endphp

<section class="lg:pt-12 lg:pb-8 lg:text-white">
    <div class="lg:px-8 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video lg:rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-top" src="{{ $image }}" alt="" />
                    </div>
                </a>
            </div>

            <div class="flex flex-col gap-2 py-6 px-4 lg:py-0 lg:px-0">
                <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                    Everything <span class="font-light">Rises and</span>
                    <span class="hidden md:inline"><br /></span>
                    Falls on Leadership
                </h2>

                <p class="mt-1 text-lg/relaxed uppercase">
                    Our Programmes Are Designed To Develop Leaders Who Can Lead Thriving Organizations In The 21st
                    Century.
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
