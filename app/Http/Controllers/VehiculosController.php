<?php

namespace App\Http\Controllers;

use App\Cliente;
use Illuminate\Http\Request;
use App\vehiculos;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class VehiculosController extends Controller
{
    public function index(){
        $vehicul= vehiculos::where('state',[1,2])->get();
        $cliente= Cliente::where('state',[1,2])->get();
        return view('Vehiculos.index', compact('vehicul', 'cliente')); 
    }

    public function create(){
            
        return view('Vehiculos.create');
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        //dd($create);
        return redirect()->route('vehiculos.index')->with('status',__('Vehiculo registrado exitosamente.'));
            
    }

    public function edit($id)
    {
        $vehiculs= vehiculos::where('id', $id)->first();
        //dd($comerce);
        return view('Vehiculos.edit', ['vehiculs'=>$vehiculs]);
    }

    public function update(Request $request, $id){
        $request->merge(['id' => $id]);

        $updatevehiculo = vehiculos::where('id', $id)->first();
        $updatevehiculo->clientes_id = $request->clientes_id;
        $updatevehiculo->placa = $request->placa;
        $updatevehiculo->modelo = $request->modelo;
        $updatevehiculo->color = $request->color;
        $updatevehiculo->fecha_entrada = $request->fecha_entrada;
        $updatevehiculo->fecha_salida = $request->fecha_salida;
        $updatevehiculo->state = 1;
        if($updatevehiculo->update()){
            return redirect()->route('vehiculos.index')->with('status',__('Vehiculo actualizado exitosamente.'));
        }else{
            return back();
        }

    }

        

        //Funciones**

    public function funCreate(Request $request){
        
        $request->validate([
            'clientes_id' => 'required',
            'placa' => 'required|max:6',
            'modelo' => 'required',
            'color' => 'required',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
        ]);
        //dd($request);
        try {
            $newvehiculo = new vehiculos();
            $newvehiculo->user_id = (Auth::user()->id);
            $newvehiculo->clientes_id = $request->clientes_id;
            $newvehiculo->placa = $request->placa;
            $newvehiculo->modelo = $request->modelo;
            $newvehiculo->color = $request->color;
            $newvehiculo->fecha_entrada = $request->fecha_entrada;
            $newvehiculo->fecha_salida = $request->fecha_salida;
            $newvehiculo->state = 1;
            $newvehiculo->save();
            //dd($newComercio);
            return $newvehiculo;
            
            } catch (\Throwable $e) {
                return $this->respond('server error', [], $e->getMessage());
            }
        
    }

    
    public function funDelete($id){
        
        $model = vehiculos::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
        }
}
