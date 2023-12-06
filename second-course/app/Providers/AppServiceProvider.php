<?php

namespace App\Providers;

use App\Models\Support;
use App\Observers\SupportObserver;
use App\Repositories\Eloquent\SupportRepositoryEloquent;
use App\Repositories\SupportRepositoryInterface;
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
            SupportRepositoryEloquent::class
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
