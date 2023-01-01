@extends('layouts.main')

@section('container')

<div class="main-wrapper mt-4">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="col-xs-5">
            <div class="p-2 py-5">
                <div class="d-flex justify-content-center align-items-center mb-5">
                    <h2 class="text-center fw-bolder">Upload Book Information 📒📝</h2>
                </div>
                <div class="row mt-3">
                    <form method="post" action="/uploadbook" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mt-3 mb-3">
                            <label for="titlebook">Title</label>
                            <input type="text" class="form-control @error('book_title') is-invalid @enderror"
                                id="titlebook" placeholder="Title of Book" name="book_title" value="{{ old('book_title') }}" required/>
                            <!-- <p class="fs-6 fw-lighter text-black-50" id="titleslug">Here is your slug</p> -->
                            @error('book_title')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Picture</label>
                            <input class="form-control @error('book_pict') is-invalid @enderror" type="file" id="formFile" name="book_pict">
                            @error('book_pict')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="pricebook">Price</label>
                            <input type="number" class="form-control @error('book_price') is-invalid @enderror"
                                id="pricebook" placeholder="Price of Book " name="book_price" value="{{ old('book_price') }}" required/>
                            @error('book_price')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="decriptionbook">Description</label>
                            <textarea class="form-control @error('book_description') is-invalid @enderror" id="decriptionbook" placeholder="Description of Book"
                                name="book_description" rows="3" value="{{ old('book_description') }}"></textarea>
                                @error('book_description')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="authorbook">Author</label>
                            <input type="text" class="form-control @error('book_author') is-invalid @enderror"
                                id="authorbook" placeholder="Author of Book" name="book_author" value="{{ old('book_author') }}" required />
                            @error('book_author')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="itembook">Quantity</label>
                            <input type="number" class="form-control @error('book_quantity') is-invalid @enderror"
                                id="itembook" placeholder="Quantity of Book" name="book_quantity" value="1" disabled />
                            @error('book_quantity')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="pagenumbook">Page Number</label>
                            <input type="number" class="form-control @error('book_pageNum') is-invalid @enderror"
                                id="pagenumbook" name="book_pageNum" placeholder="Page Number of Book" value="{{ old('book_pageNum') }}" required />
                            @error('book_pageNum')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="languagebook">Language</label>
                            <input type="text" class="form-control @error('book_lang') is-invalid @enderror"
                                id="languagebook" placeholder="Language of Book" name="book_lang" value="{{ old('book_lang') }}" required />
                            @error('book_lang')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="pubbook">Publisher</label>
                            <input type="text" class="form-control @error('book_publisher') is-invalid @enderror" id="pubbook" placeholder="Publisher of Book"
                                name="book_publisher" value="{{ old('book_publisher') }}" />
                                @error('book_publisher')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-3 w-25">
                            <label for="datetimepicker1">Date of Publish</label>
                            <input type="date" data-provide="datepicker" class="form-control @error('book_publishDate') is-invalid @enderror" id="datetimepicker1" name="book_publishDate"
                                placeholder="Date of Publish of Book" value="{{ old('book_publishDate') }}" />
                                @error('book_publishDate')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="isbnbook">ISBN</label>
                            <input type="text" class="form-control @error('book_isbn') is-invalid @enderror" id="isbnbook" placeholder="ISBN of Book"
                                name="book_isbn" value="{{ old('book_isbn') }}" />
                                @error('book_isbn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                                @enderror
                        </div>
                        <div class="form-group mt-3">
                            <label for="exampleFormControlSelect1">Genre of Book</label>
                            <select class="form-select" name="category_id">
                                @foreach ($categories as $category)
                                    @if (old('category_id') == $category->id)
                                    <option value="{{ $category->id }}" selected>{{ $category->category_name }}</option>
                                    @else
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                    @endif
                                @endforeach
                                
                            </select>
                        </div>

                        <div class="mt-5 text-right">
                            <input type="submit" class="btn btn-prim profile-button" value="Upload" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <script>
    const title = document.querySelector('#titlebook');
    const slug = document.querySelector('#titleslug');

    title.addEventListener('change', function () {
        fetch('/uploadbook/checkSlug?title=' + title.value)
            .then(response =>response.json())
            .then(data => slug.value = data.slug)
    });
</script> -->

@endsection