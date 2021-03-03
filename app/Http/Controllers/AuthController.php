<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register(Request $request) {
        //get data
        $data = $request->only('email','phone','password','check');
        //validate
        $validator = Validator::make($data,[
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|min:11|max:13',
            'password' => 'required',
            'check' => 'required'
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(["error" => $validator->errors()->toArray()],422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        //check if a registered user has same phone number
        if(!empty(User::where('phone',$data['phone'])->first())) {
            if($request->ajax()) {
                return response()->json(["error" => "Phone number already exists!"],422);
            }else{
                return redirect()->back()->withErrors("Phone number already exists!")->withInput();
            }
        }

        //create new user
        $user = User::create([
            "email" => $data['email'],
            "phone" => $data['phone'],
            "password" => Hash::make($data['password'])
        ]);

        if(\Auth::attempt($request->only('email', 'password'))) {
            if($request->ajax()) {
                return response()->json(["link" => "home"],200);
            }else{
                return redirect("/home");
            }
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "kindly login!"],400);
            }else{
                return redirect()->back()->withErrors("kindly login!")->withInput();
            }
        }
        
    }

    public function login(Request $request) {
        //get data
        $data = $request->only('email','password');
        //validate
        $validator = Validator::make($data,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validator->fails()) {
            if($request->ajax()) {
                return response()->json(["error" => $validator->errors()->toArray()],422);
            }else{
                return redirect()->back()->withErrors($validator)->withInput();
            }
        }

        //check if a user email exists
        $user = User::where('email',$data['email'])->first();
        if(empty($user)) {
            if($request->ajax()) {
                return response()->json(["error" => "Email doesn't exists!"],422);
            }else{
                return redirect()->back()->withErrors("Email doesn't exists!")->withInput();
            }
        }

        //check password
        if(!Hash::check($data['password'],$user->password)) {
            if($request->ajax()) {
                return response()->json(["error" => "Wrong Password!"],422);
            }else{
                return redirect()->back()->withErrors("Wrong Password!")->withInput();
            }
        }

        if(\Auth::attempt($data)) {
            if($request->ajax()) {
                return response()->json(["link" => "home"],200);
            }else{
                return redirect("home");
            }
        }else{
            if($request->ajax()) {
                return response()->json(["error" => "kindly login!"],400);
            }else{
                return redirect()->back()->withErrors("kindly login!")->withInput();
            }
        }
    }

    public function logout() {
        \Auth::logout();
        return redirect('login');
    }
}
