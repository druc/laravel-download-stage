<?php

namespace Druc\LaravelDownloadStage\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class LaravelDownloadStageCommand extends Command
{
    public $signature = 'laravel-download-stage';

    public $description = 'My command';

    public function handle(): int
    {
        config()->set('backup.backup.source.files.include', [
            storage_path('/'),
            public_path('/')
        ]);

        config()->set('backup.backup.source.files.relative_path', base_path());

        File::delete(storage_path('app/'.env('APP_NAME').'/download-stage.zip'));

        $this->call('backup:run', [
            '--filename' => 'download-stage.zip',
            '--disable-notifications' => true
        ]);

        return self::SUCCESS;
    }
}
