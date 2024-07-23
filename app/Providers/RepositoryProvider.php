<?php

namespace App\Providers;

use App\Repositories\AdminInterface;
use App\Repositories\AdminRepo;
use App\Repositories\HomeInterface;
use App\Repositories\HomeRepo;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(HomeInterface::class, HomeRepo::class);
        $this->app->bind(AdminInterface::class, AdminRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
