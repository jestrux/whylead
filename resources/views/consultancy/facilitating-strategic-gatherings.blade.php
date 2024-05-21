@php
    $image = $getImage('Facilitating Strategic Gatherings Image');
@endphp

<section class="py-6 lg:py-20">
    <div class="relative max-w-7xl mx-auto px-4 lg:px-8">
        <div class="lg:grid grid-cols-12 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top" src="{{ $image }}"
                            alt="" />
                    </div>
                </a>
            </div>

            <div
                class="col-span-6 h-full -rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center relative">
                <div class="relative rounded-xl srounded-t-full overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 absolute w-full h-full object-cover object-top"
                        src="{{ $image }}" alt="" />
                </div>

                <div class="absolute -top-6 -bottom-6 -left-6">
                    <x-stat-card stat="82%"
                        description="of clients our facilitation aligned with their goals and expectations" />
                </div>
            </div>

            <div class="col-span-6 pt-8 lg:pb-16 flex flex-col gap-2">
                <h2 class="mt-3 text-2xl lg:text-3xl font-bold uppercase">
                    <span class="outline-text">Facilitating</span> Strategic gatherings
                </h2>

                <p class="mt-2 text-lg/relaxed uppercase">
                    We Enhance Decision-Making and Drive Alignment
                </p>

                <p class="mt-2 text-base/loose opacity-70">
                    We thrive at shaping purposeful discussions for strategic planning, problem-solving, and alignment
                    conversations. We understand the pivotal role of strategic meetings in shaping organizational
                    direction and alignment. We don’t give answers, we help you get to them through our facilitation
                    approach that creates transformative experiences tailored to your needs. We look forward to
                    collaboratively shaping impactful gatherings with you: Strategy Sessions, Alignment Sessions,
                    Planning Sessions, and Reflection Sessions.
                </p>

                @php
                    $data = [
                        [
                            'question' => 'Safe space for collaboration',
                            'answer' =>
                                'Our approach emphasizes inclusivity and authenticity because we believe in creating a safe space where all voices are heard, valued, and respected, allowing for diverse viewpoints and constructive contributions.',
                        ],
                        [
                            'question' => 'Challenging Assumptions',
                            'answer' =>
                                'Through thoughtful facilitation and active participation techniques, we empower teams to challenge assumptions, manage emotions, and navigate conflicts effectively. ',
                        ],
                        [
                            'question' => 'Integration approach',
                            'answer' =>
                                "Our goal is to instill momentum and integration post the meetings/sessions by ensuring that plans and solutions are not only developed but owned and integrated into the organization's culture and operations.",
                        ],
                    ];
                @endphp

                <div class="-mx-4">
                    <x-faqs :data="$data" />
                </div>

                <div class="mt-5 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
