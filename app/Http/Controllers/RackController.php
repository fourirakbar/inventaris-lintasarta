<?php

namespace App\Http\Controllers;

use App\Rack;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RackController extends Controller
{
    public function index() {
      return view('rack.inputRack'); //return view ke halaman inputRack
    }

    public function input() {
      $data = Input::all(); //ambil data sesuai inputan dari user

      //memasukkan data sesuai input ke dalam databse Rack
      Rack::insertGetId(array(
        'NAMA_RACK' => $data['NAMA_RACK'],
        'LOKASI_RACK' => $data['LOKASI_RACK'],
      ));
      return redirect('/rack/show')->with('success','Tambah Rack Sukses'); //return ke /rack/show dengan keterangan sukses
    }

    public function show() {
      $rack = DB::table('RACK')->select('*')->orderBy('NAMA_RACK','ASC')->get(); //ambil semua data dari tabel Rack
      return view('rack.showRack', compact('rack')); //return ke halaman showRack dengan data dari variable $rack
    }

    public function showeach($ID_RACK) {
      $rack = DB::table('BARANG')->select('*')->where('RACK_ID', '=', $ID_RACK)->get(); //ambil semua data dari tabel Rack, dengan ketentuan kolom RACK_ID harus sama dengan $ID_RACK
      return view('rack.showRackEach', compact('rack')); //return ke halaman showRackEach dengan data dari variable $rack
    }

    public function edit($ID_RACK) {
      $rack = Rack::find($ID_RACK); //mencari data rack sesuai dengan ID_RACK yang diklik pada web
      return view('rack.editRack', compact('rack')); //return ke halaman editRack dengan data dari variable $rack
    }

    public function update(Request $request, $ID_RACK) {
      $rack = Rack::find($ID_RACK); //mencari data rack sesuai dengan ID_RACK yang diklik pada web
      Rack::find($ID_RACK)->update($request->all()); //update data sesuai inputan pada tabel Rack dengan ID_RACK sesuai pada web
      
      $url = '/rack/show';
      return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /rack/show dengan keterangan sukses
    }

    public function delete($ID_RACK) {
      $rack = Rack::find($ID_RACK); //mencari data rack sesuai dengan ID_RACK yang diklik pada web

      try {
        $rack->delete(); //delete data rack sesuai dengan ID_RACK pada web
        return redirect('/rack/show')->with('success','Delete Rack Sukses'); //return ke halaman /rack/show dengan keterangan sukses
      } 
      catch (\Exception $e) { //kalau error terjadi
        $url = '/rack/edit/'.$ID_RACK;
        return Redirect::to($url)->with('error','Kosongkan Rack Jika Ingin Menghapus Rack'); //return ke halaman /rack/edit/(sesuai dengan ID_RACK) dengan keterangan error
      }
    }
}
