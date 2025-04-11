<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;
use Src\IdentityAndAccess\User\Infrastructure\Repositories\EloquentUserRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, EloquentUserRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
