{{-- ================================================================
     FACILITATION · S2 — JOURNEY ("One journey, two altitudes")
     Clerk-style scrollytelling: timeline steps on the left drive a
     sticky staircase on the right; the active stair expands into a
     living scene (radar / aligning arrows / mesh / campfire), with a
     replay control per card. Locked in from the /lab redesign process.
================================================================= --}}

@php
    $journey = [
        [
            'n' => '01', 'k' => 'Strategy', 'sub' => 'High-level',
            'desc' => 'Direction, priorities and the big calls.',
            'long' => 'We hold the leadership team through the big, uncomfortable calls that keep getting deferred — until direction stops being a debate and becomes a plan.',
            'points' => ['Vision & priorities', 'The big trade-offs', 'Where we\'re going'],
            'pts' => [
                ['Vision & priorities', 'A shared answer to "what matters most this year" — written down, ranked and owned.', 'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5'],
                ['The big trade-offs', 'What we\'re saying no to, said out loud, so focus survives contact with reality.', 'M12 3v17.25m0 0c-1.472 0-2.882.265-4.185.75M12 20.25c1.472 0 2.882.265 4.185.75M18.75 4.97A48.416 48.416 0 0 0 12 4.5c-2.291 0-4.545.16-6.75.47m13.5 0c1.01.143 2.01.317 3 .52m-3-.52 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.988 5.988 0 0 1-2.031.352 5.988 5.988 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L18.75 4.971Zm-16.5.52c.99-.203 1.99-.377 3-.52m0 0 2.62 10.726c.122.499-.106 1.028-.589 1.202a5.989 5.989 0 0 1-2.031.352 5.989 5.989 0 0 1-2.031-.352c-.483-.174-.711-.703-.59-1.202L5.25 4.971Z'],
                ['Where we\'re going', 'A direction everyone in the room can repeat in one sentence.', 'M15 10.5a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1 1 15 0Z'],
            ],
            'tags' => [
                ['Strategy sessions', 'M3 3v1.5M3 21v-6m0 0 2.77-.693a9 9 0 0 1 6.208.682l.108.054a9 9 0 0 0 6.086.71l3.114-.732a48.524 48.524 0 0 1-.005-10.499l-3.11.732a9 9 0 0 1-6.085-.711l-.108-.054a9 9 0 0 0-6.208-.682L3 4.5M3 15V4.5'],
                ['Executive retreats', 'M12 21a9 9 0 0 0 9-9V6.75L12 3 3 6.75V12a9 9 0 0 0 9 9Z'],
                ['Annual planning', 'M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 0 1 2.25-2.25h13.5A2.25 2.25 0 0 1 21 7.5v11.25m-18 0A2.25 2.25 0 0 0 5.25 21h13.5A2.25 2.25 0 0 0 21 18.75m-18 0v-7.5A2.25 2.25 0 0 1 5.25 9h13.5A2.25 2.25 0 0 1 21 11.25v7.5'],
                ['Vision resets', 'M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
            ],
        ],
        [
            'n' => '02', 'k' => 'Alignment', 'sub' => 'Descending',
            'desc' => 'Shared understanding across the team.',
            'long' => 'Strategy fails quietly — in the gap between what was decided and what each person heard. We rebuild the shared picture so effort compounds.',
            'points' => ['Shared understanding', 'Role & ownership clarity', 'Rowing together'],
            'pts' => [
                ['Shared understanding', 'Every function reading from the same page — not their own translation of it.', 'M20.25 8.511c.884.284 1.5 1.128 1.5 2.097v4.286c0 1.136-.847 2.1-1.98 2.193-.34.027-.68.052-1.02.072v3.091l-3-3c-1.354 0-2.694-.055-4.02-.163a2.115 2.115 0 0 1-.825-.242m9.345-8.334a2.126 2.126 0 0 0-.476-.095 48.64 48.64 0 0 0-8.048 0c-1.131.094-1.976 1.057-1.976 2.192v4.286c0 .837.46 1.58 1.155 1.951m9.345-8.334V6.637c0-1.621-1.152-3.026-2.76-3.235A48.455 48.455 0 0 0 11.25 3c-2.115 0-4.198.137-6.24.402-1.608.209-2.76 1.614-2.76 3.235v6.226c0 1.621 1.152 3.026 2.76 3.235.577.075 1.157.14 1.74.194V21l4.155-4.155'],
                ['Role & ownership clarity', 'Who owns what, decided in the room, with names attached.', 'M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
                ['Rowing together', 'Priorities sequenced so teams pull in one direction, not eight.', 'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941'],
            ],
            'tags' => [
                ['Alignment sessions', 'M2.25 18 9 11.25l4.306 4.306a11.95 11.95 0 0 1 5.814-5.518l2.74-1.22m0 0-5.94-2.281m5.94 2.28-2.28 5.941'],
                ['Cross-team resets', 'M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5'],
                ['Conflict navigation', 'M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z'],
                ['Ownership mapping', 'M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z'],
            ],
        ],
        [
            'n' => '03', 'k' => 'Team building', 'sub' => 'Descending',
            'desc' => 'Trust, honesty and real connection.',
            'long' => 'This is the part no slide deck produces: the trust and honesty a team needs to challenge each other well — the ground every hard conversation stands on.',
            'points' => ['Trust & safety', 'Honest feedback', 'Real connection'],
            // adapted from Ben's team-building cards on the current page, icons included
            'pts' => [
                ['Out of the comfort zone', 'Activity-based challenges — physical and mental — solved together.', 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z'],
                ['Communication & negotiation', 'The collaboration muscles teams lean on when pressure is real.', 'M8.625 9.75a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H8.25m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0H12m4.125 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm0 0h-.375M21 12c0 4.556-4.03 8.25-9 8.25a9.764 9.764 0 0 1-2.555-.337A5.972 5.972 0 0 1 5.41 20.97a5.969 5.969 0 0 1-.474-.065 4.48 4.48 0 0 0 .978-2.025c.09-.457-.133-.901-.467-1.226C3.93 16.178 3 14.189 3 12c0-4.556 4.03-8.25 9-8.25s9 3.694 9 8.25Z'],
                ['Honest feedback', 'Two-way candour made normal, so challenge lands without bruising.', 'M7.5 21 3 16.5m0 0L7.5 12M3 16.5h13.5m0-13.5L21 7.5m0 0L16.5 12M21 7.5H7.5'],
            ],
            'tags' => [
                ['Team-building retreats', 'M15.362 5.214A8.252 8.252 0 0 1 12 21 8.25 8.25 0 0 1 6.038 7.047 8.287 8.287 0 0 0 9 9.601a8.983 8.983 0 0 1 3.361-6.867 8.21 8.21 0 0 0 3 2.48Z'],
                ['Team off-sites', 'M13.5 6H5.25A2.25 2.25 0 0 0 3 8.25v10.5A2.25 2.25 0 0 0 5.25 21h10.5A2.25 2.25 0 0 0 18 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25'],
                ['Culture & values labs', 'M9.75 3.104v5.714a2.25 2.25 0 0 1-.659 1.591L5 14.5M9.75 3.104c-.251.023-.501.05-.75.082m.75-.082a24.301 24.301 0 0 1 4.5 0m0 0v5.714c0 .597.237 1.17.659 1.591L19.8 15.3M14.25 3.104c.251.023.501.05.75.082M19.8 15.3l-1.57.393A9.065 9.065 0 0 1 12 15a9.065 9.065 0 0 0-6.23-.693L5 14.5m14.8.8 1.402 1.402c1.232 1.232.65 3.318-1.067 3.611A48.309 48.309 0 0 1 12 21c-2.773 0-5.491-.235-8.135-.687-1.718-.293-2.3-2.379-1.067-3.61L5 14.5'],
                ['Activity challenges', 'm3.75 13.5 10.5-11.25L12 10.5h8.25L9.75 21.75 12 13.5H3.75Z'],
            ],
        ],
        [
            'n' => '04', 'k' => 'Retreats', 'sub' => 'Human-level',
            'desc' => 'Space to reflect, recharge, reconnect.',
            'long' => 'The full reset — space to reflect, recharge and reconnect with purpose, designed around your strategy. The Thriving Teams Index proves what moved.',
            'points' => ['Reflect & recharge', 'Reconnect with purpose', 'Measured with the TTI'],
            'pts' => [
                ['Reflect & recharge', 'Deliberate distance from the day-to-day, structured so it produces clarity.', 'M12 3v2.25m6.364.386-1.591 1.591M21 12h-2.25m-.386 6.364-1.591-1.591M12 18.75V21m-4.773-4.227-1.591 1.591M5.25 12H3m4.227-4.773L5.636 5.636M15.75 12a3.75 3.75 0 1 1-7.5 0 3.75 3.75 0 0 1 7.5 0Z'],
                ['Reconnect with purpose', 'The "why" gets rebuilt person by person — not laminated on a wall.', 'M9.813 15.904 9.374 17.472l-.439-1.568a4.5 4.5 0 0 0-3.09-3.09l-1.567-.439 1.568-.439a4.5 4.5 0 0 0 3.09-3.09l.438-1.568.44 1.568a4.5 4.5 0 0 0 3.089 3.09l1.568.438-1.568.44a4.5 4.5 0 0 0-3.09 3.089ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456Z'],
                ['Measured with the TTI', 'A before-and-after pulse of the team, so leadership acts on evidence.', 'M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 0 1 3 19.875v-6.75ZM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V8.625ZM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 0 1-1.125-1.125V4.125Z'],
            ],
            'tags' => [
                ['Leadership retreats', 'M12 21a9 9 0 0 0 9-9V6.75L12 3 3 6.75V12a9 9 0 0 0 9 9Z'],
                ['Retreat facilitation', 'M9 6.75V15m6-6v8.25m.503 3.498 4.875-2.437c.381-.19.622-.58.622-1.006V4.82c0-.836-.88-1.38-1.628-1.006l-3.869 1.934c-.317.159-.69.159-1.006 0L9.503 3.252a1.125 1.125 0 0 0-1.006 0L3.622 5.689C3.24 5.88 3 6.27 3 6.695V19.18c0 .836.88 1.38 1.628 1.006l3.869-1.934c.317-.159.69-.159 1.006 0l4.994 2.497c.317.158.69.158 1.006 0Z'],
                ['Bonding getaways', 'M6 12 3.269 3.125A59.769 59.769 0 0 1 21.485 12 59.768 59.768 0 0 1 3.27 20.875L5.999 12Zm0 0h7.5'],
                ['Reflection sessions', 'M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0 3.181 3.183a8.25 8.25 0 0 0 13.803-3.7M4.031 9.865a8.25 8.25 0 0 1 13.803-3.7l3.181 3.182m0-4.991v4.99'],
            ],
        ],
    ];
@endphp

    <style>
        .lab-mono { font-family: ui-monospace, SFMono-Regular, Menlo, monospace; }

        /* ---------- expanded-card micro-scenes (alive while .sc-run is on the card) ---------- */
        /* strategy: the calls arrive unranked, get reordered, one gets cut */
        /* the scope conducts the list: half-loop (1.5s) reorders, full loop (3s)
           stamps priorities, loop + quarter (3.75s) makes the cut */
        .sc-st-a, .sc-st-b, .sc-st-c { opacity: 0; }
        .sc-run .sc-st-a { animation: scStA 2.1s cubic-bezier(.3,.7,.3,1) both; }
        .sc-run .sc-st-b { animation: scStB 2.1s cubic-bezier(.3,.7,.3,1) both; }
        .sc-run .sc-st-c { animation: scStC 2.1s cubic-bezier(.3,.7,.3,1) both; }
        @keyframes scStA {
            0%, 6% { opacity: 0; transform: translateY(68px) translateX(-10px); }
            12% { opacity: 1; transform: translateY(68px) translateX(0); }
            71% { transform: translateY(68px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        @keyframes scStB {
            0% { opacity: 0; transform: translateY(0) translateX(-10px); }
            4% { opacity: 1; transform: translateY(0) translateX(0); }
            71% { transform: translateY(0); }
            100% { opacity: 1; transform: translateY(34px); }
        }
        @keyframes scStC {
            0%, 3% { opacity: 0; transform: translateY(34px) translateX(-10px); }
            8% { opacity: 1; transform: translateY(34px) translateX(0); }
            71% { transform: translateY(34px); }
            100% { opacity: 1; transform: translateY(68px); }
        }
        /* checkboxes: empty until the call is made */
        .sc-check svg { opacity: 0; transform: scale(.4); }
        .sc-run .sc-check { animation: scCheckFill .25s ease var(--d, 1.8s) both; }
        .sc-run .sc-check svg { animation: scCheckMark .28s cubic-bezier(.34,1.56,.64,1) calc(var(--d, 1.8s) + .08s) both; }
        @keyframes scCheckFill { to { background: #F26B21; border-color: #F26B21; } }
        @keyframes scCheckMark { to { opacity: 1; transform: scale(1); } }
        .sc-run .sc-check.sc-check-cut { animation-name: scCheckFillCut; }
        @keyframes scCheckFillCut { to { background: rgba(255,255,255,.14); border-color: transparent; } }
        .sc-tag-pop { opacity: 0; transform: scale(.4); }
        .sc-run .sc-tag-pop { animation: scTagPop .3s cubic-bezier(.34,1.56,.64,1) var(--d, 1.8s) both; }
        @keyframes scTagPop { to { opacity: 1; transform: scale(1); } }
        .sc-strike { transform: scaleX(0); transform-origin: left; }
        .sc-run .sc-strike { animation: scStrike .35s ease-out 3.75s both; }
        @keyframes scStrike { to { transform: scaleX(1); } }
        .sc-run .sc-dim { animation: scDim .4s ease 3.75s both; }
        @keyframes scDim { to { color: rgba(255, 255, 255, .35); } }
        .sc-sweep { opacity: 0; transition: opacity .4s ease .2s; }
        .sc-run .sc-sweep { opacity: 1; animation: scSpin 3s linear infinite; }
        @keyframes scSpin { to { transform: rotate(360deg) } }
        .sc-blip { opacity: .3; }
        .sc-run .sc-blip { animation: scBlip 3s linear infinite var(--bd, 0s); }
        @keyframes scBlip {
            0%, 6% { opacity: 1; box-shadow: 0 0 0 0 rgba(242,107,33,.65) }
            16% { box-shadow: 0 0 0 8px rgba(242,107,33,0) }
            17%, 100% { opacity: .35; box-shadow: 0 0 0 0 rgba(242,107,33,0) }
        }

        /* alignment: arrows wander in random headings, swing, settle into formation, then flow */
        .sc-arw { color: rgba(255,255,255,.5); transform: rotate(var(--r, 45deg)); }
        .sc-run .sc-arw { animation: scSettle 1.9s cubic-bezier(.45,.05,.35,1) var(--d, 0s) both; }
        @keyframes scSettle {
            0%   { transform: rotate(var(--r, 45deg)) translate(0, 0); color: rgba(255,255,255,.5); }
            30%  { transform: rotate(calc(var(--r, 45deg) * -0.7)) translate(var(--wx, 4px), var(--wy, -3px)); }
            55%  { transform: rotate(calc(var(--r, 45deg) * 0.3)) translate(calc(var(--wx, 4px) * -0.6), calc(var(--wy, -3px) * -0.6)); color: rgba(255,255,255,.65); }
            80%  { transform: rotate(calc(var(--r, 45deg) * -0.08)) translate(0, 0); }
            100% { transform: rotate(0deg) translate(0, 0); color: #F26B21; }
        }
        .sc-run .sc-flow { animation: scFlow 2.6s linear infinite var(--fd, 0s); }
        @keyframes scFlow { to { transform: translateX(34px) } }

        /* team building: the mesh draws itself, then a pulse circulates it */
        /* transitions live INSIDE .sc-run so removing the class snaps to zero instantly */
        .sc-net-line { stroke-dasharray: 1; stroke-dashoffset: 1; }
        .sc-run .sc-net-line { stroke-dashoffset: 0; transition: stroke-dashoffset .7s ease var(--d, 0s); }
        .sc-net-run { opacity: 0; }
        .sc-run .sc-net-run { opacity: 1; transition: opacity .4s ease 1.9s; animation: scNetRun 3.2s linear infinite; }
        /* nodes gather first, then the lines join them */
        .sc-node-g { transform: translate(var(--ox, 0px), var(--oy, 0px)); opacity: .45; }
        .sc-run .sc-node-g { transform: translate(0, 0); opacity: 1; transition: transform .7s cubic-bezier(.3,.7,.3,1) var(--gd, 0s), opacity .5s ease var(--gd, 0s); }
        @keyframes scNetRun { to { stroke-dashoffset: -100 } }
        .sc-run .sc-node { animation: scNodeBob var(--nd, 3s) ease-in-out infinite alternate; }
        @keyframes scNodeBob { to { transform: translateY(-3px) } }

        /* retreats: a fire that actually burns — flame flickers, embers rise */
        /* fire ignites from nothing, then the people gather inward */
        .sc-ignite { opacity: 0; scale: .15; transform-origin: 50% 100%; }
        .sc-run .sc-ignite { animation: scIgnite .55s cubic-bezier(.3,.7,.3,1) .15s both; }
        @keyframes scIgnite { to { opacity: 1; scale: 1 } }
        .sc-seat { opacity: 0; scale: .3; translate: var(--gx, 0px) var(--gy, 0px); }
        .sc-run .sc-seat { opacity: 1; scale: 1; translate: 0 0;
            transition: opacity .5s ease var(--d, 0s), scale .5s cubic-bezier(.34,1.56,.64,1) var(--d, 0s), translate .6s cubic-bezier(.3,.7,.3,1) var(--d, 0s); }
        @keyframes scGlow { 0%,100% { opacity: .7; scale: 1 } 50% { opacity: 1; scale: 1.18 } }
        .sc-glow { opacity: 0; }
        .sc-run .sc-glow { animation: scIgniteGlow .6s ease .15s both, scGlow 2.4s ease-in-out .85s infinite; }
        @keyframes scIgniteGlow { from { opacity: 0; scale: .2 } to { opacity: .7; scale: 1 } }
        .sc-fl-outer, .sc-fl-inner { transform-origin: 50% 100%; }
        .sc-run .sc-fl-outer { animation: scFlickA .38s ease-in-out infinite alternate; }
        .sc-run .sc-fl-inner { animation: scFlickB .29s ease-in-out infinite alternate; }
        @keyframes scFlickA { from { transform: scale(1, .95) rotate(-1.5deg) } to { transform: scale(1.06, 1.09) rotate(1.5deg) } }
        @keyframes scFlickB { from { transform: scale(.94, 1) rotate(2.5deg) } to { transform: scale(1.1, 1.14) rotate(-2.5deg) } }
        .sc-spark { opacity: 0; }
        .sc-run .sc-spark { animation: scSpark var(--sd, 2s) ease-out infinite calc(var(--so, 0s) + .8s); }
        @keyframes scSpark {
            0% { opacity: 0; transform: translate(0, 0) scale(1) }
            12% { opacity: 1 }
            100% { opacity: 0; transform: translate(var(--sx, 5px), -38px) scale(.4) }
        }

        @media (prefers-reduced-motion: reduce) {
            .sc-net-line, .sc-seat { transition: none; }
            .sc-run .sc-st-a { animation: none; opacity: 1; transform: translateY(0); }
            .sc-run .sc-st-b { animation: none; opacity: 1; transform: translateY(34px); }
            .sc-run .sc-st-c { animation: none; opacity: 1; transform: translateY(68px); }
            .sc-run .sc-tag-pop { animation: none; opacity: 1; transform: scale(1); }
            .sc-run .sc-strike { animation: none; transform: scaleX(1); }
            .sc-run .sc-dim { animation: none; color: rgba(255,255,255,.35); }
            .sc-run .sc-check { animation: none; background: #F26B21; border-color: #F26B21; }
            .sc-run .sc-check.sc-check-cut { background: rgba(255,255,255,.14); border-color: transparent; }
            .sc-run .sc-check svg { animation: none; opacity: 1; transform: scale(1); }
            .sc-run .sc-sweep, .sc-run .sc-blip, .sc-run .sc-flow, .sc-run .sc-net-run, .sc-run .sc-node,
            .sc-run .sc-fl-outer, .sc-run .sc-fl-inner, .sc-run .sc-spark { animation: none; }
            .sc-run .sc-glow { animation: none; opacity: .7; scale: 1; }
            .sc-run .sc-ignite { animation: none; opacity: 1; scale: 1; }
            .sc-node-g { transition: none; }
            .sc-run .sc-node-g { transform: translate(0, 0); opacity: 1; }
            .sc-run .sc-net-run { opacity: 1; }
            .sc-run .sc-arw { animation: none; transform: rotate(0); color: #F26B21; }
        }
    </style>

        <section class="relative py-14 md:py-20 bg-canvas text-content"
            x-data="{
                active: 0,
                jumping: false,
                rerun: true,
                _jt: null,
                replay() {
                    // expanded class stays; only the playing class flips off/on,
                    // so every scene restarts from the same zero point
                    this.rerun = false;
                    setTimeout(() => { this.rerun = true; }, 50);
                },
                jumpTo(i) {
                    if (this.active === i) return;
                    this.active = i;
                    this.jumping = true;
                    this.$refs['step' + i].scrollIntoView({ behavior: 'smooth', block: 'center' });
                    const onScroll = () => {
                        clearTimeout(this._jt);
                        this._jt = setTimeout(() => { window.removeEventListener('scroll', onScroll); this.jumping = false; }, 180);
                    };
                    window.addEventListener('scroll', onScroll);
                    onScroll();
                },
            }">
            <div class="absolute inset-0 bg-content/[0.03]"></div>

            <div class="max-w-7xl mx-auto px-4 md:px-8 relative">
                <div class="lg:grid grid-cols-12 gap-12">
                    {{-- title + description, then the line items --}}
                    <div class="col-span-5">
                        <h2 class="text-4xl lg:text-[2.85rem] font-bold uppercase leading-tight tracking-wide">
                            <span class="outline-text">We Facilitate </span>the Journey <span class="outline-text">from</span> the board <span class="outline-text">to</span> your team
                        </h2>
                        <p class="mt-3 text-base/loose opacity-70">
                            Great facilitation moves fluidly between altitudes &mdash; starting with
                            strategy setting all the way to building a capable team. We work with you through all the steps in between.
                        </p>

                        <div class="relative mt-6">
                            @foreach ($journey as $i => $j)
                                <div class="relative py-12 lg:min-h-[58vh] flex lg:items-center" x-ref="step{{ $i }}"
                                    x-intersect:enter.margin.-45%.0.-45%.0="jumping || (active = {{ $i }})">
                                    <div class="transition-opacity duration-300" x-bind:class="active === {{ $i }} ? 'opacity-100' : 'opacity-40'">
                                        <div class="flex items-center gap-3.5">
                                            <span class="size-8 rounded-lg border font-bold text-sm flex items-center justify-center flex-none transition-all duration-300"
                                                x-bind:class="active >= {{ $i }} ? 'bg-accent border-accent text-white shadow-md' : 'bg-card border-stroke text-content/40'">{{ $i + 1 }}</span>
                                            <h3 class="text-xl font-bold uppercase tracking-wide">{{ $j['k'] }}</h3>
                                        </div>
                                        <p class="mt-3.5 text-[15px]/relaxed opacity-70">{{ $j['long'] }}</p>

                                        <p class="mt-5 text-[11px] font-bold uppercase tracking-widest opacity-40">Goals</p>
                                        <ul class="mt-1 flex flex-col">
                                            @foreach ($j['pts'] as [$pt, $pd, $pic])
                                                <li class="flex items-start gap-3 py-3 border-b border-stroke last:border-0 text-[13.5px]/relaxed">
                                                    <span class="size-7 rounded-md bg-content/[0.03] dark:bg-content/5 border border-content/[0.1] text-primary flex items-center justify-center flex-none mt-0.5">
                                                        <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke-width="1.6" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $pic }}" /></svg>
                                                    </span>
                                                    <span>
                                                        <span class="font-semibold">{{ $pt }}.</span>
                                                        <span class="opacity-60">{{ $pd }}</span>
                                                    </span>
                                                </li>
                                            @endforeach
                                        </ul>

                                        <p class="mt-5 text-[11px] font-bold uppercase tracking-widest opacity-40">Formats</p>
                                        <div class="mt-2 flex flex-wrap gap-2">
                                            @foreach ($j['tags'] as [$tag, $tic])
                                                <span class="inline-flex items-center gap-1.5 rounded-full bg-content/[0.03] border border-content/10 px-3 py-1.5 text-xs font-semibold opacity-80">
                                                    {{-- <svg class="size-3.5 text-primary flex-none" fill="none" viewBox="0 0 24 24" stroke-width="1.7" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $tic }}" /></svg> --}}
                                                    {{ $tag }}
                                                </span>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    {{-- the stairs, unboxed, vertically centred in the sticky viewport --}}
                    <div class="hidden lg:block col-span-7">
                        <div class="sticky top-28 pb-12 h-[calc(100vh-125px)] flex items-center">
                            <div class="relative w-full">
                                <p class="absolute -top-6 left-0 text-[11px] font-bold uppercase tracking-widest text-accent/60 dark:text-content/40">High-level</p>
                                <p class="absolute -bottom-6 right-0 text-[11px] font-bold uppercase tracking-widest text-primary/80">Human-level</p>

                                <svg aria-hidden="true" class="absolute inset-0 w-full h-full" viewBox="0 0 100 100" preserveAspectRatio="none">
                                    <line x1="12" y1="8" x2="88" y2="94" stroke="#F26B21" stroke-opacity=".35" stroke-width="1.5"
                                        stroke-dasharray="3 4" vector-effect="non-scaling-stroke" />
                                </svg>

                                <div class="relative flex flex-col gap-12">
                                    @foreach ($journey as $i => $j)
                                        <div class="w-full sm:w-[62%] text-left rounded-xl border overflow-hidden transition-all duration-500"
                                            style="margin-left: {{ [0, 12, 25, 38][$i] }}%"
                                            x-on:click="jumpTo({{ $i }})"
                                            x-bind:class="(active === {{ $i }} ? 'bg-accent border-accent text-white shadow-xl cursor-default' : 'bg-card border-stroke scale-[0.98] opacity-80 cursor-pointer hover:opacity-100 hover:border-primary/30') + (active === {{ $i }} && rerun ? ' sc-run' : '')">

                                            {{-- header: list row ⇄ hairline title bar --}}
                                            <div class="flex items-center transition-all duration-500"
                                                x-bind:class="active === {{ $i }} ? 'gap-2.5 px-4 py-2.5 border-b border-white/10' : 'gap-3.5 p-4'">
                                                <span class="rounded-lg font-bold flex items-center justify-center flex-none transition-all duration-500"
                                                    x-bind:class="active === {{ $i }} ? 'size-6 text-[11px] bg-white/10 text-white' : 'size-9 text-sm bg-primary/10 text-primary'">{{ $i + 1 }}</span>
                                                <span class="min-w-0 flex-1">
                                                    <span class="block font-bold uppercase transition-all duration-500"
                                                        x-bind:class="active === {{ $i }} ? 'text-xs tracking-wider' : 'text-sm tracking-wide mt-0.5'">{{ $j['k'] }}</span>
                                                    <span class="block text-xs/relaxed opacity-60 truncate" x-show="active !== {{ $i }}">{{ $j['desc'] }}</span>
                                                </span>
                                                <button type="button" class="lab-mono text-[10px] text-white/40 hover:text-white/85 transition-colors flex items-center gap-1.5 flex-none"
                                                    x-show="active === {{ $i }}" x-cloak x-on:click.stop="replay()">
                                                    <svg class="size-[9px]" viewBox="0 0 12 14" fill="currentColor"><path d="M0 0l12 7-12 7z"/></svg>
                                                    replay
                                                </button>
                                            </div>

                                            {{-- media: opens 0fr → 1fr, no measuring --}}
                                            <div class="grid transition-[grid-template-rows] duration-500"
                                                style="transition-timing-function: cubic-bezier(.3,.7,.3,1)"
                                                x-bind:style="'grid-template-rows: ' + (active === {{ $i }} ? '1fr' : '0fr')">
                                                <div class="overflow-hidden min-h-0">
                                                    <div class="relative h-36">
                                                        @if ($i === 0)
                                                            {{-- strategy: radar sweep finds the calls; the ranked list settles --}}
                                                            <div class="h-full flex items-center gap-5 px-5">
                                                                <div class="relative size-24 flex-none" aria-hidden="true">
                                                                    <span class="absolute inset-0 rounded-full border border-white/15"></span>
                                                                    <span class="absolute inset-4 rounded-full border border-white/10"></span>
                                                                    <span class="absolute inset-8 rounded-full border border-white/10"></span>
                                                                    <span class="absolute left-1/2 top-1 bottom-1 w-px bg-white/10"></span>
                                                                    <span class="absolute top-1/2 left-1 right-1 h-px bg-white/10"></span>
                                                                    <span class="sc-sweep absolute inset-0 rounded-full" style="background: conic-gradient(from 0deg, rgba(242,107,33,.45), transparent 70deg)"></span>
                                                                    <span class="sc-blip absolute size-1.5 rounded-full bg-[#F26B21]" style="left: 72%; top: 23%; --bd: .33s"></span>
                                                                    <span class="sc-blip absolute size-1.5 rounded-full bg-[#F26B21]" style="left: 62%; top: 83%; --bd: 1.33s"></span>
                                                                    <span class="sc-blip absolute size-1.5 rounded-full bg-[#F26B21]" style="left: 15%; top: 44%; --bd: 2.33s"></span>
                                                                </div>
                                                                <div class="flex-1 min-w-0 relative h-[102px]">
                                                                    {{-- fixed dashed dividers: rows travel, the lines stay --}}
                                                                    <span aria-hidden="true" class="absolute inset-x-1 top-[34px] border-t border-dashed border-white/15"></span>
                                                                    <span aria-hidden="true" class="absolute inset-x-1 top-[68px] border-t border-dashed border-white/15"></span>

                                                                    {{-- enters last at the bottom, jumps to P1 --}}
                                                                    <div class="sc-st-a absolute inset-x-0 top-0 flex items-center gap-2.5 px-1.5 h-[34px]">
                                                                        <span class="sc-check size-4 rounded border border-white/30 flex items-center justify-center flex-none" style="--d: 3s">
                                                                            <svg class="size-3 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3.4" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                                                        </span>
                                                                        <span class="text-[11px] text-white/85 truncate">Enterprise first</span>
                                                                        <span class="sc-tag-pop lab-mono text-[9px] px-1.5 py-0.5 rounded flex-none ml-auto bg-[#F26B21] text-white" style="--d: 3s">P1</span>
                                                                    </div>
                                                                    {{-- enters first at the top, concedes to P2 --}}
                                                                    <div class="sc-st-b absolute inset-x-0 top-0 flex items-center gap-2.5 px-1.5 h-[34px]">
                                                                        <span class="sc-check size-4 rounded border border-white/30 flex items-center justify-center flex-none" style="--d: 3.15s">
                                                                            <svg class="size-3 text-white" fill="none" viewBox="0 0 24 24" stroke-width="3.4" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" /></svg>
                                                                        </span>
                                                                        <span class="text-[11px] text-white/85 truncate">New market pilot</span>
                                                                        <span class="sc-tag-pop lab-mono text-[9px] px-1.5 py-0.5 rounded flex-none ml-auto bg-white/10 text-white/50" style="--d: 3.15s">P2</span>
                                                                    </div>
                                                                    {{-- drops to the bottom and gets cut --}}
                                                                    <div class="sc-st-c absolute inset-x-0 top-0 flex items-center gap-2.5 px-1.5 h-[34px]">
                                                                        <span class="sc-check sc-check-cut size-4 rounded border border-white/30 flex items-center justify-center flex-none" style="--d: 3.75s">
                                                                            <svg class="size-3 text-white/60" fill="none" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor"><path stroke-linecap="round" d="M5.5 12h13" /></svg>
                                                                        </span>
                                                                        <span class="sc-dim relative inline-block text-[11px] text-white/85 truncate">
                                                                            Platform rebuild
                                                                            <span aria-hidden="true" class="sc-strike absolute left-0 top-1/2 w-full h-px bg-white/60"></span>
                                                                        </span>
                                                                        <span class="sc-tag-pop lab-mono text-[9px] px-1.5 py-0.5 rounded flex-none ml-auto bg-white/10 text-white/50" style="--d: 3.75s">cut</span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @elseif ($i === 1)
                                                            {{-- alignment: arrows wander, swing through headings, settle into formation, flow --}}
                                                            @php
                                                                $rots = [130, -75, 38, -160, 95, -40, 170, -110, 60, -145, 20, -85];
                                                                $wob = [[5, -4], [-6, 3], [4, 5], [-4, -6], [6, 2], [-5, -3], [3, 6], [-6, 4], [5, 3], [-3, -5], [6, -2], [-4, 5]];
                                                            @endphp
                                                            <div class="h-full flex flex-col justify-center gap-4 overflow-hidden px-2"
                                                                style="-webkit-mask-image: linear-gradient(90deg, transparent, black 15%, black 85%, transparent); mask-image: linear-gradient(90deg, transparent, black 15%, black 85%, transparent)">
                                                                @foreach ([0, 1, 2] as $row)
                                                                    <div class="sc-flow flex gap-[14px]" style="--fd: -{{ $row * 0.85 }}s; padding-left: {{ [0, 12, 6][$row] }}px">
                                                                        @for ($k = 0; $k < 12; $k++)
                                                                            @php $ix = ($row * 5 + $k) % 12; @endphp
                                                                            <svg class="sc-arw size-5 flex-none" style="--r: {{ $rots[$ix] }}deg; --wx: {{ $wob[$ix][0] }}px; --wy: {{ $wob[$ix][1] }}px; --d: {{ 0.1 + (($k * 7 + $row * 5) % 10) * 0.09 }}s"
                                                                                fill="none" viewBox="0 0 24 24" stroke-width="2.2" stroke="currentColor">
                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.5 12h16m0 0-5.5-5.5M19.5 12 14 17.5" />
                                                                            </svg>
                                                                        @endfor
                                                                    </div>
                                                                @endforeach
                                                            </div>
                                                        @elseif ($i === 2)
                                                            {{-- team building: the mesh draws itself, a pulse circulates it --}}
                                                            @php
                                                                $nNodes = [[30, 32], [75, 16], [128, 22], [172, 38], [62, 78], [138, 80]];
                                                                $nLinks = [[0, 1], [1, 2], [2, 3], [0, 4], [4, 5], [5, 3], [1, 4], [2, 5]];
                                                            @endphp
                                                            <div class="h-full px-5 py-3" aria-hidden="true">
                                                                <svg class="w-full h-full" viewBox="0 0 200 96" fill="none" preserveAspectRatio="xMidYMid meet">
                                                                    @foreach ($nLinks as $li => [$a, $b])
                                                                        <line class="sc-net-line" pathLength="1"
                                                                            x1="{{ $nNodes[$a][0] }}" y1="{{ $nNodes[$a][1] }}" x2="{{ $nNodes[$b][0] }}" y2="{{ $nNodes[$b][1] }}"
                                                                            stroke="rgba(255,255,255,.3)" stroke-width="1.2" style="--d: {{ 0.8 + $li * 0.09 }}s" />
                                                                    @endforeach
                                                                    <path class="sc-net-run" pathLength="100" d="M30,32 L75,16 L128,22 L172,38 L138,80 L62,78 Z"
                                                                        stroke="#F26B21" stroke-width="1.8" stroke-linecap="round" stroke-dasharray="10 90" />
                                                                    @foreach ($nNodes as $ni => $nd)
                                                                        @php $scatter = [[-16, -9], [7, -13], [11, -11], [17, -5], [-11, 13], [13, 11]]; @endphp
                                                                        <g class="sc-node-g" style="--ox: {{ $scatter[$ni][0] }}px; --oy: {{ $scatter[$ni][1] }}px; --gd: {{ $ni * 0.08 }}s">
                                                                            <circle class="sc-node" cx="{{ $nd[0] }}" cy="{{ $nd[1] }}" r="3.5" fill="rgba(255,255,255,.85)" style="--nd: {{ 2.4 + $ni * 0.35 }}s" />
                                                                        </g>
                                                                    @endforeach
                                                                </svg>
                                                            </div>
                                                        @else
                                                            {{-- retreats: the fire burns, embers rise, the circle forms --}}
                                                            <div class="relative h-full">
                                                                <span aria-hidden="true" class="sc-glow absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 size-20 rounded-full"
                                                                    style="background: radial-gradient(closest-side, rgba(242,107,33,.45), transparent 70%)"></span>

                                                                {{-- logs --}}
                                                                <span aria-hidden="true" class="absolute left-1/2 top-1/2 -translate-x-1/2 translate-y-[20px] w-11 h-[5px] rounded-full bg-[#5B3A21] rotate-[12deg]"></span>
                                                                <span aria-hidden="true" class="absolute left-1/2 top-1/2 -translate-x-1/2 translate-y-[20px] w-11 h-[5px] rounded-full bg-[#6B4426] -rotate-[12deg]"></span>

                                                                {{-- flame: layered silhouettes, independent flicker --}}
                                                                <span aria-hidden="true" class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-[74%]">
                                                                    <span class="sc-ignite relative block w-9 h-11">
                                                                        <svg class="sc-fl-outer absolute inset-x-0 bottom-0 w-9 h-11 text-[#F26B21]" viewBox="0 0 24 26" fill="currentColor"
                                                                            style="filter: drop-shadow(0 0 7px rgba(242,107,33,.55))">
                                                                            <path d="M12 25.5C7.2 25.5 4 22.4 4 18.6 4 15.4 6 13.3 7.7 11.3 9 9.7 10.2 8 10.6 5.4c.9 1.9 2 3.2 3.2 4.6 2.4 2.7 6.2 4.9 6.2 8.6 0 3.8-3.2 6.9-8 6.9Z" />
                                                                        </svg>
                                                                        <svg class="sc-fl-inner absolute left-1/2 -ml-[11px] bottom-0 w-[22px] h-8 text-[#FDBA74]" viewBox="0 0 24 26" fill="currentColor">
                                                                            <path d="M12 25.5c-2.9 0-4.8-1.9-4.8-4.3 0-2 1.3-3.3 2.3-4.6.8-1 1.5-2 1.8-3.5.6 1.2 1.3 2.1 2.1 3 1.2 1.4 2.6 2.8 2.6 5.1 0 2.4-1.9 4.3-4 4.3Z" />
                                                                        </svg>
                                                                    </span>
                                                                </span>

                                                                {{-- embers --}}
                                                                @foreach ([[-1, '7px', '1.7s', '0s'], [1, '-6px', '2.1s', '.5s'], [0, '3px', '1.9s', '1s'], [-2, '-9px', '2.3s', '.3s'], [2, '8px', '2s', '1.4s']] as [$off, $sx, $sd, $so])
                                                                    <span aria-hidden="true" class="sc-spark absolute size-[3px] rounded-full bg-[#FDBA74]"
                                                                        style="left: calc(50% + {{ $off * 3 }}px); top: 40%; --sx: {{ $sx }}; --sd: {{ $sd }}; --so: {{ $so }}"></span>
                                                                @endforeach

                                                                @php $gather = [[0, -14], [10, -10], [15, 0], [10, 10], [0, 14], [-10, 10], [-15, 0], [-10, -10]]; @endphp
                                                                @foreach ([[50, 12], [77, 22], [88, 50], [77, 78], [50, 88], [23, 78], [12, 50], [23, 22]] as $si => $seat)
                                                                    <span class="sc-seat absolute size-2 rounded-full bg-white/70 -translate-x-1/2 -translate-y-1/2"
                                                                        style="left: {{ $seat[0] }}%; top: {{ $seat[1] }}%; --gx: {{ $gather[$si][0] }}px; --gy: {{ $gather[$si][1] }}px; --d: {{ 0.85 + $si * 0.1 }}s"></span>
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
