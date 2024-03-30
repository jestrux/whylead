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
                <div
                    class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 w-full h-full object-cover object-top" src="{{ $image }}"
                        alt="" />
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

            <div class="col-span-7 pt-6 pb-16 flex flex-col gap-2">
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

                <ul role="list" class="divide-y divide-black/5">
                    @php
                        $checklist = [
                            [
                                'title' => 'Safe space for collaboration',
                                'description' =>
                                    'Our approach emphasizes inclusivity and authenticity because we believe in creating a safe space where all voices are heard, valued, and respected, allowing for diverse viewpoints and constructive contributions.',
                            ],
                            [
                                'title' => 'Challenging Assumptions',
                                'description' =>
                                    'Through thoughtful facilitation and active participation techniques, we empower teams to challenge assumptions, manage emotions, and navigate conflicts effectively. ',
                            ],
                            [
                                'title' => 'Integration approach',
                                'description' =>
                                    "Our goal is to instill momentum and integration post the meetings/sessions by ensuring that plans and solutions are not only developed but owned and integrated into the organization's culture and operations.",
                            ],
                        ];
                    @endphp

                    @foreach ($checklist as $item)
                        <li class="flex items-start gap-2 py-2">
                            <svg class="size-7 flex-none opacity-60" viewBox="0 0 24 24">
                                <circle class="" cx="12" cy="12" r="8.25" stroke="currentColor"
                                    stroke-width="1" stroke-opacity="1" fill="none" />
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    fill="currentColor"></path>
                            </svg>

                            <div class="pt-px">
                                <h5 class="text-base">
                                    {{ $item['title'] }}
                                </h5>
                                <p class="mt-1 text-sm/loose opacity-70">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-5 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
