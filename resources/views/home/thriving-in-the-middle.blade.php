<section class="sbg-neutral-100">
    <div class="px-4 md:px-8 py-6 lg:pt-36 lg:pb-20 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="lg:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top"
                            src="{{ asset('img/uploads/home-thrive-in-the-middle.jpg') }}" alt="" />

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

            <div class="pt-6 lg:pt-12 lg:pb-12 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase tracking-wide">
                        Thrive
                        <span class="outline-texts">in the </span>
                        middle
                    </span>
                </h2>

                <p class="mt-2 text-lg/relaxed uppercase">
                    A 7-week leadership program for Middle Managers
                </p>

                <p class="mt-2 text-base/loose opacity-70">
                    This is a transformative 7-week program tailored for middle managers, focusing on empowering them
                    as essential agents of growth, alignment, culture, and change within their organizations. It tackles
                    the unique challenges middle managers face, from navigating the demands of both senior leadership
                    and direct reports to driving strategic goals amid disruptions.
                </p>

                <p class="text-base/relaxed opacity-70">
                    Key outcomes for participating organizations include:
                </p>

                @php
                    $_thrive_page = \Statamic\Facades\Entry::query()->where('collection', 'pages')->where('slug', 'thrive-in-the-middle')->first();
                    $checklist = collect($_thrive_page?->get('program_benefits') ?? [])->map(fn($v) => [
                        'icon' => $v['icon'] ?? '',
                        'title' => $v['title'] ?? '',
                    ])->all();
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
                    <a href="{{ url('/thrive-in-the-middle/form') }}" class="btn w-full lg:w-auto">
                        Enroll to next cohort now
                    </a>
                </div>
            </div>

            <div>
                <a href="#"
                    class="-rotate-1 hover:rotate-0 hover:scale-105 transition-all duration-300 shadow-xl flex-1 hidden lg:flex items-center justify-center aspect-[2/1.8] relative">
                    <div
                        class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="rotate-6 scale-125 w-full h-full object-cover object-top"
                            src="{{ asset('img/uploads/home-thrive-in-the-middle.jpg') }}" alt="" />

                        {{-- <div class="absolute inset-0 flex items-center justify-center">
                            <span class="size-16 flex items-center justify-center rounded-full bg-white text-accent">
                                <svg class="size-8 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                </svg>
                            </span>
                        </div> --}}
                    </div>
                </a>
            </div>
        </div>
    </div>
</section>
