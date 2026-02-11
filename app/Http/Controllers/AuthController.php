<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\SignupRequest;
use App\Models\User;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //
    public function showSignupForm()
    {
        return view('auth.signup', ['pageTitle' => 'Sign Up']);
    }

    public function signup(SignupRequest $request)
    {
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');

        $user->save();

        auth()->login($user);

        return redirect('/');


    }

    public function showLoginForm(){
        return view('auth.login',['pageTitle' => 'Login']);
    }

    public function login(LoginRequest $request){
        $cr = $request->only('email','password');

        if(auth()->attempt($cr)){
            $request->session()->regenerate();//delete if session repeat

            return redirect('/');
        }
        return back()->withErrors([
            'email' => "the provided credent do not match "
        ])->withInput();

    }
    public function logout(){
        auth()->logout();
        return redirect('/');
    }

}
