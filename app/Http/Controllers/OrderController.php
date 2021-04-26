<?php

namespace App\Http\Controllers;


use App\product;
use App\order;
use App\order_product;
use App\Pedido;
use App\parametros_value;
use App\parametros;
use DB;
use App\Http\Controllers\RestActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Barryvdh\DomPDF\Facade as PDF;

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
        $value = parametros::where('state', 1)->get();
        $pay = parametros_value::where('state', 1)->get();
        return view('Order.create', compact('producto' ,'value' , 'pay'));
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

    public function show($id){
        $element = order::where('id', $id)->with('getUser')->first();
        $product = Pedido::where('order_id', $id)->with('getProduct')->get();
        return view('Order.details', ['element'=>$element, 'product'=>$product]);
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
            'payment_state' => 'required',
            'payment_type_vp' => 'required'
        ]);
        try {
            $newOrder = new order();
            $newOrder->user_id = Auth::user()->id;
            $newOrder->name = $request->name;
            $newOrder->reference = $request->reference;
            $newOrder->date = $request->date;
            $newOrder->payment_type_vp = $request->payment_type_vp;
            $newOrder->payment_state = $request->payment_state;
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
          'id' => 'required|exists:orders,id'
       ]);
        $element = order::where('id', $request->id)->with('getUser', 'getPayment')->first();
        $pedido = Pedido::where('order_id', $request->id)->with('getProduct')->get();
        $data = array(
            'element' =>$element,
            'pedido' =>$pedido,
        );
       return response()->json(['code' => 200, 'data'=>$data], 200);
    }

    public function factura($id)
   {
      request()->merge(['id' => $id]);
      $data = $this->funShow(request())->original;
      if ($data['code'] == 200) {
         $pdf = PDF::loadView('Order.factura.factura', ['data'=>$data['data']]);
         return $pdf->download('factura.pdf');
      }

        $model = order::find($id);
        $model->update(['payment_type_vp'=>1]);


   }


    
    public function funDelete($id){
        $model = order::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
    }
}
