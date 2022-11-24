@extends('layouts.main')

@section('container')

<!-- Header -->
<section class="header">
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
    <div class="container">
        <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="2500">
                    <img src="img/Banner.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2500">
                    <img src="img/Banner2.png" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2500">
                    <img src="img/Banner3.png" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</section>

<!-- Genres -->
<section class="genres section-margin" id="genres">
    <div class="container">
        <div class="row">
            <div class="title col d-flex justify-content-between">
                <h1 class="heading">Book genres</h1>
                <a class="see-all" href="/genres">View all</i></a>
            </div>
        </div>
        <div class="row mt-5">
            @foreach ($categories as $category)
            <div class="col-lg-3 col-sm-6 mb-sm-4 click-genre">
                <a href="/genres/{{ $category->category_slug }}">
                    <div class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                        <p>
                            {{ $category->category_name }}
                        </p>
                        <div class="img-genre position-relative">
                            <img src="{{ $category->category_pict }}" class="position-absolute end-0" alt=""
                                width="100">
                        </div>
                    </div>
                </a>

            </div>
            @endforeach
        </div>
    </div>
</section>

<!-- New uploads -->
<section class="new-uploads section-margin" id="new-uploads">
    <div class="container">
        <div class="row">
            <div class="col d-flex justify-content-between">
                <h1 class="heading">New uploads</h1>
                <a class="see-all" href="/books">View all</a>
            </div>
        </div>

        <div class="row mt-3">
            @foreach ($books as $book)
            <div class="col-lg-3 col-md-6 col-12">
                <div class="card card-body p-lg-4 p-sm-3 rounded-4 mx-3 mb-3">
                    <div class="img-wrapper">
                        <img src="/{{ $book->book_pict }}" alt="" class="img-container rounded-4">
                    </div>
                    <a href="/books/{{ $book->id }}""><h4 class=" title mt-3">{{ $book->book_title }}</h4></a>
                    <p class="author">{{ $book->book_author }}</p>
                    <div>
                        <a href="/genres/{{ $book->category->category_slug }}" class="badge">{{
                            $book->category->category_name }}</a>
                    </div>
                    <div class="detail d-flex justify-content-between align-items-center mt-2">
                        <h5 class="price fw-semibold m-0">
                            Rp{{ $book->book_price }}
                        </h5>
                        <form action="/cart/{{ $book->id }}" method="post">
                            @csrf
                            <button type="submit" href="" class="btn-cart rounded text-center border-0"><i
                                    class='bx bx-cart-alt'></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>

<!-- Seller leaderboard -->
<section class="seller-leaderboard section-margin" id="seller-leaderboard">
    <div class="container ">
        <div class="row">
            <div class="col d-flex flex-column">
                <h1 class="heading">Seller leaderboard</h1>
                <h6>Top 5 seller this month</h6>
            </div>
        </div>
        <div class="row mt-3 mx-2">
            <div class="table-container p-4 rounded">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Username</th>
                            <th scope="col">Rating</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($leaderboard as $item)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td><a href="/user/{{ $item->user->username }}">{{ $item->user->username }}</a></td>
                            <td>{{ $item->totalrate }} <i class='bx bxs-star text-warning fs-1'></i></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

@endsection