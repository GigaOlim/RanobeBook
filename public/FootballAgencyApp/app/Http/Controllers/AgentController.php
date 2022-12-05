<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AgentController extends Controller
{
    public function index() {
        $agents = Agent::all();
        return view('agent.index', compact('agents'));
    }

    public function infoAgent($id) {
        $agent = Agent::where('id', $id)->first();

        return view('agent.showAgent', compact('agent'));
    }

    public function search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'search' => 'required|string',
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }

        $agents = Agent::join('users', 'users.id', '=', 'agents.id')
                            ->where('name', 'LIKE', '%'.$request->get('search').'%')
                            ->orWhere('surname', 'LIKE', '%'.$request->get('search').'%')->get();

        return view('agent.index', compact('agents'));
    }
}
