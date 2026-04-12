<?php

namespace App\Fieldtypes;

use Statamic\Fields\Fieldtype;

class WlIconPicker extends Fieldtype
{
    protected static $handle = 'wl-icon-picker';

    protected $icon = 'generic-field';

    public function augment($value): ?string
    {
        return $value ?: null;
    }
}
