@php
    $steps = [
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714328053/unecnrhualt3imbxvjzj.jpg',
            'name' => 'Ben Owden',
            // 'position' => 'Leadership trainer and principal consultant',
            'position' => 'Principal consultant',
            'description' =>
                "Ben Owden develops leaders who lead thriving teams and organizations. He has a deep understanding of what makes organizational systems functional. And what makes people belong, grow, contribute, and challenge the status quo. He has trained and coached leaders from renowned organizations like Malala Fund, KNAUF, and CRDB Bank.\\nBen's focus is on empowering leaders to have whole-person alignment so they can thrive, both in their roles and their lives.\\nBen is the author of a personal development book, <a class='text-primary underline' href='https://www.amazon.com/Process-Where-Prepares-Your-Destiny-ebook/dp/B086Z5SDL6/ref=sr_1_1?crid=2NHCPWHGRF986&keywords=ben+owden&qid=1706865914&sprefix=ben+owd%2Caps%2C466&sr=8-1' target='_blank'>In The Process.</a>",
            'checklist' => ['Truth', 'Family', 'Congruence'],
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714328049/khexunzxlugnhkpy67kk.jpg',
            'name' => 'Jocelyne Msigwa',
            'position' => 'Leadership trainer',
            'description' =>
                "Jocelyne Msigwa is a leadership development coach and trainer. She is committed to empowering the next generation of competent and purpose-driven leaders.\\nShe is a highly accomplished and experienced HR Executive with a proven track record of translating business objectives into effective human resource strategies that drive performance, profitability, and growth while enhancing employee experience and engagement.\\nShe brings her unique blend of strategic thinking, creativity, and innovation to every project, and consistently delivers results that exceed expectations.",
            'checklist' => ['Faith', 'Family', 'Growth'],
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714328048/bhjfh11jsuvxi0zuz8cq.jpg',
            'name' => 'Goodhope Heaven',
            'position' => 'Team Building Facilitator',
            // 'description' =>
            //     "A dedicated Sales Trainer, Team-building Consultant, and Business Strategist with a track record of helping Sales Teams, Businesses, and Entrepreneurs grow their SALES through Training and Consultation.\\nHe is mostly known for starting the movement “MIMIKWANZA” Swahili for “ME FIRST” which is a front-footed ideology that champions the ethos, “I will focus on investing and improving myself so I can bring my best self in all my engagements, work and personal.”\\nGoodhope's experience in Bottomline Marketing has taught him how to organize large groups into fun, memorable, and meaningful experiences. He has served many brands and groups of people in the capacity of experiential events, training workshops, and business strategies.",
            'description' =>
                "A dedicated Sales Trainer, Team-building Consultant, and Business Strategist with a track record of helping Sales Teams, Businesses, and Entrepreneurs grow their SALES through Training and Consultation.\\nHe is mostly known for starting the movement “MIMIKWANZA” Swahili for “ME FIRST” which is a front-footed ideology that champions the ethos, “I will focus on investing and improving myself so I can bring my best self in all my engagements.”\\nGoodhope's experience in Bottomline Marketing has taught him how to organize large groups into fun, memorable, and meaningful experiences.",
            'checklist' => ['Loving Kindness', 'Family', 'Congruence'],
        ],
    ];
@endphp

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('testimonials', () => ({
            currentStep: 0,
            totalSteps: {{ json_encode(count($steps)) }},
            step: 0,
            canGoBack: false,
            canGoForward: true,
            goToStep: function(index) {
                this.currentStep = index;
                this.canGoForward = index < this.totalSteps - 1;
                this.canGoBack = index > 0;
            },
            previousStep() {
                if (this.currentStep > 0) {
                    this.goToStep(this.currentStep - 1);
                }
            },
            nextStep() {
                if (this.currentStep < this.totalSteps - 1) {
                    this.goToStep(this.currentStep + 1);
                }
            }
        }))
    });
</script>

