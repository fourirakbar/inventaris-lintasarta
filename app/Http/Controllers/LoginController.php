<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\User;
use Auth;
use Illuminate\Support\Facades\Input;

class LoginController extends Controller
{
    
    public function index() {
        return view('auth.login2'); //return ke halaman login2
    }

    public function login(Request $request) {

        $userdata = array(

            'password'  => Input::get('password'),
            'username'     => Input::get('username')
        );
        
        if (Auth::attempt($userdata,true)) //jika data yang diinputkan benar, maka akan ke redirect ke halaman /semua
        {
            return redirect('/semua');
        }
        else{ //jika data yang diinputkan salah, maka akan ke redirect ke halaman login kembali dengan keterangan error
            return redirect('/login')->with('error','Username atau password salah');
        } 

        
    }
    

    public function logout() {
        //session destroy, dan ke redirect ke halaman /login 
        Auth::logout();
        return redirect('/login');
    }
}
