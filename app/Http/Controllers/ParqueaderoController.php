<?php

namespace App\Http\Controllers;
use App\parqueadero;
use App\parametros;
use DB;
use App\Http\Controllers\RestActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ParqueaderoController extends Controller
{
    use RestActions;

    public function index(){
        $puesto= parqueadero::where('state',[1,2])->get();
        
        if (!is_null(request()->nombre)) {
            $puesto = $puesto->where('nombre', request()->nombre);
        }
       
        if (!is_null(request()->state) && request()->state != -1) {
            $puesto = $puesto->where('state', request()->state);
        }
        return view('Parqueadero.index', compact('puesto')); 
    }


    public function store(Request $request){
        $create = $this->funCreate($request);
        return back();
    }

    public function edit($id)
    {
        $parqu= parqueadero::where('id', $id)->first();
        //dd($comerce);
        return view('Parqueadero.edit', ['parqu'=>$parqu]);
    }

    public function destroy($id)
    {
        request()->merge(['id' => $id]);
        return $this->funDelete(request());
    }

    //Funciones

    public function funCreate(Request $request){
         $request->validate([
            'puestos' => 'required',
            'nombre' => 'required|max:500',
            'pisos' => 'required'
        ]);
        try {
            $newparqueo = new parqueadero();
            $newparqueo->puestos = $request->puestos;
            $newparqueo->nombre = $request->nombre;
            $newparqueo->pisos = $request->pisos;
            $newparqueo->state = 1;
            $newparqueo->save();
            } catch (\Throwable $e) {
                return $this->respond('server error', [], $e->getMessage());
            }
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);  

        $cliente = parqueadero::where('id', $id)->first();
        $cliente->puestos = $request->puestos;
        $cliente->nombre = $request->nombre;
        $cliente->pisos = $request->pisos;
        $cliente->state = $request->state;
        
      
        $cliente->update();

        return redirect()->route('parqueadero.index')->with('status',__('Parqueadero actualizado exitosamente.'));
    }

    public function funDelete($id){
        $model = parqueadero::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
    }
}