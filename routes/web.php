<?php

use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\User\FrontController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Request;


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

Route::get('/posts', [FrontController::class, 'allPosts'])->name('all.posts');


Route::get('/', 'App\Http\Controllers\User\FrontController@index');
Route::get('/about', 'App\Http\Controllers\User\FrontController@about');
Route::match(['get', 'post'], '/privacy-policy', 'App\Http\Controllers\User\FrontController@policy');
Route::match(['get', 'post'], '/cgu', 'App\Http\Controllers\User\FrontController@cgu');


Route::middleware('auth')->post('/like-toggle', [LikeController::class, 'toggle'])->name('like.toggle');


Route::prefix('auth')->group(function () {
    Route::match(['get', 'post'], '/register', 'App\Http\Controllers\User\AuthController@register');
    Route::match(['get', 'post'], '/login', 'App\Http\Controllers\User\AuthController@login');
    Route::match(['get', 'post'], '/forget-password', 'App\Http\Controllers\User\AuthController@forgetPassword');
    Route::match(['get', 'post'], '/reinitialize-password', 'App\Http\Controllers\User\AuthController@reinitializePassword');
    Route::get('/logout', 'App\Http\Controllers\User\AuthController@logout');
});

Route::prefix('posts')->group(function () {
    Route::match(['get', 'post'], '/details/{id}', 'App\Http\Controllers\User\FrontController@detailsPost')->name('details.post');
    Route::match(['get', 'post'], '/all', 'App\Http\Controllers\User\FrontController@allPosts');
    Route::match(['get', 'post'], '/blog', 'App\Http\Controllers\User\FrontController@allBlogs');
    Route::match(['get', 'post'], '/architecte', 'App\Http\Controllers\User\FrontController@allArchitectes');
    Route::match(['get', 'post'], '/societe', 'App\Http\Controllers\User\FrontController@allSocietes');
    Route::match(['get', 'post'], '/hebdo', 'App\Http\Controllers\User\FrontController@allHebdos');
});

Route::group(['middleware' => ['agent']], function () {
    Route::prefix('agent')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Agent\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Agent\DashboardController@index');

        Route::prefix('posts')->group(function () {
            Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Agent\PostController@index');
            Route::match(['get', 'post'], '/add', 'App\Http\Controllers\User\Agent\PostController@add');


        });
        Route::post('posts/{publication}/activate', [\App\Http\Controllers\User\Agent\PostController::class, 'activate'])
        ->name('posts.activate');



        Route::resource('posts', \App\Http\Controllers\User\Agent\PostController::class)
            ->only(['create', 'edit', 'update', 'destroy',])
            ->parameters([
                'posts' => 'publication'
            ]);
    });
});

Route::group(['middleware' => ['architecte']], function () {
    Route::prefix('architecte')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Architecte\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Architecte\DashboardController@index');

        Route::prefix('posts')->group(function () {
            Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Architecte\PostController@index');
            Route::match(['get', 'post'], '/add', 'App\Http\Controllers\User\Architecte\PostController@add');
        });
    });
});

Route::group(['middleware' => ['societe']], function () {
    Route::prefix('societe')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Societe\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Societe\DashboardController@index');

        Route::prefix('posts')->group(function () {
            Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Societe\PostController@index');
            Route::match(['get', 'post'], '/add', 'App\Http\Controllers\User\Societe\PostController@add');
        });
    });
});

Route::group(['middleware' => ['organe']], function () {
    Route::prefix('organe')->group(function () {
        Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Organe\DashboardController@index');
        Route::match(['get', 'post'], '/dashboard', 'App\Http\Controllers\User\Organe\DashboardController@index');

        Route::prefix('posts')->group(function () {
            Route::match(['get', 'post'], '', 'App\Http\Controllers\User\Organe\PostController@index');
            Route::match(['get', 'post'], '/add', 'App\Http\Controllers\User\Organe\PostController@add');
            Route::match(['get', 'post'], '/blog', 'App\Http\Controllers\User\Organe\PostController@indexBlog');
            Route::match(['get', 'post'], '/blog/add', 'App\Http\Controllers\User\Organe\PostController@addBlog');


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
    Route::match(['get', 'post'], 'login', 'App\Http\Controllers\Admin\AuthentificationController@login')->name('login');


    Route::group(['middleware' => ['admin','auth:admin']], function () {
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

        Route::resource('/blog', 'App\Http\Controllers\Admin\BlogPostsController');
        // Route::match(['get', 'post'], '/blog/delete/{id}', 'App\Http\Controllers\Admin\PostController@delete');
        // Route::match(['get', 'post'], '/blog/immo', 'App\Http\Controllers\Admin\PostController@immo');
        // Route::match(['get', 'post'], '/blog/auto', 'App\Http\Controllers\Admin\PostController@auto');
        // Route::match(['get', 'post'], '/blog/boost', 'App\Http\Controllers\Admin\PostController@boost');

        Route::match(['get', 'post'], '/users/clients', 'App\Http\Controllers\Admin\UserController@clients');
        Route::match(['get', 'post'], '/users/agents', 'App\Http\Controllers\Admin\UserController@agents');

        Route::get('/logout', 'App\Http\Controllers\Admin\DashboardController@logout');

    });
});

Route::get('/search', [SearchController::class, 'index'])->name('search.index');




// Routes des articles
// Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
// Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');






    // Route::resource('/blog', PostController::class);

    // Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
    Route::get('/blog/{post}', [PostController::class, 'show'])->name('blog.show');
    // Route::get('admin/blog/create', [PostController::class, 'create'])->name('posts.create');
    // Route::post('/blog', [PostController::class, 'store'])->name('blog.store');
    // Route::get('/blog/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
    // Route::put('/blog/{post}', [PostController::class, 'update'])->name('posts.update');
    // Route::delete('/blog/{post}', [PostController::class, 'destroy'])->name('posts.destroy');
    // Routes des commentaires
    Route::middleware('auth')->post('/blog/{post}/comments', [CommentController::class, 'store'])->name('comments.store');
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // Routes des "J'aime"
    Route::post('/blog/{post}/like', [LikeController::class, 'toggle'])->name('likes.toggle');

// ....... ...

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

    return "OKey.";
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



Route::post('/git-webhook', function () {
    // Optionnel : sécurité avec token ou IP
    if (Request::header('X-Hub-Signature') !== '9pQIF5q72Z513hU/NXdNC4WPUXeJyeNo8A==') abort(403);


    exec(base_path('../../deploy.sh'), $output);

    Log::info('Webhook triggered:', $output);

    return 'Deployed!';
});

