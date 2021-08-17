<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use App\tarifas;
use App\User;
use App\roles;
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
        
        return redirect()->route('Tarifas.index')->with('status',__('Tarifa registrado exitosamente.'));
            
    }

    public function edit( $id)
    {
        $user = User::where('id', $id)->first();  
        $roles = roles::where('state', 1)->get(); 
        $parqueadero = parqueadero::where('state', 1)->get(); 
        $tarifa = tarifas::where('state', 1)->get(); 
        return view('Tarifas.edit', compact('user', 'roles', 'parqueadero', 'tarifa')); 
    }

       //Funciones**

       public function funCreate(Request $request){
       
        $request->validate([
            'parqueadero_id' => 'required',
            'title' => 'required',
            'description' => 'required',
            'precio' => 'required',
            'tiempo' => 'required',
            'tipo_vehiculo' => 'required',
    
        ]);
        
        try {
            $newtarifa = new tarifas();
            $newtarifa->parqueadero_id = $request->parqueadero_id;
            $newtarifa->title = $request->title;
            $newtarifa->description = $request->description;
            $newtarifa->precio = $request->precio;
            $newtarifa->puesto = $request->puesto;
            $newtarifa->tiempo = $request->tiempo;
            $newtarifa->tipo_vehiculo = $request->tipo_vehiculo;
            $newtarifa->state = 1;
            $newtarifa->save();
            return $newtarifa;
            
            } catch (\Throwable $e) {
                return $this->respond('server error', [], $e->getMessage());
            }
        
    }

}
