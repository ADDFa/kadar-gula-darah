<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class Auth extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (session('login')) return redirect()->back();

        return view('login', ['title'   => 'Masuk | Kadar Gula Darah']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (session('login')) return redirect()->back();

        return view('auth.registration', ['title'   => 'Registrasi | Kadar Gula Darah']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required|max:50',
            'email'     => 'required|email:rfc,dns|max:50',
            'password'  => 'required|between:8,255'
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = password_hash($request->password, PASSWORD_DEFAULT);
        $user->save();

        return redirect()->to('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    private function validLogin($email, $password)
    {
        $user = User::where('email', $email)->first();
        if (!$user) return false;
        return password_verify($password, $user->password) ? $user : false;
    }

    public function login(Request $request)
    {
        $user = $this->validLogin($request->email, $request->password);

        if (!$user) return redirect()->to('/')->with([
            'loginFail' => true,
            'message'   => 'Username Atau Password Salah'
        ]);

        session([
            'user_id'   => $user->id,
            'email'     => $user->email,
            'name'      => $user->name,
            'role'      => $user->role,
            'login'     => true
        ]);

        return redirect()->to('sugar');
    }

    public function logout()
    {
        session()->flush();

        return redirect()->to('/');
    }
}
