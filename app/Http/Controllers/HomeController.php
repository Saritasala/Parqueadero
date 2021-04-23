<?php

namespace App\Http\Controllers;
use App\product;
use App\comercio;
use App\order;
use App\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        
        $user = User::where('state', [1,2])->get();
        $order = order::where('state', [1,2])->get();
        $comercio = comercio::where('state', [1,2])->get();
        $product = product::where('state', [1,2])->get();
        $usuario =  $user->count();
        $ordenes = $order->count();
        $comercios = $comercio->count();
        $productos = $product->count();

        $data = array(
            'productos'=> $productos,
            'usuario'=> $usuario,
            'ordenes'=> $ordenes,
            'comercios' => $comercios,

        );
        return view('home',  $data);
    }
}
