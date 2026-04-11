@php
    $choices = \Statamic\Facades\Entry::query()
        ->where('collection', 'audit_sections')
        ->orderBy('order')
        ->get()
        ->map(fn($e) => [
            'color' => $e->get('color'),
            'title' => $e->get('title'),
            'description' => $e->get('description'),
            'indicators' => $e->get('indicators') ?? [],
        ])
        ->values()
        ->all();
@endphp

<div class="lg:mt-14 max-w-7xl mx-auto lg:px-8">
    <div class="lg:rounded-3xl bg-accent text-white relative">
        <div class="lg:grid grid-cols-2" x-data="{ effectiveLeaders: true }">
            <div class="px-4 lg:px-0 pt-8 lg:pt-12 lg:pl-16">
                <div class="lg:pr-14">
                    <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                        <span class="uppercase">
                            <span class="outline-text">Leadership Audit: </span>
                            Are Your Leaders Driving The Organization Forward?
                        </span>
                    </h2>
                </div>

                <div class="hidden lg:flex flex-col mt-8 gap-2">
                    @foreach ($choices as $item)
                        @php
                            $positive = $loop->index == 0;
                            $flag = ($positive ? '' : '!') . 'effectiveLeaders';
                            $action = 'effectiveLeaders = ' . ($positive ? 'true' : 'false');
                        @endphp

                        <div class="group transition-colors relative rounded-full px-4 py-1 lg:rounded-l-xl lg:rounded-r-none lg:p-6"
                            x-bind:class="{{ $flag }} ?
                                'pointer-events-none bg-white lg:bg-white lg:ring-1 lg:ring-inset lg:ring-white/20 text-accent lg:text-black' :
                                'text-white/70 lg:text-white'">
                            <div class="transition absolute inset-0 bg-white/10 scale-x-0 origin-left group-hover:scale-x-100 rounded-l-xl"
                                x-bind:class="{{ $flag }} ? 'scale-x-100' :
                                    'group-hover:scale-x-100'">
                            </div>

                            <div class="transition-transform"
                                x-bind:class="{{ $flag }} ? 'translate-x-2' : 'group-hover:translate-x-2'">
                                <h3>
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

            <div class="hidden lg:flex flex-col p-6 lg:p-14 border-l border-white/10">
                @foreach ($choices as $item)
                    @php
                        $positive = $loop->index == 0;
                        $flag = ($positive ? '' : '!') . 'effectiveLeaders';
                    @endphp

                    <div @if (!$positive) x-cloak @endif x-show="{{ $flag }}"
                        class="flex-1 flex flex-col gap-12">
                        @foreach ($item['indicators'] as $indicator)
                            <div class="text-xl flex flex-col lg:flex-row items-start gap-4">
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

            <div class="lg:hidden py-6">
                @foreach ($choices as $item)
                    @php
                        $positive = $loop->index == 0;
                    @endphp

                    <div>
                        <div class="bg-white text-black px-6 py-2 z-10 sticky top-14 md:top-[70px]"
                            style="background: {{ $item['color'] }}">
                            <h3 class="font-bold">{{ $item['title'] }}</h3>
                        </div>

                        <div class="mt-6 px-6 pb-6">
                            @foreach ($item['indicators'] as $indicator)
                                <div class="text-xl flex flex-col lg:flex-row items-start gap-4">
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
                    </div>
                @endforeach
            </div>
        </div>

        <div class="px-6 lg:px-8 pb-8 lg:hidden">
            <a href="{{ url('/contacts?interest=Training') }}" class="btn w-full">
                Develop thriving leaders
            </a>
        </div>

        <div class="hidden lg:flex justify-center absolute -bottom-24 inset-x-0">
            <a href="{{ url('/contacts?interest=Training') }}"
                class="z-10 group flex flex-col items-center justify-center text-center gap-3 size-36 bg-[#FEF1EA] dark:bg-[#242424] text-content/80 rounded-full">
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
