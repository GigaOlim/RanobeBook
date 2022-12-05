<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);

        $years = Carbon::parse($user->date_birth)->age;
        return view('profile.account', compact('user', 'years'));
    }

    public function settings()
    {
        $user = User::find(Auth::user()->id);

        return view('profile.settings', compact('user'));
    }

    // ! Function

    public function changePassword()
    {
        $data = request()->validate([
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);


        if(!Hash::check($data['old_password'], auth()->user()->password)){ // Проверка пароля
            return back()->with("status", "Текущий пароль неверен!");
        }

        User::whereId(auth()->user()->id)->update([ // Обновление данных
            'password' => Hash::make($data['password'])
        ]);
        return back()->with("status", "Пароль успешно сменён!");
    }

    public function changeUserInfo()
    {
        $data = request()->validate([
            'password' => ['required', 'string', 'min:8', 'max: 255'],
            'surname' => ['string', 'min:4', 'max: 255'],
            'name' => ['string', 'min:4', 'max: 255'],
        ]);

        if(!Hash::check($data['password'], auth()->user()->password)){ // Проверка пароля
            return back()->with("status", "Текущий пароль неверен!");
        }

        User::whereId(auth()->user()->id)->update([ // Обновление данных
            'surname' => $data['surname'],
            'name' => $data['name'],
        ]);
        return back()->with("status", "Информация успешно сменёна!");
    }

    public function addImage()
    {
        $data = request()->validate([
            'file' => ['required', 'image', 'dimensions:max_width=350px,max_height=350px'],
        ]);


        $imageName = time() . '.' . $data['file']->extension();
        $data['file']->move(public_path('img/userimage/'), $imageName);

        $file = $imageName;

        if(Auth::user()->photoPath != 'defaultAvatar.png') {
            unlink(public_path('img/userimage' . '/' . Auth::user()->photoPath));
        }

        User::where('id', Auth::user()->id)->update([
            'photoPath' => $file,
        ]);

        return back()->with("status", "Информация успешно сменёна!");
    }

}
