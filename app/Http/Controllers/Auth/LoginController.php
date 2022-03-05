<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function show(LoginRequest $request) {

        $fild = $request->all();

        if(!User::where('name', $fild['name'])->where('password', Hash::make($fild['password']))->exists()){
            return response()->json([
                'errors' =>
                    ['user' => ['Не верное имя или пароль']]
            ],422);
        }

        return response()->json([
            'login' => 'success'
        ], 201);
    }
}
