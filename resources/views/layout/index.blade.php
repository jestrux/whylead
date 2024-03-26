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

            @layer components {
                :root {
                    --primary-color: #f26b21;
                }

                .btn {
                    @apply transition-all duration-150 inline-flex uppercase tracking-wide text-white items-center justify-center border bg-primary hover:bg-primary-dark border-primary;
                }

                .btn:not(.btn-sm) {
                    @apply font-bold gap-2 text-base/none px-5 py-4 rounded-lg;
                }

                .btn-sm {
                    @apply font-semibold gap-1 text-sm/none px-3 py-2.5 rounded-md;
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
                    -webkit-text-fill-color: transparent;
                    -webkit-text-stroke: 2px currentColor;
                }
            }

            * {
                /* font-family: "Figtree", sans-serif; */
                font-family: "Montserrat", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
            }

            body {
                font-family: "Montserrat", -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
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
                            accent: "#19124B",
                            "primary-dark": "#d55612",
                            "canvas": "#FFFFFF",
                            "content": "#000000",
                        },
                    },
                },
            };
        </script>
    @endif
</head>

<body>
    @include('layout.nav')

    @yield('content')

    @include('layout.footer')

    @yield('scripts')
</body>

</html>
