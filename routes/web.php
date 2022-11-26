<?php

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use App\Models\Rating;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WishlistController;

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
Route::get('/', 'HomepageController@index');

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
Route::put('/editprofile', [ProfileController::class, 'update'])->middleware('auth');

// upload book
Route::get('/uploadbook', 'BookController@create')->middleware('auth');
//Route::get('/uploadbook/checkSlug', [BookController::class, 'checkSlug'])->middleware('auth');
Route::post('/uploadbook', 'BookController@store')->middleware('auth');

// delete book
Route::delete('/profile/books/{book:book_title}', [BookController::class, 'destroy'])->middleware('auth');

// edit book
Route::get('/profile/books/{book:book_title}/edit', [BookController::class, 'edit'])->middleware('auth');
Route::put('/profile/books/{book:book_title}', [BookController::class, 'update'])->middleware('auth');

// show books
Route::get('/books', [BookController::class, 'index']);

// search books
Route::get('/search', [BookController::class, 'index']);

// show genres
Route::get('/genres', function () {
    return view('genres',[
        "title" => "Genres",
        "active" => 'genres',
        "css" => 'css/genre-detail.css',
        "js" => '',
        "categories" => Category::all()
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
Route::get('/books/{book:id}', [BookController::class, 'detailBook']);

//Receipt
Route::get('/enter-receipt', function () {
    return view('enter-receipt',[
        "title" => "Enter Receipt",
        "active" => 'enter recipt',
        "css" => 'css/enter-receipt.css',
        "js" => '',
    ]);
})->middleware('auth');

//Notification
Route::get('/notification', function () {
    return view('notifications',[
        "title" => "Notifications",
        "active" => 'notif',
        "css" => 'css/notification.css',
        "js" => 'js/notifications.js',
    ]);
})->middleware('auth');

//Cart
Route::post('/cart/{book:id}','CartController@store')->middleware('auth');
Route::get('/cart','CartController@index')->middleware('auth');
Route::delete('/cartdel/{cart:id}', [CartController::class, 'destroy'])->middleware('auth');

// wishlist
Route::get('/wishlist', 'WishlistController@index')->middleware('auth');
Route::post('/wishlist/{book:id}', 'WishlistController@store')->middleware('auth');
// Route::get('/wishlist', '\App\Http\Controllers\WishlistController@index')->middleware('auth');
// Route::post('/wishlist/{book:book_id}', '\App\Http\Controllers\WishlistController@store')->middleware('auth');

// other user
Route::get('/user/{user:username}', [ProfileController::class, 'otheruser']);

//Checkout
Route::get('/checkout','CheckoutController@index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->middleware('auth');

//Rating
Route::post('/saverating/{user:id}', 'RatingController@store')->middleware('auth');

//Notification
Route::get('/notification','NotificationController@index')->middleware('auth');
//Route::post('/notification', 'NotificationController@store')->middleware('auth');

//Notificationdetail
Route::get('/notification/detail/{checkout:id}','NotificationController@detail')->middleware('auth');
Route::put('/editstatus/{checkout:id}','NotificationController@editStatus')->middleware('auth');
//Route::post('/notification-detail', 'NotificationDetailController@store')->middleware('auth');

//EnterReceipt
Route::get('/addreceipt/{book:id}','CheckoutController@displayreceipt')->middleware('auth');
Route::post('/addreceipt/{book:id}','CheckoutController@storereceipt')->middleware('auth');

Route::get('/billing','CheckoutController@displaybilling')->middleware('auth');