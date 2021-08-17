<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\parqueadero;
use App\tarifas;
use Illuminate\Http\Request;
use App\vehiculos;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;

class VehiculosController extends Controller
{
    public function index(){
        $vehicul= vehiculos::where('state',[1,2])->get();
        $cliente= Cliente::where('state',[1,2])->get();
        $parqueadero = parqueadero::where('state',[1,2])->get();

        if (!is_null(request()->placa)) {
            $vehicul = $vehicul->where('placa', request()->placa);
        }
        if (!is_null(request()->state) && request()->state != -1) {
            $vehicul = $vehicul->where('state', request()->state);
        }
    
        return view('Vehiculos.index', compact('vehicul', 'cliente', 'parqueadero')); 

    }

    public function create(){
            
        return view('Vehiculos.create');
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        
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
        $updatevehiculo->clientes_id = $request->cliente_id;
        $updatevehiculo->placa = $request->placa;
        $updatevehiculo->modelo = $request->modelo;
        $updatevehiculo->color = $request->color;
        $updatevehiculo->fecha_entrada = $request->fecha_entrada;
        $updatevehiculo->hora = $request->hora;
        $updatevehiculo->fecha_salida = $request->fecha_salida;
        $updatevehiculo->hora_salida = $request->fecha_entrada;
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
            'cliente_id' => 'required',
            'placa' => 'required|max:6',
            'parqueadero_id' =>'required',
            'modelo' => 'required',
            'color' => 'required',
            'puesto' => 'required',
            'fecha_entrada' => 'required',
            'fecha_salida' => 'required',
            'hora' => 'required',
            'hora_salida' => 'required',
        ]);
        
        try {
            $newvehiculo = new vehiculos();
            $newvehiculo->user_id = (Auth::user()->id);
            $newvehiculo->clientes_id = $request->cliente_id;
            $newvehiculo->parqueadero_id = $request->parqueadero_id;
            $newvehiculo->placa = $request->placa;
            $newvehiculo->modelo = $request->modelo;
            $newvehiculo->color = $request->color;
            $newvehiculo->puesto = $request->puesto;
            $newvehiculo->fecha_entrada = $request->fecha_entrada;
            $newvehiculo->hora = $request->hora;
            $newvehiculo->fecha_salida = $request->fecha_salida;
            $newvehiculo->hora_salida = $request->hora_salida;
            $newvehiculo->state = 1;
            $newvehiculo->save();
            $newvehicul = new Cliente();
            $newvehicul->vehiculo_id = $newvehiculo->id;
            $newvehicul->update();
            return $newvehiculo;
            
            } catch (\Throwable $e) {
                return $this->respond('server error', [], $e->getMessage());
            }
        
    }
    public function funShow(Request $request)
    {
       $request->validate([
          'id' => 'required|exists:vehiculos,id'
       ]);
        $vehiculo = vehiculos::where('id', $request->id)->with('getUser', 'getCliente', 'getParqueo')->first();
        
        $horas = strtotime($vehiculo->hora); 
        $horas2 = strtotime($vehiculo->hora_salida); 
        $total = $horas - $horas2;
        $total2 = idate('y', $total);
        $valor = $vehiculo->getParqueo->id;
        $tarifa = tarifas::where('parqueadero_id', $valor)->first();
        if($tarifa != null){
            $tiempo = $tarifa->tiempo; 
            if($tiempo == 1){
               if( $total > 1){
                $dato = $total * $tarifa->precio;
               }else {
                   $dato = 'Paga menos que una hora.';
               } 
            }else{
                $dato = $total * $tarifa->precio;
            }
        }
        $total3 = $total * $valor;
        $data = array(
            'vehiculo' =>$vehiculo,
            'tarifa' =>$tarifa,
            'total' => $total,
            'total3' => $total3,
            'dato' => $dato,
        );
       return response()->json(['code' => 200, 'data'=>$data], 200);
    }


    public function factura($id)
    {
       request()->merge(['id' => $id]);
       $data = $this->funShow(request())->original;
       if ($data['code'] == 200) {
          $pdf = PDF::loadView('Parqueadero.factura.factura', ['data'=>$data['data']]);
          return $pdf->download('factura.pdf');
       }

         $model = vehiculos::find($id);
         $model->update(['payment_type_vp'=>1]);
 
 
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
