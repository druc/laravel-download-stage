<?php

namespace Druc\LaravelDownloadStage\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \Druc\LaravelDownloadStage\LaravelDownloadStage
 */
class LaravelDownloadStage extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'laravel-download-stage';
    }
}
