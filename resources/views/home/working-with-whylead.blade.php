<section class="py-8 lg:py-14">
    <div class="relative max-w-7xl mx-auto px-4 md:px-8">
        <div class="flex flex-col gap-4 lg:gap-8 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">What </span>
                        working with<span class="hidden md:inline"><br /></span> whylead
                        <span class="outline-text"> looks like</span>
                    </span>
                </h2>
            </div>

            <ul role="list" class="flex flex-col md:grid grid-cols-2 lg:grid-cols-3 gap-4 lg:gap-8">
                @php
                    $_g_home = \Statamic\Facades\GlobalSet::find('home')->inCurrentSite();
                    $steps = collect($_g_home->get('service_features') ?? [])->map(fn($v) => [
                        'icon' => $v['icon'] ?? '',
                        'title' => $v['title'] ?? '',
                        'description' => $v['description'] ?? '',
                    ])->all();
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="bg-gradient-to-br from-accent via-accent/90 to-accent/95 text-white relative smin-h-full w-full px-8 py-6 shadow rounded-3xl overflow-hidden">
                        <div
                            class="absolute opacity-5 dark:opacity-[0.03] {{ $loop->index == 0 ? 'right-[23%]' : '-left-[25%]' }}">
                            @include('common.icon')
                        </div>

                        @if ($loop->index == 1)
                            <div class="absolute opacity-5 dark:opacity-[0.03] right-[23%]">
                                @include('common.icon')
                            </div>
                        @endif


                        <span
                            class="relative size-10 text-white bg-gradient-to-br from-primary to-primary/20 sdark:from-accent sdark:to-content/10 rounded-xl flex items-center justify-center">
                            <svg class="size-6 drop-shadow" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                            </svg>
                        </span>

                        {{-- <div class="flex-1 min-h-8"></div> --}}

                        <div class="mt-6 relative">
                            <h3 class="text-xl font-semibold">
                                {{ $step['title'] }}
                            </h3>

                            <p class="mt-2 text-sm/loose opacity-70">
                                {{ $step['description'] }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                <p class="text-xl opacity-70">
                    We are on a mission to help organizations thrive
                </p>
                <a href="{{ url('/contacts') }}" class="mt-3 btn w-full md:w-auto">
                    Hire WhyLead today
                </a>
            </div>
        </div>
    </div>
</section>
