<footer class="border-t border-stroke">
    <div class="">
        <div
            class="mx-auto max-w-7xl px-4 md:px-8 flex flex-col items-start justify-between gap-y-12 lg:flex-row lg:items-center py-4 lg:py-8">
            <div>
                <div class="flex items-center">
                    <a href="{{ url('/') }}">
                        @include('common.logo', ['fill' => '#fff'])
                    </a>

                    <div class="ml-4">
                        {{-- <p class="text-base font-semibold">Pocket</p>
                        <p class="mt-1 text-sm">Invest at the perfect time.</p> --}}
                    </div>
                </div>
                <nav class="mt-11 flex gap-8">
                    <a class="hidden lg:block relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm opacity-70 hover:opacity-100 transition-opacity delay-150 hover:delay-0"
                        href="{{ url('/thrive-in-the-middle') }}"><span class="relative z-10">Thrive in the Middle</span>
                    </a>
                    <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm opacity-70 hover:opacity-100 transition-opacity delay-150 hover:delay-0"
                        href="{{ url('/about') }}"><span class="relative z-10">
                            About Us</span>
                    </a>
                    <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm opacity-70 hover:opacity-100 transition-opacity delay-150 hover:delay-0"
                        href="{{ url('/consultancy') }}"><span class="relative z-10">
                            Consultancy</span>
                    </a>
                    {{-- <a class="relative -mx-3 -my-2 rounded-lg px-3 py-2 text-sm opacity-70 hover:opacity-100 transition-opacity delay-150 hover:delay-0"
                        href="/#"><span class="relative z-10">FAQs</span>
                    </a> --}}
                </nav>
            </div>

            @pierdata(["model" => "Podcast", "first" => true])
            @php
                $episode = $data;
            @endphp

            <a href="{{ url('/podcast/' . $episode->slug) }}"
                class="group relative -mx-4 flex items-center self-stretch p-4 transition-colors bg-content/5 hover:bg-content/10 text-content sm:self-auto sm:rounded-2xl lg:mx-0 lg:self-auto">
                <div class="relative flex size-28 flex-none items-center justify-center">
                    <img class="absolute inset-0 size-full object-cover rounded-lg" src="{{ $episode->image }}"
                        alt="{{ $episode->title }} poster" />
                </div>
                <div class="ml-3 lg:w-64">
                    <p class="text-base font-semibold inline-flex items-center gap-1">
                        <span class="absolute inset-0 sm:rounded-2xl"></span>
                        Our latest podcast episode
                    </p>

                    <div class="mt-1 text-sm/relaxed opacity-70 group-hover:opacity-80 line-clamp-3">
                        00{{ $episode->number }} -
                        {{ $episode->title }} ft Paul {{ $episode->featuring }}
                    </div>

                    {{-- <object class="w-full">
                        <div class="mt-1 flex items-center gap-4">
                            <a href="{{ $episode->link }}" target="_blank" aria-label="Play episode 5: Bill Lumbergh"
                                class="flex items-center gap-x-3 text-sm font-bold leading-6 text-primary hover:opacity-90 active:opacity-80">
                                <svg aria-hidden="true" viewBox="0 0 10 10" class="h-2.5 w-2.5 fill-current">
                                    <path
                                        d="M8.25 4.567a.5.5 0 0 1 0 .866l-7.5 4.33A.5.5 0 0 1 0 9.33V.67A.5.5 0 0 1 .75.237l7.5 4.33Z" />
                                </svg>
                                <span aria-hidden="true">Listen</span>
                            </a>
                            <span aria-hidden="true" class="text-sm font-bold text-slate-400">/</span>
                            <a class="flex items-center text-sm font-bold leading-6 text-[#5C4EB8] dark:text-content/60 hover:opacity-80 active:opacity-90"
                                aria-label="Show notes for episode 5: Bill Lumbergh" href="/5">
                                Share
                            </a>
                        </div>
                    </object> --}}
                </div>
            </a>
            @endpierdata()
        </div>
        {{-- <div
            class="flex flex-col items-center border-t border-gray-200 pb-12 pt-8 md:flex-row-reverse md:justify-between md:pt-6">
            <form class="flex w-full justify-center md:w-auto">
                <div class="w-60 min-w-0 shrink"><input id=":S4:" type="email" aria-label="Email address"
                        placeholder="Email address" autocomplete="email" required=""
                        class="block w-full appearance-none rounded-lg border border-gray-200 bg-white py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] text-gray-900 placeholder:text-gray-400 focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm">
                </div><button
                    class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors relative overflow-hidden bg-primary text-white before:absolute before:inset-0 active:before:bg-transparent hover:before:bg-white/10 active:bg-cyan-600 active:text-white/80 before:transition-colors ml-4 flex-none"
                    type="submit" color="cyan" variant="solid"><span class="hidden lg:inline">Join our
                        newsletter</span><span class="lg:hidden">Join newsletter</span></button>
            </form>
            <p class="mt-6 text-sm text-gray-500 md:mt-0">© Copyright <!-- -->2024<!-- -->. All rights reserved.</p>
        </div> --}}
        <div
            class="mx-auto max-w-7xl px-4 md:px-8 flex flex-col items-center border-t border-black/10 py-10 sm:flex-row-reverse sm:justify-between">
            <form x-data="{
                saving: false,
                showMessage: false,
                async submit(e) {
                    var form = e.target;
                    this.saving = true;
                    var res = await fetch(
                        '{{ url('/subscribe') }}', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'Authorization': 'Bearer {{ env('HUBSPOT_APP_TOKEN') }}',
                            },
                            body: JSON.stringify({
                                '_token': '{{ csrf_token() }}',
                                'email': form.email.value
                            }),
                        });

                    this.saving = false;
                    form.reset();
                    console.log('Subscription: ', res);

                    this.showMessage = true;

                    setTimeout(() => {
                        this.showMessage = false;
                    }, 2000)
                }
            }" x-on:submit.prevent="submit($event)"
                class="flex w-full justify-center md:w-auto relative">
                <div x-cloak x-show="showMessage" x-transition class="absolute left-0 -top-6 text-sm text-primary">
                    Successfully subscribed
                </div>

                <div class="w-60 min-w-0 shrink">
                    <input name="email" type="email" aria-label="Email address" placeholder="Email address"
                        autocomplete="email" required
                        class="block py-[calc(theme(spacing.2)-1px)] px-[calc(theme(spacing.3)-1px)] w-full appearance-none rounded-lg border border-stroke bg-card text-gray-900 placeholder:opacity-50 focus:border-cyan-500 focus:outline-none focus:ring-cyan-500 sm:text-sm" />
                </div>
                <button
                    class="inline-flex justify-center rounded-lg py-2 px-3 text-sm font-semibold outline-2 outline-offset-2 transition-colors relative overflow-hidden bg-primary text-white before:absolute before:inset-0 active:before:bg-transparent hover:before:bg-white/10 active:bg-primary active:text-white/80 before:transition-colors ml-2 flex-none"
                    x-bind:class="saving && 'opacity-30 pointer-events-none'" type="submit">
                    <span class="hidden lg:inline">Join our
                        newsletter
                    </span>
                    <span class="lg:hidden">Join newsletter</span>
                </button>
            </form>

            <div class="flex gap-x-6 mt-6 sm:mt-0">
                {{-- <a class="group" href="https://www.linkedin.com/company/whyleadconsultancy" target="_blank">
                    <svg class="w-4" fill="currentColor" role="img" viewBox="0 0 24 24">
                        <path
                            d="M9.101 23.691v-7.98H6.627v-3.667h2.474v-1.58c0-4.085 1.848-5.978 5.858-5.978.401 0 .955.042 1.468.103a8.68 8.68 0 0 1 1.141.195v3.325a8.623 8.623 0 0 0-.653-.036 26.805 26.805 0 0 0-.733-.009c-.707 0-1.259.096-1.675.309a1.686 1.686 0 0 0-.679.622c-.258.42-.374.995-.374 1.752v1.297h3.919l-.386 2.103-.287 1.564h-3.246v8.245C19.396 23.238 24 18.179 24 12.044c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.628 3.874 10.35 9.101 11.647Z" />
                    </svg>
                </a> --}}
                <a class="group"
                    href="https://www.google.com/search?sca_esv=1f1d6c955383dad7&sca_upv=1&rlz=1CDGOYI_enTZ849TZ849&hl=en-GB&q=WhyLead%20Consultancy&ludocid=18404384182725025592&ibp=gwp%3B0%2C7&lsig=AB86z5WH4vgtH1Qq8AyuX04-pf1T&kgs=558f135cdfa72fd2&shndl=-1&source=sh%2Fx%2Floc%2Fact%2Fm4%2F3"
                    target="_blank">
                    <svg class="w-4" fill="currentColor" role="img" viewBox="0 0 24 24">
                        <title>Google</title>
                        <path
                            d="M12.48 10.92v3.28h7.84c-.24 1.84-.853 3.187-1.787 4.133-1.147 1.147-2.933 2.4-6.053 2.4-4.827 0-8.6-3.893-8.6-8.72s3.773-8.72 8.6-8.72c2.6 0 4.507 1.027 5.907 2.347l2.307-2.307C18.747 1.44 16.133 0 12.48 0 5.867 0 .307 5.387.307 12s5.56 12 12.173 12c3.573 0 6.267-1.173 8.373-3.36 2.16-2.16 2.84-5.213 2.84-7.667 0-.76-.053-1.467-.173-2.053H12.48z" />
                    </svg>
                </a>

                <a class="group" href="https://www.instagram.com/whyleadothers" target="_blank">
                    <svg class="w-4" fill="currentColor" role="img" viewBox="0 0 24 24">
                        <title>Instagram</title>
                        <path
                            d="M7.0301.084c-1.2768.0602-2.1487.264-2.911.5634-.7888.3075-1.4575.72-2.1228 1.3877-.6652.6677-1.075 1.3368-1.3802 2.127-.2954.7638-.4956 1.6365-.552 2.914-.0564 1.2775-.0689 1.6882-.0626 4.947.0062 3.2586.0206 3.6671.0825 4.9473.061 1.2765.264 2.1482.5635 2.9107.308.7889.72 1.4573 1.388 2.1228.6679.6655 1.3365 1.0743 2.1285 1.38.7632.295 1.6361.4961 2.9134.552 1.2773.056 1.6884.069 4.9462.0627 3.2578-.0062 3.668-.0207 4.9478-.0814 1.28-.0607 2.147-.2652 2.9098-.5633.7889-.3086 1.4578-.72 2.1228-1.3881.665-.6682 1.0745-1.3378 1.3795-2.1284.2957-.7632.4966-1.636.552-2.9124.056-1.2809.0692-1.6898.063-4.948-.0063-3.2583-.021-3.6668-.0817-4.9465-.0607-1.2797-.264-2.1487-.5633-2.9117-.3084-.7889-.72-1.4568-1.3876-2.1228C21.2982 1.33 20.628.9208 19.8378.6165 19.074.321 18.2017.1197 16.9244.0645 15.6471.0093 15.236-.005 11.977.0014 8.718.0076 8.31.0215 7.0301.0839m.1402 21.6932c-1.17-.0509-1.8053-.2453-2.2287-.408-.5606-.216-.96-.4771-1.3819-.895-.422-.4178-.6811-.8186-.9-1.378-.1644-.4234-.3624-1.058-.4171-2.228-.0595-1.2645-.072-1.6442-.079-4.848-.007-3.2037.0053-3.583.0607-4.848.05-1.169.2456-1.805.408-2.2282.216-.5613.4762-.96.895-1.3816.4188-.4217.8184-.6814 1.3783-.9003.423-.1651 1.0575-.3614 2.227-.4171 1.2655-.06 1.6447-.072 4.848-.079 3.2033-.007 3.5835.005 4.8495.0608 1.169.0508 1.8053.2445 2.228.408.5608.216.96.4754 1.3816.895.4217.4194.6816.8176.9005 1.3787.1653.4217.3617 1.056.4169 2.2263.0602 1.2655.0739 1.645.0796 4.848.0058 3.203-.0055 3.5834-.061 4.848-.051 1.17-.245 1.8055-.408 2.2294-.216.5604-.4763.96-.8954 1.3814-.419.4215-.8181.6811-1.3783.9-.4224.1649-1.0577.3617-2.2262.4174-1.2656.0595-1.6448.072-4.8493.079-3.2045.007-3.5825-.006-4.848-.0608M16.953 5.5864A1.44 1.44 0 1 0 18.39 4.144a1.44 1.44 0 0 0-1.437 1.4424M5.8385 12.012c.0067 3.4032 2.7706 6.1557 6.173 6.1493 3.4026-.0065 6.157-2.7701 6.1506-6.1733-.0065-3.4032-2.771-6.1565-6.174-6.1498-3.403.0067-6.156 2.771-6.1496 6.1738M8 12.0077a4 4 0 1 1 4.008 3.9921A3.9996 3.9996 0 0 1 8 12.0077" />
                    </svg>
                </a>

                <a class="group" href="https://twitter.com/whyleadothers" target="_blank">
                    <svg class="w-4" fill="currentColor" viewBox="0 0 24 24">
                        <path
                            d="M13.3174 10.7749L19.1457 4H17.7646L12.7039 9.88256L8.66193 4H4L10.1122 12.8955L4 20H5.38119L10.7254 13.7878L14.994 20H19.656L13.3171 10.7749H13.3174ZM11.4257 12.9738L10.8064 12.0881L5.87886 5.03974H8.00029L11.9769 10.728L12.5962 11.6137L17.7652 19.0075H15.6438L11.4257 12.9742V12.9738Z" />
                    </svg>
                </a>

                <a class="group" href="https://www.linkedin.com/company/whyleadconsultancy" target="_blank">
                    <svg class="w-4" fill="currentColor" role="img" viewBox="0 0 24 24">
                        <path
                            d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                    </svg>
                </a>
            </div>

            <p class="mt-6 text-sm opacity-70 sm:mt-0">Copyright © <!-- -->2024<!-- --> WhyLead. All rights
                reserved.
            </p>
        </div>
    </div>
</footer>
