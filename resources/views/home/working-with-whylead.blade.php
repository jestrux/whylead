<section class="py-10 lg:py-24">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-5xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">What </span>
                        working with<span class="hidden md:inline"><br /></span> whylead
                        <span class="outline-text"> looks like</span>
                    </span>
                </h2>

                {{-- <p class="lg:text-4xl font-normal tracking-normal lowercase">
                    in these 3 tried and true steps
                </p> --}}
            </div>

            <ul role="list" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @php
                    $steps = [
                        [
                            'icon' =>
                                'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',
                            'title' => 'Effective',
                            'description' =>
                                'We use your business model, strategy, and company culture to develop the context of our solutions so everything trickles back to the bottom line of the organization',
                        ],
                        [
                            'icon' =>
                                'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
                            'title' => 'Expert Led',
                            'description' =>
                                'Our consultants and facilitators have been described by clients as professionals, experts, and insightful. ',
                        ],
                        [
                            'icon' =>
                                'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
                            'title' => 'Unrivaled Support',
                            'description' =>
                                'We believe lasting impact requires intentionality and support. We walk with you to monitor and measure progress and reinforce the agreed upon outcomes. ',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="bg-gradient-to-br from-accent via-accent/90 to-accent/95 text-white relative min-h-full w-full p-10 shadow rounded-3xl overflow-hidden">
                        <div class="absolute opacity-5 dark:opacity-[0.03] {{ $loop->index == 0 ? 'right-[23%]' : '-left-[25%]' }}">
                            @include('common.icon')
                        </div>

                        @if ($loop->index == 1)
                            <div class="absolute opacity-5 dark:opacity-[0.03] right-[23%]">
                                @include('common.icon')
                            </div>
                        @endif


                        <span
                            class="relative size-14 text-white bg-gradient-to-br from-primary to-primary/20 sdark:from-accent sdark:to-content/10 rounded-xl flex items-center justify-center">
                            <svg class="size-8 drop-shadow" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                            </svg>
                        </span>

                        <div class="flex-1 min-h-16"></div>

                        <div class="relative">
                            <h3 class="text-2xl font-semibold">
                                {{ $step['title'] }}
                            </h3>

                            <p class="mt-2 text-sm/loose opacity-70">
                                {{ $step['description'] }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                <p class="text-xl opacity-70">Ready to take your organisation to the next level?</p>
                <a href="#" class="mt-6 btn">
                    Hire WhyLead today
                </a>
            </div>
        </div>
    </div>
</section>
