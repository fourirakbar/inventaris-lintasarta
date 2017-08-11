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
use Maatwebsite\Excel\Facades\Excel;

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
                'TGL_PEMINJAMAN' => $data['TGL_PEMINJAMAN'],
                'TGL_PENGEMBALIAN' => $data['TGL_PENGEMBALIAN'],
                'KETERANGAN' => $a,
                'ID_BARANG' => $data['ID_BARANG'],
                'NOMOR_TICKET' => $data['NOMOR_TICKET'],
                'CATATAN_PEMINJAMAN' => $data['CATATAN_PEMINJAMAN'],
            )); 
            if ($data['CATATAN_PEMINJAMAN'] == "") {
                DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Dipinjam"]);
            }
            else{
                DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => $data['CATATAN_PEMINJAMAN']]);
            }
        }
        else {
            Peminjaman::insertGetId(array(
                'NAMA_PEMINJAM' => $data['NAMA_PEMINJAM'],
                'PERANGKAT' => $data['PERANGKAT'],
                'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'],
                'TGL_PEMINJAMAN' => $data['TGL_PEMINJAMAN'],
                'TGL_PENGEMBALIAN' => $data['TGL_PENGEMBALIAN'],
                'KETERANGAN' => $a,
                'NOMOR_TICKET' => $data['NOMOR_TICKET'],
                'CATATAN_PEMINJAMAN' => $data['CATATAN_PEMINJAMAN'],
            ));    
            // $query4 = DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Dipinjam"]);
        }

        return redirect('/peminjaman/show')->with('success','Input Permintaan Sukses'); //return ke /showPeminjaman dengan keterangan sukses
    }

    public function show () {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->get(); //ambil semua data dari tabel PEMINJAMAN
        $count = $peminjaman->count();
        $data = DB::table('PEMINJAMAN')->join('BARANG','BARANG.ID_BARANG','=','PEMINJAMAN.ID_BARANG')->select('PEMINJAMAN.ID_PEMINJAMAN', 'PEMINJAMAN.ID_BARANG', 'PEMINJAMAN.NOMOR_TICKET', 'PEMINJAMAN.PERANGKAT', 'PEMINJAMAN.NOMOR_REGISTRASI as w', 'PEMINJAMAN.CATATAN_PEMINJAMAN', 'PEMINJAMAN.TGL_PEMINJAMAN', 'PEMINJAMAN.TGL_PENGEMBALIAN', 'PEMINJAMAN.KETERANGAN', 'BARANG.NOMOR_REGISTRASI as q', 'BARANG.NAMA_BARANG')->get();
        return view('peminjaman.showPeminjaman', compact('peminjaman', 'count', 'data')); //return ke halaman showPeminjaman dengan data dari variable $peminjaman
    }

    public function showBelum (Request $request) {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('KETERANGAN', 'progress')->get();
        $count = $peminjaman->count();
        $data = DB::table('PEMINJAMAN')->join('BARANG','BARANG.ID_BARANG','=','PEMINJAMAN.ID_BARANG')->select('PEMINJAMAN.ID_PEMINJAMAN', 'PEMINJAMAN.ID_BARANG', 'PEMINJAMAN.NOMOR_TICKET', 'PEMINJAMAN.PERANGKAT', 'PEMINJAMAN.NOMOR_REGISTRASI as w', 'PEMINJAMAN.CATATAN_PEMINJAMAN', 'PEMINJAMAN.TGL_PEMINJAMAN', 'PEMINJAMAN.TGL_PENGEMBALIAN', 'PEMINJAMAN.KETERANGAN', 'BARANG.NOMOR_REGISTRASI as q', 'BARANG.NAMA_BARANG')->get();
        return view('peminjaman.showPeminjaman', compact('peminjaman', 'count','data'));
    }

    public function showSUdah (Request $request) {
        $peminjaman = DB::table('PEMINJAMAN')->select('*')->where('KETERANGAN', 'done')->get();
        $count = $peminjaman->count();
        $data = DB::table('PEMINJAMAN')->join('BARANG','BARANG.ID_BARANG','=','PEMINJAMAN.ID_BARANG')->select('PEMINJAMAN.ID_PEMINJAMAN', 'PEMINJAMAN.ID_BARANG', 'PEMINJAMAN.NOMOR_TICKET', 'PEMINJAMAN.PERANGKAT', 'PEMINJAMAN.NOMOR_REGISTRASI as w', 'PEMINJAMAN.CATATAN_PEMINJAMAN', 'PEMINJAMAN.TGL_PEMINJAMAN', 'PEMINJAMAN.TGL_PENGEMBALIAN', 'PEMINJAMAN.KETERANGAN', 'BARANG.NOMOR_REGISTRASI as q', 'BARANG.NAMA_BARANG')->get();
        return view('peminjaman.showPeminjaman', compact('peminjaman', 'count', 'data')); 
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
        
        elseif ($keterangan == "progress") {
            DB::table('BARANG')->where('ID_BARANG', $idbarang)->update(['STATUS_BARANG' => 'Dipinjam']);    
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

    public function exporttoexcel() {
        $peminjamans = Peminjaman::query()->select('NOMOR_TICKET', 'NAMA_PEMINJAM', 'PERANGKAT', 'NOMOR_REGISTRASI', 'TGL_PEMINJAMAN', 'TGL_PENGEMBALIAN', 'CATATAN_PEMINJAMAN')->get();

        $data = Peminjaman::query()->join('BARANG', 'BARANG.ID_BARANG', 'PEMINJAMAN.ID_BARANG')->select('PEMINJAMAN.NOMOR_TICKET', 'PEMINJAMAN.NAMA_PEMINJAM', 'BARANG.NAMA_BARANG as PERANGKAT', 'BARANG.NOMOR_REGISTRASI as NOMOR_REGISTRASI', 'PEMINJAMAN.TGL_PEMINJAMAN', 'PEMINJAMAN.TGL_PENGEMBALIAN', 'PEMINJAMAN.CATATAN_PEMINJAMAN')->get();

        $peminjamanarray = [];
        $peminjamanarray[] = ['NOMOR_TICKET', 'NAMA_PEMINJAM', 'NAMA_BARANG', 'NOMOR_REGISTRASI', 'TGL_PEMINJAMAN', 'TGL_PENGEMBALIAN', 'CATATAN_PEMINJAMAN'];

        $j=0;
        for ($i=0 ; $i < count($peminjamans) ; $i++) {
            if (!is_null($peminjamans[$i]->PERANGKAT)) {
                $peminjamanarray[] = $peminjamans[$i]->toArray();
            }
            else {
                $peminjamanarray[] = $data[$j]->toArray();
                $j++;
            }
        }

        $datenow = date_create();
        $newdate = date_format($datenow, "d-m-Y");
        $namafile = 'laporan-peminjaman_'.$newdate;

        Excel::create($namafile, function($excel) use ($peminjamanarray) {
        $excel->setTitle('Data Peminjaman');
        $excel->setCreator('Laravel')->setCompany('TI Infrastruktur, LINTASARTA');
        $excel->setDescription('Peminjaman File');
        $excel->sheet('sheet1', function($sheet) use ($peminjamanarray) {
          $sheet->fromArray($peminjamanarray, null, 'A1', false, false);
        });
      })->download('xlsx');
    }
}
