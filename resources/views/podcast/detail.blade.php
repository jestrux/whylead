@php
    if (!function_exists('turnUrlIntoHyperlink')) {
        function turnUrlIntoHyperlink($string)
        {
            // Split the HTML into segments: those inside anchor tags and those outside
            $segments = preg_split('/(<a\s+[^>]*>.*?<\/a>)/i', $string, -1, PREG_SPLIT_DELIM_CAPTURE);

            // URL pattern matching http or https
            $reg_exUrl = "#https?://[^\s<>\"']+#i";

            // Process each segment
            foreach ($segments as $index => $segment) {
                // Skip if this is an anchor tag segment (odd indices after split)
                if ($index % 2 === 1) {
                    continue;
                }

                // Process URLs only in non-anchor segments
                if (preg_match_all($reg_exUrl, $segment, $urls)) {
                    foreach ($urls[0] as $url) {
                        $replace = sprintf(
                            '<a class="text-primary" href="%s" title="%s" target="_blank">%s</a>',
                            $url,
                            $url,
                            $url,
                        );
                        $segment = str_replace($url, $replace, $segment);
                    }
                    $segments[$index] = $segment;
                }
            }

            // Rejoin all segments
            return implode('', $segments);
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
    <div class="lg:grid grid-cols-12 items-start max-w-7xl mx-auto px-4 lg:px-8 py-8 xl:py-10">
        <div class="hidden lg:block col-span-4 min-h-full">
            @include('podcast.sidebar')
        </div>

        <div class="col-span-8">
            <div class="max-w-3xl mx-auto lg:px-12" x-data="{
                copied: false,
                onEpisodeLinkCopied(e) {
                    this.copied = true;

                    setTimeout(() => {
                        this.copied = false;
                    }, 2000);
                }
            }"
                x-on:episode-link-copied.window="onEpisodeLinkCopied">
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

                            <div class="mt-6 flex md:hidden flex-col items-start">
                                <span class="text-sm font-semibold opacity-50">
                                    <span aria-hidden="true">Listen On</span>
                                </span>

                                <ul role="list"
                                    class="mt-2 text-content/70 overflow-auto flex justify-center gap-6 text-base font-medium leading-7 opacity-70 sm:gap-2 lg:flex-col lg:gap-4">
                                    <li class="flex">
                                        <a class="group flex items-center" aria-label="Spotify"
                                            href="https://open.spotify.com/show/1VXv2qDPMpI0L28JjpnB82" target="_blank">
                                            <svg fill="currentColor" viewBox="0 0 32 32"
                                                class="size-6 xl:size-8 group-hover:opacity-70">
                                                <path
                                                    d="M15.8 3a12.8 12.8 0 1 0 0 25.6 12.8 12.8 0 0 0 0-25.6Zm5.87 18.461a.8.8 0 0 1-1.097.266c-3.006-1.837-6.787-2.252-11.244-1.234a.796.796 0 1 1-.355-1.555c4.875-1.115 9.058-.635 12.432 1.427a.8.8 0 0 1 .265 1.096Zm1.565-3.485a.999.999 0 0 1-1.371.33c-3.44-2.116-8.685-2.728-12.755-1.493a1 1 0 0 1-.58-1.91c4.65-1.41 10.428-.726 14.378 1.7a1 1 0 0 1 .33 1.375l-.002-.002Zm.137-3.629c-4.127-2.45-10.933-2.675-14.871-1.478a1.196 1.196 0 1 1-.695-2.291c4.52-1.374 12.037-1.107 16.785 1.711a1.197 1.197 0 1 1-1.221 2.06" />
                                            </svg>
                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Spotify</span>
                                        </a>
                                    </li>

                                    <li class="flex">
                                        <a class="group flex items-center" aria-label="Deezer"
                                            href="https://www.deezer.com/us/show/1000438761" target="_blank">

                                            <div class="inline-flex items-center">
                                                <svg fill="currentColor" class="size-6 xl:size-7 group-hover:opacity-70"
                                                    viewBox="0 0 198.4 129.5">
                                                    <path
                                                        d="M 155.5 0 L 155.5 25.0996 L 198.4 25.0996 L 198.4 0 L 155.5 0 Z M 51.8008 34.8008 L 51.8008 59.9004 L 94.6992 59.9004 L 94.6992 34.8008 L 51.8008 34.8008 Z M 155.5 34.8008 L 155.5 59.9004 L 198.4 59.9004 L 198.4 34.8008 L 155.5 34.8008 Z M 51.8008 69.5996 L 51.8008 94.6992 L 94.6992 94.6992 L 94.6992 69.5996 L 51.8008 69.5996 Z M 103.699 69.5996 L 103.699 94.6992 L 146.6 94.6992 L 146.6 69.5996 L 103.699 69.5996 Z M 155.5 69.5996 L 155.5 94.6992 L 198.4 94.6992 L 198.4 69.5996 L 155.5 69.5996 Z M 0 104.4 L 0 129.5 L 42.9004 129.5 L 42.9004 104.4 L 0 104.4 Z M 51.8008 104.4 L 51.8008 129.5 L 94.6992 129.5 L 94.6992 104.4 L 51.8008 104.4 Z M 103.699 104.4 L 103.699 129.5 L 146.6 129.5 L 146.6 104.4 L 103.699 104.4 Z M 155.5 104.4 L 155.5 129.5 L 198.4 129.5 L 198.4 104.4 L 155.5 104.4 Z" />
                                                </svg>
                                            </div>

                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Deezer</span>
                                        </a>
                                    </li>

                                    <li class="flex">
                                        <a class="group flex items-center" aria-label="Castbox"
                                            href="https://castbox.fm/channel/id5672485?country=us" target="_blank">

                                            <div class="inline-flex items-center">
                                                <svg fill="currentColor" class="size-6 xl:size-7 group-hover:opacity-70"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M12 0c-.29 0-.58.068-.812.206L2.417 5.392c-.46.272-.804.875-.804 1.408v10.4c0 .533.344 1.135.804 1.407l8.77 5.187c.465.275 1.162.275 1.626 0l8.77-5.187c.46-.272.804-.874.804-1.407V6.8c0-.533-.344-1.136-.804-1.408L12.813.206A1.618 1.618 0 0012 0zm-.85 8.304c.394 0 .714.303.714.676v2.224c0 .207.191.375.427.375s.428-.168.428-.375V9.57c0-.373.32-.675.713-.675.394 0 .712.302.712.675v4.713c0 .374-.318.676-.712.676-.394 0-.713-.302-.713-.676v-1.31c0-.206-.192-.374-.428-.374s-.427.168-.427.374v1.226c0 .374-.32.676-.713.676-.394 0-.713-.302-.713-.676v-1.667c0-.207-.192-.375-.428-.375-.235 0-.427.168-.427.375v3.31c0 .373-.319.676-.712.676-.394 0-.713-.303-.713-.676v-2.427c0-.206-.191-.374-.428-.374-.235 0-.427.168-.427.374v.178a.71.71 0 01-.712.708.71.71 0 01-.713-.708v-2.123a.71.71 0 01.713-.708.71.71 0 01.712.708v.178c0 .206.192.373.427.373.237 0 .428-.167.428-.373v-1.53c0-.374.32-.676.713-.676.393 0 .712.303.712.676v.646c0 .206.192.374.427.374.236 0 .428-.168.428-.374V8.98c0-.373.319-.676.713-.676zm4.562 2.416c.393 0 .713.302.713.676v2.691c0 .374-.32.676-.713.676-.394 0-.712-.303-.712-.676v-2.691c0-.374.319-.676.712-.676zm2.28 1.368c.395 0 .713.303.713.676v.67c0 .374-.318.676-.712.676-.394 0-.713-.302-.713-.675v-.67c0-.374.32-.677.713-.677Z" />
                                                </svg>
                                            </div>

                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Castbox</span>
                                        </a>
                                    </li>

                                    {{-- <li class="flex">
                                        <a class="group flex items-center" aria-label="Youtube"
                                            href="https://youtube.com/@WhyLead?si=xixPWnVjb1FqxnCv" target="_blank">

                                            <div class="size-6 xl:size-7 inline-flex items-center">
                                                <svg fill="currentColor" class="group-hover:opacity-70" viewBox="0 0 24 24">
                                                    <path
                                                        d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z" />
                                                </svg>
                                            </div>

                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Youtube</span>
                                        </a>
                                    </li> --}}

                                    <li class="flex">
                                        <a class="group flex items-center" aria-label="Apple Podcast"
                                            href="https://podcasts.apple.com/us/podcast/why-lead/id1531331535"
                                            target="_blank">
                                            <svg fill="currentColor" viewBox="0 0 32 32"
                                                class="size-6 xl:size-8 group-hover:opacity-70">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M27.528 24.8c-.232.592-.768 1.424-1.536 2.016-.44.336-.968.664-1.688.88-.768.232-1.72.304-2.904.304H10.6c-1.184 0-2.128-.08-2.904-.304a4.99 4.99 0 0 1-1.688-.88c-.76-.584-1.304-1.424-1.536-2.016C4.008 23.608 4 22.256 4 21.4V10.6c0-.856.008-2.208.472-3.4.232-.592.768-1.424 1.536-2.016.44-.336.968-.664 1.688-.88C8.472 4.08 9.416 4 10.6 4h10.8c1.184 0 2.128.08 2.904.304a4.99 4.99 0 0 1 1.688.88c.76.584 1.304 1.424 1.536 2.016C28 8.392 28 9.752 28 10.6v10.8c0 .856-.008 2.208-.472 3.4Zm-9.471-6.312a1.069 1.069 0 0 0-.32-.688c-.36-.376-.992-.624-1.736-.624-.745 0-1.377.24-1.737.624-.183.2-.287.4-.32.688-.063.558-.024 1.036.04 1.807v.009c.065.736.184 1.72.336 2.712.112.712.2 1.096.28 1.368.136.448.625.832 1.4.832.776 0 1.273-.392 1.4-.832.08-.272.169-.656.28-1.368.152-1 .273-1.976.337-2.712.072-.776.104-1.256.04-1.816ZM16 16.375c1.088 0 1.968-.88 1.968-1.967 0-1.08-.88-1.968-1.968-1.968s-1.968.88-1.968 1.968.88 1.967 1.968 1.967Zm-.024-9.719c-4.592.016-8.352 3.744-8.416 8.336-.048 3.72 2.328 6.904 5.648 8.072.08.032.16-.04.152-.12a35.046 35.046 0 0 0-.041-.288c-.029-.192-.057-.384-.079-.576a.317.317 0 0 0-.168-.232 7.365 7.365 0 0 1-4.424-6.824c.04-4 3.304-7.256 7.296-7.288 4.088-.032 7.424 3.28 7.424 7.36 0 3.016-1.824 5.608-4.424 6.752a.272.272 0 0 0-.168.232l-.12.864c-.016.088.072.152.152.12a8.448 8.448 0 0 0 5.648-7.968c-.016-4.656-3.816-8.448-8.48-8.44Zm-5.624 8.376c.04-2.992 2.44-5.464 5.432-5.576 3.216-.128 5.88 2.456 5.872 5.64a5.661 5.661 0 0 1-2.472 4.672c-.08.056-.184-.008-.176-.096.016-.344.024-.648.008-.96 0-.104.04-.2.112-.272a4.584 4.584 0 0 0 1.448-3.336 4.574 4.574 0 0 0-4.752-4.568 4.585 4.585 0 0 0-4.392 4.448 4.574 4.574 0 0 0 1.448 3.456c.08.072.12.168.112.272-.016.32-.016.624.008.968 0 .088-.104.144-.176.096a5.65 5.65 0 0 1-2.472-4.744Z" />
                                            </svg>
                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Apple
                                                Podcast</span>
                                        </a>
                                    </li>

                                    <li class="flex">
                                        <a class="group flex items-center" aria-label="Overcast"
                                            href="https://overcast.fm/itunes1531331535" target="_blank">
                                            <svg fill="currentColor" viewBox="0 0 32 32"
                                                class="size-6 xl:size-8 group-hover:opacity-70">
                                                <path
                                                    d="M16 28.8A12.77 12.77 0 0 1 3.2 16 12.77 12.77 0 0 1 16 3.2 12.77 12.77 0 0 1 28.8 16 12.77 12.77 0 0 1 16 28.8Zm0-5.067.96-.96-.96-3.68-.96 3.68.96.96Zm-1.226-.054-.48 1.814 1.12-1.12-.64-.694Zm2.453 0-.64.64 1.12 1.12-.48-1.76Zm.907 3.307L16 24.853l-2.133 2.133c.693.107 1.387.213 2.133.213.747 0 1.44-.053 2.134-.213ZM16 4.799C9.814 4.8 4.8 9.813 4.8 16c0 4.907 3.147 9.067 7.52 10.56l2.4-8.906c-.533-.374-.853-1.014-.853-1.707A2.14 2.14 0 0 1 16 13.813a2.14 2.14 0 0 1 2.134 2.133c0 .693-.32 1.28-.854 1.707l2.4 8.906A11.145 11.145 0 0 0 27.2 16c0-6.186-5.013-11.2-11.2-11.2Zm7.307 16.747c-.267.32-.747.427-1.12.16-.373-.267-.427-.747-.16-1.067 0 0 1.44-1.92 1.44-4.64 0-2.72-1.44-4.64-1.44-4.64-.267-.32-.213-.8.16-1.066.373-.267.853-.16 1.12.16.107.106 1.76 2.293 1.76 5.546 0 3.254-1.653 5.44-1.76 5.547Zm-3.893-2.08c-.32-.32-.267-.907.053-1.227 0 0 .8-.853.8-2.24 0-1.386-.8-2.186-.8-2.24-.32-.32-.32-.853-.053-1.226.32-.374.8-.374 1.12-.054.053.054 1.333 1.387 1.333 3.52 0 2.134-1.28 3.467-1.333 3.52-.32.32-.8.267-1.12-.053Zm-6.827 0c-.32.32-.8.373-1.12.053-.053-.106-1.333-1.386-1.333-3.52 0-2.133 1.28-3.413 1.333-3.52.32-.32.853-.32 1.12.054.32.32.267.906-.053 1.226 0 .054-.8.854-.8 2.24 0 1.387.8 2.24.8 2.24.32.32.373.854.053 1.227Zm-2.773 2.24c-.374.267-.854.16-1.12-.16-.107-.107-1.76-2.293-1.76-5.547 0-3.253 1.653-5.44 1.76-5.546.266-.32.746-.427 1.12-.16.373.266.426.746.16 1.066 0 0-1.44 1.92-1.44 4.64 0 2.72 1.44 4.64 1.44 4.64.266.32.16.8-.16 1.067Z" />
                                            </svg>
                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">Overcast</span>
                                        </a>
                                    </li>

                                    <li class="flex"><a class="group flex items-center" aria-label="RSS Feed"
                                            href="https://feeds.buzzsprout.com/2275900.rss" target="_blank">
                                            <svg fill="currentColor" viewBox="0 0 32 32"
                                                class="size-6 xl:size-8 group-hover:opacity-70">
                                                <path fill-rule="evenodd" clip-rule="evenodd"
                                                    d="M8.5 4h15A4.5 4.5 0 0 1 28 8.5v15a4.5 4.5 0 0 1-4.5 4.5h-15A4.5 4.5 0 0 1 4 23.5v-15A4.5 4.5 0 0 1 8.5 4ZM13 22a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm-6-6a9 9 0 0 1 9 9h3A12 12 0 0 0 7 13v3Zm5.74-4.858A15 15 0 0 0 7 10V7a18 18 0 0 1 18 18h-3a15 15 0 0 0-9.26-13.858Z" />
                                            </svg>
                                            <span class="text-sm xl:text-base hidden sm:ml-3 sm:block">RSS
                                                Feed</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>

                            <style>
                                #podcastDescription a {
                                    color: #F26B21;
                                }
                            </style>

                            <script>
                                window.addEventListener("load", function() {
                                    document.querySelectorAll("#podcastDescription a").forEach(item => {
                                        item.setAttribute("target", "_blank");
                                    });
                                })
                            </script>

                            <div id="podcastDescription" class="mt-6 text-base/loose">
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
