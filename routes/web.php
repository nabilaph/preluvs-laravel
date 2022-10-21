<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Models\Book;
use App\Models\Category;
use Symfony\Component\HttpKernel\Profiler\Profile;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Homepage
Route::get('/', function () {
    return view('index',[
        "title" => "Home",
        "active" => 'home',
        "css" => 'css/style2.css',
        "js" => '',
        "books" => Book::all()->take(4)->sortByDesc('created_at')
    ]);
});

// Login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Logout
Route::post('/logout', [LoginController::class, 'logout']);

// Register
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);

// Profile
Route::get('/profile', [ProfileController::class, 'index'])->middleware('auth');

Route::get('/editprofile', [ProfileController::class, 'edit'])->middleware('auth');
//Route::post('/edit-profile', [ProfileController::class, 'edit'])->middleware('auth');

// upload book
Route::get('/uploadbook', [BookController::class, 'create'])->middleware('auth');
Route::get('/uploadbook/checkSlug', [BookController::class, 'checkSlug'])->middleware('auth');
Route::post('/uploadbook', [BookController::class, 'store'])->middleware('auth');

// delete book
Route::post('/profile/books/', [BookController::class, 'destroy'])->middleware('auth');

// show books
Route::get('/books', [BookController::class, 'show']);

// show genres
Route::get('/genres', function () {
    return view('genres',[
        "title" => "Genres",
        "active" => 'genres',
        "css" => 'css/genre-detail.css',
        "js" => '',
    ]);
});
Route::get('/genres/{category:category_slug}', function(Category $category){
    return view('list-books',[
        "title" => $category->category_name,
        "active" => '',
        "css" => '/css/list-books.css',
        "js" => '',
        "books" => $category->books,
        "category" => $category->category_name,
        "categories" => Category::all()
    ]);
});

// book detail
Route::get('/books/{book:book_id}', [BookController::class, 'detailBook']);

Route::get('/enter-receipt', function () {
    return view('enter-receipt',[
        "title" => "Enter Receipt",
        "active" => 'enter recipt',
        "css" => 'css/enter-receipt.css',
        "js" => '',
    ]);
})->middleware('auth');

Route::get('/notification', function () {
    return view('notifications',[
        "title" => "Notifications",
        "active" => 'notif',
        "css" => 'css/notification.css',
        "js" => 'js/notifications.js',
    ]);
})->middleware('auth');
