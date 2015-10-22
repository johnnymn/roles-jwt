<?php

namespace Johnnymn\Sim\Roles;

use Illuminate\Support\ServiceProvider;

class RolesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/roles.php' => config_path('roles.php')
        ], 'config');

        $this->publishes([
            __DIR__ . '/migrations/' => base_path('/database/migrations')
        ], 'migrations');

        $this->publishes([
            __DIR__ . '/seeds/' => base_path('/database/seeds')
        ], 'seeds');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/config/roles.php', 'roles');
    }
}
