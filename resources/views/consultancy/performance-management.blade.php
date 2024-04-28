@php
    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711587768/zvseebs1t5tm0jsjyj0f.jpg';
@endphp

<section>
    <div class="px-8 py-12 lg:py-20 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-12 gap-20 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top" src="{{ $image }}"
                            alt="" />
                    </div>
                </a>
            </div>

            <div class="col-span-6 pt-8 pb-16 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        Performance
                        <span class="outline-text">management</span>
                    </span>
                </h2>

                <p class="mt-2 text-lg/relaxed uppercase">
                    Driving Success Through by Optimizing Performance Through Insightful Metrics
                </p>

                <p class="mt-2 text-base/loose opacity-70">
                    Thrive in the marketplace by measuring what truly counts. Winning in the marketplace begins by
                    winning internally. Designing and harnessing the right metrics to thrive requires a holistic and
                    scientific understanding of what makes people aspirational, motivated, committed to results, and
                    ultimately, what makes people grow.
                </p>

                {{-- <div class="my-4">
                    <p class="text-base/relaxed opacity-70">
                        Thriving internally must begin by answering questions like:
                    </p>

                    <div class="mt-2 text-sm/loose border-l-4 border-primary p-4 bg-content/5 rounded">
                        How do you get individuals to do what they might not want to do yet enjoy doing it? How
                        do you create a system that allows for self-motivation to emerge? How do you create
                        systems that get everyone to work towards the same strategic goals?
                    </div>
                </div> --}}

                <p class="mt-2 text-base/relaxed opacity-70">
                    To thrive, your people have to be inspired to achieve greatness willingly, and this is where we come
                    in. We work with your organization in:
                </p>

                @php
                    $data = [
                        [
                            'question' => 'The Discovery Phase',
                            'answer' =>
                                'We evaluate current systems and align major and minor strategies with organizational goals. Our performance management approach is role-centric, team-centric, project-centric, department-centric, culture-centric and strategy-centric.',
                        ],
                        [
                            'question' => 'We execute a tailored plan in our Implementation Phase',
                            'answer' =>
                                'We facilitate seamless adoption through goal setting and targeted training across the organziation.',
                        ],
                        [
                            'question' => 'The Evaluation and Continuous Improvement Phase',
                            'answer' =>
                                'To ensure ongoing success, we employ a data-driven method to refine the system. Our Performance Mangement approach is not only about historical benchmarks but also forward-looking projections, gaining insights into positive trajectories, and ensuring a dynamic and thriving organization, today and tomorrow.',
                        ],
                    ];
                @endphp

                <x-faqs :data="$data" />

                {{-- <ul role="list" class="divide-y divide-black/5">
                    @foreach ($data as $item)
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
                                    {{ $item['question'] }}
                                </h5>
                                <p class="mt-1 text-sm/loose opacity-70">
                                    {{ $item['answer'] }}
                                </p>
                            </div>
                        </li>
                    @endforeach
                </ul> --}}

                <div class="mt-3 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>

            <div
                class="col-span-6 h-full -rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center relative">
                <div
                    class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 absolute size-full object-cover object-right"
                        src="{{ $image }}" alt="" />

                </div>

                <div class="absolute -top-6 -bottom-6 -left-6 rotate-1">
                    <x-stat-card stat="81%"
                        description="of HR leaders planned to make changes to their ineffective performance management systems." />
                </div>
            </div>
        </div>
    </div>
</section>
