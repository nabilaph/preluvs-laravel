@extends('layouts\main')

@section('container')

<header class="header-bill" style="height: 60px; padding: 5px;">
    <h3 class="fw-bold" style="text-align: center;">Billing</h3>
</header>

@if(session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

@if(session()->has('deleted'))
<div class="alert alert-danger" role="alert">
    {{ session('deleted') }}
</div>
@endif

<div class="container">
    <div class="row">
        <div class="col-6 bg-light boxstyle">

            <form name="theform" action="" method="post">
                <div class="form-group">
                    <div class="width30 floatL"><label>Recipient</label></div>
                    <div class="width70 floatR"><input type="text" id="txtlname" name="txtlanme" placeholder="Last Name"
                            class="form-control" value="{{ auth()->user()->user_name }}" disabled>
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Phone</label></div>
                    <div class="width70 floatR"><input type="text" id="txtphone" name="txtphone"
                            placeholder="Phone number" class="form-control" value="{{ auth()->user()->user_phoneNumber }}" disabled>
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Email</label></div>
                    <div class="width70 floatR"><input type="text" id="txtemail" name="txtemail"
                            placeholder="Ship to Email" class="form-control" value="{{ auth()->user()->email }}" disabled>
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Address</label></div>
                    <div class="width70 floatR"><input type="text" id="txtaddress" name="txtaddress"
                            placeholder="Address" class="form-control" value="{{ auth()->user()->user_address }}" disabled>
                    </div><br><br>
                </div>                
            </form>

        </div>
        <div class="col-6 right-bar mt-4 d-flex flex-column text-center justify-content-center align-items-center">

            <p class="text-center"> Please finish your payment</p>
            <div
                class="bg-danger bg-opacity-25 p-3 rounded d-flex flex-column justify-content-center align-items-center">
                <p1 class="mb-0"> Pay before January 8th 2023, 3:04 WIB </p1>
            </div>
            <div class="p-1 mt-4 d-flex flex-column text-center justify-content-center align-items-center">
                <p> Pleaser transfer to</p>
            </div>
            @switch($payment_method)
                @case('BCA')
                    <div class="img-pay">
                        <img src="/img/bca-logo.png" alt="image" height="150" width="150">
                    </div>
                    @break
                @case('GOPAY')
                    <div class="img-pay">
                        <img src="/img/GoPay.png" alt="image" height="150" width="150">
                    </div>
                    @break
                @case('OVO')
                    <div class="img-pay">
                        <img src="/img/logo-ovo.png" alt="image" height="150" width="150">
                    </div>
                    @break
                @case('BNI')
                    <div class="img-pay">
                        <img src="/img/bni-logo.png" alt="image" height="150" width="150">
                    </div>
                    @break
                @case('MANDIRI')
                    <div class="img-pay">
                        <img src="/img/mandiri-logo.png" alt="image" height="150" width="150">
                    </div>
                    @break
            @endswitch
            <div class="p-0 mt-0 d-flex flex-column text-center justify-content-center align-items-center">
                <h2>
                    3902010988786
                </h2>
            </div>
            <div class="p-0 mt-3 d-flex flex-column text-center justify-content-center align-items-center">
                <p> Total price </p>
                <h1>
                    {{ $total }}
                </h1>
            </div>
           
        </div>
        <div class="alert alert-secondary w-75 mt-5 mx-auto" role="alert">
            You can confirm your payment through <span><a class="text-decoration-underline" href="/notification">notification</a></span>. Click your book ordered and then click <b>Already paid</b> button.
        </div>
    </div>
</div>
</div>

@endsection