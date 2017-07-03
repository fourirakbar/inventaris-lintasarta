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
        return view('barang.inputBarang');   
    }

    public function input() {
        $data = Input::all();

        Barang::insertGetId(array(
            'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'] ,
            'NAMA_BARANG' => $data['NAMA_BARANG'],
            'JUMLAH' => $data['JUMLAH'],
            'KETERANGAN' => $data['KETERANGAN'],
            'RACK_ID' => $data['RACK_ID'],
        ));

        return redirect('/showbarang')->with('success','Input Barang Sukses');
    }

    public function show(){
        $barang = DB::table('BARANG')
            ->join('RACK', 'BARANG.RACK_ID', '=', 'RACK.ID_RACK')
            ->select('BARANG.*', 'RACK.*')
            ->get();
            // dd($barang);
            return view('barang.showBarang', compact('barang'));
    }
}
