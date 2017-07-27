<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Permintaan;
use App\Pembatalan;
use App\Tikpro;
use App\User;
use App\HistoryTikpro;
use Session;

class EditProfileController extends Controller
{
    public function index() {
      $id = Auth::user()->ID_REQUESTER;
      $profile = DB::table('REQUESTER')->where('ID_REQUESTER', $id)->get();
      // dd($profile);
      return view('profile.editProfile',compact('profile'));
    }

    public function input(Request $request, $ID_REQUESTER) {
      $find = User::find($ID_REQUESTER);
      $passlama = Input::get('password_lama');
      $passhash = Hash::make($passlama);
      $passbaru = Hash::make(Input::get('password'));
      $passlamadb = DB::table('REQUESTER')->select('password')->where('ID_REQUESTER', $ID_REQUESTER)->get();
      
      if(Hash::check($passlama, $passlamadb[0]->password)){
        User::find($ID_REQUESTER)->update($request->all());
        DB::table('REQUESTER')->where('ID_REQUESTER', $ID_REQUESTER)->update(['password' => $passbaru]);
        return redirect('/editprofile/{ID_REQUESTER}')->with('sukses','Sukses Update Profile!');
      }
      else {
        return redirect('/editprofile/{ID_REQUESTER}')->with('gagal','Password Lama yang Anda Inputkan Salah!');
      }
    }
}
