@extends('layout.index')

@section('title', 'Podcast | WhyLead')

@section('description', 'Podcast for WhyLead')

@section('content')
    @pierdata("Podcast")
    <div class="grid grid-cols-12 items-start max-w-7xl mx-auto px-8 py-8 xl:py-10">
        <div class="col-span-4 sticky -top-16 xl:-top-24">
            @include('podcast.sidebar')
        </div>

        <div class="col-span-8">
            <div class="max-w-3xl mx-auto px-12 pt-4" x-data="{ listen: null, filter: 'All', toggleFilter(newFilter) { this.filter = this.filter == newFilter ? null : newFilter; }, get popular() { return this.filter == 'Popular' }, get latest() { return this.filter == 'Latest' } }">
                <h3 class="text-3xl font-bold">Podcast Episodes</h3>

                <div class="sticky top-16 z-10 h-16 bg-canvas flex items-center gap-3">
                    @foreach (['All', 'Latest', 'Popular'] as $item)
                        <button
                            class="inline-flex text-xs/none font-bold py-2 px-3.5 rounded-full border border-stroke uppercase tracking-widest"
                            x-bind:class="filter == '{{ $item }}' && 'bg-content/10'"
                            x-on:click="filter = '{{ $item }}'">
                            {{ $item }}
                        </button>
                    @endforeach
                </div>

                <div class="divide-y divide-stroke">
                    @foreach ($data as $episode)
                        <article x-data="{ total_plays: {{ $episode->total_plays }}, index: {{ $loop->index }} }" x-show="(!popular || total_plays > 200) && (!latest || index < 4)"
                            x-transition class="py-6">
                            <div class="md:px-4 lg:px-0 flex flex-row-reverse items-center gap-6">
                                <div class="flex-shrink-0 relative border size-20 overflow-hidden rounded-xl bg-content/5 shadow-xl"
                                    href="#">
                                    <img alt=""class="absolute size-full" src="{{ $episode->image }}" />
                                </div>

                                <div class="flex-1 flex flex-col items-start">
                                    <h2 id="episode-5-title" class="mt-2 text-sm font-bold">
                                        <a href="{{ $episode->link }}" target="_blank" class="hover:opacity-80">
                                            Episode {{ $episode->number }} <span class="opacity-50">&mdash;</span>
                                            <time datetime="2022-02-24T00:00:00.000Z"
                                                class="font-mono text-sm leading-7 opacity-50">
                                                {{ $episode->dateMeta->regular }}
                                            </time>
                                        </a>
                                    </h2>

                                    @isset($episode->featuring)
                                        <p datetime="2022-02-24T00:00:00.000Z" class="font-mono text-sm leading-7 opacity-50">
                                            Ft. {{ $episode->featuring }}
                                        </p>
                                    @endisset

                                    <p class="mt-1 text-lg leading-7 opacity-80">
                                        {{ $episode->title }}
                                        {{-- He’s going to need you to go
                                        ahead and come in on Saturday, but there’s a lot more to the story than you
                                        think. --}}
                                    </p>
                                    <div class="mt-4 flex items-center gap-4">
                                        <button
                                            x-on:click="listen = listen == {{ $episode->_id }} ? null : {{ $episode->_id }}"
                                            class="flex items-center gap-x-3 text-sm font-bold leading-6 text-primary hover:opacity-90 active:opacity-80">
                                            <svg aria-hidden="true" viewBox="0 0 10 10" class="h-2.5 w-2.5 fill-current">
                                                <path
                                                    d="M8.25 4.567a.5.5 0 0 1 0 .866l-7.5 4.33A.5.5 0 0 1 0 9.33V.67A.5.5 0 0 1 .75.237l7.5 4.33Z" />
                                            </svg>
                                            <span aria-hidden="true">Listen</span>
                                        </button>
                                        <span aria-hidden="true" class="text-sm font-bold text-slate-400">/</span>
                                        @php
                                            $actions = [
                                                [
                                                    'label' => 'Facebook',
                                                    'url' => 'http://www.facebook.com/sharer.php?u=' . $episode->link,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Twitter',
                                                    'url' =>
                                                        'http://twitter.com/intent/tweet?text=Listening to "' .
                                                        $episode->title .
                                                        '" at  &url=' .
                                                        $episode->link,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'LinkedIn',
                                                    'url' =>
                                                        'https://www.linkedin.com/sharing/share-offsite/?url=' .
                                                        $episode->link,
                                                    'external' => true,
                                                ],
                                            ];
                                        @endphp

                                        <x-dropdown-menu :actions="$actions">
                                            <span
                                                class="flex items-center text-sm font-bold leading-6 text-[#5C4EB8] dark:text-content/60 hover:opacity-80 active:opacity-90"
                                                aria-label="Show notes for episode 5: Bill Lumbergh" href="/5">
                                                Share
                                            </span>
                                        </x-dropdown-menu>
                                    </div>
                                    {{-- <div id='buzzsprout-small-player'></div>
                                    <script type='text/javascript' charset='utf-8'
                                        src='{{$episode->link}}.js?container_id=buzzsprout-small-player&player=small'></script> --}}
                                </div>
                            </div>

                            <div class="transition-all duration-200 relative"
                                x-bind:style="height: listen == {{ $episode->_id }} ? '200px' : 0">

                                <div x-cloak x-show="listen == {{ $episode->_id }}"
                                    class="pointer-events-none absolute inset-0 rounded-lg bg-content/5">
                                </div>

                                <template x-if="listen == {{ $episode->_id }}">
                                    <div class="relative mt-3 w-full">
                                        <iframe class="mt-3" width="100%" height="200px"
                                            src="{{ $episode->link }}?iframe=true" frameborder="0"></iframe>
                                    </div>
                                </template>
                            </div>
                        </article>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    @endpierdata()
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
