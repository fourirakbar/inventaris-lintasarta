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
use Maatwebsite\Excel\Facades\Excel;

class BarangKeluarController extends Controller
{
    public function index() {
      $barang = DB::table('BARANG')->select('*')->where('STATUS_BARANG', '=', NULL)->where('JUMLAH','>', 0)->get();
      return view('barangkeluar.inputkeluar', compact('barang'));
    }

    public function input() {
      $data = Input::all();

      if (isset($data['ID_BARANG'])) {
            $jumlahasli = DB::table('BARANG')->select('JUMLAH')->where('ID_BARANG', $data['ID_BARANG'])->get();
            $a = $jumlahasli[0]->JUMLAH;
            $b = $a - 1;
            // dd($b);
            BarangKeluar::insertGetId(array(
              'BARANG_ID' => $data['ID_BARANG'],
              'NAMA_USER' => $data['NAMA_USER'],
              'NO_TICKET' => $data['NO_TICKET'],
              'KETERANGAN' => $data['KETERANGAN'],
              'TGL_KELUAR' => $data['TGL_KELUAR'],
              'CATATAN_KELUAR' => $data['CATATAN_KELUAR'],
            ));
            if ($a <= 1) {
              if ($data['CATATAN_KELUAR'] == "") {
                DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Barang Keluar"]);
              }
              else {
                  DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => $data['CATATAN_KELUAR']]);
              }
            }

            $update = "UPDATE BARANG SET JUMLAH = ? WHERE ID_BARANG = ?";
            DB::update($update, array($b, $data['ID_BARANG']));
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

    public function exporttoexcel() {
      $barangkeluars = BarangKeluar::query()->select('NO_TICKET', 'NAMA_USER','PERANGKAT','NOMOR_REGISTRASI','KETERANGAN','TGL_KELUAR')->get();

      $data = BarangKeluar::query()->join('BARANG','BARANG.ID_BARANG','BARANG_KELUAR.BARANG_ID')->select('BARANG_KELUAR.NO_TICKET', 'BARANG_KELUAR.NAMA_USER', 'BARANG.NAMA_BARANG as PERANGKAT', 'BARANG.NOMOR_REGISTRASI as NOMOR_REGISTRASI', 'BARANG_KELUAR.KETERANGAN', 'BARANG_KELUAR.TGL_KELUAR')->get();

      $barangkeluararray = [];
      $barangkeluararray[] = ['NO_TICKET', 'NAMA_USER', 'NAMA_BARANG', 'NOMOR_REGISTRASI', 'KETERANGAN', 'TGL_KELUAR'];

      // dd($barangkeluars);
      $j = 0;
      for ($i=0 ; $i < count($barangkeluars) ; $i++) {
        if (!is_null($barangkeluars[$i]->PERANGKAT)) {
          $barangkeluararray[] = $barangkeluars[$i]->toArray();
        }
        else {
          $barangkeluararray[] = $data[$j]->toArray();
          $j++;
        }
      }

      $datenow = date_create();
      $newdate = date_format($datenow, "d-m-Y");
      $namafile = 'laporan-barang-keluar_'.$newdate;

      Excel::create($namafile, function($excel) use ($barangkeluararray) {
        $excel->setTitle('Barang Keluar');
        $excel->setCreator('Laravel')->setCompany('TI Infrastruktur, LINTASARTA');
        $excel->setDescription('Barang Keluar File');
        $excel->sheet('sheet1', function($sheet) use ($barangkeluararray) {
          $sheet->fromArray($barangkeluararray, null, 'A1', false, false);
        });
      })->download('xlsx');
    }
}
