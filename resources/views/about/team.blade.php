@php
    $steps = [
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714328053/unecnrhualt3imbxvjzj.jpg',
            'name' => 'Ben Owden',
            'position' => 'Leadership trainer and principal consultant',
            // 'position' => 'Principal consultant',
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
            'description' =>
                "A dedicated Sales Trainer, Team-building Consultant, and Business Strategist with a track record of helping Sales Teams, Businesses, and Entrepreneurs grow their SALES through Training and Consultation.\\nHe is mostly known for starting the movement “MIMIKWANZA” Swahili for “ME FIRST” which is a front-footed ideology that champions the ethos, “I will focus on investing and improving myself so I can bring my best self in all my engagements, work and personal.”\\nGoodhope's experience in Bottomline Marketing has taught him how to organize large groups into fun, memorable, and meaningful experiences. He has served many brands and groups of people in the capacity of experiential events, training workshops, and business strategies.",
            // 'description' =>
            //     "A dedicated Sales Trainer, Team-building Consultant, and Business Strategist with a track record of helping Sales Teams, Businesses, and Entrepreneurs grow their SALES through Training and Consultation.\\nHe is mostly known for starting the movement “MIMIKWANZA” Swahili for “ME FIRST” which is a front-footed ideology that champions the ethos, “I will focus on investing and improving myself so I can bring my best self in all my engagements.”\\nGoodhope's experience in Bottomline Marketing has taught him how to organize large groups into fun, memorable, and meaningful experiences.",
            'checklist' => ['Loving Kindness', 'Family', 'Congruence'],
        ],
    ];
@endphp

<section id="programmes" class="py-10 lg:py-20 bg-content/5 dark:bg-content/[0.02]">
    <div class="relative max-w-7xl mx-auto px-8">
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

        <ul role="list" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @foreach ($steps as $step)
                <li
                    class="relative min-h-full w-full flex sflex-col items-start bg-card dark:bg-content/5 border border-stroke rounded-l-[100px] rounded-r-[50px] sshadow">
                    <div
                        class="min-h-full bg-accent dark:bg-accent/50 border border-stroke rounded-full -rotate-2 text-white pl-6 py-6 flex-shrink-0 w-48 flex flex-col gap-6 relative z-10">
                        <div class="h-40 w-40 flex-shrink-0 relative rounded-full overflow-hidden">
                            <img class="size-full object-cover object-top rounded-full" src="{{ $step['image'] }}"
                                alt="" />
                        </div>

                        <div class="flex-1 pr-4">
                            <h3 class="text-xl/tight font-semibold">
                                {{ $step['name'] }}
                            </h3>

                            <p class="mt-2 text-sm/relaxed text-[#fa9158]">
                                {{-- <p class="mt-2 text-sm/relaxed text-[#FFDB21]"> --}}
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
                        {{-- <svg class="w-40 absolute -top-14 -bottom-12 -left-[120px] -rotate-[8deg] text-accent"
                            fill="currentColor" viewBox="0 0 687.944 2294.189">
                            <path
                                d="M320.441,2294.187c-33.1,0-60-63.5-60-141.634v-153.2c0-78.134,26.9-141.634,60-141.634h-7.76c-34.2,0-61.4-72.872-60-160.369,1.6-102.126,8-203.99,26.4-295.852q27-134.71,107.9-303.031,80.85-168.2,96.7-220.412c.206-.7-96.9,266.816-96.7,266.117-49.535,33.984-47.828.095-107.9,0-127.132,0-290.691-265.312-278.5-509.11Q17.531,389.89,96.781,210.4,189.781-.128,340.881,0q159,0,253,213.227,94.049,213.227,94,496.247,0,156.649-34.6,296.362-34.652,140.1-147.8,380.527-58.5,124.7-72.7,200.4-8.4,44.262-11.3,130.089c-2.8,79.544-28.6,140.869-59.8,140.869h5.759c33.1,0,60,63.266,60,141.634v153.2c0,78.135-26.9,141.634-60,141.634Z"
                                transform="translate(0.063)" />
                        </svg> --}}
                        <p class="text-xs/loose xl:text-sm/loose relative z-10 opacity-60 dark:opacity-80">
                            {!! str_replace('\\n', '<br/><br/>', $step['description']) !!}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
