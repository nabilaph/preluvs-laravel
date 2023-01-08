<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Checkout;
use App\Models\Rating;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index(){

        $itemuser = auth()->user();
        $meanrating = User::ratingtotal($itemuser);
        $totalrating = Rating::where('user_id', $itemuser->id)->count();

        //dd($meanrating);
        $purchase = Checkout::where('user_id', $itemuser->id)->get();

        $selling = Book::where('user_id', $itemuser->id)->get();

        // dd($sellingbuyer);
        
        // dd($purchase->all());
        return view('profile',[
            "title" => "Profile",
            "active" => 'profile',
            "css" => 'css/profile.css',
            "js" => '',
            "selling" => $selling,
            "purchase" => $purchase,
            "rating" => $meanrating,
            "totalrating" => $totalrating
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
                        'user_pict' => 'image|file|max:3000',
                    ]);

        if($request->file('user_pict')){
            $validatedData['user_pict'] = $request->file('user_pict')->store('user-pics');
        }

       User::where('id', auth()->user()->id)
                ->update($validatedData);

       return redirect('/profile')->with('success', 'Profile detail has been saved.');
    }

    

    public function otheruser(User $user){

        // $rating = Rating::where('user_id', $user->id)
        //                 ->get();

        // $totalrow = $rating->count();
        // //dd($totalrow);
        // $totalrating = 0;
        
        // foreach ($rating as $key => $value) {
        //     $totalrating = $totalrating + $value->ratingNum;
        // }

        // $meanrating = round(($totalrating / $totalrow), 2);

        
        $meanrating = User::ratingtotal($user);
        $totalrating = Rating::where('user_id', $user->id)->count();
        //dd($meanrating);
                            
        return view('other-user2',[
            "title" => "$user->username",
            "active" => 'other-user',
            "css" => '/css/other-user.css',
            "js" => '',
            "user" => $user,
            "books" => Book::where('user_id', $user->id)->get(),
            "rating" => $meanrating,            
            "totalrating" => $totalrating
        ]);
    }

    

}
