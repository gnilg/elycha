<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\Version\PublicationController;
use App\Http\Controllers\Api\NotificationController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('publications', PublicationController::class);
    Route::post('/pub/create', [PublicationController::class, 'createPublication']);
    Route::get('/pub/read', [PublicationController::class, 'getUserPublications']);
   // Route::delete('/pub/{id}/', [PublicationController::class, 'destroy']);
    Route::get('/pub-get/{id}/', [PublicationController::class, 'getPublicationbyId']);
    Route::post('/pub-update/{id}/', [PublicationController::class, 'editPublication']);
    Route::post('/pub/{publication}/like', [PublicationController::class, 'like']);
    Route::get('/pub-paginate-search-likes', [PublicationController::class, 'paginateSearchLikes']);
    Route::post('/store-token', [NotificationController::class, 'storeToken']);
    Route::post('/notify-user', [NotificationController::class, 'notify']);
    Route::post('/fetch-notifications', [NotificationController::class, 'fetchNotifications']);
    Route::get('/pub-search-favorite', [PublicationController::class, 'searchFavorite']);
    Route::post("/update-infos", "App\Http\Controllers\Api\Version\AuthController@updateUserInfo");

    Route::get('/pub-search-user', [PublicationController::class, 'searchUser']);
});

Route::post("callback-payment", "App\Http\Controllers\Api\ApiController@callbackPayment");

Route::get("/categories/{id}/{id2}", "App\Http\Controllers\Api\CategoryController@details");

Route::get("/check-version", "App\Http\Controllers\Api\ApiController@checkVersion");

Route::prefix('auth')->group(function () {
    Route::post("login", "App\Http\Controllers\Api\AuthController@login");
    Route::post("register", "App\Http\Controllers\Api\AuthController@register");
    Route::post("update-infos", "App\Http\Controllers\Api\AuthController@updateInfos");
    Route::post("update-password", "App\Http\Controllers\Api\AuthController@updatePassword");
    Route::post("check-password", "App\Http\Controllers\Api\AuthController@checkPassword");
    Route::post("send-code", "App\Http\Controllers\Api\AuthController@sendCode");
    Route::post("reinitialize-password", "App\Http\Controllers\Api\AuthController@reinitializePassword");


       //New version api implementation
       Route::post("login-new", "App\Http\Controllers\Api\Version\AuthController@login");
       Route::post("register-new", "App\Http\Controllers\Api\Version\AuthController@register");
       Route::post("request-password-reset-new", "App\Http\Controllers\Api\Version\AuthController@requestPasswordReset");
       Route::post("password-reset-new", "App\Http\Controllers\Api\Version\AuthController@resetPassword");
});

Route::get("posts/categories", "App\Http\Controllers\Api\PostController@categories");
Route::get("posts/all", "App\Http\Controllers\Api\PostController@all");
Route::get("posts/featured", "App\Http\Controllers\Api\PostController@featured");
Route::get("videos", "App\Http\Controllers\Api\PostController@videos");
Route::get("posts/paginate", "App\Http\Controllers\Api\PostController@allPosts");
Route::post("posts/search", "App\Http\Controllers\Api\PostController@search");
Route::post("posts/new-search", "App\Http\Controllers\Api\PostController@newSearch");

// New version Api implementation
Route::get('/pub-search', [PublicationController::class, 'search']);
Route::get('/pub-paginate', [PublicationController::class, 'paginate']);

Route::prefix('notifications')->group(function () {
    Route::get("all-clients", "App\Http\Controllers\Api\NotificationController@clients");
    Route::get("all-agents", "App\Http\Controllers\Api\NotificationController@agents");
});


Route::prefix('{id}')->group(function () {
    Route::post("posts/like", "App\Http\Controllers\Api\PostController@like");
    Route::post("posts/dislike", "App\Http\Controllers\Api\PostController@dislike");
    Route::get("details", "App\Http\Controllers\Api\AuthController@details");

    Route::prefix('chat')->group(function () {
        Route::get("/messages", "App\Http\Controllers\Api\ChatController@messages");
        Route::post("/send-message", "App\Http\Controllers\Api\ChatController@sendMessage");
        Route::post("/send-message-admin", "App\Http\Controllers\Api\ChatController@sendMessageAdmin");
    });

    Route::prefix('posts')->group(function () {
        Route::post("add", "App\Http\Controllers\Api\PostController@add");
        Route::get("all", "App\Http\Controllers\Api\PostController@myPosts");
        Route::get("favorites", "App\Http\Controllers\Api\PostController@favorites");
        Route::get("remove-photo/{id2}", "App\Http\Controllers\Api\PostController@deletePhoto");
        Route::prefix('{id2}')->group(function () {
            Route::get("view", "App\Http\Controllers\Api\PostController@view");
            Route::post("edit", "App\Http\Controllers\Api\PostController@edit");
            Route::post("boost", "App\Http\Controllers\Api\PostController@boost");
            Route::post("update-status", "App\Http\Controllers\Api\PostController@updateStatus");
            Route::get("delete", "App\Http\Controllers\Api\PostController@delete");
        });
    });


    Route::prefix('inquiries')->group(function () {
        Route::post("add", "App\Http\Controllers\Api\InquiryController@add");
        Route::get("all", "App\Http\Controllers\Api\InquiryController@myInquiries");
        Route::prefix('{id2}')->group(function () {
            Route::post("edit", "App\Http\Controllers\Api\InquiryController@edit");
            Route::get("delete", "App\Http\Controllers\Api\InquiryController@delete");
        });
    });
});
