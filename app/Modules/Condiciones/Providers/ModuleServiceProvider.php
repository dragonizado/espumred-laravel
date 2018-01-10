<?php

namespace App\Modules\Condiciones\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the module services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'condiciones');
        $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'condiciones');
        $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'condiciones');
    }

    /**
     * Register the module services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(RouteServiceProvider::class);
    }
}
