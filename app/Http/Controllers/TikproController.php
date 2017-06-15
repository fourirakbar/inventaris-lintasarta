<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Tikpro;

class TikproController extends Controller
{
    public function index() {
        $jebret = Tikpro::find($ID_TIKPRO);
        return view('tikpro.edittikpro', compact('jebret'));
    }}
