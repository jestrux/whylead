@php
    $image = 'https://res.cloudinary.com/sfp-app/image/upload/v1711540237/sxj9meo6zbkadvvlkw15.jpg';
@endphp

<section>
    <div class="px-8 py-12 lg:pt-20 lg:pb-32 relative max-w-7xl mx-auto">
        <div class="lg:grid grid-cols-12 gap-20 items-center">
            <div class="md:hidden">
                <a href="#" class="block relative">
                    <div
                        class="relative aspect-video rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                        <img class="absolute w-full h-full object-cover object-top" src="{{ $image }}"
                            alt="" />
                    </div>
                </a>
            </div>

            <div class="col-span-6 pt-6 pb-16 flex flex-col gap-2">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        Happier
                        <span class="outline-text">workplace</span>
                    </span>
                </h2>

                <p class="text-base/loose opacity-70">
                    Thriving Organizations have workplace cultures where people are Happier to go to work. They live in
                    a
                    world where Mondays are as exciting as Fridays. Their people operate with a deep sense of
                    satisfaction and commitment to the organization. At WhyLead, we understand what creates a happier
                    workplace and we have developed an Index to assess your workplace culture. Giving you empirical data
                    to help you make data-driven decisions.
                </p>
                <p class="mt-2 text-base/loose opacity-70">
                    Here at WhyLead, we are committed to working with your organization to get your culture to this
                    place where your turnover is low, your engagement is high, people are united and collaborating, and
                    they are contributing at a high level. The journey to a happier workplace begins with our index, but
                    it doesn’t end there. We work with you to co-create solutions to address the identified cultural
                    gaps.
                </p>

                <p class="mt-3 text-base/relaxed opacity-70">
                    Insights generated will help your organization to:
                </p>

                @php
                    $data = [
                        [
                            'question' => 'Grow your Revenue and Increase Your Profit ',
                            'answer' =>
                                "You'll be able to develop a data-driven strategy for your people and culture. Ultimately shaping your culture to foster higher productivity and a culture conducive for innovation. ",
                        ],
                        [
                            'question' => 'Reduce Turnover and Retain Your Top Talent',
                            'answer' =>
                                "Separations are costly, especially with top talent. With the data we will provide you'll be able to develop a data-driven strategy to strengthen your culture and meet the cultural needs of your people.",
                        ],
                    ];
                @endphp

                <x-faqs :data="$data" />

                <div class="mt-3 gap-3">
                    <a href="#" class="btn w-full md:w-auto">
                        Get in touch
                    </a>
                </div>
            </div>

            <div
                class="col-span-6 h-full -rotate-1 shadow-xl flex-1 hidden md:flex items-center justify-center relative">
                <div
                    class="relative rounded-xl srounded-t-full srounded-b-[100%] overflow-hidden w-full h-full bg-neutral-300">
                    <img class="rotate-6 scale-125 absolute size-full object-cover" src="{{ $image }}"
                        alt="" />

                </div>

                <div class="absolute -top-6 -bottom-6 -left-6 rotate-1">
                    <div
                        class="sticky top-24 self-start border border-white/10 p-1.5 pr-6 rounded-lg overflow-hidden text-white inline-flex items-center gap-2">
                        <div class="absolute inset-0 bg-accent"></div>
                        <div class="relative rounded-lg overflow-hidden">
                            <div
                                class="text-base/none tracking-wide font-semibold relative h-12 min-w-14 px-2.5 text-white text-center bg-gradient-to-br from-primary to-accent flex items-center justify-center">
                                4X
                            </div>
                        </div>

                        <div class="relative text-sm/snug">
                            Of clients said they managed <br /> a 4x increase in revenue.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
