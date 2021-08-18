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
                    <button type="button" class=" btn bg-info btn-sm text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Crear Empleado
                    </button>
                  
                    <form action="{{route('usuarios.index')}}" method="GET">
                      @csrf
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-group mb-1">
                                    <label>Nombre</label>
                                    <input type="text" name="name" class="form-control" placeholder="Nombre"
                                        value="{{request()->name}}">
                                </div>
                                <div class="form-group mb-1">
                                    <label>Cedula</label>
                                    <input type="text" name="cedula" class="form-control" placeholder="Cedula"
                                        value="{{request()->cedula}}">
                                </div>
                            </div>
                            <div class="col">
                                <div class="form-group mb-1">
                                    <label>Rol</label>
                                    <select name="rol_id" class="selecttwo form-control">
                                        <option value="-1">Todos</option>
                                        @foreach($roles as $rol)
                                        <option value="{{$rol->id}}" {{request()->rol_id == $rol->id ? 'selected': ''}}>
                                            {{$rol->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-1">
                                    <label>Estado</label>
                                    <select name="state" class="selecttwo form-control">
                                        <option value="-1"
                                            {{ request()->state == -1 || is_null(request()->state) ? 'selected' : ''}}>
                                            Todos</option>
                                        @foreach(Config::get('const.states') as $state => $value)
                                        <option value="{{$state}}" {{request()->state === "".$state ? 'selected' : ''}}>
                                            {{$value['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                                <button class="btn btn-info btn-block ">Filtrar</button>
                                
                            </div>
                        </div>
                    </form>
                </div>
                <br>
                <br>
                    
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
                                    @foreach ($users as $usuario)
                                        <tr id="{{$usuario->id}}">
                                          @if(!empty($usuario))
                                            <td>{{$usuario->name}}</td>
                                            <td>{{$usuario->last_name}}</td>
                                            <td>{{$usuario->email}}</td>
                                            <td>{{$usuario->getRole->name}}</td>
                                            @if($usuario->state==1)
                                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
                                            
                                            <td>
                                            <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('usuarios.edit', [$usuario->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>

                                                <a class="btn btn-danger btn-sm btnEraseUser" title="Eliminar"><i class="nc-icon nc-simple-delete"></i>
                                                </a>
                                            </td>
                                          @else 
                                           <td>No hay usuarios registrados</td>
                                          @endif
                                        </tr>
                                   @endforeach
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

  <!-- Modal de crear !-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Empleado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
      <div class="modal-body">
      <form action="{{route('usuarios.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
          <div class="form-group">
          <label class="form-control-label" for="input-name">Nombre *</label>
          <input type="text" name="name" id="input-name" value="{{old('name')}}" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-apellido">Apellido *</label>
            <input type="text" name="last_name" id="input-apellido" value="{{old('apellido')}}" class="form-control" placeholder="Apellido" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-cedula">Cedula *</label>
            <input type="number" name="cedula" id="input-cedula" value="{{old('cedula')}}" class="form-control" placeholder="Cedula" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-phone">Telefono *</label>
            <input type="number" name="phone" id="input-phone" value="{{old('phone')}}" class="form-control" placeholder="Telefono" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-email">Email *</label>
            <input type="email" name="email" id="input-email" value="{{old('email')}}" class="form-control" placeholder="Correo elecrtronico" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-rol">Rol *</label>
          <select name="role_id" id="" class="form-control">
            <option value="" selected disabled> Seleccione un Rol</option>
            @foreach($roles as $rol)
            <option value="{{$rol->id}}">{{$rol->name}}</option>
            @endforeach
            </select>
          </div>
          <div class="form-group ">
             <label class="form-control-label" for="input-password">Contraseña *</label>
                <input type="password" name="password" id="input-password" value="{{old('password')}}" class="form-control" placeholder="Contraseña" required>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-round">Crear Empleado</button>
        </form>
      </div>
      </div>
    </div>
  </div>


@endsection