<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index(){

    $ratings = Rating::select('user_id', DB::raw('round(AVG(ratingNum),1) as ratingavg'))
                        ->groupBy('user_id')
                        ->orderBy('ratingavg', 'desc')
                        ->limit(5)
                        ->get();
    //dd($ratings);

    return view('index',[
        "title" => "Home",
        "active" => 'home',
        "css" => 'css/style2.css',
        "js" => '',
        "books" => Book::orderBy('id', 'desc')->take(4)->get(),
        "categories" => Category::all()->take(4),
        "leaderboard" => $ratings
    ]);

    }
}
