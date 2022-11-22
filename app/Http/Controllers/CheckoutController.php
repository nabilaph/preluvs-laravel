<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\Checkout;
use App\Http\Requests\StoreCheckoutRequest;
use App\Http\Requests\UpdateCheckoutRequest;

class CheckoutController extends Controller
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

        //ddd($itemwishlist);
                            
        $data = array(
            'title' => 'Checkout',
            "active" => '',
            "css" => 'css/checkout.css',
            "js" => '',
            'itemcart' => $itemcart);

        return view('checkout', $data);
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
     * @param  \App\Http\Requests\StoreCheckoutRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCheckoutRequest $request, Cart $cart)
    {
        //dd($cart->all());

        $itemuser = auth()->user()->id;
        $no_invoice = Cart::where('user_id', $itemuser)->count();
        $invoice = 'INV'.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT);
        $cart_id[] = $request->cart_id;

        dd($cart_id);

        $inputan = [
            "cart_id" => $cart, 
            "number_invoice" => $invoice,
            "payment_method" => $request->payment_method,
            "status" => 'Belum Dibayar'
        ];

        dd($request);

        $checkout = Checkout::where('cart_id', $cart->id)
                    ->first();

        if ($checkout) {
            return redirect('/profile')->with('success', 'Checkout already added!');
        } else {
            //nyari jumlah cart berdasarkan user yang sedang login untuk dibuat no invoice
            
            // $qty_book = $book->book_quantity;
            // $total_price = $qty_book * $book->book_price;

            // $inputancart['qty'] = $qty_book;
            // $inputancart['total_price'] = $total_price;

            // dd($inputancart);
            
            Checkout::create($inputan);
            
            return redirect('/profile')->with('success', 'Checkout added');
            
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function show(Checkout $checkout)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function edit(Checkout $checkout)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCheckoutRequest  $request
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Checkout $checkout)
    {
        //
    }
}
