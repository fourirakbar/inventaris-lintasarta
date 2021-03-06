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
use Maatwebsite\Excel\Facades\Excel;

class PermintaanController extends Controller
{
    public function index()
    {
        $totaldeadline = 0;
        $deadline = DB::table('TIKPRO')->select('DEADLINE')->get(); //ambil data DEADLINE untuk tiap titik proses dari tabel TIKPRO

        //isi deadline dari dimasukkan ke array totaldeadline
        foreach ($deadline as $key) {
            $totaldeadline += $key->DEADLINE;
        }

        //return ke halaman request dengan data dari array totaldeadline
        return view('permintaan.request', compact('totaldeadline'));

    }

    public function input() {
        $data = Input::all(); //ambil input permintaan
        $a = "in progress";
        $b = "1";
        $i = 1;
        echo $data['NOMOR_TICKET'];
        echo $data['NAMA_REQUESTER'];
        echo $data['BARANG_PERMINTAAN'];
        echo $data['TGL_PERMINTAAN'];
        echo $data['TGL_DEADLINE'];

        //memasukkan data sesuai input ke dalam database Permintaan
        Permintaan::insertGetId(array(
            'NOMOR_TICKET' => $data['NOMOR_TICKET'],
            'NAMA_REQUESTER' => $data['NAMA_REQUESTER'],
            'BAGIAN' => $data['BAGIAN'],
            'DIVISI' => $data['DIVISI'],
            'BARANG_PERMINTAAN' => $data['BARANG_PERMINTAAN'],
            'DESKRIPSI' => $data['DESKRIPSI'],
            'TGL_PERMINTAAN' => $data['TGL_PERMINTAAN'],
            'TGL_DEADLINE' => $data['TGL_DEADLINE'],
            'TIKPRO_ID' => $b,
            'STATUS' => $a,
        ));

        $ticket = DB::table('PERMINTAAN')->select('ID_PERMINTAAN')->orderBy('ID_PERMINTAAN', 'DESC')->limit('1')->get(); //ambil ID_PERMINTAAN terakhir pada table PERMINTAAN
        $kuylah = explode(":", $ticket); //data dari $ticket dipisahkan dengan ketentuan : (titik dua)
        $bossku = explode("}]", $kuylah[1]); //dari dari $kuylah index kedua, dipisahkan dengan ketentuan }]

        $count = DB::table('TIKPRO')->whereNotNull('NAMA_TIKPRO')->count(); //hitung jumlah data di tabel TIKPRO yang value dari kolom NAMA_TIKPRO tidak kosong / NULL
        $insertnama = DB::table('TIKPRO')->select('NAMA_TIKPRO')->get(); //ambil semua value NAMA_TIKPRO dari tabel TIKPRO
        $insertdeadline = DB::table('TIKPRO')->select('DEADLINE')->get(); //ambil semua value DEADLINE dari tabel TIKPRO
        $namatikproarray = array();
        $deadlinetikproarray = array();

        //data dari $isernama dimasukkan satu persatu ke dalam array namatikproarray
        foreach ($insertnama as $key) {
            array_push($namatikproarray, $key->NAMA_TIKPRO);
        }

        //data dari $insertdeadline dimasukkan satu persatu ke dalam array deadlinetikproarray
        foreach ($insertdeadline as $key) {
            array_push($deadlinetikproarray, $key->DEADLINE);
        }
        
        for ($i=1; $i < $count+1; $i++) {
            //memasukkan data ke dalam database HistoryTikpro
            HistoryTikpro::insertGetId(array(
                'TIKPRO_ID' => $i,
                'TIKPRO_NAMA' => $namatikproarray[$i-1],
                'DEADLINE' => $deadlinetikproarray[$i-1],
                'PERMINTAAN_ID' => $bossku[0],
            ));
        };

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan)
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID order by PERMINTAAN.ID_PERMINTAAN DESC");

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan)
        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");

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
            if ($key->STATUS == "in progress") {
            $date1=date_create();
            $date2=date_create($key->TGL_PERMINTAAN);
            $deadlinebaru = array_reverse($deadline4);
            // dd($deadlinebaru);
            foreach ($deadline4 as $jumlaharray) {
                for ($i=1; $i < count($jumlaharray)-1 ; $i++) { 
                    // echo "iterasi ke: ".$i." ";
                    if ($key->TIKPRO_ID == $i && $key->ID_PERMINTAAN == $jumlaharray[$i-1]["idpermintaan"]) {
                       $deaddead = $jumlaharray[$i]["deadline"];
                    }
                }
            }
            
            $deadline_new = array();
            foreach ($deadline4 as $jumlaharray) {
                foreach ($jumlaharray as $key) {
                    array_push($deadline_new, $key['deadline']);
                }
            }
            
            $deadline_balik = array_reverse($deadline_new);
            }
        }
        //hitung banyaknya data history tikpro yang datanya baru masuk
        $itung = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID',$bossku[0])->count();
        //ambil seluruh data yang baru masuk pada history tikpro
        $updatesemua = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID',$bossku[0])->get();
        $tikpro_new = array();
        foreach ($updatesemua as $key) {
            array_push($tikpro_new, $key->TIKPRO_ID);
        }

        $deadline_balik_baru = array();
        for ($i=0 ; $i<$itung ; $i++) {
            array_push($deadline_balik_baru, $deadline_balik[$i]);
        }
        //update data deadline new pada tabel history tikpro
        for ($i=1 ; $i<=$itung ; $i++) {
            $updatedeadline = "UPDATE HISTORY_TIKPRO SET DEADLINE_NEW = ? WHERE PERMINTAAN_ID = ? AND TIKPRO_ID = ?";
            DB::update($updatedeadline, array(array_reverse($deadline_balik_baru)[$i-1], $bossku[0], $tikpro_new[$i-1]));            
        }

        //redirect ke halaman /request`
        return redirect('/request')->with('success','Request Barang Sukses'); //return ke halaman request dengan keterangan sukses
    }

    //fungsi list semua permintaa (history permintaan)
    public function lihatSemua() {
        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan)
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID order by PERMINTAAN.ID_PERMINTAAN DESC");

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id tikpro pada tabel permintaan sama dengan id tikpro pada tabel history tikpro dan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk listing seluruh data permintaan)
        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");

        //query - pilih data pada tabel permintaan yang di join dengan tabel tikpro dengan ketentuan id permintaan pada tabel permintaan sama dengan id permintaan pada tabel history tikpro (untuk mengambil data pada kolom tanggal selesai)
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        
        //inisiasi array
        $jebret2 = array();
        //looping seluruh data pada variabel $jebret3 sebagai variabel $key
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            //memasukkan seluruh data pada variabel $jebret2a kedalam array $jebret2
            array_push($jebret2, $jebret2a);
        }
        
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2', 'tglselesai')); //return view ke halaman semuaPermintaan dengan data dari variable $jebret dan $jebret2
    }

    //fungsi list seluruh permintaan yang belum selesai
    public function lihatSemuaBelum(Request $request) {
        //list data permintaan yang belum selesai
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and PERMINTAAN.STATUS = 'in progress' order by PERMINTAAN.ID_PERMINTAAN DESC");

        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and PERMINTAAN.STATUS = 'in progress' ");

        $jebret2 = array();
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            array_push($jebret2, $jebret2a);
        }
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2', 'tglselesai')); //return view ke halaman semuaPermintaan dengan data dari variable $jebret dan $jebret2
    }

    //fungsi untuk list seluruh data permintaan yang sudah selesai
    public function lihatSemuaSudah(Request $request) {
        //list data dengan ketentuan statusnya sudah donne
        $tglselesai = DB::select("select * from HISTORY_TIKPRO join PERMINTAAN on PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID");
        $jebret = DB::select("select * from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and PERMINTAAN.STATUS = 'done' order by PERMINTAAN.ID_PERMINTAAN DESC");

        $jebret3 = DB::select("select ID_PERMINTAAN from PERMINTAAN inner join HISTORY_TIKPRO where PERMINTAAN.TIKPRO_ID = HISTORY_TIKPRO.TIKPRO_ID and PERMINTAAN.ID_PERMINTAAN = HISTORY_TIKPRO.PERMINTAAN_ID and PERMINTAAN.STATUS = 'done' ");

        $jebret2 = array();
        foreach ($jebret3 as $key) {
            $jebret2a = DB::table('HISTORY_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.ID_PERMINTAAN','=','HISTORY_TIKPRO.PERMINTAAN_ID')->where('HISTORY_TIKPRO.PERMINTAAN_ID',$key->ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
            array_push($jebret2, $jebret2a);
        }
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2', 'tglselesai')); //return view ke halaman semuaPermintaan dengan data dari variable $jebret dan $jebret2
    }
    
    public function tindakLanjut($ID_PERMINTAAN) {
        $jebret2 = Permintaan::find($ID_PERMINTAAN); //mencari data di table PERMINTAAN sesuai dengan ID_PERMINTAAN pada web
        return view('permintaan.tindakLanjut',compact('jebret2')); //return ke halaman tindakLanjut dengan data dari variable $jebret2
    }

    public function details($ID_PERMINTAAN) {
        $query = DB::table('PERMINTAAN')->select('TIKPRO.NAMA_TIKPRO')->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('PERMINTAAN.ID_PERMINTAAN', $ID_PERMINTAAN)->get(); //ambil data dari table PERMINTAAN dan table TIKPRO dengan ketentuan yang sudah diberikan
        $jebret = Permintaan::find($ID_PERMINTAAN); //mencari data di table PERMINTAAN sesuai dengan ID_PERMINTAAN pada web
        $jebret2 = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $ID_PERMINTAAN)->get(); //ambil semua data dari tabel TIKPRO
        // dd($jebret2);
        $boi = DB::table('HISTORY_TIKPRO')->select('*')->join('PERMINTAAN','PERMINTAAN.ID_PERMINTAAN', '=', 'HISTORY_TIKPRO.PERMINTAAN_ID')->where('PERMINTAAN.ID_PERMINTAAN', $ID_PERMINTAAN)->get(); //ambil data dari table HISTORY_TIKPRO dan table PERMINTAAN dengan ketentuan yang sudah diberikan
        // $count = DB::table('TIKPRO')->whereNotNull('NAMA_TIKPRO')->count();
        $count = DB::table('HISTORY_TIKPRO')->where('PERMINTAAN_ID', $ID_PERMINTAAN)->count();
        // dd($count);
        return view('permintaan.details', compact('jebret', 'query', 'jebret2', 'boi', 'count')); //return view ke halaman details dengan data dari variable $jebret, $query, $jebret2, dan $boi
    }

    public function doEdit($ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN); //mencari data di table PERMINTAAN sesuai dengan ID_PERMINTAAN pada web
        // dd($jebret);
        $jebret2 = HistoryTikpro::query('NAMA_TIKPRO')->join('PERMINTAAN', 'PERMINTAAN.TIKPRO_ID', '=', 'HISTORY_TIKPRO.TIKPRO_ID')->where('PERMINTAAN.ID_PERMINTAAN', $ID_PERMINTAAN)->get()[0]; //ambil data dari table TIKPRO dan tabel PERMINTAAN dengan ketentuan yang sudah diberikan
        // dd($jebret2);
        $listtikpro = DB::table('HISTORY_TIKPRO')->select('*')->where('PERMINTAAN_ID',$ID_PERMINTAAN)->get(); //ambil data pada kolom ID_TIKPRO dan NAMA_TIKRPO dari tabel TIKPRO
        $hitung = DB::table('HISTORY_TIKPRO')->select('TIKPRO_ID', 'TIKPRO_NAMA')->where('PERMINTAAN_ID',$ID_PERMINTAAN)->count();
        $hitungmin = $hitung - 1;
        // dd($listtikpro[$hitungmin]->TGL_SELESAI);
        return view('permintaan.edit', compact('jebret', 'jebret2', 'listtikpro', 'hitungmin')); //return ke halaman edit dengan data dari variable $jebret, $jebret2, dan $listtikrpo
    }

    public function doUpdate(Request $request, $ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN); //mencari data di table PERMINTAAN sesuai dengan ID_PERMINTAAN pada web
        $kelarBoi = Input::get('TGL_SELESAI'); //menginputkan sesuai nilai yang dimasukkan ke TGL_SELESAI
        $nama = Input::get('NAMA');
        
        // dd($jebret);
        Permintaan::find($ID_PERMINTAAN)->update($request->all()); //update data pada tabel PERMINTAAN sesuai input yang diberikan oleh user

        if ($request->NAMA && $request->TGL_SELESAI) {
            $notSoLazy = DB::table('PERMINTAAN')->select('TIKPRO_ID')->where('ID_PERMINTAAN', $ID_PERMINTAAN)->get(); //ambil TIKPRO_ID dari tabel PERMINTAAN dengan ketentuan yang sudah diberikan
            $komodoDream = explode(":", $notSoLazy); //data dari $ticket dipisahkan dengan ketentuan : (titik dua)
            $komodoBreakfast = explode("}]", $komodoDream[1]); //dari dari $kuylah index kedua, dipisahkan dengan ketentuan }]
            $notBadLiquid = "UPDATE HISTORY_TIKPRO SET TGL_SELESAI= ? WHERE TIKPRO_ID= ? AND PERMINTAAN_ID= ?"; //update TGL_SELESAI pada tabel HISTORY_TIKPRO dengan ketentuan yang sudah diberikan
            $updatedb = "UPDATE HISTORY_TIKPRO SET NAMA= ? WHERE TIKPRO_ID= ? AND PERMINTAAN_ID= ?";
            DB::update($notBadLiquid, array($kelarBoi, $komodoBreakfast[0], $ID_PERMINTAAN));
            DB::update($updatedb, array($nama, $komodoBreakfast[0], $ID_PERMINTAAN));

            $aa = $request->TIKPRO_ID;
            $bb = (int)$aa + 1;
            $updatetikproid = "UPDATE PERMINTAAN SET TIKPRO_ID = ? WHERE ID_PERMINTAAN = ?"; //update

            $ambil = DB::table('HISTORY_TIKPRO')->select('TIKPRO_ID')->where('PERMINTAAN_ID', $ID_PERMINTAAN)->get();
            $ambilarray = array();

            foreach ($ambil as $key) {
                array_push($ambilarray, $key->TIKPRO_ID);
            }

            if (!in_array($bb, $ambilarray)) {
                $bb = $bb - 1;
            }

            DB::update($updatetikproid, array($bb, $ID_PERMINTAAN));
            $url = '/semua/lihat/'.$ID_PERMINTAAN;
            return redirect($url)->with ('success','Sukses Update Data'); //return ke /semua/lihat dengan keterangan sukses
        }
        else
        {
            $url = '/semua/lihat/'.$ID_PERMINTAAN;
            return redirect($url)->with ('success','Sukses Update Data'); //return ke /semua/lihat dengan keterangan sukses
        }
    }


    public function hapus($ID_PERMINTAAN)
    {
        $jebret = Permintaan::find($ID_PERMINTAAN); //mencari data di table PERMINTAAN sesuai dengan ID_PERMINTAAN pada web
        // dd($jebret);
        return view('permintaan.hapus', compact('jebret')); //return ke halaman hapus dengan data dari variable $jebret
    }

    public function reject(Request $request, $ID_PERMINTAAN) {
      Permintaan::find($ID_PERMINTAAN)->update(['STATUS' => "in progress"]);
      DB::table('PEMBATALAN')->where('PERMINTAAN_ID','=',$ID_PERMINTAAN)->update(['STATUS_PEMBATALAN' => 'reject']);
      DB::table('PERMINTAAN')->where('ID_PERMINTAAN', $ID_PERMINTAAN)->update(['ALASAN_REJECT' => $request->ALASAN_REJECT]);
      $url = '/adminhapus';
      return redirect($url)->with('success', 'Sukses Reject Request Pembatalan');
    }

    public function delete(Request $request, $ID_PERMINTAAN){
        $file = $request->file('FILE_PEMBATALAN'); //merequest input file dari FILE_PEMBATALAN
        $destinationPath = 'uploads';
        $fileextension = $file->getClientOriginalExtension();
        echo $fileextension;
        $file->move($destinationPath,"pembatalan_".$ID_PERMINTAAN.".".$fileextension);
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->get();
        $jebret2 = DB::table('TIKPRO')->get();

        // $search = Pembatalan::query()->select('PERMINTAAN_ID')->where('PERMINTAAN_ID',$ID_PERMINTAAN)->get();
        $search = DB::select("SELECT PERMINTAAN_ID FROM PEMBATALAN WHERE PERMINTAAN_ID = $ID_PERMINTAAN");

        if (empty($search)) {
            Pembatalan::insertGetId(array(
                'PERMINTAAN_ID' => $ID_PERMINTAAN,
                'ALASAN_PEMBATALAN' => $request->ALASAN_PEMBATALAN,
                'FILE_PEMBATALAN' => $destinationPath."/pembatalan_".$ID_PERMINTAAN.".".$fileextension,
                'STATUS_PEMBATALAN' => "in progress",
            ));
            Permintaan::find($ID_PERMINTAAN)->update(['STATUS' => 'Request untuk dibatalkan']);

            if(!Auth::guest()) {
                $url = '/semua';
                return redirect($url)->with('success','Sukses Mengajukan Request Pembatalan');
            }

            else {
                // echo "333h";
                $url = '/user-search ';
                return redirect($url)->with('success','Sukses Mengajukan Request Pembatalan');
            }

        }
        else {
            if(!Auth::guest()) {
                $url = '/semua';
                return redirect($url)->with('gagal','Anda sudah pernah menjukan pembatalan');
            }

            else {
                $url = '/user-search';
                return redirect($url)->with('gagal','Anda sudah pernah menjukan pembatalan');
            }
        }



   }

   public function showpembatalan()
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->get(); //ambil data dari table PERMINTAAN dan table PEMATALAN dengan ketentuan yang sudah diberikan
        return view('permintaan.adminhapus', compact('jebret')); //return ke halaman adminhapus dengan data dari variable $jebret
    }

    public function showpembatalanbelum()
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->where('STATUS_PEMBATALAN','=','in progress')->get(); //ambil data dari table PERMINTAAN dan table PEMATALAN dengan ketentuan yang sudah diberikan
        return view('permintaan.adminhapus', compact('jebret')); //return ke halaman adminhapus dengan data dari variable $jebret
    }

    public function detailpembatalan($ID_PERMINTAAN)
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->where('ID_PERMINTAAN','=',$ID_PERMINTAAN)->get()[0]; //ambil data dari table PERMINTAAN dan table PEMATALAN dengan ketentuan yang sudah diberikan
        dd($jebret);
        return view('permintaan.detailadminhapus', compact('jebret')); //return ke halaman detailadminhapus dengan data dari variable $jebret
    }

    public function execpembatalan($ID_PERMINTAAN)
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->get(); //ambil data dari table PERMINTAAN dan table PEMATALAN dengan ketentuan yang sudah diberikan

        if (Input::get('yaa')) {
            Permintaan::find($ID_PERMINTAAN)->update(['STATUS' => 'batal']); //mencari data dengan kolom STATUS = batal dan sesuai dengan $ID_PERMINTAAAN
            DB::table('PEMBATALAN')->where('PERMINTAAN_ID','=',$ID_PERMINTAAN)->update(['STATUS_PEMBATALAN' => 'done']); //update kolom STATUS_PEMBATALAN menjadi done di tabel PEMBATALAN sesuai dengan $ID_PERMINTAAN

            $url = 'adminhapus';
            return redirect($url)->with('success','Sukses Setujui Request Pembatalan'); //return ke halaman adminhapus dengan keterangan sukses
        }
        elseif (Input::get('tidak')) {
            Permintaan::find($ID_PERMINTAAN)->update(['STATUS' => "in progress"]);
            DB::table('PEMBATALAN')->where('PERMINTAAN_ID','=',$ID_PERMINTAAN)->update(['STATUS_PEMBATALAN' => 'reject']); //
            $url = 'adminhapus';
            return redirect($url)->with('success','Sukses Batalkan Request Pembatalan'); //return ke halaman adminhapus dengan keterangan sukses
        }
    }

    public function caripermintaan(){
        return view('permintaan.caripermintaan');
    }

    public function showpermintaan(Request $request){
        // dd($request);
        $showdata = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('NOMOR_TICKET', '=', $request->NO_TIKET)->get(); //ambil data dari table PERMINTAAN dan table TIKPRO dengan ketentuan yang sudah diberikan
        // dd($showdata);
        $jebret2 = DB::table('TIKPRO')->get(); //ambil semua data dari tabel TIKPRO

        return view('permintaan.usershowpermintaan', compact('showdata', 'jebret2'));
    }

    public function exporttoexcel(){
        $permintaans = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->select('NOMOR_TICKET', 'TGL_PERMINTAAN', 'TGL_DEADLINE', 'NAMA_REQUESTER', 'BAGIAN', 'DIVISI', 'BARANG_PERMINTAAN', 'DESKRIPSI', 'NO_FPBJ', 'KETERANGAN', 'STATUS')->get();
        // dd($permintaans);
        $permintaanArray = [];
        $permintaanArray[] = ['NOMOR_TICKET', 'TGL_PERMINTAAN', 'TGL_DEADLINE', 'NAMA_REQUESTER', 'BAGIAN', 'DIVISI', 'BARANG_PERMINTAAN', 'DESKRIPSI', 'NO_FPBJ', 'KETERANGAN', 'STATUS',];

        foreach ($permintaans as $key => $permintaan) {
            $permintaanArray[] = $permintaan->toArray();
        }
        // dd($permintaanArray);
        $datenow = date_create();
        $newdate = date_format($datenow,"d-m-Y");
        $namafile = "laporan-permintaan_".$newdate;
        // dd($namafile);
        Excel::create($namafile, function($excel) use ($permintaanArray) {

            // Set the spreadsheet title, creator, and description
            $excel->setTitle('Permintaan');
            $excel->setCreator('Laravel')->setCompany('TI Infrastruktur, LINTASARTA');
            $excel->setDescription('payments file');

            // Build the spreadsheet, passing in the payments array
            $excel->sheet('sheet1', function($sheet) use ($permintaanArray) {
                $sheet->fromArray($permintaanArray, null, 'A1', false, false);
            });

        })->download('xlsx');

    }
}
