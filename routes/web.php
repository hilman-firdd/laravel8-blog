<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FrontController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


//Front
Route::get('/', [FrontController::class, 'index'])->name('front.index');
Route::get('/blogs', [FrontController::class, 'blogs'])->name('front.blogs');
Route::get('/blog-single/{slug}', [FrontController::class, 'blog'])->name('front.blog');

//Login dll
Auth::routes();

//Dashboard
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//blog dan kategori
Route::group(['middleware' => ['auth']], function() {
      Route::resources([
        'blog' => App\Http\Controllers\BlogController::class,
        'category' => App\Http\Controllers\CategoryController::class,
      ]);
    
      Route::get('/testimony/{id}', [App\Http\Controllers\TestimonyController::class, 'index'])->name('testimony.index');
      Route::get('/testimony/{id}/create', [App\Http\Controllers\TestimonyController::class, 'create'])->name('testimony.create');
      Route::post('/testimony', [App\Http\Controllers\TestimonyController::class, 'store'])->name('testimony.store');
      Route::get('/testimony/{id}/edit', [App\Http\Controllers\TestimonyController::class, 'edit'])->name('testimony.edit');
      Route::put('/testimony/{id}', [App\Http\Controllers\TestimonyController::class, 'update'])->name('testimony.update');
      Route::delete('/testimony/{id}', [App\Http\Controllers\TestimonyController::class, 'destroy'])->name('testimony.destroy');
});
