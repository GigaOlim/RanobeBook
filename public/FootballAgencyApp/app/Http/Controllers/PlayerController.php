<?php

namespace App\Http\Controllers;

use App\Models\Players;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PlayerController extends Controller
{
    public function index()
    {
        $players = Players::all();
        return view('players.index', compact('players'));
    }

    public function infoPlayer($id) {
        $player = Players::where('id', $id)->first();
        return view('players.showPlayer', compact('player'));
    }

    public function search(Request $request) {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }

        $players = Players::join('users', 'users.id', '=', 'players.id')
                            ->where('name', 'LIKE', '%'.$request->get('search').'%')
                            ->orWhere('surname', 'LIKE', '%'.$request->get('search').'%')->get();

        return view('players.index', compact('players'));
    }
}
