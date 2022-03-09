<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function show(LoginRequest $request) {

        $fild = $request->all();

        if(!Auth::attempt($fild, true)){
            return response()->json([
                'errors' =>
                    ['user' => ['Не верное имя или пароль.']]
            ],422);
        }

        return response()->json([
            'login' => 'Вы успешно авторизовались.'
        ], 201);
    }
    public function userInfo(){
        $user = Auth::user();
        return response()->json([
            $user
        ], 201);
    }
    public function logout(){
        Auth::logout();
    }
}
