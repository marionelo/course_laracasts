<?php

use App\Models\Category;
use App\Models\Post;
use \App\Models\User;
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

Route::get('/', function () {

    // Una manera de poder hacer una consulta a la base de datos de lo que se ejcuta
    // \Illuminate\Support\Facades\DB::listen(function ($query) {
    //     logger($query->sql);
    // });

    //'posts' => Post::latest('published_at')->with(['category', 'author'])->get()
    return view('posts.index', [
        'posts' => Post::latest('published_at')->paginate(6), // porque el modelo post lo agrega como propiedad
        'categories' => Category::all()
    ]);
});

Route::get('/posts/{post:slug}', function (Post $post) {
    return view('post', [
        'post' => $post,
        'categories' => Category::all()
    ]);
});

Route::get('/categories/{category:slug}', function (Category $category) {
//        'posts' => $category->posts->load(['category', 'author'])
    return view('posts.index', [
        'posts' => $category->posts, // porque el modelo post lo agrega como propiedad
        'categories' => Category::all()
    ]);
});

Route::get('/authors/{author:username}', function (User $author) {
        // 'posts' => $author->posts->load(['category', 'author'])
    return view('posts', [
        'posts' => $author->posts, // porque el modelo post lo agrega como propiedad
        'categories' => Category::all()
    ]);
});
