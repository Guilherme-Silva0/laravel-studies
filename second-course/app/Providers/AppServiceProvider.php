<?php

namespace App\Providers;

use App\Models\Support;
use App\Observers\SupportObserver;
use App\Repositories\Eloquent\SupportRepository;
use App\Repositories\Contracts\SupportRepositoryInterface;
use App\Repositories\Eloquent\ReplySupportRepository;
use App\Repositories\ReplyRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(
            SupportRepositoryInterface::class,
            SupportRepository::class
        );

        $this->app->bind(
            ReplyRepositoryInterface::class,
            ReplySupportRepository::class
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Support::observe(SupportObserver::class);
    }
}
