@extends('layouts.main')

@section('container')

<div class="wrapper">
    <div class="d-flex justify-content-center align-items-center mb-3 section-margin">
        <h2 class="text-center fw-bolder">{{ auth()->user()->user_name }} 's Cart</h2>
    </div>

    @if(session()->has('success'))
    <div class="alert alert-success mt-3 text-center" role="alert">
        {{ session('success') }}
    </div>
    @endif

    @if(session()->has('deleted'))
    <div class="alert alert-danger mt-3 text-center" role="alert">
        {{ session('deleted') }}
    </div>
    @endif

    <div class="project section-margin">
        <div class="shop">
            @if ($itemcart->count())
            @foreach ($itemcart as $cart)
            <div class="box shadow-lg">
                <img src="{{ $cart->book->book_pict }}" alt="">
                <div class="content">
                    <h3 class="fw-bold">{{ $cart->book->book_title }}</h3>
                    <h4>Price: IDR. {{ $cart->book->book_price }}</h4>
                    <p class="unit">Quantity: <input value="{{ $cart->book->book_quantity }}"></p>
                    <form action="/cartdel/{{ $cart->id }}" method="post" class="w-100 d-flex align-items-end">
                        @csrf
                        @method("DELETE")
                        <button type="submit" class="btn btn-danger d-flex justify-content-around align-items-center"
                            onclick="return confirm('Are you sure want to remove this item?')">
                            <i class='bx bx-trash mr-5'></i>
                            <span class="btn2">Remove</span></button>
                    </form>
                </div>
            </div>
            @endforeach
            @else
            <div class="col text-center">
                <div class="alert alert-secondary text-center" role="alert">Nothing here...</div>
            </div>
            @endif
        </div>
        <div class="right-bar shadow-lg">
            <p><span>Subtotal</span> <span>$120</span></p>
            <hr>
            <p><span>Tax (5%)</span> <span>$20</span></p>
            <hr>
            <p><span>Shipping</span> <span>$70</span></p>
            <hr>
            <p><span>Total</span> <span>$210</span></p>

            <form action="/checkout" method="get" class="w-100">
                @csrf
                @if($itemcart->count())
                <button type="submit"
                    class="nav-link btn-prim border-0 me-lg-3 mt-3 d-flex align-items-center justify-content-center w-100">
                    <i class='fa fa-shopping-cart me-2'></i> Checkout
                </button>
                @else
                <button type="submit"
                    class="nav-link btn-prim border-0 me-lg-3 mt-3 d-flex align-items-center justify-content-center w-100 disabled">
                    <i class='fa fa-shopping-cart me-2'></i> Checkout
                </button>
                @endif
            </form>
        </div>
    </div>
</div>

@endsection