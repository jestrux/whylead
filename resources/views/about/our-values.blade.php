<section class="py-10">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">Our</span>
                        Values
                    </span>
                </h2>

                {{-- <p class="lg:text-4xl font-normal tracking-normal lowercase">
                    in these 3 tried and true steps
                </p> --}}
            </div>

            <ul role="list" class="w-full grid grid-cols-1 lg:grid-cols-3 gap-8">
                @php
                    $steps = [
                        [
                            // 'image' =>
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540972/z87huht3tyivdybtg6hv.jpg',
                            'title' => 'Ubuntu Kwanza',
                            'description' =>
                                'Treating All as Ends, Never Means. working to create win-win outcomes for all earthlings.',
                        ],
                        [
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540989/ykp8fjasngktaayokhab.jpg',
                            'title' => 'Game 6',
                            'description' =>
                                'We do what we say we do. we are who we say we are. we seize every opportunity we say yes to. We go ALL-IN in and Give our absolute best. ',
                        ],
                        [
                            // 'image' =>
                            //     'https://img.freepik.com/free-photo/happy-business-team-celebrating-success_1262-21070.jpg?t=st=1711452063~exp=1711455663~hmac=3166141d46a0c03ee0c29daaa920a4324a697d6cf2d8565b7d4752fae52f2c99&w=900',
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg',
                            'title' => 'Data-Driven',
                            'description' =>
                                'If we have data, let’s look at data. If all we have are opinions, let’s go look for data.',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="min-h-full py-16 text-white border border-stroke shadow-sm relative w-full rounded-2xl overflow-hidden p-6 text-left">
                        <img class="absolute inset-0 size-full rounded-2xl object-cover object-top"
                            src="{{ $step['image'] }}" />

                        {{-- @if ($loop->index < 2) --}}
                        <div class="absolute inset-0 bg-accent/90 rounded-2xl"></div>
                        {{-- @endif --}}

                        {{-- <small class="text-5xl absolute -top-8 s-left-4 text-black/5 font-bold bg-white pb-4 pr-4">
                            Step {{ $loop->iteration }}
                        </small> --}}

                        <div class="min-h-full relative flex items-center flex-col justify-center gap-3 lg:p-2 text-center">
                            {{-- <small
                                class="inline-flex text-xs/none py-2 px-3 rounded-full border border-white bg-white/10 uppercase tracking-widest">
                                <span class="mt-px">{{ $step['title'] }}</span>
                            </small> --}}

                            <h3 class="text-2xl uppercase tracking-widest font-bold text-[#ff9962]">
                                {{ $step['title'] }}
                            </h3>

                            <p class="text-base/loose opacity-80">
                                {{ $step['description'] }}
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                <p class="text-lg opacity-70">Ready to take your organisation to the next level?</p>
                <a href="#" class="mt-6 btn">
                    Tell us your needs
                </a>
            </div>
        </div>
    </div>
</section>
