<?php

namespace abenevaut\Kite\App\Providers;

use abenevaut\Kite\Http\Exceptions\TooManyRequestsHttpException;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
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
        $this
            ->configureRateLimiting()
            ->loadRoutesFrom(__DIR__ . '/../../../routes/web.php');
    }

    private function configureRateLimiting(): self
    {
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)
                ->by($request->ip())
                ->response(function (Request $request, array $headers) {
                    throw new TooManyRequestsHttpException($request, $headers, 'Login rate limit exceeded');
                });
        });

        return $this;
    }
}
