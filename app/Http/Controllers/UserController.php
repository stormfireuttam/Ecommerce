<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{

    function login(Request $request) {

        //Adding Validations
        $validator = Validator::make($request->all(), [
            'email' => 'bail|required|string|email|max:30',
            'password' => 'bail|required|string',
            // your validation here...
        ]);

        if ($validator->fails()) {
            return redirect('/login')->withErrors($validator)->withInput();
        }

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', '=', $email)->first();
        if (!$user) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, please check email id']);
        }
        if (!Hash::check($password, $user->password)) {
            return response()->json(['success'=>false, 'message' => 'Login Fail, pls check password']);
        }
//        return response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
        $request->session()->put('user', $user);
        return redirect("/");
    }

    function register(Request $request) {
        //Adding Validations
        $this->validate($request, [
            'name' => 'bail|required|string|max:20',
            'email' => 'bail|required|string|email|max:30',
            'password' => 'bail|required|string',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect("/login");
    }
}
