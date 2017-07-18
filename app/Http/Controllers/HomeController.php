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

    public function showbatal()
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

    public function showminta()
    {	
    	$jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->get(); //ambil data dari table PERMINTAAN dan table TIKPRO dengan ketentuan yang sudah diberikan
        $jebret2 = DB::table('TIKPRO')->get(); //ambil semua data dari tabel TIKPRO
        $deadline = array();
	    for ($i = 1 ; $i <= count($jebret2) ; $i++){
	      if (empty($deadline)) {
	        array_push($deadline, $jebret2[$i-1]->DEADLINE);
       	  }
	      else{
	          array_push($deadline, $jebret2[$i-1]->DEADLINE + $deadline[$i-2]); 
	      }
	    }
        return response()->json(['success' => true, 'minta' => "coming soon"]);
    }

    public function showpinjam()
    {
        $createnow = date_create();
        $datenow = date_format($createnow, 'Y-m-d');        
        $pinjamreturn = DB::table('PEMINJAMAN')->select('TGL_PENGEMBALIAN')->get();
        $arraydatepinjam=array();
        foreach ($pinjamreturn as $return) {
        	$new = date_add(date_create($return->TGL_PENGEMBALIAN),date_interval_create_from_date_string("1 days"));
        	array_push($arraydatepinjam, $new);
        }
        // $arraydebug = array();
        $counter = 0;
        foreach ($arraydatepinjam as $arrayreturn) {
        	$diff=date_diff(date_create($datenow),$arrayreturn);        	
        	$beda = $diff->format("%R%a");
        	// array_push($arraydebug, $beda);
        	if ($beda <= 0) {
        		$counter++;
        	}
        }
        return response()->json(['success' => true, 'pinjam' => $counter]);
    }

    public function showrepair()
    {
        $createnow = date_create();
        $datenow = date_format($createnow, 'Y-m-d');        
        $repairreturn = DB::table('REPAIR')->select('PERKIRAAN_SELESAI')->where('STATUS_REPAIR', '=', 'On Repair')->get();
        $arraydaterepair=array();
        foreach ($repairreturn as $return) {
        	$new = date_add(date_create($return->PERKIRAAN_SELESAI),date_interval_create_from_date_string("1 days"));
        	array_push($arraydaterepair, date_create($return->PERKIRAAN_SELESAI));
        }
        // $arraydebug = array();
        $counter = 0;
        foreach ($arraydaterepair as $arrayreturn) {
        	$diff=date_diff(date_create($datenow),$arrayreturn);        	
        	$beda = $diff->format("%R%a");
        	// array_push($arraydebug, $beda);
        	if ($beda <= 0) {
        		$counter++;
        	}
        }
        return response()->json(['success' => true, 'repair' => $counter]);
    }
}
