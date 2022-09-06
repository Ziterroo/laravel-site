<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();
        View::composer(['main.category.all-category'], function ($view) {
            $view->with('categories', Category::withCount('posts')->orderByDesc('posts_count')->get());
        });
        View::composer('main.category.popular', function($view) {
//            if (!Cache::has('popular')) {
//                $populars = Cache::put('popular', Post::with('tags')->orderByDesc('views')->limit(7)->get(), 60*60*24);
//            }
//            $populars = Cache::get('popular');
            $view->with('populars', Post::with('tags')->orderByDesc('views')->limit(7)->get());
        });
    }
}
