@php
    $steps = [
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540972/z87huht3tyivdybtg6hv.jpg',
            'date' => '17th May 2024',
            'activity' => 'Applications\\nOpen',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540989/ykp8fjasngktaayokhab.jpg',
            'date' => '23rd Aug 2024',
            'activity' => 'Selection\\nCloses',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg',
            'date' => '6th Sep 2024',
            'activity' => 'Thriving in The Middle begins',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1711540531/vudvwz3j0vmlsqslsjio.jpg',
            'date' => '30th Nov 2024',
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
            </div>

            <ul role="list" class="flex flex-col md:grid grid-cols-4 gap-2 relative my-4 py-6 md:my-0 md:py-0">
                <div class="absolute top-0 h-full md:h-20 bg-red-50s -inset-x-2 flex flex-col md:flex-row items-center">
                    <div class="flex-shrink-0 size-3 rounded-full border-2 border-accent dark:border-content/20"></div>
                    <div class="flex-1 border-l-2 md:border-l-0 md:border-t-2 border-dashed border-stroke"></div>
                    <div class="flex-shrink-0 size-3 rounded-full border-2 border-accent dark:border-content/20"></div>
                </div>

                @foreach ($steps as $step)
                    <li
                        class="text-whites borders border-stroke sshadow-sm relative min-h-full w-full rounded-2xl overflow-hidden py-4 text-left">
                        <div class="min-h-full relative flex flex-col items-center justify-between gap-8 md:p-2">
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
                <p class="text-lg opacity-70">Ready to become your organisation's strongest link?</p>
                <a href="{{ url('/thrive-in-the-middle/form') }}" class="mt-3 btn">
                    Enroll Today
                </a>
            </div>
        </div>
    </div>
</section>
