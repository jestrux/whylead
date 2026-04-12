import PodcastRefresh from './components/widgets/PodcastRefresh.vue';

const WlIconPicker = {
    props: ['value', 'config', 'meta', 'handle', 'readOnly'],
    emits: ['update:value'],
    components: { UiInput: __STATAMIC__.ui.Input },
    template: `
        <ui-input
            :value="value"
            :placeholder="(config && config.placeholder) || 'Paste SVG path (d attribute)'"
            @input="$emit('update:value', $event.target.value)"
        >
            <template #prepend>
                <div class="-ms-3 h-full flex items-center px-2 border-e border-gray-200 dark:border-dark-900">
                    <svg v-if="value" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 text-gray-600 dark:text-gray-400">
                        <path :d="value" />
                    </svg>
                    <svg v-else viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" class="w-4 h-4 text-gray-300 dark:text-gray-600">
                        <rect x="3" y="3" width="18" height="18" rx="2" stroke-dasharray="3 3" />
                    </svg>
                </div>
            </template>
        </ui-input>
    `,
};

Statamic.booting(() => {
    Statamic.$components.register('podcast-refresh-widget', PodcastRefresh);
    Statamic.$components.register('wl-icon-picker-fieldtype', WlIconPicker);
});
