<?php

namespace App\Http\Controllers;
use App\product;
use App\order;
use App\Pedido;
use App\order_product;
use DB;
use App\Http\Controllers\RestActions;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PedidosController extends Controller
{
    use RestActions;

    public function create($id){
        $order = order::where('id', $id)->first();
        $pedido = Pedido::where('order_id', $id)->with('getProduct')->get();
        $total = Pedido::where('order_id', $id)->with('getProduct')->get()->sum('total');
        $producto = product::where('state',1)->get(); 
        $data = array(
            'order' => $order,
            'pedido' => $pedido,
            'producto' => $producto,
            'total' => $total

        );
        
        return view('Order.createpedido',  $data);
    }


    public function store(Request $request){
        $create = $this->funCreate($request);
        return back();
    }

    //Funciones

    public function funCreate(Request $request){
         $request->validate([
            'product' => 'required|array',
            'stock' => 'required|max:500',
        ]);
        try {
            foreach($request->product as $producto){
                $pedido = product::where('id', $producto)->first();
                $orden = $pedido->precio * $request->stock;
                $newOrder = new Pedido();
                $newOrder->order_id = $request->order_id;
                $newOrder->product_id = $producto;
                $newOrder->stock = $request->stock; 
                $newOrder->total = $orden;
                $newOrder->save();
            }
            $total = Pedido::where('order_id', $request->order_id)->with('getProduct')->get()->sum('total');
                $model = order::find($request->order_id);
                $model->update(['total'=>$total]);
            
            return $this->respond('done', $newOrder);
        } catch (\Throwable $e) {
            return $this->respond('server error', [], $e->getMessage());
        }
    }
}