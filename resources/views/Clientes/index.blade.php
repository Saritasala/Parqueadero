@extends('layouts.app', [
'class' => 'Clientes',

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
                                <h5 class="card-title text-white" >Productos</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <button type="button" class=" btn bg-info btn-sm text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Crear Clientses
                        </button>
                        
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Apellido</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Telefeno</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    @foreach ($clientes as $client)
                                        <tr id="{{$client->id}}">
                                            @if(!empty($client))
                                            <td>{{$client->name}}</td>
                                            <td>{{$client->last_name}}</td>
                                            <td>{{$client->email}}</td>
                                            <td>{{$client->phone}}</td>
                                            @if($client->getVehiculo == null)
                                            <td>No se asigno vehiculo</td>
                                            @else
                                            <td>{{$client->getVehiculo->placa}}</td>
                                            @endif
                                            @if($client->state==1)
                                                <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('clientes.edit', [$client->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btnEraseCliente" title="Eliminar">
                                                    <i class="nc-icon nc-box"></i></button>
                                            </td>
                                            @else
                                            <td>No hay productos registrados</td>
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

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear cliente</h5>
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
      <form action="{{route('clientes.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
          <div class="form-group">
          <label class="form-control-label" for="input-name">Nombre *</label>
          <input type="text" name="name" id="input-name" value="{{old('name')}}" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-last_name">Apellido *</label>
            <input type="text" name="last_name" id="input-last_name" value="{{old('last_name')}}" class="form-control" placeholder="Apellido" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-email">Correo *</label>
            <input type="email" name="email" id="input-email" value="{{old('email')}}" class="form-control" placeholder="Correo electronico" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-cedula"> Cedula *</label>
            <input type="text" name="cedula" id="input-cedula" value="{{old('cedula')}}" class="form-control" placeholder="Cedula" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-phone">Telefono *</label>
            <input type="number" name="phone" id="input-phone" value="{{old('phone')}}" class="form-control" placeholder="Telefono" required>
          </div>
          <div class="form-group ">
             <label class="form-control-label" for="input-password">Contraseña *</label>
                <input type="password" name="password" id="input-password" value="{{old('password')}}" class="form-control" placeholder="Contraseña" required>
        </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-round">Crear Cliente</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection

@push('js')

@endpush