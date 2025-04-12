<?php

namespace App\Providers;

use App\Utils\MultiLanguageManager;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Event;
use BezhanSalleh\FilamentLanguageSwitch\Events\LocaleChanged;
use BezhanSalleh\FilamentLanguageSwitch\LanguageSwitch;

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
        config(['app.fallback_locale' => 'en']);


        LanguageSwitch::configureUsing(function (LanguageSwitch $switch) {
            $switch
                ->locales(['ar', 'en'])
                ->labels([
                    'ar' => 'Arabic',
                    'en' => 'English',
                ])
                ->flags([
                    'ar' => asset(url('/dashboard_assets/flags/ar.png')),
                    'en' => asset(url('/dashboard_assets/flags/en.png')),
                ])
                ->visible(); // also accepts a closure

        });

        Event::listen(fn (LocaleChanged $event) => MultiLanguageManager::changeLanguage($event->locale));
    }
}
