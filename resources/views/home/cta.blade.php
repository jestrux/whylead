<section class="md:mb-8 lg:mb-12">
    <div
        class="md:rounded-3xl bg-content/5 max-w-3xl mx-auto px-6 py-12 lg:py-12 lg:px-16 flex flex-col gap-6 justify-center items-center text-center">
        <div class="flex-1 flex flex-col items-center">
            <h2 class="text-2xl md:text-3xl font-bold uppercase tracking-wide">
                <span class="outline-text">Ready to </span>
                Build
                <span class="outline-text">a </span>
                <span class="hidden md:inline"><br /></span>
                Thriving <span class="outline-texts">Organization?</span>
            </h2>

            <p class="mt-3 text-base/relaxed opacity-70 max-w-2xl mx-auto">
                Contact us and we'll help you articulate your needs and design your path to
                thriving leaders, teams, and organization.
            </p>
        </div>

        <div class="mb-4 w-full flex flex-col md:flex-row items-center justify-center gap-3">
            <a href="{{ url('/contacts' . (isset($interest) ? "?interest=$interest" : '')) }}" class="btn">
                <span class="mx-5">
                    Get in touch
                </span>
            </a>
        </div>
    </div>
</section>
