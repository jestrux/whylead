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
            <div class="max-w-3xl mx-auto px-12 pt-4">
                <h3 class="text-3xl font-bold">Podcast Episodes</h3>

                <div class="divide-y divide-stroke">
                    @foreach ($data as $episode)
                        <article aria-labelledby="episode-5-title" class="py-6">
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
                                        <a href="{{ $episode->link }}" target="_blank"
                                            aria-label="Play episode 5: Bill Lumbergh"
                                            class="flex items-center gap-x-3 text-sm font-bold leading-6 text-primary hover:opacity-90 active:opacity-80">
                                            <svg aria-hidden="true" viewBox="0 0 10 10" class="h-2.5 w-2.5 fill-current">
                                                <path
                                                    d="M8.25 4.567a.5.5 0 0 1 0 .866l-7.5 4.33A.5.5 0 0 1 0 9.33V.67A.5.5 0 0 1 .75.237l7.5 4.33Z" />
                                            </svg>
                                            <span aria-hidden="true">Listen</span>
                                        </a>
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
                                </div>
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
    {{-- <script defer src="https://unpkg.com/@alpinejs/ui@3.13.3-beta.4/dist/cdn.min.js"></script> --}}
    {{-- <script defer src="https://unpkg.com/@alpinejs/focus@3.13.3/dist/cdn.min.js"></script> --}}

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
