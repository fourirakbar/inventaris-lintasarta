<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Barang;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PinjamController extends Controller {
    public function index () {
        $barang = DB::table('BARANG')->select('*')->where('STATUS_BARANG', '=', NULL)->get();

        return view('peminjaman.inputPeminjaman', compact('barang')); //return ke halaman inputPeminjaman
    }

    public function input () {
        $data = Input::all(); //ambil input dari form
        $a = "progress"; //defaul value untuk kolom keterangan
        //memasukkan data sesuai input ke dalam database PEMINJAMAN
            
        //jika input peminjaman diambil dari databse gudang, maka ada value dari ID_BARANG
        if (isset($data['ID_BARANG'])) {
            Peminjaman::insertGetId(array(
                'NAMA_PEMINJAM' => $data['NAMA_PEMINJAM'],
                'PERANGKAT' => $data['PERANGKAT'],
                'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'],
                'TGL_PEMINJAMAN' => $data['TGL_PEMINJAMAN'],
                'TGL_PENGEMBALIAN' => $data['TGL_PENGEMBALIAN'],
                'KETERANGAN' => $a,
                'ID_BARANG' => $data['ID_BARANG'],
                'NOMOR_TICKET' => $data['NOMOR_TICKET'],
            ));    
            $query4 = DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Dipinjam"]);
        }

        return redirect('/peminjaman/show')->with('success','Input Permintaan Sukses'); //return ke /showPeminjaman dengan keterangan sukses
    }

    public function show () {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->get(); //ambil semua data dari tabel PEMINJAMAN
        return view('peminjaman.showPeminjaman', compact('peminjaman')); //return ke halaman showPeminjaman dengan data dari variable $peminjaman
    }

    public function showBelum (Request $request) {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('KETERANGAN', 'progress')->get();
        return view('peminjaman.showPeminjaman', compact('peminjaman'));
    }

    public function showSUdah (Request $request) {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('KETERANGAN', 'done')->get();
        return view('peminjaman.showPeminjaman', compact('peminjaman')); 
    }

    public function edit ($ID_PEMINJAMAN) {
        $peminjaman = Peminjaman::find($ID_PEMINJAMAN); //mencari data peminjaman sesuai dengan ID_PEMINJAMAN yang diklik pada web
        return view('peminjaman.editPeminjaman', compact('peminjaman')); //return ke halaman editPeminjaman dengan data dari variable $peminjaman
    }

    public function update (Request $request, $ID_PEMINJAMAN) {
        $peminjaman = Peminjaman::find($ID_PEMINJAMAN); //mencari data peminjaman sesuai dengan ID_PEMINJAMAN yang diklik pada web
        Peminjaman::find($ID_PEMINJAMAN)->update($request->all()); //update data sesuai inputan pada tabel PEMINJAMAN dengan ID_PEMINJAMAN sesuai pada web

        // $query = DB::select("UPDATE PEMINJAMAN SET SISA_HARI=(SELECT datediff(TGL_PENGEMBALIAN,TGL_PEMINJAMAN))");

        $cek = DB::table('PEMINJAMAN')->where('ID_PEMINJAMAN', $ID_PEMINJAMAN)->get();
        $idbarang = $cek[0]->ID_BARANG;
        $keterangan = $cek[0]->KETERANGAN;
        // dd($keterangan);

        if ($keterangan == "done") {
            DB::table('BARANG')->where('ID_BARANG', $idbarang)->update(['STATUS_BARANG' => NULL]);    
        }

        $url = '/peminjaman/show';
        return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /showPeminjaman dengan keterangan sukses
    }

    public function delete ($ID_PEMINJAMAN) {
        $peminjaman = Peminjaman::find($ID_PEMINJAMAN); //mencari data peminjaman sesuai dengan ID_PEMINJAMAN yang diklik pada web

        try {
          $peminjaman->delete(); //delete data peminjaman sesuai dengan ID_PEMINJAMAN pada web
          return redirect('/peminjaman/show')->with('success','Sukses Delete Data Peminjaman'); //return ke halaman /showPeminjaman dengan keterangan sukses
        }
        catch (\Exception $e) { //kalau error terjadi
          $url = '/peminjaman/edit/'.$ID_PEMINJAMAN;
          return Redirect::to($url)->with('error','Gagal Delete Data Peminjaman');
        }
    }

    public function caripeminjaman(){
        return view('peminjaman.caripeminjaman');
    }

    public function showpeminjaman(Request $request){
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('ID_PEMINJAMAN', '=', $request->ID_PEMINJAMAN)->get(); //ambil semua data dari tabel PEMINJAMAN
        // dd($peminjaman);
        return view('peminjaman.usershowpeminjaman', compact('peminjaman')); 
    }
}
