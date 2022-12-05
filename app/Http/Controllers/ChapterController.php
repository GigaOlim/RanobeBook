<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Chapter;
use App\Models\Volume;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ChapterController extends Controller
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
    public function create(Book $book)
    {
        $volume = $book->volumes;
        if (!empty($volume))
        {
            return view('chapter-add', compact('volume','book'));
        }
        else{
            return view('volume-add', ['book'=> $book ]);
        }

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
            'number' => 'required',
            'name' => 'required',
            'volume' => 'required',
            'content' => 'required',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('book.show', ['book'=> $book ])->withErrors($validator);
        }

        $chapter = Chapter::create([
            'number'=>$request->get('number'),
            'name'=>$request->get('name'),
            'volume_id'=>$request->get('volume'),
            'content'=>$request->get('content'),

        ]);

        return redirect()->route('book.show', ['book'=> $book ])->with('success', 'Inserted');
    }


    public function show(Chapter $chapter)
    {
        $bookId = $chapter->volume->book->id;


        $next = Chapter::select('chapters.id')->join('volumes', 'volumes.id', '=', 'chapters.volume_id')
                        ->where('book_id', '=', $bookId)
                        ->where('number', '>', $chapter->number)
                        ->orderBy('number')
                        ->first();

        $before = Chapter::select('chapters.id')->join('volumes', 'volumes.id', 'chapters.volume_id')
                        ->where('book_id', '=', $bookId)
                        ->where('number', '<', $chapter->number)
                        ->orderBy('number','asc')
                        ->first();
        $isFirst = $chapter->id == Chapter::select('chapters.id')->join('volumes', 'volume_id', 'volumes.id')->where('book_id', '=', $bookId)->first()->id ? true : false;
        $isLast = $chapter->id == Chapter::select('chapters.id')->join('volumes', 'volume_id', 'volumes.id')->where('book_id', '=', $bookId)->orderBy('id', 'desc')->first()->id ? true : false;
        return view('chapter', compact('chapter', 'isFirst', 'isLast','next','before','bookId'));

    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function edit(Chapter $chapter, $id)
    {
        $user = auth()->user();
        if(auth()->check()) {
            $chapter = Chapter::find($id);
            return view('chapter-edit' , compact('chapter'));
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chapter  $chapter
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Chapter $chapter, $id)
    {
        $chapterId = $chapter->find($id);

        $bookId = $chapterId->volume->book->id;

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'content' => 'required|max:255',
        ]);

        if ($validator->fails())
        {
            return redirect()->route('chapter.edit', ['id' => $id])->withErrors($validator);
        }

        $chapterId->update([
            'name' => $request->get('name'),
            'content' => $request->get('content'),
        ]);

        return redirect()->route('book.show', ['book' => $bookId])->with('success', 'Обновлено');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Chapter $chapter, $id)
    {

        if(auth()->check()) {
            $chapterId = $chapter->find($id);
            $bookId = $chapterId->volume->book->id;

            $chapterId->delete();
            return redirect()->route('book.show', ['book' => $bookId])->with('success', 'Обновлено');
        }
        else
        {
            abort(404);
        }
    }
}

