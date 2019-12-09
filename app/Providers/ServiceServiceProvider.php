<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     */
    public function boot()
    {
    }

    /**
     * Register services.
     */
    public function register()
    {
        $this->app->bind(
            \App\Services\Contracts\UserServiceContract::class,
            \App\Services\UserService::class
        );
        $this->app->bind(
            \App\Services\Contracts\ItemServiceContract::class,
            \App\Services\ItemService::class
        );
        $this->app->bind(
            \App\Services\Contracts\TransactionServiceContract::class,
            \App\Services\TransactionService::class
        );
    }
}
