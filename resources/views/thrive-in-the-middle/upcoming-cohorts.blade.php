@php
    $faqs = \Statamic\Facades\Entry::query()
        ->where('collection', 'faqs')
        ->whereTaxonomy('faq_section::thrive_in_the_middle')
        ->get()
        ->map(fn($e) => ['question' => $e->get('title'), 'answer' => $e->get('answer')])
        ->values()
        ->all();

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
                            Can't enroll in any of these cohorts? Don't worry, we run two cohorts every year so there's always another opportunity coming up.
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
                    $dates = \Statamic\Facades\Entry::query()
                        ->where('collection', 'cohorts')
                        ->orderBy('order')
                        ->get()
                        ->map(fn($e) => [
                            'month' => $e->get('month'),
                            'year' => $e->get('year'),
                            'label' => $e->get('label'),
                            'description' => $e->get('description'),
                        ])
                        ->values()
                        ->all();
                @endphp

                <div class="divide-y divide-stroke">
                    @foreach ($dates as $date)
                        <div class="py-6 flex flex-col gap-2 items-start">
                            <h5 class="text-2xl font-bold uppercase">
                                <span class="outline-text">{{ $date['month'] }}</span>
                                {{ $date['year'] }}
                            </h5>

                            @if (!empty($date['label']))
                                <span class="inline-flex text-xs/none font-bold py-1.5 pt-2 px-2.5 rounded-full bg-content/5 border-2 border-stroke uppercase tracking-widest">
                                    {{ $date['label'] }}
                                </span>
                            @endif

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
