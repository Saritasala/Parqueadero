<?php

namespace App\Http\Controllers;

use App\product;
use App\comercio;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RestActions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    use RestActions;

    public function index(){
    $user = Auth::user();
        if($user->role_id==1){
       $producto= product::where('state',[1,2])->with('getComercio')->get();
       }else{
        $producto= product::where('state', 1)->with('getComercio')->get();
        }
        return view('Productos.index',['producto'=>$producto]);
    }

    public function create(){
        $commerce = comercio::where('state',1)->get();
        return view('Productos.create', ['commerce'=>$commerce]);
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        return redirect()->route('product.index')->withStatus(__('Producto registrado exitosamente.'));
    }

    public function edit($id)
    {
        $product = product::where('id', $id)->with('getComercio')->first();
        return view('Productos.edit', ['product' =>$product]);
    }

    public function update(Request $request, $id){
        
        $request->merge(['id' => $id]);
        $store = $this->funUpdate($request, $id);
        dd($store);
        if($store['status'] == 200){
            return redirect()->route('product.index')->withStatus(__('Producto actualizado exitosamente.'));
        }else{
            return back()->withStatus(__('Hubo un error, intentelo nuevamente.'));
        }
    }

    public function destroy($id)
    {
        request()->merge(['id' => $id]);
        return $this->funDelete(request());
    }

    

    //Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'title' => 'required|max:499',
            'description' => 'required|max:500',
            'precio' => 'required',
            'stock' => 'required|max:100',
            'imgProduct' => 'required|image|mimes:jpg,jpeg,png|max:200000',
            'comercio_id' => 'required|exists:comercios,id',
        ]);
        try {
        $newProduct = new Product();
        $newProduct->title = $request->title;
        $newProduct->description = $request->description;
        $newProduct->precio = $request->precio;
        $newProduct->stock = $request->stock;
        if ($request->imgProduct) {
                $newProduct->img_product = $request->imgProduct->store('product_images', 'public');
            }
        $newProduct->comercio_id = $request->comercio_id;
        $newProduct->state = 1;
        $newProduct->save();
        return $this->respond('done', $newProduct);
        } catch (\Throwable $e) {
            return $this->respond('server error', [], $e->getMessage());
        }
    
    }

    public function funUpdate(Request $request){
        $request->validate([
            'title' => 'required|max:499',
            'description' => 'required|max:500',
            'precio' => 'required',
            'stock' => 'required|max:100',
            'imgProduct' => 'required|image|mimes:jpg,jpeg,png|max:499',
            'comercio_id' => 'required|exists:comercios,id',
        ]);
        try{
            $Producto = Product::where('id', $request->id)->first();
            $Producto->title = $request->title;
            $Producto->description = $request->description;
            $Producto->precio = $request->precio;
            $Producto->stock = $request->stock;
            $Producto->comercio_id = $request->comercio_id;
            if ($request->imgProduct) {
                Storage::disk("public")->delete($Producto->img_product);
                $Producto->img_product = $request->imgProduct->store('product_images', 'public');
                $Producto->update();
            }
            return $this->respond('done', $Producto);
		} catch (\Throwable $e) {
            return $this->respond('server error', [], $e->getMessage());
		}
    }

    public function funDestroy($id){
        $model = product::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
    }
}
