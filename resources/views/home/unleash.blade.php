<section x-data="{
    current: 0,
    target: 1,
    roll() {
        this.current = 0;
        const interval = 100;
        const step = 0.1;
        var rafReference;

        const handle = () => {
            if (this.current < this.target) {
                this.current += step;

                setTimeout(() => rafReference = requestAnimationFrame(handle), 80);
            } else {
                cancelAnimationFrame(handle);
                this.current = this.target;
            }
        };

        requestAnimationFrame(handle);
    }
}" x-intersect.once.threshold.65="roll()"
    class="bg-black text-white relative bg-fixed bg-center"
    style="background-image: url('https://res.cloudinary.com/sfp-app/image/upload/v1711541008/tunaeun0pvs42u6g1mks.jpg')">
    {{-- <img class="absolute inset-0 size-full object-cover opacity-20"
        src="https://img.freepik.com/free-photo/group-afro-americans-working-together_1303-8971.jpg?w=2000&t=st=1711451492~exp=1711452092~hmac=eebe50bf03950c1cf0d9b5abcd86f9f0a6749d7df99199e59ca725df3814559b"
        alt="" /> --}}
    <div class="absolute inset-0 bg-black/95 opacity-90"></div>

    <div class="py-12 relative max-w-[1400px] mx-auto">
        <div class="flex flex-col gap-4 lg:gap-8 items-center justify-center">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase tracking-wide">
                        <span class="outline-text">Working With </span>
                        WhyLead
                        <span class="hidden md:inline"><br /></span>
                        Makes a Real Impact
                    </span>
                </h2>
            </div>

            <ul role="list" class="w-full px-6 flex flex-col md:grid grid-cols-3 justify-between gap-8">
                @php
                    $numbers = [
                        [
                            'percent' => 82,
                            'color' => '#EBB305',
                            'patternColor' => 'rgba(0, 0, 0, 0.2)',
                            'title' => 'Team skill improvement',
                            // 'description' =>
                            //     'Most of the clients who have worked with WhyLead managed to improve their skills through our programs.',
                            'description' =>
                                'Most of the clients who have worked with WhyLead managed to improve their skills.',
                        ],
                        [
                            'percent' => 98,
                            'color' => 'url(#progressGradient)',
                            'patternColor' => 'rgba(255, 255, 255, 0.2)',
                            'title' => 'Post-engagement growth',
                            // 'description' =>
                            //     'Nearly all clients discover new growth avenues post-engagement with our expertise after working with WhyLead.',
                            'description' =>
                                'Nearly all clients discover new growth avenues after engaging our expert consultants',
                        ],
                        [
                            'percent' => 100,
                            'color' => '#F26B21',
                            'patternColor' => 'rgba(255, 255, 255, 0.35)',
                            'title' => 'Effective tailored solutions',
                            // 'description' =>
                            //     'Every client has seen their challenges turn into opportunities for growth with our tailored solutions.',
                            'description' =>
                                'Every client has seen their challenges turn into opportunities for growth',
                        ],
                    ];
                @endphp

                @foreach ($numbers as $entry)
                    @php
                        $percent = $entry['percent'];
                        $progress = $entry['percent'];
                        if ($progress < 100) {
                            $progress -= 4;
                        }
                    @endphp

                    <li class="flex flex-col items-center text-center gap-3">
                        <div class="relative">
                            <svg class="-rotate-90 size-40 lg:size-34" viewBox="0 0 120 120" stroke-width="12">
                                <defs>
                                    <linearGradient id="progressGradient" x1="100%" y1="100%" x2="50%"
                                        y2="0%">
                                        <stop offset="0%" style="stop-color: #F26B21; stop-opacity: 1" />
                                        <stop offset="100%" style="stop-color: #19124B; stop-opacity: 1" />
                                    </linearGradient>

                                    <pattern id="myPattern{{ $loop->index }}" viewBox="0 0 33.554 32.053"
                                        width="12%" height="12%">
                                        <path fill="{{ $entry['patternColor'] }}"
                                            d="M 26.5547 0.00391 C 24.7619 -0.0498739 23.0305 0.659684 21.791 1.95614 C 20.5515 3.25259 19.9204 5.01414 20.0547 6.80273 C 20.1547 10.4027 22.0531 13.0024 24.9531 14.9023 C 26.7531 16.1023 28.1535 16.0035 29.8535 14.6035 C 32.1052 12.8362 33.4601 10.1636 33.5547 7.30273 C 33.5547 2.80274 30.6547 0.00391 26.5547 0.00391 Z M 6.35352 0.90234 C 4.44899 0.835557 2.62148 1.65718 1.40736 3.12605 C 0.193246 4.59493 -0.269738 6.54442 0.1543 8.40234 C 0.711812 11.1705 2.42046 13.5708 4.85352 15.0039 C 5.37355 15.4062 5.99906 15.6491 6.6543 15.7031 C 7.02312 15.7696 7.40305 15.7352 7.75391 15.6035 C 8.34533 15.4212 8.89079 15.1141 9.35352 14.7031 C 11.1915 13.1515 12.4005 10.9828 12.7539 8.60352 C 13.1588 6.6938 12.667 4.70382 11.4193 3.20247 C 10.1715 1.70112 8.30508 0.853657 6.35352 0.90234 Z M 16.6191 13.5859 C 16.4655 13.5881 16.3106 13.5941 16.1543 13.6035 C 13.9658 13.6967 11.9228 14.7256 10.545 16.4285 C 9.16722 18.1314 8.58743 20.3442 8.95312 22.5039 C 9.55312 26.8039 12.0543 29.6035 15.6543 31.6035 C 17.0508 32.3521 18.7657 32.1526 19.9531 31.1035 C 22.771 28.9755 24.5234 25.7267 24.7539 22.2031 C 24.8508 16.875 21.3818 13.5178 16.6191 13.5859 Z" />
                                    </pattern>
                                </defs>

                                <circle cx="60" cy="60" r="54" fill="none" stroke="currentColor"
                                    stroke-opacity="0.2" />

                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $entry['color'] }}" stroke-linecap="round" stroke-linejoin="round"
                                    pathLength="100" stroke-dasharray="100"
                                    stroke-dashoffset="calc(100 - {{ $progress }})"
                                    x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />

                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="url(#myPattern{{ $loop->index }})" stroke-linecap="round"
                                    stroke-linejoin="round" pathLength="100" stroke-dasharray="100"
                                    stroke-dashoffset="calc(100 - {{ $progress }})"
                                    x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />
                            </svg>

                            <div class="absolute inset-0 flex items-center justify-center text-4xl font-semibold">
                                <span
                                    x-text="Math.min({{ $percent }}, Math.floor({{ $percent }} * current))"></span>%
                            </div>
                        </div>

                        <div>
                            {{-- <h3 class="text-xl font-semibold">
                                {{ $entry['title'] }}
                            </h3> --}}

                            <p class="mt-1.5 text-sm/relaxed">
                                {{ $entry['description'] }}
                            </p>

                            {{-- <p class="mt-1.5 text-xl/relaxed px-5">
                                {{ $entry['description'] }}
                            </p> --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
