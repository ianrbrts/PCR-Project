<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){
        $this->validate($request, [
            'email'=>'required|email',
            'password'=>'required',
        ]);

        if(!auth()->attempt($request->only('email', 'password'))){
            return back()->with('status', 'Email or password is incorrect.');
        }
        
        return redirect()->route('dashboard');
    }
}
