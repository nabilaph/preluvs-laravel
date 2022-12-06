<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cart;
use App\Models\User;
use App\Models\Checkout;
use Illuminate\Http\Request;
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

        $subtotalcart = 0;

        foreach ($itemcart as $key => $value) {
            //dd($value);
            $subtotalcart = $subtotalcart + $value->total_price;
        }

        $totalcart = $subtotalcart + 9000;

                            
        $data = array(
            'title' => 'Checkout',
            "active" => '',
            "css" => 'css/checkout.css',
            "js" => '',
            'itemcart' => $itemcart,
            'subtotal' => $subtotalcart,
            'total' => $totalcart,
        );

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
    public function store(StoreCheckoutRequest $request)
    {
        //dd($request->all());

        $itemuser = auth()->user()->id;
        $no_invoice = Cart::where('user_id', $itemuser)->count();
        $invoice = 'INV'.str_pad(($no_invoice + 1),'3', '0', STR_PAD_LEFT);
        //$cart = Cart::where('user_id', $itemuser)->first();
        $cart = $request->cart_id;
        $book = $request->book_id;
        $payment_method = $request->payment_method;

        //dd($request);

        // $checkout = new Checkout();
        // $checkout->user_id = $itemuser;
        // $checkout->book_id = $cart->book_id;
        // $checkout->number_invoice = $invoice;
        // $checkout->receipt_no = '-';
        // $checkout->payment_method = $payment_method;
        // $checkout->status = 'UNPAID';

        // $checkout->save();

        $subtotal = 0;

        foreach ($book as $key => $value) {
            $checkout = new Checkout();
            $checkout->user_id = $itemuser;
            $checkout->book_id = $value;
            $checkout->number_invoice = $invoice;
            $checkout->receipt_no = '-';
            $checkout->payment_method = $payment_method;
            $checkout->status = 'UNPAID';
            
            $checkout->save();

            $bookitem = Book::where('id', $value)->first();

            $subtotal = $subtotal + ($bookitem->book_price * $bookitem->book_quantity);

        }

        $total = $subtotal + 9000;
        
        foreach ($cart as $key => $value) {
            
            $validasicart = Cart::where('id', $value)
                                        ->first();
            $validasicart->delete();
        }
        

            if ($checkout->save) {
                
                return redirect('/billing/'.$checkout)->with('delete', 'Checkout failed!');

            } else {
                
                return redirect('/billing')->with([
                    'success' => 'Checkout saved!',
                    'total' => $total,
                    'payment_method' => $payment_method,
                ]);
            }

    }

    public function displayreceipt(Book $book)
    {
        $itemcheckout = Checkout::where('book_id', $book->id)
                                    ->first();

        //dd($book->id);

        return view('enter-receipt',[
            "title" => "Enter Receipt",
            "active" => 'enter recipt',
            "css" => '/css/enter-receipt.css',
            "js" => '',
            "checkout" => $itemcheckout,
        ]);
    }

    public function storereceipt(UpdateCheckoutRequest $request, Checkout $checkout)
    {
        $receiptnum = $request->receiptNum;

        $updateddata = [
            "receipt_no" => $receiptnum
        ];

        $itemcheckout = Checkout::where('id', $checkout->id)
                        ->update($updateddata);
        

        if ($itemcheckout) {
            Checkout::where('id', $checkout->id)
                        ->update(['status'=> 'DELIVERED']);

            return redirect('/profile')->with('success', 'Receipt number has been saved.');
        } else {
             return redirect('/profile')->with('deleted', 'Receipt number failed to save.');
        }       

        
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function displaybilling()
    {
        $itemuser = auth()->user()->id;
        $payment_method = session()->get('payment_method');
        $total = session()->get('total');
        $subtotal = session()->get('subtotal');

        
        //dd($checkout);
                            
        $data = array(
            'title' => 'Billing',
            "active" => '',
            "css" => '/css/billing.css',
            "js" => '',
            'payment_method' => $payment_method,
            'subtotal' => $subtotal,
            'total' => $total,
        );

        return view('billing', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Checkout  $checkout
     * @return \Illuminate\Http\Response
     */
    public function editAddress(Request $request, User $user)
    {
        $itemuser = auth()->user()->id;

        $validatedData = $request->validate([
                        'user_name' => 'required|min:3|max:255',
                        'user_phoneNumber' => 'required',
                        'email' => 'required|email:dns',                        
                        'user_address' => 'required',
                    ]);

        $validasi = User::where('id', $itemuser)
                            ->update($validatedData);

        if ($validasi) {
            return back()->with('delete', 'Address change failed!');

        } else {
                
            return back()->with('success','Address changed');
        }
        
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
    }
}
