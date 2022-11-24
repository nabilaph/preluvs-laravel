@extends('layouts\main')

@section('container')

<div class="main-wrapper">
    <div class="container">
        <div class="product-div shadow w-75 d-flex justify-content-around align-items-center p-4 mx-auto rounded">
            <div class="product-div-left">
                <div class="img-container text-center">
                    <img src="/{{ $notif->cart->book->book_pict }}" alt="watch">
                </div>
                <!-- {{-- <div class="hover-container">
                    <div><img src="/img/buk_1.jpg"></div>
                    <div><img src="/img/hujan_back.jpg"></div>
                </div> --}} -->
            </div>
            <div class="product-div-right">
                <h2 class="product-name fw-bold"> {{ $notif->cart->book->book_title }}</h2>
                <h4 class="product-price mb-3">Rp. {{ $notif->cart->book->book_price }}</h4>
                @switch($notif->status)
                @case('Belum Dibayar')
                <p class="product-description"> Your book has not been paid </p>
                <form action="/editstatus/{{ $notif->id }}" method="post">
                    @method('put')
                    @csrf
                    <div class="btn-groups">
                        <button type="submit" class="close-btn rounded">Already paid</button>
                    </div>
                </form>
                @break
                @case('Sudah Dibayar')
                <p class="product-description"> Your book has been paid</p>
                <div class="btn-groups">
                    <button type="button" class="close-btn rounded">Back</button>
                </div>
                @break
                @case('Sedang Dikirim')
                <p class="product-description"> Your book has been delivered. Your receipt number is {{
                    $notif->receipt_no }} </p>
                <div class="btn-groups">
                    <button type="button" class="close-btn rounded">Back</button>
                </div>
                @break
                @endswitch

                
            </div>
        </div>
    </div>
</div>

@endsection