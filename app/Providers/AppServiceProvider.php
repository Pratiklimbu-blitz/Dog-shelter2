<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Guard;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Schema;
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
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot(Guard $auth)
    {
        $notification_count = 0;
        view()->composer('*', function($view) use ($auth, &$notification_count) {
            if (Schema::hasTable('notifications') && Auth::check()) {
                $user = Auth::user();
                $notification_count = $user->unreadNotifications->count();
            }
            \View::share('GLOBAL_CUSTOMER_NOTIFICATION', $notification_count);
        });
    }
}
