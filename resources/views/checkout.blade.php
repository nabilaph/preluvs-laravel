@extends('layouts.main')

@section('container')

<!-- content container -->
<div class="content-container m-4">
    <h1 class="fw-bold text-center mb-5">Checkout</h1>
    <form action="/checkout" method="post" class="w-100">
        @csrf
        <div class="row">
            <div class="details-checkout col-lg-8">
                <!-- address -->
                <section class="address card p-3">
                    <h5 class="mb-4 fw-bolder">Address</h5>
                    <p>{{ auth()->user()->user_address }}</p>
                    <!-- <a class="nav-link btn-second mt-3 d-flex align-items-center justify-content-center" href="#"
                        data-bs-toggle="modal" data-bs-target="#addressEdit">
                        <i class='bx bx-pencil me-2'></i> Edit address
                    </a>
                    <div class="modal fade" id="addressEdit" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit address</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                               <form action="/editaddress/{{ auth()->user()->id }}" method="post">
                                    @method('put')
                                    @csrf
                                    <div class="modal-body">
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Recipient:</label>
                                            <input type="text"
                                                class="form-control @error('user_name') is-invalid @enderror"
                                                id="recipient-name" value="{{ auth()->user()->user_name }}"
                                                name="user_name">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Phone:</label>
                                            <input type="text"
                                                class="form-control @error('user_phoneNumber') is-invalid @enderror"
                                                id="recipient-name" value="{{ auth()->user()->user_phoneNumber }}"
                                                name="user_phoneNumber">
                                        </div>
                                        <div class="mb-3">
                                            <label for="recipient-name" class="col-form-label">Email:</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                id="recipient-name" value="{{ auth()->user()->email}}" name="email">
                                        </div>
                                        <div class="mb-3">
                                            <label for="message-text" class="col-form-label">Address:</label>
                                            <textarea class="form-control  @error('user_address') is-invalid @enderror"
                                                name="user_address"
                                                id="message-text">{{ auth()->user()->user_address }}</textarea>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-outline-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div> -->
                </section>

                <section class="payment-select card p-3 mt-4">
                    <h5 class="mb-4 fw-bold">Select Payment Method</h5>

                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault1"
                            value="BCA">
                        <img class="img-fluid mx-3" src="img/bca-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault1">
                            BCA Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2"
                            value="MANDIRI">
                        <img class="img-fluid mx-3" src="img/mandiri-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            Mandiri Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2"
                            value="BNI">
                        <img class="img-fluid mx-3" src="img/bni-logo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            BNI Virtual Account
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2"
                            value="GOPAY">
                        <img class="img-fluid mx-3" src="img/GoPay.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            GoPay
                        </label>
                    </div>
                    <div class="form-check mb-2">
                        <input class="form-check-input" type="radio" name="payment_method" id="flexRadioDefault2"
                            value="OVO">
                        <img class="img-fluid mx-3" src="img/logo-ovo.png" alt="" width="70">
                        <label class="form-check-label" for="flexRadioDefault2">
                            OVO
                        </label>
                    </div>
                </section>
                <section class="order card p-3 mt-4">
                    <h5 class="mb-4 fw-bold">Order details</h5>
                    <table class="table">
                        <tbody>
                            @foreach ($itemcart as $item)
                            <tr>
                                <td><img src="{{ $item->book->book_pict }}" alt="" width="100"></td>
                                <td>
                                    {{ $item->book->book_title }}
                                </td>
                                <td>
                                    {{ $item->book->seller->username }}
                                </td>
                                <td class="fw-bold">Rp. {{ $item->book->book_price }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </section>
            </div>
            <div class="total-price col-lg-4 card p-3  mt-lg-0 mt-3">
                <!-- <h5 class="mb-4 fw-bold">Total price</h5> -->
                <table class="table">
                    <tbody>
                        <tr>
                            <td class="fw-bold">Subtotal</td>
                            <td></td>
                            <td class="text-end">Rp. {{ $subtotal }}</td>
                        </tr>
                        <tr>
                            <td class="fw-bold">Shipping cost</td>
                            <td></td>
                            <td class="text-end">Rp. 9000</td>
                        </tr>
                        <tr>
                            <td>
                                <h5 class="mb-4 fw-bold">Total price</h5>
                            </td>
                            <td></td>
                            <td>
                                <h5 class="mb-4 fw-bold text-end">Rp. {{ $total }}</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>

                @foreach ($itemcart as $item)
                <input type="hidden" name="cart_id[]" value="{{ $item->id }}">
                <input type="hidden" name="book_id[]" value="{{ $item->book_id }}">

                @endforeach

                <button type="submit"
                    class="nav-link btn-prim border-0 me-lg-3 mt-3 d-flex align-items-center justify-content-center w-100">
                    Proceed to payment
                </button>
            </div>
        </div>
    </form>
</div>

@endsection