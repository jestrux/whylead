@php
    $steps = [
        [
            'icon' =>
                'M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z',
            'title' => 'Those who join us seek a meaningful career, not simply a job.',
            'description' =>
                "Here, your big ideas find a home, equipped with the tools, technology, and training to thrive. Your new role is just the beginning, with boundless opportunities for growth and advancement. We foster a culture of perpetual learning, and if you share our passion for growth, you'll find your place here.",
            // "Those who thrive here are the ones committed to building a career, not just cashing a paycheck. We're not just offering a job; we're inviting you to embark on a fulfilling journey. Here, your big ideas find a home, equipped with the tools, technology, and training to thrive. Your new role is just the beginning, with boundless opportunities for growth and advancement. We foster a culture of perpetual learning, and if you share our passion for growth, you'll find your place here.",
        ],
        [
            'icon' =>
                'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',
            'title' => 'Are you passionate about making a difference?',
            'description' =>
                "At WhyLead, it's more than just business—it's about our impact and how we achieve it. We actively support initiatives that enhance our work, enrich our lives, and contribute to our communities.",
        ],
    ];
@endphp

<section
    class="py-12 lg:py-20 border-t border-stroke bg-gradient-to-br from-accent via-accent/90 to-accent/95 dark:from-content/5 dark:to-content/5 dark:via-content/5 text-white">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="lg:grid grid-cols-12 gap-12 items-start">
            <div class="pb-12 col-span-6 relative min-h-full flex flex-col">
                <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase text-white">
                    Who <span class="font-light">We Look </span>
                    For
                </h2>

                <p class="mt-4 text-xl/loose font-light">
                    Those who thrive here are the ones committed to building a career, not just cashing a paycheck.
                    We're not just offering a job; we're inviting you to embark on a fulfilling journey.
                </p>

                <div class="mt-4">
                    <a href="#" class="mt-4 btn w-full md:w-auto">
                        Come Join our team
                    </a>
                </div>
            </div>

            <div class="col-span-6 pt-6 flex flex-col gap-2">
                {{-- <p class="text-xl/loose font-light">
                    At the core of our methodology lies
                    the KASH model, ensuring a comprehensive learning experience. Our courses instill Knowledge/Insight,
                    cultivate a transformative Attitude shift, hone essential Skills, and foster the formation of
                    lasting Habits.
                </p>

                <p class="text-xl/loose font-light mt-5">
                    Each session integrates diverse learning modalities, including lecture notes, enriching videos,
                    individual assessments, and engaging group activities.

                    We use your business model, strategy, and company culture to develop the context of our training so
                    everything trickles back to your organization
                </p> --}}

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
</section>
