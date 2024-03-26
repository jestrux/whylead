<section class="py-10 lg:py-24">
    <div class="relative max-w-7xl mx-auto">
        <div class="flex flex-col gap-4 lg:gap-12 items-center justify-center">
            <div class="max-w-5xl mx-auto text-center">
                <h2 class="text-2xl lg:text-5xl/[1.3] font-bold max-w-4xl">
                    <span class="uppercase tracking-wide">
                        <span class="font-normal">Unlock your</span>
                        thriving organization
                        <span class="font-normal">in </span>
                        <span class="font-normals">3</span>
                        <span class="font-normal"> steps</span>
                    </span>
                </h2>

                {{-- <p class="lg:text-4xl font-normal tracking-normal lowercase">
                    in these 3 tried and true steps
                </p> --}}
            </div>

            <ul role="list" class="mx-auto mt-8 grid grid-cols-1 lg:grid-cols-3 gap-12">
                @php
                    $steps = [
                        [
                            // 'image' =>
                            'image' =>
                                'https://img.freepik.com/free-photo/team-business-people-collaborating-plan-financial-strategy-doing-teamwork-create-sales-report-laptop-office-employees-working-project-strategy-analyze-career-growth_482257-39530.jpg?t=st=1711451788~exp=1711455388~hmac=f1a48dbfd4dc5be458121dbf6223d7a8571489426ae87868507a86a95d8046c0&w=2000',
                            //     'https://img.freepik.com/free-photo/group-afro-americans-working-together_1303-8971.jpg?w=2000&t=st=1711451492~exp=1711452092~hmac=eebe50bf03950c1cf0d9b5abcd86f9f0a6749d7df99199e59ca725df3814559b',
                            'title' => 'Tell Us Your Unique Needs',
                            // 'title' => 'Tell Us About Your Organisation\'s unique Needs',
                        ],
                        [
                            'image' =>
                                'https://img.freepik.com/free-photo/authentic-small-youthful-marketing-agency_23-2150167354.jpg?t=st=1711451869~exp=1711455469~hmac=30ed1cb4cd24d64a5d53d52482dcc0f299006070d368b252a708b0cd16256325&w=2000',
                            // 'title' => 'We Co-Create a Custom-made Solution just for you',
                            'title' => 'We Co-Create a Solution',
                        ],
                        [
                            // 'image' =>
                            //     'https://img.freepik.com/free-photo/happy-business-team-celebrating-success_1262-21070.jpg?t=st=1711452063~exp=1711455663~hmac=3166141d46a0c03ee0c29daaa920a4324a697d6cf2d8565b7d4752fae52f2c99&w=900',
                            'image' =>
                                'https://img.freepik.com/free-photo/full-shot-silhouettes-people-jumping-sunset_23-2150557430.jpg?t=st=1711452228~exp=1711455828~hmac=c3f987cce900c4aa666f90f311343628b531460a58c638792c70f0ca90f7326f&w=2000',
                            // 'title' => 'You Unlock a Thriving Organisation',
                            'title' => 'Unlock a Thriving Organisation',
                        ],
                    ];
                @endphp

                @foreach ($steps as $step)
                    <li
                        class="bg-accent text-white border border-white relative min-h-full w-full rounded-2xl overflow-hidden p-6 text-left">
                        <img class="absolute inset-0 size-full rounded-2xl object-cover object-top sopacity-30"
                            src="{{ $step['image'] }}" />

                        @if ($loop->index < 2)
                            <div class="absolute inset-0 bg-black/70 rounded-2xl"></div>
                        @endif

                        {{-- <small class="text-5xl absolute -top-8 s-left-4 text-black/5 font-bold bg-white pb-4 pr-4">
                            Step {{ $loop->iteration }}
                        </small> --}}

                        <div class="min-h-full relative flex items-start flex-col justify-between gap-3 lg:p-2">
                            <small class="text- py-3 px-5 rounded-full border border-white uppercase tracking-widest">
                                Step 0{{ $loop->iteration }}
                            </small>

                            <div class="flex-1 min-h-56"></div>

                            <h3 class="text-4xl/[1.25] sfont-bold">
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

            <div class="mt-8 text-center">
                <p class="text-2xl">Ready to take your organisation to the next level?</p>
                <a href="#" class="mt-8 btn">
                    Tell us your needs
                </a>
            </div>
        </div>
    </div>
</section>
