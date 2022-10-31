<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function __construct(){
        $this->middleware('guest')->except('do_logout');
    }
    public function index(){
        return view('page.auth.main');
    }
    public function do_login(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required|min:6|max:30',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }else{
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
        }
        if(Auth::guard('web')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember))
        {
            return response()->json([
                'alert' => 'success',
                'message' => 'Welcome '. Auth::guard('web')->user()->name,
                'callback' => 'reload',
            ]);
        }else{
            return response()->json([
                'alert' => 'error',
                'message' => 'Sorry, it seems that some errors were detected, please try again.',
            ]);
        }
    }
    public function do_register(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'username' => 'required|unique:users|min:6|max:30',
            'password' => 'required|min:8',
        ]);

        if ($validator->fails()) {
            $errors = $validator->errors();
            if ($errors->has('name')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('name'),
                ]);
            }elseif ($errors->has('username')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('username'),
                ]);
            }elseif ($errors->has('password')) {
                return response()->json([
                    'alert' => 'error',
                    'message' => $errors->first('password'),
                ]);
            }
            
        }
        $user = new User;
        $user->name = Str::title($request->name);
        $user->username = $request->username;
        $user->password = Hash::make($request->password);
        $user->role = "m";
        $user->save();
        return response()->json([
            'alert' => 'success',
            'message' => 'Thanks for join us '. $request->name,
            'callback' => 'reload'
        ]);
    }
    public function do_logout(){
        $user = Auth::guard('web')->user();
        Auth::logout($user);
        return redirect()->route('home');
    }
}
