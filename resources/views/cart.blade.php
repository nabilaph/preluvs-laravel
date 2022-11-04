@extends('layouts\main')

@section('container')

    <div class="wrapper">
        <h1 class="fw-bold">Shopping Cart</h1>
        <div class="project">
            <div class="shop">
                <div class="box">
                    <img src="img/book1.png" alt="">
                    <div class="content">
                        <h3> Harry Potter</h3>
                        <h4>Price: IDR. 40.000</h4>
                        <p class="unit">Quantity: <input value="2"></p>
                        <p class="btn-area bg-danger">
                            <i class='bx bx-trash'></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/book5.png" alt="">
                    <div class="content">
                        <h3>Invisible Library</h3>
                        <h4>Price: IDR. 24.000</h4>
                        <p class="unit">Quantity: <input value="1"></p>
                        <p class="btn-area bg-danger">
                            <i class='bx bx-trash'></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
                <div class="box">
                    <img src="img/book7.png" alt="">
                    <div class="content">
                        <h3>Sherlock Holmes</h3>
                        <h4>Price: IDR. 54.000</h4>
                        <p class="unit">Quantity: <input value="0"></p>
                        <p class="btn-area bg-danger">
                            <i class='bx bx-trash'></i>
                            <span class="btn2">Remove</span>
                        </p>
                    </div>
                </div>
            </div>
            <div class="right-bar">
                <p><span>Subtotal</span> <span>$120</span></p>
                <hr>
                <p><span>Tax (5%)</span> <span>$20</span></p>
                <hr>
                <p><span>Shipping</span> <span>$70</span></p>
                <hr>
                <p><span>Total</span> <span>$210</span></p>

                <a href="#"><i class="fa fa-shopping-cart"></i> Checkout</a>
            </div>
        </div>
    </div>
    
@endsection