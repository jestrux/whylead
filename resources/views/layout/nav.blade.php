<style>
    @media only screen and (max-width: 767px) {
        #mainNavigationMenu,
        #mainNavigationMenuItems {
            background: rgb(var(--canvas-color));
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
    class="sticky -top-px inset-x-0 z-50 lg:transition-colors duration-300 border-stroke md:bg-card text-content">
    <div class="relative flex items-center justify-between p-3 md:hidden">
        <a href="{{ url('/') }}" class="ml-1 -mb-5">
            @include('common.logo', ['fill' => '#fff'])
        </a>

        <div id="mobileNavButtons" class="flex items-center gap-3.5">
            <div class="opacity-70">
                <a href="{{ url('/contacts') }}" class="btn btn-sm font-bold btn-outline px-0 border-none">
                    <span class="capitalize">
                        Start thriving
                    </span>
                </a>
            </div>

            @if (!isset($isThriveFormPage))
                <x-reading-mode-toggle />
            @endif

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
        class="max-w-7xl mx-auto fixed inset-0 flex flex-col px-8 py-8 md:flex-row items-centers md:justify-between md:relative md:bg-transparent md:py-0">
        <nav role="off-canvas" class="w-full flex items-center justify-center mt-12 md:w-auto md:mt-0">
            <ul class="w-full relative z-50 md:flex flex-col justify-center items-center h-full md:flex-row md:gap-x-8">
                {{-- <x-menu-item exact url="/">Home</x-menu-item> --}}
                <x-menu-item url="{{ url('/consultancy') }}">Consultancy</x-menu-item>
                <x-menu-item url="{{ url('/podcast') }}">Podcast</x-menu-item>

                <x-menu-item class="md:hidden" url="{{ url('/training') }}">Training</x-menu-item>
                <x-menu-item class="md:hidden" url="{{ url('/thrive-in-the-middle') }}">Thrive in the Middle</x-menu-item>
                <x-menu-item class="md:hidden" url="{{ url('/about') }}">About Us</x-menu-item>

                <x-menu-item class="md:hidden" url="{{ url('/contacts') }}">Contact Us</x-menu-item>
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

        <ul class="hidden md:flex items-center gap-5 pb-2">
            <x-menu-item url="{{ url('/training') }}">Training</x-menu-item>

            <div class="relative">
                <a href="{{ url('/contacts') }}" class="btn btn-xs">
                    <span class="capitalize my-1 mx-2">
                        Start thriving
                    </span>
                </a>

                <small
                    class="block absolute inset-x-0 text-[11px] font-semibold -bottom-5 mb-1 left-0 opacity-50 text-center">
                    Click to Contact Us
                </small>
            </div>

            @if (!isset($isThriveFormPage))
                <x-reading-mode-toggle />
            @endif
        </ul>
    </div>
</section>

<script>
    const mainNavigationBar = document.querySelector("#mainNavigationMenu");
    const mainSiteLogoImage = document.querySelector("#mainSiteLogo");

    @isset($isHomePage)
        const collapsedClasses = ["md:bg-transparent", "md:text-white"];
        const raisedClasses = ["md:shadow-sm", "md:border-b", "md:bg-card", "text-content"];
    @else
        const collapsedClasses = [];
        const raisedClasses = ["md:shadow-sm", "md:border-b", "md:bg-card", "text-content"];
    @endisset


    function toggleMenu() {
        mainNavigationBar.classList.toggle('open');
        document.body.classList.toggle('overflow-hidden');
    }

    const mainNavigationBarObserver = new IntersectionObserver(
        ([e]) => {
            const stuck = e.intersectionRatio < 1;
            raisedClasses.map(c => mainNavigationBar.classList
                .toggle(c, stuck));
            collapsedClasses.map(c => mainNavigationBar.classList.toggle(c, !stuck))
        }, {
            threshold: [1]
        }
    );

    if (window.innerWidth > 900) {
        mainNavigationBarObserver.observe(mainNavigationBar);
    }
</script>
