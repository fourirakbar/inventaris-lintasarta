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

class PermintaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('permintaan.request');
    }

    public function input() {
        $data = Input::all();
        $a = "in progress";
        $b = "1";
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
            'TGL_DEADLINE' => $data['TGL_DEADLINE'],
            'STATUS' => $a,
            'TIKPRO_ID' => $b,
        ));

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
        // dd($jebret2);
        return view('permintaan.details', compact('jebret', 'query', 'jebret2'));
        // print_r($query);

        // $jebret = Permintaan::find($ID_PERMINTAAN)->query()->get()->all();
        // dd($jebret);
        // return view('permintaan.details', compact('jebret'));
    }

    public function doEdit($ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN);
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
