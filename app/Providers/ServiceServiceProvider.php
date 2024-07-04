<?php

namespace App\Providers;

use App\Interfaces\Service\Department\DepartmentServiceInterface;
use App\Interfaces\Service\Statistics\StatisticsServiceInterface;
use App\Interfaces\Service\Task\TaskServiceInterface;
use App\Interfaces\Service\User\UserServiceInterface;
use App\Services\Department\DepartmentService;
use App\Services\Statistics\StatisticsService;
use App\Services\Task\TaskService;
use App\Services\User\UserService;
use Illuminate\Support\ServiceProvider;

class ServiceServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserServiceInterface::class,UserService::class);
        $this->app->bind(DepartmentServiceInterface::class,DepartmentService::class);
        $this->app->bind(TaskServiceInterface::class,TaskService::class);
        $this->app->bind(StatisticsServiceInterface::class,StatisticsService::class);
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
