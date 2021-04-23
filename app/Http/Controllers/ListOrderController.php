<?php

namespace App\Http\Controllers;

use App\product;
use App\order;
use App\order_product;
use App\Pedido;
use Illuminate\Http\Request;

class ListOrderController extends Controller
{
    public function index(){
        $orden= order::where('state',[1,2])->with('getUser')->get();
        return view('ListOrder.index', ['orden'=>$orden]); 
    }


    public function show($id){
        request()->merge(['id' => $id]);
        $data = $this->funShow(request())->original;
    }


    //Funciones

    public function funShow(Request $request)
   {
      $request->validate([
         'id' => 'required|exists:orders,id'
      ]);

      $element = order::where('id', $request->id)->first();
      return response()->json(['code' => 200, 'data' => $element], 200);
   }

}
