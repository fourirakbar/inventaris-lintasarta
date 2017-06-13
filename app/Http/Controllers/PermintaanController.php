<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Permintaan;

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
        echo $data['NOMOR_TICKET'];
        echo $data['NAMA_REQUESTER'];
        echo $data['BARANG_PERMINTAAN'];
        echo $data['TGL_PERMINTAAN'];
        echo $data['TGL_DEADLINE'];
        Permintaan::insertGetId(array(
            'NOMOR_TICKET' => $data['NOMOR_TICKET'],
            'NAMA_REQUESTER' => $data['NAMA_REQUESTER'],
            'BARANG_PERMINTAAN' => $data['BARANG_PERMINTAAN'],
            'TGL_PERMINTAAN' => $data['TGL_PERMINTAAN'],
            'TGL_DEADLINE' => $data['TGL_DEADLINE'],
        ));

        return redirect('/request')->with('success','Request Barang Sukses');
    }

    public function monitoring() {
        return view('permintaan.monitoring');
    }

    public function lihatSemua(Request $request) {
        $jebret = Permintaan::orderBy('ID_PERMINTAAN','ASC')->where('STATUS', '!=', 'done')->paginate(10);   
        return view('permintaan.semuaPermintaan', compact('jebret'))->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function lihatSemuaSudah(Request $request) {
        $jebret = Permintaan::orderBy('ID_PERMINTAAN','ASC')->where('STATUS', 'done')->paginate(10);
        return view('permintaan.semuaPermintaan', compact('jebret'))->with('i', ($request->input('page', 1) - 1) * 5);
    } 

    public function tindakLanjut($ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN);
        return view('permintaan.tindakLanjut',compact('jebret'));
    }

    public function details($ID_PERMINTAAN) {
        $jebret = Permintaan::find($ID_PERMINTAAN);
        return view('permintaan.details', compact('jebret'));
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
