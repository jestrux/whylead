@php
    if (!function_exists('turnUrlIntoHyperlink')) {
        function turnUrlIntoHyperlink($string)
        {
            //The Regular Expression filter
            $reg_exUrl =
                "/(?i)\b((?:https?:\/\/|www\d{0,3}[.]|[a-z0-9.\-]+[.][a-z]{2,4}\/)(?:[^\s()<>]+|\(([^\s()<>]+|(\([^\s()<>]+\)))*\))+(?:\(([^\s()<>]+|(\([^\s()<>]+\)))*\)|[^\s`!()\[\]{};:'\".,<>?«»“”‘’]))/";

            // Check if there is a url in the text
            if (preg_match_all($reg_exUrl, $string, $url)) {
                // Loop through all matches
                foreach ($url[0] as $newLinks) {
                    if (strstr($newLinks, ':') === false) {
                        $link = 'http://' . $newLinks;
                    } else {
                        $link = $newLinks;
                    }

                    // Create Search and Replace strings
                    $search = $newLinks;
                    $replace =
                        '<a class="text-primary" href="' .
                        $link .
                        '" title="' .
                        $newLinks .
                        '" target="_blank">' .
                        $link .
                        '</a>';
                    $string = str_replace($search, $replace, $string);
                }
            }

            //Return result
            return $string;
        }
    }

    $episode = pierData('Podcast', ['whereSlug' => $slug, 'first' => true])['data'] ?? null;
    $episodeExists = isset($episode->title);

    $episodeDescription = '';
    $shareLink = '';

    if ($episodeExists) {
        $episodeDescription = turnUrlIntoHyperlink($episode->description);
        $shareLink = url('/podcast/' . $episode->slug);
    }
@endphp

@extends('layout.index')

@if ($episodeExists)
    @section('image', $episode->image)
    @section('title', $episode->title)
    @section('description', strip_tags($episodeDescription))
@else
    @section('title', 'Podcast | WhyLead')
    @section('description', 'Podcast for WhyLead')
@endif

