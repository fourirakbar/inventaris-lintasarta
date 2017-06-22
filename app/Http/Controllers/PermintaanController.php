<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Permintaan;
use App\Pembatalan;
use App\Tikpro;
use App\HistoryTikpro;
use Session;

class PermintaanController extends Controller
{
    public function index()
    {
        return view('permintaan.request');
    }

    public function input() {
        $data = Input::all();
        $a = "in progress";
        $b = "1";
        $i = 1;
        echo $data['NOMOR_TICKET'];
        echo $data['NAMA_REQUESTER'];
        echo $data['BARANG_PERMINTAAN'];
        echo $data['TGL_PERMINTAAN'];
        echo $data['TGL_DEADLINE'];
        Permintaan::insertGetId(array(
            'NOMOR_TICKET' => $data['NOMOR_TICKET'],
            'NAMA_REQUESTER' => $data['NAMA_REQUESTER'],
            'BAGIAN' => $data['BAGIAN'],
            'DIVISI' => $data['DIVISI'],
            'BARANG_PERMINTAAN' => $data['BARANG_PERMINTAAN'],
            'DESKRIPSI' => $data['DESKRIPSI'],
            'TGL_PERMINTAAN' => $data['TGL_PERMINTAAN'],
            'STATUS' => $a,
            'TIKPRO_ID' => $b,
        ));

        $ticket = DB::table('PERMINTAAN')->select('ID_PERMINTAAN')->orderBy('ID_PERMINTAAN', 'DESC')->limit('1')->get();
        $kuylah = explode(":", $ticket);
        $bossku = explode("}]", $kuylah[1]);

        for ($i=1; $i < 10; $i++) {
            HistoryTikpro::insertGetId(array(
                'TIKPRO_ID' => $i,
                'PERMINTAAN_ID' => $bossku[0],
            ));
        };

        return redirect('/request')->with('success','Request Barang Sukses');
    }

    public function monitoring() {
        return view('permintaan.monitoring');
    }

    public function lihatSemua() {
        // $jebret = Permintaan::orderBy('ID_PERMINTAAN','ASC')->paginate();
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('STATUS','!=','batal')->get();
        $jebret2 = DB::table('TIKPRO')->get();
        // dd($jebret2);
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2'));
    }

    public function lihatSemuaBelum(Request $request) {
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('STATUS', 'in progress ')->get();
        $jebret2 = DB::table('TIKPRO')->get();
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2'));
        // dd($jebret);
    }

    public function lihatSemuaSudah(Request $request) {
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('STATUS', 'done ')->get();
        $jebret2 = DB::table('TIKPRO')->get();
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2'));
    }

    public function tindakLanjut($ID_PERMINTAAN) {
        $jebret2 = Permintaan::find($ID_PERMINTAAN);
        return view('permintaan.tindakLanjut',compact('jebret2'));
    }

    public function details($ID_PERMINTAAN) {
        $query = DB::table('PERMINTAAN')->select('TIKPRO.NAMA_TIKPRO')->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->where('PERMINTAAN.ID_PERMINTAAN', $ID_PERMINTAAN)->get();

        $jebret = Permintaan::find($ID_PERMINTAAN);
        $jebret2 = DB::table('TIKPRO')->get();
        $boi = DB::table('HISTORY_TIKPRO')->select('*')->join('PERMINTAAN','PERMINTAAN.ID_PERMINTAAN', '=', 'HISTORY_TIKPRO.PERMINTAAN_ID')->where('PERMINTAAN.ID_PERMINTAAN', $ID_PERMINTAAN)->get();
        // dd($boi);
        return view('permintaan.details', compact('jebret', 'query', 'jebret2', 'boi'));
    }

    public function doEdit($ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN);
        $boi = DB::table('HISTORY_TIKPRO')->get();
        return view('permintaan.edit', compact('jebret'));
    }

    public function doUpdate(Request $request, $ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN);
        Permintaan::find($ID_PERMINTAAN)->update($request->all());

        $url = '/semua/lihat/'.$ID_PERMINTAAN;

        return redirect($url)->with('success','Sukses Update Data');
    }

    public function dashboard()
    {
        return view('permintaan.dashboard');
    }

    
    public function hapus($ID_PERMINTAAN)
    {
        $jebret = Permintaan::find($ID_PERMINTAAN);
        return view('permintaan.hapus', compact('jebret'));
    }

    public function delete(Request $request, $ID_PERMINTAAN){
        $file = $request->file('FILE_PEMBATALAN');
        $destinationPath = 'uploads';
        $file->move($destinationPath,"pembatalan_".$ID_PERMINTAAN.".jpg");
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->get();
        $jebret2 = DB::table('TIKPRO')->get();
        Pembatalan::insertGetId(array(
            'PERMINTAAN_ID' => $ID_PERMINTAAN,
            'ALASAN_PEMBATALAN' => $request->ALASAN_PEMBATALAN,
            'FILE_PEMBATALAN' => $destinationPath."/pembatalan_".$ID_PERMINTAAN.".jpg",
            'STATUS_PEMBATALAN' => "in progress",
        ));
        // dd($permintaan2);
        return view('permintaan.semuaPermintaan', compact('jebret', 'jebret2'));
   
   }

   public function showpembatalan()
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->get();
        // dd($jebret);
        return view('permintaan.adminhapus', compact('jebret'));
    }

    public function showpembatalanbelum()
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->where('STATUS_PEMBATALAN','!=','done')->get();
        // dd($jebret);
        return view('permintaan.adminhapus', compact('jebret'));
    }

    public function detailpembatalan($ID_PERMINTAAN)
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->where('ID_PERMINTAAN','=',$ID_PERMINTAAN)->get()[0];
        // dd($jebret);
        return view('permintaan.detailadminhapus', compact('jebret'));
    }

    public function execpembatalan($ID_PERMINTAAN)
    {
        $jebret = Permintaan::query()->join('PEMBATALAN','PEMBATALAN.PERMINTAAN_ID','=','PERMINTAAN.ID_PERMINTAAN')->get();
        Permintaan::find($ID_PERMINTAAN)->update(['STATUS' => 'batal']);
        DB::table('PEMBATALAN')->where('PERMINTAAN_ID','=',$ID_PERMINTAAN)->update(['STATUS_PEMBATALAN' => 'done']);

        $url = 'adminhapus';

        return redirect($url)->with('success','Sukses Update Data');
    }

    
}
