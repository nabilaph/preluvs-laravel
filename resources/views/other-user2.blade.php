<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.rtl.min.css"
        integrity="sha384-OXTEbYDqaX2ZY/BOaZV/yFGChYHtrXH2nyXJ372n2Y8abBhrqacCEe+3qhSHtLjy" crossorigin="anonymous" />

    <!-- my css -->
    <link rel="stylesheet" href="/css/other-user.css" />
    <link rel="stylesheet" href="/css/list-books.css" />
    <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />

    <title>Other User Profile | Preluvs</title>
</head>

<body>
    <!-- jumbotron -->
    <section class="jumbotron text-center">
        <img src="/{{ $user->user_pict}}" alt="Image" width="170" class="rounded-circle img-thumbnail" />
        <h3>{{ $user->user_name }}</h3>
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
            <div class="row mt-5">
                @if ($books->count())
                @foreach ($books as $book)
                <div class="col">
                    <div class="card card-body p-lg-4 p-sm-3 rounded-4 mx-3 mb-3">
                        <div class="img-wrapper">
                            <img src="/{{ $book->book_pict }}" alt="" class="img-container rounded-4">
                        </div>
                        <a href="/books/{{ $book->book_id }}""><h4 class=" title mt-3">{{ $book->book_title }}</h4></a>
                        <p class="author">{{ $book->book_author }}</p>
                        <div>
                            <a href="/genres/{{ $book->category->category_slug }}" class="badge">{{
                                $book->category->category_name }}</a>
                        </div>
                        <div class="detail d-flex justify-content-between align-items-center mt-2">
                            <h5 class="price fw-semibold m-0">
                                Rp{{ $book->book_price }}
                            </h5>
                            <a href="" class="btn-cart rounded text-center"><i class='bx bx-cart-alt'></i></a>
                        </div>
                    </div>
                </div>
                @endforeach                
                @else
                <div class="col">
                    <div class="alert alert-secondary" role="alert">Nothing here...</div>
                </div>
                @endif
            </div>
        </div>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#dfc9f1" fill-opacity="1"
                d="M0,160L48,154.7C96,149,192,139,288,117.3C384,96,480,64,576,53.3C672,43,768,53,864,74.7C960,96,1056,128,1152,122.7C1248,117,1344,75,1392,53.3L1440,32L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">
            </path>
        </svg>
    </section>
    <!-- akhir buku -->

    <!-- footer -->
    <footer class="text-black text-center pb-5" style="background-color: #dfc9f1">
        <p>Created with ❤ by Preluvs Books</p>
    </footer>
    <!-- akhir footer -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>