@props(['actions' => []])
<div x-cloak x-data="{
    open: false,
}" @keydown.escape="open = false" @mousedown.outside="open = false" class="relative">
    <button class="focus:outline-none" :id="$id('alpine-menu-button')" @click="open = true">
        {{ $slot }}
    </button>

    <div class="absolute left-full bottom-0 !min-w-52 z-10 bg-card border border-content/10 rounded-md shadow-lg py-1 outline-none"
        x-show="open" x-on:click="open = false">

        @foreach ($actions as $action)
            @if (isset($action['url']))
                <a href="{{ $action['url'] }}" target="{{ $action['external'] ?? false ? '_blank' : '' }}"
                    class="flex items-center gap-2 w-full px-3 py-1.5 text-left text-sm hover:bg-content/5 disabled:text-content/20 transition-colors">
                    @if ($action['render'] ?? null)
                        {!! $action['render'] !!}
                    @else
                        {{ $action['label'] ?? '..' }}
                    @endif
                </a>
            @elseif (isset($action['onClick']))
                <button onclick="{{ $action['onClick'] }}"
                    class="flex items-center gap-2 w-full px-3 py-1.5 text-left text-sm hover:bg-content/5 disabled:text-content/20 transition-colors">
                    @if ($action['render'] ?? null)
                        {!! $action['render'] !!}
                    @else
                        {{ $action['label'] ?? '..' }}
                    @endif
                </button>
            @endif
        @endforeach
    </div>
</div>
