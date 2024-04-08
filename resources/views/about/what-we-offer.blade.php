@php
    $steps = [
        [
            'icon' =>
                'M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z',
            'image' =>
                'https://images.unsplash.com/photo-1573496774426-fe3db3dd1731?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDQ2fHxjb3Jwb3JhdGUlMjB0ZWFtfGVufDB8fHx8MTcxMjU3MzQxOXww&ixlib=rb-4.0.3&q=80&w=1080',
            'title' => 'Belong',
            'description' =>
                'Experience the power of connection as part of the global WhyLead family, where shared values and a passion for humanity unite us all. Embrace opportunities to cultivate authentic relationships, fostering a global network that transcends borders, both within and beyond the WhyLead family.',
        ],
        [
            'icon' =>
                'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',
            'image' =>
                'https://images.unsplash.com/photo-1578574577315-3fbeb0cecdc2?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxjb3Jwb3JhdGUlMjB0ZWFtfGVufDB8fHx8MTcxMjU3MzM1M3ww&ixlib=rb-4.0.3&q=80&w=1080',
            'title' => 'Grow',
            'description' =>
                'Immerse yourself in a wealth of resources and continuous training that propels your professional journey.  And experience the transformative beauty of evolving in your skill and character, emerging as your most authentic and accomplished self. ',
        ],
        [
            'icon' =>
                'M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z',
            'image' =>
                // 'https://images.unsplash.com/photo-1515169067868-5387ec356754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDd8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MTI1NjA4NDZ8MA&ixlib=rb-4.0.3&q=80&w=1080',
                'https://images.unsplash.com/photo-1604246562628-284cb1768678?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDI3fHx0ZWFtJTIwYnVpbGRpbmd8ZW58MHx8fHwxNzEyNTczMTE0fDA&ixlib=rb-4.0.3&q=80&w=1080',
            'title' => 'Live',
            'description' =>
                'Relish the freedom of a flexible work environment that harmonizes with your life. Embrace ample time to rejuvenate and reconnect with loved ones, cherishing moments of tranquility and vitality. ',
        ],
    ];
@endphp

<section class="py-12 lg:py-20">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-3xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold">
                    <span class="uppercase">
                        <span class="outline-text">What we</span>
                        offer
                    </span>
                </h2>

                <p class="mt-2 text-xl/loose font-light">
                    With WhyLead, training transcends traditional learning approaches, enabling individuals to thrive in
                    the dynamic landscapes of today.
                </p>
            </div>

            <ul role="list" class="grid grid-cols-1 lg:grid-cols-3 gap-10">
                @foreach ($steps as $step)
                    <li
                        class="bg-card dark:bg-content/5 border border-stroke relative min-h-full w-full p-6 rounded-2xl overflow-hidden">
                        {{-- <span
                            class="relative size-10 text-[#FFDB21] bg-accent rounded-xl flex items-center justify-center">
                            <svg class="size-5 drop-shadow" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" aria-hidden="true" data-slot="icon" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                            </svg>
                        </span> --}}

                        {{-- <div class="size-10 rounded-lg bg-gradient-to-br from-accent via-accent/90 to-accent/95">
                            <div
                                class="bg-gradient-to-br from-primary to-primary/20 text-white size-10 flex items-center justify-center rounded-lg">
                                <svg class="size-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                                </svg>
                            </div>
                        </div> --}}

                        <div class="-m-4 h-32 relative rounded-t-2xl rounded-b overflow-hidden">
                            <img class="size-full object-cover rounded-t-2xl rounded-b" src="{{ $step['image'] }}"
                                alt="" />

                            <div
                                class="bg-black/50 dark:bg-black/80 text-white absolute inset-0 flex flex-col items-center justify-center gap-3">
                                <svg class="size-8 drop-shadow text-[#fa9158]" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="{{ $step['icon'] }}" />
                                </svg>

                                <h3 class="text-xl lg:text-2xl font-semibold uppercase tracking-widest">
                                    {{ $step['title'] }}
                                </h3>
                            </div>
                        </div>


                        <p class="mt-8 text-sm/loose opacity-70">
                            {{ $step['description'] }}
                        </p>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                {{-- <p class="text-xl opacity-70">Don’t know what you want?</p> --}}
                <p class="text-xl opacity-70">Seen enough to convince you?</p>
                <a href="#" class="mt-6 btn">
                    Reach out to us
                </a>
            </div>
        </div>
    </div>
</section>
