<?php

namespace App\Providers;

use App\Repositories\SwalInterface;
use App\Repositories\SwalRepository;
use App\Repositories\UploadFotoInterface;
use App\Repositories\UploadFotoRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SwalInterface::class,
            SwalRepository::class
        );
        $this->app->bind(
            UploadFotoInterface::class,
            UploadFotoRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
