<?php

namespace App\Http\Controllers;

use Maatwebsite\Excel\Facades\Excel;
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
    	$barang = DB::table('BARANG')->select('*')->where('STATUS_BARANG', '=', NULL)->where('JUMLAH','>', 0)->get();
        return view('repair.inputRepair', compact('barang'));
    }

    public function input() {
        $data = Input::all(); //ambil input repair
        // dd($data);
        // memasukkan data sesuai input ke dalam databse Repair
        if (isset($data['ID_BARANG'])) {
            $jumlahasli = DB::table('BARANG')->select('JUMLAH')->where('ID_BARANG', $data['ID_BARANG'])->get();
            $x = $jumlahasli[0]->JUMLAH;
            $y = $x - 1;
        	Repair::insertGetId(array(
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
            if ($x <= 1) {
                if ($data['CATATAN_REPAIR'] == "") {
                    DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => "Diperbaiki"]);
                }
                else{
                    DB::table('BARANG')->where('ID_BARANG', $data['ID_BARANG'])->update(['STATUS_BARANG' => $data['CATATAN_REPAIR']]);
                }
            }

            $update = "UPDATE BARANG SET JUMLAH = ? WHERE ID_BARANG = ?";
            DB::update($update, array($y, $data['ID_BARANG']));
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
        $count = $repair->count();
        $data = DB::table('REPAIR')->join('BARANG','BARANG.ID_BARANG','=','REPAIR.ID_BARANG')->select('BARANG.NAMA_BARANG', 'BARANG.NOMOR_REGISTRASI')->get();

        return view('repair.showRepair', compact('repair', 'count', 'data')); //return view halaman showRepair

	}

	public function showbelum(){

        $repair = DB::table('REPAIR')->select('*')->where('STATUS_REPAIR', '=', 'On Repair')->get();
        $count = $repair->count();
        $data = DB::table('REPAIR')->join('BARANG','BARANG.ID_BARANG','=','REPAIR.ID_BARANG')->select('BARANG.NAMA_BARANG', 'BARANG.NOMOR_REGISTRASI')->get();

        return view('repair.showRepair', compact('repair', 'count', 'data')); //return view halaman showRepair

	}

	public function showsudah(){

        $repair = DB::table('REPAIR')->select('*')->where('STATUS_REPAIR', '=', 'Done')->get();
        $count = $repair->count();
        $data = DB::table('REPAIR')->join('BARANG','BARANG.ID_BARANG','=','REPAIR.ID_BARANG')->select('BARANG.NAMA_BARANG', 'BARANG.NOMOR_REGISTRASI')->get();

        return view('repair.showRepair', compact('repair', 'count', 'data')); //return view halaman showRepair

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
        return view('repair.showEditRepair', compact('repair','data')); //return view halaman showRepair

    }

    public function update (Request $request, $ID_PERBAIKAN) {
        // dd($request);
        Repair::find($ID_PERBAIKAN)->update($request->all()); //update data sesuai inputan pada tabel PEMINJAMAN dengan ID_PEMINJAMAN sesuai pada web

        $url = 'repair/show/detail/'.$ID_PERBAIKAN;
        // echo $url;
        return redirect($url)->with('success','Sukses Update Data'); //return ke halaman /showPeminjaman dengan keterangan sukses
    }

    public function exporttoexcel () {
        $repairs = Repair::query()->select('NOMOR_TICKET', 'NAMA_BARANG', 'NOMOR_REGISTRASI', 'PROBLEM', 'VENDOR', 'KETERANGAN_REPAIR', 'CATATAN_REPAIR', 'TANGGAL_REPAIR', 'PERKIRAAN_SELESAI')->get();

        $data = Repair::query()->join('BARANG', 'BARANG.ID_BARANG', 'REPAIR.ID_BARANG')->select('REPAIR.NOMOR_TICKET', 'BARANG.NAMA_BARANG as NAMA_BARANG', 'BARANG.NOMOR_REGISTRASI as NOMOR_REGISTRASI', 'REPAIR.PROBLEM', 'REPAIR.VENDOR', 'REPAIR.KETERANGAN_REPAIR', 'REPAIR.CATATAN_REPAIR', 'REPAIR.TANGGAL_REPAIR', 'REPAIR.PERKIRAAN_SELESAI')->get();

        $repairarray = [];
        $repairarray[] = ['NOMOR_TICKET', 'NAMA_BARANG', 'NOMOR_REGISTRASI', 'PROBLEM', 'VENDOR', 'KETERANGAN_REPAIR', 'CATATAN_REPAIR', 'TANGGAL_REPAIR', 'PERKIRAAN_SELESAI'];

        $j=0;
        for ($i=0 ; $i < count($repairs) ; $i++) {
            if (!is_null($repairs[$i]->NAMA_BARANG)) {
                $repairarray[] = $repairs[$i]->toArray();
            }
            else {
                $repairarray[] = $data[$j]->toArray();
                $j++;
            }
        }
        
        $datenow = date_create();
        $newdate = date_format($datenow, "d-m-Y");
        $namafile = 'laporan-repair_'.$newdate;

        Excel::create($namafile, function($excel) use ($repairarray) {
            $excel->setTitle('Repair');
            $excel->setCreator('Laravel')->setCompany('TI Infrastruktur, LINTASARTA');
            $excel->setDescription('Repair File');
            $excel->sheet('sheet1', function($sheet) use ($repairarray) {
              $sheet->fromArray($repairarray, null, 'A1', false, false);
            });
        })->download('xlsx');
    }
}
