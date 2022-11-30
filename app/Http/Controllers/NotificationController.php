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
        $itemcheckout = Checkout::where('user_id', $itemuser)
                                ->orderBy('updated_at', 'desc')
                                ->get();

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

        //dd($itemcheckout->id);
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
        $itembook =$checkout->book_id;
        
        //dd($itembook);

        $statuschange = Checkout::where('id', $itemcheckout)
                                ->update(['status' => 'PAID']);
        
        if ($statuschange) {
            $bookpaid = Book::where('id', $itembook)
                                ->update(['isBookPaid' => 1]);

            //dd($bookpaid);
            if ($bookpaid) {
                return redirect('/profile')->with('success', 'Your order is paid. The seller will send your book(s).');
            } else {
                return back()->with('deleted', 'failed.');
            }
            
        } else {
            return back()->with('deleted', 'failed.');
        }
        
        
    }
}
