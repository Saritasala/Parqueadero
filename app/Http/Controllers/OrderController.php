<?php

namespace App\Http\Controllers;


use App\product;
use App\order;
use App\order_product;
use App\Pedido;
use DB;
use App\Http\Controllers\RestActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class OrderController extends Controller
{
    use RestActions;

    public function index(){
        $user = Auth::user();
        if($user->role_id==1){
            $orden= order::where('state',[1,2])->with( 'getUser')->get();
        }else{
            $orden= order::where('state', 1)->with( 'getUser')->get();
        }
        return view('Order.index',['orden'=>$orden]);
    }
    
    public function create(){
        $producto = product::where('state',1)->get();   
        return view('Order.create', ['producto'=>$producto]);
    }
    
    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        return redirect()->route('order.index')->withStatus(__('Orden registrada exitosamente.'));
    }
    
    public function edit( $id)
    {
        $order = order::where('id', $id)->with('getProducto')->first();
        return view('Order.edit', ['order' =>$order]);
        
    }
    
    public function update(Request $request, $id){
        $request->merge(['id' => $id]);
        $store = $this->funUpdate($request, $id);
        if($store['status'] == 200){
            return back()->withStatus(__('Orden actualizada exitosamente.'));
        }else{
            return back()->withStatus(__('Hubo un error, intentelo nuevamente.'));
        }
    }
    
        
    
        //Funciones**
    
    public function funCreate(Request $request){
        $request->validate([
            'name' => 'required|max:499',
            'reference' => 'required|max:500',
            'date' => 'required|max:100',
            'direccion'=> 'required',
        ]);
        try {
            $newOrder = new order();
            $newOrder->user_id = Auth::user()->id;
            $newOrder->name = $request->name;
            $newOrder->reference = $request->reference;
            $newOrder->date = $request->date;
            $newOrder->payment_type_vp = 1;
            $newOrder->payment_state = 1;
            $newOrder->total = 0;
            $newOrder->direccion = $request->direccion;
            $newOrder->order_state = 1;
            $newOrder->state = 1;
            $newOrder->save();
            return $this->respond('done', $newOrder);
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
            $model = product::find($request->id);
            $model->update(['title'=>$title, 'description'=>$description, 'precio'=>$precio,
            'stock'=>$stock,'img_product'=>$img_product,'comercio_id'=>$comercio_id,'state' => $state]);
             return response()->json(['code' => 200, 'data' => $model], 200);
        } catch (\Throwable $e) {
            return response()->json(['code' => 400, 'message' => 'Error al actualizar el producto'], 400);
        }
    }

    public function funShow(Request $request)
    {
       $request->validate([
          'id' => 'required|exists:order,id'
       ]);
       $element = order::where('id', $request->id)->first();
       return response()->json(['code' => 200, 'data' => $element], 200);
    }

    public function factura($id)
   {
      request()->merge(['id' => $id]);
      $data = $this->funShow(request())->original;
      $actualState = $data['data'];

      if ($data['code'] == 200) {
         $pdf = PDF::loadView('orders.facturas.factura', ['data' => $data['data']]);
         return $pdf->download('factura.pdf');
      }
   }


    
    public function funDelete(Request $request){
        $request->validate([
            'id' => 'required|exists:products,id'
        ]);
    
            $model = product::where('id', $request->id)->first();
            $model->state = 3;
    
            if ($model->update()) {
                return response()->json(['code' => 200, 'data' => $model], 200);
             } else {
                return response()->json(['code' => 530, 'data' => null, 'message' => 'Error al eliminar'], 530);
            }
        }
}
