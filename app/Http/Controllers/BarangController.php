<?php

namespace App\Http\Controllers;

use App\Barang;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class BarangController extends Controller
{
    public function index() {
        $listRack = DB::table('RACK')->select('ID_RACK','NAMA_RACK')->orderBy('NAMA_RACK','ASC')->get();

        return view('barang.inputBarang', compact('listRack'));   
    }

    public function input() {
        $data = Input::all(); //ambil input barang

        //memasukkan data sesuai input ke dalam databse Barang
        Barang::insertGetId(array(
            'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'] ,
            'NAMA_BARANG' => $data['NAMA_BARANG'],
            'JUMLAH' => $data['JUMLAH'],
            'KETERANGAN' => $data['KETERANGAN'],
            'RACK_ID' => $data['RACK_ID'],
        ));

        return redirect('/showbarang')->with('success','Input Barang Sukses'); //return ke /showbarang dengan keterangan sukses
    }

    public function show(){

        //ambil data dari tabel barang join dengan tabel rack
        $barang = DB::table('BARANG')
            ->join('RACK', 'BARANG.RACK_ID', '=', 'RACK.ID_RACK')
            ->select('BARANG.*', 'RACK.*')
            ->get();

        return view('barang.showBarang', compact('barang')); //return view halaman showBarang dengan data dari variable barang
    }

    public function editBarang($ID_BARANG) {
        $barang = DB::table('BARANG')->select('*')->where('ID_BARANG', $ID_BARANG)->get()[0];
        $listRack = DB::table('RACK')->select('ID_RACK','NAMA_RACK')->orderBy('NAMA_RACK','ASC')->get();
        // dd($barang->RACK_ID);

        return view('barang.editBarang', compact('barang', 'listRack'));   
    }

    public function updateBarang (Request $request, $ID_BARANG) {
        // dd($request);
        // dd($ID_BARANG);
        $peminjaman = Barang::find($ID_BARANG); //mencari data peminjaman sesuai dengan ID_PEMINJAMAN yang diklik pada web
        Barang::find($ID_BARANG)->update($request->all()); //update data sesuai inputan pada tabel PEMINJAMAN dengan ID_PEMINJAMAN sesuai pada web

        $url = '/showbarang';
        return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /showPeminjaman dengan keterangan sukses
    }


}
