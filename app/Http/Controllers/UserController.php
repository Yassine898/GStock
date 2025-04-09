<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request)
    {

        $credentials=$request->validate([
            'email'=>'email|required',
            'password'=>'min:8|required',
        ]);
            $request->flash();
        $user=User::where('email',$credentials['email'] )->first();
        if(!$user || !Hash::check($credentials['password'],$user->password)){
          return redirect('/login')->with('notFound','Incorrect Cardentiels');
        };
        $request->session()->put('user_id',$user->id);
        return redirect('/');

    }
}
