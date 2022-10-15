@extends('layouts\main')

@section('container')

<div class="main-wrapper mt-4">
    <div class="container rounded bg-white mt-5 mb-5">
        <div class="col-xs-5">
            <div class="p-2 py-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="text-right">Upload Book Information 📒📝</h4>
                </div>
                <div class="row mt-3">
                    <form>
                        <div class="form-group">
                            <img id="blah" alt="your image" width="100" height="100" />
                            <input type="file"
                                onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="titlebook">Title</label>
                            <input type="text" class="form-control" id="titlebook" placeholder="Title of Book" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="authorbook">Author</label>
                            <input type="text" class="form-control" id="authorbook" placeholder="Author of Book" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="decriptionbook">Description</label>
                            <textarea class="form-control" id="decriptionbook" placeholder="Description of Book"
                                rows="3"></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <label for="pricebook">Price</label>
                            <input type="text" class="form-control" id="pricebook" placeholder="Price of Book" />
                        </div>
                        <div class="form-group mt-3">
                            <label for="pagenumbook">Page Number</label>
                            <input type="text" class="form-control" id="pagenumbook"
                                placeholder="Page Number of Book" />
                        </div>
                </div>
                <div class="form-group mt-3">
                    <label for="datetimepicker1">Date of Publish</label>
                    <input type="text" class="form-control" id="datetimepicker1"
                        placeholder="Date of Publish of Book" />
                </div>
                <div class="form-group mt-3">
                    <label for="pubbook">Publisher</label>
                    <input type="text" class="form-control" id="pubbook" placeholder="Publisher of Book" />
                </div>
                <div class="form-group mt-3">
                    <label for="languagebook">Languange</label>
                    <input type="text" class="form-control" id="languagebook" placeholder="Language of Book" />
                </div>
                <div class="form-group mt-3">
                    <label for="isbnbook">ISBN</label>
                    <input type="text" class="form-control" id="isbnbook" placeholder="ISBN of Book" />
                </div>
                <div class="form-group mt-3">
                    <label for="itembook">Total Item</label>
                    <input type="text" class="form-control" id="itembook" placeholder="Total Item of Book" />
                </div>
                <div class="form-group mt-3">
                    <label for="exampleFormControlSelect1">Genre of Book</label>
                    <select class="form-control" id="exampleFormControlSelect1">
                        <option>Novel</option>
                        <option>Education</option>
                        <option>Comic</option>
                        <option>Technology</option>
                        <option>Sains</option>
                    </select>
                </div>
                </form>
            </div>
            <div class="mt-5 text-right"><button class="btn btn-prim profile-button" type="button">Upload</button></div>
        </div>
    </div>
</div>
</div>

@endsection