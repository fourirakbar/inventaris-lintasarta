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
        return view('tikpro.edittikpro', compact('jebret'));
    }

    public function update(Request $request){
    	// $ids = array(1,2,3,4,5,6,7,8,9);
        $jebret = DB::statement("UPDATE TIKPRO
                                   SET DEADLINE = CASE ID_TIKPRO 
                                                      WHEN '1' THEN '$request->DEADLINE1'
                                                      WHEN '2' THEN '$request->DEADLINE2'
                                                      WHEN '3' THEN '$request->DEADLINE3'
                                                      WHEN '4' THEN '$request->DEADLINE4'
                                                      WHEN '5' THEN '$request->DEADLINE5'
                                                      WHEN '6' THEN '$request->DEADLINE6'
                                                      WHEN '7' THEN '$request->DEADLINE7'
                                                      WHEN '8' THEN '$request->DEADLINE8'
                                                      WHEN '9' THEN '$request->DEADLINE9'
                                                      ELSE DEADLINE
                                                      END
                                 WHERE ID_TIKPRO IN('1', '2', '3', '4', '5', '6', '7', '8', '9');");    	// print_r($ids);
    	// print_r($request->DEADLINE1);
    	// Tikpro::whereIn('ID_TIKPRO', $ids)->update($request->except(['_method', '_token']));
        
        $url = 'edittikpro';
        return redirect($url)->with('success','Sukses Update Data');
    }

}
