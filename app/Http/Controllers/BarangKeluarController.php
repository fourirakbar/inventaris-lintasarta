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

      if (isset($data['ID_BARANG'])) {
            BarangKeluar::insertGetId(array(
              'BARANG_ID' => $data['ID_BARANG'],
              'NAMA_USER' => $data['NAMA_USER'],
              'NO_TICKET' => $data['NO_TICKET'],
              'KETERANGAN' => $data['KETERANGAN'],
              'TGL_KELUAR' => $data['TGL_KELUAR'],
              'CATATAN_KELUAR' => $data['CATATAN_KELUAR'],
            ));
            if ($data['CATATAN_KELUAR'] == "") {
                DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Barang Keluar"]);
            }
            else{
                DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => $data['CATATAN_KELUAR']]);
            }
        }
        else {
            BarangKeluar::insertGetId(array(
              'NAMA_USER' => $data['NAMA_USER'],
              'NO_TICKET' => $data['NO_TICKET'],
              'PERANGKAT' => $data['PERANGKAT'],
              'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'],
              'KETERANGAN' => $data['KETERANGAN'],
              'TGL_KELUAR' => $data['TGL_KELUAR'],
              'CATATAN_KELUAR' => $data['CATATAN_KELUAR'],
            ));    
        }
        return redirect('/barangkeluar/show')->with('success', 'Input Barang Keluar Sukses');
    }

    public function show() {
      $show = DB::table('BARANG_KELUAR')->select('*')->get();
      $count = $show->count();
      $data = DB::table('BARANG_KELUAR')->join('BARANG','BARANG.ID_BARANG','=','BARANG_KELUAR.BARANG_ID')->select('BARANG.NOMOR_REGISTRASI as q','BARANG_KELUAR.NOMOR_REGISTRASI as w','BARANG.NAMA_BARANG', 'BARANG_KELUAR.ID_BARANGKELUAR','BARANG_KELUAR.BARANG_ID','BARANG_KELUAR.NO_TICKET','BARANG_KELUAR.NAMA_USER','BARANG_KELUAR.PERANGKAT','BARANG_KELUAR.KETERANGAN','BARANG_KELUAR.CATATAN_KELUAR','BARANG_KELUAR.TGL_KELUAR')->get();
      
      return view('barangkeluar.showkeluar', compact('show','data','count'));
    }
}
