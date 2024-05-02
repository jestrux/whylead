@php
    $steps = [
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540972/z87huht3tyivdybtg6hv.jpg',
            'date' => '10th May 2024',
            'activity' => 'Applications\\nOpen',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540989/ykp8fjasngktaayokhab.jpg',
            'date' => '27th July 2024',
            'activity' => 'Selection\\nCloses',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg',
            'date' => '6th Sept 2024',
            'activity' => 'Thriving in The Middle begins',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg',
            'date' => '23rd Nov 2024',
            'activity' => 'Program ends, thriving continues',
        ],
    ];
@endphp

<section class="py-10 bg-content/5">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl uppercase">
                    <span class="font-light">Next Cohort</span>
                    <span class="hidden md:inline"><br /></span>
                    Program Calendar
                </h2>

                {{-- <p class="lg:text-4xl font-normal tracking-normal mt-2">
                    ( Q2 2024 )
                </p> --}}
            </div>

            <ul role="list" class="grid grid-cols-1 lg:grid-cols-4 gap-2 relative">
                <div class="absolute top-0 h-20 bg-red-50s -inset-x-2 flex items-center">
                    <div class="flex-shrink-0 size-3 rounded-full border-2 border-accent sbg-accent"></div>
                    <div class="flex-1 border-t-2 border-dashed border-stroke"></div>
                    <div class="flex-shrink-0 size-3 rounded-full border-2 border-accent sbg-accent"></div>
                </div>

                @foreach ($steps as $step)
                    <li
                        class="text-whites borders border-stroke sshadow-sm relative min-h-full w-full rounded-2xl overflow-hidden py-4 text-left">
                        <div class="min-h-full relative flex flex-col items-center justify-between gap-8 lg:p-2">
                            <small
                                class="inline-flex text-xs/none font-bold py-2 px-3.5 rounded-full border border-stroke bg-canvas uppercase tracking-widest">
                                {{-- <span class="mt-px">Step 0{{ $loop->iteration }}</span> --}}
                                <span class="mt-px">{{ $step['date'] }}</span>
                            </small>

                            {{-- <div class="flex-1 min-h-12"></div> --}}

                            <div
                                class="px-8 h-32 flex justify-center items-center relative w-full text-white text-center">
                                <img class="absolute inset-0 size-full rounded-xl object-cover object-top"
                                    src="{{ $step['image'] }}" />

                                <div class="absolute inset-0 bg-black/70 rounded-xl"></div>

                                <h3 class="relative text-lg font-semibold uppercase drop-shadow">
                                    {!! str_replace('\\n', '<br/>', $step['activity']) !!}
                                </h3>
                            </div>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                <p class="text-lg opacity-70">Ready to take your skills to the next level?</p>
                <a href="#" class="mt-3 btn">
                    Sign up today
                </a>
            </div>
        </div>
    </div>
</section>

{{-- @php
    $steps = [
        [
            'date' => '10th May 2024',
            'activity' => 'Applications Open',
        ],
        [
            'date' => '27th July 2024',
            'activity' => 'Selection Closes',
        ],
        [
            'date' => '6th September 2024',
            'activity' => 'Thriving in The Middle begins',
        ],
        [
            'date' => '23rd November 2024',
            'activity' => 'Program ends, thriving continues',
        ],
    ];

    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg';
@endphp

<section class="pt-12">
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
                <h2 class="text-2xl lg:text-4xl/tight font-bold uppercase">
                    <span class="font-light">Next Cohort</span>
                    Program Calendar
                </h2>

                <p class="mt-0.5 text-lg/loose uppercase">
                    10th MAY 2024 &mdash; 23rd Nov 2024
                </p>

                <div class="relative py-12 flex flex-col gap-12">
                    <div class="absolute left-[5px] inset-y-0 border-l-2 border-dashed border-stroke"></div>

                    @foreach ($steps as $step)
                        <div class="flex items-start gap-4">
                            <div class="flex-shrink-0 size-3 rounded-full border-2 border-accent bg-accent"></div>
                            <div class="flex-1">
                                <h5>{{ $step['date'] }}</h5>
                                <p>{{ $step['activity'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <a href="{{ url('/contacts') }}" class="btn w-full md:w-auto">
                        Sign up today
                    </a>
                </div>
            </div>

            <div class="-rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center aspect-[2/1.3] relative">
                <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                    <img class="rotate-6 scale-125 size-full" src="{{ $image }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section> --}}
