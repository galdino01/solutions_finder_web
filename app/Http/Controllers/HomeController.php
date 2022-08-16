<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Events\HomeEvent;
use App\Models\Post;
use App\Models\User;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index() {
        event(new HomeEvent(Auth::user()->nickname . " - index() -> HomeController."));
        return redirect(route('post.index'));
    }

    public function admin() {
        $users = User::all();
        $posts = Post::all();
        event(new HomeEvent(Auth::user()->nickname . " - admin() -> HomeController."));
        return view('home.admin', compact('posts', 'users'));
    }

    public function profile() {
        $user = Auth::user();
        event(new HomeEvent(Auth::user()->nickname . " - profile() -> HomeController."));
        return view('home.profile', compact('user'));
    }

    public function edit() {
        $user = Auth::user();
        return view('home.edit-user', compact('user'));
    }

    public function update(Request $request, User $user) {
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'min:4', 'max:16'],
            'email' => ['required', 'string', 'email', 'max:255'],
        ]);
        $user::find(Auth::user()->id)->update($validatedData);
        return redirect(route('profile'));
    }
}
