<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $book)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'content' => 'required| min:1| max:250',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('welcome')->withErrors($validator);
        }

        $review = Review::create([
            'rate'=>$request->get('rate'),
            'user_id' => auth()->user()->id,
            'content'=>$request->get('content'),
            'book_id'=>$book,
        ]);

        return redirect()->route('book.show', $book)->with('success', 'active show');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function edit(Review $review, $id)
    {
        $user = auth()->user();
        if(auth()->check()) {
            // $review->where('id', $id)->first();
            $review = Review::where('id', $id)->first();
            return view('comment-edit', compact('review'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Review $review, $id)
    {
        $validator = Validator::make($request->all(), [
            'rate' => 'required',
            'content' => 'required|max:255',
        ]);

        $review = $review->find($id);

        if ($validator->fails())
        {
            return redirect()->route('book.show', ['book' => $review->book_id])->withErrors($validator);
        }

        $review->update([
            'rate' => $request->get('rate'),
            'content' => $request->get('content'),
        ]);


        return redirect()->route('book.show', ['book' => $review->book_id])->with('success', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review  $review
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review $review, $id)
    {
        if(auth()->check()) {
            $review = $review->find($id);
            $book_id = $review->book_id;

            $review->delete();
            return redirect()->route('book.show', ['book' => $book_id])->with('success', 'Обновлено');
        }
        else
        {
            abort(404);
        }
    }
}
