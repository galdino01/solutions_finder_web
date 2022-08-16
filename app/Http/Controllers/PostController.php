<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Events\HomeEvent;
use Illuminate\Support\Facades\Auth;

use \App\Models\Post;

class PostController extends Controller {
    public function __construct() {
        $this->middleware(['auth', 'accessLevel:1']);
    }

    public function index() {
        $posts = Post::all();
        event(new HomeEvent(Auth::user()->nickname . " - index() -> PostController."));
        return view('home.index', compact('posts'));
    }

    public function create() {
        event(new HomeEvent(Auth::user()->nickname . " - create() -> PostController."));
        return view('home.create');
    }

    public function show() {
        event(new HomeEvent(Auth::user()->nickname . " - show() -> PostController."));
        return redirect(route('post.index'));
    }

    public function edit(Post $post) {
        event(new HomeEvent(Auth::user()->nickname . " - edit() -> PostController."));
        if ($post->user_id == Auth::user()->id) {
            return view('home.create', compact('post'));
        } else {
            return redirect(route('post.index'));
        }
    }

    public function store(StorePostRequest $request) {
        event(new HomeEvent(Auth::user()->nickname . " - store() -> PostController."));
        $post = new Post();
        $post->title = $request->title;
        $post->text = $request->text;
        $post->nickname = $request->nickname;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect(route('post.index'));
    }

    public function update(StorePostRequest $request, Post $post) {
        event(new HomeEvent(Auth::user()->nickname . " - update() -> PostController."));
        $post = $post;
        $post->title = $request->title;
        $post->text = $request->text;
        $post->nickname = $request->nickname;
        $post->user_id = $request->user_id;
        $post->save();
        return redirect(route('post.index'));
    }

    public function destroy(Post $post) {
        event(new HomeEvent(Auth::user()->nickname . " - delete() -> PostController."));
        $post->delete();
        return redirect(route('post.index'));
    }
}
