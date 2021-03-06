<?php

namespace HS\LaravelInstaller;

use Illuminate\Support\ServiceProvider;

class InstallerProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        if (\File::exists(__DIR__.'/../vendor/autoload.php'))
        {
            include __DIR__.'/../vendor/autoload.php';
        }

        $this->app->router->group(['namespace' => 'HS\LaravelInstaller\App\Http\Controllers'],
            function(){
                require __DIR__.'/routes/web.php';
            }
        );

        $this->loadViewsFrom(__DIR__.'/resources/views', 'HS\LaravelInstaller');

        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        $kernel->pushMiddleware('HS\LaravelInstaller\App\Http\Middleware\MiddlewareTrigger');

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {


    }
}
