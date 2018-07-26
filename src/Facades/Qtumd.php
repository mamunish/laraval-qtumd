<?php

namespace Gegosoft\Qtum\Facades;

use Illuminate\Support\Facades\Facade;

class Qtumd extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'qtumd';
    }
}
