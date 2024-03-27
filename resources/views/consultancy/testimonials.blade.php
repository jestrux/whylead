<section class="py-10 lg:pb-24">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        Testimonials
                    </span>
                </h2>

                <p class="mt-3 text-lg opacity-70">
                    See what our customers have to say about our services.
                </p>
            </div>

            <ul role="list" class="w-full grid grid-cols-1 lg:grid-cols-2 gap-8">
                @php
                    $testimonials = [
                        [
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711556946/grcuqrtowisdjwhagoy3.jpg',
                            'title' => 'The very best in the business',
                            'description' =>
                                'This program is designed to empower middle managers to thrive as change and alignment agents by inspiring their teams’ conviction, commitment, and a sense of congruence to drive strategic results for the organization. Key Outcomes for participating organizations include.',
                            'name' => 'Naamani Nyozi',
                            'position' => 'Managing director, Dow Za',
                        ],
                        [
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711557040/gadvrlzzwxryjnyqduaf.jpg',
                            'title' => 'The cool teachers you never had',
                            'description' =>
                                'This program is designed to empower middle managers to thrive as change and alignment agents by inspiring their teams’ conviction, commitment, and a sense of congruence to drive strategic results for the organization. Key Outcomes for participating organizations include.',
                            'name' => 'Mboyo Kabeni',
                            'position' => 'Project manager, The Soife Fund',
                        ],
                    ];
                @endphp

                @foreach ($testimonials as $testimonial)
                    <li
                        class="border border-stroke shadow-sm relative min-h-full w-full rounded-2xl p-6 lg:p-8 text-left">

                        <div
                            class="min-h-full relative flex items-center flex-col justify-center text-center gap-3 lg:p-2">
                            <h3 class="text-4xl/tight font-bold opacity-20 max-w-sm">
                                {{ $testimonial['title'] }}
                            </h3>

                            <p class="text-lg/loose">
                                {{ $testimonial['description'] }}
                            </p>

                            <div class="mt-5 self-center flex flex-col items-center justify-center">
                                <h5 class="text-xl font-semibold">{{ $testimonial['name'] }}</h5>
                                <p class="mt-px opacity-70">{{ $testimonial['position'] }}
                                </p>

                                <div class="mt-2 bg-canvas -mb-20 size-20 rounded-full border border-stroke p-1">
                                    <img class="size-full rounded-full border border-stroke"
                                        src="{{ $testimonial['image'] }}" alt="" />
                                </div>
                            </div>

                            {{-- <h3 class="text-2xl font-bold">
                                {{ $step['title'] }}
                            </h3> --}}
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</section>
