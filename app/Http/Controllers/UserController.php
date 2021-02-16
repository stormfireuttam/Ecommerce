<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    function login(UserStoreRequest $request) {
        $validated = $request->validated();
        $userObj = new User();
        $userObj->login($request);
        return redirect("/");
    }

    function register(UserStoreRequest $request) {
        $validated = $request->validated();

        $userObj = new User();
        $userObj->createUser($request);

        return redirect("/login");
    }
}
