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
}" x-intersect.once.threshold.65="roll()" class="bg-black text-white relative bg-fixed bg-center"
    style="background-image: url('https://img.freepik.com/free-photo/group-afro-americans-working-together_1303-8971.jpg?w=2000&t=st=1711451492~exp=1711452092~hmac=eebe50bf03950c1cf0d9b5abcd86f9f0a6749d7df99199e59ca725df3814559b')">
    {{-- <img class="absolute inset-0 size-full object-cover opacity-20"
        src="https://img.freepik.com/free-photo/group-afro-americans-working-together_1303-8971.jpg?w=2000&t=st=1711451492~exp=1711452092~hmac=eebe50bf03950c1cf0d9b5abcd86f9f0a6749d7df99199e59ca725df3814559b"
        alt="" /> --}}
    <div class="absolute inset-0 bg-black/95 opacity-90"></div>

    <div class="py-10 lg:pt-12 relative max-w-7xl mx-auto">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl lg:text-5xl font-bold max-w-4xl">
                    <span class="uppercase tracking-wide">
                        <span class="outline-text">Unleash</span>
                        the potential
                        <span class="hidden md:inline"><br /></span>
                        <span class="outline-text">of your organisation</span>
                    </span>
                </h2>

                <a href="#" class="mt-6 btn">
                    Thrive with WhyLead
                </a>
            </div>

            <ul role="list" class="w-full px-6 flex flex-col lg:grid grid-cols-3 justify-between gap-8">
                @php
                    $numbers = [
                        [
                            'percent' => 100,
                            'color' => '#22C55D',
                            'title' => 'Effective tailored solutions',
                            // 'description' =>
                            //     'Every client has seen their challenges turn into opportunities for growth with our tailored solutions.',
                            'description' =>
                                'Every client has seen their challenges turn into opportunities for growth',
                        ],
                        [
                            'percent' => 98,
                            'color' => '#3C82F6',
                            'title' => 'Post-engagement growth',
                            'description' =>
                                'Nearly all clients discover new growth avenues post-engagement with our expertise after working with WhyLead.',
                            'description' =>
                                'Nearly all clients discover new growth avenues post-engagement with our expertise',
                        ],
                        [
                            'percent' => 82,
                            'color' => '#EBB305',
                            'title' => 'Team skill improvement',
                            // 'description' =>
                            //     'Most of the clients who have worked with WhyLead managed to improve their skills through our programs.',
                            'description' =>
                                'Most of the clients who have worked with WhyLead managed to improve their skills through.',
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
                            <svg class="-rotate-90 size-40 lg:size-34" viewBox="0 0 120 120" stroke-width="6">
                                <circle cx="60" cy="60" r="54" fill="none" stroke="currentColor"
                                    stroke-opacity="0.2" />
                                <circle cx="60" cy="60" r="54" fill="none"
                                    stroke="{{ $entry['color'] }}" stroke-linecap="round" stroke-linejoin="round"
                                    pathLength="100" stroke-dasharray="100"
                                    stroke-dashoffset="calc(100 - {{ $progress }})"
                                    x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />
                            </svg>

                            <div class="absolute inset-0 flex items-center justify-center text-4xl">
                                <span
                                    x-text="Math.min({{ $percent }}, Math.floor({{ $percent }} * current))"></span>%
                            </div>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold">
                                {{ $entry['title'] }}
                            </h3>

                            <p class="mt-1.5 text-sm/loose opacity-70">
                                {{ $entry['description'] }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
