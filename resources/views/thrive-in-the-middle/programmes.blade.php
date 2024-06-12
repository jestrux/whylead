@php
    $faqs = [
        [
            'question' => 'SELF-LEADERSHIP',
            'answer' =>
                'How do I cultivate a mindset of continuous learning and adaptability to navigate the challenges of leadership effectively? How can I set and achieve personal and professional goals that contribute to my overall satisfaction and success? What strategies can I employ to enhance my self-awareness and align my actions with my core values?',
        ],
        [
            'question' => 'THRIVING UNDER PRESSURE',
            'answer' =>
                'In what ways can I negotiate win-win outcomes amidst conflicting demands, by leveraging my unique position to align the objectives of senior leadership with the aspirations and capabilities of my team? How can I cultivate a mindset that views obstacles and constraints through the dual lens of leadership and team needs, recognizing opportunities for growth, innovation, and strategic alignment?',
        ],
        [
            'question' => 'CULTURAL STEWARDSHIP',
            'answer' =>
                "What strategies can I implement to foster a strong sense of belonging and commitment to the organization's culture among my team members? How can I create spaces and opportunities that encourage cultural thriving and strategic advancement, while also facilitating cross-functional collaboration and understanding to strengthen the organization as a whole?",
        ],
        [
            'question' => 'COACHING FOR PERFORMANCE',
            'answer' =>
                'How do I use daily moments with my team as coaching opportunities for their sustained continuous improvement? What are effective techniques for giving feedback that motivates and supports continuous improvement? How can I create a coaching environment that encourages unlearning outdated practices and embracing new approaches? How can I transform feedback and delegation into powerful coaching moments?',
        ],
        [
            'question' => 'BUILDING SELF-MOTIVATED TEAMS',
            'answer' =>
                "In a world that’s going hybrid, How can I build self-motivated teams so I can focus on my strategic role as a change and alignment agent? What tools and approaches can I use to ensure intrinsic motivation among my team members? How can I align individual goals with the organization's strategic objectives to foster authentic engagement? In what ways can I overcome resistance to change and cultivate a thriving team dynamic?",
        ],
        [
            'question' => 'SPEARHEADING CHANGE',
            'answer' =>
                'What practices can I implement to ensure my team is adaptable and proactive in facing organizational changes? How can I serve as a catalyst for change within my team, promoting innovative thinking that not only seeks success but also views failure as a valuable asset for learning and growth, enhancing our Return on Intelligence How can I arm my team with the skills necessary for complex problem-solving and effective change management?',
        ],
    ];

    $image =
        'https://images.unsplash.com/photo-1622675103136-e4b90c9a33d6?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDMzfHxsZWFkZXJzaGlwJTIwdHJhaW5pbmd8ZW58MHx8fHwxNzA4NDMxMTM0fDA&ixlib=rb-4.0.3&q=80&w=1080';
@endphp

<section id="thrivingTeams" class="py-4 lg:py-12 md:pb-14 lg:pb-24">
    <div class="relative max-w-7xl mx-auto px-4 md:px-8">
        <div class="lg:grid grid-cols-12 gap-16 items-center">
            <div
                class="col-span-6 h-full -rotate-1 shadow-xl flex-1 hidden lg:flex items-center justify-center relative">
                <div class="p-12 relative bg-accent text-white rounded-xl size-full flex flex-col justify-between">
                    <img class="w-1/2" src="{{ asset('img/thrive-logo.png') }}" alt="" />

                    <img class="absolute bottom-12 right-0 opacity-55" src="{{ asset('img/thrive-tail.png') }}"
                        alt="" />

                    <p class="text-base/relaxed uppercase">
                        Transform Middle Managers Into Dynamic
                        Leaders Of Growth, Alignment, Culture,
                        And Change With Our 12-Week Program.
                    </p>
                </div>
            </div>

            <div class="col-span-6 pt-2 lg:pt-6 pb-6 lg:pb-20 flex flex-col gap-1 lg:gap-2">
                <h2 class="mt-3 text-2xl lg:text-3xl font-bold uppercase">
                    Programmes
                </h2>

                <p class="text-lg/loose">
                    These modules provide the tools and insights necessary for navigating complex challenges, fostering
                    a culture of continuous improvement, and driving strategic success.
                </p>

                <div class="-mx-4 md:mx-0">
                    <x-faqs :data="$faqs" />
                </div>

                <div class="mt-5">
                    <a href="{{ url('/thrive-in-the-middle/form') }}" class="btn w-full md:w-auto">
                        Sign Up for Next Cohort
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>
