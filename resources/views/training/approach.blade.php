@php
    $faqs = [
        [
            'icon' =>
                'M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z',
            'question' => 'Tailored for Diverse Audiences',
            'answer' =>
                "WhyLead's training approach is meticulously crafted to resonate with learners across generations, cultures, and hierarchies while mirroring real-life scenarios.",
        ],
        [
            'icon' =>
                'M3.75 3v11.25A2.25 2.25 0 0 0 6 16.5h2.25M3.75 3h-1.5m1.5 0h16.5m0 0h1.5m-1.5 0v11.25A2.25 2.25 0 0 1 18 16.5h-2.25m-7.5 0h7.5m-7.5 0-1 3m8.5-3 1 3m0 0 .5 1.5m-.5-1.5h-9.5m0 0-.5 1.5m.75-9 3-3 2.148 2.148A12.061 12.061 0 0 1 16.5 7.605',
            'question' => 'Comprehensive Learning Design',
            'answer' =>
                'Our approach ensures a comprehensive learning experience. Instilling knowledge, cultivating a transformative attitude shift, honing essential skills, and fostering the formation of lasting habits.',
        ],
        [
            'icon' =>
                'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
            'question' => 'Interactive and Relevant Sessions',
            'answer' =>
                'Each session integrates diverse learning modalities, including lecture notes, enriching videos, individual assessments, and engaging group activities.',
        ],
        [
            'icon' =>
                'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',

            'question' => 'Aligned with Your Business DNA',
            'answer' =>
                'We use your business model, strategy, and company culture to develop the context of our training so everything trickles back to your organization.',
        ],
    ];

    $image = $getImage('Our Learning Approach Image');
@endphp

<section id="careers" class="pt-6 lg:pt-12">
    <div class="px-4 md:px-8 relative max-w-7xl mx-auto">
        <div class="md:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top" src="{{ $image }}"
                            alt="" />
                    </div>
                </a>
            </div>

            <div class="flex flex-col gap-2">
                <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                    Our <span class="font-light">Learning </span>
                    Approach
                </h2>

                <p class="mt-0.5 text-lg/loose uppercase">
                    Transcends traditional learning approaches, enabling individuals to thrive in
                    the dynamic landscapes of today.
                </p>

                <p class="mt-1 text-base/relaxed opacity-70">
                    Meticulously crafted to resonate with learners across generations,
                    cultures, and hierarchies while mirroring real-life scenarios.
                </p>

                <x-faqs :data="$faqs" />

                <div class="mt-5">
                    <p class="mb-3 text-base/relaxed opacity-70">
                        Please tell us your capacity needs.
                    </p>

                    <a href="{{ url('/contacts?interest=Training') }}" class="btn w-full md:w-auto">
                        Let Us Help You Solve Them
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

{{-- <section class="py-12 lg:pt-24 lg:pb-24 border-b border-stroke">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="lg:grid grid-cols-12 gap-12 items-start">
            <div class="pb-12 col-span-6 relative min-h-full flex flex-col">
                <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase text-accent dark:text-white">
                    Our <span class="font-light">Learning </span>
                    <span class="hidden md:inline"><br /></span>
                    Approach
                </h2>

                <p class="mt-4 text-xl/loose font-light">
                    With WhyLead, training transcends traditional learning approaches, enabling individuals to thrive in
                    the dynamic landscapes of today.
                </p>

                <p class="mt-4 text-xl/loose font-light">
                    Our training approach is meticulously crafted to resonate with learners across generations,
                    cultures, and hierarchies while mirroring real-life scenarios.
                </p>

                <div class="mt-8">
                    <p class="text-xl/loose font-light">
                        Not sure exactly what you're looking for?
                    </p>

                    <a href="#programmes" class="mt-4 btn w-full md:w-auto">
                        Let us help you find it
                    </a>
                </div>
            </div>

            <div class="col-span-6 pt-6 flex flex-col gap-2">
                <div class="flex-1 flex flex-col gap-12">
                    @foreach ($steps as $step)
                        <div class="text-xl flex items-start gap-4">
                            <div class="rounded-lg bg-gradient-to-br from-accent via-accent/90 to-accent/95">
                                <div
                                    class="bg-gradient-to-br from-primary to-primary/20 text-white size-10 flex items-center justify-center rounded-lg">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                                    </svg>
                                </div>
                            </div>

                            <div class="flex-1 -mt-px">
                                <h3 class="text-lg font-semibold">
                                    {{ $step['title'] }}
                                </h3>

                                <p class="text-sm/loose opacity-70">
                                    {{ $step['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section> --}}
