@php
    $image = asset('img/thrive-tail.png');
@endphp

<section class="pt-12 px-8 pb-4 text-white">
    <div class="relative max-w-5xl mx-auto">
        <div class="h-32 flex gap-4 items-center">
            <img class="h-20" src="{{ asset('img/thrive-logo.png') }}" alt="" />

            <h2 class="flex-1 pt-3 text-2xl lg:text-3xl text-center font-bold">
                Enroll in Programme
            </h2>

            <div class="h-full flex-shrink-0 w-[150px]">
                <img class="absolute right-0 h-56 rotate-4 opacity-55" src="{{ $image }}" alt="" />
            </div>
        </div>
    </div>
</section>