<section id="programmes" x-data="testimonials" class="py-10 lg:py-20 bg-content/5 dark:bg-content/[0.02]">
    <div class="relative px-6 max-w-7xl mx-auto overflow-visible">
        <div class="mb-12 flex gap-12 max-w-2xl mx-auto">
            <div class="flex-1 text-center">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase">
                    <span class="font-light">Our </span>
                    trainers <span class="font-light">and</span> consultants
                </h2>

                <p class="mt-2 text-lg">
                    Here are a few sample programs we facilitate, but most of our programs are custom-built for you.
                </p>
            </div>
        </div>

        {{-- <ul role="list" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($steps as $step)
                <li
                    class="relative min-h-full w-full flex sflex-col items-start bg-card dark:bg-content/5 border border-stroke rounded-l-[100px] rounded-r-[50px] sshadow">
                    <div
                        class="min-h-full bg-accent dark:bg-card border border-stroke rounded-full -rotate-2 text-white pl-6 py-6 flex-shrink-0 w-48 flex flex-col gap-6 relative z-10">
                        <div class="h-40 w-40 flex-shrink-0 relative rounded-full overflow-hidden">
                            <img class="size-full object-cover object-top rounded-full" src="{{ $step['image'] }}"
                                alt="" />
                        </div>

                        <div class="flex-1 pr-4">
                            <h3 class="text-xl/tight font-semibold">
                                {{ $step['name'] }}
                            </h3>

                            <p class="mt-2 text-sm/relaxed text-[#fa9158]">
                                {{ $step['position'] }}
                            </p>

                            <p class="mt-3 text-xs opacity-90">
                                Trinity of Personal Values
                            </p>

                            <ul role="list" class="mt-1">
                                @foreach ($step['checklist'] as $item)
                                    <li class="flex items-center gap-1 py-1">
                                        <svg class="size-5 flex-none" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="8.25" />

                                            <path class=""
                                                d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                                fill="currentColor" stroke="none" />
                                        </svg>
                                        <p class="text-xs font-semibold">
                                            {{ $item }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="flex-1 min-h-full p-6 relative">
                        <p class="text-xs/loose xl:text-sm/loose relative z-10 opacity-60 dark:opacity-80">
                            {!! str_replace('\\n', '<br/><br/>', $step['description']) !!}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul> --}}

        <div class="mt-10 flex flex-wraps gap-8 transition-transform duration-500"
            x-bind:style="{ transform: `translateX(${-5 * currentStep}%)` }">
            @foreach ($steps as $step)
                <div class="flex-shrink-0 relative min-h-full flex items-start border rounded-l-[100px] rounded-r-[50px]"
                    x-bind:class="currentStep == {{ $loop->index }} ? 'w-3/5 bg-card dark:bg-content/5 border-stroke' :
                        'w-auto border-transparent'">

                    <div class="-ml-2 transition-transform duration-300 min-h-full bg-accent dark:bg-card border border-stroke rounded-[60px] text-white p-6 flex-shrink-0 flex flex-col gap-6 relative z-10"
                        x-bind:class="currentStep == {{ $loop->index }} ? 'w-52 -rotate-1' :
                            'w-56 -rotate-2'">

                        <img x-show="currentStep == {{ $loop->index }}"
                            class="absolute inset-0 size-full object-cover object-top rounded-[60px]"
                            src="{{ $step['image'] }}" alt="" />

                        <div class="size-36 flex-shrink-0 relative rounded-full overflow-hidden"
                            x-bind:class="currentStep == {{ $loop->index }} && 'opacity-0'">
                            <img class="size-full object-cover object-top rounded-full" src="{{ $step['image'] }}"
                                alt="" />
                        </div>

                        <div x-show="currentStep != {{ $loop->index }}" class="flex-1 pr-4">
                            <h3 class="text-xl/tight font-semibold">
                                {{ $step['name'] }}
                            </h3>

                            <p class="mt-2 text-sm/relaxed text-[#fa9158]">
                                {{ $step['position'] }}
                            </p>

                            <p class="mt-3 text-xs opacity-90">
                                Trinity of Personal Values
                            </p>

                            <ul role="list" class="mt-1">
                                @foreach ($step['checklist'] as $item)
                                    <li class="flex items-center gap-1 py-1">
                                        <svg class="size-5 flex-none" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24">
                                            <circle cx="12" cy="12" r="8.25" />

                                            <path class=""
                                                d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                                fill="currentColor" stroke="none" />
                                        </svg>
                                        <p class="text-xs font-semibold">
                                            {{ $item }}
                                        </p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="flex-1 min-h-full relative transition-all duration-300 overflow-hidden origin-left"
                        x-bind:class="currentStep != {{ $loop->index }} ? 'scale-x-0 opacity-0' : ''">

                        <div x-show="currentStep == {{ $loop->index }}" class="p-6">
                            <h3 class="text-xl/tight font-semibold">
                                {{ $step['name'] }}
                            </h3>

                            <p class="mt-2 text-sm/relaxed text-[#fa9158]">
                                {{ $step['position'] }}
                            </p>

                            <p class="mt-4 text-xs/loose xl:text-sm/loose relative z-10 opacity-60 dark:opacity-80">
                                {!! str_replace('\\n', '<br/><br/>', $step['description']) !!}
                            </p>
                        </div>

                    </div>
                </div>
            @endforeach

            <div class="w-32">&nbsp;</div>
        </div>

        <div class="z-10 absolute inset-x-12 -bottom-14 flex items-center justify-center gap-16">
            <button x-on:click="previousStep()"
                class="size-10 rounded-full flex items-center justify-center hover:bg-content/5"
                x-bind:class="!canGoBack && 'pointer-events-none opacity-20'">

                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75 3 12m0 0 3.75-3.75M3 12h18" />
                </svg>
            </button>

            <button x-on:click="nextStep()"
                class="size-10 rounded-full flex items-center justify-center hover:bg-content/5"
                x-bind:class="!canGoForward && 'pointer-events-none opacity-20'">

                <svg class="size-6" viewBox="0 0 24 24" fill="none" stroke-width="1.5" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25 21 12m0 0-3.75 3.75M21 12H3" />
                </svg>
            </button>
        </div>

    </div>
</section>
