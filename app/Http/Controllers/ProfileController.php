<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){
        return view('profile',[
            "title" => "Profile",
            "active" => 'profile',
            "css" => 'css/profile.css',
            "js" => '',
            "selling" => Book::where('seller_id', auth()->user()->id)->get(),
            "purchase" => Book::where('buyer_id', auth()->user()->id)->get(),
        ]);
    }

    public function edit(){
        return view('edit-profile',[
            "title" => "Edit Profile",
            "active" => 'edit profile',
            "css" => 'css/profile.css',
            "js" => '',
        ]);
    }
}
