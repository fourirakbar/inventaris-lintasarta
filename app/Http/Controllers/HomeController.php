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

    // public function showbatal()
    // {
    //     $createnow = date_create();
    //     $datenow = date_format($createnow, 'Y-m-d');
    //     $pembatalandate = DB::table('PEMBATALAN')->select('updated_at')->get();
    //     $arraydatebatal=array();
    //     foreach ($pembatalandate as $batal) {
    //     	array_push($arraydatebatal, date_format(date_create($batal->updated_at), 'Y-m-d'));
    //     }
    //     $counter = 0;
    //     foreach ($arraydatebatal as $arraybatal) {
    //     	$diff=date_diff(date_create($datenow),date_create($arraybatal));
    //     	$beda = $diff->format("%a");
    //     	if ($beda == 0) {
    //     		$counter++;
    //     	}
    //     }
    //     return response()->json(['success' => true, 'batal' => $counter]);
    // }

    public function showbatal()
    {
        $pembatalan = DB::table('PEMBATALAN')->select('*')->where('STATUS_PEMBATALAN', '=', 'in progress')->get();
        $counter = count($pembatalan);
        return response()->json(['success' => true, 'batal' => $counter]);
    }

    public function showminta()
    {	
    	$jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID order by PERMINTAAN.ID_PERMINTAAN DESC");

        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret2 = array();
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            array_push($jebret2, $jebret2a);
        }
        $deadline = array();
		$deadline2 = array();
		$deadline3 = array();
		$deadline4 = array();
		foreach ($jebret2 as $key) {
		foreach ($key as $value) {
		  array_push($deadline, ["idpermintaan" => $value->ID_PERMINTAAN, "deadline" => $value->DEADLINE, "idtikpro" => $value->TIKPRO_ID]);
		}
		array_push($deadline2, $deadline);
		$deadline = array();

		}
		for ($i=1; $i <= count($deadline2) ; $i++) {
		for ($j=1; $j <= count($deadline2[$i-1]) ; $j++) { 
		  
		  if (empty($deadline3)) {
		    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]);
		  }
		  else{
		    array_push($deadline3, ["idpermintaan" => $deadline2[$i-1][$j-1]["idpermintaan"], "deadline" => $deadline2[$i-1][$j-1]["deadline"]+ $deadline3[$j-2]["deadline"], "idtikpro" => $deadline2[$i-1][$j-1]["idtikpro"]]); 
		  }
		}
		array_push($deadline4, $deadline3);
		$deadline3 = array();
		}

		$counter = 0;
		foreach ($jebret as $key) {
			if ($key->STATUS == "in progress") {
			$date1=date_create();
			$date2=date_create($key->TGL_PERMINTAAN);
			foreach ($deadline4 as $jumlaharray) {
				for ($i=0; $i < count($jumlaharray) ; $i++) { 
					if ($key->TIKPRO_ID == $i && $key->ID_PERMINTAAN == $jumlaharray[$i]["idpermintaan"]) {
					   $deaddead = $jumlaharray[$i]["deadline"];
			  			// echo "true";
				  	}
				}
			}
			// echo '<td style="background-color: green; color: white; text-align: center; vertical-align: middle;" >',$deaddead,'</td>';
			$new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead-3)." days"));
			$diff=date_diff($date1,$new);
			$print = $diff->format('%R%a Hari');
			if ($print <=0) {
				$counter++;
			}
			}
		}

        return response()->json(['success' => true, 'minta' => $counter]);
    }

    public function showpinjam()
    {
        $createnow = date_create();
        $datenow = date_format($createnow, 'Y-m-d');        
        $pinjamreturn = DB::table('PEMINJAMAN')->select('TGL_PENGEMBALIAN')->where('KETERANGAN', '!=', 'done')->get();
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
        $repairreturn = DB::table('REPAIR')->select('PERKIRAAN_SELESAI')->where('STATUS_REPAIR', '!=', 'Done')->get();
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

    public function showpinjam2(){
        $peminjaman = DB::select("SELECT * FROM `PEMINJAMAN` WHERE TGL_PENGEMBALIAN < NOW() AND KETERANGAN != 'done' ");
        // dd($peminjaman);
        return view('peminjaman.showPeminjaman', compact('peminjaman'));
        
    }

    public function showrepair2(){
        $repair = DB::select("SELECT * FROM `REPAIR` WHERE PERKIRAAN_SELESAI < NOW() AND STATUS_REPAIR != 'Done' ");
        // dd($peminjaman);
        return view('repair.showRepair', compact('repair'));
        
    }
    public function showminta2() {
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and STATUS = 'in progress' and DATE_ADD(PERMINTAAN.TGL_PERMINTAAN, INTERVAL DEADLINE_NEW DAY) < NOW() order by PERMINTAAN.ID_PERMINTAAN DESC");

        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        // dd($jebret);
        // dd($jebret);
        // dd($jebret); //ambil data dari table PERMINTAAN dan table TIKPRO dengan ketentuan yang sudah diberikan
        // $jebret3 = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->select('PERMINTAAN.ID_PERMINTAAN')->get();
        // dd($jebret3);
        $jebret2 = array();
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            array_push($jebret2, $jebret2a);
        }
        // dd($jebret2);

        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2', 'tglselesai')); //return view ke halaman semuaPermintaan dengan data dari variable $jebret dan $jebret2
    }
}
