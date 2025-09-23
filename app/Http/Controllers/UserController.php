<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showRegister(){
        return view('register');
    }

    public function register(Request $request){
        $ValidatedUserData = $request -> validate([
            'name' => ['required','min:3'],
            'email' => ['required','email'],
            'password' => ['required','min:8','max:50']
        ]);

        $ValidatedUserData['password'] = bcrypt($ValidatedUserData['password']);

        User::create($ValidatedUserData);

        return view('login');
    }

    public function showLogin(){
        return view('login');
    }

    public function Login(Request $request){

        $LoginData = $request->validate([
            'loginemail'=>'required',
            'loginpassword'=>'required'
        ]);

        if (auth()->attempt(['email'=> $LoginData['loginemail'],'password'=> $LoginData['loginpassword']])){
            $request->session()->regenerate();
            return redirect('/posts');
        }
       
    }

    public function Logout()
    {
        auth()->logout();
        return redirect('/login');
    }
}
