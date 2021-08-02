<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// Post
use App\Post;

class PostController extends Controller
{
    //
    public function index() {
        $posts = Post::all(); // !use App\Post!;
        return response()->json($posts);
    }

    // Router...
    public function show($slug) {

        $post = Post::where('slug', $slug)->first();

        return response()->json($post);

        // Postman
        // http://127.0.0.1:8000/api/posts/titolo-articolo-1

    }
}
