<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Category;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
   public function boot()
    {
        // كل ما يتم تحميل navbar component، هيرجع له categories تلقائ
        View::composer('components.navbar', function ($view) {
            $view->with('categories', Category::all());
        });
    }
}
