@extends('layouts\main')

@section('container')

    <!-- <div class="container menu-wrapper fixed-top d-none d-lg-block">
        <div class="menu d-flex justify-content-center align-items-center">
            <a class="nav-link" id="section" href="#">
                Home
            </a>
            <a class="nav-link" href="#genres">
                Genres
            </a>
            <a class="nav-link" href="#new-uploads">
                New uploads
            </a>
            <a class="nav-link" href="#seller-leaderboard">
                Seller leaderboard
            </a>
        </div>
    </div> -->

    <!-- Header -->
    <section class="header">
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0"
                        class="active" aria-current="true" aria-label="Slide 1"></button>
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
                        <img src="img/Banner.png" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-item" data-bs-interval="2500">
                        <img src="img/Banner.png" class="d-block w-100" alt="...">
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
                    <a class="see-all" href="#">View all</i></a>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-lg-3 col-sm-6 mb-sm-4 click-genre">
                    <a href="#">
                        <div
                            class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                            <p>
                                Comics
                            </p>
                            <div class="img-genre position-relative">
                                <img src="img/books-category.png" class="position-absolute end-0" alt="" width="100">
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-3 col-sm-6 mb-sm-4 click-genre">
                    <a href="#">
                        <div
                            class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                            <p>
                                Comics
                            </p>
                            <div class="img-genre position-relative">
                                <img src="img/books-category.png" class="position-absolute end-0" alt="" width="100">
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-3 col-sm-6 mb-sm-4 click-genre">
                    <a href="#">
                        <div
                            class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                            <p>
                                Comics
                            </p>
                            <div class="img-genre position-relative">
                                <img src="img/books-category.png" class="position-absolute end-0" alt="" width="100">
                            </div>
                        </div>
                    </a>

                </div>
                <div class="col-lg-3 col-sm-6 mb-sm-4 click-genre">
                    <a href="#">
                        <div
                            class="card-genre rounded-3 d-flex justify-content-between align-items-center px-3 py-3 h-100">
                            <p>
                                Comics
                            </p>
                            <div class="img-genre position-relative">
                                <img src="img/books-category.png" class="position-absolute end-0" alt="" width="100">
                            </div>
                        </div>
                    </a>

                </div>
            </div>
        </div>
    </section>

    <!-- New uploads -->
    <section class="new-uploads section-margin" id="new-uploads">
        <div class="container">
            <div class="row">
                <div class="col d-flex justify-content-between">
                    <h1 class="heading">New uploads</h1>
                    <a class="see-all" href="#">View all</a>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-3 col-6">
                    <div class="card card-body p-lg-4 p-sm-3 rounded-4">
                        <img src="img/comics-miko.png" alt="" class="img-fluid rounded-4">
                        <h3 class="title mt-3">Miiko</h3>
                        <p class="author">Siapa aja</p>
                        <div>
                            <a href="#" class="badge">Comics</a>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-2">
                            <h5 class="price fw-semibold m-0">
                                Rp. 20.000
                            </h5>
                            <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="card card-body p-lg-4 p-sm-3 rounded-4">
                        <img src="img/comics-miko.png" alt="" class="img-fluid rounded-4">
                        <h3 class="title mt-3">Miiko</h3>
                        <p class="author">Siapa aja</p>
                        <div>
                            <a href="#" class="badge">Comics</a>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-2">
                            <h5 class="price fw-semibold m-0">
                                Rp. 20.000
                            </h5>
                            <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3 mt-lg-0">
                    <div class="card card-body p-lg-4 p-sm-3 rounded-4">
                        <img src="img/comics-miko.png" alt="" class="img-fluid rounded-4">
                        <h3 class="title mt-3">Miiko</h3>
                        <p class="author">Siapa aja</p>
                        <div>
                            <a href="#" class="badge">Comics</a>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-2">
                            <h5 class="price fw-semibold m-0">
                                Rp. 20.000
                            </h5>
                            <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6 mt-3 mt-lg-0">
                    <div class="card card-body p-lg-4 p-sm-3 rounded-4">
                        <img src="img/comics-miko.png" alt="" class="img-fluid rounded-4">
                        <h3 class="title mt-3">Miiko</h3>
                        <p class="author">Siapa aja</p>
                        <div>
                            <a href="#" class="badge">Comics</a>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-2">
                            <h5 class="price fw-semibold m-0">
                                Rp. 20.000
                            </h5>
                            <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                        </div>
                    </div>
                </div>
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
                            <tr>
                                <th scope="row">1</th>
                                <td><a href="#">Mark</a></td>
                                <td>5.0 <i class='bx bxs-star text-warning fs-1'></i></td>
                            </tr>
                            <tr>
                                <th scope="row">2</th>
                                <td><a href="#">Jacob</a></td>
                                <td>4.5 <i class='bx bxs-star text-warning fs-1'></i></td>
                            </tr>
                            <tr>
                                <th scope="row">3</th>
                                <td><a href="#">Mark</a></td>
                                <td>4.2 <i class='bx bxs-star text-warning fs-1'></i></td>
                            </tr>
                            <tr>
                                <th scope="row">4</th>
                                <td><a href="#">Mark</a></td>
                                <td>4.2 <i class='bx bxs-star text-warning fs-1'></i></td>
                            </tr>
                            <tr>
                                <th scope="row">5</th>
                                <td><a href="#">Mark</a></td>
                                <td>4.2 <i class='bx bxs-star text-warning fs-1'></i></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    
@endsection