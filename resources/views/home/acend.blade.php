<section class="py-10 lg:py-20">
    <div class="max-w-7xl mx-auto px-4 md:px-8">
        <div class="lg:grid grid-cols-2 gap-12 lg:gap-20 items-center">

            {{-- Left Column --}}
            <div class="flex flex-col gap-5 lg:gap-6">
                <img src="{{ asset('img/uploads/acend-logo.png') }}" alt="ACEND"
                    class="h-14 self-start" />

                <h2 class="text-2xl lg:text-4xl font-bold uppercase leading-tight text-accent dark:text-content">
                    Most Leadership Programs Inspire Change. Few Give You A System To Track, Scale, And Sustain It.
                </h2>

                <p class="text-base/loose opacity-70">
                    ACEND by WhyLead is the intelligence layer behind Thrive in the Middle. It measures where your
                    middle managers truly are, surfaces the risks holding performance back, and translates growth into
                    clear, trackable outcomes — across individuals, cohorts, and the organization. So you're not just
                    running a programme. You're building a system for consistent performance.
                </p>

                <div>
                    <a href="https://acend.whyleadothers.com/landing" target="_blank" class="btn w-full md:w-auto">
                        Assess Your Middle Managers
                    </a>
                </div>
            </div>

            {{-- Right Column --}}
            <div class="flex flex-col gap-6 mt-8 lg:mt-0">
                <div class="-rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl flex items-center justify-center aspect-[2/1] relative">
                    <div class="relative rounded-xl overflow-hidden w-full h-full bg-neutral-300">
                        <img class="w-full h-full object-cover object-center"
                            src="{{ asset('img/uploads/acend-photo.jpg') }}" alt="ACEND participants" />
                    </div>
                </div>

                <p class="text-base/relaxed opacity-70">
                    ACEND gives senior leaders and HR teams a clear view of
                </p>

                <ul class="flex flex-col gap-4">
                    @foreach ([
                        'Where managers are underperforming',
                        'Where performance is plateauing',
                        'Where high-impact leaders are emerging',
                    ] as $item)
                        <li class="flex items-center gap-3">
                            <span
                                class="flex-none size-8 bg-primary text-white flex items-center justify-center rounded">
                                <svg class="size-4" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                        clip-rule="evenodd" />
                                </svg>
                            </span>
                            <span class="font-bold uppercase tracking-wide">{{ $item }}</span>
                        </li>
                    @endforeach
                </ul>

                <div>
                    <a href="https://acend.whyleadothers.com/readiness" target="_blank" class="btn w-full md:w-auto">
                        Run The Free Readiness Assessment
                    </a>
                </div>
            </div>

        </div>
    </div>
</section>
