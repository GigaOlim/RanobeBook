<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Chapter;
use App\Models\Publisher;
use App\Models\Review;
use App\Models\Tag;
use App\Models\User;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $publishers = Publisher::all();
        $authors = Author::all();
        $translator = User::all();
        return view('book-add', compact('tags', 'publishers', 'authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'img' => 'required',
            'title' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'description' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('welcome')->withErrors($validator);
        }

        $book = Book::create([
            'tittle'=>$request->get('title'),
            'description'=>$request->get('description'),
            'publisher_id'=>$request->get('publisher'),
            'author_id'=>$request->get('author'),
            'translator_id'=>auth()->user()->id,
        ]);

        $book->tags()->attach($request->get('tags'));

        return redirect()->route('welcome')->with('success', 'Inserted');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $reviews = Review::where('book_id', $book->id)->orderBy('id', 'desc')->get();
        $chapters = Chapter::select('chapters.id')->join('volumes', 'volumes.id', '=', 'chapters.volume_id')
                             ->where('book_id', $book->id)
                             ->get();
        $reviews_count = $reviews->count();
        $users = User::all();
        $chapters_count = $chapters->count();
        $book_created_at = $book->created_at->format('d-m-Y');
        return view('book', compact('book', 'reviews_count','chapters_count','book_created_at', 'reviews','users'));
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
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
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
