<?php

namespace App\Http\Controllers;

use App\User;

use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;class UsuariosController extends Controller
{
    public function index(){
        
        return view('Usuarios.index'); 
    }

    public function create(){
            
        return view('Usuarios.create');
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request)->getData();
        if($create->code == 200){
            $request->session()->flash('success', 'Creado el proyecto con exito');
            return redirect()->route('index.product');
        }else{
            return back();
        }
    }

    public function edit( $id)
    {
            
    return view('product.edit');
    }

    public function update(Request $request, $id){
        $request->merge(['id' => $id]);
        $store = $this->funUpdate($request)->getData();
        if($store->code == 200){
            return back()->with('success', 'Actualizado con exito');
        }else{
            return back();
        }
    }

        

//Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'title' => 'required|max:499',
            'description' => 'required|max:500',
            'precio' => 'required',
            'stock' => 'required|max:100',
            'img_product' => 'required|image|mimes:jpg,jpeg,png|max:499',
            'comercio_id' => 'required|exists:comercios,id',
        ]);
        
        $newProduct = new User();
        $newProduct->title = $request->title;
        $newProduct->description = $request->description;
        $newProduct->precio = $request->precio;
        $newProduct->stock = $request->stock;
        $newProduct->img_product = $request->img_product;
        $newProduct->comercio_id = $request->comercio_id;
        if ($newProduct->save()) {
            return response()->json(['code' => 200, 'data' => $newProduct], 200);
        } else {
            return response()->json(['code' => 530, 'message' => 'Error al crear un producto'], 530);
        }
        
    }

    public function funUpdate(Request $request){
        $request->validate([
            'title' => 'required|max:499',
            'description' => 'required|max:500',
            'precio' => 'required',
            'stock' => 'required|max:100',
            'img_product' => 'required|image|mimes:jpg,jpeg,png|max:499',
            'comercio_id' => 'required|exists:comercios,id',
        ]);
        try{
            $title = $request->title;
            $description= $request->description;
            $precio = $request->precio;
            $stock = $request->stock;
            $img_product = $request->img_product;
            $comercio_id = $request->comercio_id;
            $state = $request->state;
            $model = User::find($request->id);
            $model->update(['title'=>$title, 'description'=>$description, 'precio'=>$precio,
            'stock'=>$stock,'img_product'=>$img_product,'comercio_id'=>$comercio_id,'state' => $state]);
            return response()->json(['code' => 200, 'data' => $model], 200);
        } catch (\Throwable $e) {
            return response()->json(['code' => 400, 'message' => 'Error al actualizar el producto'], 400);
        }
    }

    public function funDelete(Request $request){
        $request->validate([
            'id' => 'required|exists:products,id'
        ]);

            $model = User::where('id', $request->id)->first();
            $model->state = 3;

            if ($model->update()) {
                return response()->json(['code' => 200, 'data' => $model], 200);
            } else {
                return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
            }
        }
}
