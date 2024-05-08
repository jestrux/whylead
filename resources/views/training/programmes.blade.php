<section id="programmes" class="py-10 lg:py-20 bg-content/5">
    <div class="relative max-w-7xl mx-auto px-8">
        <div class="mb-12 flex gap-12 mx-w-3xl mx-auto">
            <div class="flex-1 text-center">
                <h2 class="text-2xl lg:text-4xl font-bold uppercase">
                    <span class="font-light">Training </span> programmes
                </h2>

                <p class="mt-2 text-lg">
                    Discover how WhyLead's tailored programs can transform your organization.
                </p>
            </div>
        </div>

        <ul role="list" class="scrollable-sections flex flex-col gap-8">
            @php
                $steps = [
                    [
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1515169067868-5387ec356754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDd8fHRlYW0lMjBidWlsZGluZ3xlbnwwfHx8fDE3MTI1NjA4NDZ8MA&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-empowering-high-performing-teams.jpg'),
                        'title' => 'Empowering high performing teams',
                        'description' =>
                            'Designed to equip leaders with the essential mindset and skills necessary to cultivate self-motivation in the face of challenges and pressure. Upon completion, leaders will possess the mindset, strategies, and action plans to consistently harness self-motivation.',
                        'checklist' => [
                            'Resilience in the Face of Challenges',
                            'Increased Team Morale and Productivity',
                            'Improved Decision-Making and Problem-Solving',
                        ],
                    ],
                    [
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1573164713712-03790a178651?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDE0fHxibGFjayUyMGxlYWRlcnNoaXB8ZW58MHx8fHwxNzEyNTU5MTk2fDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-get-the-right-things-done.jpg'),
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
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1527525443983-6e60c75fff46?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGNvbGxhYm9yYXRpb258ZW58MHx8fHwxNzEyNTYwMzgxfDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-eq-for-effective-collaboration.jpg'),
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
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1611329857570-f02f340e7378?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fHByb2JsZW0lMjBzb2x2aW5nfGVufDB8fHx8MTcxMjU2MDYwM3ww&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-complex-problem-solving.jpg'),
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
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1573497491208-6b1acb260507?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxtZWV0aW5nfGVufDB8fHx8MTcxMjU2MDczNnww&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-feedback.jpg'),
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
                        // 'image' =>
                        //     'https://images.unsplash.com/photo-1556740758-90de374c12ad?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxjdXN0b21lciUyMGNhcmV8ZW58MHx8fHwxNzEyNTYwNDEwfDA&ixlib=rb-4.0.3&q=80&w=1080',
                        'image' => asset('img/uploads/programmes-customer-centric.jpg'),
                        'title' => 'Customer centric culture',
                        'description' =>
                            'Designed to help people develop a customer care mindset that will empower them to serve clients of all kinds relentlessly. Being able to build meaningful and long-term relationships with clients and develop strategies to bridge the expectation gap.  ',
                        'checklist' => [
                            'Enhanced Customer Satisfaction and Loyalty',
                            'Enhanced Cross-Selling and Up-Selling Opportunities',
                            'Improved Customer Retention and Lifetime Value',
                        ],
                    ],
                ];
            @endphp

            @foreach ($steps as $programme)
                <section class="py-12 scrollable-section">
                    <div class="px-8 relative max-w-7xl mx-auto">
                        <div class="lg:grid grid-cols-2 gap-16 items-center">
                            @php
                                $image = $programme['image'];
                            @endphp

                            <div class="md:hidden">
                                <a href="#" class="block relative">
                                    <div
                                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                                        <img class="absolute w-full h-full object-cover object-top"
                                            src="{{ $image }}" alt="" />

                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <span
                                                class="w-12 h-12 flex items-center justify-center rounded-full bg-white text-accent">
                                                {{-- <svg class="w-14" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor">
                                                <path d="M8 5v14l11-7z" stroke-linecap="round" stroke-linejoin="round" />
                                            </svg> --}}

                                                <svg class="w-6 ml-1" fill="currentColor" viewBox="0 0 24 24"
                                                    stroke-width="1" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M5.25 5.653c0-.856.917-1.398 1.667-.986l11.54 6.347a1.125 1.125 0 0 1 0 1.972l-11.54 6.347a1.125 1.125 0 0 1-1.667-.986V5.653Z" />
                                                </svg>

                                            </span>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            <div class="flex flex-col gap-2">
                                {{-- <h2 class="mt-3 text-2xl lg:text-4xl/tight font-bold uppercase">
                                    {{ $programme['title'] }}
                                </h2> --}}
                                <h3 class="mt-2 text-3xl uppercase font-bold">
                                    {{ $programme['title'] }}
                                </h3>

                                <p class="text-lg/loose">
                                    {{ $programme['description'] }}
                                </p>

                                {{-- <p class="mt-1 text-sm/loose opacity-70">
                                </p> --}}

                                <p class="mt-2 text-base/relaxed opacity-70">
                                    Key Outcomes include:
                                </p>

                                @php
                                    $checklist = collect($programme['checklist'])->map(
                                        fn($title) => [
                                            'icon' =>
                                                'M3 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061A1.125 1.125 0 0 1 3 16.811V8.69ZM12.75 8.689c0-.864.933-1.406 1.683-.977l7.108 4.061a1.125 1.125 0 0 1 0 1.954l-7.108 4.061a1.125 1.125 0 0 1-1.683-.977V8.69Z',
                                            'title' => $title,
                                        ],
                                    );
                                @endphp

                                <ul role="list" class="flex flex-col divide-y divide-stroke">
                                    @foreach ($checklist as $item)
                                        <li class="flex items-center gap-2 py-2">
                                            <div
                                                class="bg-content/5 dark:bg-content/10 border border-stroke size-7 rounded flex items-center justify-center">
                                                <svg class="size-4 flex-none" viewBox="0 0 24 24">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="1.6"
                                                        d="{{ $item['icon'] }}" />
                                                </svg>
                                            </div>

                                            <span class="text-base">
                                                {{ $item['title'] }}
                                            </span>
                                        </li>
                                    @endforeach
                                </ul>

                                <div class="mt-5">
                                    <a href="{{ url('/contacts') }}" class="btn w-full md:w-auto">
                                        Transform your team
                                    </a>
                                </div>
                            </div>

                            <div
                                class="-rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center aspect-[2/1.8] relative">
                                <div class="relative rounded-xl overflow-hidden size-full bg-content/5">
                                    <img class="rotate-6 scale-125 size-full" src="{{ $image }}"
                                        alt="" />
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                {{-- <li
                    class="relative min-h-full w-full flex flex-col px-4 pt-2 pb-4 bg-card dark:bg-content/5 border border-stroke rounded-xl shadow">
                    <div class="-mx-2 h-56 relative rounded-lg overflow-hidden">
                        <img class="size-full object-cover rounded-lg" src="{{ $step['image'] }}" alt="" />
                    </div>

                    <h3 class="mt-3.5 text-xl/tight font-semibold">
                        {{ $step['title'] }}
                    </h3>

                    <p class="mt-1 text-sm/loose opacity-70">
                        {{ $step['description'] }}
                    </p>

                    <p class="mt-1 text-sm/loose font-semibold opacity-70 dark:opacity-90">
                        Key Outcomes include:
                    </p>

                    <ul role="list" class="mb-3 text-sm">
                        @foreach ($step['checklist'] as $item)
                            <li class="flex items-start gap-1 py-1">
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

                    <button class="mt-auto btn btn-sm w-full">
                        Transform your team
                    </button>
                </li> --}}
            @endforeach
        </ul>
    </div>
