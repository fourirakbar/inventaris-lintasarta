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
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get(); //ambil ID_TIKPRO dari tabel Tikpro dan diurutkan ASC
        // dd($jebret);
        return view('tikpro.showtikpro', compact('jebret')); //return view ke halaman showtikpro dengan data dari $jebret
    }

    public function edit(Request $request) {
        $jebret = Tikpro::orderBy('ID_TIKPRO','ASC')->get(); //ambil ID_TIKPRO dari tabel Tikpro dan diurutkan ASC  
        return view('tikpro.edittikpro', compact('jebret')); //return view ke halaman edittikpro dengan data dari $jebret
    }

    public function update(Request $request){
    	
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
      $url = 'showtikpro';
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
      return redirect($url)->with('success','Sukses Tambah Tikpro'); //return ke halaman shwotikpro dengan keterangan sukses
    }

    public function remove($ID_TIKPRO){
      $query1 = "DELETE FROM TIKPRO WHERE ID_TIKPRO = ".$ID_TIKPRO;
      $query2 = "UPDATE TIKPRO SET ID_TIKPRO = ID_TIKPRO - 1 WHERE ID_TIKPRO > ".$ID_TIKPRO." order by ID_TIKPRO ASC";
      // $querytest1 = "SELECT ID_TIKPRO FROM TIKPRO WHERE ID_TIKPRO > ".$ID_TIKPRO;
      DB::statement($query1);
      DB::statement($query2);
      // echo($query2);
      $url = 'edittikpro';
      return redirect($url)->with('success','Sukses Hapus Tikpro'); //return ke halaman shwotikpro dengan keterangan sukses
    }

}
