@php
    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg';
@endphp

<section class="pt-12 pb-8">
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
                    Empower
                    <span class="font-light"> your</span>
                    Leaders
                    <span class="font-light">and unlock a</span>
                    Thriving Organization
                </h2>

                <p class="mt-1 text-lg/relaxed uppercase">
                    Discover the services we offer to empower your leaders and organization to Thrive.
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
                        The sessions Ben delivered truly helped the team think critically and open up about how we
                        understand our team/organizational culture, values, and norms. The outdoor activities led by
                        Goodhope were creative, challenging, and fun.
                    </p>

                    <div class="mt-2 flex items-center gap-2">
                        <img class="bg-canvas h-7 flex items-end rounded-full border border-stroke"
                            src="https://res.cloudinary.com/sfp-app/image/upload/v1714305970/irycwvcf8vcbnmcee6gi.png"
                            alt="">

                        <h5 class="text-sm opacity-80">Gloria Kahamba</h5> &middot;
                        <p class="mt-px text-sm opacity-50">
                            Country Director, D-Tree
                        </p>
                    </div>
                </div>

                <div class="mt-5">
                    <a href="#thrivingTeams" class="btn w-full md:w-auto">
                        Our services
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

{{-- <section class="py-12 lg:pt-16 border-b border-stroke">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="lg:grid grid-cols-12 gap-12 items-start">
            <div class="col-span-6 relative">
                <h2 class="mt-3 text-2xl lg:text-4xl/[1.4] font-bold uppercase text-accent dark:text-white">
                    Empower
                    <span class="font-light"> your</span>
                    Leaders
                    <span class="font-light">and unlock a</span>
                    Thriving Organization
                </h2>
            </div>

            <div class="col-span-6 pt-4 pb-16 flex flex-col gap-2">
                <p class="text-2xl/relaxed font-light">
                    Discover the services we offer to empower your leaders and organization to Thrive.
                </p>

                <div class="mt-3">
                    <a href="#thrivingTeams" class="btn w-full md:w-auto">
                        Our services
                    </a>
                </div>
            </div>
        </div>
    </div>
</section> --}}
