<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Checkout;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        $itemuser = auth()->user()->id;
        $itemcheckout = Checkout::where('user_id', $itemuser)->get();

        //dd($itemcheckout);
        return view('notifications',[
            "title" => "Notification",
            "active" => 'Notification',
            "css" => 'css/notification.css',
            "js" => '',
            "checkout" => $itemcheckout,

        ]); 
    }

    public function detail(Checkout $checkout)
    {
        $itemuser = auth()->user()->id;
        $itemcheckout = Checkout::where('id', $checkout->id)
                                ->where('user_id', $itemuser)
                                ->first();

        //dd($itemcheckout->all());
        return view('notification-detail',[
            "title" => "NotificationDetail",
            "active" => 'NotificationDetail',
            "css" => '/css/notification-detail.css',
            "js" => '',
            "notif" => $itemcheckout,

        ]);
    }

    public function editStatus(Checkout $checkout){

        $itemcheckout =$checkout->id;
        $itembook =$checkout->first();
        
        //dd($itembook->book_id);

        Checkout::where('id', $itemcheckout)
                ->update(['status' => 'PAID']);
        
        Book::where('id', $itembook->book_id)
                ->update(['isBookPaid' => 1]);

        return redirect('/profile')->with('success', 'Your order is paid. The seller will send your book(s).');
    }
}
