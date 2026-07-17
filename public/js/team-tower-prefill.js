/*!
 * Team Tower — ACEND workshop-registration prefill
 *
 * Loaded by the ACEND registration page with a single script tag:
 *   <script src="https://whyleadothers.com/js/team-tower-prefill.js" defer></script>
 *
 * When the visitor arrives with a ?tower=… payload (base64url JSON written
 * by the Team Tower on whyleadothers.com), this script:
 *   1. Renders a lavender/indigo result banner directly above the form.
 *   2. Pre-selects the `interested_in` <select>.
 *   3. Fills `expected_outcomes` <textarea> with a readable narrative of the picks.
 *   4. Appends a hidden `team_tower_result` field for redundant capture.
 *
 * Fails silently if no param, malformed param, or form/fields missing — the form
 * works normally in that case.
 *
 * Version: 2026-07-17 (edit FIELDS if the form's selectors change).
 */
(function () {
    'use strict';

    // Selectors are ordered lists — first match wins. Falls back to the first
    // <select> / <textarea> in the form if none of the specific names match, so
    // renaming a field on the ACEND side doesn't silently break prefill.
    var FIELDS = {
        form: ['form.wl-form-grid', 'form'],
        interestedIn: [
            'select[name="interested_in"]',
            'select[name="service"]',
            'select[name="interest"]',
            'select', // fallback: first select in form
        ],
        notesTextarea: [
            'textarea[name="expected_outcomes"]',
            'textarea[name="additional_context"]',
            'textarea[name="additional_notes"]',
            'textarea[name="context"]',
            'textarea[name="notes"]',
            'textarea[name="message"]',
            'textarea[name="objectives"]',
            'textarea', // fallback: first textarea in form
        ],
        hiddenName: 'team_tower_result',
    };

    function firstMatch(root, selectors) {
        for (var i = 0; i < selectors.length; i++) {
            var el = root.querySelector(selectors[i]);
            if (el) return el;
        }
        return null;
    }

    // React uses a value tracker on inputs and ignores plain `el.value = "…"`
    // because that bypasses the property descriptor React installs. Setting
    // through the native prototype descriptor and firing a bubbling input event
    // makes React notice the change and update its state.
    function setReactValue(el, value) {
        var proto;
        if (el.tagName === 'TEXTAREA') proto = window.HTMLTextAreaElement && HTMLTextAreaElement.prototype;
        else if (el.tagName === 'SELECT') proto = window.HTMLSelectElement && HTMLSelectElement.prototype;
        else proto = window.HTMLInputElement && HTMLInputElement.prototype;

        var setter = proto && Object.getOwnPropertyDescriptor(proto, 'value');
        if (setter && setter.set) {
            setter.set.call(el, value);
        } else {
            el.value = value; // pre-React / plain HTML fallback
        }
        el.dispatchEvent(new Event('input',  { bubbles: true }));
        el.dispatchEvent(new Event('change', { bubbles: true }));
    }

    var STYLE = ''
        + '.tt-result-banner{background:#C3BBFF;color:#19124B;border-radius:14px;'
        + 'padding:22px 24px;margin:0 0 28px;box-shadow:0 12px 28px -12px rgba(25,18,75,0.28);'
        + 'opacity:0;transform:translateY(-8px);'
        + 'transition:opacity 500ms ease, transform 600ms cubic-bezier(0.22,1,0.36,1);}'
        + '.tt-result-banner.is-in{opacity:1;transform:translateY(0);}'
        + '.tt-result-banner .tt-kicker{font-size:11px;font-weight:700;letter-spacing:0.16em;'
        + 'text-transform:uppercase;opacity:0.75;margin-bottom:4px;}'
        + '.tt-result-banner .tt-arch{font-size:22px;font-weight:800;line-height:1.2;}'
        + '.tt-result-banner .tt-service{font-size:13px;margin-top:6px;}'
        + '.tt-result-banner .tt-service strong{font-weight:700;}'
        + '.tt-result-banner ul.tt-picks{margin:14px 0 0;padding:0;list-style:none;display:grid;gap:6px;}'
        + '.tt-result-banner ul.tt-picks li{font-size:13px;line-height:1.4;padding-left:18px;position:relative;}'
        + '.tt-result-banner ul.tt-picks li::before{content:"";position:absolute;left:0;top:8px;'
        + 'width:8px;height:8px;border-radius:999px;background:#F26B21;}';

    function decodePayload(raw) {
        if (!raw) return null;
        try {
            var b64 = raw.replace(/-/g, '+').replace(/_/g, '/');
            var pad = b64.length % 4;
            if (pad) b64 += '===='.slice(0, 4 - pad);
            var json = decodeURIComponent(escape(atob(b64)));
            var obj = JSON.parse(json);
            if (!obj || typeof obj !== 'object') return null;
            if (!obj.archetype || !Array.isArray(obj.picks)) return null;
            return obj;
        } catch (e) {
            return null;
        }
    }

    function injectStyles() {
        if (document.getElementById('tt-prefill-styles')) return;
        var s = document.createElement('style');
        s.id = 'tt-prefill-styles';
        s.textContent = STYLE;
        document.head.appendChild(s);
    }

    function h(tag, attrs, children) {
        var el = document.createElement(tag);
        if (attrs) Object.keys(attrs).forEach(function (k) {
            if (k === 'className') el.className = attrs[k];
            else el.setAttribute(k, attrs[k]);
        });
        (children || []).forEach(function (c) {
            if (c == null) return;
            el.appendChild(typeof c === 'string' ? document.createTextNode(c) : c);
        });
        return el;
    }

    function renderBanner(form, data) {
        var kids = [
            h('div', { className: 'tt-kicker' }, ['Your Team Tower result']),
            h('div', { className: 'tt-arch' }, [data.archetype]),
        ];
        if (data.service) {
            kids.push(h('div', { className: 'tt-service' }, [
                document.createTextNode('Recommended: '),
                h('strong', null, [data.service]),
            ]));
        }
        if (data.picks && data.picks.length) {
            kids.push(h('ul', { className: 'tt-picks' }, data.picks.map(function (p) {
                return h('li', null, [String(p)]);
            })));
        }

        var banner = h('div', { className: 'tt-result-banner', role: 'note' }, kids);
        form.parentNode.insertBefore(banner, form);

        requestAnimationFrame(function () {
            requestAnimationFrame(function () { banner.classList.add('is-in'); });
        });

        try { banner.scrollIntoView({ behavior: 'smooth', block: 'start' }); } catch (e) {}
        return banner;
    }

    function prefillInterestedIn(form, data) {
        if (!data.interested_in) return;
        var sel = firstMatch(form, FIELDS.interestedIn);
        if (!sel || sel.tagName !== 'SELECT') return;
        var opt = Array.prototype.find.call(sel.options, function (o) {
            return o.value === data.interested_in;
        });
        if (opt) setReactValue(sel, data.interested_in);
    }

    function buildNarrative(data) {
        var lines = ['[Team Tower audit result]', 'Team type: ' + data.archetype];
        if (data.service) lines.push('Recommended: ' + data.service);
        lines.push('', 'The 6 truths they recognized:');
        (data.picks || []).forEach(function (p, i) { lines.push((i + 1) + '. ' + p); });
        return lines.join('\n');
    }

    function prefillOutcomes(form, narrative) {
        var ta = firstMatch(form, FIELDS.notesTextarea);
        if (!ta || ta.tagName !== 'TEXTAREA') return;
        var next = (ta.value && ta.value.trim().length)
            ? narrative + '\n\n---\n\n' + ta.value
            : narrative;
        setReactValue(ta, next);
    }

    function addHiddenField(form, narrative) {
        if (form.querySelector('input[name="' + FIELDS.hiddenName + '"]')) return;
        var hidden = document.createElement('input');
        hidden.type = 'hidden';
        hidden.name = FIELDS.hiddenName;
        hidden.value = narrative;
        form.appendChild(hidden);
    }

    function applyAll(form, data, narrative) {
        prefillInterestedIn(form, data);
        prefillOutcomes(form, narrative);
        addHiddenField(form, narrative);
    }

    function bootstrap() {
        var params = new URLSearchParams(window.location.search);
        var raw = params.get('tower');
        var data = decodePayload(raw);
        if (!data) return;

        var narrative = buildNarrative(data);
        var attempts = 0;
        var MAX_ATTEMPTS = 60;   // ~6 s at 100 ms intervals — covers slow React hydration
        var applied = false;
        var bannerRendered = false;

        function tick() {
            attempts++;
            var form = firstMatch(document, FIELDS.form);
            var textarea = form && firstMatch(form, FIELDS.notesTextarea);

            if (form && textarea) {
                if (!bannerRendered) {
                    injectStyles();
                    renderBanner(form, data);
                    bannerRendered = true;
                }
                applyAll(form, data, narrative);
                applied = true;

                // React sometimes hydrates a second render pass after our first
                // apply — re-apply once more shortly after to survive that.
                setTimeout(function () { applyAll(form, data, narrative); }, 300);
                setTimeout(function () { applyAll(form, data, narrative); }, 900);

                // Watch for React re-renders that might replace the form node
                // and reset field values within the next few seconds.
                var stopAt = Date.now() + 4000;
                var mo = new MutationObserver(function () {
                    if (Date.now() > stopAt) { mo.disconnect(); return; }
                    var f = firstMatch(document, FIELDS.form);
                    if (!f) return;
                    var ta = firstMatch(f, FIELDS.notesTextarea);
                    if (ta && (!ta.value || ta.value.indexOf('[Team Tower audit result]') === -1)) {
                        applyAll(f, data, narrative);
                    }
                });
                mo.observe(document.body, { childList: true, subtree: true });
                return;
            }

            if (attempts < MAX_ATTEMPTS) setTimeout(tick, 100);
        }

        tick();
    }

    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', bootstrap);
    } else {
        bootstrap();
    }
})();
