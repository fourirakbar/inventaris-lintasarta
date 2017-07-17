<?php

namespace App\Http\Controllers;

use App\Repair;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class RepairController extends Controller
{
    public function index() {
    	$barang = DB::table('BARANG')->select('*')->where('STATUS_BARANG', '=', NULL)->get();
        return view('repair.inputRepair', compact('barang'));   
    }

    public function input() {
        $data = Input::all(); //ambil input repair
        // dd($data);
        // memasukkan data sesuai input ke dalam databse Repair
        if (isset($data['ID_BARANG'])) {
        	Repair::insertGetId(array(
		        'NAMA_BARANG' => $data['NAMA_BARANG'] ,
		        'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'],
		        'PROBLEM' => $data['PROBLEM'],
		        'VENDOR' => $data['VENDOR'],
		        'ID_BARANG' => $data['ID_BARANG'],
		        'KETERANGAN_REPAIR' => "Barang Gudang",
		        'CATATAN_REPAIR' => $data['CATATAN_REPAIR'],
		        'STATUS_REPAIR' => "On Repair",
                'TANGGAL_REPAIR' => $data['TANGGAL_REPAIR'],
                'PERKIRAAN_SELESAI' => $data['PERKIRAAN_SELESAI'],
                'NOMOR_TICKET' => $data['NOMOR_TICKET'],
        	));
        	if ($data['CATATAN_REPAIR'] == "") {
        		DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Diperbaiki"]);
        	}
        	else{
        		DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => $data['CATATAN_REPAIR']]);
        	}
        }
        else {
        	Repair::insertGetId(array(
		        'NAMA_BARANG' => $data['NAMA_BARANG'] ,
		        'NOMOR_REGISTRASI' => $data['NOMOR_REGISTRASI'],
		        'PROBLEM' => $data['PROBLEM'],
		        'VENDOR' => $data['VENDOR'],
		        'KETERANGAN_REPAIR' => "Barang User",
		        'CATATAN_REPAIR' => $data['CATATAN_REPAIR'],
		        'STATUS_REPAIR' => "On Repair",
                'TANGGAL_REPAIR' => $data['TANGGAL_REPAIR'],
                'PERKIRAAN_SELESAI' => $data['PERKIRAAN_SELESAI'],
                'NOMOR_TICKET' => $data['NOMOR_TICKET'],
                'TANGGAL_REPAIR' => $data['TANGGAL_REPAIR'],
                'PERKIRAAN_SELESAI' => $data['PERKIRAAN_SELESAI'],
        	));	
        }
        
        return redirect('repair/show')->with('success','Input Barang Sukses'); //return ke /repair/show dengan keterangan sukses
    }

    public function show(){

        $repair = DB::table('REPAIR')->select('*')->get();
        return view('repair.showRepair', compact('repair')); //return view halaman showRepair

	}

	public function showbelum(){

        $repair = DB::table('REPAIR')->select('*')->where('STATUS_REPAIR', '=', 'On Repair')->get();
        return view('repair.showRepair', compact('repair')); //return view halaman showRepair

	}

	public function showsudah(){

        $repair = DB::table('REPAIR')->select('*')->where('STATUS_REPAIR', '=', 'Done')->get();
        return view('repair.showRepair', compact('repair')); //return view halaman showRepair

	}

	public function selesai($ID_PERBAIKAN){
		$cek = DB::table('REPAIR')->where('ID_PERBAIKAN', $ID_PERBAIKAN)->get();
		$idbarang = $cek[0]->ID_BARANG;
		DB::table('REPAIR')->where('ID_PERBAIKAN', $ID_PERBAIKAN)->update(['STATUS_REPAIR' => 'Done']);
		DB::table('BARANG')->where('ID_BARANG', $idbarang)->update(['STATUS_BARANG' => NULL]);
		return redirect('repair/show/belum')->with('success','Barang Selesai Diperbaiki');
	}

    public function showdetail($ID_PERBAIKAN){

        $repair = DB::table('REPAIR')->select('*')->where('ID_PERBAIKAN', '=', $ID_PERBAIKAN)->get();
        $data = $repair[0];
        return view('repair.showDetailRepair', compact('data')); //return view halaman showRepair

    }

    public function showedit($ID_PERBAIKAN){

        $repair = DB::table('REPAIR')->select('*')->where('ID_PERBAIKAN', '=', $ID_PERBAIKAN)->get();
        $data = $repair[0];
        return view('repair.showEditRepair', compact('data')); //return view halaman showRepair

    }

    public function update (Request $request, $ID_PERBAIKAN) {
        // dd($request);
        Repair::find($ID_PERBAIKAN)->update($request->all()); //update data sesuai inputan pada tabel PEMINJAMAN dengan ID_PEMINJAMAN sesuai pada web

        $url = 'repair/show/detail/'.$ID_PERBAIKAN;
        // echo $url;
        return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /showPeminjaman dengan keterangan sukses
    }
}
