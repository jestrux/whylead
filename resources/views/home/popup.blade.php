@pierdata('Course')
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data("coursePopup", () => ({
            // showPrompt: true,
            showPrompt: !localStorage.initialPopupShown,
            courses: {!! json_encode($data) !!},
            course: null,
            init() {
                localStorage.initialPopupShown = true;
            }
        }));
    });
</script>
@endpierdata()

<div x-cloak x-show="showPrompt" class="hidden fixed inset-0 z-50 bg-black/50 lg:flex items-center justify-between"
    x-data="coursePopup">
    <div class="w-full max-w-6xl mx-auto relative">
        <button x-on:click="showPrompt = false" class="absolute p-1 rounded -right-3 -top-3 z-50 bg-black text-white">
            <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div x-show="!course" class="grid grid-cols-12 bg-white rounded-2xl overflow-hidden">
            <div class="col-span-7 p-16">
                <h3 class="uppercase font-bold tracking-wide text-3xl text-accent">
                    Your partner in building a thriving
                    organization
                </h3>

                <p class="mt-3 text-lg/relaxed">
                    If you came to WhyLead for a specific reason, please click that reason below or just click the ‘X’
                    and
                    explore our plartform
                </p>

                <div class="mt-5 space-y-2">
                    <h5 class="uppercase font-bold tracking-wide">I want to</h5>

                    <ul class="space-y-3">
                        <template x-for="_course in courses">
                            <li>
                                <button x-on:click="course = _course"
                                    class="text-black/70 group hover:bg-accent/5 hover:text-accent hover:border-accent/30 transition-colors flex items-center justify-between border border-black/20 rounded-md py-3 pl-4 pr-2.5 w-full font-medium uppercase tracking-wide">
                                    <span x-text="_course.title"></span>

                                    <svg class="w-5 h-5 opacity-30 group-hover:opacity-100 group-hover:translate-x-1 transition-all"
                                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                        aria-hidden="true" data-slot="icon">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                                    </svg>
                                </button>
                            </li>
                        </template>
                    </ul>
                </div>
            </div>
            <div class="col-span-5">
                <img class="w-full h-full object-cover"
                    src="https://miro.medium.com/v2/resize:fit:4800/format:webp/0*sT1HY-7utPBlw8tP.jpg"
                    alt="" />
            </div>
        </div>

        <template x-if="course">
            <div class="relative grid grid-cols-12 bg-white rounded-2xl overflow-hidden">
                <div class="relative z-50 col-span-7 flex flex-col">
                    <div class="m-4 flex items-center">
                        <button x-on:click="course = null"
                            class="self-start btn btn-outline btn-sm border-none !text-primary">
                            <svg class="-ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>

                            Go Back
                        </button>

                        <div class="flex-1 text-center pr-16">
                            <h3 class="uppercase font-bold tracking-wide text-base/none" x-text="course.title">
                                Build thriving teams
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 pl-8">
                        <p class="text-base/loose" x-text="course.description">
                            Thriving teams start with the knowledge that not all that go alone are meant to be alone.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus tempora, assumenda
                            mollitia
                            eius
                            reprehenderit qui, fugiat quae nobis ipsum natus amet ea nostrum dicta ipsam nihil? Ea eum
                            voluptatum quisquam.
                        </p>

                        <div class="my-6">
                            <h5 class="text-accent text-sm/none uppercase font-bold tracking-wide mb-1.5">
                                What to expect
                            </h5>

                            <div x-data="{ expanded: -1 }" class="flex-1 w-full">
                                <template x-for="(entry, index) in course.faqs">
                                    <button
                                        class="w-full text-left focus:outline-none flex gap-8 md:gap-4 pt-4 px-4 md:px-0"
                                        x-bind:class="{ 'border-t': index > 0 }"
                                        @click="expanded = expanded == index ? -1 : index">
                                        <div class="flex-1">
                                            <h3 class="mb-4 text-lg/none font-medium md:text-base/none"
                                                x-text="entry.question">

                                            </h3>
                                            <div class="transition-all duration-200 max-h-0 overflow-hidden"
                                                :style="expanded == index ?
                                                    `max-height:  ${ $el.scrollHeight }px` : ''">
                                                <p class="mb-3 -mt-1 text-base leading-loose text-neutral-900/80"
                                                    x-text="entry.answer">
                                                </p>
                                            </div>
                                        </div>

                                        <div class="flex flex-col justify-between flex-shrink-0"
                                            :class="{ ' rotate-180': expanded == index }">
                                            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                                stroke="currentColor">
                                                <path x-show="expanded != index" stroke-linecap="round"
                                                    stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"
                                                    x-transition.opacity x-transition:enter.duration.200ms.delay.100ms
                                                    x-transition:leave.duration.200ms />
                                                <path x-show="expanded == index" stroke-linecap="round"
                                                    stroke-linejoin="round" d="M19.5 12h-15" x-transition.opacity
                                                    x-transition:enter.duration.200ms
                                                    x-transition:leave.duration.200ms.delay.100ms />
                                            </svg>
                                        </div>
                                    </button>
                                </template>
                            </div>
                        </div>
                    </div>

                    <div class="relative z-10 pt-3 pb-2 pl-2 border-t mt-auto flex items-center justify-between">
                        {{-- <a href="#" class="btn btn-outline btn-sm !text-black/70">
                        <svg class="-ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Prev
                    </a> --}}
                        <span class="ml-3 opacity-60" x-text="course.prompt">
                            Ready to start building thriving teams?
                        </span>

                        <span></span>

                        <button x-on:click="showPrompt = false" class="btn btn-sm srounded-r-full">
                            Contact Us

                            <svg class="-mr-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </button>
                    </div>
                </div>

                <div class="col-span-5 min-h-[500px] m-2 rounded-xl overflow-hidden relative">
                    <img class="absolute w-full h-full object-cover bg-black/5"
                        src="https://images.unsplash.com/photo-1573164574511-73c773193279?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGFmcmljYW4lMjBhbWVyaWNhbiUyMGxlYWRlcnN8ZW58MHx8fHwxNzA5NjM2OTQwfDA&ixlib=rb-4.0.3&q=80&w=1080"
                        x-bind:src="course.image" alt="" />

                    <svg class="h-full absolute z-10 -translate-x-3 scale-110" fill="white"
                        viewBox="0 0 160.288 1440">
                        <path
                            d="M 32 1440 L 48 1392 C 64 1344 96 1248 122.7 1152 C 149 1056 171 960 154.7 864 C 139 768 85 672 69.3 576 C 53 480 75 384 69.3 288 C 64 192 32 96 16 48 L 8.81745e-14 0 L 0 1440 Z" />
                    </svg>
                </div>
            </div>
        </template>
    </div>
</div>
