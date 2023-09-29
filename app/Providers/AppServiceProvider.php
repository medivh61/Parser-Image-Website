<?php

namespace App\Providers;

use App\Services\ParserService;
use App\Services\ParserServiceContract;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        $this->app->singleton(ParserServiceContract::class, ParserService::class);
    }
}
