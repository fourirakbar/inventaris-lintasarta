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
      return view('rack.inputRack');
    }

    public function input() {
      $data = Input::all();

      Rack::insertGetId(array(
        'NAMA_RACK' => $data['NAMA_RACK'],
        'LOKASI_RACK' => $data['LOKASI_RACK'],
      ));

      return redirect('/rack/show')->with('success','Tambah Rack Sukses');
    }

    public function show() {
      $rack = DB::table('RACK')->select('*')->get();

      return view('rack.showRack', compact('rack'));
    }

    public function showeach($ID_RACK) {
      $rack = DB::table('BARANG')->select('*')->where('RACK_ID', '=', $ID_RACK)->get();
      return view('rack.showRackEach', compact('rack'));
    }

    public function edit($ID_RACK) {
      $rack = Rack::find($ID_RACK);

      return view('rack.editRack', compact('rack'));
    }

    public function update(Request $request, $ID_RACK) {
      $rack = Rack::find($ID_RACK);
      Rack::find($ID_RACK)->update($request->all());
      // $url = '/rack/edit/'.$ID_RACK;
      $url = '/rack/show';
      return redirect($url)->with('success','Sukses Update Data');
    }

    public function delete($ID_RACK) {
      $rack = Rack::find($ID_RACK);
      $rack->delete();
      // dd($rack);
      return redirect('/rack/show')->with('success','Delete Rack Sukses');
    }
}
