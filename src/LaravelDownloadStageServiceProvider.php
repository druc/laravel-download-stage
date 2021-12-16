<?php

namespace Druc\LaravelDownloadStage;

use Druc\LaravelDownloadStage\Commands\LaravelDownloadStageCommand;
use Druc\LaravelDownloadStage\Http\Controllers\LaravelDownloadStageController;
use Illuminate\Support\Facades\Route;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class LaravelDownloadStageServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-download-stage')
            ->hasConfigFile()
            ->hasViews()
            ->hasMigration('create_laravel-download-stage_table')
            ->hasCommand(LaravelDownloadStageCommand::class);
    }

    public function packageRegistered()
    {
        Route::get('download-stage', [LaravelDownloadStageController::class, 'show']);
        Route::post('download-stage', [LaravelDownloadStageController::class, 'download']);
    }
}
