@php
    $faqs = [
        [
            'icon' =>
                'M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z',
            'question' => 'Holistic Leadership Development',
            'answer' =>
                "Our program seamlessly integrates insights from a diverse range of bodies of knowledge, offering a holistic approach to leadership development. This comprehensive learning experience ensures that leaders are well-equipped to address a wide array of challenges and opportunities in today's dynamic business landscape.",
        ],
        [
            'icon' =>
                'M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605',
            'question' => 'Intensive Personalized Feedback',
            'answer' =>
                'Leaders participating in this program can expect in-depth, personalized feedback through a variety of assessment tools and coaching. This feedback is crucial for identifying strengths and areas of improvement, allowing leaders to tailor their development plans effectively.',
        ],
        [
            'icon' =>
                'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
            'question' => 'Pioneering Synergy',
            'answer' =>
                'This program pioneers a distinctive approach by harmonizing from a plethora of learning approaches. Leaders will embrace a comprehensive outlook on leadership, seamlessly weaving in a multiplicity of disciplines and models. This harmonious integration will empower leaders to chart uncharted territories for personal and team advancement, catalyzing innovation and cultivating an environment primed for adaptability and success.',
        ],
    ];

    $image = asset('img/uploads/thrive-upcoming-cohorts.jpg');
@endphp

<section class="py-6 lg:py-12">
    <div class="px-4 md:px-8 relative max-w-7xl mx-auto">
        <div class="md:grid grid-cols-2 gap-16 items-center">
            <div class="min-h-full flex-1 flex flex-col lg:flex-row items-start py-4">
                <div class="md:sticky top-28">
                    <div class="relative -rotate-1 shadow-xl flex items-center justify-center aspect-[2/0.8]">
                        <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                            <img class="rotate-6 scale-125 size-full object-top" src="{{ $image }}"
                                alt="" />
                        </div>

                        <div
                            class="rounded-xl absolute inset-0 flex items-center justify-center bg-black/50 text-white">
                            <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                                <span class="font-light">Upcoming </span>
                                Cohorts
                            </h2>
                        </div>
                    </div>

                    <div class="hidden md:block">
                        <p class="mt-6 text-lg/loose uppercase">
                            You can't enroll in any of these cohorts? Don't worry, There's usually a cohort you can join
                            at
                            the start of every quarter.
                        </p>

                        <p class="mt-4 text-xl/relaxed opacity-70">
                            There are many leadership and management programs out there, so
                        </p>

                        <h2 class="italic mt-4 text-2xl lg:text-4xl/tight font-bold uppercase">
                            Why <span class="font-light">Thrive?</span>
                        </h2>

                        <div class="mt-3">
                            <x-faqs :data="$faqs" />
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex flex-col gap-2">
                @php
                    $dates = [
                        [
                            'month' => 'September',
                            'year' => 2024,
                            'description' =>
                                'Secure your place in the September cohort of "Thrive in the Middle" and take your leadership ability to new heights!',
                        ],
                        [
                            'month' => 'January',
                            'year' => 2025,
                            'description' =>
                                'Start your New Year with a transformative step forward—join our January cohort of "Thrive in the Middle" and redefine your leadership journey for 2025!',
                        ],
                        [
                            'month' => 'April',
                            'year' => 2025,
                            'description' =>
                                'Gear up for a transformative Q3 with "Thrive in the Middle" this April. Secure your spot now and take your leadership ability to new heights!',
                        ],
                    ];
                @endphp

                <div class="divide-y divide-stroke">
                    @foreach ($dates as $date)
                        <div class="py-6 flex flex-col gap-2 items-start">
                            <h5 class="text-2xl font-bold uppercase">
                                <span class="outline-text">{{ $date['month'] }}</span>
                                {{ $date['year'] }}
                            </h5>

                            <p class="-mt-1 text-lg/loose opacity-70">
                                {{ $date['description'] }}
                            </p>

                            <div class="mt-2">
                                <a href="{{ url('/thrive-in-the-middle/form') }}?cohort={{ $date['month'] }} - {{ $date['year'] }}"
                                    class="btn btn-sm w-full md:w-auto">
                                    Enroll today
                                </a>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{-- <x-faqs :data="$faqs" /> --}}
            </div>
        </div>
    </div>
</section>
