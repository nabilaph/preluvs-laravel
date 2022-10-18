<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;

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

Route::get('/edit-profile', function () {
    return view('edit-profile',[
        "title" => "Edit Profile",
        "active" => 'edit profile',
        "css" => 'css/profile.css',
        "js" => '',
    ]);
})->middleware('auth');

Route::get('/uploadbook', function () {
    return view('upload-book',[
        "title" => "Upload Book",
        "active" => 'upload',
        "css" => 'css/upload-book.css',
        "js" => '',
    ]);
})->middleware('auth');

Route::get('/genres', function () {
    return view('genres',[
        "title" => "Genres",
        "active" => 'genres',
        "css" => 'css/genre-detail.css',
        "js" => '',
    ]);
});

Route::get('/book-detail', function () {
    return view('book-detail',[
        "title" => "Book detail",
        "active" => 'book det',
        "css" => 'css/book-detail.css',
        "js" => '',
    ]);
});

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

Route::get('/list-books', function () {
    return view('list-books',[
        "title" => "Book List",
        "active" => 'book list',
        "css" => 'css/list-books.css',
        "js" => 'js/list-books.js',
    ]);
});