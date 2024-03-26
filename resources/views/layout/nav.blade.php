<style>
    @media only screen and (max-width: 680px) {

        #mainNavigationMenu,
        #mainNavigationMenuItems {
            background: #fff;
            /* background: var(--primary-color); */
            /* color: white */
        }

        #mainNavigationMenu.open button>svg:first-of-type,
        #mainNavigationMenu:not(.open) button>svg:last-of-type {
            display: none;
        }

        #mainNavigationMenuItems {
            transition: all 0.25s ease-out;
            transform-origin: 0 0;
        }

        #mainNavigationMenu:not(.open) #mainNavigationMenuItems {
            opacity: 0;
            transform: scaleY(0.9);
            pointer-events: none;
        }

        #mainNavigationMenuItems>* {
            transition: opacity 0.35s ease-out 0.15s;
        }

        #mainNavigationMenu.open #mainNavDeco {
            transition: transform 0.25s ease-in-out 0.15s;
        }

        #mainNavigationMenu:not(.open) #mainNavDeco {
            opacity: 0;
            transition: none !important;
            transform: rotate(28deg) scale(0.92) !important;
            transform-origin: top;
        }

        #mainNavigationMenu:not(.open) #mainNavigationMenuItems>* {
            opacity: 0;
        }

        #bottomLogo {
            transition: transform 0.25s ease-in-out 0.15s;
        }

        #mainNavigationMenu:not(.open) #bottomLogo {
            opacity: 0;
            transform: translateY(-30%);
        }
    }
</style>

<section id="mainNavigationMenu"
    class="sticky -top-px inset-x-0 z-50 bg-transparent lg:text-white lg:transition-colors duration-300">
    <div class="relative flex items-center justify-between p-3 md:hidden">
        <a href="#" class="ml-1 -mb-5">
            @include('common.logo', ['fill' => '#fff'])
        </a>

        <div id="mobileNavButtons" class="flex items-center gap-5">
            <div class="text-accent">
                <a href="#" class="btn btn-sm font-bold btn-outline px-0 border-none">
                    <span class="capitalize">
                        Start thriving
                    </span>
                </a>
            </div>

            <button onclick="toggleMenu()"
                class="z-10 flex items-center justify-center border rounded-full w-9 h-9 focus:outline-none">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7">
                    </path>
                </svg>
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12">
                    </path>
                </svg>
            </button>
        </div>
    </div>

    <div id="mainNavigationMenuItems"
        class="max-w-7xl mx-auto fixed top-0 bottom-0 flex flex-col px-8 py-8 md:flex-row items-centers md:justify-between md:relative md:bg-transparent md:px-0 md:py-0">
        <nav role="off-canvas" class="w-full flex items-center justify-center mt-12 md:w-auto md:mt-0">
            <ul class="w-full relative z-50 md:flex flex-col justify-center items-center h-full md:flex-row md:gap-x-8">
                {{-- <x-menu-item exact url="/">Home</x-menu-item> --}}
                <x-menu-item url="{{ url('#') }}">Consultancy</x-menu-item>
                <x-menu-item url="{{ url('#') }}">Podcast</x-menu-item>
                {{-- <x-menu-item url="{{ url('#') }}">About Us</x-menu-item> --}}
                <x-menu-item class="md:hidden" url="{{ url('/contact-us') }}">Contact Us</x-menu-item>
            </ul>
        </nav>

        <div class="relative items-center hidden md:flex md:-ml-12">
            <a id="mainSiteLogo" href="{{ url('/') }}"
                class="-mt-6 pb-12 transition-transform duration-300 origin-top-left sscale-125">
                <span class="inline-block translate-y-12">
                    @include('common.logo')
                </span>
            </a>
        </div>

        <ul class="hidden md:flex items-center gap-5">
            <x-menu-item url="{{ url('#') }}">About Us</x-menu-item>

            <div class="relative">
                <a href="#" class="btn btn-sm">
                    <span class="capitalize my-1 mx-2">
                        Start thriving
                    </span>
                </a>

                <small class="block absolute inset-x-0 text-xs -bottom-5 mb-px left-0 opacity-50 text-center">
                    connect with us now
                    {{-- call: +255 746 750 750 --}}
                </small>
            </div>

            {{-- <a href="#" class="btn text-sm font-bold py-2 px-4">
                Get a quote
            </a> --}}
        </ul>
    </div>
</section>



<script>
    const mainNavigationBar = document.querySelector("#mainNavigationMenu");
    const mainSiteLogoImage = document.querySelector("#mainSiteLogo");

    function toggleMenu() {
        mainNavigationBar.classList.toggle('open');
        document.body.classList.toggle('overflow-hidden');
    }

    const mainNavigationBarObserver = new IntersectionObserver(
        ([e]) => {
            const stuck = e.intersectionRatio < 1;
            ["md:shadow-sm", "md:border-b", "md:bg-white", "text-black"].map(c => mainNavigationBar.classList
                .toggle(c, stuck));
            [
                "md:bg-transparent", "lg:text-white"
            ].map(c => mainNavigationBar.classList.toggle(c, !stuck))
        }, {
            threshold: [1]
        }
    );

    if (window.innerWidth > 900) {
        mainNavigationBarObserver.observe(mainNavigationBar);
    }
</script>
