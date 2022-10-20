<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use GuzzleHttp\Psr7\Request;
use \Cviebrock\EloquentSluggable\Services\SlugService;

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
        return view('upload-book',[
            'categories' => Category::all(),
            "title" => "Upload Book",
            "active" => 'upload',
            "css" => 'css/upload-book.css',
            "js" => '',
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBookRequest $request)
    {
        // ddd($request);
        $validatedData = $request->validate([
                        'book_title' => 'required|min:3|max:255',
                        'book_pict' => 'image|file|max:3000',
                        'book_price' => 'required|integer',
                        'book_author' => 'required|min:3|max:255',
                        'book_quantity' => 'required|integer',
                        'book_pageNum' => 'required|integer',
                        'book_lang' => 'required|min:6|max:255',
                        // 'book_publisher' => '',
                        // 'book_publishDate' => 'date',
                        // 'book_isbn' => '',
                        'category_id' => 'required',
                    ]);
                    
        if($request->file('book_pict')){
            $validatedData['book_pict'] = $request->file('book_pict')->store('book-pics');
        }

        $validatedData['seller_id'] = auth()->user()->id;

        Book::create($validatedData);

        return redirect('/profile')->with('success', 'Book has been uploaded!');
    }

    public function detailBook(Book $book){
        return view('book-detail',[
            "title" => "Book detail",
            "active" => 'book det',
            "css" => 'css/book-detail.css',
            "js" => '',
            "selected" => Book::where('book_id', $book->book_id)->get(),
        ]);
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        
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
        Book::destroy($book->id);

        return redirect('/profile')->with('deleted', 'Book has been deleted!');
    }

    public function checkSlug(Request $request){
        $slug = SlugService::createSlug(Book::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }
}
