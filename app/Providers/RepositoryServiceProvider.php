<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(
            \App\Repositories\Task\TaskRepositoryInterface::class,
            \App\Repositories\Task\TaskRepository::class
        );
        $this->app->bind(
            \App\Repositories\Tag\TagRepositoryInterface::class,
            \App\Repositories\Tag\TagRepository::class
        );
        $this->app->bind(
            \App\Repositories\Project\ProjectRepositoryInterface::class,
            \App\Repositories\Project\ProjectRepository::class
        );
    }
}
