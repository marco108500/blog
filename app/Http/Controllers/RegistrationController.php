<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Mail\WelcomeAgain;

class RegistrationController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store()
    {
        //Validate the form
        $this->validate(request(),[
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed'
        ]);


        //create and save the user
        $user = User::create(request(['name','email','password']));



        //sign in newly created user.
        auth()->login($user);

        //Send Welcome mail
        \Mail::to($user)->send(new WelcomeAgain($user));

        //redirect to home page
        return redirect()->home();
    }
}
