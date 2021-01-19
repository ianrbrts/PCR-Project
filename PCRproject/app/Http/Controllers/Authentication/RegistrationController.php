<?php

namespace App\Http\Controllers\Authentication;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegistrationController extends Controller
{
    public function index(){
        return view('auth.register');
    }

    public function post(Request $request){
        // validation for form
        $this->validate($request, [
            'username' => 'required|max:100|min:5',
            'email' => 'required|max:100',
            'password' => 'required|confirmed',
        ]);

        // add user to mysql
        User::create([
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // sign in user

        // direct to home page
    }
}
