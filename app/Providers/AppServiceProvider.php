<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Support\Facades\RateLimiter;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Konfigurasi rate limiting
        $this->configureRateLimiting();

        // Membuat View Composer untuk semua view
        View::composer('*', function ($view) {
            $authUser = Auth::user();
            if ($authUser) {
                // Jika user telah login, maka ubah nama menjadi huruf besar
                $authUser->name = Str::upper($authUser->name);
            }
            $view->with('authUser', $authUser);
        });
    }

    /**
     * Configure the rate limiters for the application.
     */
    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function ($request) {
            return Limit::perMinute(60)->by($request->user()?->id ?: $request->ip());
        });
    }
}
