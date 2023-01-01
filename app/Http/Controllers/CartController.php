<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Checkout;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itemuser = auth()->user()->id;
        $itemcart = Cart::where('user_id', $itemuser)->get();

        // ddd($itemcart);
        $subtotalcart = 0;

        foreach ($itemcart as $key => $value) {
            //dd($value);
            $subtotalcart = $subtotalcart + $value->total_price;
        }

        $totalcart = $subtotalcart + 9000;
                            
        $data = array(
            'title' => auth()->user()->user_name.' Cart',
            "active" => 'cart',
            "css" => 'css/cart.css',
            "js" => '',
            'itemcart' => $itemcart,
            'subtotal' => $subtotalcart,
            'total' => $totalcart,
            
        );

        return view('cart', $data);
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
     * @param  \App\Http\Requests\StoreCartRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCartRequest $request, Book $book)
    {

        $inputancart = [
            "book_id" => $book->id,
            "user_id" => auth()->user()->id, 
        ];
        
        $itemuser = auth()->user()->id;
        //$itemproduk = Book::findOrFail($book->book_id);
        // cek dulu apakah sudah ada shopping cart untuk user yang sedang login

        $validateBook = Book::where('id', $book->id)
                            ->where('user_id', $itemuser)
                            ->first();
        $validatecheckout = Checkout::where('book_id', $book->id)
                            ->first();

        
        if ($validateBook) {
            return back()->with('deleted', 'The book is yours. You cannot buy your own book.');
        } else {
            if ($validatecheckout) {
                return back()->with('deleted', 'The book is already sold for another buyer.');
            } else {
                $cart = Cart::where('book_id', $book->id)
                            ->where('user_id', $itemuser)
                            ->first();
    
                if ($cart) {
                    return back()->with('deleted', 'Book is already in the cart!');
                } else {
                    //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
                    
                    $qty_book = $book->book_quantity;
                    $total_price = $qty_book * $book->book_price;
    
                    $inputancart['qty'] = $qty_book;
                    $inputancart['total_price'] = $total_price;
    
                    // dd($inputancart);
                    
                    Cart::create($inputancart);
                    
                    return back()->with('success', 'Book is saved to cart!');
                    
                }
            }
            
        }
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCartRequest  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCartRequest $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $itemcart = Cart::destroy($cart->id);

        //dd($itemcart);
        if ($itemcart) {
            return back()->with('success', 'Cart deleted');
        } else {
            return back()->with('error', 'Cart failed to delete');
        }
    }
}
