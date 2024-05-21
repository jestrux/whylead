<section id="ourValues" x-intersect.threshold.20="activeSection = 'ourValues'" class="pb-10 lg:pt-8 lg:pb-16">
    <div class="relative max-w-7xl mx-auto px-4 lg:px-8">
        <div class="flex flex-col gap-4 lg:gap-8 items-center justify-center">
            <div class="max-w-2xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">Our</span>
                        Values
                    </span>
                </h2>

                <p class="text-lg font-light">
                    These values define our culture and drive our commitment.
                </p>
            </div>

            <ul role="list" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @php
                    $steps = [
                        [
                            'icon' => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
                            'title' => 'Ubuntu Kwanza',
                            'description' =>
                                'Treating All as Ends, Never Means. working to create win-win outcomes for all earthlings.',
                        ],
                        [
                            'icon' =>
                                'M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z',
                            'title' => 'Game 6',
                            'description' =>
                                'We do what we say we do. we are who we say we are. we seize every opportunity we say yes to. We go ALL-IN in and Give our absolute best. ',
                        ],
                        [
                            'icon' => 'M10.5 6a7.5 7.5 0 1 0 7.5 7.5h-7.5V6Z',
                            'title' => 'Data-Driven',
                            'description' =>
                                'If we have data, let’s look at data. If all we have are opinions, let’s go look for data.',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="bg-gradient-to-br from-accent via-accent/90 to-accent/95 text-white relative min-h-full w-full px-8 py-6 shadow rounded-3xl overflow-hidden">
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
        </div>
    </div>
</section>
