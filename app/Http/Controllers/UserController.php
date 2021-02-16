<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLoginRequest;
use App\Http\Requests\UserStoreRequest;
use App\User;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    function login(UserLoginRequest $request) {
        $userObj = new User();
        $user = $userObj->login($request);

        $password = $request->input('password');

        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }

        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }

        $request->session()->put('user', $user);
        return redirect("/");
    }

    function register(UserStoreRequest $request) {

        $userObj = new User();
        $userObj->createUser($request);

        return redirect("/login");
    }
}
