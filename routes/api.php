<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

//read
Route::get('/posts',function(){
   return Post::all();
});
//create
Route::post('/posts',function (){

    return Post::create([
            'name' =>request('name'),
            'title'=>request('title')
        ]);
});
//update
Route::put('/posts/{post}',function (Post $post){
     $post->update([
        'name'=>request('name'),
        'title'=>request('title')
    ]);
    return response()->json($post,200);
});
//delete
Route::delete('/posts/{post}',function (Post $post){
   $success= $post->delete($post);
   return response()->json($success,200);
});

