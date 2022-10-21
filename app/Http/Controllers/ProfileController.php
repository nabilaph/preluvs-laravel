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

    public function edit(User $user){
        return view('edit-profile',[
            "title" => "Edit Profile",
            "active" => 'edit profile',
            "css" => 'css/profile.css',
            "js" => '',
            "user" => $user
        ]);
    }

    public function update(Request $request){

       $validatedData = $request->validate([
                        'user_name' => 'required|min:3|max:255',
                        'username' => 'required|min:3|max:255',
                        'email' => 'required|email:dns',
                        'user_phoneNumber' => 'required',
                        'user_address' => 'required',
                    ]);

       User::where('id', auth()->user()->id)
                ->update($validatedData);

       return redirect('/profile')->with('success', 'Profile detail has been saved.');
    }

}