</section>

<script>
    (function activateScrollableSections() {
        var threshold = 0.5;
        var scrollSectionStyles = document.createElement("style");
        scrollSectionStyles.innerHTML = /*css*/ `
                .scrollable-sections {
                    position: relative !important;
                }

                .scroll-section-slides {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    position: sticky;
                    top: 96px;
                    height: calc(95vh - 96px);
                    width: 100%;
                    gap: 1.5rem;
                }

                .scroll-section-slides-wrapper {
                    position: relative;
                    width: 100%;
                    height: 100%;
                    margin: 0 auto;
                    display: flex;
                    align-items: center;
                    justify-content: center;
                }

                .scrollable-section {
                    position: sticky !important;
                    top: 0 !important;
                    min-height: calc(95vh - 96px) !important;
                    display: flex !important;
                    align-items: center !important;
                    transition: all 0.35s ease-out;
                    opacity: 0;
                }

                .scroll-section-slides .scrollable-section {
                    position: absolute !important;
                    top: 0;
                    left: 3rem;
                    width: 100%;
                    height: 100%;
                }

                .scroll-section-slides .scrollable-section.visible {
                    opacity: 1;
                }

                .scroll-section-indicator {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 12px;
                    // background: red;
                    // left: 2.8rem;
                    // margin-left: -2rem;
                    z-index: 10;
                }

                .no-scroll-indicators .scroll-section-indicator-wrapper {
                    opacity: 0 !important;
                }

                .scroll-section-indicator-wrapper {
                    display: flex;
                    flex-direction: column;
                    align-items: center;
                    position: sticky;
                    top: 120px;
                    height: 100%;
                    max-height: calc(100vh - 160px);
                    margin: auto;
                    width: 4px;
                    gap: 1.5rem;
                    font-size: 1.3rem;
                    font-weight: bold;
                }

                .scroll-section-progress-wrapper {
                    flex :1;
                    position: relative;
                    width: 4px;
                    border-radius: 50px;
                    overflow: hidden;
                }

                .scroll-section-progress-wrapper:before {
                    content: "";
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    left: 0;
                    right: 0;
                    background: currentColor;
                    opacity: 0.3;
                }

                .scroll-section-progress{
                    background: currentColor;
                    transition: all 0.35s ease-out;
                }
            `;
        document.querySelector("head").appendChild(scrollSectionStyles);

        function getScrollSectionIndicator() {
            const scrollSectionIndicator = document.createElement("div");
            scrollSectionIndicator.className = "scroll-section-indicator";
            scrollSectionIndicator.innerHTML = `
                    <div class="scroll-section-indicator-wrapper">
                        <span class="scroll-section-current-page">01</span>

                        <div class="scroll-section-progress-wrapper">
                            <div class="scroll-section-progress" style="height: 20%"></div>
                        </div>

                        <span class="scroll-section-total-pages">01</span>
                    </div>
                `;

            return scrollSectionIndicator;
        }

        function getScrollSectionSlides() {
            const scrollSectionSlides = document.createElement("div");
            scrollSectionSlides.className = "scroll-section-slides";
            scrollSectionSlides.innerHTML = `
                    <div class="scroll-section-slides-wrapper">

                    </div>
                `;

            return scrollSectionSlides;
        }

        function scrollSectionObserver({
            currentPage,
            progress,
            section,
            index,
            sections,
            parent,
            totalPages,
            slideSections,
        }) {
            new IntersectionObserver(
                ([e]) => {
                    var isAbove = e.boundingClientRect.top < 0;
                    var isLastPage = index == totalPages - 1;

                    var sectionIsVisible = e.intersectionRatio > threshold;
                    var page = sectionIsVisible ? index + 1 : index;

                    if (isAbove) {
                        if (!isLastPage) return;

                        page = totalPages;
                    }

                    currentPage.textContent = page.toString().padStart(2, "0");
                    var scrollPercent = (page / totalPages) * 100 + "%";
                    progress.style.height = scrollPercent;

                    sections[index - 1].classList.toggle(
                        "visible",
                        !sectionIsVisible
                    );
                    section.classList.toggle(
                        "visible",
                        sectionIsVisible || (isLastPage && isAbove)
                    );

                    slideSections.forEach(function(section, index) {
                        section.classList.toggle("visible", index == page - 1);
                    });
                }, {
                    threshold: [threshold],
                }
            ).observe(section);
        }

        document.querySelectorAll(".scrollable-sections").forEach(function(node) {
            var sectionSlides = getScrollSectionSlides();
            var slidesWrapper = sectionSlides.querySelector(
                ".scroll-section-slides-wrapper"
            );
            var slideSections = [];

            var indicator = getScrollSectionIndicator();
            var currentPage = indicator.querySelector(
                ".scroll-section-current-page"
            );
            var progress = indicator.querySelector(".scroll-section-progress");
            var pageCount = indicator.querySelector(".scroll-section-total-pages");
            var sections = node.querySelectorAll(".scrollable-section");

            node.prepend(sectionSlides);
            node.appendChild(indicator);

            pageCount.textContent = sections.length.toString().padStart(2, "0");

            sections.forEach(function(section, index) {
                let new_section = section.cloneNode(true);
                slideSections.push(new_section);
                slidesWrapper.appendChild(new_section);

                var sectionWidth = section.getBoundingClientRect().width;

                if (index == 0)
                    slidesWrapper.style.maxWidth =
                    section.getBoundingClientRect().width;
                else if (sectionWidth > slidesWrapper.style.maxWidth) {
                    slidesWrapper.style.maxWidth =
                        section.getBoundingClientRect().width;
                }

                if (index > 0) {
                    scrollSectionObserver({
                        currentPage,
                        pageCount,
                        progress,
                        section,
                        index,
                        sections,
                        parent: node,
                        totalPages: sections.length,
                        slideSections,
                    });
                }
            });

            setTimeout(() => {
                currentPage.textContent = "01";
                progress.style.height = (1 / sections.length) * 100 + "%";
            }, 50);
        });
    })();
</script>
