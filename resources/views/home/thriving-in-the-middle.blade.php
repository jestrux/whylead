<section class="sbg-neutral-100">
    <div class="px-4 lg:px-8 py-6 lg:pt-36 lg:pb-20 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top"
                            src="https://images.unsplash.com/photo-1622675103136-e4b90c9a33d6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDMzfHxsZWFkZXJzaGlwJTIwdHJhaW5pbmd8ZW58MHx8fHwxNzA4NDMxMTM0fDA&ixlib=rb-4.0.3&q=80&w=1080"
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

            <div class="pt-6 lg:pt-12 lg:pb-12 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase tracking-wide">
                        Thrive
                        <span class="outline-texts">in the </span>
                        middle
                    </span>
                </h2>

                <p class="mt-2 text-lg/relaxed uppercase">
                    A 12-week leadership program for Middle Managers
                </p>

                <p class="mt-2 text-base/loose opacity-70">
                    This is a transformative 12-week program tailored for middle managers, focusing on empowering them
                    as essential agents of growth, alignment, culture, and change within their organizations. It tackles
                    the unique challenges middle managers face, from navigating the demands of both senior leadership
                    and direct reports to driving strategic goals amid disruptions.
                </p>

                <p class="text-base/relaxed opacity-70">
                    Key Outcomes for participating organizations include:
                </p>

                @php
                    $checklist = [
                        [
                            'icon' =>
                                'M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25',
                            'title' => 'Strategic Alignment',
                        ],
                        [
                            'icon' =>
                                'M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605',
                            'title' => 'High Performance',
                        ],
                        [
                            'icon' =>
                                'M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18',
                            'title' => 'Innovation Culture',
                        ],
                        [
                            'icon' =>
                                'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
                            'title' => 'Agility & Resilience',
                        ],
                    ];
                @endphp

                <ul role="list" class="mt-1 flex flex-col lg:grid grid-cols-2 gap-3">
                    @foreach ($checklist as $item)
                        <li class="flex items-center gap-2">
                            <div class="bg-content/5 size-10 rounded flex items-center justify-center">
                                <svg class="size-5 flex-none text-primary" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.6" d="{{ $item['icon'] }}" />
                                </svg>
                            </div>

                            <span class="text-base opacity-70">
                                {{ $item['title'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-5">
                    <a href="{{ url('/thrive-in-the-middle/form') }}" class="btn w-full md:w-auto">
                        Enroll to next cohort now
                    </a>
                </div>
            </div>

            <div>
                <a href="#"
                    class="-rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl flex-1 hidden md:flex items-center justify-center aspect-[2/1.8] relative">
                    <div
                        class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="rotate-6 scale-125 w-full h-full object-cover object-top"
                            src="https://images.unsplash.com/photo-1622675103136-e4b90c9a33d6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDMzfHxsZWFkZXJzaGlwJTIwdHJhaW5pbmd8ZW58MHx8fHwxNzA4NDMxMTM0fDA&ixlib=rb-4.0.3&q=80&w=1080"
                            alt="" />

                        <div class="absolute inset-0 flex items-center justify-center">
                            <span class="size-16 flex items-center justify-center rounded-full bg-white text-accent">
                                {{-- <svg class="w-14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                                    <path d="M8 5v14l11-7z" stroke-linecap="round" stroke-linejoin="round" />
                                </svg> --}}

                                <svg class="size-8 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>

                            </span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
