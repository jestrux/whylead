@props([
    'stat' => '81%',
    'description' => 'of HR leaders planned to make changes to their ineffective performance management systems.',
])

<div
    class="sticky top-24 self-start border border-white/10 p-1.5 pr-6 rounded-lg overflow-hidden text-white inline-flex gap-2">
    <div class="absolute inset-0 bg-accent"></div>
    <div class="min-h-full flex-shrink-0 relative rounded-lg overflow-hidden">
        <div
            class="text-base/none tracking-wide font-semibold relative h-12 min-h-full min-w-14 px-2.5 text-white text-center bg-gradient-to-br from-primary to-accent flex items-center justify-center">
            {{ $stat }}
        </div>
    </div>

    <div class="my-1 relative text-sm/snug max-w-[340px] line-clamp-3">
        {{ $description }}
    </div>
</div>
