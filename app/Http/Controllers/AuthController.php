<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create(){
        return view('register.index');
    }

    public function store(){
        $formData = request()->validate([
            'name' =>['required', Rule::unique('users','name')],
            'username'=>['required', Rule::unique('users', 'username')],
            'email'=>['required', Rule::unique('users', 'email')],
            'password'=>'required|min:5'
        ]);

        User::create($formData);

        return redirect('/');
    }
}
