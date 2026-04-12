<?php

namespace App\Providers;

use App\Fieldtypes\WlIconPicker;
use App\Widgets\PodcastRefresh;
use Illuminate\Support\ServiceProvider;
use Statamic\Facades\Collection;
use Statamic\Facades\CP\Nav;
use Statamic\Facades\Site;
use Statamic\Statamic;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Statamic::vite('app', [
            'input' => [
                'resources/js/cp.js',
                'resources/css/cp.css',
            ],
            'hotFile' => public_path('cp-hot'),
            'buildDirectory' => 'vendor/app',
        ]);

        WlIconPicker::register();
        PodcastRefresh::register();

        Nav::extend(function ($nav) {
            $nav->remove('Content', 'Collections', 'Pages');

            $nav->content('Pages')
                ->route('collections.show', 'pages')
                ->icon('page')
                ->order(1)
                ->children(function () {
                    return Collection::find('pages')
                        ->structure()
                        ->in(Site::default()->handle())
                        ->flattenedPages()
                        ->map(fn ($page) => Nav::item($page->title())->url($page->editUrl()));
                });
        });
    }
}
