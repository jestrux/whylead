<section class="bg-content/5">
    <div class="px-4 md:px-8 relative max-w-6xl mx-auto">
        <div class="lg:grid grid-cols-12 gap-16 items-center">
            <div class="lg:hidden pt-8">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top"
                            src="{{ asset('img/uploads/home-moving-forward.jpg') }}" alt="" />

                        {{-- <div class="absolute inset-0 flex items-center justify-center">
                            <span class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-accent">
                                <svg class="w-6 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </span>
                        </div> --}}
                    </div>
                </a>
            </div>

            <div class="col-span-6 py-8 lg:py-16 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase tracking-wides">
                        <span class="outline-text">If everyone is</span>
                        moving
                        forward together,
                        <span class="outline-text">then</span>
                        {{-- <span class="hidden lg:inline"><br /></span>> --}}
                        success
                        <span class="outline-text">takes care of itself</span>
                        {{-- <span class="outline-text">Thriving</span>
                        <span class="hidden lg:inline"><br /></span>>
                        <span class="outline-text">Thriving</span> --}}
                    </span>
                </h2>

                <p class="text-base/loose opacity-70">
                    Henry Ford was right. Organizations can only thrive consistently when the teams are healthy and
                    people are aligned. We work with your teams to foster oneness through SPR.
                </p>

                <div class="mt-2">
                    <a href="{{ url('/contacts') }}" class="btn w-full lg:w-auto">
                        Build a thriving team today
                    </a>
                </div>
            </div>

            <div class="col-span-6">
                <a href="#"
                    class="hidden lg:block min-h-full -rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl relative rounded-xl overflow-hidden size-full bg-neutral-300">
                    <img class="rotate-6 scale-125 size-full object-cover object-top"
                        src="{{ asset('img/uploads/home-moving-forward.jpg') }}" alt="" />

                    {{-- <div class="absolute inset-0 flex items-center justify-center">
                        <span class="size-16 flex items-center justify-center rounded-full bg-white text-accent">
                            <svg class="size-8 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                            </svg>
                        </span>
                    </div> --}}
                </a>
            </div>
        </div>
    </div>
</section>
