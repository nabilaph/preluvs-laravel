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
        //dd($request->all());

        $itemuser = auth()->user()->id;
        $no_invoice = Cart::where('user_id', $itemuser)->count();
        $invoice = 'INV'.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT);
        $cart = $request->cart_id;
        $payment_method = $request->payment_method;
        
        foreach ($cart as $key => $value) {
            $checkout = new Checkout();
            $checkout->user_id = $itemuser;
            $checkout->cart_id = $value;
            $checkout->number_invoice = $invoice;
            $checkout->receipt_no = 1;
            $checkout->payment_method = $payment_method;
            $checkout->status = 'Belum Dibayar';
            $checkout->save();
        }
        

            if ($checkout->save) {
                return redirect('/profile')->with('success', 'Checkout already added!');
            } else {
                
                return redirect('/profile')->with('success', 'Checkout saved!');
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
