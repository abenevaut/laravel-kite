<?php

namespace abenevaut\Kite\App\Providers;

use Illuminate\Support\ServiceProvider;

class KiteServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadMigrationsFrom(__DIR__ . '/../../../migrations');
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');
    }
}
