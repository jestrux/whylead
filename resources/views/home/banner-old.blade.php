<style>
    @media only screen and (max-width: 767px) {
        #banner .Slider .SlideMarkers {
            margin-bottom: 1.5rem;
        }
    }

    @media only screen and (min-width: 768px) {
        #banner .Slider .SlideMarkers {
            position: absolute;
            bottom: 5rem;
        }
    }

    #banner .SlideContainer {
        overflow: visible;
    }

    #banner .Slider .SlideScroller {
        transition: none;
    }

    #banner .Slider .SlideItem {
        transition: none;
    }

    #banner .Slider .SlideItem.current {
        opacity: 1 !important;
    }
</style>

<div class="relative">
    <div class="absolute inset-0">
        <div class="relative w-full h-full">

            <img class="size-full object-cover"
                src="https://sg.fiverrcdn.com/press_release/1140/Press-Page%20-%201_press_image_1665061343.png" />

            <div class="absolute inset-0 bg-black/70"></div>
        </div>
    </div>

    <section id="banner" class="text-white overflow-hidden px-4 md:px-0 pt-20 lg:pt-40 lg:pb-16 -mt-24 relative">
        <div class="w-full max-w-[1400px] mx-auto px-6">
            <div class="flex-1 py-12 flex flex-col justify-center items-center md:max-w-5xl mx-auto lg:text-center">
                <h1 class="text-3xl md:text-5xl/[1.2] font-bold mb-2 md:mb-4">
                    Strategic Leaps Begin
                    <span class="hidden md:inline"><br /></span>
                    With a Single,
                    Intentional Step
                </h1>
                <p class="max-w-3xl mb-8 md:text-xl md:leading-loose opacity-90">
                    The impact We Create With Your <span class="font-bold">Leaders, Culture</span>, and Organization
                    Will Lead to a <span class="font-bold">Thriving</span>
                    Organization
                </p>

                <div class="w-full flex flex-col md:flex-row items-center justify-center gap-3">
                    {{-- <a href="#" class="btn btn-outline w-full md:w-auto !text-white">
                        Find Out More
                    </a> --}}

                    <a href="#" class="btn w-full md:w-auto">
                        Take that step today
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

<section class="px-6">
    <div class="flex flex-col items-center justify-center">
        <div class="max-w-2xl mx-auto mt-11 mb-7 text-center">
            <h2 class="text-2xl/none lg:text-3xl/none font-bold">
                <span class="uppercase tracking-wide">
                    <span class="font-light text-primary">Trusted </span>
                    Globally
                </span>
            </h2>
        </div>

        <div class="px-8 space-y-6">
            <div class="grid grid-cols-3 lg:flex gap-6 lg:gap-8 items-center justify-between">
                <img class="grayscale h-6"
                    src="{{asset('img/clients/malala.svg')}}" />

                <img class="grayscale h-12"
                    src="{{asset('img/clients/women-lift.png')}}" />

                <img class="grayscale h-10"
                    src="{{asset('img/clients/crdb.png')}}" />

                <img class="grayscale h-8"
                    src="{{asset('img/clients/oryx.png')}}" />

                <img class="grayscale h-8"
                    src="{{asset('img/clients/jane-goodall.png')}}" />

                <img class="grayscale h-8" src="{{asset('img/clients/ubongo.png')}}" />

                <img class="grayscale h-8"
                    src="{{asset('img/clients/rti.png')}}" />
            </div>

            <div class="grid grid-cols-3 lg:flex gap-6 lg:gap-8 items-center justify-between">
                <img class="grayscale h-8" src="{{asset('img/clients/vodacom.png')}}" />

                <img class="grayscale h-8" src="{{asset('img/clients/knauf.svg')}}" />

                <img class="grayscale h-6"
                src="{{asset('img/clients/uongozi.svg')}}" />


                <img class="grayscale h-8" src="{{asset('img/clients/d-tree.png')}}" />

                <img class="grayscale h-14" src="{{asset('img/clients/ifakara.png')}}" />

                <img class="grayscale h-5"
                    src="{{asset('img/clients/dot.png')}}" />

                <img class="grayscale h-8"
                    src="{{asset('img/clients/nest.webp')}}" />
            </div>
        </div>
    </div>
</section>
