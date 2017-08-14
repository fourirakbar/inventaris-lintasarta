<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Maatwebsite\Excel\Facades\Excel;

class BarangController extends Controller
{
    public function index() {
        $listRack = DB::table('RACK')->select('ID_RACK','NAMA_RACK')->orderBy('NAMA_RACK','ASC')->get();

        return view('barang.inputBarang', compact('listRack'));   
    }

    public function input() {
        $data = Input::all(); //ambil input barang
        // dd($data);
        if (!isset($data['STATUS_BARANG'])) {
            $data['STATUS_BARANG'] = null;
        }
        //memasukkan data sesuai input ke dalam databse Barang
        Barang::insertGetId(array(
            'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'] ,
            'NAMA_BARANG' => $data['NAMA_BARANG'],
            'JUMLAH' => $data['JUMLAH'],
            'KETERANGAN' => $data['KETERANGAN'],
            'RACK_ID' => $data['RACK_ID'],
            'HARGA_BARANG' => $data['HARGA_BARANG'],
            'STATUS_BARANG' => $data['STATUS_BARANG'],
        ));

        return redirect('/showbarang')->with('success','Input Barang Sukses'); //return ke /showbarang dengan keterangan sukses
    }

    public function show(){

        //ambil data dari tabel barang join dengan tabel rack
        $barang = DB::table('BARANG')
            ->join('RACK', 'BARANG.RACK_ID', '=', 'RACK.ID_RACK')
            ->select('BARANG.*', 'RACK.*')
            ->where('STATUS_BARANG', '!=', 'Tidak Terpakai')
            ->Where('STATUS_BARANG', '!=', 'Rusak')
            ->orWhereNULL('STATUS_BARANG')
            ->get();
        // dd($barang);

        return view('barang.showBarang', compact('barang')); //return view halaman showBarang dengan data dari variable barang
    }

    public function show2(){

        //ambil data dari tabel barang join dengan tabel rack
        $barang = DB::table('BARANG')
            ->join('RACK', 'BARANG.RACK_ID', '=', 'RACK.ID_RACK')
            ->select('BARANG.*', 'RACK.*')
            ->where('STATUS_BARANG', '=', 'Tidak Terpakai')
            ->orWhere('STATUS_BARANG', '=', 'Rusak')
            ->get();
        // dd($barang);

        return view('barang.showBarang', compact('barang')); //return view halaman showBarang dengan data dari variable barang
    }

    public function editBarang($ID_BARANG) {
        $barang = DB::table('BARANG')->select('*')->where('ID_BARANG', $ID_BARANG)->get()[0];
        $listRack = DB::table('RACK')->select('ID_RACK','NAMA_RACK')->orderBy('NAMA_RACK','ASC')->get();
        // dd($barang->RACK_ID);

        return view('barang.editBarang', compact('barang', 'listRack'));   
    }

    public function updateBarang (Request $request, $ID_BARANG) {
        // dd($request->all());
        // dd($ID_BARANG);
        // $peminjaman = Barang::find($ID_BARANG); //mencari data peminjaman sesuai dengan ID_PEMINJAMAN yang diklik pada web
        Barang::find($ID_BARANG)->update($request->all()); //update data sesuai inputan pada tabel PEMINJAMAN dengan ID_PEMINJAMAN sesuai pada web

        $url = '/showbarang';
        return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /showPeminjaman dengan keterangan sukses
    }

    public function exporttoexcel () {
        $barangs = Barang::query()->select('NOMOR_REGISTRASI', 'NAMA_BARANG', 'JUMLAH', 'KETERANGAN', 'STATUS_BARANG', 'HARGA_BARANG')->get();

        $barangarray = [];
        $barangarray[] = ['NOMOR_REGISTRASI', 'NAMA_BARANG', 'JUMLAH', 'KETERANGAN', 'STATUS_BARANG', 'HARGA_BARANG'];

        for ($i=0 ; $i < count($barangs) ; $i++) {
            $barangarray[] = $barangs[$i]->toArray();
        }

        $datenow = date_create();  
        $newdate = date_format($datenow, "d-m-Y");
        $namafile = 'laporan-data-barang_'.$newdate;

        Excel::create($namafile, function($excel) use ($barangarray) {
            $excel->setTitle('Barang Keluar');
            $excel->setCreator('Laravel')->setCompany('TI Infrastruktur, LINTASARTA');
            $excel->setDescription('Barang Keluar File');
            $excel->sheet('sheet1', function($sheet) use ($barangarray) {
              $sheet->fromArray($barangarray, null, 'A1', false, false);
            });
        })->download('xlsx');
    }


}
