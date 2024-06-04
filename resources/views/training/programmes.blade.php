<section id="programmes" class="py-10 md:py-20 bg-content/5">
    <div class="relative max-w-7xl mx-auto">
        <div class="mb-6 lg:mb-12 flex gap-12 mx-w-3xl mx-auto px-4 md:px-8">
            <div class="flex-1 text-center">
                <h2 class="text-2xl md:text-4xl font-bold uppercase">
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
                        'image' =>
                            'https://images.unsplash.com/photo-1573497491208-6b1acb260507?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDEyfHxtZWV0aW5nfGVufDB8fHx8MTcxMjU2MDczNnww&ixlib=rb-4.0.3&q=80&w=1080',
                        'title' => 'Training for Trainers',
                        'description' =>
                            'Designed to equip your managers to elevate their skills as internal trainers, transforming them into proficient educators who can effectively transfer knowledge and foster a learning-oriented culture within your organization. ',
                        'checklist' => [
                            'Cost-Effective Development',
                            'Improved Leadership and Communication Skills',
                            'Becoming a Trusted Facilitator',
                        ],
                    ],
                    [
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
                <section class="md:py-12 scrollable-section">
                    <div class="px-4 md:px-8 relative max-w-7xl mx-auto">
                        <div class="md:grid grid-cols-2 gap-16 items-center">
                            @php
                                $image = $programme['image'];
                            @endphp

                            <div class="md:hidden mb-3">
                                <a href="#" class="block relative">
                                    <div
                                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                                        <img class="absolute w-full h-full object-cover object-top"
                                            src="{{ $image }}" alt="" />
                                    </div>
                                </a>
                            </div>

                            <div class="flex flex-col gap-1 md:gap-2">
                                <h3 class="mt-2 text-2xl md:text-3xl uppercase font-bold">
                                    {{ $programme['title'] }}
                                </h3>

                                <p class="text-lg/loose">
                                    {{ $programme['description'] }}
                                </p>

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
                                    <a href="{{ url('/contacts?interest=Training') }}" class="btn w-full md:w-auto">
                                        Transform Your Leaders
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
            @endforeach
        </ul>
    </div>
</section>

<script>
    (function activateScrollableSections() {
        if (window.innerWidth <= 767) return;

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
                    min-height: calc(95vh - 96px) !important;
                    display: flex !important;
                    align-items: center !important;
                    transition: all 0.35s ease-out;
                    opacity: 0;
                    pointer-events: none;
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
                    pointer-events: auto;
                }

                .scroll-section-indicator {
                    position: absolute;
                    top: 0;
                    bottom: 0;
                    width: 12px;
                    z-index: 10;
                }

                @media only screen and (max-width: 1023px) {
                    .scroll-section-indicator {
                        left: 2rem;
                    }
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
                    gap: 1rem;
                    font-size: 1rem;
                    font-weight: bold;
                }

                .slide-button {
                    display: flex;
                    width: 2.5rem;
                    height: 2.5rem;
                    align-items: center;
                    justify-content: center;
                    border-radius: 50%;
                }

                .slide-button svg {
                    width: 1.5rem;
                    height: 1.5rem;
                }

                .slide-button:hover {
                    opacity: 0.9;
                }

                .scrollable-sections:not(.can-slide-up) .slide-up,
                .scrollable-sections:not(.can-slide-down) .slide-down {
                    pointer-events: none;
                    opacity: 0.2;
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
                        <button class="slide-button slide-up">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 15.75 7.5-7.5 7.5 7.5" />
                            </svg>
                        </button>

                        <span class="scroll-section-current-page">01</span>

                        <div class="scroll-section-progress-wrapper">
                            <div class="scroll-section-progress" style="height: 20%"></div>
                        </div>

                        <span class="scroll-section-total-pages">01</span>

                        <button class="slide-button slide-down">
                            <svg viewBox="0 0 24 24" fill="none" stroke-width="2" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
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
            slideSections
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
                    currentPage.setAttribute("data-page", page);
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

        function observeCurrentPage(item, callback) {
            var observer = new MutationObserver(function(mutations) {
                var openChanged = mutations.find(
                    ({
                        attributeName
                    }) => attributeName == "data-page"
                );

                const page = item.getAttribute("data-page");
                if (openChanged && page != null) callback(Number(page));
            });

            observer.observe(item, {
                attributes: true
            });
        }

        function scrollTo(element, jump) {
            window.scrollTo({
                top: element.getBoundingClientRect().top + window.pageYOffset
            });
        }

        document.querySelectorAll(".scrollable-sections").forEach(function(node) {
            var currentPageIndex = 0;
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
            var slideUp = indicator.querySelector(".slide-up");
            var slideDown = indicator.querySelector(".slide-down");
            var sections = node.querySelectorAll(".scrollable-section");

            slideUp.onclick = function() {
                scrollTo(sections[currentPageIndex - 1])
            }

            slideDown.onclick = function() {
                scrollTo(sections[currentPageIndex + 1]);
            }

            node.prepend(sectionSlides);
            node.appendChild(indicator);

            pageCount.textContent = sections.length.toString().padStart(2, "0");

            observeCurrentPage(currentPage, (newPage) => {
                currentPageIndex = Math.max(0, newPage - 1);
                node.classList.toggle("can-slide-up", currentPageIndex > 0);
                node.classList.toggle("can-slide-down", newPage < sections.length);
            });

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
