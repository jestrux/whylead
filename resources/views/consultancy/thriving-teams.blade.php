@php
    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg';
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
                                85%
                            </div>
                        </div>

                        <div class="relative text-sm/snug">Of clients said our retreats <br /> addressed
                            their
                            paint points</div>
                    </div>
                </div>
            </div>

            <div class="col-span-7 pt-6 pb-16 flex flex-col gap-2">
                <h2 class="mt-3 text-2xl lg:text-3xl font-bold uppercase">
                    Thriving teams
                </h2>

                <p class="text-sm/loose opacity-70">
                    Healthy Teams Communicate (openly), Collaborate (happily), and Challenge (willingly). Healthy Teams
                    are Thriving Teams. We work with your teams to get you to a healthier place through our SPR model.
                    We facilitate offsite retreats but we also work on a retainer basis with teams that require a
                    longer-term engagement. Our skilled facilitators will use your strategy, business/operational model,
                    and culture as the foundation to develop thriving teams for your organizations.
                </p>

                <p class="mt-1 text-sm/loose opacity-60">
                    When teams communicate openly, collaborate happily, and challenge willingly they create
                    organizations that are:
                </p>

                <ul role="list" class="mt-1 flex flex-col lg:grid grid-cols-2 gap-3">
                    @php
                        $checklist = [
                            [
                                'icon' =>
                                    'M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605',
                                'title' => 'Productive',
                            ],
                            [
                                'icon' =>
                                    'M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18',
                                'title' => 'Innovative',
                            ],
                            [
                                'icon' =>
                                    'M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25',
                                'title' => 'Aligned',
                            ],
                            [
                                'icon' =>
                                    'M9 12.75 11.25 15 15 9.75m-3-7.036A11.959 11.959 0 0 1 3.598 6 11.99 11.99 0 0 0 3 9.749c0 5.592 3.824 10.29 9 11.623 5.176-1.332 9-6.03 9-11.622 0-1.31-.21-2.571-.598-3.751h-.152c-3.196 0-6.1-1.248-8.25-3.285Z',
                                'title' => 'Drive Strategic Goals',
                            ],
                        ];
                    @endphp

                    @foreach ($checklist as $item)
                        <li
                            class="flex items-center gap-2 p-2 bg-card border border-stroke shadow-xs rounded-lg shadow-xs">
                            <div class="bg-accent/5 size-8 rounded flex items-center justify-center">
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

                <div class="mt-5 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
