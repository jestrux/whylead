@pierdata(["model" => 'Course', "orderBy" => "order,asc"])
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data("coursePopup", () => ({
            showPrompt: localStorage.initialPopupShown != 'true',
            courses: {!! json_encode($data) !!},
            course: null,
            updateScroll() {
                const newValue = this.showPrompt;
                document.documentElement.classList.toggle("overflow-hidden", newValue);
                document.body.classList.toggle("overflow-hidden", newValue);
            },
            init() {
                if (localStorage.initialPopupShown == 'true') {
                    setTimeout(() => {
                        localStorage.initialPopupShown = false;
                    }, 500);
                }

                this.courses = this.courses.map(function(course) {
                    course.faqs = course.faqs.sort(function(a, b) {
                        return a.order - b.order;
                    });
                    return course;
                });

                this.updateScroll();
            }
        }));
    });
</script>
@endpierdata()

<div x-cloak x-show="showPrompt" class="fixed inset-0 z-50 bg-black/70 lg:flex items-center justify-between"
    x-data="coursePopup">
    <div class="w-full max-w-4xl mx-auto relative">
        <button x-on:click="showPrompt = false; updateScroll()"
            class="absolute p-1 rounded right-2 lg:-right-3 top-1 lg:-top-3 z-50 bg-content text-canvas border border-white/30">
            <svg class="size-7" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12"></path>
            </svg>
        </button>

        <div x-show="!course" class="lg:grid grid-cols-12 bg-card border border-stroke lg:rounded-2xl overflow-hidden">
            <div class="col-span-7 p-4 lg:p-10 relative z-10 h-screen overflow-y-auto lg:max-h-[420px]">
                <h3 class="mt-10 lg:mt-0 uppercase font-bold tracking-wide text-2xl">
                    Your partner in building a thriving
                    organization
                </h3>

                <p class="mt-2 leading-relaxed">
                    If you came to WhyLead for a specific reason, please click the reason below or just continue
                    to explore our plartform.
                </p>

                <div class="mt-5 space-y-2">
                    <h5 class="uppercase font-bold tracking-wide">I want to</h5>

                    <ul class="space-y-3">
                        <template x-for="_course in courses">
                            <li>
                                <button x-on:click="course = _course"
                                    class="text-content/70 group hover:bg-content/5 hover:text-content transition-colors flex items-center justify-between border border-stroke hover:border-content/30 rounded-md py-3 pl-4 pr-2.5 w-full text-sm/none font-medium uppercase tracking-wide">
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
            <div class="col-span-5 relative overflow-hidden">
                <img class="absolute size-full object-cover"
                    src="https://miro.medium.com/v2/resize:fit:4800/format:webp/0*sT1HY-7utPBlw8tP.jpg"
                    alt="" />

                <svg class="h-full absolute z-10 -mt-2 -left-24 rotate-6 text-card" fill="currentColor"
                    viewBox="0 0 687.944 2294.189">
                    <path
                        d="M320.441,2294.187c-33.1,0-60-63.5-60-141.634v-153.2c0-78.134,26.9-141.634,60-141.634h-7.76c-34.2,0-61.4-72.872-60-160.369,1.6-102.126,8-203.99,26.4-295.852q27-134.71,107.9-303.031,80.85-168.2,96.7-220.412c.206-.7-96.9,266.816-96.7,266.117-49.535,33.984-47.828.095-107.9,0-127.132,0-290.691-265.312-278.5-509.11Q17.531,389.89,96.781,210.4,189.781-.128,340.881,0q159,0,253,213.227,94.049,213.227,94,496.247,0,156.649-34.6,296.362-34.652,140.1-147.8,380.527-58.5,124.7-72.7,200.4-8.4,44.262-11.3,130.089c-2.8,79.544-28.6,140.869-59.8,140.869h5.759c33.1,0,60,63.266,60,141.634v153.2c0,78.135-26.9,141.634-60,141.634Z"
                        transform="translate(0.063)" />
                </svg>
            </div>
        </div>

        <template x-if="course">
            <div class="relative lg:grid grid-cols-12 bg-card border border-stroke lg:rounded-2xl overflow-hidden">
                <div class="relative z-20 col-span-7 flex flex-col h-screen overflow-y-auto lg:max-h-[420px]">
                    <div class="lg:p-4 flex flex-col lg:flex-row gap-4 items-center lg:bg-card sticky top-0">
                        <button x-on:click="course = null"
                            class="self-start btn btn-outline btn-sm border-none !text-primary">
                            <svg class="-ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                            </svg>

                            Go Back
                        </button>

                        <div class="flex-1 text-center lg:pr-16">
                            <h3 class="uppercase font-bold tracking-wide text-base/none" x-text="course.title">
                                Build thriving teams
                            </h3>
                        </div>
                    </div>

                    <div class="p-4 lg:pl-8">
                        <p class="text-base/loose" x-text="course.description">
                            Thriving teams start with the knowledge that not all that go alone are meant to be alone.
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusamus tempora, assumenda
                            mollitia
                            eius
                            reprehenderit qui, fugiat quae nobis ipsum natus amet ea nostrum dicta ipsam nihil? Ea eum
                            voluptatum quisquam.
                        </p>

                        <div class="my-6">
                            <h5
                                class="text-accent dark:text-white/70 text-sm/none uppercase font-bold tracking-wide mb-1.5">
                                What to expect
                            </h5>

                            <div x-data="{ expanded: -1 }" class="-mx-4 lg:mx-0 flex-1 lg:w-full">
                                <template x-for="(entry, index) in course.faqs">
                                    <button
                                        class="w-full text-left focus:outline-none flex gap-8 md:gap-4 pt-4 px-4 md:px-0"
                                        x-bind:class="{ 'border-t border-stroke': index > 0 }"
                                        @click="expanded = expanded == index ? -1 : index">
                                        <div class="flex-1">
                                            <h3 class="mb-4 text-lg/none font-medium md:text-base/none"
                                                x-text="entry.question">
                                            </h3>
                                            <div class="transition-all duration-200 max-h-0 overflow-hidden"
                                                :style="expanded == index ?
                                                    `max-height:  ${ $el.scrollHeight }px` : ''">
                                                <p class="mb-3 -mt-1 text-base leading-loose text-content/70"
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

                    <div
                        class="sticky bottom-0 bg-card z-10 pt-3 pb-2 px-4 lg:px-0 lg:pl-2 border-t border-stroke mt-auto flex items-center justify-between">
                        {{-- <a href="#" class="btn btn-outline btn-sm !text-black/70">
                        <svg class="-ml-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 19.5 8.25 12l7.5-7.5" />
                        </svg>
                        Prev
                    </a> --}}
                        <span class="lg:ml-3 opacity-60" x-text="course.prompt">
                            Ready to start building thriving teams?
                        </span>

                        <span></span>

                        <a x-bind:href="'{{ url('/') }}' + course.action" x-on:click="showPrompt = false"
                            class="btn btn-sm srounded-r-full flex-shrink-0">
                            Get in touch

                            <svg class="-mr-1 size-4" fill="none" viewBox="0 0 24 24" stroke-width="3"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m8.25 4.5 7.5 7.5-7.5 7.5" />
                            </svg>
                        </a>
                    </div>
                </div>

                <div class="col-span-5 m-2 rounded-xl soverflow-hidden relative">
                    <img class="absolute w-full h-full object-cover bg-black/5"
                        src="https://images.unsplash.com/photo-1573164574511-73c773193279?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3wxNjE2NXwwfDF8c2VhcmNofDR8fGFmcmljYW4lMjBhbWVyaWNhbiUyMGxlYWRlcnN8ZW58MHx8fHwxNzA5NjM2OTQwfDA&ixlib=rb-4.0.3&q=80&w=1080"
                        x-bind:src="course.image" alt="" />

                    <svg class="h-full absolute z-10 -left-24 top-12s scale-105 -rotate-6s text-card"
                        viewBox="0 0 687.881 2374.188" fill="currentColor">
                        <path id="Union_2" data-name="Union 2"
                            d="M320.441,2374.188c-33.1,0-60-145.745-60-325.083V1779.767c-5.363-24.2-8.238-52.447-7.759-82.417.816-52.135,2.884-104.205,7.161-154.908C123.157,1476.846,0,1131.013,0,779.313Q0,727.584,2.348,682.1A208.976,208.976,0,0,1,.581,635.063Q17.531,389.89,96.781,210.4,189.781-.128,340.881,0q159,0,253,213.227,94.049,213.227,94,496.247,0,156.649-34.6,296.362-34.652,140.1-147.8,380.527-58.5,124.7-72.7,200.4-3.791,19.975-6.44,48.416c.721,20.153,1.1,40.988,1.1,62.3V2049.1c0,179.338-26.9,325.083-60,325.083Z" />
                    </svg>
                </div>
            </div>
        </template>
    </div>
</div>
