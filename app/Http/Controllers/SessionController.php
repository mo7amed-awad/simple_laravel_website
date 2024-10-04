<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

use function PHPUnit\Framework\throwException;

class SessionController extends Controller
{
    public function create()
    {
        return view('auth.login');

    }

    public function store()
    {
        $attributes=request()->validate([
            'email'=>['required','email'], 
            'password'=>['required']
        ]);

        if(!Auth::attempt($attributes))
        {
            throw ValidationException::withMessages([
                'email'=>'Sorry, those credentional does not match'
            ]);
        }
        request()->session()->regenerate();
        return redirect('/jobs');
    }
    

    public function destroy()
    {
        Auth::logout();
        return redirect('/');
    }
}
