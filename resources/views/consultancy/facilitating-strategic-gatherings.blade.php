@php
    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711771765/ps6d058xjyswkzhn9vsc.jpg';
@endphp

<section class="py-12 lg:py-20">
    <div class="relative max-w-7xl mx-auto px-8">
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
                class="col-span-5 h-full -rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center relative">
                <div class="relative rounded-xl srounded-t-full overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 absolute w-full h-full object-cover object-top"
                        src="{{ $image }}" alt="" />
                </div>

                <div class="absolute -top-6 -bottom-6 -left-6 rotate-2s">
                    <div
                        class="sticky top-24 self-start border border-white/10 p-1.5 pr-6 rounded-lg overflow-hidden text-white inline-flex items-center gap-2">
                        <div class="absolute inset-0 bg-accent"></div>
                        <div class="relative rounded-lg overflow-hidden">
                            <div
                                class="text-base/none tracking-wide font-semibold relative h-12 min-w-14 px-2.5 text-white text-center bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                98%
                            </div>
                        </div>

                        <div class="relative text-sm/snug">Of clients discovered new growth avenues<br />
                            post-engagement with our expertise
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-span-7 pt-8 pb-16 flex flex-col gap-2">
                <h2 class="mt-3 text-2xl lg:text-3xl font-bold uppercase">
                    Facilitating Strategic gatherings
                </h2>

                <p class="text-sm/loose opacity-70">
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

                <x-faqs :data="$data" />

                <div class="mt-5 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>