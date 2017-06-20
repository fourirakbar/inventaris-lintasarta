<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Tikpro;

class TikproController extends Controller
{
    public function index(Request $request) {
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get();   
        return view('tikpro.showtikpro', compact('jebret'));
    }

    public function edit(Request $request) {
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get();   
        return view('tikpro.edittikpro', compact('jebret'));
    }

    public function update(Request $request){
    	
      $deadline1 = $request->DEADLINE[0];
      $deadline2 = $request->DEADLINE[1];
      $deadline3 = $request->DEADLINE[2];
      $deadline4 = $request->DEADLINE[3];
      $deadline5 = $request->DEADLINE[4];
      $deadline6 = $request->DEADLINE[5];
      $deadline7 = $request->DEADLINE[6];
      $deadline8 = $request->DEADLINE[7];
      $deadline9 = $request->DEADLINE[8];
        $jebret = DB::statement("UPDATE TIKPRO
                                   SET DEADLINE = CASE ID_TIKPRO 
                                                      WHEN '1' THEN '$deadline1'
                                                      WHEN '2' THEN '$deadline2'
                                                      WHEN '3' THEN '$deadline3'
                                                      WHEN '4' THEN '$deadline4'
                                                      WHEN '5' THEN '$deadline5'
                                                      WHEN '6' THEN '$deadline6'
                                                      WHEN '7' THEN '$deadline7'
                                                      WHEN '8' THEN '$deadline8'
                                                      WHEN '9' THEN '$deadline9'
                                                      ELSE DEADLINE
                                                      END
                                 WHERE ID_TIKPRO IN('1', '2', '3', '4', '5', '6', '7', '8', '9');");
    	  $url = 'showtikpro';
        return redirect($url)->with('success','Sukses Update Data');
    }

}
