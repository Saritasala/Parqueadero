<?php

namespace App\Http\Controllers;

use App\User;
use App\roles;
use DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;class UsuariosController extends Controller
{
    public function index(){
        $user= User::where('state',[1,2])->with('getRole')->get();
        
        return view('Usuarios.index', ['user'=>$user]); 
    }

    public function create(){
        $rol = roles::where('state',1)->get();    
        return view('Usuarios.create', ['rol'=>$rol]);
    }

    public function store(Request $request)
    {
        $usuario = $this->funCreate($request);
        return redirect()->route('usuario.index')->withStatus(__('Usuario registrado exitosamente.'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();     
        return view('Usuarios.edit', ['user'=>$user]);
    }

    public function update(Request $request, $id){

        $request->merge(['id' => $id]);  

        $newuser = User::where('id', $id)->first();
        $newuser->name = $request->name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->phone = $request->phone;
        $newuser->password = $request->password;
        $newuser->role_id = $request->role_id;
        $newuser->state = $request->state;
        $newuser->update();

        return redirect()->route('product.index')->with('status',__('Producto actualizado exitosamente.'));
        
    }

        

//Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'name' => 'required|max:499',
            'last_name' => 'required|max:500',
            'email' => 'required',
            'phone' => 'required|max:10',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        try {
        $newuser = new User();
        $newuser->name = $request->name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->phone = $request->phone;
        $newuser->password = $request->password;
        $newuser->role_id = $request->role_id;
        $newuser->state = $request->state;
        $newuser->save();
        return $this->respond('done', $newuser);
        } catch (\Throwable $e) {
        return $this->respond('server error', [], $e->getMessage());
    }
        
    }

    public function funDelete($id){
        $model = User::where('id', $id)->first();
        $model->state = 3;
        if ($model->update()) {
            return $this->respond('done', []);
        }else{
            return $this->respond('server error', []);
        }
    }
}
