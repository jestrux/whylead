<section class="bg-content/5 py-10 lg:py-20">
    <div class="max-w-5xl mx-auto px-8 flex flex-col gap-8 items-center">
        <div class="text-center">
            <h2 class="text-2xl lg:text-4xl font-bold uppercase tracking-wide">
                <span class="outline-text">Frequently
                    <span class="hidden md:inline"><br /></span>
                    asked
                </span>
                questions
            </h2>

            {{-- <p class="mt-3 text-xl leading-loose opacity-80">
                Here are some of the questions that people such as yourself ask us often.
            </p> --}}
        </div>

        @pierdata('FAQ')
        <div x-data="{
            expanded: -1,
            indices: {{ collect($data)->keys() }},
            get visibleIndices() {
                return this.indices.slice(0, 3);
            },
            shuffle(array) {
                return [...array].sort(() => Math.random() - 0.5);
            },
            init() {
                this.indices = this.shuffle(this.shuffle(this.indices));
            },
        }" class="flex-1 w-full border-b divide-y border-stroke divide-stroke">
            @foreach ($data as $e)
                @php
                    $i = $loop->index;
                    $entry = (object) $e;
                @endphp

                <button x-show="visibleIndices.includes({{ $i }})"
                    @if ($i > 3) x-cloak @endif
                    class="w-full text-left focus:outline-none flex gap-8 md:gap-4 pt-7 pb-2 px-4 md:px-0"
                    @click="expanded = expanded == {{ $i }} ? -1 : {{ $i }}">
                    <div class="flex-1">
                        <h3 class="mb-5 text-lg font-semibold md:text-lg md:leading-tight">
                            {{ $entry->question }}
                        </h3>
                        <div class="transition-all duration-200 max-h-0 overflow-hidden"
                            :style="expanded == {{ $i }} ? `max-height:  ${ $el.scrollHeight }px` : ''">
                            <p class="mb-3 mt-1 text-base leading-loose opacity-80">
                                {{ $entry->answer }}
                            </p>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between flex-shrink-0"
                        :class="{ ' rotate-180': expanded == {{ $i }} }">
                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor">
                            <path x-show="expanded != {{ $i }}" stroke-linecap="round"
                                stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" x-transition.opacity
                                x-transition:enter.duration.200ms.delay.100ms x-transition:leave.duration.200ms />
                            <path x-show="expanded == {{ $i }}" stroke-linecap="round"
                                stroke-linejoin="round" d="M19.5 12h-15" x-transition.opacity
                                x-transition:enter.duration.200ms x-transition:leave.duration.200ms.delay.100ms />
                        </svg>
                    </div>
                </button>
            @endforeach
        </div>
        @endpierdata()

        <p class="mt-4 md:mt-6s self-center text-center">
            Got more questions? We'd love to hear from you.
            <a href="#" class="text-primary font-semibold underline">
                Contact us now
            </a>
        </p>
    </div>
</section>
