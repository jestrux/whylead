@props(['exact' => false, 'url' => '#'])

@php
    $current_url = url()->current();
    $active = $exact ? $current_url == url($url) : str_contains($current_url, url($url));
@endphp

<li {{ $attributes->merge([
    'class' => 'w-full h-fulls text-center md:w-auto md:text-left',
]) }}>
    <a href="{{ url($url) }}"
        class="flex items-center h-full px-1 py-4 md:py-0 md:mr-4 text-lg md:text-sm font-bold uppercase lg:tracking-wide text-left lg:text-center
            {{ $active ? 'text-primary font-bolds' : 'border-transparent font-semibolds opacity-60 hover:opacity-70' }}
        ">
        {{ $slot }}
    </a>
</li>
