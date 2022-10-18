<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        $validatedData = $request->validate([
                        'book_title' => 'required|min:3|max:255',
                        'book_price' => 'required|min:3|max:255|unique:users',
                        'book_quantity' => 'required|email:dns|unique:users',
                        'book_pageNum' => 'required|min:6|max:255',
                        'book_lang' => 'required|min:6|max:255',
                        'book_publisher' => 'required|min:6|max:255',
                        'book_publishDate' => 'required|min:6|max:255',
                        'book_isbn' => 'required|min:6|max:255',
                        'book_pageNum' => 'required|min:6|max:255',
                        'book_pageNum' => 'required|min:6|max:255',
                    ]);

        Book::create($validatedData);

        return redirect('/login')->with('success', 'Registeration Successful! Please login.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBookRequest  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