@section('content')
    <div class="grid grid-cols-12 items-start max-w-7xl mx-auto px-8 py-8 xl:py-10">
        <div class="col-span-4 min-h-full">
            @include('podcast.sidebar')
        </div>

        <div class="col-span-8">
            <div class="max-w-3xl mx-auto px-12" x-data="{
                copied: false,
                onEpisodeLinkCopied(e) {
                    this.copied = true;

                    setTimeout(() => {
                        this.copied = false;
                    }, 2000);
                }
            }" x-on:episode-link-copied.window="onEpisodeLinkCopied">
                <div>
                    <div class="mb-8">
                        <a href="{{ url('/podcast') }}" class="h-6 text-sm font-medium text-primary flex items-center gap-2">
                            <svg class="size-5" viewBox="0 0 24 24" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M7.72 12.53a.75.75 0 0 1 0-1.06l7.5-7.5a.75.75 0 1 1 1.06 1.06L9.31 12l6.97 6.97a.75.75 0 1 1-1.06 1.06l-7.5-7.5Z"
                                    clip-rule="evenodd" />
                            </svg>


                            <span class="text-content">
                                All Episodes
                            </span>
                        </a>
                    </div>
                    @if (!$episodeExists)
                        <div
                            class="z-[-1] py-20 pointer-events-none rounded-xl bg-content/5 flex justify-center items-center text-xl font-mono tracking-widest">
                            Episode not found
                        </div>
                    @else
                        <article>
                            <div class="md:px-4 lg:px-0 flex items-center gap-6">
                                {{-- <div class="flex-shrink-0 relative border size-20 overflow-hidden rounded-xl bg-content/5 shadow-xl"
                                    href="#">
                                    <img alt=""class="absolute size-full" src="{{ $episode->image }}" />
                                </div> --}}

                                <div class="flex-1 flex flex-col items-start">
                                    <h2 class="font-semibold">
                                        Episode {{ $episode->number }} <span class="opacity-50">&mdash;</span>
                                        <time datetime="{{ $episode->date }}" class="font-mono opacity-50">
                                            {{ $episode->dateMeta->regular }}
                                        </time>
                                    </h2>

                                    @isset($episode->featuring)
                                        <p class="mt-2 font-mono opacity-60">
                                            Ft. {{ $episode->featuring }}
                                        </p>
                                    @endisset

                                    <p class="mt-3 text-3xl font-medium">
                                        {{ $episode->title }}
                                        {{-- He’s going to need you to go
                                        ahead and come in on Saturday, but there’s a lot more to the story than you
                                        think. --}}
                                    </p>
                                    <div class="mt-4 flex items-center gap-4">
                                        @php
                                            $actions = [
                                                [
                                                    'label' => 'Facebook',
                                                    'icon' =>
                                                        'M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z',
                                                    'url' => 'http://www.facebook.com/sharer.php?u=' . $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Twitter(X)',
                                                    'icon' =>
                                                        'M18.901 1.153h3.68l-8.04 9.19L24 22.846h-7.406l-5.8-7.584-6.638 7.584H.474l8.6-9.83L0 1.154h7.594l5.243 6.932ZM17.61 20.644h2.039L6.486 3.24H4.298Z',
                                                    'url' =>
                                                        'http://twitter.com/intent/tweet?text=Listening to "' .
                                                        $episode->title .
                                                        '" at  &url=' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'LinkedIn',
                                                    'icon' =>
                                                        'M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z',
                                                    'url' =>
                                                        'https://www.linkedin.com/sharing/share-offsite/?url=' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Whatsapp',
                                                    'icon' =>
                                                        'M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413Z',
                                                    'url' =>
                                                        'https://api.whatsapp.com/send/?text=Listening to "' .
                                                        $episode->title .
                                                        '" at  ' .
                                                        $shareLink,
                                                    'external' => true,
                                                ],
                                                [
                                                    'label' => 'Copy link',
                                                    'icon' =>
                                                        'M19.902 4.098a3.75 3.75 0 0 0-5.304 0l-4.5 4.5a3.75 3.75 0 0 0 1.035 6.037.75.75 0 0 1-.646 1.353 5.25 5.25 0 0 1-1.449-8.45l4.5-4.5a5.25 5.25 0 1 1 7.424 7.424l-1.757 1.757a.75.75 0 1 1-1.06-1.06l1.757-1.757a3.75 3.75 0 0 0 0-5.304Zm-7.389 4.267a.75.75 0 0 1 1-.353 5.25 5.25 0 0 1 1.449 8.45l-4.5 4.5a5.25 5.25 0 1 1-7.424-7.424l1.757-1.757a.75.75 0 1 1 1.06 1.06l-1.757 1.757a3.75 3.75 0 1 0 5.304 5.304l4.5-4.5a3.75 3.75 0 0 0-1.035-6.037.75.75 0 0 1-.354-1Z',
                                                    'onClick' => "copyLink('$episode->_id', '$shareLink')",
                                                ],
                                            ];
                                        @endphp

                                        <div class="flex items-center gap-3">
                                            <span
                                                x-on:click="listen = listen == {{ $episode->_id }} ? null : {{ $episode->_id }}"
                                                class="flex items-center gap-x-3 text-sm font-semibold opacity-50">
                                                <span aria-hidden="true">Share</span>
                                            </span>

                                            @foreach ($actions as $action)
                                                @php
                                                    $width = 16;
                                                    $i = $loop->index;

                                                    if ($i == 0) {
                                                        $width = 18;
                                                    }

                                                    if ($i == 1) {
                                                        $width = 13;
                                                    }

                                                    $isLast = $i == count($actions) - 1;
                                                @endphp

                                                @if ($isLast)
                                                    <button title="{{ $action['label'] }}"
                                                        onclick="copyLink('{{ $shareLink }}')"
                                                        class="size-7 border border-stroke rounded-full flex items-center justify-center transition-colors hover:bg-content/[0.08] dark:hover:bg-content/20 hover:opacity-90 active:opacity-80 active:scale-105 focus:outline-none">
                                                        <svg width="{{ $width }}" fill="currentColor" role="img"
                                                            viewBox="0 0 24 24">
                                                            <path d="{{ $action['icon'] }}" />
                                                        </svg>
                                                    </button>
                                                @else
                                                    <a title="{{ $action['label'] }}" href="{{ $action['url'] }}"
                                                        target="_blank"
                                                        class="size-7 border border-stroke rounded-full flex items-center justify-center transition-colors hover:bg-content/[0.08] dark:hover:bg-content/20 hover:opacity-90 active:opacity-80 active:scale-105 focus:outline-none">
                                                        <svg width="{{ $width }}" fill="currentColor" role="img"
                                                            viewBox="0 0 24 24">
                                                            <path d="{{ $action['icon'] }}" />
                                                        </svg>
                                                    </a>
                                                @endif
                                            @endforeach
                                        </div>

                                        <div x-cloak x-show="copied" x-transition class="text-sm text-primary">
                                            Episode link copied
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-6 relative">
                                <div
                                    class="z-[-1] pointer-events-none absolute inset-0 rounded-xl bg-content/5 flex justify-center items-center text-xl font-mono tracking-widest">
                                    Loading player...
                                </div>

                                <iframe width="100%" height="200px" src="{{ $episode->link }}?iframe=true"
                                    frameborder="0"></iframe>
                            </div>

                            <div class="mt-6 text-base/loose">
                                {!! $episodeDescription !!}
                            </div>
                        </article>
                    @endif
                </div>
            </div>
        </div>
    </div>
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

        async function copyLink(link) {
            try {
                try {
                    await navigator.clipboard.writeText(link);
                } catch (error) {
                    await copyTextToClipboard(link);
                }

                window.dispatchEvent(new CustomEvent("episode-link-copied"));
            } catch (error) {
                alert('Failed to copy link!');
            }
        }
    </script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
