<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\comercio;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class ComercioController extends Controller
{
    public function index(){
        $comerce= comercio::where('state',[1,2])->get();
        return view('Comercios.index', ['comerce'=>$comerce]); 
    }

    public function create(){
            
        return view('Comercios.create');
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request)->getData();
        return redirect()->route('comercio.index')->withStatus(__('Comercio registrado exitosamente.'));
            
    }

    public function edit( $id)
    {
        $comerce= comercio::where('id', $id)->first();
        return view('Comercio.edit', ['comerce'=>$comerce]);
    }

    public function update(Request $request, $id){
        $request->merge(['id' => $id]);

        $comerce = comercio::where('id', $id)->first();
        $comerce->name = $request->name;
        $comerce->description = $request->description;
        $comerce->number = $request->number;
        $comerce->email = $request->email;
        $comerce->direccion = $request->direccion;
        if($comerce->update()){
            return redirect()->route('product.index')->with('status',__('Producto actualizado exitosamente.'));
        }else{
            return back();
        }

    }

        

        //Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'name' => 'required|max:499',
            'description' => 'required|max:500',
            'number' => 'required|max:10',
            'direccion' => 'required|max:100',
            'email' => 'required|max:100',
            
        ]);
        
        try {
            $newComercio = new comercio();
            $newComercio->name = $request->name;
            $newComercio->description = $request->description;
            $newComercio->number = $request->number;
            $newComercio->direccion = $request->direccion;
            $newComercio->email = $request->email;
            $newComercio->state = 1;
            $newComercio->save();
            return $this->respond('done', $newComercio);
            } catch (\Throwable $e) {
                return $this->respond('server error', [], $e->getMessage());
            }
        
    }

    
    public function funDelete($id){
        
        $model = comercio::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
        }
}
