<?php
namespace VEximweb\Plugin\RSpamd;

use Filament\Panel;
use Illuminate\Support\ServiceProvider;

class RSpamdServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__ . '/../config/rspamd-plugin.php',
            'rspamd-plugin'
        );
        Panel::configureUsing(function (Panel $panel) {
            $panel->plugin(RSpamdPlugin::make());
        });
    }

    public function boot(): void
    {
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        //$this->loadViewsFrom(__DIR__ . '/../resources/views', 'rspamd');
        //$this->loadRoutesFrom(__DIR__ . '/../routes/web.php');
        $this->publishes([
            __DIR__ . '/../config/rspamd.php' => config_path('rspamd-plugin.php'),
        ], 'rspamd-plugin-config');
        if ($this->app->runningInConsole()) {
            $this->commands([

            ]);
        }
    }
}
