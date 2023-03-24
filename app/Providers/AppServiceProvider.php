<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;

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
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();

        view()->composer('layouts.site',function ($view){
            $categories=Category::all();
            $view->with(compact('categories'));
        });

        view()->composer('sections.popularPosts',function ($view){
            $popularPosts=Post::limit(4)->orderBy('view','DESC')->get();
            $view->with(compact('popularPosts'));
        });
    }
}
