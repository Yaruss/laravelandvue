<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use http\Env\Response;
use Illuminate\Http\Request;
use App\Models\User;
use App\Http\Requests\Auth\RegistrationRequest;


class RegistrationController extends Controller
{
    public function show(RegistrationRequest $request) {

        $fild = $request->all();

        if(User::where('email', $fild['email'])->orWhere('name', $fild['name'])->exists()){
            return response()->json([
                'errors' =>
                    ['user' => ['Такой пользователь уже сушествует']]
            ],422);
        }

        $user = User::create($fild);

        return response()->json([
            'registration' => 'success'
        ], 201);
    }
}
