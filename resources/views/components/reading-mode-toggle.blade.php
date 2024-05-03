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

    body:not(.dark) #readingModeToggle #thumb svg:last-child,
    body.dark #readingModeToggle #thumb svg:first-child {
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
        body.dark #readingModeToggle #thumb svg {
            fill: #010e1c;
            stroke: #010e1c;
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
        <svg classs="block md:hidden" width="18" viewBox="0 0 24 24" fill="currentColor" stroke="currentColor" stroke-width="2"
            stroke-linecap="round" stroke-linejoin="round">
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
        <svg classs="block md:hidden " width="14" viewBox="0 0 24 24" fill="yellow" stroke="yellow"
            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="M21 12.79A9 9 0 1 1 11.21 3 7 7 0 0 0 21 12.79z"></path>
        </svg>
    </span>
</button>

<script>
    if (window.localStorage.getItem('dark-mode') == null) {
        if (window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches) {
            document.body.classList.add("dark");
        }
    } else if (window.localStorage.getItem('dark-mode'))
        document.body.classList.add("dark");

    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', event => {
        if (window.localStorage.getItem('dark-mode') == null)
            document.body.classList.toggle("dark", event.matches);
    });

    function toggleReadingMode() {
        let readingMode = window.localStorage.getItem('dark-mode');
        const newValue = readingMode && readingMode != null ? null : true;

        if (!newValue) {
            window.localStorage.removeItem('dark-mode');
            document.body.classList.toggle('dark', window.matchMedia && window.matchMedia(
                '(prefers-color-scheme: dark)').matches);
        } else {
            window.localStorage.setItem('dark-mode', true);
            document.body.classList.add('dark');
        }
    }
</script>
