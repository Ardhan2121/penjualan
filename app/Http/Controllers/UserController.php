<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'username' => 'required|unique:users,username',
                'password'=> 'required|confirmed',
            ]
        );

        try {
            User::create([
                'username' => $request->username,
                'password' => Hash::make($request->password),
                'hak' => 'staff'
            ]);
            return redirect()->back()->with('success', "berhasil tambah user");
        } catch(Exception $e){
            return redirect()->back()->withErrors('gagal tambah user');
        }
    }
}
