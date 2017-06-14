<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\PengaturanTgl;

class PengaturanTglController extends Controller
{
    public function doView(Request $request) {
        $pengaturan = PengaturanTgl::orderBy('ID_PENGATURAN','ASC')->paginate(1);
        return view('pengaturanTgl.index', compact('pengaturan'));
    }

    public function doEdit() {
    	$pengaturan = PengaturanTgl::find(1);
        return view('pengaturanTgl.edit', compact('pengaturan'));
    }

    public function doUpdate(Request $request) {
    	$pengaturan = PengaturanTgl::find(1);
        PengaturanTgl::find(1)->update($request->all());
        
        $url = '/pengaturanTgl';
        
        return redirect($url)->with('success','Sukses Update Data');
    }
}
