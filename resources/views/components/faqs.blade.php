@props(['data' => []])

<div x-data="{ expanded: -1 }"
    {{ $attributes->merge([
        'class' => 'flex-1 w-full border-b divide-y border-stroke divide-stroke',
    ]) }}>
    @foreach ($data as $e)
        @php
            $i = $loop->index;
            $entry = (object) $e;
        @endphp

        <button class="flex flex-row-reverse gap-8 md:gap-4 w-full text-left focus:outline-none pt-4 px-4 md:px-0"
            x-on:click="expanded = expanded == {{ $i }} ? -1 : {{ $i }}">
            <div class="flex-1">
                <h3 class="mb-4 text-lg/none font-medium md:text-base/none">
                    {{ $entry->question }}
                </h3>
                <div class="transition-all duration-200 max-h-0 overflow-hidden"
                    x-bind:style="expanded == {{ $i }} ? `max-height:  ${ $el.scrollHeight }px` : ''">
                    <p class="mb-3 -mt-1 text-sm/loose opacity-70">
                        {{ $entry->answer }}
                    </p>
                </div>
            </div>

            <div class="-mt-0.5 flex flex-col justify-between flex-shrink-0"
                :class="{ ' rotate-180': expanded == index }">
                <svg class="size-5 text-primary" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor">
                    <path x-show="expanded != {{ $i }}" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15" x-transition.opacity x-transition:enter.duration.200ms.delay.100ms
                        x-transition:leave.duration.200ms />
                    <path x-show="expanded == {{ $i }}" stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 12h-15" x-transition.opacity x-transition:enter.duration.200ms
                        x-transition:leave.duration.200ms.delay.100ms />
                </svg>
            </div>
        </button>
    @endforeach
</div>

{{-- <div x-data="{
    expanded: -1,
}" class="flex-1 w-full border-b divide-y border-stroke divide-stroke">
    @foreach ($data as $e)
        @php
            $i = $loop->index;
            $entry = (object) $e;
        @endphp

        <button class="w-full text-left focus:outline-none flex gap-8 md:gap-4 pt-7 pb-2 px-4 md:px-0"
            x-on:click="expanded = expanded == {{ $i }} ? -1 : {{ $i }}">
            <div class="flex-1">
                <h3 class="mb-5 text-lg font-semibold md:text-lg md:leading-tight">
                    {{ $entry->question }}
                </h3>
                <div class="transition-all duration-200 max-h-0 overflow-hidden"
                    :style="expanded == {{ $i }} ? `max-height:  ${ $el.scrollHeight }px` : ''">
                    <p class="mb-3 mt-1 text-base leading-loose opacity-80">
                        {{ $entry->answer }}
                    </p>
                </div>
            </div>

            <div class="flex flex-col justify-between flex-shrink-0"
                :class="{ ' rotate-180': expanded == {{ $i }} }">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                    <path x-show="expanded != {{ $i }}" stroke-linecap="round" stroke-linejoin="round"
                        d="M12 4.5v15m7.5-7.5h-15" x-transition.opacity x-transition:enter.duration.200ms.delay.100ms
                        x-transition:leave.duration.200ms />
                    <path x-show="expanded == {{ $i }}" stroke-linecap="round" stroke-linejoin="round"
                        d="M19.5 12h-15" x-transition.opacity x-transition:enter.duration.200ms
                        x-transition:leave.duration.200ms.delay.100ms />
                </svg>
            </div>
        </button>
    @endforeach
</div> --}}
