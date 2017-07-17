<?php

namespace App\Http\Controllers;

use App\Peminjaman;
use App\Barang;
use App\BarangKeluar;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BarangKeluarController extends Controller
{
    public function index() {
      $barang = DB::table('BARANG')->select('*')->where('STATUS_BARANG', '=', NULL)->get();
      return view('barangkeluar.inputkeluar', compact('barang'));
    }

    public function input() {
      $data = Input::all();

      BarangKeluar::insertGetId(array(
        'BARANG_ID' => $data['ID_BARANG'],
        'NAMA_USER' => $data['NAMA_USER'],
        'NO_TICKET' => $data['NO_TICKET'],
        'KETERANGAN' => $data['KETERANGAN'],
        'TGL_KELUAR' => $data['TGL_KELUAR'],
      ));
      $query4 = DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Barang Keluar"]);
      return redirect('/barangkeluar/show')->with('success', 'Input Barang Keluar Sukses');
    }

    public function show() {
      $show = DB::table('BARANG_KELUAR')->join('BARANG','BARANG.ID_BARANG','=','BARANG_KELUAR.BARANG_ID')->select('BARANG.NOMOR_REGISTRASI','BARANG.NAMA_BARANG','BARANG_KELUAR.NAMA_USER','BARANG_KELUAR.KETERANGAN','BARANG_KELUAR.TGL_KELUAR')->get();
      // dd($show);
      return view('barangkeluar.showkeluar', compact('show'));
    }
}
