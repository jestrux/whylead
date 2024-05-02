@php
    $faqs = [
        [
            'question' => 'Optimize Organizational Performance for Growth and Profitability',
            'answer' =>
                'Your leaders will be empowered with self-leadership and team leadership skills to navigate pressures, foster alignment and unity, and drive innovation, leading to enhanced team performance and productivity, increased efficiency, reduced turnover, and higher profitability. ',
        ],
        [
            'question' => 'Cultural Alignment and Growth',
            'answer' =>
                'Enabling leaders to personally exemplify and propagate organizational culture ensures cultural alignment within teams, advancing the strategic vision',
        ],
        [
            'question' => 'Increased Adaptive Leadership',
            'answer' =>
                'Your organization will observe leaders who leverage stress, competing priorities, and organizational dynamics as catalysts for progressive leadership, disruptive thinking, and resilience amidst adversity, resulting in enhanced agility and innovation within your organization',
        ],
    ];

    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg';
@endphp

<section class="py-12">
    <div class="px-8 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top" src="{{ $image }}"
                            alt="" />

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
                    Thrive <span class="font-light">in the </span>
                    Middle
                </h2>

                <p class="mt-1 text-lg/relaxed uppercase">
                    Transforming Middle Management Challenges into Leadership Triumphs
                </p>

                <p class="text-base/loose opacity-70">
                    Being a middle manager is challenging. Those above have priorities. Those below have questions.
                    Peers need help to drive strategic goals. And disruption is closing in. And the middle manager has
                    to transform this tension into triumph. This 3 months cohort-based program aims at strengthening an
                    organization’s spinal cord; Middle Managers.
                </p>

                <p class="mt-1 text-base/loose opacity-70">
                    Below are some key outcomes for the organization.
                </p>

                <x-faqs :data="$faqs" />

                <div class="mt-5">
                    <a href="#programmes" class="btn w-full md:w-auto">
                        Sign up for next cohort today
                    </a>
                </div>
            </div>

            <div class="-rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center aspect-[2/1.8] relative">
                <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                    <img class="rotate-6 scale-125 size-full" src="{{ $image }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>


{{-- <section class="py-12 lg:py-16">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="lg:grid grid-cols-12 gap-12 items-start">
            <div class="col-span-5 relative">
                <h2 class="mt-3 text-2xl lg:text-4xl/[1.4] font-bold uppercase text-accent dark:text-white">
                    Everything <span class="font-light">Rises
                        <span class="hidden md:inline"><br /></span>
                        and </span>
                    Falls on Leadership
                </h2>

                <div class="mt-8 gap-3">
                    <a href="#programmes" class="btn w-full md:w-auto">
                        Our programmes
                    </a>
                </div>
            </div>

            <div class="col-span-7 pt-4 pb-16 flex flex-col gap-2">
                <p class="text-xl/loose font-light">
                    Do you feel like your leaders and teams are not being as productive and effective as they can be? Do
                    you think progress could be realized if your people were exposed to new ways of thinking and
                    operating? Well, WhyLead is here to serve. We work with your organization to co-create programs that
                    cater to your unique needs.
                </p>

                <div class="mt-5 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        See Our programmes
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
