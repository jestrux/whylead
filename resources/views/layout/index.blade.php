<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="title" content="@yield('title')" />
    <meta name="description" content="@yield('description')" />

    <title>@yield('title')</title>
    <link href="{{ asset('img/icon.png') }}" rel="shortcut icon" type="image/png" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet" />

    @vite('resources/css/app.css')

    @if (env('APP_ENV') == 'local')
        <script src="https://cdn.tailwindcss.com"></script>

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

            @media (prefers-color-scheme: dark) {
                :root {
                    --accent-color: 36 27 99;
                    --stroke-color: 53 53 53;
                    --border-color: rgba(255, 255, 255, 0.16);
                    --canvas-color: 24 24 24;
                    --card-color: 37 37 37;
                    --content-color: 255 255 255;
                }

                input[type="date"] {
                    color-scheme: dark;
                }
            }

            @layer components {
                :root {
                    --primary-color: #f26b21;
                }

                .btn {
                    @apply transition-all duration-150 inline-flex uppercase tracking-wide text-white items-center justify-center border bg-primary hover:bg-primary-dark border-primary;
                }

                .btn:not(.btn-sm):not(.btn-xs) {
                    @apply font-bold gap-2 text-base/none px-5 py-4 rounded-lg;
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
                    @apply text-primary font-semibold;
                }

                body {
                    overflow-x: hidden;
                }

                .outline-text {
                    -webkit-text-fill-color: rgb(var(--content-color) / 0.01);
                    -webkit-text-stroke: 0.7px rgb(var(--content-color) / 1);
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
        </style>

        <script>
            window.tailwind.config = {
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
    @endif
</head>

<body class="bg-canvas text-content">
    @include('layout.nav')

    @yield('content')

    @include('layout.footer')

    @yield('scripts')
</body>

</html>
