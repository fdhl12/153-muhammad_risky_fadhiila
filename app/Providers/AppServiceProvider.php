<?php

namespace App\Providers;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
    public function boot()
    {
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
}
