<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(){

    // $rating = DB::table('ratings')
    //              ->select('user_id', DB::raw('count(id) as total'))
    //              ->groupBy('user_id')
    //              ->select('user_id', DB::raw('round(avg(ratingNum),2) as totalrate'))
    //              //->select('user_id', DB::raw('avg(totalrate) as totalrate'))
    //              //->avg('totalrate')
    //              ->orderBy('totalrate', 'desc')
    //              ->get();
                 //->avg('totalrate');
    
                 //dd($rating);
    //$user = User::where('id', $rating->user_id)->get();
    

    return view('index',[
        "title" => "Home",
        "active" => 'home',
        "css" => 'css/style2.css',
        "js" => '',
        "books" => Book::all()->take(4),
        "categories" => Category::all()->take(4),
        //"leaderboard" => $rating
    ]);

    }
}
