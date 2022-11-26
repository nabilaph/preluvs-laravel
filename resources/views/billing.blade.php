@extends('layouts\main')

@section('container')

<header class="header-bill" style="height: 60px; padding: 5px;">
    <h3 class="fw-bold" style="text-align: center;">Billing Address</h3>
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
                            class="form-control">
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Phone</label></div>
                    <div class="width70 floatR"><input type="text" id="txtphone" name="txtphone"
                            placeholder="Ship to Phone" class="form-control">
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Email</label></div>
                    <div class="width70 floatR"><input type="text" id="txtemail" name="txtemail"
                            placeholder="Ship to Email" class="form-control">
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>Address</label></div>
                    <div class="width70 floatR"><input type="text" id="txtaddress" name="txtaddress"
                            placeholder="Ship to Address" class="form-control">
                    </div><br><br>
                </div>
                <div class="form-group">
                    <div class="width30 floatL"><label>City</label></div>
                    <div class="width70 floatR"><input type="text" id="txtcity" name="txtcity"
                            placeholder="Ship to City" class="form-control">
                    </div><br><br>
                </div>
            </form>

        </div>
        <div class="col-6 right-bar mt-4 d-flex flex-column text-center justify-content-center align-items-center">

            <p class="text-center"> Silahkan selesaikan pembayaran</p>
            <div
                class="bg-danger bg-opacity-25 p-3 rounded d-flex flex-column justify-content-center align-items-center">
                <p1 class="mb-0"> Bayar sebelum 8 Oktober 2022, 3:04 WIB </p1>
            </div>
            <div class="p-1 mt-4 d-flex flex-column text-center justify-content-center align-items-center">
                <p> Transfer Ke</p>
            </div>
            <div class="img">
                <img src="img/bca-logo.png" alt="image" height="150" width="150">
            </div>
            <div class="p-0 mt-0 d-flex flex-column text-center justify-content-center align-items-center">
                <h2>
                    3902010988786
                </h2>
            </div>
            <div class="p-1 mt-1 d-flex flex-column text-center justify-content-center align-items-center">
                <p1 class="p1"> Salin no rek </p1>
            </div>
            <div class="p-0 mt-0 d-flex flex-column text-center justify-content-center align-items-center">
                <p> Jumlah Yang Harus Dibayar </p>
                <h1>
                    Rp 200.000,00
                </h1>
            </div>
        </div>
    </div>
</div>
</div>

@endsection