<?php

namespace App\Providers;

use App\Models\Error\ErrorRepository;
use App\Models\Error\ErrorRepositoryInterface;
use App\Services\Error\ErrorService;
use App\Services\Error\ErrorServiceInterface;
use Illuminate\Support\ServiceProvider;

class ErrorServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(ErrorServiceInterface::class, ErrorService::class);
        $this->app->bind(ErrorRepositoryInterface::class, ErrorRepository::class);
    }
}
