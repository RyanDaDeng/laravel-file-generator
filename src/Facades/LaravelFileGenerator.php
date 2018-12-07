<?php

namespace TimeHunter\LaravelFileGenerator\Facades;

use Illuminate\Support\Facades\Facade;
use Illuminate\View\View;

/**
 * @method static void publish($template)
 * @method static View preview($template)
 * Class LaravelFileGenerator
 * @package TimeHunter\LaravelFileGenerator\Facades
 * @see \TimeHunter\LaravelFileGenerator\LaravelFileGenerator
 */
class LaravelFileGenerator extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'laravelfilegenerator';
    }
}
