<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
    	return view('auth.register');
    }

    public function create() {
        $data = Input::all();
        $pass = Hash::make($data['password']);
        $jenisuser = 'admin';
        $username = $data['nama'];
        if (User::where('username','=', $username)->exists()) {
            return redirect('register')->with('error','Username Sudah Digunakan!');            
        }
        else {
            User::insertGetId(array(
                'NAMA_REQUESTER' => $data['nama'],
                'USERNAME' => $data['username'],
                'PASSWORD' => $pass,
                'jenis_user' => $jenisuser,
            ));

            return redirect('register')->with('success','Register Admin Baru Berhasil');
        }
    }
}
