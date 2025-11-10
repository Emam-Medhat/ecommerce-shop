<?php

namespace App\Providers;
use App\Models\Favorite;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;


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
        if (str_contains(request()->getHost(), 'ngrok')) {
        URL::forceScheme('https');
    }
    // مشاركة المفضلة مع كل القوالب
    View::composer('*', function ($view) {
        if (Auth::check()) {
            $favorites = Favorite::where('user_id', Auth::id())
                ->with('product')
                ->get();
        } else {
            $favorites = collect(); // مجموعة فاضية لو المستخدم مش داخل
        }

        $view->with('favorites', $favorites);
    });
       if (env('APP_ENV') !== 'local') {
        URL::forceScheme('https');
    }
    }
}
