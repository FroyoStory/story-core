<?php

namespace Story\Core;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;

class CoreServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->register(\Jenssegers\Agent\AgentServiceProvider::class);
        $loader = AliasLoader::getInstance();

        $this->app->singleton('navigation', function() {
            return new Navigation;
        });
        $this->app->singleton('hook', function() {
            return new Hook;
        });

        $loader->alias('Agent', \Jenssegers\Agent\Facades\Agent::class);
        $loader->alias('Configuration', Models\ConfigurationRepository::class);
        $loader->alias('Navigation', Facades\NavigationFacade::class);
        $loader->alias('Hook', Facades\HookFacade::class);
    }

    public function register()
    {

    }
}
