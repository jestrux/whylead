@php
    $testimonials = [
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714305970/irycwvcf8vcbnmcee6gi.png',
            'title' => 'The very best in the business',
            'description' =>
                'The sessions Ben delivered truly helped the team think critically and open up about how we understand our team/organizational culture, values, and norms. The outdoor activities led by Goodhope were creative, challenging, and fun.',
            'name' => 'Gloria Kahamba',
            'position' => 'Country Director, D-Tree',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714305970/n71j8v2ohnag4cwxxmiv.png',
            'title' => 'The cool teachers you never had',
            'description' =>
                "The session was very helpful for enhancing communication, building trust, and being vulnerable to each other. This I believe will improve the team's conviction, commitment, and congruence.",
            'name' => 'Honorati Masanja',
            'position' => 'Executive Director, Ifakara health Institute',
        ],
        [
            'image' => 'https://res.cloudinary.com/sfp-app/image/upload/v1714305970/zkcgxr3zwd7ldlzdwnbn.png',
            'title' => 'The cool teachers you never had',
            'description' =>
                'I am extremely delighted to recommend to you the extraordinary services of WhyLead. Malala Fund collaborated with WhyLead to create a three-day team retreat for our organization after many years of only virtual work. We walked away with a sense of greater bonding, a renewed sense of purpose, and refreshed excitement to go back to our work.',
            'name' => 'Lisa Biancalana',
            'position' => 'Acting COO, Malala Fund',
        ],
    ];
@endphp

<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('testimonials', () => ({
            currentStep: 0,
            totalSteps: {{ count($testimonials) - 1 }},
            step: 0,
            canGoBack: false,
            canGoForward: true,
            goToStep: function(index) {
                this.currentStep = Math.max(0, index);
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

<section class="pt-4 pb-8" x-data="testimonials">
    <div class="relative px-6 max-w-7xl mx-auto overflow-visible">
        <div class="max-w-5xl mx-auto text-center">
            <h2 class="text-2xl lg:text-4xl font-bold uppercase">
                Testimonials
            </h2>

            <p class="text-lg opacity-70">
                We asked our clients about their WhyLead experience, here's what they had to say.
            </p>
        </div>

        <div class="mt-10 flex gap-8 transition-transform duration-500"
            x-bind:style="{ transform: `translateX(${-42 * currentStep}%)` }">
            @foreach ($testimonials as $testimonial)
                <div class="w-5/12 saspect-[1/1.25] p-8 relative flex-shrink-0 border-l border-b border-b-content/[0.008] shadow-sm border-t border-content/10 bg-gradient-to-br from-primary/10 via-primary/[0.07] dark:from-content/5 dark:via-content/[0.01] to-transparent rounded-2xl overflow-hidden flex flex-col items-start justify-between"
                    x-bind:class="{{ $loop->index - 1 }} != currentStep && ({{ $loop->index - 1 }} >= 0 || currentStep > 0) &&
                        'hover:scale-105 hover:transition-transform hover:duration-300 cursor-pointer'"
                    x-on:click="goToStep({{ $loop->index - 1 }})">
                    <svg class="absolute inset-3 w-12 opacity-5" fill="currentColor" viewBox="0 0 100 100">
                        <path
                            d="M90.4,54.9v17.7c0,4.9-4,8.9-8.9,8.9H63.8c-4.9,0-8.9-4-8.9-8.9V54.9c0-19.6,15.9-35.4,35.4-35.4V32  c-9.1,0.6-16.9,6.2-20.6,14.1h11.8C86.4,46.1,90.4,50,90.4,54.9z M37.2,81.5H19.5c-4.9,0-8.9-4-8.9-8.9V54.9  c0-19.6,15.9-35.4,35.4-35.4V32c-9.1,0.6-16.9,6.2-20.6,14.1h11.8c4.9,0,8.9,4,8.9,8.9v17.7C46.1,77.5,42.1,81.5,37.2,81.5z">
                        </path>
                    </svg>

                    <p class="text-base/loose font-light">
                        {{ $testimonial['description'] }}
                    </p>

                    <div class="mt-6 flex items-center gap-2">
                        <img class="bg-canvas h-10 flex-shrink-0 flex items-end rounded-full border border-stroke object-cover"
                            src="{{ $testimonial['image'] }}" alt="" />

                        <div class="pt-px">
                            <h5 class="text-sm opacity-80">{{ $testimonial['name'] }}</h5>
                            <p class="mt-px text-sm opacity-50">{{ $testimonial['position'] }}
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach

            <div class="w-32">&nbsp;</div>
        </div>

        <div class="z-10 absolute inset-x-12 -bottom-14 flex items-center justify-between gap-4">
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
