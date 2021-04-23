@extends('layouts.app', [
'class' => 'Usuarios',

])

@section('content')
<div class="content">
    <div class="content">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header" style="text-align: center; background-color:rgb(17, 116, 78); font-size: 12px; ">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h5 class="card-title text-white" >Usuarios</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a  href="{{route('usuarios.create')}}" class=" btn bg-info btn-sm text-white" >Crear Usuarios</a>
                    
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Correo</th>
                                        <th scope="col">Rol</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($user as $usuario)
                                        <tr id="{{$usuario->id}}">
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->last_name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->getRole->name}}</td>
                                            @if($usuarios->state==1)
                                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
                                            
                                            <td>
                                                <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('usuarios.edit',[$usuarios->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>
                                             
                                                <a class="btn btn-danger btn-sm btnEraseUser" title="Eliminar"><i class="nc-icon nc-simple-delete"></i>
                                                </a>
                                            </td>
                                        </tr>
                                   
                                </tbody>
                            </table>
                        </div>
                        <div class="row justify-content-end mt-3">
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection