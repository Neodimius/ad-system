<?php

namespace App\Providers;

use App\Interfaces\AdRepositoryInterface;
use App\Repositories\AdRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(AdRepositoryInterface::class, AdRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
