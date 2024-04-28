@php
    $choices = [
        [
            'color' => '#c3bbff',
            'title' => "When they don't",
            'description' => 'Here are signs your leaders are hindering your organizational success.',
            'indicators' => [
                [
                    'icon' =>
                        'M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15',
                    'title' => 'They Add to Strategic & Cultural Misalignment',
                    'description' =>
                        'They create confusion and discord, undermining team alignment and organizational integrity.',
                ],
                [
                    'icon' =>
                        'M18.364 18.364A9 9 0 0 0 5.636 5.636m12.728 12.728A9 9 0 0 1 5.636 5.636m12.728 12.728L5.636 5.636',
                    'title' => 'Unable to Navigate Uncertainty & Change',
                    'description' =>
                        'Their inability to steer through uncertain times results in missed opportunities and potential stagnation, leaving the organization vulnerable.',
                ],
                [
                    'icon' =>
                        'M11.412 15.655 9.75 21.75l3.745-4.012M9.257 13.5H3.75l2.659-2.849m2.048-2.194L14.25 2.25 12 10.5h8.25l-4.707 5.043M8.457 8.457 3 3m5.457 5.457 7.086 7.086m0 0L21 21',
                    'title' => 'Unable to Inspire Growth & Commitment',
                    'description' =>
                        'They struggle to cultivate a dedicated workforce, significantly impacting productivity and organizational growth potential.',
                ],
            ],
        ],
        [
            'color' => '#ff9c66',
            'title' => 'When they do',
            'description' => 'Here are indicators that your leaders are driving organizational success.',
            'indicators' => [
                [
                    'icon' => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
                    'title' => 'They Empower and Develop Their Teams',
                    'description' =>
                        "They invest in their team's growth, fostering an environment where skills flourish and confidence is built, driving organizational progress.",
                ],
                [
                    'icon' =>
                        'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99',
                    'title' => 'They Embrace and Champion Change',
                    'description' =>
                        'By being adaptable and proactive about change, these leaders ensure the organization stays relevant and ahead of industry trends.',
                ],
                [
                    'icon' =>
                        'M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25',
                    'title' => 'They are Agents For Strategic Alignment',
                    'description' =>
                        "They ensure every team effort is cohesively directed towards the organization's overarching goals, maximizing efficiency and impact",
                ],
            ],
        ],
    ];
@endphp

<div class="mt-14 max-w-7xl mx-auto px-8">

    <div class="rounded-3xl bg-accent text-white relative">
        <div class="sp-16 lg:grid grid-cols-2" x-data="{ effectiveLeaders: true }">
            <div class="p-8 lg:px-0 lg:pt-12 lg:pl-16">
                <div class="lg:pr-14">
                    <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                        <span class="uppercase">
                            <span class="outline-text">Leadership Audit: </span>
                            Are Your Leaders Driving The Organization Forward?
                        </span>
                    </h2>
                </div>

                <div class="mt-8 flex flex-col gap-2">
                    @foreach ($choices as $item)
                        @php
                            $positive = $loop->index == 0;
                            $flag = ($positive ? '' : '!') . 'effectiveLeaders';
                            $action = 'effectiveLeaders = ' . ($positive ? 'true' : 'false');
                        @endphp

                        <div class="group transition-colors relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6"
                            x-bind:class="{{ $flag }} ?
                                'pointer-events-none bg-white lg:bg-white/5 lg:ring-1 lg:ring-inset lg:ring-white/20 text-accent lg:text-white' :
                                'text-white/70 lg:text-white'">
                            <div class="transition absolute inset-0 bg-white/5 scale-x-0 origin-left group-hover:scale-x-100 rounded-l-xl"
                                x-bind:class="{{ $flag }} ? 'scale-x-100' :
                                    'group-hover:scale-x-100'">
                            </div>

                            <div class="transition-transform"
                                x-bind:class="{{ $flag }} ? 'translate-x-2' : 'group-hover:translate-x-2'">
                                <h3 style="color: {{ $item['color'] }}">
                                    <button x-on:click="{{ $action }}" class="text-lg font-bold uppercase"
                                        id="headlessui-tabs-tab-:R2jaanla:" role="tab" type="button"
                                        aria-selected="true" tabindex="0" data-headlessui-state="selected"
                                        aria-controls="headlessui-tabs-panel-:Rlaanla:">
                                        <span
                                            class="absolute inset-0 rounded-full lg:rounded-l-xl lg:rounded-r-none"></span>
                                        {{ $item['title'] }}
                                    </button>
                                </h3>

                                <p class="mt-1s hidden text-sm/loose lg:block font-light">
                                    {{ $item['description'] }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="p-8 lg:p-14 flex flex-col border-l border-white/10">
                @foreach ($choices as $item)
                    @php
                        $positive = $loop->index == 0;
                        $flag = ($positive ? '' : '!') . 'effectiveLeaders';
                    @endphp

                    <div @if (!$positive) x-cloak @endif x-show="{{ $flag }}"
                        class="flex-1 flex flex-col gap-12">
                        @foreach ($item['indicators'] as $indicator)
                            <div class="text-xl flex items-start gap-4">
                                <div style="background: {{ $item['color'] }}"
                                    class="text-black/70 size-10 flex items-center justify-center rounded-lg">
                                    <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                        stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="{{ $indicator['icon'] }}" />
                                    </svg>
                                </div>

                                <div class="flex-1 -mt-px">
                                    <h3 class="text-lg">
                                        {{ $indicator['title'] }}
                                    </h3>

                                    <p class="mt-1 text-sm/relaxed font-light lg:block opacity-80">
                                        {{ $indicator['description'] }}
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>

        <div class="px-8 pb-8 lg:hidden">
            <a href="#" class="btn w-full">
                Develop thriving leaders
            </a>
        </div>

        <div class="hidden lg:flex justify-center absolute -bottom-24 inset-x-0">
            <a href="#"
                class="group flex flex-col items-center justify-center text-center gap-3 size-36 bg-[#FEF1EA] dark:bg-[#242424] text-content/80 rounded-full">
                <div class="text-xs/relaxed font-bold uppercase">
                    Develop<br /> thriving leaders
                </div>

                <svg class="w-7 h-7 text-primary animate-bounce group-hover:animate-none" fill="none"
                    viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 13.5 12 21m0 0-7.5-7.5M12 21V3" />
                </svg>
            </a>
        </div>
    </div>
</div>
