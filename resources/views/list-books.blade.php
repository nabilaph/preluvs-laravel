@extends('layouts\main')

@section('container')

<div class="wrapper">
    <div id="buttons" class="d-flex justify-content-center">
        <button class="button-value mx-2" onclick="filterProduct('all')">All</button>
        <button class="button-value mx-2" onclick="filterProduct('Comic')">
            Comic
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Novel')">
            Novel
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Education')">
            Education
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Technology')">
            Technology
        </button>
        <button class="button-value mx-2" onclick="filterProduct('Sains')">
            Sains
        </button>
    </div>
    <div id="products" class="container"></div>
</div>

@endsection