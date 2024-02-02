<?php

namespace App\Providers;

use App\Repository\Product\Read\ReadProductRepository;
use App\Repository\Product\Read\ReadProductRepositoryInterface;
use App\Repository\Product\Write\WriteProductRepository;
use App\Repository\Product\Write\WriteProductRepositoryInterface;
use App\Repository\User\Write\RegisterProductRepositoryInterface;
use App\Repository\User\Write\RegisterRepository;
use Carbon\Laravel\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->app->bind(
            RegisterProductRepositoryInterface::class,
            RegisterRepository::class
        );
        $this->app->bind(
            WriteProductRepositoryInterface::class,
            WriteProductRepository::class
        );
        $this->app->bind(
            ReadProductRepositoryInterface::class,
            ReadProductRepository::class
        );
    }
}
