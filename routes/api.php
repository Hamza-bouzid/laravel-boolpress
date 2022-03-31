<?php

use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\CategoryController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Rotte Publiche
//Route::get("/posts", "Api\PostController@index");
Route::get('posts' , [PostController::class, 'index']);
Route::get('posts/search/{title}' , [PostController::class, 'search']);
Route::get('posts/{slug}' , [PostController::class, 'show']);
Route::get('categories' , [CategoryController::class, 'index']);
Route::get('categories/{slug}' , [CategoryController::class, 'show']);
//Route::resource('posts', PostController::class);

// Rotte Protette
Route::group(['middleware' => ['auth:sanctum']], function () {
    //Route::get('posts/search/{title}' , [PostController::class, 'search']);
    //Route::get('posts/{id}' , [PostController::class, 'show']);
});
