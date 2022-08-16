<?php

namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use \App\Models\Post;

class PostApiController extends Controller {
    public function index() {
        $posts = Post::all();
        return response()->json($posts);
    }

    public function store(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'nickname' => 'required|string|max:16',
            'title' => 'required|string|max:255',
            'text' => 'required|string|max:255',

        ]);
        $post = new Post([
            'user_id' => $request->user_id,
            'nickname' => $request->nickname,
            'title' => $request->title,
            'text' => $request->text,
        ]);
        $post->save();
        return response()->json([
            'res' => '[OK] - Post Created.'
        ], 201);
    }
}
