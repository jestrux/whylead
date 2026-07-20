/*!
 * About page — "The story that tells itself"
 *
 * Pinned, scroll-driven story sequence for the #aboutUs section.
 * Uses GSAP core + ScrollTrigger (loaded via the About page template).
 *
 * Forks — desktop (>=1024px), mobile (<1024px), reduced-motion — via
 * gsap.matchMedia(). If GSAP fails to load or the browser prefers reduced
 * motion, the section falls back to its static rendered form; no CLS.
 *
 * Line-splitting runs ONCE (after fonts are ready), then all timelines hold
 * stable refs to the resulting line-inner elements. On resize we only call
 * ScrollTrigger.refresh() — layout math is recomputed but the line-split
 * DOM stays put, which keeps the timeline valid.
 */
(function () {
    "use strict";

    if (!window.gsap || !window.ScrollTrigger) {
        document.documentElement.classList.remove("js-story");
        return;
    }

    var gsap = window.gsap;
    var ScrollTrigger = window.ScrollTrigger;
    gsap.registerPlugin(ScrollTrigger);

    var section = document.getElementById("aboutUs");
    if (!section) {
        return;
    }

    /* ------------------------------------------------------------------ *
     * Line splitter — wraps each rendered line of a paragraph in a masked
     * container. Preserves any inline child elements (special-word
     * treatments) as atomic units.
     * ------------------------------------------------------------------ */
    function collectAtoms(paragraph) {
        if (!paragraph.__originalHtml) {
            paragraph.__originalHtml = paragraph.innerHTML;
        } else {
            paragraph.innerHTML = paragraph.__originalHtml;
        }

        var nodes = [];
        paragraph.childNodes.forEach(function (node) {
            nodes.push(node);
        });

        paragraph.innerHTML = "";

        nodes.forEach(function (node) {
            if (node.nodeType === 3) {
                var parts = node.textContent.split(/(\s+)/);
                parts.forEach(function (part) {
                    if (!part) {
                        return;
                    }
                    if (/^\s+$/.test(part)) {
                        paragraph.appendChild(document.createTextNode(" "));
                    } else {
                        var span = document.createElement("span");
                        span.className = "story-atom";
                        span.textContent = part;
                        paragraph.appendChild(span);
                    }
                });
            } else if (node.nodeType === 1) {
                var wrap = document.createElement("span");
                wrap.className = "story-atom";
                wrap.appendChild(node);
                paragraph.appendChild(wrap);
            }
        });

        return Array.from(paragraph.querySelectorAll(".story-atom"));
    }

    function splitToLines(paragraph) {
        var atoms = collectAtoms(paragraph);
        if (!atoms.length) {
            return [];
        }

        var lines = [];
        var currentLine = [];
        var currentTop = null;

        atoms.forEach(function (atom) {
            var top = atom.offsetTop;
            if (currentTop === null) {
                currentTop = top;
                currentLine.push(atom);
            } else if (Math.abs(top - currentTop) < 3) {
                currentLine.push(atom);
            } else {
                lines.push(currentLine);
                currentLine = [atom];
                currentTop = top;
            }
        });
        if (currentLine.length) {
            lines.push(currentLine);
        }

        paragraph.innerHTML = "";
        var lineInners = [];
        lines.forEach(function (lineAtoms) {
            var mask = document.createElement("span");
            mask.className = "story-line-mask";
            var inner = document.createElement("span");
            inner.className = "story-line-inner";
            lineAtoms.forEach(function (atom, i) {
                if (i > 0) {
                    inner.appendChild(document.createTextNode(" "));
                }
                while (atom.firstChild) {
                    inner.appendChild(atom.firstChild);
                }
            });
            mask.appendChild(inner);
            paragraph.appendChild(mask);
            lineInners.push(inner);
        });

        paragraph.classList.add("is-split");
        return lineInners;
    }

    /* ------------------------------------------------------------------ *
     * Anchor-hash rescue — after ScrollTrigger extends the document with
     * the pin-spacer, re-scroll to any hash the user arrived on so they
     * don't land in the wrong place.
     * ------------------------------------------------------------------ */
    function rescueHash() {
        var hash = window.location.hash;
        if (!hash || hash === "#aboutUs") {
            return;
        }
        var target = document.querySelector(hash);
        if (!target) {
            return;
        }
        var headerOffset = 120;
        var y = target.getBoundingClientRect().top + window.pageYOffset - headerOffset;
        window.scrollTo({ top: y, behavior: "auto" });
    }

    /* ------------------------------------------------------------------ *
     * Split once and remember refs. Called after fonts settle so line
     * breaks reflect the final rendered font.
     * ------------------------------------------------------------------ */
    var storyParagraphs = Array.from(section.querySelectorAll(".story-p"));
    var lineMap = new Map();

    function splitAllOnce() {
        storyParagraphs.forEach(function (p) {
            lineMap.set(p, splitToLines(p));
        });
    }

    function init() {
        splitAllOnce();

        var mm = gsap.matchMedia();

        /* -------------------------------------------------------------- *
         * DESKTOP fork — pinned scroll story.
         *
         * Timeline layout (0–100% across a 150% pin distance):
         *   0.00 – 0.10   Headline assembles, thread starts to grow
         *   0.06 – 0.18   Scrap photo slaps down (rotated + spring)
         *   0.10 – 0.72   Paragraphs reveal line-by-line at 0.10 / 0.24 / 0.40 / 0.52
         *   0.36 – 0.42   "Intervene" underline draws
         *   0.48 – 0.56   "Thrive" highlight sweeps
         *   0.20 – 0.68   Cards stamp in at 0.20 / 0.38 / 0.56 with badges +0.04s
         *   0.72 – 0.88   "blue" warms to orange
         *   0.86 – 1.00   Our Values button draws, fills, pulses
         * -------------------------------------------------------------- */
        mm.add("(min-width: 1024px) and (prefers-reduced-motion: no-preference)", function () {
            var thread = section.querySelector(".story-thread-fill");
            var headingWords = section.querySelectorAll(".story-headline-word");
            var scrap = section.querySelector(".story-scrap");
            var cards = section.querySelectorAll(".story-card");
            var badges = section.querySelectorAll(".story-badge");
            var underlinePath = section.querySelector(".treat-underline path");
            var highlightSweep = section.querySelector(".treat-highlight-sweep");
            var blueWord = section.querySelector(".treat-blue");
            var storyBtn = section.querySelector(".story-btn");
            var btnOutlinePath = section.querySelector(".story-btn-outline path");
            var scrollHint = section.querySelector(".story-scroll-hint");

            // Initial states. Heading stays visible from first paint so the
            // page never lands on an empty viewport — the story unfolds as the
            // reader scrolls, but the "Once Upon A Time" beat is already there.
            gsap.set(thread, { scaleY: 0, transformOrigin: "top center" });
            gsap.set(headingWords, { autoAlpha: 1, yPercent: 0 });
            if (scrap) {
                gsap.set(scrap, { autoAlpha: 0, y: -30, rotate: -12, scale: 0.9, transformOrigin: "60% 40%" });
            }
            gsap.set(cards[0], { autoAlpha: 0, y: 40, rotate: -4, scale: 0.95 });
            gsap.set(cards[1], { autoAlpha: 0, y: 40, rotate: 3, scale: 0.95 });
            gsap.set(cards[2], { autoAlpha: 0, y: 40, rotate: -3, scale: 0.95 });
            gsap.set(badges, { autoAlpha: 0, scale: 0, rotate: -8, transformOrigin: "center center" });
            if (underlinePath) {
                gsap.set(underlinePath, { attr: { "stroke-dashoffset": 1 } });
            }
            if (highlightSweep) {
                gsap.set(highlightSweep, { scaleX: 0, transformOrigin: "left center" });
            }
            if (btnOutlinePath) {
                gsap.set(btnOutlinePath, { attr: { "stroke-dashoffset": 1 } });
            }
            if (storyBtn) {
                gsap.set(storyBtn, { autoAlpha: 0, scale: 0.9 });
            }
            storyParagraphs.forEach(function (p) {
                var inners = lineMap.get(p) || [];
                gsap.set(inners, { yPercent: 110 });
                p.classList.add("story-p--armed");
            });

            var tl = gsap.timeline({
                defaults: { ease: "power2.out" },
                scrollTrigger: {
                    trigger: section,
                    start: "top top",
                    end: "+=150%",
                    pin: true,
                    pinSpacing: true,
                    scrub: 0.8,
                    anticipatePin: 1,
                    invalidateOnRefresh: true,
                },
            });

            /* Thread grows down the narrative gutter. Heading is visible from
               the start, so no headline assemble here — the scroll hint below
               tells the reader to start scrolling. */
            tl.to(thread, { scaleY: 1, duration: 1, ease: "none" }, 0);
            if (scrollHint) {
                tl.to(scrollHint, { autoAlpha: 0, duration: 0.05 }, 0);
            }

            /* Scrap photo slaps down like a polaroid dropped on the page. */
            if (scrap) {
                tl.to(
                    scrap,
                    {
                        autoAlpha: 1,
                        y: 0,
                        rotate: -3,
                        scale: 1,
                        duration: 0.12,
                        ease: "back.out(1.9)",
                    },
                    0.06,
                );
                // A tiny post-land wobble.
                tl.to(scrap, { rotate: -2.4, duration: 0.05, ease: "power1.inOut" }, 0.2);
                tl.to(scrap, { rotate: -3, duration: 0.06, ease: "power1.inOut" }, 0.25);
            }

            /* Paragraphs reveal line-by-line. */
            var paraStart = [0.1, 0.24, 0.4, 0.52];
            storyParagraphs.forEach(function (p, i) {
                var inners = lineMap.get(p) || [];
                if (!inners.length) {
                    return;
                }
                tl.to(
                    inners,
                    { yPercent: 0, duration: 0.09, stagger: 0.025, ease: "power3.out" },
                    paraStart[i],
                );
            });

            /* Inline word treatments. */
            if (underlinePath) {
                tl.to(underlinePath, { attr: { "stroke-dashoffset": 0 }, duration: 0.06, ease: "power1.inOut" }, 0.36);
            }
            if (highlightSweep) {
                tl.to(highlightSweep, { scaleX: 1, duration: 0.08, ease: "power2.inOut" }, 0.48);
            }

            /* Cards stamp in with badge pop. */
            var cardAt = [0.2, 0.38, 0.56];
            var badgeAt = [0.24, 0.42, 0.6];
            cards.forEach(function (card, i) {
                var restRotate = i === 1 ? -1 : 1;
                tl.to(
                    card,
                    {
                        autoAlpha: 1,
                        y: 0,
                        rotate: restRotate,
                        scale: 1,
                        duration: 0.1,
                        ease: "back.out(1.7)",
                    },
                    cardAt[i],
                );
                tl.to(
                    badges[i],
                    {
                        autoAlpha: 1,
                        scale: 1,
                        rotate: 0,
                        duration: 0.08,
                        ease: "back.out(2.5)",
                    },
                    badgeAt[i],
                );
                // Subtle parallax drift after landing.
                tl.to(card, { y: -10, duration: 0.32, ease: "none" }, badgeAt[i] + 0.02);
            });

            /* Payoff — blue → orange, button draws + pulses. */
            if (blueWord) {
                tl.to(blueWord, { color: "#F26B21", duration: 0.1, ease: "power1.inOut" }, 0.72);
            }
            if (btnOutlinePath) {
                tl.to(btnOutlinePath, { attr: { "stroke-dashoffset": 0 }, duration: 0.07, ease: "power1.inOut" }, 0.86);
            }
            if (storyBtn) {
                tl.to(storyBtn, { autoAlpha: 1, scale: 1, duration: 0.05, ease: "power2.out" }, 0.9);
                tl.to(storyBtn, { scale: 1.05, duration: 0.03, ease: "power2.out" }, 0.94);
                tl.to(storyBtn, { scale: 1, duration: 0.03, ease: "power2.in" }, 0.97);
            }

            var onResize = function () {
                ScrollTrigger.refresh();
            };
            window.addEventListener("resize", onResize);

            return function () {
                window.removeEventListener("resize", onResize);
            };
        });

        /* -------------------------------------------------------------- *
         * MOBILE / TABLET fork — no pinning, simple staggered reveals.
         * -------------------------------------------------------------- */
        mm.add("(max-width: 1023px) and (prefers-reduced-motion: no-preference)", function () {
            var thread = section.querySelector(".story-thread-fill");
            var headingWords = section.querySelectorAll(".story-headline-word");
            var scrap = section.querySelector(".story-scrap");
            var cards = section.querySelectorAll(".story-card");
            var badges = section.querySelectorAll(".story-badge");
            var underlinePath = section.querySelector(".treat-underline path");
            var highlightSweep = section.querySelector(".treat-highlight-sweep");
            var blueWord = section.querySelector(".treat-blue");
            var storyBtn = section.querySelector(".story-btn");
            var btnOutlinePath = section.querySelector(".story-btn-outline path");

            if (thread) {
                gsap.set(thread, { display: "none" });
            }

            var scrollHint = section.querySelector(".story-scroll-hint");

            gsap.set(headingWords, { autoAlpha: 1, yPercent: 0 });
            if (scrap) {
                gsap.set(scrap, { autoAlpha: 0, y: -20, rotate: -8, scale: 0.94 });
            }
            gsap.set(cards, { autoAlpha: 0, y: 30 });
            gsap.set(badges, { autoAlpha: 0, scale: 0.6 });
            if (underlinePath) {
                gsap.set(underlinePath, { attr: { "stroke-dashoffset": 1 } });
            }
            if (highlightSweep) {
                gsap.set(highlightSweep, { scaleX: 0, transformOrigin: "left center" });
            }
            if (storyBtn) {
                gsap.set(storyBtn, { autoAlpha: 0, y: 20 });
            }
            if (btnOutlinePath) {
                gsap.set(btnOutlinePath, { attr: { "stroke-dashoffset": 0 } });
            }
            storyParagraphs.forEach(function (p) {
                var inners = lineMap.get(p) || [];
                gsap.set(inners, { yPercent: 110 });
                p.classList.add("story-p--armed");
            });

            if (scrollHint) {
                ScrollTrigger.create({
                    trigger: section,
                    start: "top 40%",
                    once: true,
                    onEnter: function () {
                        gsap.to(scrollHint, { autoAlpha: 0, duration: 0.4 });
                    },
                });
            }

            if (scrap) {
                ScrollTrigger.create({
                    trigger: scrap,
                    start: "top 88%",
                    once: true,
                    onEnter: function () {
                        gsap.to(scrap, {
                            autoAlpha: 1,
                            y: 0,
                            rotate: -3,
                            scale: 1,
                            duration: 0.6,
                            ease: "back.out(1.7)",
                        });
                    },
                });
            }

            storyParagraphs.forEach(function (p, idx) {
                var inners = lineMap.get(p) || [];
                ScrollTrigger.create({
                    trigger: p,
                    start: "top 85%",
                    once: true,
                    onEnter: function () {
                        gsap.to(inners, {
                            yPercent: 0,
                            duration: 0.55,
                            stagger: 0.08,
                            ease: "power3.out",
                        });
                        if (idx === 1 && underlinePath) {
                            gsap.to(underlinePath, {
                                attr: { "stroke-dashoffset": 0 },
                                duration: 0.5,
                                delay: 0.4,
                                ease: "power1.inOut",
                            });
                        }
                        if (idx === 2 && highlightSweep) {
                            gsap.to(highlightSweep, {
                                scaleX: 1,
                                duration: 0.5,
                                delay: 0.4,
                                ease: "power2.inOut",
                            });
                        }
                    },
                });
            });

            if (storyBtn) {
                ScrollTrigger.create({
                    trigger: storyBtn,
                    start: "top 90%",
                    once: true,
                    onEnter: function () {
                        gsap.to(storyBtn, {
                            autoAlpha: 1,
                            y: 0,
                            duration: 0.5,
                            ease: "back.out(1.5)",
                        });
                    },
                });
            }

            cards.forEach(function (card, i) {
                ScrollTrigger.create({
                    trigger: card,
                    start: "top 88%",
                    once: true,
                    onEnter: function () {
                        gsap.to(card, { autoAlpha: 1, y: 0, duration: 0.6, ease: "power3.out" });
                        gsap.to(badges[i], {
                            autoAlpha: 1,
                            scale: 1,
                            duration: 0.4,
                            delay: 0.2,
                            ease: "back.out(2.5)",
                        });
                        if (i === 2 && blueWord) {
                            gsap.to(blueWord, {
                                color: "#F26B21",
                                duration: 0.8,
                                delay: 0.6,
                                ease: "power1.inOut",
                            });
                        }
                    },
                });
            });

            var onResize = function () {
                ScrollTrigger.refresh();
            };
            window.addEventListener("resize", onResize);

            return function () {
                window.removeEventListener("resize", onResize);
            };
        });

        /* -------------------------------------------------------------- *
         * REDUCED MOTION — instant fades only.
         * -------------------------------------------------------------- */
        mm.add("(prefers-reduced-motion: reduce)", function () {
            var thread = section.querySelector(".story-thread-fill");
            var scrap = section.querySelector(".story-scrap");
            var headingWords = section.querySelectorAll(".story-headline-word");
            var cards = section.querySelectorAll(".story-card");
            var badges = section.querySelectorAll(".story-badge");
            var underlinePath = section.querySelector(".treat-underline path");
            var highlightSweep = section.querySelector(".treat-highlight-sweep");
            var storyBtn = section.querySelector(".story-btn");
            var btnOutlinePath = section.querySelector(".story-btn-outline path");

            if (thread) {
                gsap.set(thread, { display: "none" });
            }
            gsap.set(headingWords, { autoAlpha: 1, yPercent: 0 });
            if (scrap) {
                gsap.set(scrap, { autoAlpha: 1, y: 0, rotate: -3, scale: 1 });
            }
            gsap.set(cards, { autoAlpha: 1, y: 0, rotate: 0, scale: 1, clearProps: "transform" });
            gsap.set(badges, { autoAlpha: 1, scale: 1, rotate: 0 });
            if (underlinePath) {
                gsap.set(underlinePath, { attr: { "stroke-dashoffset": 0 } });
            }
            if (highlightSweep) {
                gsap.set(highlightSweep, { scaleX: 1 });
            }
            if (storyBtn) {
                gsap.set(storyBtn, { autoAlpha: 1 });
            }
            if (btnOutlinePath) {
                gsap.set(btnOutlinePath, { attr: { "stroke-dashoffset": 0 } });
            }
            storyParagraphs.forEach(function (p) {
                var inners = lineMap.get(p) || [];
                gsap.set(inners, { yPercent: 0 });
                p.classList.add("story-p--armed");
            });
        });

        // If the user arrived on a hash below the pin, the browser's initial
        // scroll landed before the pin-spacer extended the doc. Give the pin
        // a beat to settle, then re-scroll ONCE.
        var hash = window.location.hash;
        if (hash && hash !== "#aboutUs" && document.querySelector(hash)) {
            setTimeout(rescueHash, 350);
        }
    }

    // Wait for the window load event — by then the viewport has been sized
    // and fonts have (almost always) resolved, so matchMedia picks the
    // right fork on the first try.
    var didInit = false;
    function bootstrap() {
        if (didInit) {
            return;
        }
        // Guard against the (rare) 0-width state — if we hit it, keep polling.
        if (window.innerWidth <= 0) {
            requestAnimationFrame(bootstrap);
            return;
        }
        didInit = true;
        if (document.fonts && document.fonts.ready) {
            document.fonts.ready.then(init);
        } else {
            init();
        }
    }
    if (document.readyState === "complete") {
        bootstrap();
    } else {
        window.addEventListener("load", bootstrap);
    }
})();
