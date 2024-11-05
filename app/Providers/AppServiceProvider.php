<?php

declare(strict_types=1);

namespace App\Providers;

use App\Services\UserService;
use App\Services\UserServiceInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->singleton(UserServiceInterface::class, UserService::class);
    }

    public function boot(): void
    {
    }
}
