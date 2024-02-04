<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\Contracts\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Repositories\Event\EventRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //User
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        
        //Event
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
