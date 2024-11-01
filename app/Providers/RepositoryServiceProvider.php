<?php

namespace App\Providers;

use App\Http\Controllers\Task\TaskController;
use App\Interface\Auth\AuthBladeInterface;
use App\Interface\Auth\AuthLogicInterface;
use App\Interface\Home\HomeInterface;
use App\Interface\Task\TaskInterface;
use App\Repository\Auth\AuthBladeRepository;
use App\Repository\Auth\AuthLogicRepository;
use App\Repository\Home\HomeRepository;
use App\Repository\Task\TaskRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(AuthLogicInterface::class, AuthLogicRepository::class);
        $this->app->bind(AuthBladeInterface::class, AuthBladeRepository::class);
        $this->app->bind(HomeInterface::class, HomeRepository::class);
        $this->app->bind(TaskInterface::class, TaskRepository::class);


    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
