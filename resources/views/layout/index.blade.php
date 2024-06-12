<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @php
        $defaultTitle = 'WhyLead Consultancy';
        $defaultDescription = 'Developing Thriving Leaders, Teams And Organizations';
        $defaultImage = asset('img/og-image.jpg');
    @endphp

    <meta name="title" content="@yield('title', $defaultTitle)" />
    <meta name="description" content="@yield('description', $defaultDescription)" />

    <meta property="og:title" content="@yield('title', $defaultTitle)" />
    <meta property="og:description" content="@yield('description', $defaultDescription)" />
    <meta property="og:url" content="https://whyleadothers.com/" />
    <meta property="og:type" content="website" />
    <meta property="og:image" content="@yield('image', $defaultImage)" />

    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:title" content="@yield('title', $defaultTitle)" />
    <meta name="twitter:description" content="@yield('description', $defaultDescription)" />
    <meta name="twitter:site" content="@whyleadothers" />
    <meta name="twitter:image" content="@yield('image', $defaultImage)" />

    @yield('meta')

    <title>@yield('title', $defaultTitle)</title>
    <link href="{{ asset('icon.png') }}" rel="shortcut icon" type="image/png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')

    {{-- <script src="https://cdn.tailwindcss.com"></script> --}}

    <style>
        body.page-loading {
            overflow: hidden;
        }

        body:not(.page-loading) #siteLoader,
        body:not(.page-loading) #siteLoader circle {
            opacity: 0;
            transition: all 0.35s ease-out;
        }

        body:not(.page-loading) #siteLoader {
            /* transform: scale(1.5); */
            opacity: 0;
            pointer-events: none;
            transition: all 0.35s ease-out 0.15s;
        }

        body:not(.page-loading) #siteLoader * {
            opacity: 0;
            /* transform: scale(0.9); */
            transition: all 0.35s ease-out;
        }
    </style>

    <style type="text/tailwindcss">
        [x-cloak] {
            display: none !important;
        }

        :root {
            --accent-color: 25 18 75;
            --stroke-color: 226 232 240;
            --border-color: #e2e8f0;
            --canvas-color: 255 255 255;
            --card-color: 255 255 255;
            --content-color: 0 0 0;
        }

        body.dark {
            --accent-color: 36 27 99;
            --stroke-color: 53 53 53;
            --border-color: rgba(255, 255, 255, 0.16);
            --canvas-color: 24 24 24;
            --card-color: 37 37 37;
            --content-color: 255 255 255;
        }

        body.dark input[type="date"] {
            color-scheme: dark;
        }

        @layer components {
            :root {
                --primary-color: #f26b21;
            }

            .btn {
                @apply transition-all duration-150 inline-flex uppercase tracking-wide text-white items-center justify-center border bg-[#F16B21] hover:bg-[#d55612] border-[#F16B21];
            }

            .btn:not(.btn-sm):not(.btn-xs) {
                @apply font-semibold gap-1 text-sm/none px-4 py-3.5 rounded-md;
            }

            .btn-sm {
                @apply font-semibold gap-1 text-sm/none px-3 py-2.5 rounded-md;
            }

            .btn-xs {
                @apply gap-1 font-semibold text-sm/none px-2 py-1.5 rounded-md;
            }

            .btn.btn-outline {
                @apply text-current border-current bg-transparent hover:opacity-60;
            }

            strong {
                color: rgb(var(--primary-color) / 0.01);
                @apply font-semibold;
            }

            body {
                overflow-x: hidden;
            }

            .outline-text {
                /* -webkit-text-fill-color: rgb(var(--content-color) / 0.01); */
                /* -webkit-text-stroke: 0.7px rgb(var(--content-color) / 0.7); */
                font-weight: 300;
                opacity: 0.7;
            }

            .text-white .outline-text {
                --content-color: 255 255 255;
            }
        }

        * {
            /* font-family: "Montserrat", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
            font-family: "Gotham", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        h1,
        h2,
        h3,
        h4,
        h5 {
            font-family: "Gotham", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
        }

        body {
            /* font-family: "Montserrat", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif; */
            font-family: "Gotham", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            font-weight: 500;
        }

        img {
            object-fit: cover;
        }

        .h-screen {
            height: 100vh;
            height: 100dvh;
        }

        @media (min-width: 1024px) {
            .lg\:text-4xl {
                /* font-size: 2.25rem; */
                /* line-height: 5rem !; */
                line-height: 1.2 !important;
            }
        }
    </style>

    <script>
        function loader() {
            var current = 0;
            var target = 1;
            var interval = 100;
            var step = 0.01;
            var rafReference;
            var progress = 100;
            var circles = Array.from(document.querySelectorAll("#siteLoader circle"));

            const updateLoader = () => {
                progress = 100 - Math.min(100, Math.floor(100 * current));
                circles.forEach(circle =>
                    circle.setAttribute("stroke-dashoffset", progress));
            }

            const handle = () => {
                if (current < target) {
                    current += step;
                    updateLoader();

                    setTimeout(() => rafReference = requestAnimationFrame(handle), 80);
                } else {
                    cancelAnimationFrame(handle);
                    current = target;
                    updateLoader();
                    document.body.classList.remove("page-loading");
                }
            };

            requestAnimationFrame(handle);
        }

        window.addEventListener("DOMContentLoaded", function() {
            if (window.pageLoaded) return;

            document.body.classList.add("page-loading");
            loader();
        })

        window.addEventListener("load", function() {
            window.pageLoaded = true;
            document.body.classList.remove("page-loading");
        })
    </script>
</head>

<body class="bg-canvas text-content page-loading">
    @include('layout.nav')

    <main>
        @yield('content')
        <div id="siteLoader"
            style="display: flex; align-items:center; justify-content: center; position: fixed; inset: 0px; z-index: 999; background: rgb(var(--canvas-color));">

            <div style="position: relative;">
                <svg style="width: 180px;transform: rotate(-90deg)" viewBox="0 0 120 120" stroke-width="6">
                    <defs>
                        <linearGradient id="progressGradient" x1="100%" y1="100%" x2="50%"
                            y2="0%">
                            <stop offset="0%" style="stop-color: #F26B21; stop-opacity: 1"></stop>
                            <stop offset="100%" style="stop-color: #19124B; stop-opacity: 1"></stop>
                        </linearGradient>

                        <pattern id="myPattern1" viewBox="0 0 33.554 32.053" width="12%" height="12%">
                            <path fill="rgba(255, 255, 255, 0.2)"
                                d="M 26.5547 0.00391 C 24.7619 -0.0498739 23.0305 0.659684 21.791 1.95614 C 20.5515 3.25259 19.9204 5.01414 20.0547 6.80273 C 20.1547 10.4027 22.0531 13.0024 24.9531 14.9023 C 26.7531 16.1023 28.1535 16.0035 29.8535 14.6035 C 32.1052 12.8362 33.4601 10.1636 33.5547 7.30273 C 33.5547 2.80274 30.6547 0.00391 26.5547 0.00391 Z M 6.35352 0.90234 C 4.44899 0.835557 2.62148 1.65718 1.40736 3.12605 C 0.193246 4.59493 -0.269738 6.54442 0.1543 8.40234 C 0.711812 11.1705 2.42046 13.5708 4.85352 15.0039 C 5.37355 15.4062 5.99906 15.6491 6.6543 15.7031 C 7.02312 15.7696 7.40305 15.7352 7.75391 15.6035 C 8.34533 15.4212 8.89079 15.1141 9.35352 14.7031 C 11.1915 13.1515 12.4005 10.9828 12.7539 8.60352 C 13.1588 6.6938 12.667 4.70382 11.4193 3.20247 C 10.1715 1.70112 8.30508 0.853657 6.35352 0.90234 Z M 16.6191 13.5859 C 16.4655 13.5881 16.3106 13.5941 16.1543 13.6035 C 13.9658 13.6967 11.9228 14.7256 10.545 16.4285 C 9.16722 18.1314 8.58743 20.3442 8.95312 22.5039 C 9.55312 26.8039 12.0543 29.6035 15.6543 31.6035 C 17.0508 32.3521 18.7657 32.1526 19.9531 31.1035 C 22.771 28.9755 24.5234 25.7267 24.7539 22.2031 C 24.8508 16.875 21.3818 13.5178 16.6191 13.5859 Z">
                            </path>
                        </pattern>
                    </defs>

                    <circle cx="60" cy="60" r="54" fill="none" stroke="currentColor"
                        stroke-opacity="0.06"></circle>

                    <circle cx="60" cy="60" r="54" fill="none" stroke="url(#progressGradient)"
                        stroke-linecap="round" stroke-linejoin="round" pathLength="100" stroke-dasharray="100"
                        stroke-dashoffset="100"></circle>

                    <circle cx="60" cy="60" r="54" fill="none" stroke="url(#myPattern1)"
                        stroke-linecap="round" stroke-linejoin="round" pathLength="100" stroke-dasharray="100"
                        stroke-dashoffset="100"></circle>
                </svg>

                <div
                    style="position: absolute; inset: 0px; bottom: -6px; display: flex; align-items: center; justify-content: center; font-size: 2.25rem; line-height: 2.5rem; font-weight: 600;">
                    @include('common.logo', ['height' => 50])
                </div>
            </div>
        </div>
    </main>

    @include('layout.footer')

    <!-- Page scripts -->
    @yield('scripts')

    <script>
        @unless (isset($isPopupPage))
            localStorage.initialPopupShown = true;
        @endunless
    </script>

    <script src="https://cdn.tailwindcss.com"></script>

    <script>
        window.tailwind.config = {
            darkMode: 'selector',
            theme: {
                extend: {
                    colors: {
                        primary: "#F26B21",
                        "primary-light": "#f4fff3",
                        "primary-dark": "#d55612",
                        accent: "rgb(var(--accent-color) / <alpha-value>)",
                        canvas: "rgb(var(--canvas-color) / <alpha-value>)",
                        card: "rgb(var(--card-color) / <alpha-value>)",
                        content: "rgb(var(--content-color) / <alpha-value>)",
                        stroke: "rgb(var(--content-color) / 0.15)",
                    },
                },
            },
        };
    </script>
</body>

</html>
