<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use App\Permintaan;
use App\Pembatalan;
use App\Tikpro;
use App\HistoryTikpro;
use Session;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function show()
    {
        $msg = "This is a simple message.";
        return response()->json(array('msg'=> $msg), 200);
    }
}
