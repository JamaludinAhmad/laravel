<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    //

    public function index(){
        return view('login.register');
    }

    public function store(Request $request){

        //validasi request
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email:dns,rfc|unique:users',
            'password' => 'required|min:5|max:255',
            'repeatpassword' => 'required|min:5|required_with:passsword|same:password',
            // 'terms' => 'boolean:true',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);


        return redirect('/login')->with('success', 'register telah berhasil');
    }
}
