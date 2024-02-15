<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\User\Contracts\UserRepositoryInterface;
use App\Repositories\User\UserRepository;
use App\Repositories\Event\Contracts\EventRepositoryInterface;
use App\Repositories\Event\EventRepository;

use App\Repositories\Event\Contracts\EventCategoryRepositoryInterface;
use App\Repositories\Event\EventCategoryRepository;

use App\Repositories\Event\Contracts\EventFollowRepositoryInterface;
use App\Repositories\Event\EventFollowRepository;

use App\Repositories\Notification\Contracts\NotificationInterface;
use App\Services\EmailService;
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
        $this->app->bind(EventCategoryRepositoryInterface::class, EventCategoryRepository::class);
        //follow
        $this->app->bind(EventFollowRepositoryInterface::class, EventFollowRepository::class);

        //Notification
        $this->app->bind(NotificationInterface::class, EmailService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
