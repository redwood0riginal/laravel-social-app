<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $formFields = $request->validate([
            'name' => ['required', 'max:20'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8', 'confirmed']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        User::create($formFields);
        return redirect('/')->with('success', 'user successfully created');
    }

    public function login(Request $request){
        $formFields = $request->validate([
            'userEmail' => 'required',
            'userPassword' => 'required'
        ]);

        if(auth()->attempt(['email'=>$formFields['userEmail'], 'password'=>$formFields['userPassword']])) {
            $request->session()->regenerate();
            return redirect('/')->with('success', 'Loged in successfully!!');
        }else{
            return "wrong credentials";
        }

    }
}
