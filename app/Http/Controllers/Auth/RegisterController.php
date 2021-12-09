<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{
    public function __construct()
    {
        $this->middleware(['guest']);
    }

    public function index(){
        return view('auth.register');
    }

    public function store(Request $request){
        //validate
        $this->validate($request, [
            'username' => 'required|max:255',
            'password' => 'required|confirmed'
        ]);

        //store
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password)
        ]);

        //signin
        auth()->attempt($request->only('username', 'password'));

        //redirect
        return redirect()->route('dashboard');
    }
}
