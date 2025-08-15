<?php

declare(strict_types=1);

namespace Laravelcm\Subscriptions;

use Illuminate\Support\ServiceProvider;

final class SubscriptionServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/laravel-subscriptions.php', 'laravel-subscriptions'
        );
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__.'/../config/laravel-subscriptions.php' => config_path('laravel-subscriptions.php'),
            ], 'laravel-subscriptions-config');

            $this->publishes([
                __DIR__.'/../database/migrations/' => database_path('migrations'),
            ], 'laravel-subscriptions-migrations');
        }
    }
}
