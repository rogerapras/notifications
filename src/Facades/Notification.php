<?php namespace Eius\Notifications\Facades;

use Illuminate\Support\Facades\Facade;

class Notification extends Facade {
    /**
     * Get the binding in the IoC container
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'notifications';
    }
}