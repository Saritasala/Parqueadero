<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tarifas;

class TarifasController extends Controller
{
    public function index(){
        $tarifa= tarifas::where('state',[1,2])->get();
        return view('Tarifas.index', compact('tarifa')); 
    }
}
