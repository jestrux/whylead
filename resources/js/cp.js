import PodcastRefresh from './components/widgets/PodcastRefresh.vue';

Statamic.booting(() => {
    Statamic.$components.register('podcast-refresh-widget', PodcastRefresh);
});
