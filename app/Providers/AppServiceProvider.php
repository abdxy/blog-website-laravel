<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\repositories\ArticleRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('ArticleRepo', function ($app) {
            return new ArticleRepository();
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
