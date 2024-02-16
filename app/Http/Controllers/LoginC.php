<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Models\LogM;
use App\Models\User;

class LoginC extends Controller
{
    public function login()
    {
        $subtitle = "Login";
        return view('login', compact('subtitle'));
    }

    public function login_action(Request $request)
    {

       
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]); 
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            $LogM = LogM::create([ 
                'id_user' => Auth::user()->id,
                'activity' => 'User Melakukan Login'
            ]);

            $request->session()->put('LogM', $LogM);
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'password' => 'Wrong username or password',
        ]);

        $logM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Melakukan Login'
    
        ]);
       
    }

   
    
    public function logout(Request $request)
    {


        $logM = LogM::create([
            'id_user'=>Auth::user()->id,
            'activity'=> 'User Melakukan Logout'
    
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');

       
      
    }

    
}