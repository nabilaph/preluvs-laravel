<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class RegisterController extends Controller
{
    public function index(){
        return view('login',[
        "title" => "Register",
        "active" => 'register',
        "css" => '',
        "js" => '',
    ]);
    }

    public function store(Request $request){

       $validatedData = $request->validate([
                        'user_name' => 'required|min:3|max:255',
                        'username' => 'required|min:3|max:255|unique:users',
                        'email' => 'required|email:dns|unique:users',
                        'password' => 'required|min:6|max:255',
                    ]);
        $validatedData['password'] = bcrypt($validatedData['password']);

       User::create($validatedData);

       return redirect('/login')->with('success', 'Registeration Successful! Please login.');
    }
}
