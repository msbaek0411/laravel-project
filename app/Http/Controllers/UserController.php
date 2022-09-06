<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // user 모델(db저장소) 에서 user 정보 다 가져오기

        return response()->json([
            'users' => $users
        ], 200);
    }
}