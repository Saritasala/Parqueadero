<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tarifas;
use App\parqueadero;

class TarifasController extends Controller
{
    public function index(){
        $parqueadero = parqueadero::where('state', [1,2])->get();
        $tarifa= tarifas::where('state',[1,2])->get();
        return view('Tarifas.index', compact('tarifa', 'parqueadero')); 
    }

    
    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        return redirect()->route('tarifas.index')->withStatus(__('Tarifa registrado exitosamente.'));
    }

    //Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'parqueadero_id' => 'required',
            'title' => 'required|max:500',
            'description' => 'required',
            'precio' => 'required',
            'tipo_vehiculo' => 'required',
            'tiempo' => 'required',
        ]);
        try {
        $nuevo = new tarifas();
        $nuevo->parqueadero_id = $request->parqueadero_id;
        $nuevo->title = $request->title;
        $nuevo->description = $request->description;
        $nuevo->precio = $request->precio;
        $nuevo->tipo_vehiculo = $request->tipo_vehiculo;
        $nuevo->tiempo = $request->tiempo;
        $nuevo->state = 1;
        $nuevo->save();
        return $this->respond('done', $nuevo);
        } catch (\Throwable $e) {
            return $this->respond('server error', [], $e->getMessage());
        }
    
    }

}
