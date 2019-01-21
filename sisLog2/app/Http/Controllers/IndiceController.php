<?php

namespace sisLog2\Http\Controllers;

use Illuminate\Http\Request;

use sisLog2\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class IndiceController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view("Rem.index");
    }

    public function index2()
    {
        return view("seguridad.index");
    }
}
