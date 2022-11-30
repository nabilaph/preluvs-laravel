@extends('layouts.main')

@section('container')

<div class="container vh-100 d-flex flex-column justify-content-center align-items-center">

    @if($checkout->receipt_no !== '-')
    <div class="alert alert-danger mt-5 mb-3" role="alert">
        The receipt number was already sent to the buyer. <span><a class="text-decoration-" href="/profile">Back to
                profile</a></span>.
    </div>
    @endif

    <div class="row">
        <div class="col-8 card-body">
            
        </div>
        <div class="col-4">
            <div class="card p-3">
                <div class="content">
                    <div class="d-flex justify-content-center">
                        <img class="img-responsive mb-4" src="/img/BO8Y1D3.png">

                    </div>
                    <h5 class="mb-3">Enter Receipt Number <br> of your book </h5>
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