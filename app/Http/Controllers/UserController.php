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
    //fungsi untuk menampilkan halaman view usersearch
    public function index(){
    	return view('userinterface.usersearch');
    }

    //fungsi untuk menampilkan data sesuai dengan nomor tiket
    public function show(Request $request){
        //listing data pada tabel permintaan sesuai dengan nomor tiket yagn diinput
    	$permintaan = DB::table('PERMINTAAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	//listing data pada tabel peminjman sesuai dengan nomor tiket yagn diinput
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	//listing data pada tabel repair sesuai dengan nomor tiket yagn diinput
        $repair = DB::table('REPAIR')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    	
        //cek apakah ada data pada variabel $permintaan
        if (count($permintaan) != 0) {
            //show permintaan berdasarkan nomor tiket yang diinput
    		$showdata = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
    		$jebret2 = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $permintaan[0]->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            $boi = DB::table('HISTORY_TIKPRO')->select('*')->join('PERMINTAAN','PERMINTAAN.ID_PERMINTAAN', '=', 'HISTORY_TIKPRO.PERMINTAAN_ID')->where('PERMINTAAN.ID_PERMINTAAN', $permintaan[0]->ID_PERMINTAAN)->get(); //ambil data dari table HISTORY_TIKPRO dan table PERMINTAAN dengan ketentuan yang sudah diberikan
            // $count = DB::table('TIKPRO')->whereNotNull('NAMA_TIKPRO')->count();
            $count = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $permintaan[0]->ID_PERMINTAAN)->count();
	        return view('permintaan.usershowpermintaan', compact('showdata', 'jebret2', 'boi', 'count'));
    	}
        //cek apakah ada data pada variabel $peminjaman$
    	elseif (count($peminjaman) != 0){
            //show permintaan berdasarkan nomor tiket yang diinput
    		$peminjaman = DB::table('PEMINJAMAN')->select('*')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get();
            return view('peminjaman.usershowpeminjaman', compact('peminjaman'));
    	}
        //cek apakah ada data pada variabel $repair
    	elseif (count($repair) != 0){
    		$data = $repair[0];
            //show permintaan berdasarkan nomor tiket yang diinput
            return view('repair.usershowrepair', compact('data')); //return view halaman showRepair
    	}
        else{
            //return not found jika nomor tiket yang diinput tidak ada dalam database
            return view('userinterface.usersearchnotfound');
        }
    }
}
