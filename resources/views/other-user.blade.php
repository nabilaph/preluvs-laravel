
@extends('layouts.main')

@section('container')

    <section class="jumbotron text-center">
        <img src="img/img.jpg" alt="Image" width="170" class="rounded-circle img-thumbnail" />
        <h3></h3> 
        <p class="lead">Sell Second Book | Seller</p>
        <h4>Star Rating</h4>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star checked"></span>
        <span class="fa fa-star"></span>

        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1"
                d="M0,0L48,26.7C96,53,192,107,288,128C384,149,480,139,576,128C672,117,768,107,864,133.3C960,160,1056,224,1152,234.7C1248,245,1344,203,1392,181.3L1440,160L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir jumbotron -->

    <!-- gambar buku -->
    <section id="buku">
        <div class="container">
            <div class="row text-end">
                <div class="col">
                    <h2 style="font-family: 'Poppins';">Books Sold</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_1.jpg" class="card-img-top" alt="Buku1" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_2.jpg" class="card-img-center" alt="Buku2" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_3.jpeg" class="card-img-top" alt="Buku3" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_4.jpg" class="card-img-top" alt="Buku4" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_4.jpg" class="card-img-top" alt="Buku4" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_4.jpg" class="card-img-top" alt="Buku4" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_4.jpg" class="card-img-top" alt="Buku4" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-5">
                    <div class="card" style="width: auto">
                        <img src="img/buk_4.jpg" class="card-img-top" alt="Buku4" />
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk
                                of the card's content.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dfc9f1" fill-opacity="1"
                d="M0,160L48,154.7C96,149,192,139,288,117.3C384,96,480,64,576,53.3C672,43,768,53,864,74.7C960,96,1056,128,1152,122.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir buku -->
@endsection