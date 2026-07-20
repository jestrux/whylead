<section id="ourValues" x-intersect.threshold.20="activeSection = 'ourValues'" class="pb-10 lg:pt-8 lg:pb-16">
    <div class="relative max-w-7xl mx-auto px-4 lg:px-8" x-data="ourValuesFoundingThree()">
        <div class="flex flex-col gap-4 lg:gap-10 items-center justify-center">
            <div class="max-w-2xl mx-auto text-center" x-ref="head">
                <h2 class="text-2xl lg:text-4xl font-bold max-w-4xl">
                    <span class="uppercase">
                        <span class="outline-text">Our</span>
                        Values
                    </span>
                </h2>

                <p class="text-lg font-light">
                    These values define our culture and drive our commitment.
                </p>
            </div>

            <ul role="list" class="w-full grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-6 lg:gap-8">
                @php
                    $values = [
                        [
                            'title' => 'Ubuntu Kwanza',
                            'description' => 'Treating All as Ends, Never Means. Working to create win-win outcomes for all earthlings.',
                        ],
                        [
                            'title' => 'Game 6',
                            'description' => 'We do what we say we do. We are who we say we are. We seize every opportunity we say yes to. We go ALL-IN and Give our absolute best.',
                        ],
                        [
                            'title' => 'Data-Driven',
                            'description' => "If we have data, let's look at data. If all we have are opinions, let's go look for data.",
                        ],
                    ];

                    $characters = [
                        'Ubuntu Kwanza' => [
                            'image' => 'character-guardian.png',
                            'alt' => 'The Guardian — avatar for our Ubuntu Kwanza value',
                            'epithet' => 'The Guardian',
                            'signature' => 'guardian',
                            'stats' => [
                                ['label' => 'Empathy', 'value' => 96],
                                ['label' => 'Fairness', 'value' => 99],
                                ['label' => 'Community', 'value' => 98],
                            ],
                        ],
                        'Game 6' => [
                            'image' => 'character-closer.png',
                            'alt' => 'The Closer — avatar for our Game 6 value',
                            'epithet' => 'The Closer — never seen a Game 7',
                            'signature' => 'closer',
                            'stats' => [
                                ['label' => 'Clutch', 'value' => 99],
                                ['label' => 'Follow-through', 'value' => 97],
                                ['label' => 'All-in', 'value' => 98],
                            ],
                        ],
                        'Data-Driven' => [
                            'image' => 'character-analyst.png',
                            'alt' => 'The Analyst — avatar for our Data-Driven value',
                            'epithet' => 'The Analyst',
                            'signature' => 'analyst',
                            'stats' => [
                                ['label' => 'Evidence', 'value' => 99],
                                ['label' => 'Curiosity', 'value' => 95],
                                ['label' => 'Precision', 'value' => 97],
                            ],
                        ],
                    ];
                @endphp

                @foreach ($values as $value)
                    @php
                        $character = $characters[$value['title']] ?? null;
                    @endphp

                    @if ($character)
                        <li
                            class="values-card group relative pt-24 lg:pt-28 h-full"
                            style="perspective: 900px"
                            x-data="valueCard()"
                            data-signature="{{ $character['signature'] }}"
                            @mousemove.throttle.16ms="tilt($event)"
                            @mouseleave="reset()"
                            @touchstart.passive="fireSignature()">
                            <div
                                class="values-card__wrap h-full will-change-transform"
                                :style="wrapStyle"
                                style="transform-style: preserve-3d; transition: transform 0.3s ease-out">
                                <div
                                    class="values-card__avatar absolute inset-x-0 -top-24 lg:-top-28 flex justify-center pointer-events-none z-20"
                                    :style="avatarStyle"
                                    style="transform-style: preserve-3d; transition: transform 0.3s ease-out">
                                    <div class="relative w-[160px] md:w-[170px] lg:w-[190px]">
                                        <div class="values-card__glow absolute inset-0 -m-4 opacity-0 pointer-events-none" aria-hidden="true"></div>
                                        @php
                                            $webpFile = str_replace('.png', '.webp', $character['image']);
                                            $webpExists = file_exists(public_path('img/uploads/' . $webpFile));
                                        @endphp
                                        <picture>
                                            @if ($webpExists)
                                                <source srcset="{{ asset('img/uploads/' . $webpFile) }}" type="image/webp">
                                            @endif
                                            <img
                                                src="{{ asset('img/uploads/' . $character['image']) }}"
                                                alt="{{ $character['alt'] }}"
                                                width="1024" height="1536"
                                                fetchpriority="low"
                                                decoding="async"
                                                class="values-card__png relative w-full h-auto select-none"
                                                style="filter: drop-shadow(0 20px 18px rgba(9, 7, 32, 0.35))" />
                                        </picture>

                                        @if ($character['signature'] === 'analyst')
                                            <svg class="values-card__bars absolute -right-1 top-1/3 w-12 h-14 opacity-0 pointer-events-none" viewBox="0 0 48 56" aria-hidden="true">
                                                <rect class="bar" data-i="0" x="2" y="38" width="10" height="16" rx="2" fill="#F26B21"/>
                                                <rect class="bar" data-i="1" x="18" y="24" width="10" height="30" rx="2" fill="#F26B21"/>
                                                <rect class="bar" data-i="2" x="34" y="8" width="10" height="46" rx="2" fill="#F26B21"/>
                                            </svg>
                                        @endif
                                    </div>
                                </div>

                                <div class="values-card__body bg-gradient-to-br from-accent via-accent/95 to-accent text-white relative w-full h-full px-7 lg:px-8 pt-40 md:pt-40 lg:pt-44 pb-6 shadow rounded-3xl overflow-hidden border border-white/5 group-hover:border-primary transition-colors duration-300"
                                    style="min-height: 420px">
                                    <div class="values-card__pattern absolute opacity-5 dark:opacity-[0.03] -right-6 top-6 will-change-transform"
                                        style="transition: transform 0.5s ease-out">
                                        @include('common.icon')
                                    </div>

                                    @if ($character['signature'] === 'closer')
                                        <div class="values-card__watermark absolute right-4 top-3 select-none pointer-events-none">
                                            <span class="values-card__wm-label text-[10px] font-black tracking-[0.24em] text-white/20 uppercase">Game</span>
                                            <span class="values-card__wm-num inline-block text-2xl font-black text-white/25 leading-none ml-0.5 align-middle" style="transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)">6</span>
                                        </div>
                                    @endif

                                    <div class="relative">
                                        <h3 class="text-xl font-semibold">
                                            {{ $value['title'] }}
                                        </h3>
                                        <p class="mt-1 text-[13px] italic font-medium text-primary values-card__epithet">
                                            {{ $character['epithet'] }}
                                        </p>
                                        <p class="mt-3 text-sm/loose text-white/75 values-card__desc">
                                            {{ $value['description'] }}
                                        </p>

                                        <dl class="values-card__stats mt-5 pt-4 border-t border-white/10 space-y-2">
                                            @foreach ($character['stats'] as $stat)
                                                <div class="values-card__stat flex items-center gap-3 text-[10px] font-bold uppercase tracking-[0.14em]">
                                                    <dt class="text-white/70 w-[38%] shrink-0">{{ $stat['label'] }}</dt>
                                                    <div class="values-card__stat-track flex-1 h-[3px] bg-white/10 rounded-full overflow-hidden">
                                                        <div class="values-card__stat-fill h-full bg-primary rounded-full" style="width: {{ $stat['value'] }}%" data-target="{{ $stat['value'] }}"></div>
                                                    </div>
                                                    <dd class="values-card__stat-num text-primary italic font-bold text-[13px] tabular-nums w-6 text-right" data-target="{{ $stat['value'] }}">{{ $stat['value'] }}</dd>
                                                </div>
                                            @endforeach
                                        </dl>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>

    <style>
        #ourValues .values-card__glow {
            background: radial-gradient(circle at 50% 55%, rgba(242, 107, 33, 0.45), rgba(242, 107, 33, 0.15) 45%, transparent 70%);
            filter: blur(16px);
            transform: scale(1.1);
            transition: opacity 0.5s ease;
        }
        #ourValues .values-card__body {
            box-shadow: 0 12px 40px -18px rgba(9, 7, 32, 0.55);
        }
        #ourValues .values-card:hover .values-card__body {
            box-shadow: 0 22px 60px -22px rgba(242, 107, 33, 0.35), 0 12px 40px -18px rgba(9, 7, 32, 0.55);
        }
        #ourValues .values-card__bars .bar {
            transform: scaleY(0);
            transform-origin: bottom;
            transition: transform 0.4s cubic-bezier(0.34, 1.56, 0.64, 1);
        }
        @media (prefers-reduced-motion: reduce) {
            #ourValues .values-card__wrap,
            #ourValues .values-card__avatar {
                transform: none !important;
                transition: none !important;
            }
        }
    </style>

    <script>
        (function () {
            var REDUCED = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
            var TOUCH = ('ontouchstart' in window) || navigator.maxTouchPoints > 0;

            window.__valuesPlayStats = function (cardEl) {
                var fills = cardEl.querySelectorAll('.values-card__stat-fill');
                var nums = cardEl.querySelectorAll('.values-card__stat-num');
                fills.forEach(function (f) { f.style.width = '0%'; });
                nums.forEach(function (n) { n.textContent = '0'; });
                if (window.gsap && !REDUCED) {
                    var g = window.gsap;
                    fills.forEach(function (f, i) {
                        var t = +f.dataset.target;
                        g.to(f, { width: t + '%', duration: 0.75, delay: 0.06 * i, ease: 'power2.out', overwrite: true });
                    });
                    nums.forEach(function (n, i) {
                        var t = +n.dataset.target;
                        var obj = { v: 0 };
                        g.to(obj, {
                            v: t, duration: 0.75, delay: 0.06 * i, ease: 'power2.out', overwrite: true,
                            onUpdate: function () { n.textContent = Math.round(obj.v); },
                            onComplete: function () { n.textContent = String(t); }
                        });
                    });
                } else {
                    fills.forEach(function (f) { f.style.width = f.dataset.target + '%'; });
                    nums.forEach(function (n) { n.textContent = n.dataset.target; });
                }
            };

            document.addEventListener('alpine:init', function () {
                var HAS_GSAP = !!(window.gsap && window.ScrollTrigger);
                if (HAS_GSAP && !REDUCED) {
                    try { window.gsap.registerPlugin(window.ScrollTrigger); } catch (e) {}
                }

                Alpine.data('ourValuesFoundingThree', function () {
                    return {
                        init: function () {
                            if (REDUCED || !HAS_GSAP) return;

                            var g = window.gsap;
                            var root = this.$root;
                            var head = root.querySelector('[x-ref="head"]');
                            var cards = Array.prototype.slice.call(root.querySelectorAll('.values-card'));

                            g.set(head, { opacity: 0, y: 20 });
                            g.set(cards, { opacity: 0, y: 40 });
                            cards.forEach(function (card) {
                                g.set(card.querySelector('.values-card__avatar'), { opacity: 0, y: -30, scale: 1.08 });
                                g.set([
                                    card.querySelector('.values-card__epithet'),
                                    card.querySelector('.values-card__desc'),
                                    card.querySelector('.values-card__stats')
                                ], { opacity: 0, y: 8 });
                                card.querySelectorAll('.values-card__stat-fill').forEach(function (f) { f.style.width = '0%'; });
                                card.querySelectorAll('.values-card__stat-num').forEach(function (n) { n.textContent = '0'; });
                            });

                            window.ScrollTrigger.create({
                                trigger: root,
                                start: 'top 75%',
                                once: true,
                                onEnter: function () {
                                    var tl = g.timeline({ defaults: { ease: 'power2.out' } });
                                    tl.to(head, { opacity: 1, y: 0, duration: 0.5 });
                                    tl.to(cards, { opacity: 1, y: 0, duration: 0.55, stagger: 0.12 }, '-=0.2');

                                    cards.forEach(function (card, i) {
                                        var body = card.querySelector('.values-card__body');
                                        var avatar = card.querySelector('.values-card__avatar');
                                        var ep = card.querySelector('.values-card__epithet');
                                        var desc = card.querySelector('.values-card__desc');
                                        var stats = card.querySelector('.values-card__stats');
                                        var at = 0.4 + i * 0.15;

                                        tl.to(avatar, {
                                            opacity: 1, y: 0, scale: 1,
                                            duration: 0.5, ease: 'back.out(1.8)'
                                        }, at);
                                        tl.fromTo(body, { y: 0 }, {
                                            y: 4, duration: 0.12, yoyo: true, repeat: 1, ease: 'power2.inOut'
                                        }, at + 0.4);
                                        tl.to([ep, desc, stats], {
                                            opacity: 1, y: 0, duration: 0.4, stagger: 0.05
                                        }, at + 0.3);
                                        window.__valuesPlayStats && tl.call(window.__valuesPlayStats, [card], null, at + 0.45);
                                    });

                                    cards.forEach(function (card, i) {
                                        var png = card.querySelector('.values-card__png');
                                        if (!png) return;
                                        g.to(png, {
                                            y: '+=5',
                                            duration: 2.4 + i * 0.4,
                                            yoyo: true,
                                            repeat: -1,
                                            ease: 'sine.inOut',
                                            delay: 1.8 + i * 0.3
                                        });
                                    });
                                }
                            });
                        }
                    };
                });

                Alpine.data('valueCard', function () {
                    return {
                        wrapStyle: '',
                        avatarStyle: '',
                        _sigActive: false,
                        _touchTimer: null,

                        tilt: function (e) {
                            if (REDUCED || TOUCH) return;
                            var el = this.$el;
                            var r = el.getBoundingClientRect();
                            var cx = r.left + r.width / 2;
                            var cy = r.top + r.height / 2;
                            var dx = (e.clientX - cx) / (r.width / 2);
                            var dy = (e.clientY - cy) / (r.height / 2);
                            var rotY = Math.max(-8, Math.min(8, dx * 8));
                            var rotX = Math.max(-8, Math.min(8, -dy * 8));
                            this.wrapStyle = 'transform: rotateX(' + rotX + 'deg) rotateY(' + rotY + 'deg);';
                            this.avatarStyle = 'transform: translate3d(' + (dx * 6) + 'px, ' + (-7 - Math.abs(dy) * 2) + 'px, 60px) scale(1.04);';
                            if (!this._sigActive) {
                                this._sigActive = true;
                                this._triggerSignature();
                                window.__valuesPlayStats && window.__valuesPlayStats(this.$el);
                            }
                        },
                        reset: function () {
                            if (REDUCED || TOUCH) return;
                            this.wrapStyle = 'transform: rotateX(0deg) rotateY(0deg);';
                            this.avatarStyle = 'transform: translate3d(0, 0, 0) scale(1);';
                            this._sigActive = false;
                            this._resetSignature();
                        },
                        fireSignature: function () {
                            if (this._sigActive) return;
                            this._sigActive = true;
                            this._triggerSignature();
                            window.__valuesPlayStats && window.__valuesPlayStats(this.$el);
                            if (this._touchTimer) clearTimeout(this._touchTimer);
                            var self = this;
                            this._touchTimer = setTimeout(function () {
                                self._sigActive = false;
                                self._resetSignature();
                            }, 1400);
                        },
                        _triggerSignature: function () {
                            var sig = this.$el.dataset.signature;
                            var el = this.$el;
                            if (sig === 'guardian') {
                                var glow = el.querySelector('.values-card__glow');
                                if (glow) glow.style.opacity = '1';
                            } else if (sig === 'closer') {
                                var pattern = el.querySelector('.values-card__pattern');
                                if (pattern) pattern.style.transform = 'scale(1.06)';
                                var num = el.querySelector('.values-card__wm-num');
                                if (num) num.style.transform = 'translateY(-3px)';
                            } else if (sig === 'analyst') {
                                var svg = el.querySelector('.values-card__bars');
                                if (svg) svg.style.opacity = '1';
                                var bars = el.querySelectorAll('.values-card__bars .bar');
                                Array.prototype.forEach.call(bars, function (b, i) {
                                    b.style.transitionDelay = (i * 0.08) + 's';
                                    b.style.transform = 'scaleY(1)';
                                });
                            }
                        },
                        _resetSignature: function () {
                            var sig = this.$el.dataset.signature;
                            var el = this.$el;
                            if (sig === 'guardian') {
                                var glow = el.querySelector('.values-card__glow');
                                if (glow) glow.style.opacity = '0';
                            } else if (sig === 'closer') {
                                var pattern = el.querySelector('.values-card__pattern');
                                if (pattern) pattern.style.transform = '';
                                var num = el.querySelector('.values-card__wm-num');
                                if (num) num.style.transform = '';
                            } else if (sig === 'analyst') {
                                var svg = el.querySelector('.values-card__bars');
                                if (svg) svg.style.opacity = '0';
                                var bars = el.querySelectorAll('.values-card__bars .bar');
                                Array.prototype.forEach.call(bars, function (b) {
                                    b.style.transitionDelay = '0s';
                                    b.style.transform = 'scaleY(0)';
                                });
                            }
                        }
                    };
                });
            });
        })();
    </script>
</section>
