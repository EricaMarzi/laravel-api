<?php

use App\Http\Controllers\Api\PostController;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


// Route::get('/posts', [PostController::class, 'index']);
// Route::get('/posts/{post}', [PostController::class, 'show']);
// Route::post('/posts', [PostController::class, 'store']);
// Route::delete('/posts/{post}', [PostController::class, 'destroy']);
// Route::put('/posts/{post}', [PostController::class, 'update']);

Route::apiResource('posts', Postcontroller::class)->only('index');
