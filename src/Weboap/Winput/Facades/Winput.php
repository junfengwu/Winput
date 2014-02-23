<?php namespace Weboap\Winput\Facades;

use Illuminate\Support\Facades\Facade;

class Winput extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'winput'; }

}