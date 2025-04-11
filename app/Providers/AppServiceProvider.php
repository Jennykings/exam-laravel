<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\IdentityAndAccess\User\Domain\Contracts\UserRepositoryContract;
use Src\IdentityAndAccess\User\Infrastructure\Repositories\EloquentUserRepository;
use Src\CustomerManagement\Customer\Domain\Contracts\CustomerRepositoryContract;
use Src\CustomerManagement\Customer\Infrastructure\Repositories\EloquentCustomerRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryContract::class, EloquentUserRepository::class);
        $this->app->bind(
            CustomerRepositoryContract::class,
            EloquentCustomerRepository::class
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
