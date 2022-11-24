@extends('layouts\main')

@section('container')

<!-- content -->
<div class="row content m-5">

    <!-- profile info -->
    <section class="profile-info col-lg-4">
        <div class="container">
            <div class="row">
                <div class="card p-0">
                    <div class="img1">
                        <img src="img/banner-profile.png" alt="">
                    </div>
                    <div class="img2 position-relative">
                        <img src="{{ auth()->user()->user_pict }}" alt="">
                    </div>
                    <div class="main-text text-center position-relative">
                        <h3 class="fw-bold">{{ auth()->user()->user_name }}</h3>
                        <p>{{ auth()->user()->username }}</p>
                    </div>
                </div>

            </div>
            <div class="row mt-3">
                <div class=" card card2 p-5">
                    <div class="text-center d-flex flex-column justify-content-center align-items-center">
                        <h3 class="mb-5 fw-bold">User Information</h3>
                        <div class="info-block">
                            <h5 class="fw-semibold">Name</h5>
                            <p>{{ auth()->user()->user_name }}</p>
                        </div>
                        <div class="info-block">
                            <h5 class="fw-semibold">Username</h5>
                            <p>{{ auth()->user()->username }}</p>
                        </div>
                        <div class="info-block">
                            <h5 class="fw-semibold">Email</h5>
                            <p>{{ auth()->user()->email }}</p>
                        </div>
                        <div class="info-block">
                            <h5 class="fw-semibold">Phone</h5>
                            <p>{{ auth()->user()->user_phoneNumber }}</p>
                        </div>
                        <div class="info-block">
                            <h5 class="fw-semibold">Address</h5>
                            <p>{{ auth()->user()->user_address }}</p>
                        </div>
                        <a class="nav-link btn-second mt-lg-0 mt-2" href="/editprofile">
                            Edit profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- tabbed nav -->
    <section class="tabbed-nav col-lg-8 mt-5 mt-lg-0">
        <div class="container">
            <div class="row mb-3 justify-content-end">
                <a class="nav-link btn-prim w-25" href="/uploadbook">
                    + Sell books
                </a>
            </div>

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

            <div class="row">
                <ul class="nav nav-pills nav-justified mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                            aria-selected="true">Purchase</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                            data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                            aria-selected="false">Selling</button>
                    </li>

                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                        aria-labelledby="pills-home-tab" tabindex="0">
                        @if ($purchase->count())
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-bg">
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Purchase date</th>
                                        <th scope="col">Picture</th>
                                        <th scope="col">Book title</th>
                                        <th scope="col">Seller</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Receipt number</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($purchase as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->created_at }}</td>
                                        <td><img src="/{{ $item->cart->book->book_pict }}"
                                                alt="{{ $item->cart->book->book_title }}" class="w-75"></td>
                                        <td>{{ $item->cart->book->book_title }}</td>
                                        <td>{{ $item->cart->book->user_id }}</td>
                                        <td>{{ $item->cart->book->book_price }}</td>
                                        <td>{{ $item->receipt_no }}</td>
                                        <td>

                                            <a class="nav-link btn-second mt-3 d-flex align-items-center justify-content-center"
                                                href="#" data-bs-toggle="modal" data-bs-target="#addressEdit">
                                                <i class='bx bxs-star'></i> Rate seller
                                            </a>
                                            <div class="modal fade" id="addressEdit" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h2 class="modal-title" id="exampleModalLabel">Rate Seller
                                                            </h2>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/saverating/{{ $item->cart->book->seller->id }}" method="post" class="w-100">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <div class="row">
                                                                        <div class="card p-0">
                                                                            <div class="img1">
                                                                                <img src="img/banner-profile.png"
                                                                                    alt="">
                                                                            </div>
                                                                            <div class="img2 position-relative">
                                                                                <img src="{{ $item->cart->book->seller->user_pict }}"
                                                                                    alt="">
                                                                            </div>
                                                                            <div
                                                                                class="main-text text-center position-relative">
                                                                                <h3 class="fw-bold">{{
                                                                                    $item->cart->book->seller->user_name
                                                                                    }}</h3>
                                                                                <p>{{
                                                                                    $item->cart->book->seller->user_username
                                                                                    }}</p>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                                <p class="text-center">How can you rate this seller
                                                                    based on your purchase?</p>
                                                                <div class="mb-3 d-flex justify-content-around">
                                                                    <input type="radio" class="btn-check" name="options"
                                                                        id="option1" autocomplete="off" value="1">
                                                                    <label class="btn btn-secondary" for="option1">1 <i
                                                                            class='bx bx-star'></i></label>
                                                                    <input type="radio" class="btn-check" name="options"
                                                                        id="option2" autocomplete="off" value="2">
                                                                    <label class="btn btn-secondary" for="option2">2 <i
                                                                            class='bx bx-star'></i></label>
                                                                    <input type="radio" class="btn-check" name="options"
                                                                        id="option3" autocomplete="off" value="3">
                                                                    <label class="btn btn-secondary" for="option3">3 <i
                                                                            class='bx bx-star'></i></label>
                                                                    <input type="radio" class="btn-check" name="options"
                                                                        id="option4" autocomplete="off" value="4">
                                                                    <label class="btn btn-secondary" for="option4">4 <i
                                                                            class='bx bx-star'></i></label>
                                                                    <input type="radio" class="btn-check" name="options"
                                                                        id="option5" autocomplete="off" value="5">
                                                                    <label class="btn btn-secondary" for="option5">5 <i
                                                                            class='bx bx-star'></i></label>

                                                                </div>

                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-second"
                                                                        data-bs-dismiss="modal">Close</button>
                                                                    <button type="submit" class="btn btn-prim">Save
                                                                        changes</button>
                                                                </div>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
    </section>
    </td>
    </tr>
    @endforeach

    </tbody>
    </table>
</div>
@else
<div class="alert alert-secondary" role="alert">Nothing here...</div>
@endif
</div>
<div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
    @if ($selling->count())
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead class="table-bg">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Posting date</th>
                    <th scope="col">Picture</th>
                    <th scope="col">Book title</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Buyer</th>
                    <th scope="col">Receipt number</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($selling as $book)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $book->created_at }}</td>
                    <td><img src="/{{ $book->book_pict }}" alt="{{ $book->book_title }}" class="w-100"></td>
                    <td>{{ $book->book_title }}</td>
                    <td>{{ $book->book_price }}</td>
                    @if ($book->isBookPaid == 0)
                    <td class="text-success">
                        Available
                    </td>
                    @else
                    <td class="text-muted">
                        Sold
                    </td>
                    @endif
                    <td>{{ $book->category->category_name }}</td>
                    <td>@mdo</td>
                    <td class="d-flex flex-column justify-content-between">
                        <a class="btn btn-prim mb-2" href="/books/{{ $book->book_id }}" role="button">Details</a>
                        <a class="btn btn-second" href="/profile/books/{{ $book->book_title }}/edit"
                            role="button">Edit</a>
                        <a class="btn btn-second my-2" href="enter-receipt.html" role="button">Add
                            receipt</a>
                        <form action="/profile/books/{{ $book->book_title }}" method="post">
                            @method('delete')
                            @csrf
                            <button type="submit" class="btn btn-danger w-100"
                                onclick="return confirm('Are you sure want to delete this book?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
    @else
    <div class="alert alert-secondary" role="alert">Nothing here...</div>
    @endif
</div>

</div>
</div>
</div>
</section>

</div>

@endsection