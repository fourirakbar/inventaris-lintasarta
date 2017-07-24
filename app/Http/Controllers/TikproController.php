<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Tikpro;
use App\TikproLama;
use App\TikproTemp;
use App\Log;

class TikproController extends Controller
{
    public function index(Request $request) {
        $count = DB::table('TIKPRO')->select('ID_TIKPRO')->count(); 
        $id1 = DB::table('TIKPRO')->select('ID_TIKPRO')->get();
        $nama1 = DB::table('TIKPRO')->select('NAMA_TIKPRO')->get();
        $deadline1 = DB::table('TIKPRO')->select('DEADLINE')->get();

        $idLama = array();
        $namaLama = array();
        $deadlineLama = array();

        foreach ($id1 as $key) {
          array_push($idLama, $key->ID_TIKPRO);
        }
        foreach ($nama1 as $key) {
         array_push($namaLama, $key->NAMA_TIKPRO); 
        }
        foreach ($deadline1 as $key) {
          array_push($deadlineLama, $key->DEADLINE);
        }
        $last = DB::table('LOG_CLICK')->select('ID_LOG')->orderBy('ID_LOG','DESC')->limit('1')->get();
        // dd($last);
        
        
          $last2 = explode(":", $last); //data dari $ticket dipisahkan dengan ketentuan : (titik dua)
          $last3 = explode("}]", $last2[1]); //dari dari $kuylah index kedua, dipisahkan dengan ketentuan }]
          $lastint = (int)$last3[0];  
        
      
        // dd($lastint);

        $check = DB::table('TIKPRO_LAMA')->select('LOG_ID')->orderBy('LOG_ID','DESC')->limit('1')->get();
        // dd($check);
          $check2 = explode(":", $check);
          $check3 = explode("}]", $check2[1]);
          $checkint = (int)$check3[0];
  

        if ($lastint+1 != $checkint) {
          for ($i=0; $i < $count ; $i++) { 
            TikproLama::insertGetId(array(
                'ID_TIKPRO_LAMA' => $idLama[$i],
                'LOG_ID' => $lastint+1,
                'NAMA_TIKPRO_LAMA' => $namaLama[$i],
                'DEADLINE_TIKPRO_LAMA' => $deadlineLama[$i],
            ));
          }  
        }

        
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get(); //ambil ID_TIKPRO dari tabel Tikpro dan diurutkan ASC
        // dd($jebret);
        return view('tikpro.showtikpro', compact('jebret')); //return view ke halaman showtikpro dengan data dari $jebret
    }

    public function indexo(Request $request) {
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get(); //ambil ID_TIKPRO dari tabel Tikpro dan diurutkan ASC
        // dd($jebret);
        return view('tikpro.showtikproo', compact('jebret')); //return view ke halaman showtikpro dengan data dari $jebret 
    }

    public function edit(Request $request) {
        

        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get(); //ambil ID_TIKPRO dari tabel Tikpro dan diurutkan ASC  
        return view('tikpro.edittikpro', compact('jebret')); //return view ke halaman edittikpro dengan data dari $jebret
    }

