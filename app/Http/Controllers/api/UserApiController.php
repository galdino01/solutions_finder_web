<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use \App\Models\User;

class UserApiController extends Controller {
    public function index() {
        $users = User::all();
        return response()->json($users);
    }
}
