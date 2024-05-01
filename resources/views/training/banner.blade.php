@php
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
                    Everything <span class="font-light">Rises
                        <span class="hidden md:inline"><br /></span>
                        and </span>
                    Falls on Leadership
                </h2>

                <p class="mt-1 text-lg/relaxed uppercase">
                    Programmes designed to address real issues faced by leaders at diverse companies.
                </p>

                <div
                    class="mt-1 border-t border-b border-stroke sborder-l-4 sborder-primary sbg-content/5 rounded-mds p-3 pl-0 relative">
                    <svg class="absolute top-3 -left-6 w-5 text-primary sopacity-20" fill="currentColor"
                        viewBox="0 0 100 100">
                        <path
                            d="M90.4,54.9v17.7c0,4.9-4,8.9-8.9,8.9H63.8c-4.9,0-8.9-4-8.9-8.9V54.9c0-19.6,15.9-35.4,35.4-35.4V32  c-9.1,0.6-16.9,6.2-20.6,14.1h11.8C86.4,46.1,90.4,50,90.4,54.9z M37.2,81.5H19.5c-4.9,0-8.9-4-8.9-8.9V54.9  c0-19.6,15.9-35.4,35.4-35.4V32c-9.1,0.6-16.9,6.2-20.6,14.1h11.8c4.9,0,8.9,4,8.9,8.9v17.7C46.1,77.5,42.1,81.5,37.2,81.5z">
                        </path>
                    </svg>

                    <p class="text-lg/relaxed font-light">
                        The session was very helpful for enhancing communication, building trust, and being vulnerable
                        to each other. This I believe will improve the team's conviction, commitment, and congruence.
                    </p>

                    <div class="mt-2 flex items-center gap-2">
                        <img class="bg-canvas h-7 flex items-end rounded-full border border-stroke"
                            src="https://res.cloudinary.com/sfp-app/image/upload/v1714305970/n71j8v2ohnag4cwxxmiv.png"
                            alt="">

                        <h5 class="text-sm opacity-80">Honorati Masanja</h5> &middot;
                        <p class="mt-px text-sm opacity-50">
                            Executive Director, Ifakara health Institute
                        </p>
                    </div>
                </div>

                <p class="mt-2 text-base/relaxed opacity-70">
                    Each of our programmes will develop your leaders towards:
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
                            <div
                                class="bg-content/5 dark:bg-content/15 border border-content/10 w-9 h-8 rounded flex items-center justify-center">
                                <svg class="size-5 flex-none" viewBox="0 0 24 24">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="1.6" d="{{ $item['icon'] }}" />
                                </svg>
                            </div>

                            <span class="text-base">
                                {{ $item['title'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>

                <div class="mt-5">
                    <a href="#programmes" class="btn w-full md:w-auto">
                        Our programmes
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
