<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("challenges", () => ({
            openChallenge(index) {
                var challenge = Object.assign({}, this.challenges[index]);
                challenge.solutions = challenge.solutions.map((solution) => {
                    return this.solutions.find((s) => s.title == solution);
                });
                this.challenge = challenge;
            },
            challenges: [{
                    image: "https://images.unsplash.com/photo-1544928147-79a2dbc1f389?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDF8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Helping Teams Grow",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: [
                        "Performance Management",
                        "Happier Workplace",
                    ],
                },
                {
                    image: "https://images.unsplash.com/photo-1573164574511-73c773193279?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGFmcmljYW4lMjBhbWVyaWNhbiUyMGxlYWRlcnN8ZW58MHx8fHwxNzA5NjM2OTQwfDA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Nurturing Company Culture",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["WhyLead Leaders Thriving in the Middle", "Team Health",
                        "Happier Workplace"
                    ],
                },
                {
                    image: "https://images.unsplash.com/photo-1598121210875-08d6cf351459?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDE1fHx0ZWFtJTIwYnVpbGRpbmd8ZW58MHx8fHwxNzA5NjUxNTQwfDA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Executive Alignment",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["WhyLead Leaders Thriving in the Middle", "Team Health",
                        "Facilitating Strategic Gatherings"
                    ],
                },
                {
                    image: "https://images.unsplash.com/photo-1612872087720-bb876e2e67d1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Managing Adversity and Fostering Alignment",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["Team Health"],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Inspiring and Motivating Teams",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["Performance Management", "Happier Workplace"],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Strategic Adaptability and Agility",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: [],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Leading Through Change",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["WhyLead Leaders Thriving in the Middle", "Team Health",
                        "Facilitating Strategic Gatherings"
                    ],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Making Tough Decisions",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: [],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Delivering for People, Planet, and Profit",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: ["WhyLead Leaders Thriving in the Middle", "Team Health",
                        "Facilitating Strategic Gatherings"
                    ],
                },
                {
                    image: "https://images.unsplash.com/photo-1492366254240-43affaefc3e3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDV8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MDk2NTE1NDB8MA&ixlib=rb-4.0.3&q=80&w=1080",
                    title: "Delivering for People, Planet, and Profit",
                    description: "Based on more than 30 years of research, we’ve identified dozens of distinct elements of value and quantified their linkages to growth, customer loyalty, market share, pricing and revenue",
                    solutions: [],
                },
            ],
            solutions: [{
                    title: "WhyLead Leaders Thriving in the Middle",
                    description: "Distinct elements of value and quantified their linkages to growth",
                    checklist: [
                        "Commission-free trading",
                        "One tip every day",
                        "Invest up to $1,500 each month"
                    ],
                },
                {
                    title: "Performance Management",
                    description: "Customer loyalty, market share, pricing and revenue",
                    checklist: [

                    ],
                },
                {
                    title: "Team Health",
                    description: "Quantified their linkages to growth, customer loyalty, market share",
                    checklist: [
                        "One tip every day",
                        "Invest up to $1,500 each month"
                    ],
                },
                {
                    title: "Happier Workplace",
                    description: "Value and linkages to growth, customer loyalty, market share, pricing and revenue",
                    checklist: [
                        "Commission-free trading",
                        "Invest up to $1,500 each month"
                    ],
                },
                {
                    title: "Facilitating Strategic Gatherings",
                    description: "Customer loyalty, market share, pricing and revenue",
                    checklist: [
                        "Multi-layered encryption",
                        "One tip every day",
                    ],
                },
            ],
            challenge: null,
        }));
    });
</script>

