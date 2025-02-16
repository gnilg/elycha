<?php

use App\Http\Controllers\Admin\NotificationController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Route::get('/', 'App\Http\Controllers\User\FrontController@index');
Route::get('/about', 'App\Http\Controllers\User\FrontController@about');
Route::match(['get', 'post'], '/privacy-policy', 'App\Http\Controllers\User\FrontController@policy');
Route::match(['get', 'post'], '/cgu', 'App\Http\Controllers\User\FrontController@cgu');

Route::prefix('auth')->group(function () {
    Route::match(['get', 'post'], '/register', 'App\Http\Controllers\User\AuthController@register');
    Route::match(['get', 'post'], '/login', 'App\Http\Controllers\User\AuthController@login');
    Route::match(['get', 'post'], '/forget-password', 'App\Http\Controllers\User\AuthController@forgetPassword');
    Route::match(['get', 'post'], '/reinitialize-password', 'App\Http\Controllers\User\AuthController@reinitializePassword');
    Route::get('/logout', 'App\Http\Controllers\User\AuthController@logout');
});

Route::prefix('posts')->group(function () {
    Route::match(['get', 'post'], '/details/{id}', 'App\Http\Controllers\User\FrontController@detailsPost');
    Route::match(['get', 'post'], '/all', 'App\Http\Controllers\User\FrontController@allPosts');
});

Route::group(['middleware' => ['agent']], function () {
    Route::prefix('agent')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Agent\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Agent\DashboardController@index');

        Route::prefix('posts')->group(function () {
            Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Agent\PostController@index');
            Route::match(['get', 'post'], '/add', 'App\Http\Controllers\User\Agent\PostController@add');
        });
    });
});

Route::group(['middleware' => ['client']], function () {
    Route::prefix('client')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Client\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Client\DashboardController@index');
        Route::match(['get', 'post'], '/profile', 'App\Http\Controllers\User\UserController@profile');
        Route::match(['get', 'post'], '/update-password', 'App\Http\Controllers\User\UserController@updatePassword');
        Route::match(['get', 'post'], '/profile', 'App\Http\Controllers\User\UserController@profile');
        Route::match(['get', 'post'], '/update-password', 'App\Http\Controllers\User\UserController@updatePassword');
    });
});

Route::prefix('user')->group(function () {
    Route::match(['get', 'post'], '/profile', 'App\Http\Controllers\User\UserController@profile');
    Route::match(['get', 'post'], '/update-password', 'App\Http\Controllers\User\UserController@updatePassword');
});


Route::prefix('admin')->group(function () {
    Route::match(['get', 'post'], '', 'App\Http\Controllers\Admin\AuthentificationController@login');
    Route::match(['get', 'post'], 'login', 'App\Http\Controllers\Admin\AuthentificationController@login');


    Route::group(['middleware' => ['admin']], function () {
        Route::get('/dashboard', 'App\Http\Controllers\Admin\DashboardController@index');
        Route::match(['get', 'post'], '/change-password', 'App\Http\Controllers\Admin\DashboardController@changePassword');
        Route::match(['get', 'post'], '/profile', 'App\Http\Controllers\Admin\DashboardController@profile');

        Route::match(['get', 'post'], '/notifications', 'App\Http\Controllers\Admin\NotificationController@show');
        Route::match(['get', 'post'], '/notifications/add', 'App\Http\Controllers\Admin\NotificationController@add');
        Route::match(['get', 'post'], '/notifications/edit/{id}', 'App\Http\Controllers\Admin\NotificationController@edit');
        Route::match(['get', 'post'], '/notifications/delete/{id}', 'App\Http\Controllers\Admin\NotificationController@delete');

        Route::match(['get', 'post'], '/admins', 'App\Http\Controllers\Admin\AdminController@show');
        Route::match(['get', 'post'], '/admins/add', 'App\Http\Controllers\Admin\AdminController@add');
        Route::match(['get', 'post'], '/admins/edit/{id}', 'App\Http\Controllers\Admin\AdminController@edit');
        Route::match(['get', 'post'], '/admins/delete/{id}', 'App\Http\Controllers\Admin\AdminController@delete');

        Route::match(['get', 'post'], '/categories', 'App\Http\Controllers\Admin\CategoryController@show');
        Route::match(['get', 'post'], '/categories/add', 'App\Http\Controllers\Admin\CategoryController@add');
        Route::match(['get', 'post'], '/categories/edit/{id}', 'App\Http\Controllers\Admin\CategoryController@edit');
        Route::match(['get', 'post'], '/categories/delete/{id}', 'App\Http\Controllers\Admin\CategoryController@delete');

        Route::match(['get', 'post'], '/videos', 'App\Http\Controllers\Admin\VideoController@show');
        Route::match(['get', 'post'], '/videos/add', 'App\Http\Controllers\Admin\VideoController@add');
        Route::match(['get', 'post'], '/videos/edit/{id}', 'App\Http\Controllers\Admin\VideoController@edit');
        Route::match(['get', 'post'], '/videos/delete/{id}', 'App\Http\Controllers\Admin\VideoController@delete');


        Route::match(['get', 'post'], '/inquiries', 'App\Http\Controllers\Admin\InquiryController@show');
        Route::match(['get', 'post'], '/chat', 'App\Http\Controllers\Admin\DashboardController@chat');


        Route::match(['get', 'post'], '/posts', 'App\Http\Controllers\Admin\PostController@show');
        Route::match(['get', 'post'], '/posts/delete/{id}', 'App\Http\Controllers\Admin\PostController@delete');
        Route::match(['get', 'post'], '/posts/immo', 'App\Http\Controllers\Admin\PostController@immo');
        Route::match(['get', 'post'], '/posts/auto', 'App\Http\Controllers\Admin\PostController@auto');
        Route::match(['get', 'post'], '/posts/boost', 'App\Http\Controllers\Admin\PostController@boost');

        Route::match(['get', 'post'], '/users/clients', 'App\Http\Controllers\Admin\UserController@clients');
        Route::match(['get', 'post'], '/users/agents', 'App\Http\Controllers\Admin\UserController@agents');


        Route::get('/logout', 'App\Http\Controllers\Admin\DashboardController@logout');
    });
});



// For others functionality
Route::get('/migrate-fresh', function () {

    Artisan::call('migrate:fresh');

    Artisan::call('db:seed');

    /*Artisan::call('ide-helper:models -R');*/

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});

Route::get('/clear-cache', function () {

    Artisan::call('config:cache');

    Artisan::call('config:clear');

    Artisan::call('cache:clear');

    Artisan::call('route:clear');

    Artisan::call('view:clear');

    Artisan::call('clear-compiled');

    return "OK.";
});
