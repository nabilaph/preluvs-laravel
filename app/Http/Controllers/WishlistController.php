<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Wishlist;
use App\Http\Requests\StoreWishlistRequest;
use App\Http\Requests\UpdateWishlistRequest;
use App\Models\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $itemuser = $request->user();
        $itemwishlist = Wishlist::where('user_id', $itemuser->id)->get();

        //ddd($itemwishlist);
                            
        $data = array(
            'title' => 'Wishlist',
            "active" => 'wishlist',
            "css" => 'css/list-books.css',
            "js" => '',
            'itemwishlist' => $itemwishlist);

        return view('list-wishlist', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreWishlistRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreWishlistRequest $request, Book $book)
    {

        $wldata = [
            "user_id" => auth()->user()->id, 
            "book_id" => $book->id
        ];

        $itemuser = auth()->user()->id;

        $validateBook = Book::where('id', $book->id)
                            ->where('user_id', $itemuser)
                            ->first();

        if ($validateBook) {
            return back()->with('deleted', 'The book is yours. You cannot add your book to your wishlist.');
        } else {
            $validasiwishlist = Wishlist::where('book_id', $book->id)
                                        ->where('user_id', auth()->user()->id)
                                        ->first();
            if ($validasiwishlist) {
                $validasiwishlist->delete();//kalo udah ada, berarti wishlist dihapus
                return back()->with('success', 'Wishlist deleted.');
            } 
            else {
                
                Wishlist::create($wldata);

                return back()->with('success', 'Book is added to wishlist!');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function show(Wishlist $wishlist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function edit(Wishlist $wishlist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateWishlistRequest  $request
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateWishlistRequest $request, Wishlist $wishlist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Wishlist  $wishlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Wishlist $wishlist)
    {
        $itemwishlist = Wishlist::findOrFail($wishlist);
        if ($itemwishlist->delete()) {
            return redirect('/profile')->with('success', 'Wishlist berhasil dihapus');
        } else {
            return redirect('/profile')->with('error', 'Wishlist gagal dihapus');
        }
    }
}