    public function update(Request $request){    // }
    	      // ambil data DEADLINE dari tabel Tikrpo, dan dimasukkan ke masing2 variable dibawah
      $deadlinearray = array();
      foreach ($request->DEADLINE as $deadline) {
        array_push($deadlinearray, $deadline);
      }
      $idtikproarray = array();
      foreach ($request->ID_TIKPRO as $idtikpro) {
        array_push($idtikproarray, $idtikpro);
      }
      $namatikproarray = array();
      foreach ($request->NAMA_TIKPRO as $namatikpro) {
        array_push($namatikproarray, $namatikpro);
      }
      // dd($request);
      $query1 = "";
      for ($i=0; $i < count($deadlinearray); $i++) { 
        $query1 = $query1."WHEN ".$idtikproarray[$i]." THEN ".$deadlinearray[$i]." ";
      }
      $query2 = "UPDATE TIKPRO SET DEADLINE = CASE ID_TIKPRO ";
      $query3 = "ELSE DEADLINE END";
      $fullquery1 = $query2.$query1.$query3;
      // dd($fullquery1);

      $querya = "";
      for ($i=0; $i < count($namatikproarray); $i++) { 
        $querya = $querya."WHEN ".$idtikproarray[$i]." THEN "."'".$namatikproarray[$i]."' ";
      }
      $queryb = "UPDATE TIKPRO SET NAMA_TIKPRO = CASE ID_TIKPRO ";
      $queryc = "ELSE NAMA_TIKPRO END";
      $fullquery2 = $queryb.$querya.$queryc;
      // update kolom DEADLINE pada tabel Tikpro sesuai dengan inputan yang diberikan oleh user
      // dd($fullquery2);
      DB::statement("$fullquery1");
      DB::statement("$fullquery2");
      $url = 'showtikproo';

      $userlogin = Auth::user()->username;
      $datenow = date_create();
      $datenow2 = $datenow->format('d F Y');
      $isi = $userlogin." telah mengupdate titik proses";
      $log = "insert into LOG_CLICK (ISI) VALUES ('".$isi."')";
      DB::statement("$log");

      $count = DB::table('TIKPRO')->select('ID_TIKPRO')->count(); 
      $id1 = DB::table('TIKPRO')->select('ID_TIKPRO')->get();
      $nama1 = DB::table('TIKPRO')->select('NAMA_TIKPRO')->get();
      $deadline1 = DB::table('TIKPRO')->select('DEADLINE')->get();

      $idLama = array();
      $namaLama = array();
      $deadlineLama = array();

      foreach ($id1 as $key) {
        array_push($idLama, $key->ID_TIKPRO);
      }
      foreach ($nama1 as $key) {
       array_push($namaLama, $key->NAMA_TIKPRO); 
      }
      foreach ($deadline1 as $key) {
        array_push($deadlineLama, $key->DEADLINE);
      }
      $last = DB::table('LOG_CLICK')->select('ID_LOG')->orderBy('ID_LOG','DESC')->limit('1')->get();
      $last2 = explode(":", $last); //data dari $ticket dipisahkan dengan ketentuan : (titik dua)
      $last3 = explode("}]", $last2[1]); //dari dari $kuylah index kedua, dipisahkan dengan ketentuan }]
      $lastint = (int)$last3[0];
      // dd($lastint);

      // $check = DB::table('TIKPRO_TEMP')->select('LOG_ID')->orderBy('LOG_ID','DESC')->limit('1')->get();
      // $check2 = explode(":", $check);
      // $check3 = explode("}]", $check2[1]);
      // $checkint = (int)$check3[0];

      // if ($lastint+1 != $checkint) {
        for ($i=0; $i < $count ; $i++) { 
          TikproTemp::insertGetId(array(
              'LOG_ID' => $lastint,
              'ID_TIKPRO_TEMP' => $idLama[$i],
              'NAMA_TIKPRO_TEMP' => $namaLama[$i],
              'DEADLINE_TIKPRO_TEMP' => $deadlineLama[$i],
          ));
        }

      return redirect($url)->with('success','Sukses Update Data'); //return ke halaman shwotikpro dengan keterangan sukses
    }

    public function add($ID_TIKPRO){
      $index = $ID_TIKPRO+1;
      $query1 = "UPDATE TIKPRO SET ID_TIKPRO = ID_TIKPRO + 1 WHERE ID_TIKPRO >= ".$index." order by ID_TIKPRO DESC";
      $query2 = "INSERT INTO TIKPRO (ID_TIKPRO, NAMA_TIKPRO) VALUES (".$index.", '')";
      // dd($query1);
      DB::statement("$query1");
      DB::statement("$query2"); 
      $url = 'edittikpro';
      return redirect($url)->with('success','Sukses Tambah Tikpro. Klik Update Untuk Melanjutkan'); //return ke halaman shwotikpro dengan keterangan sukses
    }

    public function remove($ID_TIKPRO){
      $query1 = "DELETE FROM TIKPRO WHERE ID_TIKPRO = ".$ID_TIKPRO;
      $query2 = "UPDATE TIKPRO SET ID_TIKPRO = ID_TIKPRO - 1 WHERE ID_TIKPRO > ".$ID_TIKPRO." order by ID_TIKPRO ASC";
      // $querytest1 = "SELECT ID_TIKPRO FROM TIKPRO WHERE ID_TIKPRO > ".$ID_TIKPRO;
      DB::statement($query1);
      DB::statement($query2);
      // echo($query2);
      $url = 'edittikpro';
      return redirect($url)->with('success','Sukses Hapus Tikpro. Klik Update Untuk Melanjutkan'); //return ke halaman shwotikpro dengan keterangan sukses
    }

    public function logClick () {
      $isi = Log::orderBy('updated_at','ASC')->get();
      $tikproLama = TikproLama::query()->join('LOG_CLICK','TIKPRO_LAMA.LOG_ID','=','LOG_CLICK.ID_LOG')->get();
      // dd($isi);
      $tikproBaru = Tikpro::orderBy('ID_TIKPRO','ASC')->get();
      return view('tikpro.logClick', compact('isi','tikproLama','tikproBaru'));
    }
    public function detailLogClick ($ID_LOG) {
      // $idlogg = $ID_LOG+1;
      $jebret = Log::find($ID_LOG); 
      $jebret2 = DB::table('TIKPRO_LAMA')->where('LOG_ID', $ID_LOG)->get(); //ambil semua data dari tabel TIKPRO
      $jebret3 = DB::table('TIKPRO_TEMP')->where('LOG_ID',$ID_LOG)->get();
      // dd($jebret3);
      return view('tikpro.detailLog', compact('jebret', 'jebret2', 'jebret3')); //return view ke halaman details dengan data dari variable $jebret, $query, $jebret2, dan $boi
    }
}
