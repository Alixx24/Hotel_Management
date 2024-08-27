<?php

namespace App\Providers;

use App\Repositories\AdminInterface;
use App\Repositories\AdminRepo;
use App\Repositories\HomeInterface;
use App\Repositories\HomeRepo;
use App\Repositories\HotelInterface;
use App\Repositories\HotelRepo;
use App\Repositories\TicketInterface;
use App\Repositories\TicketRepo;
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
        $this->app->bind(HotelInterface::class, HotelRepo::class);
        $this->app->bind(TicketInterface::class, TicketRepo::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
