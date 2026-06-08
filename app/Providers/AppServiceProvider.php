<?php

namespace App\Providers;

use Filament\Facades\Filament;
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
    public function boot(): void
    {
        \Illuminate\Support\Facades\Event::listen(
            \Illuminate\Notifications\Events\NotificationSent::class,
            \App\Listeners\SendWhatsAppOnDatabaseNotification::class
        );

//        Filament::serving(function () {
//            if (app()->getLocale() == 'ar') {
//                Filament::setLayoutDirection('rtl');
//            }
//        });
    }
}
