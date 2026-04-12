@php
    $faqs = \Statamic\Facades\Entry::query()
        ->where('collection', 'faqs')
        ->whereTaxonomy('faq_section::careers')
        ->get()
        ->map(fn($e) => ['question' => $e->get('title'), 'answer' => $e->get('answer')])
        ->values()
        ->all();

    $steps = collect($page->get('career_benefits') ?? [])->map(fn($v) => [
        'icon' => $v['icon'] ?? '',
        'image' => isset($v['image']) ? asset('img/uploads/' . $v['image']) : '',
        'title' => $v['title'] ?? '',
        'description' => $v['description'] ?? '',
    ])->all();

    $image = asset('img/uploads/about-who-we-look-for.jpg');
@endphp

<section id="careers" x-intersect.threshold.5="activeSection = 'careers'" class="py-12">
    <div class="px-4 md:px-8 relative max-w-7xl mx-auto">
        <div class="mb-10 lg:mb-20 flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold">
                    <span class="uppercase">
                        <span class="outline-text">
                            Join Our
                        </span>
                        thriving family
                    </span>
                </h2>

                <p class="text-lg font-light">
                    We offer transformative career opportunities that blend
                    professional growth with personal fulfillment within a globally connected,
                    value-driven community
                </p>
            </div>

            <ul role="list" class="flex flex-col md:grid grid-cols-2 lg:grid-cols-3 gap-3 lg:gap-10">
                @foreach ($steps as $step)
                    <li
                        class="bg-card dark:bg-content/5 border border-stroke relative min-h-full w-full p-3 rounded-2xl overflow-hidden">
                        <div class="-m-4s h-32 relative rounded-t-xl rounded-b-md overflow-hidden">
                            <img class="size-full object-cover rounded-t-xl rounded-b-md" src="{{ $step['image'] }}"
                                alt="" />

                            <div
                                class="bg-black/50 dark:bg-black/80 text-white absolute inset-0 flex flex-col items-center justify-center gap-3">
                                <svg class="size-8 drop-shadow text-[#fa9158]" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                                </svg>

                                <h3 class="text-xl lg:text-2xl font-semibold uppercase tracking-widest">
                                    {{ $step['title'] }}
                                </h3>
                            </div>
                        </div>


                        <p class="mt-2 text-sm/loose opacity-70">
                            {{ $step['description'] }}
                        </p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="lg:grid grid-cols-2 gap-16 items-center">
            <div class="md:hidden mb-3">
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
                    Are You The One <span class="font-light">We Are Looking For?</span>
                </h2>

                <p class="mt-2 text-lg/relaxed uppercase">
                    We are looking for those committed to building a career, not just cashing a paycheck.
                </p>

                <div class="mt-4">
                    <p class="mb-1 text-base/relaxed opacity-70">
                        Evaluate your fit with our compatibility checklist
                    </p>

                    <div class="-mx-4 md:mx-0">
                        <x-faqs :data="$faqs" />
                    </div>
                </div>

                <p class="mt-4 text-base/relaxed opacity-70">
                    Those who thrive here are the ones who are:
                </p>

                @php
                    $checklist = collect($page->get('job_qualifications') ?? [])->map(fn($v) => [
                        'icon' => $v['icon'] ?? '',
                        'title' => $v['title'] ?? '',
                    ])->all();
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
                    <a href="{{ url('/apply-for-job') }}" class="btn w-full md:w-auto">
                        Come Join our team
                    </a>
                </div>
            </div>

            <div class="-rotate-1 shadow-xl flex-1 hidden lg:flex items-center justify-center aspect-[2/1.8] relative">
                <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                    <img class="rotate-6 scale-125 size-full" src="{{ $image }}" alt="" />
                </div>
            </div>
        </div>
    </div>
</section>
