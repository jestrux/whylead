<style>
    #readingModeToggle {
        /* background: #f8f8f8; */
        /* color: #ccc; */
        height: 36px;
        width: 36px;
        /* padding: 1px; */
        overflow: visible;
        position: relative;
    }

    #readingModeToggle::before {
        content: '';
        position: absolute;
        inset: 0;
        background-color: currentColor;
        border: 2px solid currentColor;
        opacity: 0.1;
        border-radius: 50%;
    }

    #readingModeToggle #thumb {
        width: 100%;
        height: 100%;
        scale: 0.8;
        transition: all 0.35s ease-out;
    }

    body:not(.dark) #readingModeToggle #thumb svg.for-dark,
    body.dark #readingModeToggle #thumb svg.for-light {
        display: none;
    }

    body.dark #readingModeToggle {
        background: #1a2c43;
        justify-content: flex-end;
        color: #99a6b5;
    }

    body.dark #readingModeToggle #thumb {
        /* background: #ffffff;
        border-color: #ffffff;
        transform: rotate(360deg); */

        background: #ffffff;
        border-color: #ffffff;
        rotate: 360deg;
        scale: 1;
        /* rotate: (360deg); */
        /* border: 1px solid currentColor; */
        /* border: 1px solid currentColor; */
        /* box-shadow: 1px 1px 4px rgba(0, 0, 0, 0.15); */
    }


    @media (min-width: 641px) {

        body.dark #readingModeToggle #thumb svg.dark,
        body.dark #readingModeToggle #thumb svg.light,
        body.dark #readingModeToggle #thumb svg.system {
            stroke: #010e1c;
        }

        body.dark #readingModeToggle #thumb svg.dark,
        body.dark #readingModeToggle #thumb svg.light {
            fill: #010e1c;
        }
    }

    @media (max-width: 640px) {
        #readingModeToggle {
            background: transparent;
            width: 48px;
            height: 22px;
            padding: 0;
        }

        body.dark #readingModeToggle {
            background: #195799;
            color: #1059a7;
            border-color: #81a2c6;
        }

        #readingModeToggle #thumb {
            width: 28px;
            height: 28px;
        }

        body.dark #readingModeToggle #thumb {
            background: #010e1c;
            border-color: #010e1c;
        }
    }
</style>

<button id="readingModeToggle" class="rounded-full overflow-hidden relative flex items-center focus:outline-none"
    onclick="toggleReadingMode()">
    <span id="thumb" class="flex items-center justify-center rounded-full">
        <svg class="for-light sblock smd:hidden" width="18" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <circle cx="12" cy="12" r="5"></circle>
            <line x1="12" y1="1" x2="12" y2="3"></line>
            <line x1="12" y1="21" x2="12" y2="23"></line>
            <line x1="4.22" y1="4.22" x2="5.64" y2="5.64"></line>
            <line x1="18.36" y1="18.36" x2="19.78" y2="19.78"></line>
            <line x1="1" y1="12" x2="3" y2="12"></line>
            <line x1="21" y1="12" x2="23" y2="12"></line>
            <line x1="4.22" y1="19.78" x2="5.64" y2="18.36"></line>
            <line x1="18.36" y1="5.64" x2="19.78" y2="4.22"></line>
        </svg>

        <svg class="for-dark sblock smd:hidden " width="14" viewBox="0 0 24 24" fill="currentColor"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>

        {{-- <svg class="for-system sblock smd:hidden" width="14" viewBox="0 0 24 24" fill="currentColor">
            <path d="M10.5 18a.75.75 0 0 0 0 1.5h3a.75.75 0 0 0 0-1.5h-3Z" />
            <path fill-rule="evenodd"
                d="M7.125 1.5A3.375 3.375 0 0 0 3.75 4.875v14.25A3.375 3.375 0 0 0 7.125 22.5h9.75a3.375 3.375 0 0 0 3.375-3.375V4.875A3.375 3.375 0 0 0 16.875 1.5h-9.75ZM6 4.875c0-.621.504-1.125 1.125-1.125h9.75c.621 0 1.125.504 1.125 1.125v14.25c0 .621-.504 1.125-1.125 1.125h-9.75A1.125 1.125 0 0 1 6 19.125V4.875Z"
                clip-rule="evenodd" />
        </svg> --}}
    </span>
</button>

<script>
    function systemTheme() {
        return window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches;
    }

    function setDarkMode(value, auto) {
        document.body.classList.toggle("dark", value == null ? systemTheme() : value);
        if (value == null) {
            window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
                setDarkMode(event.matches, true);
            });
        }

        if (!auto) {
            if (value == null)
                window.localStorage.removeItem('in-dark-mode');
            else
                window.localStorage.setItem('in-dark-mode', value);
        }
    }

    if (window.localStorage.getItem('in-dark-mode') == null)
        setDarkMode(null, true);
    else
        setDarkMode(window.localStorage.getItem('in-dark-mode') != 'false');

    function toggleReadingMode() {
        const newValue = !document.body.classList.contains("dark");
        setDarkMode(newValue == systemTheme() ? null : newValue);
    }
</script>
