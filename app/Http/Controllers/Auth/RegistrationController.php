<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Auth\RegistrationRequest;


class RegistrationController extends Controller
{
    public function show(RegistrationRequest $request) {

        return response()->json([
            'registration' => 'success'
        ], 201);
    }
}
