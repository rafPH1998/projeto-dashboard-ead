<?php

namespace App\Providers;

use App\Repositories\Eloquent\{
    UserRepository,
    CourseRepository,
    ModuleRepository,
    LessonRepository,
    ReplyRepository,
    SupportRepository,
};

use App\Repositories\{
    UserRepositoryInterface,
    CourseRepositoryInterface,
    ModuleRepositoryInterface,
    LessonRepositoryInterface,
    ReplyRepositoryInterface,
    SupportRepositoryInterface,

};

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(
            UserRepositoryInterface::class,
            UserRepository::class,
        );

        $this->app->singleton(
            CourseRepositoryInterface::class,
            CourseRepository::class,
        );

        $this->app->singleton(
            ModuleRepositoryInterface::class,
            ModuleRepository::class,
        );

        $this->app->singleton(
            LessonRepositoryInterface::class,
            LessonRepository::class,
        );

        $this->app->singleton(
            SupportRepositoryInterface::class,
            SupportRepository::class,
        );

        $this->app->singleton(
            ReplyRepositoryInterface::class,
            ReplyRepository::class,
        );
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
