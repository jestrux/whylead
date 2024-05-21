@extends('layout.index')

@section('content')
    <div x-data="{
        activeSection: 'aboutUs',
        smoothScrollTo(e, target) {
            e.preventDefault();
            var element = document.querySelector('#' + target);
            history.pushState(null, null, '#' + target);
            var headerOffset = 120;
            var
                elementPosition = element.getBoundingClientRect().top;
            var offsetPosition = elementPosition + window.pageYOffset -
                headerOffset;
            window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
        }
    }">
        <div class="sticky top-16 z-20 flex items-center pointer-events-none">
            <div
                class="mt-4 pointer-events-auto h-10 px-1 rounded-full border border-stroke bg-canvas mx-auto inline-flex items-center justify-center">
                @foreach (['About Us' => 'aboutUs', 'Our Values' => 'ourValues', 'The Team' => 'team', 'Careers' => 'careers'] as $item => $target)
                    @php
                        $i = $loop->index;
                    @endphp
                    <a href="#{{ $target }}" x-on:click="smoothScrollTo($event, '{{ $target }}')"
                        class="{{ $i == 3 ? 'hidden lg:inline-flex' : 'inline-flex' }} text-xs/none font-bold py-2 px-3.5 rounded-full border border-stroke uppercase tracking-widest"
                        x-bind:class="activeSection == '{{ $target }}' ? 'bg-primary text-white border-primary' :
                            'opacity-70 bg-canvas border-transparent'">
                        {{ $item }}
                    </a>
                @endforeach
            </div>
        </div>

        @include('about.banner')

        @include('about.our-values')

        @include('about.team')

        @include('about.careers')
    </div>
@endsection

@section('scripts')
    <script defer src="https://cdn.jsdelivr.net/npm/@alpinejs/intersect@3.x.x/dist/cdn.min.js"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
@endsection
