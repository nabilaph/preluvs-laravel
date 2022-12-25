@extends('layouts.main')

@section('container')

<div class="wrapper">
    <div id="buttons" class="d-flex justify-content-center">
        <a class="button-value mx-2 {{ Request::is('books')  ? 'active' : '' }}" onclick="filterProduct('All')" href="/books">
            All
        </a>
        <!-- @foreach ($categories as $category)
        <a class="button-value mx-2 {{ ($active === $category->category_slug) ? 'active' : '' }}" onclick="filterProduct('{{ $category->category_name }}')"
            href="/genres/{{ $category->category_slug }}">{{ $category->category_name }}</a>
        @endforeach -->
        <a class="button-value mx-2 {{ Request::is('genres/novel')  ? 'active' : '' }}" onclick="filterProduct('novel')"
            href="/genres/novel">Novel</a>
        <a class="button-value mx-2 {{ Request::is('genres/education')  ? 'active' : '' }}" onclick="filterProduct('education')"
            href="/genres/education">Education</a>
        <a class="button-value mx-2 {{ Request::is('genres/comics')  ? 'active' : '' }}" onclick="filterProduct('comics')"
            href="/genres/comics">Comics</a>
        <a class="button-value mx-2 {{ Request::is('genres/technology')  ? 'active' : '' }}"
            onclick="filterProduct('technology')" href="/genres/technology">Technology</a>
        <a class="button-value mx-2 {{ Request::is('genres/self-improvement')  ? 'active' : '' }}"
            onclick="filterProduct('self-improvement')" href="/genres/self-improvement">Self Improvment</a>
        <a class="button-value mx-2 {{ Request::is('genres/poetry')  ? 'active' : '' }}" onclick="filterProduct('poetry')"
            href="/genres/poetry">Poetry</a>
        <a class="button-value mx-2 {{ Request::is('genres/other')  ? 'active' : '' }}" onclick="filterProduct('other')"
            href="/genres/other">Others</a>
    </div>

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

    <div id="products" class="container d-flex justify-content-between">
        <div class="row row-cols-2 row-cols-lg-4 row-cols-sm-1 w-100">
            @if ($books->count())
            @foreach ($books as $book)
            <div class="col-lg col ">
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
                            <button type="submit" href="" class="btn-cart rounded text-center"><i
                                    class='bx bx-cart-alt'></i></button>
                        </form>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col text-center w-100">
                <div class="alert alert-secondary text-center" role="alert">Nothing here...</div>
            </div>
            @endif

        </div>
    </div>
</div>

<script>
    function filterProduct(value) {
        //Button class code
        let buttons = document.querySelectorAll(".button-value");
        buttons.forEach((button) => {
            //check if value equals innerText
            if (value.toUpperCase() == button.innerText.toUpperCase()) {
                button.classList.add("active");
            } else {
                button.classList.remove("active");
            }
        });
    }
</script>

@endsection