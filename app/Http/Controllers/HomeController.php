<?php

namespace App\Http\Controllers;
use App\parqueadero;
use App\Cliente;
use App\vehiculos;
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
        $parqueadero = parqueadero::where('state', [1,2])->get();
        $cliente = Cliente::where('state', [1,2])->get();
        $vehiculos = vehiculos::where('state', [1,2])->get();
        $usuario =  $user->count();
        $parqueaderos = $parqueadero->count();
        $clientes = $cliente->count();
        $vehiculo = $vehiculos->count();

        $data = array(
            'vehiculo'=> $vehiculo,
            'usuario'=> $usuario,
            'parqueaderos'=> $parqueaderos,
            'clientes' => $clientes,

        );
        return view('home',  $data);
    }
}
