import PodcastRefresh from './components/widgets/PodcastRefresh.vue';
import WlIconPicker from './components/fieldtypes/WlIconPicker.vue';

Statamic.booting(() => {
    Statamic.$components.register('podcast-refresh-widget', PodcastRefresh);
    Statamic.$components.register('wl-icon-picker-fieldtype', WlIconPicker);
});
