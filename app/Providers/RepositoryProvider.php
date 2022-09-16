<?php

namespace App\Providers;

use App\Http\Contracts\IOrganizationService;
use App\Http\Contracts\IUserService;
use App\Http\Services\OrganizationService;
use App\Http\Services\UserService;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(IUserService::class, UserService::class);
        $this->app->bind(IOrganizationService::class, OrganizationService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
