<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
//use League\Uri\Http;
use Illuminate\Support\Facades\Http;

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
            $response=Http::get('https://cbu.uz/uz/arkhiv-kursov-valyut/json/');
            $response=$response->json();
            $kursData['usd']=$response[0]['Rate'];
            $kursData['euro']=$response[1]['Rate'];
            $kursData['rub']=$response[2]['Rate'];
            $view->with(compact('categories','kursData'));
        });

        view()->composer('sections.popularPosts',function ($view){
            $popularPosts=Post::limit(4)->orderBy('view','DESC')->get();
            $view->with(compact('popularPosts'));
        });
    }
}
