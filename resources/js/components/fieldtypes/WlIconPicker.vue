<template>
    <div class="flex items-center gap-3">
        <div class="flex-none w-10 h-10 rounded-lg border border-gray-200 bg-gray-50 flex items-center justify-center">
            <svg v-if="value" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"
                stroke-linecap="round" stroke-linejoin="round" class="w-6 h-6 text-gray-600">
                <path :d="value" />
            </svg>
            <svg v-else viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-6 h-6 text-gray-300">
                <rect x="3" y="3" width="18" height="18" rx="2" stroke-dasharray="3 3" />
            </svg>
        </div>

        <input
            type="text"
            class="input-text flex-1"
            :placeholder="(config && config.placeholder) || 'Paste SVG path (d attribute)'"
            :value="value"
            @input="$emit('update:value', $event.target.value)"
        />
    </div>
</template>

<script>
export default {
    props: ['value', 'config', 'meta', 'handle', 'readOnly'],
    emits: ['update:value'],
};
</script>
