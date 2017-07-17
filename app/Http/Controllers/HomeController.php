<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Permintaan;
use App\Pembatalan;
use App\Tikpro;
use App\HistoryTikpro;
use Session;

class HomeController extends Controller
{
    public function index()
    {
    	return view('home');
        // echo $counter;
    }

    public function show()
    {
        $createnow = date_create();
        $datenow = date_format($createnow, 'Y-m-d');
        $pembatalandate = DB::table('PEMBATALAN')->select('updated_at')->get();
        $arraydatebatal=array();
        foreach ($pembatalandate as $batal) {
        	array_push($arraydatebatal, date_format(date_create($batal->updated_at), 'Y-m-d'));
        }
        $counter = 0;
        foreach ($arraydatebatal as $arraybatal) {
        	$diff=date_diff(date_create($datenow),date_create($arraybatal));
        	$beda = $diff->format("%a");
        	if ($beda == 0) {
        		$counter++;
        	}
        }
        return response()->json(['success' => true, 'batal' => $counter]);
    }
}
