<section class="py-10 lg:py-14">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="flex flex-col gap-4 lg:gap-10 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">We help you</span>
                        unlock your thriving
                        <span class="hidden md:inline"><br /></span>
                        organization in 3
                        <span class="outline-text"> easy</span>
                        steps
                    </span>
                </h2>

                {{-- <p class="lg:text-4xl font-normal tracking-normal lowercase">
                    in these 3 tried and true steps
                </p> --}}
            </div>

            <ul role="list" class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                @php
                    $steps = [
                        [
                            // 'image' =>
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540972/z87huht3tyivdybtg6hv.jpg',
                            //     'https://img.freepik.com/free-photo/group-afro-americans-working-together_1303-8971.jpg?w=2000&t=st=1711451492~exp=1711452092~hmac=eebe50bf03950c1cf0d9b5abcd86f9f0a6749d7df99199e59ca725df3814559b',
                            'title' => 'Tell Us Your Unique Needs',
                            // 'title' => 'Tell Us About Your Organisation\'s unique Needs',
                        ],
                        [
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540989/ykp8fjasngktaayokhab.jpg',
                            // 'title' => 'We Co-Create a Custom-made Solution just for you',
                            'title' => 'We Co-Create a Solution',
                        ],
                        [
                            // 'image' =>
                            //     'https://img.freepik.com/free-photo/happy-business-team-celebrating-success_1262-21070.jpg?t=st=1711452063~exp=1711455663~hmac=3166141d46a0c03ee0c29daaa920a4324a697d6cf2d8565b7d4752fae52f2c99&w=900',
                            'image' =>
                                'https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg',
                            // 'title' => 'You Unlock a Thriving Organisation',
                            'title' => 'Unlock a Thriving Organisation',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="text-white border border-stroke shadow-sm relative min-h-full w-full rounded-2xl overflow-hidden p-4 text-left">
                        <img class="absolute inset-0 size-full rounded-2xl object-cover object-top"
                            src="{{ $step['image'] }}" />

                        @if ($loop->index < 2)
                            <div class="absolute inset-0 bg-black/70 rounded-2xl"></div>
                        @endif

                        {{-- <small class="text-5xl absolute -top-8 s-left-4 text-black/5 font-bold bg-white pb-4 pr-4">
                            Step {{ $loop->iteration }}
                        </small> --}}

                        <div class="min-h-full relative flex items-start flex-col justify-between gap-3 lg:p-2">
                            <small
                                class="inline-flex text-xs/none py-2 px-3 rounded-full border border-white bg-white/10 uppercase tracking-widest">
                                <span class="mt-px">Step 0{{ $loop->iteration }}</span>
                            </small>

                            <div class="flex-1 min-h-12"></div>

                            <h3 class="text-3xl">
                                {{ $step['title'] }}
                            </h3>

                            {{-- <p class="font-normals text-sm/loose">
                                This program is designed to empower middle managers to thrive as change and alignment agents
                                by inspiring their teams’ conviction, commitment, and a sense of congruence to drive
                                strategic results for the organization. Key Outcomes for participating organizations
                                include.
                            </p> --}}
                        </div>
                    </li>
                @endforeach
            </ul>

            <div class="text-center">
                <p class="text-lg opacity-70">Ready to take your organisation to the next level?</p>
                <a href="#" class="mt-3 btn">
                    Tell us your needs
                </a>
            </div>
        </div>
    </div>
</section>
