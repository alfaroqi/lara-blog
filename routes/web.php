<?php

use App\Http\Controllers\AdminCategoryController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;



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

Route::get('/', function () {
    return redirect('/post');
});

Route::get('/about', function () {
    return view('about', [
        "title" => "About",
        "name" => "Muhammad Khutub Alfaroqi",
        "email" => "alfaroqi@gmail.com",
        "img" => "profile.jpg"
    ]);
});



Route::get('/post', [PostController::class, 'index']);

// single post
Route::get('/post/{posting:slug}', [PostController::class, 'show']);

Route::get('/categories', function() {
    return view('categories', [
        'title' => 'Post Categories',
        'categories' => Category::all()
    ]);
});

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/dashboard', function() {
    return view('dashboard.index');
})->middleware('auth');


Route::get('/dashboard/posts/checkSlug', [DashboardPostController::class, 'checkSlug'])
->middleware('auth');


Route::get('/dashboard/categories/checkCatSlug', [AdminCategoryController::class, 'checkCatSlug'])
->middleware('auth');


Route::resource('/dashboard/posts', DashboardPostController::class)
->middleware('auth');

Route::resource('/dashboard/categories', AdminCategoryController::class)->except('show')
->middleware('is_admin');
 