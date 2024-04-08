<section id="programmes" class="py-10 lg:py-20 bg-content/5">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="mb-6 flex gap-12">
            <div class="flex-1">
                <h2 class="text-2xl lg:text-3xl font-semibold">
                    Our programmes
                </h2>

                <p class="mt-2 text-lg">
                    Here are a few sample programs we facilitate, but most of our programs are custom-built for you.
                </p>
            </div>
        </div>

        <ul role="list" class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            @php
                $steps = [
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1573164713712-03790a178651?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDE0fHxibGFjayUyMGxlYWRlcnNoaXB8ZW58MHx8fHwxNzEyNTU5MTk2fDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Get the right things done',
                        'description' =>
                            'Designed to help leaders and organizations get the right things done in executing their strategy. This is done by utilizing goal management systems, attention, focus, and time management techniques. ',
                        'checklist' => [
                            'Improved Productivity & Accountability',
                            'Accelerated Strategy Execution',
                            'Improved Strategic Alignment',
                        ],
                    ],
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1527525443983-6e60c75fff46?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGNvbGxhYm9yYXRpb258ZW58MHx8fHwxNzEyNTYwMzgxfDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'EQ for effective collaboration',
                        'description' =>
                            'Designed to enhance the emotional intelligence of leaders. By embracing EQ principles, leaders cultivate a harmonious, inclusive, and high-performing work environment. ',
                        'checklist' => [
                            'Improved Collaboration & Conflict Resolution',
                            'Thriving Through Accelerated DIE',
                            'Adaptive Communication & Cross-Cultural Competence',
                        ],
                    ],
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1556740758-90de374c12ad?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxjdXN0b21lciUyMGNhcmV8ZW58MHx8fHwxNzEyNTYwNDEwfDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Customer centric culture',
                        'description' =>
                            'Designed to help people develop a customer care mindset that will empower them to serve clients of all kinds relentlessly. Being able to build meaningful and long-term relationships with clients and develop strategies to bridge the expectation gap.  ',
                        'checklist' => [
                            'Enhanced Customer Satisfaction and Loyalty',
                            'Enhanced Cross-Selling and Up-Selling Opportunities',
                            'Improved Customer Retention and Lifetime Value',
                        ],
                    ],
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1611329857570-f02f340e7378?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fHByb2JsZW0lMjBzb2x2aW5nfGVufDB8fHx8MTcxMjU2MDYwM3ww&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Complex problem solving',
                        'description' =>
                            'Leaders will delve into crafting impactful questions, avoiding biases, and embracing complexity. Techniques and tools will be explored. Constructive Controversy skills and implementing Black-Box-FMEA Thinking will equip leaders to navigate challenges adeptly, fostering a culture of continual learning and improvement.',
                        'checklist' => [
                            'Avoiding Assumptions and Bias in Problem Solving',
                            'Tackling All Facets of Complexity',
                            'Building Challenger Safety for Collaborative Problem Solving',
                        ],
                    ],
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1573497491208-6b1acb260507?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxtZWV0aW5nfGVufDB8fHx8MTcxMjU2MDczNnww&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Giving And Receiving Feedback Effectively',
                        'description' =>
                            'Designed to empower leaders to give and receive feedback effectively. Hold their colleagues accountable while still showing them care and support. They will learn strategies for initiating, having, and following up on difficult conversations.',
                        'checklist' => [
                            'A Culture of Continuous Improvement ',
                            'Conflict Resolution and Relationship Building',
                            'Improved Performance and Productivity',
                        ],
                    ],
                    [
                        'image' =>
                            'https://images.unsplash.com/photo-1515169067868-5387ec356754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDd8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MTI1NjA4NDZ8MA&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Empowering high performing teams',
                        'description' =>
                            'Designed to equip leaders with the essential mindset and skills necessary to cultivate self-motivation in the face of challenges and pressure. Upon completion, leaders will possess the mindset, strategies, and action plans to consistently harness self-motivation.',
                        'checklist' => [
                            'Resilience in the Face of Challenges',
                            'Increased Team Morale and Productivity',
                            'Improved Decision-Making and Problem-Solving',
                        ],
                    ],
                ];
            @endphp

            @foreach ($steps as $step)
                <li class="relative min-h-full w-full flex flex-col p-6 pt-2 bg-card border rounded-xl shadow">
                    <div class="-mx-4 h-56 relative rounded-lg overflow-hidden">
                        <img class="size-full object-cover rounded-lg" src="{{ $step['image'] }}" alt="" />
                    </div>

                    <h3 class="mt-3.5 text-xl/tight font-semibold">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mt-1 text-sm/loose opacity-70">
                        {{ $step['description'] }}
                    </p>

                    <p class="mt-1 text-sm/loose font-semibold opacity-70">
                        Key Outcomes include:
                    </p>

                    <ul role="list" class="mb-3 text-sm">
                        @foreach ($step['checklist'] as $item)
                            <li class="mt-1 flex items-start gap-1 py-1">
                                <svg class="size-6 flex-none text-accent dark:text-content/50" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <circle cx="12" cy="12" r="8.25" />

                                    <path class="text-black dark:text-white"
                                        d="M9.307 12.248a.75.75 0 1 0-1.114 1.004l1.114-1.004ZM11 15.25l-.557.502a.75.75 0 0 0 1.15-.043L11 15.25Zm4.844-5.041a.75.75 0 0 0-1.188-.918l1.188.918Zm-7.651 3.043 2.25 2.5 1.114-1.004-2.25-2.5-1.114 1.004Zm3.4 2.457 4.25-5.5-1.187-.918-4.25 5.5 1.188.918Z"
                                        fill="currentColor" stroke="none" />
                                </svg>
                                <p class="pt-0.5 text-sm opacity-70">
                                    {{ $item }}
                                </p>
                            </li>
                        @endforeach
                    </ul>

                    {{-- <button class="mt-auto btn btn-sm w-full">
                        Transform your team
                    </button> --}}

                    <div class="mt-auto flex items-center gap-4">
                        <button class="mt-auto btn btn-sm btn-outline w-full">
                            Learn more
                        </button>
                        <button class="mt-auto btn btn-sm w-full">
                            Get started
                        </button>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
