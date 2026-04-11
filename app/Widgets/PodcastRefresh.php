<?php

namespace App\Widgets;

use Statamic\Widgets\VueComponent;
use Statamic\Widgets\Widget;

class PodcastRefresh extends Widget
{
    public static $handle = 'podcast_refresh';

    public function component(): mixed
    {
        return VueComponent::render('podcast-refresh-widget');
    }
}
