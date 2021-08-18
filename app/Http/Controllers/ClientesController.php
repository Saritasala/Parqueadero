<?php

namespace App\Http\Controllers;

use App\Cliente;
use App\vehiculos;
use DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RestActions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class ClientesController extends Controller
{
    use RestActions;

    public function index(){
    $user = Auth::user();
    $vehiculos = vehiculos::where('state',[1,2])->get();
        if($user->role_id==1){
       $clientes= Cliente::where('state',[1,2])->get();
       }else{
        $clientes= Cliente::where('state', 1)->get();
        }

        if (!is_null(request()->name)) {
            $clientes = $clientes->where('name', request()->name);
        }
        if (!is_null(request()->last_name) && request()->last_name) {
            $clientes = $clientes->where('last_name', request()->last_name);
        }
        if (!is_null(request()->cedula)) {
            $clientes = $clientes->where('cedula', request()->cedula);
        }
        if (!is_null(request()->state) && request()->state != -1) {
            $clientes = $clientes->where('state', request()->state);
        }
    
        return view('Clientes.index',['clientes'=>$clientes, 'vehiculos' =>$vehiculos]);
    }

    public function create(){
        $clients = Cliente::where('state',1)->get();
        return view('Productos.create', ['clients'=>$clients]);
    }

    public function store(Request $request)
    {
        $create = $this->funCreate($request);
        return redirect()->route('clientes.index')->withStatus(__('Cliente registrado exitosamente.'));
    }

    public function edit($id)
    {   
        $cliente = Cliente::where('id', $id)->first();
       
        return view('Clientes.edit', compact('cliente'));
    }

    public function show($id){
        $product = Cliente::where('id', $id)->with('getComercio')->first();
        return view('Productos.details', ['product'=>$product]);
    }

    public function update(Request $request, $id)
    {
        $request->merge(['id' => $id]);  

        $cliente = Cliente::where('id', $id)->first();
        $cliente->name = $request->name;
        $cliente->last_name = $request->last_name;
        $cliente->email = $request->email;
        $cliente->cedula = $request->cedula;
        $cliente->phone = $request->phone;
        $cliente->password = $request->password;
        $cliente->state = $request->state;
        
      
        $cliente->update();

        return redirect()->route('clientes.index')->with('status',__('Cliente actualizado exitosamente.'));
    }

    public function destroy($id)
    {
        request()->merge(['id' => $id]);
        return $this->funDelete(request());
    }

    

    //Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'name' => 'required|max:499',
            'last_name' => 'required|max:500',
            'email' => 'required',
            'cedula' => 'required|max:100',
            'phone' => 'required|max:100',
            'password' => 'required|max:100',
            'vehiculo_id' => 'nullable',
        ]);
        try {
        $newCliente = new Cliente();
        $newCliente->name = $request->name;
        $newCliente->last_name = $request->last_name;
        $newCliente->email = $request->email;
        $newCliente->cedula = $request->cedula;
        $newCliente->phone = $request->phone;
        $newCliente->password = $request->password;
        $newCliente->vehiculo_id = null;
        $newCliente->state = 1;
        $newCliente->save();
        return $this->respond('done', $newCliente);
        } catch (\Throwable $e) {
            return $this->respond('server error', [], $e->getMessage());
        }
    
    }

    

    public function funDestroy($id){
        $model = Cliente::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
    }
}
