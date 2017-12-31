<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($username)
    {
        $user = User::whereUsername($username)->first();
        // $user = User::where('username', $username);
        // $user = User::where('username','=', $username);

        // return $user->email;

        // dd($user); Debugging
        
        return view('user.profile',compact('user'));
        
        
    }
}
