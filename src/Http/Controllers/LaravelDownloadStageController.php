<?php

namespace Druc\LaravelDownloadStage\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class LaravelDownloadStageController
{
    public function show()
    {
        return view('download-stage::download-stage');
    }

    public function download()
    {
        try {
            Artisan::call('laravel-download-stage');

            return response()->download(storage_path('app/'.env('APP_NAME').'/download-stage.zip'));
        } catch (\Exception $e) {
            return 'Well... something went wrong: '.$e->getMessage();
        }
    }
} 