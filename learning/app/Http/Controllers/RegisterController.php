<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create(){
        return view('register.create');
    }

    public function store(){

       $inputs = request()->validate([
            'name' => 'required | min:2',
            'username' => 'required | max:50 |unique:users,username',
            'email' => 'required | email |unique:users,email',
            'password' => 'required | min:8'
        ]);

        $inputs['password'] = bcrypt($inputs['password']);

        $user = User::create($inputs);

        auth()->login($user);

        return redirect('/')->with('success', 'Your account has been created');
    }
}
