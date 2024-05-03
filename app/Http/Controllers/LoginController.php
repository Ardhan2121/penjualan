<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $data = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($data)){
            $request->session()->regenerate();
            return redirect()->intended();
        }
        return redirect()->back()->withErrors('login gagal');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }
}
