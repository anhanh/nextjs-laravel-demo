<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\BlogPost;
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

Route::get('/blogs', function () {
    return BlogPost::all();
});

Route::post('/blogs', function () {
    return BlogPost::create([
        'title' => request('title'),
        'content' => request('content'),
    ]);
});

Route::get('/blogs/{id}', function ($id) {
    return BlogPost::findOrFail($id);
});

Route::delete('/blogs/{blog}', function (BlogPost $blog) {
    $success = $blog->delete();
    return [
        'success'=>$success,
    ];
});
