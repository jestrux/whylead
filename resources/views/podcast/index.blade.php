@extends('layout.index')

@section('title', 'Podcast | WhyLead')
@section('description',
    'A curated list of the best conversations with thinker practitioners across the world hosted by
    our our principle consultant Ben Owden.')
@section('image', asset('img/uploads/page-thumbnail-podcast.jpg'))

@section('content')
    @pierdata("Podcast")
    <div class="md:grid grid-cols-12 items-start max-w-7xl mx-auto md:px-8 md:py-8 xl:py-10">
        <div class="col-span-4 min-h-full mt-8 md:mt-0">
            @include('podcast.sidebar')
        </div>

        <div class="col-span-8">
            @php
                $openFirst = isset($_GET['openFirst']);
            @endphp
            <div class="max-w-3xl mx-auto px-4 lg:px-12 pt-4" x-data="{
                listen: '{{ $openFirst ? $data[0]->_id : null }}',
                filter: 'All',
                copiedLinkFor: null,
                setFilter(newFilter) {
                    this.filter = newFilter;
                    window.scrollTo({ top: 0 });
                },
                get popular() { return this.filter == 'Popular' },
                get latest() { return this.filter == 'Latest' },
                onEpisodeLinkCopied(e) {
                    this.copiedLinkFor = e.detail;

                    setTimeout(() => {
                        this.copiedLinkFor = null;
                    }, 2000);
                }
            }"
                x-on:episode-link-copied.window="onEpisodeLinkCopied">
                <h3 class="text-3xl font-bold px-4 md:px-0 mt-6 md:mt-0">
                    Podcast Episodes
                </h3>

                <div class="-mb-5 sticky top-12 md:top-16 z-10 h-16 px-4 md:px-0 bg-canvas flex items-center gap-3">
                    @foreach (['All', 'Latest', 'Popular'] as $item)
                        <button
                            class="inline-flex text-xs/none font-bold py-2 px-3.5 rounded-full border uppercase tracking-widest"
                            x-bind:class="filter == '{{ $item }}' ? 'bg-primary text-white border-primary' :
                                'text-content/70 bg-canvas border-stroke'"
                            x-on:click="setFilter('{{ $item }}')">
                            {{ $item }}
                        </button>
                    @endforeach
                </div>

                <div class="divide-y divide-stroke">
                    @foreach ($data as $episode)
                        @php
                            $shareLink = url('/podcast/' . $episode->slug);
                        @endphp

                        <article x-data="{
                            total_plays: {{ $episode->total_plays }},
                            index: {{ $loop->index }}
                        }" x-show="(!popular || total_plays > 200) && (!latest || index < 4)"
                            x-transition class="py-6 px-4 md:px-0">
                            <div class="lg:px-4 md:px-0 flex flex-row-reverse items-center gap-6">
                                <div class="flex-shrink-0 relative border size-20 overflow-hidden rounded-xl bg-content/5 shadow-xl"
                                    href="#">
                                    <img alt=""class="absolute size-full" src="{{ $episode->image }}" />
                                </div>

                                <div class="flex-1 flex flex-col items-start">
                                    <h2 id="episode-5-title" class="mt-2 text-sm font-bold">
                                        <a href="{{ $shareLink }}" class="hover:opacity-80">
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
                                        <span x-cloak aria-hidden="true" class="text-sm font-bold text-slate-400">/</span>
                                        @php
                                            $actions = [
                                                [
                                                    'label' => 'Facebook',
                                                    'url' => 'http://www.facebook.com/sharer.php?u=' . $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Twitter',
                                                    'url' =>
                                                        'http://twitter.com/intent/tweet?text=Listening to "' .
                                                        $episode->title .
                                                        '" at  &url=' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'LinkedIn',
                                                    'url' =>
                                                        'https://www.linkedin.com/sharing/share-offsite/?url=' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Whatsapp',
                                                    'url' =>
                                                        'https://api.whatsapp.com/send/?text=Listening to "' .
                                                        $episode->title .
                                                        '" at  ' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Copy link',
                                                    'onClick' => "copyLink('$shareLink', '$episode->_id')",
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

                                        <div x-cloak x-show="copiedLinkFor == {{ $episode->_id }}" x-transition
                                            class="ml-3 text-sm text-primary">
                                            Episode link copied
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="transition-all duration-200 relative"
                                x-bind:style="height: listen == {{ $episode->_id }} ? '200px' : 0">

                                <div x-cloak x-show="listen == {{ $episode->_id }}"
                                    class="pointer-events-none absolute inset-0 rounded-xl bg-content/5">
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
    <script>
        window.copyTextToClipboard = function(text) {
            return new Promise((res, rej) => {
                const textArea = document.createElement("textarea");
                textArea.value = text;
                textArea.style.top = "0";
                textArea.style.left = "0";
                textArea.style.position = "fixed";

                document.body.appendChild(textArea);
                textArea.focus();
                textArea.select();

                try {
                    const successful = document.execCommand('copy');

                    if (successful) resolve();

                    else reject();
                } catch (err) {
                    reject(err);
                }

                document.body.removeChild(textArea);
            });
        }

        async function copyLink(link, episodeId) {
            try {
                try {
                    await navigator.clipboard.writeText(link);
                } catch (error) {
                    await copyTextToClipboard(link);
                }

                window.dispatchEvent(new CustomEvent("episode-link-copied", {
                    detail: episodeId
                }));
            } catch (error) {
                alert('Failed to copy link!');
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
