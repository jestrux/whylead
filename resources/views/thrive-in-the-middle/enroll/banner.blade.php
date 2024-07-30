@php
    $image = asset('img/thrive-tail.png');
@endphp

<section class="lg:pt-12 px-8 pb-4 text-white">
    <div class="md:hidden relative flex flex-col gap-5 py-8 px-4">
        <img class="h-14 object-contain" src="{{ asset('img/thrive-logo.png') }}" alt="" />

        <h2 class="flex-1 pt-3 text-2xl lg:text-3xl text-center font-bold">
            Enroll in Program
        </h2>
    </div>

    <div class="hidden md:block relative max-w-5xl mx-auto">
        <div class="h-32 flex gap-4 items-center">
            <img class="h-20" src="{{ asset('img/thrive-logo.png') }}" alt="" />

            <h2 class="flex-1 pt-3 text-2xl lg:text-3xl text-center font-bold">
                Enroll in Program
            </h2>

            <div class="h-full flex-shrink-0 w-[150px]">
                <img class="absolute right-0 h-56 rotate-4 opacity-55" src="{{ $image }}" alt="" />
            </div>
        </div>
    </div>
</section>
