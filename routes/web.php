<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\Admin\CategoriesController;
use App\Http\Controllers\Admin\PostsController;
use App\Http\Controllers\Admin\TagsController;
use App\Http\Controllers\Admin\UsersController;
use App\Http\Controllers\Admin\DashboardController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/lang/{lang}', function ($lang) {
    session(['lang'=>$lang]);
    return back();
});

Route::get('/',[MainController::class,'index']);
Route::get('/category/{slug}',[MainController::class,'categoryPosts'])->name('categoryPosts');
Route::get('/posts/{slug}',[MainController::class,'postDetail'])->name('postDetail');
Route::get('/contact',[MainController::class,'contact'])->name('contact');
Route::post('/contact',[MainController::class,'store'])->name('store');
Route::get('/search',[MainController::class,'search'])->name('search');

Route::prefix('admin')->middleware(['auth'])->name('admin.')->group(function (){

    Route::get('/dashboard',[DashboardController::class,'index'])->name('dashboard');
    
    Route::resource('categories',CategoriesController::class);
    Route::resource('posts',PostsController::class);
    Route::resource('tags',TagsController::class);
    Route::resource('users',UsersController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
