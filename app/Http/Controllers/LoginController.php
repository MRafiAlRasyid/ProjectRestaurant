<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function authenticate(Request $request){
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)){
            $users = Auth::user();
            
            if ($users->role === 'admin') {
                return redirect()->route('admin.dashboard.index');
            } else {
                return redirect('/');
            }

            $request->session()->regenerate();
            return redirect()->route('admin.dashboard.index');
        }
        return back()->with('error', 'Login gagal!');
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}