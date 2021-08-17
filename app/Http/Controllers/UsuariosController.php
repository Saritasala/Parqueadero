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
        $users= User::where('state',[1,2])->with('getRole')->get();
        $roles = roles::where('state',1)->get();

        if (!is_null(request()->name)) {
            $users = $users->where('name', request()->name);
        }
        if (!is_null(request()->cedula)) {
            $users = $users->where('cedula', request()->cedula);
        }
        if (!is_null(request()->rol_id) && request()->rol_id != -1) {
            $users = $users->where('rol_id', request()->rol_id);
        }
        if (!is_null(request()->state) && request()->state != -1) {
            $users = $users->where('state', request()->state);
        }
    
        return view('Usuarios.index', compact('users', 'roles')); 
    }
    public function create(){
        $roles = roles::where('state',1)->get();    
        return view('Usuarios.create', ['roles'=>$roles]);
    }

    public function store(Request $request)
    {
        $usuario = $this->funCreate($request);
        return redirect()->route('usuarios.index')->with('status',__('Usuario registrado exitosamente.'));
    }

    public function edit($id)
    {
        $user = User::where('id', $id)->first();  
        $roles = roles::where('state', 1)->get();   
        return view('Usuarios.edit', ['user'=>$user, 'roles'=>$roles]);
    }

    public function update(Request $request, $id){

        $request->merge(['id' => $id]);

        //dd($request);
        
        $request->validate([
            'name' => 'required|string|max:499',
            'last_name' => 'required|string|max:500',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'rol_id' => 'required',
            'state' => 'required',
        ]);

        $newuser = User::where('id', $id)->first();
        $newuser->name = $request->name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->phone = $request->phone;
        $newuser->password = $request->password;
        $newuser->role_id = $request->rol_id;
        $newuser->state = $request->state;
        $newuser->update();

        return redirect()->route('usuarios.index')->with('status',__('Usuario actualizado exitosamente.'));
        
    }

        

//Funciones**

    public function funCreate(Request $request){
        $request->validate([
            'name' => 'required|string|max:499',
            'last_name' => 'required|string|max:500',
            'cedula' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'password' => 'required',
            'role_id' => 'required',
        ]);
        try {
        $newuser = new User();
        $newuser->name = $request->name;
        $newuser->last_name = $request->last_name;
        $newuser->email = $request->email;
        $newuser->phone = $request->phone;
        $newuser->cedula = $request->cedula;
        $newuser->password = bcrypt($request->password);
        $newuser->role_id = $request->role_id;
        $newuser->state = 1;
        $newuser->remember_token = null;
        if( $newuser->save()){
        return $newuser;
        }
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
