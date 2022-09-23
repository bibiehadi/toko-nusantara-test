<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('index' , [
            'title' => 'Login Page',
        ]); 
    }

    public function authenticate(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required' 
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed!!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }

    public function nomor2(){
        $x = 8;
        for ($i=1; $i <= $x; $i++) { 
            for ($j=1; $j <= $i ; $j++) { 
                echo $j.' ';
            }
            echo "<br>";
        }
    }

    public function nomor3(){
        $n = 5;
        for ($i=0; $i < $n; $i++) { 
            for ($j=1; $j <= $n+$i; $j++) { 
                if($j>=$n-$i){
                    echo '*';
                }else{
                    echo '_';
                }
            }
            echo "<br>";
        }
    }
}
