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
}
