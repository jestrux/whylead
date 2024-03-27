<section>
    <div class="px-8 py-12 lg:pt-20 lg:pb-32 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-12 gap-20 items-center">
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

            <div class="col-span-7 pt-6 pb-16 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        Happier
                        <span class="outline-text">workplace</span>
                    </span>
                </h2>

                <p class="text-base/loose opacity-70">
                    Thriving Organizations have workplace cultures where people are Happier to go to work. They live in
                    a
                    world where Mondays are as exciting as Fridays. Their people operate with a deep sense of
                    satisfaction and commitment to the organization. At WhyLead, we understand what creates a happier
                    workplace and we have developed an Index to assess your workplace culture. Giving you empirical data
                    to help you make data-driven decisions.
                </p>
                <p class="mt-2 text-base/loose opacity-70">
                    Here at WhyLead, we are committed to working with your organization to get your culture to this
                    place where your turnover is low, your engagement is high, people are united and collaborating, and
                    they are contributing at a high level. The journey to a happier workplace begins with our index, but
                    it doesn’t end there. We work with you to co-create solutions to address the identified cultural
                    gaps.
                </p>

                <p class="mt-3">
                    Insights Generated Will Help Your Organization
                </p>

                <ul role="list" class="divide-y divide-black/5">
                    @php
                        $checklist = [
                            'Grow your Revenue and Increase Your Profit ',
                            'Reduce Turnover and Retain Your Top Talent',
                        ];
                    @endphp

                    @foreach ($checklist as $item)
                        <li class="flex items-center gap-2 py-2">
                            <svg class="size-7 flex-none opacity-60" viewBox="0 0 24 24">
                                <circle class="" cx="12" cy="12" r="8.25" stroke="currentColor"
                                    stroke-width="1" stroke-opacity="1" fill="none" />
                                <path
                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                    fill="currentColor"></path>
                            </svg>

                            <span class="text-base opacity-70">
                                {{ $item }}
                            </span>
                        </li>
                    @endforeach

                    <li class="pt-5 pb-2 text-sm/relaxed opacity-60">
                        Join Thrive today and be more than just a link in the organizational hierachy; be its strongest
                        link.
                    </li>
                </ul>

                <div class="mt-3 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>

            <div
                class="col-span-5 h-full -rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center relative">
                <div
                    class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 w-full h-full object-cover"
                        src="https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg"
                        alt="" />

                </div>

                <div class="absolute -top-6 -bottom-6 -left-6 rotate-1">
                    <div
                        class="sticky top-24 self-start border border-white/10 p-1.5 pr-6 rounded-lg overflow-hidden text-white inline-flex items-center gap-2">
                        <div class="absolute inset-0 bg-accent"></div>
                        <div class="relative rounded-lg overflow-hidden">
                            <div
                                class="text-base/none tracking-wide font-semibold relative h-12 px-2.5 text-white bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                4X
                            </div>
                        </div>

                        <div class="relative text-sm/snug">
                            Of clients said they managed <br /> a 4x increase in revenue.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