<section x-data="challenges" class="pt-20 sm:pt-40">
    <template x-if="challenge">
        <div class="fixed inset-0 z-50 bg-black/50 flex items-center justify-between">
            <div class="w-full max-w-5xl mx-auto relative">
                <button x-on:click="challenge = null"
                    class="absolute p-1 rounded right-3 lg:-right-3 -top-4 lg:-top-3 z-50 bg-content text-canvas">
                    <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
                    </svg>
                </button>

                <div class="relative lg:grid grid-cols-12 bg-card border border-stroke rounded-2xl overflow-hidden">
                    <div class="relative z-10 col-span-7 flex flex-col max-h-[85dvh] overflow-auto">
                        <div class="p-8">
                            <h3 class="text-accent dark:text-content uppercase font-bold tracking-wide text-xl/none"
                                x-text="challenge.title">
                                Build thriving teams
                            </h3>

                            <p class="mt-4 text-base/loose first-letter:uppercase"
                                x-text="challenge.title.toLowerCase() + ' lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate, tempore id. Dolore harum necessitatibus eligendi.'">
                                Thriving teams start with the knowledge that not all that go alone are meant to be
                                alone.
                                Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus tempora, assumenda
                                mollitia
                                eius
                                reprehenderit qui, fugiat quae nobis ipsum natus amet ea nostrum dicta ipsam nihil? Ea
                                eum
                                voluptatum quisquam.
                            </p>

                            <div class="my-6 min-h-[300px]">
                                <h5
                                    class="text-accent dark:text-content/70 text-sm/none uppercase font-bold tracking-wide mb-5">
                                    Recommended solutions
                                </h5>

                                <ul role="list" class="flex flex-col lg:grid grid-cols-2 gap-4">
                                    <template x-for="(solution, index) in challenge.solutions">
                                        <li>
                                            <div
                                                class="flex flex-col px-4 min-h-full w-full rounded-lg bg-card dark:bg-content/5 border border-black/[0.15] border-t-2 border-t-primary">

                                                <h3 class="mt-4 font-semibold" x-text="solution.title">
                                                </h3>

                                                <p class="my-3 opacity-80 text-sm/relaxed"
                                                    x-text="solution.description">
                                                </p>

                                                <ul x-show="solution.checklist" role="list" class="mb-3 text-sm">
                                                    <template x-for="(item, index) in solution.checklist">
                                                        <li class="flex items-center gap-2 py-2"
                                                            x-bind:class="{ 'border-t border-stroke': index > 0 }">
                                                            <svg class="size-5 flex-none text-accent dark:text-content/50"
                                                                viewBox="0 0 24 24">
                                                                <path
                                                                    d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                                                    fill="currentColor" />
                                                                <circle cx="12" cy="12" r="8.25"
                                                                    fill="none" stroke="currentColor"
                                                                    stroke-width="1" stroke-linecap="round"
                                                                    stroke-linejoin="round" />
                                                            </svg>
                                                            <span class="text-sm/none opacity-70" x-text="item"></span>
                                                        </li>
                                                    </template>
                                                </ul>

                                                <button
                                                    class="self-end mt-auto mb-2 -mr-3 btn btn-outline btn-sm capitalize !text-content/80 border-none"
                                                    x-on:click="challenge = null">
                                                    Get started

                                                    <svg class="-mr-1 size-3.5" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                    </svg>
                                                </button>
                                            </div>
                                        </li>
                                    </template>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="hidden lg:block col-span-5 min-h-full m-2 rounded-xl overflow-hidden relative">
                        <img class="absolute w-full h-full object-cover bg-black/5"
                            src="https://images.unsplash.com/photo-1573164574511-73c773193279?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGFmcmljYW4lMjBhbWVyaWNhbiUyMGxlYWRlcnN8ZW58MHx8fHwxNzA5NjM2OTQwfDA&ixlib=rb-4.0.3&q=80&w=1080"
                            x-bind:src="challenge.image" alt="" />

                        {{-- <svg class="h-full absolute z-10 -translate-x-3 scale-110 text-card" fill="currentColor"
                            viewBox="0 0 160.288 1440">
                            <path
                                d="M 32 1440 L 48 1392 C 64 1344 96 1248 122.7 1152 C 149 1056 171 960 154.7 864 C 139 768 85 672 69.3 576 C 53 480 75 384 69.3 288 C 64 192 32 96 16 48 L 8.81745e-14 0 L 0 1440 Z" />
                        </svg> --}}
                        <svg class="h-full absolute z-10 -left-24 top-12s scale-105 -rotate-6s text-card"
                            viewBox="0 0 687.881 2374.188" fill="currentColor">
                            <path id="Union_2" data-name="Union 2"
                                d="M320.441,2374.188c-33.1,0-60-145.745-60-325.083V1779.767c-5.363-24.2-8.238-52.447-7.759-82.417.816-52.135,2.884-104.205,7.161-154.908C123.157,1476.846,0,1131.013,0,779.313Q0,727.584,2.348,682.1A208.976,208.976,0,0,1,.581,635.063Q17.531,389.89,96.781,210.4,189.781-.128,340.881,0q159,0,253,213.227,94.049,213.227,94,496.247,0,156.649-34.6,296.362-34.652,140.1-147.8,380.527-58.5,124.7-72.7,200.4-3.791,19.975-6.44,48.416c.721,20.153,1.1,40.988,1.1,62.3V2049.1c0,179.338-26.9,325.083-60,325.083Z" />
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </template>

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
        <div class="mx-auto max-w-4xl sm:text-center">
            <h2 class="text-2xl lg:text-5xl font-bold max-w-4xl">
                <span class="uppercase tracking-wide">
                    <span class="outline-text">Pick </span>
                    your top
                    <span class="hidden md:inline"><br /></span>
                    leadership
                    <span class="outline-text">challenges</span>
                </span>
            </h2>
            {{-- <h2 class="text-2xl lg:text-[40px]/tight font-bold">
                Pick Your Top Leadership Challenges
            </h2> --}}

            {{-- <p class="mt-4 text-lg/relaxed">
                Click one of the challenges below to get started.
            </p> --}}
            <p class="mt-5 text-xl">
                Click one of the challenges below to get started.
            </p>
        </div>

        @php
            $solutions = [
                [
                    'icon' =>
                        'M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5',
                    'title' => 'WhyLead Leaders Thriving in the Middle',
                ],
                [
                    'icon' =>
                        'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',
                    'title' => 'Performance Management',
                ],
                [
                    'icon' => 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z',
                    'title' => 'Team Health',
                ],
                [
                    'icon' =>
                        'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z',
                    'title' => 'Happier Workplace',
                ],
                [
                    'icon' =>
                        'M6 13.5V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m12-3V3.75m0 9.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 3.75V16.5m-6-9V3.75m0 3.75a1.5 1.5 0 0 1 0 3m0-3a1.5 1.5 0 0 0 0 3m0 9.75V10.5',
                    'title' => 'Facilitating Strategic Gatherings',
                ],
            ];

            $challenges = [
                [
                    'icon' =>
                        'M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z',
                    'title' => 'Managing Adversity and Fostering Alignment',
                ],
                [
                    'icon' =>
                        'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941',
                    'title' => 'Helping Teams Grow',
                ],
                [
                    'icon' =>
                        'M12 18v-5.25m0 0a6.01 6.01 0 0 0 1.5-.189m-1.5.189a6.01 6.01 0 0 1-1.5-.189m3.75 7.478a12.06 12.06 0 0 1-4.5 0m3.75 2.383a14.406 14.406 0 0 1-3 0M14.25 18v-.192c0-.983.658-1.823 1.508-2.316a7.5 7.5 0 1 0-7.517 0c.85.493 1.509 1.333 1.509 2.316V18',
                    'title' => 'Inspiring and Motivating teams',
                ],
                [
                    'icon' =>
                        'M15 19.128a9.38 9.38 0 0 0 2.625.372 9.337 9.337 0 0 0 4.121-.952 4.125 4.125 0 0 0-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 0 1 8.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0 1 11.964-3.07M12 6.375a3.375 3.375 0 1 1-6.75 0 3.375 3.375 0 0 1 6.75 0Zm8.25 2.25a2.625 2.625 0 1 1-5.25 0 2.625 2.625 0 0 1 5.25 0Z',
                    'title' => 'Nurturing Company Culture',
                ],
                [
                    'icon' =>
                        'M9 9V4.5M9 9H4.5M9 9 3.75 3.75M9 15v4.5M9 15H4.5M9 15l-5.25 5.25M15 9h4.5M15 9V4.5M15 9l5.25-5.25M15 15h4.5M15 15v4.5m0-4.5 5.25 5.25',
                    'title' => 'Executive Alignment',
                ],
                [
                    'icon' =>
                        'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99',
                    'title' => 'Strategic Adaptability and Agility',
                ],
                [
                    'icon' => 'M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5',
                    'title' => 'Leading Through Change',
                ],
                [
                    'icon' =>
                        'M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z',
                    'title' => 'Making Tough Decisions',
                ],
                // [
                //     'icon' =>
                //         'M12.75 3.03v.568c0 .334.148.65.405.864l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.5 15.75l-.612.153M12.75 3.031a9 9 0 0 0-8.862 12.872M12.75 3.031a9 9 0 0 1 6.69 14.036m0 0-.177-.529A2.25 2.25 0 0 0 17.128 15H16.5l-.324-.324a1.453 1.453 0 0 0-2.328.377l-.036.073a1.586 1.586 0 0 1-.982.816l-.99.282c-.55.157-.894.702-.8 1.267l.073.438c.08.474.49.821.97.821.846 0 1.598.542 1.865 1.345l.215.643m5.276-3.67a9.012 9.012 0 0 1-5.276 3.67m0 0a9 9 0 0 1-10.275-4.835M15.75 9c0 .896-.393 1.7-1.016 2.25',
                //     'title' => 'Delivering for People, Planet, and Profit',
                // ],
                [
                    'icon' =>
                        'M14.25 6.087c0-.355.186-.676.401-.959.221-.29.349-.634.349-1.003 0-1.036-1.007-1.875-2.25-1.875s-2.25.84-2.25 1.875c0 .369.128.713.349 1.003.215.283.401.604.401.959v0a.64.64 0 0 1-.657.643 48.39 48.39 0 0 1-4.163-.3c.186 1.613.293 3.25.315 4.907a.656.656 0 0 1-.658.663v0c-.355 0-.676-.186-.959-.401a1.647 1.647 0 0 0-1.003-.349c-1.036 0-1.875 1.007-1.875 2.25s.84 2.25 1.875 2.25c.369 0 .713-.128 1.003-.349.283-.215.604-.401.959-.401v0c.31 0 .555.26.532.57a48.039 48.039 0 0 1-.642 5.056c1.518.19 3.058.309 4.616.354a.64.64 0 0 0 .657-.643v0c0-.355-.186-.676-.401-.959a1.647 1.647 0 0 1-.349-1.003c0-1.035 1.008-1.875 2.25-1.875 1.243 0 2.25.84 2.25 1.875 0 .369-.128.713-.349 1.003-.215.283-.4.604-.4.959v0c0 .333.277.599.61.58a48.1 48.1 0 0 0 5.427-.63 48.05 48.05 0 0 0 .582-4.717.532.532 0 0 0-.533-.57v0c-.355 0-.676.186-.959.401-.29.221-.634.349-1.003.349-1.035 0-1.875-1.007-1.875-2.25s.84-2.25 1.875-2.25c.37 0 .713.128 1.003.349.283.215.604.401.96.401v0a.656.656 0 0 0 .658-.663 48.422 48.422 0 0 0-.37-5.36c-1.886.342-3.81.574-5.766.689a.578.578 0 0 1-.61-.58v0Z',
                    'title' => 'Fostering Innovation and Collaboration',
                ],
            ];
        @endphp

        <ul role="list" class="mx-auto mt-16 grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($challenges as $challenge)
                @php
                    $i = $loop->iteration;
                    $isEven = $i > 0 && $i % 2 == 0;
                @endphp
                <li>
                    <button x-on:click="openChallenge({{ $loop->index }})"
                        class="{{ $isEven ? 'bg-accent text-white' : 'bg-card dark:bg-content/5' }} group hover:scale-105 transition flex flex-col gap-3 min-h-full w-full rounded-2xl border border-black/5  shadow px-6 py-6 text-left">
                        <svg class="size-8" viewBox="0 0 24 24">
                            <path class="text-primary" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" d="{{ $challenge['icon'] }}" />

                            <circle
                                class="transition-transform duration-500 opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-110 group-hover:translate-x-2 group-hover:translate-y-2"
                                cx="7" cy="7" r="8" fill="currentColor" fill-opacity="0.06">
                            </circle>
                        </svg>

                        <h3 class="font-medium">
                            {{ $challenge['title'] }}
                        </h3>

                        {{-- <p class="mt-3 opacity-80">
                            Whether it’s $1 or $1,000,000, we can put your money to work for
                            you.
                        </p> --}}
                    </button>
                </li>
            @endforeach
        </ul>
    </div>
</section>
