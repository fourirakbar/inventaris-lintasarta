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
use App\Peminjaman;
use App\Repair;
use App\Tikpro;
use App\HistoryTikpro;
use Session;

class HomeController extends Controller
{
    //fungsi untuk menampilkan halaman home
    public function index()
    {
    	return view('home');
        echo $counter;
    }

    //fungsi untuk menghitung permintaan pembatalan yang belum diproses
    public function showbatal()
    {
        //list semua data permintaan yang dibatalkan dan belum di proses
        $pembatalan = DB::table('PEMBATALAN')->select('*')->where('STATUS_PEMBATALAN', '=', 'in progress')->get();
        //menghitung banyak data pada variabel $pembatalan
        $counter = count($pembatalan);
        //mengirim response dalam bentuk json ke javascript di view/halaman 'home'
        return response()->json(['success' => true, 'batal' => $counter]);
    }

    public function showminta()
    {	//query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan)
    	$jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID order by PERMINTAAN.ID_PERMINTAAN DESC");

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan) 
        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk mengambil data pada kolom tanggal selesai)
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        
        //inisiasi array
        $jebret2 = array();

        //looping seluruh data pada variabel $jebret3 sebagai variabel $key
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get();
            //memasukkan seluruh data pada variabel $jebret2a kedalam array $jebret2
            array_push($jebret2, $jebret2a);
        }

        //inisiasi array
        $deadline = array();
        $deadline2 = array();
        $deadline3 = array();
        $deadline4 = array();
        //looping seluruh data array pada variabel $jebret2
          foreach ($jebret2 as $key) {
            //looping seluruh data array pada setiap array yang didifinisikan dalam variabel $key
            foreach ($key as $value) {
            //memasukkan seluruh ID_PERMINTAAN, deadline, id tikpro pada setiap data permintaan ke variabel $deadline
              array_push($deadline, ["idpermintaan" => $value->ID_PERMINTAAN, "deadline" => $value->DEADLINE, "idtikpro" => $value->TIKPRO_ID]);
            }
            //memasukkan variabel $deadline setiap loop kedalam variabel $deadline2
            array_push($deadline2, $deadline);
            //mengosongkan variabel $deadline agar mereset setiap looping
            $deadline = array();

          }
          //masukkan seluruh idpermintaan, deadline, id tikpro ke variabel $deadline4
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
          //looping ke seluruh data, mengambil tanggal selesai dari data permintaan
          $counter = 0;
          foreach ($jebret as $key) {
              $arraytglselesai = array();
            foreach ($tglselesai as $index) {
              if ($index->PERMINTAAN_ID == $key->ID_PERMINTAAN) {
                array_push($arraytglselesai, $index->TGL_SELESAI);
              }
            }
            //mencari tanggal selesai pada tikpro yang terakhir dilaksanakan
            foreach ($arraytglselesai as $index) {
              if($index != NULL){
                $tglselesaiterakhir = $index;
              }
            }
            //menghitung seluruh data yang statusnya 'in progress' dan titik prosesnya melewati batas waktu
             if ($key->STATUS == "in progress") {
                 $deadlinebaru = array_reverse($deadline4);
                 foreach ($deadlinebaru as $jumlaharray) {
                  for ($i=1; $i <= count($jumlaharray) ; $i++) {
                    if ($key->TIKPRO_ID == $i && $key->ID_PERMINTAAN == $jumlaharray[$i-1]["idpermintaan"]) {
                      if ($key->TIKPRO_ID == 1) {
                        $date1=date_create();
                        $date2=date_create($key->TGL_PERMINTAAN);
                        $deaddead = $key->DEADLINE;
                        $new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead)." days"));
                        $diff=date_diff($date1,$new);
                        $print = $diff->format('%R%a Hari');
                        if ($print <= 0) {
                             $counter++;
                         } 
                      }
                      else{
                        $date1=date_create();
                        $date2=date_create($tglselesaiterakhir);
                        $deaddead = $key->DEADLINE;
                        $new = date_add($date2,date_interval_create_from_date_string((string)((int)$deaddead)." days"));
                        $diff=date_diff($date1,$new);
                        $print = $diff->format('%R%a Hari');
                        if ($print <= 0) {
                             $counter++;
                         }
                      }
                    }
                  }
                }
            }
          }
        //mengirim response dalam bentuk json ke javascript di view/halaman 'home'
        return response()->json(['success' => true, 'minta' => $counter]);
    }

    //fungsi untuk menghitung peminjaman yang lebih dari batas waktu
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

    //fungsi untuk menghitung barang yang sedang diperbaiki yang melewati batas waktu
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
        $counter = 0;
        foreach ($arraydaterepair as $arrayreturn) {
        	$diff=date_diff(date_create($datenow),$arrayreturn);        	
        	$beda = $diff->format("%R%a");
        	if ($beda <= 0) {
        		$counter++;
        	}
        }
        return response()->json(['success' => true, 'repair' => $counter]);
    }

    //fungsi untuk menampilkan data peminjaman yang lewat dari batas waktu
    public function showpinjam2(){
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('TGL_PENGEMBALIAN','>','NOW()')->where('KETERANGAN','!=','done')->get(); //ambil semua data dari tabel PEMINJAMAN
        $count = $peminjaman->count();
        $data = DB::table('PEMINJAMAN')->join('BARANG','BARANG.ID_BARANG','=','PEMINJAMAN.ID_BARANG')->select('PEMINJAMAN.ID_PEMINJAMAN', 'PEMINJAMAN.ID_BARANG', 'PEMINJAMAN.NOMOR_TICKET', 'PEMINJAMAN.PERANGKAT', 'PEMINJAMAN.NOMOR_REGISTRASI as w', 'PEMINJAMAN.CATATAN_PEMINJAMAN', 'PEMINJAMAN.TGL_PEMINJAMAN', 'PEMINJAMAN.TGL_PENGEMBALIAN', 'PEMINJAMAN.KETERANGAN', 'BARANG.NOMOR_REGISTRASI as q', 'BARANG.NAMA_BARANG')->where('PEMINJAMAN.TGL_PENGEMBALIAN','>','NOW()')->where('PEMINJAMAN.KETERANGAN','!=','done')->get();
        dd($data);
        return view('peminjaman.showPeminjaman', compact('peminjaman', 'count', 'data')); //return ke halaman showPeminjaman dengan data dari variable $peminjaman
        // $peminjaman = DB::select("SELECT * FROM `PEMINJAMAN` WHERE TGL_PENGEMBALIAN > NOW() AND KETERANGAN != 'done' ");
        // dd($peminjaman);
        // return view('peminjaman.showPeminjaman', compact('peminjaman'));
        
    }

    //fungsi untuk menampilkan data perbaikan yang lewat dari batas waktu
    public function showrepair2(){
        $repair = DB::table('REPAIR')->select('*')->where('PERKIRAAN_SELESAI','>','NOW()')->where('STATUS_REPAIR','!=','Done')->get();
        $count = $repair->count();
        $data = DB::table('REPAIR')->join('BARANG','BARANG.ID_BARANG','=','REPAIR.ID_BARANG')->select('REPAIR.ID_PERBAIKAN','REPAIR.ID_BARANG','REPAIR.NOMOR_TICKET','REPAIR.NAMA_BARANG as q','REPAIR.NOMOR_REGISTRASI as w','REPAIR.PROBLEM','REPAIR.VENDOR','REPAIR.KETERANGAN_REPAIR','REPAIR.CATATAN_REPAIR','REPAIR.STATUS_REPAIR','REPAIR.TANGGAL_REPAIR','REPAIR.PERKIRAAN_SELESAI','BARANG.NOMOR_REGISTRASI as e','BARANG.NAMA_BARANG as r')->where('REPAIR.PERKIRAAN_SELESAI','>','NOW()')->where('REPAIR.STATUS_REPAIR','!=','Done')->get();
        // dd($data);
        return view('repair.showRepair', compact('repair','count','data'));
        // $repair = DB::select("SELECT * FROM `REPAIR` WHERE PERKIRAAN_SELESAI > NOW() AND STATUS_REPAIR != 'Done' ");
        // dd($peminjaman);
        // return view('repair.showRepair', compact('repair'));
        
    }

    //fungsi untuk menampilkan data permintaan yang lewat dari batas waktu
    public function showminta2() {
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and STATUS = 'in progress' and DATE_ADD(PERMINTAAN.TGL_PERMINTAAN, INTERVAL DEADLINE_NEW DAY) > NOW() order by PERMINTAAN.ID_PERMINTAAN DESC");

        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret2 = array();
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            array_push($jebret2, $jebret2a);
        }

        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2', 'tglselesai')); //return view ke halaman semuaPermintaan dengan data dari variable $jebret dan $jebret2
    }

    public function showminta3()
    {
        $counter = Permintaan::where('STATUS', 'in progress')->count();
        return response()->json(['success' => true, 'minta' => $counter]);
    }

    public function showpinjam3()
    {
        $counter = Peminjaman::where('KETERANGAN', 'progress')->count();
        return response()->json(['success' => true, 'pinjam' => $counter]);
    }

    public function showrepair3()
    {
        $counter = Repair::where('STATUS_REPAIR', 'On Repair')->count();
        return response()->json(['success' => true, 'repair' => $counter]);
    }
}
