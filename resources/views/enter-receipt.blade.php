@extends('layouts.main')

@section('container')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">

    @if($checkout->receipt_no !== '-')
    <div class="alert alert-danger mt-5 mb-3" role="alert">
        The receipt number was already sent to the buyer. <span><a class="text-decoration-underline" href="/profile">Back to
                profile</a></span>.
    </div>
    @else
    <div class="alert alert-primary d-flex align-items-center w-75 mt-5" role="alert">
        <i class='bx bxs-info-circle me-3'></i>
        <div>
            Enter the receipt number for your buyer
        </div>
    </div>
    @endif

    <div class="row w-100">
        <div class="col-8">
            <h3>The book will be delivered to</h3>
            <table class="w-100 table table-light table-bordered mt-4">
                <tr>
                    <th>No. invoice</th>
                    <td>{{ $checkout->number_invoice }}</td>
                </tr>
                <tr>
                    <th>Buyer name</th>
                    <td>{{ $checkout->user->user_name }}</td>
                </tr>
                <tr>
                    <th>Telephone</th>
                    <td>{{ $checkout->user->user_phoneNumber }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $checkout->user->email }}</td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td>{{ $checkout->user->user_address}}</td>
                </tr>
            </table>
        </div>
        <div class="col-4">
            <div class="card p-3">
                <div class="content">
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive mb-4" src="/img/BO8Y1D3.png">

                    </div>
                    <h5 class="mb-3 text-center">Receipt number</h5>
                    @if($checkout->receipt_no === '-')
                    <form action="/addreceipt/{{ $checkout->id }}" method="post">
                        @csrf
                        @method('put')
                        <input class="form-control w-100" placeholder="Number" name="receiptNum"
                            value="{{ old('receiptNum', $checkout->receipt_no) }}">
                        <button type="submit" class="btn btn-prim d-block w-100 mt-2 sub-button">Save</button>
                    </form>
                    @else
                    <form action="/profile" method="get">
                        @csrf
                        <input class="form-control w-100" placeholder="Number" name="receiptNum"
                            value="{{ old('receiptNum', $checkout->receipt_no) }}" disabled>
                        <button disabled class="btn btn-prim d-block w-100 mt-2 sub-button">Save</button>
                    </form>

                    @endif
                </div>
            </div>

        </div>
    </div>


</div>

@endsection