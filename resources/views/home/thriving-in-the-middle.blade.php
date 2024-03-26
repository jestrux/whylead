<div class="px-6 lg:px-0 py-12 lg:py-36 relative max-w-7xl mx-auto">
    <div class="lg:grid grid-cols-2 gap-16">
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

        <div class="pt-6 space-y-2 lg:space-y-4">
            <h1 class="text-2xl lg:text-[40px]/tight font-bold uppercase">
                Thriving in the middle
            </h1>

            <p class="text-lg lg:text-xl font-bold">
                Thriving middle managers lead to a thriving organization
            </p>

            <p class="text-base/loose opacity-70">
                This program is designed to empower middle managers to thrive as change and alignment agents by
                inspiring their teams’ conviction, commitment, and a sense of congruence to drive strategic results for
                the organization. Key Outcomes for participating organizations include:
            </p>

            <ul role="list" class="-my-2 divide-y divide-black/5">
                @php
                    $checklist = [
                        'Grow your Revenue and increase Your Profit ',
                        'A happier workplace for all',
                        'Alignment in delivering strategic outcomes',
                    ];
                @endphp

                @foreach ($checklist as $item)
                    <li class="flex items-center gap-3 py-2">
                        <svg class="size-8 flex-none text-accent" viewBox="0 0 24 24">
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
                    Made up of individuals who are passionate about the mission, committed to results, and of high
                    character.
                </li>
            </ul>

            <div class="sflex flex-col md:flex-row items-center gap-3">
                <a href="#" class="btn w-full md:w-auto">
                    Sign up now
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
                        <span class="w-24 h-24 flex items-center justify-center rounded-full bg-white text-accent">
                            {{-- <svg class="w-14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                                <path d="M8 5v14l11-7z" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> --}}

                            <svg class="w-12 ml-1" fill="currentColor" viewBox="0 0 24 24" stroke-width="1"
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

{{-- <img class="rounded-3xl absolute inset-0 w-full h-full object-cover" src="https://i.ytimg.com/vi/obkwb1BjcwE/hq720.jpg"
    alt="" /> --}}
