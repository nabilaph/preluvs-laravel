<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile',[
        "title" => "Profile",
        "active" => 'profile',
        "css" => 'css/profile.css',
        "js" => '',
    ]);
    }

    public function edit(){
        
    }
}
