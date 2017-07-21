<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Permintaan;

class UserController extends Controller
{
    public function index(){
    	return view('userinterface.usersearch');
    }

    public function show(Request $request){
    	$permintaan = DB::table('PERMINTAAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	$peminjaman = DB::table('PEMINJAMAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	$repair = DB::table('REPAIR')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	if (count($permintaan) != 0) {
    		$showdata = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    		$jebret2 = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $permintaan[0]->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            $boi = DB::table('HISTORY_TIKPRO')->select('*')->join('PERMINTAAN','PERMINTAAN.ID_PERMINTAAN', '=', 'HISTORY_TIKPRO.PERMINTAAN_ID')->where('PERMINTAAN.ID_PERMINTAAN', $permintaan[0]->ID_PERMINTAAN)->get(); //ambil data dari table HISTORY_TIKPRO dan table PERMINTAAN dengan ketentuan yang sudah diberikan
            // $count = DB::table('TIKPRO')->whereNotNull('NAMA_TIKPRO')->count();
            $count = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $permintaan[0]->ID_PERMINTAAN)->count();
	        return view('permintaan.usershowpermintaan', compact('showdata', 'jebret2', 'boi', 'count'));
    	}
    	elseif (count($peminjaman) != 0){
    		$peminjaman = DB::table('PEMINJAMAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
            // dd($peminjaman);
	        return view('peminjaman.usershowpeminjaman', compact('peminjaman'));
    	}
    	elseif (count($repair) != 0){
    		$data = $repair[0];
            // dd($data);
            return view('repair.usershowrepair', compact('data')); //return view halaman showRepair
    	}
        else{
            return view('userinterface.usersearchnotfound');
        }
    }

    public function showCancel(Request $request) {
        dd($request);
    }

    public function cancel() {

    }
}
