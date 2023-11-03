<?php

namespace abenevaut\Kite\App\Providers;

use abenevaut\Kite\Http\Exceptions\TooManyRequestsHttpException;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->configureRateLimiting();
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/webGuest.php');
        $this->loadRoutesFrom(__DIR__ . '/../../../routes/webAuthenticated.php');
    }

    private function configureRateLimiting(): void
    {
        RateLimiter::for('login', function (Request $request) {
            return Limit::perMinute(5)
                ->by($request->ip())
                ->response(function (Request $request, array $headers) {
                    throw new TooManyRequestsHttpException($request, $headers, 'Login rate limit exceeded');
                });
        });
    }
}
