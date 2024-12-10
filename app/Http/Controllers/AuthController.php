<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function create(){
        return view('auth.register');
    }

    public function store(){
        $formData = request()->validate([
            'name' =>['required', Rule::unique('users','name')],
            'username'=>['required', Rule::unique('users', 'username')],
            'email'=>['required', Rule::unique('users', 'email')],
            'password'=>'required|min:5'
        ]);

        $user = User::create($formData);
        // session()->flash('success', 'Welcome, '.$user->name.'!');

        Auth::login($user);

        return redirect('/')->with('success', 'Welcome, '.$user->name.'!');
    }

    // handle Logout
    public function logout(){
        Auth::logout();
        return redirect('/')->with('success', 'Good Bye!');
    }

    // login view
    public function login(){
        return view('auth.login');
    }

    //handle Login
    public function handleLogin(){
        $formData = request()->validate([
            'email' => ['required', 'email', Rule::exists('users', 'email')],
            'password'=> ['required']
        ]);
        if(Auth::attempt($formData)){
            if(Auth::user()->is_admin){
                return redirect('/admin/blogs');;
            }
            else{
                return redirect('/')->with('success', 'Welcom Back!');
            }
        }
        else{
            return redirect()->back()->withErrors([
                'password' => 'No credentials found!'
            ]);
        }
    }
}
