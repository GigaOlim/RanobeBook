<?php

namespace App\Http\Controllers;

use App\Models\Agent;
use App\Models\Club;
use App\Models\Countries;
use App\Models\Players;
use App\Models\Roles;
use App\Models\StatusPlayers;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    public function index(User $user, Agent $agents, Players $players, Roles $roles, Club $club, StatusPlayers $status, Countries $countries) {
        $user = $user->find(Auth::user()->id);
        $years = Carbon::parse($user->date_birth)->age;

        $playersId = $players->pluck('id')->all();
        $agentsId = $agents->pluck('id')->all();


        $users = $user->whereNotIn('id', $playersId)->whereNotIn('id', $agentsId)->get()->where('id', '!=', Auth::user()->id);
        $usersAgents = User::where('id', '!=', Auth::user()->id)->whereNotIn('role_id', ['2', '3'])->whereNotIn('id', $playersId)->whereNotIn('id', $agentsId)->get();


        $roles = $roles->where('name', '!=', 'Администратор')->get();
        $agents = $agents->all();
        $countries = $countries->all();
        $players = $players->all();
        $club = $club->all();
        $status = $status->all();
        $employees = $user->where('role_id', 3)->get();

        return view('admin.index', compact('user', 'years', 'users', 'agents', 'players', 'roles', 'usersAgents', 'club', 'status', 'employees', 'countries'));
    }

    // ! Function

    public function addRole()
    {
        $data = request()->validate([
            'user_id' => ['required', 'int'],
            'role_id' => ['required', 'int'],
        ]);

        if($data['role_id'] != 2)
        {
            User::where('id', $data['user_id'])->update([
                'role_id' => $data['role_id'],
            ]);
            return back()->with("status", "Роль успешно применена");
        }
        else
        {
            return back()->with("error", "Ошибка");
        }

    }

    public function addAgent(Request $request) {
        $validator = Validator::make($request->all(), [
            'agent_id' => 'required|integer',
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }

        Agent::create([
            'id' => $request->get('agent_id'),
        ]);


        return back()->with('status', 'Агент успешно добавлен');
    }

    public function addPlayer() {
        $data = request()->validate([
            'user' => ['required', 'int'],
            'agent' => ['required', 'int'],
            'club' => ['required', 'int'],
            'status' => ['required', 'int'],
            'transfer' => ['required', 'int'],
        ]);

        Players::create([
            'id' => $data['user'],
            'transfer_price' => $data['transfer'],
            'club_id' => $data['club'],
            'status_id' => $data['status'],
            'agent_id' => $data['agent'],
        ]);

        return back()->with('status', 'Игрок успешно добавлен');


    }

    public function destroyPlayer($id)
    {
        $player = Players::find($id);

        if($player != Null) {
            $player->delete();
            return back()->with('status', 'Игрок успешно удалён');
        }
        else
            abort(404);
    }

    public function addClub(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'club' => 'required|string',
            'country' => 'required|integer'
        ]);

        if ($validator->fails())
        {
            return redirect()->back();
        }

        Club::create([
            'name' => $request->get('club'),
            'country_id' =>$request->get('country'),
        ]);

        return back()->with('status', 'Клуб успешно добавлен');
    }
}
