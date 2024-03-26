<section class="bg-black text-white" x-data="{
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
}" x-intersect.once.threshold.65="roll()">
    <div class="py-10 lg:py-16 relative max-w-7xl mx-auto">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-4xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl/[1.2]">
                    <span class="lg:text-[60px]/[1.2] font-bold uppercase tracking-wide">
                        <span class="font-light">Unleash</span>
                        <span class="hidden md:inline"><br /></span>
                        the potential
                    </span>

                    <span class="hidden md:inline"><br /></span>

                    <span class="font-normal inline-block pt-1 leading-snug">in your people, team and
                        organisation</span>
                </h2>

                <a href="#" class="mt-8 btn">
                    Thrive with WhyLead
                </a>
            </div>

            <div class="mt-12 w-full">
                <ul role="list" class="px-6 flex flex-col gap-12 lg:flex-row lg:justify-between">
                    @php
                        $numbers = [
                            [
                                'percent' => 100,
                                'color' => '#22C55D',
                                'label' => 'of clients told us our solutions addressed their pain points.',
                            ],
                            [
                                'percent' => 98,
                                'color' => '#3C82F6',
                                'label' =>
                                    'of clients told us they have identified new possibilities for improvement after our sessions.',
                            ],
                            [
                                'percent' => 82,
                                'color' => '#EBB305',
                                'label' => 'of clients told us the training programs improved their skills.',
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

                        <li class="flex flex-col items-center justify-center gap-3 text-center">
                            <div class="relative">
                                <svg class="-rotate-90 size-40 lg:size-72" viewBox="0 0 120 120" stroke-width="8">
                                    <circle cx="60" cy="60" r="54" fill="none" stroke="currentColor"
                                        stroke-opacity="0.2" />
                                    <circle cx="60" cy="60" r="54" fill="none"
                                        stroke="{{ $entry['color'] }}" stroke-linecap="round" stroke-linejoin="round"
                                        pathLength="100" stroke-dasharray="100"
                                        stroke-dashoffset="calc(100 - {{ $progress }})"
                                        x-bind:stroke-dashoffset="`calc(100 - ${Math.min({{ $progress }}, Math.floor({{ $progress }} * current))})`" />
                                </svg>

                                <div
                                    class="absolute inset-0 flex items-center justify-center font-light text-3xl lg:text-6xl">
                                    <span
                                        x-text="Math.min({{ $percent }}, Math.floor({{ $percent }} * current))"></span>%
                                </div>
                            </div>

                            <span class="font-light leading-loose max-w-xs">
                                {{ $entry['label'] }}
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</section>
