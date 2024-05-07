@pierdata(["model" => 'Challenge', "orderBy" => "order,asc"])
@php
    $challenges = $data;
@endphp

<script>
    document.addEventListener("alpine:init", () => {
        Alpine.data("challenges", () => ({
            openChallenge(name) {
                this.challenge = Object.assign({}, this.challenges.find((c) => c.title == name));
            },
            challenges: {!! json_encode($challenges) !!},
            challenge: null,
        }));
    });
</script>

<section x-data="challenges" class="py-20">
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
                    <div class="relative z-10 col-span-7 flex flex-col max-h-[500px] overflow-auto">
                        <div class="p-8">
                            <h3 class="text-accent dark:text-content uppercase font-bold tracking-wide text-xl/none"
                                x-text="challenge.title">
                                Build thriving teams
                            </h3>

                            <p class="mt-4 text-base/loose first-letter:uppercase" x-text="challenge.description">
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

                                                <ul x-show="solution.checklist_items" role="list"
                                                    class="mb-3 text-sm">
                                                    <template x-for="(item, index) in solution.checklist_items">
                                                        <li class="flex items-start gap-1 py-1">
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
                                                            <p class="pt-0.5 text-xs opacity-70" x-text="item.title">
                                                            </p>
                                                        </li>
                                                    </template>
                                                </ul>

                                                <a x-bind:href="'{{ url('/contacts') }}?interest=' + solution.title"
                                                    class="self-end mt-auto mb-2 -mr-3 btn btn-outline btn-xs capitalize !text-content/80 border-none"
                                                    x-on:click="challenge = null">
                                                    Get in touch

                                                    <svg class="-mr-1 size-3.5" fill="none" viewBox="0 0 24 24"
                                                        stroke-width="2" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                                    </svg>
                                                </a>
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
            <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                <span class="uppercase tracking-wide">
                    <span class="outline-text">Pick </span>
                    your top
                    <span class="hidden md:inline"><br /></span>
                    leadership
                    <span class="outline-text">challenge</span>
                </span>
            </h2>
            {{-- <h2 class="text-2xl lg:text-[40px]/tight font-bold">
                Pick Your Top Leadership Challenges
            </h2> --}}

            {{-- <p class="mt-4 text-lg/relaxed">
                Click one of the challenges below to get started.
            </p> --}}
            <p class="mt-5 text-lg opacity-70">
                Click your top challenge below to discover targeted solutions.
            </p>
        </div>

        <ul role="list" class="mx-auto mt-16 grid grid-cols-1 lg:grid-cols-3 gap-6">
            @foreach ($challenges as $challenge)
                @php
                    $i = $loop->iteration;
                    $isEven = $i > 0 && $i % 2 == 0;
                @endphp
                <li>
                    <button x-on:click="openChallenge(`{{ $challenge->title }}`)"
                        class="{{ $isEven ? 'bg-accent text-white' : 'bg-card dark:bg-content/5' }} group hover:scale-105 transition duration-300 flex flex-col gap-3 min-h-full w-full rounded-2xl overflow-hidden border border-black/5 shadow px-6 py-6 text-left relative">
                        <div
                            class="absolute -inset-20 bg-current rounded-full origin-top-left scale-[0.65] opacity-0 group-hover:scale-150 {{ $isEven ? 'group-hover:opacity-10' : 'group-hover:opacity-10' }} transition-transform duration-700">
                        </div>

                        <svg class="size-8 relative" viewBox="0 0 24 24">
                            <path class="text-primary" fill="none" stroke="currentColor" stroke-linecap="round"
                                stroke-linejoin="round" d="{{ $challenge->icon }}" />

                            {{-- <circle
                                class="transition-transform duration-500 opacity-0 group-hover:opacity-100 scale-75 group-hover:scale-110 group-hover:translate-x-2 group-hover:translate-y-2"
                                cx="7" cy="7" r="8" fill="currentColor" fill-opacity="0.06">
                            </circle> --}}
                        </svg>

                        <h3 class="font-medium relative">
                            {{ $challenge->title }}
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
@endpierdata()
