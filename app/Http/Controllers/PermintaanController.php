<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Permintaan;
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
        $jebret = Permintaan::query()->join('TIKPRO','TIKPRO.ID_TIKPRO','=','PERMINTAAN.TIKPRO_ID')->get();
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



    // public function edit() {
    //     $data = Input::all();

    // }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [

            'nama_peminta' => 'required',
            'barang_permintaan' => 'required'

        ]);


        Permintaan::create($request->all());

        return redirect()->route('request')

                        ->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
