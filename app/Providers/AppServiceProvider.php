<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \View::composer('widgets.categories', function($view)
        {
            $view->with('categories', \App\Category::ordered()->get());
        });

        \View::composer(['widgets.categories', 'articles.index'], function($view)
        {
            $view->with('QUERY', \Request::query());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
