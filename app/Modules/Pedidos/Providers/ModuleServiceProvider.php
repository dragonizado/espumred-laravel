<?php

namespace App\Modules\Pedidos\Providers;

use Caffeinated\Modules\Support\ServiceProvider;

class ModuleServiceProvider extends ServiceProvider {
  /**
   * Bootstrap the module services.
   *
   * @return void
   */

  public function boot() {
    $this->loadTranslationsFrom(__DIR__.'/../Resources/Lang', 'pedidos');
    $this->loadViewsFrom(__DIR__.'/../Resources/Views', 'pedidos');
    $this->loadMigrationsFrom(__DIR__.'/../Database/Migrations', 'pedidos');
    $this->publishes([
      __DIR__.'/../Assets' => public_path('modules/pedidos'),
    ], 'modules');
  }

  /**
   * Register the module services.
   *
   * @return void
   */

  public function register() {
    $this->app->register(RouteServiceProvider::class);
  }
}
