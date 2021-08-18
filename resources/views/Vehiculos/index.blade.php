@extends('layouts.app', [
'class' => 'Vehiculos',

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
                                <h5 class="card-title text-white" >Vehiculos</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <button type="button" class=" btn bg-info btn-sm text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Crear Vehiculos
                        </button>
                        <form action="{{route('vehiculos.index')}}" method="GET">
                      @csrf
                        <div class="row align-items-center">
                            <div class="col">
                                <div class="form-group mb-1">
                                    <label>Placa</label>
                                    <input type="text" name="placa" class="form-control" placeholder="Placa"
                                        value="{{request()->placa}}">
                                </div>
                    
                            </div>
                            <div class="col">
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
                    <br>
                    <br>
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                      <th scope="col">Propietario</th>
                                        <th scope="col">Placa</th>
                                        <th scope="col">Modelo</th>
                                        <th scope="col">Color</th>
                                        <th scope="col">Fecha de entrada</th>
                                        <th scope="col">Hora de entrada</th>
                                        <th scope="col">Fecha de salida</th>
                                        <th scope="col">Hora de salida</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                    @foreach ($vehicul as $vehiculos)
                                    <tr id="{{$vehiculos->id}}">
                                      @if(!empty($vehiculos))   
                                            <td>{{$vehiculos->getCliente->name}}</td>
                                            <td>{{$vehiculos->placa}}</td>
                                            <td>{{$vehiculos->modelo}}</td>
                                            <td>{{$vehiculos->color}}</td>
                                            <td>{{$vehiculos->fecha_entrada}}</td>
                                            <td>{{$vehiculos->hora}}</td>
                                            <td>{{$vehiculos->fecha_salida}}</td>
                                            <td>{{$vehiculos->hora_salida}}</td>
                                            @if($vehiculos->state == 1)
                                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
    
                                            <td>
                                            <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('vehiculos.edit', [$vehiculos->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm btnEraseVehiculo" title="Eliminar"
                                                ><i class="nc-icon nc-simple-delete"></i>
                                                </a>
                                                <a href="{{ route('factura', ['id' => $vehiculos->id]) }}" class="btn btn-info btn-sm" title="Factura"
                                                target="_blank"><i class="nc-icon nc-paper"></i></a>
                                            </td>
                                          @else 
                                           <td>No hay vehiculos registrados</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Crear vehiculo</h5>
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
      <form action="{{route('vehiculos.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
          <div class="form-group">
          <label class="form-control-label" for="input-name">Cliente *</label>
          <select class="form-control" name="clientes_id">
          <option value=" " >Seleccionar cliente</option>
            @foreach($cliente as $clientes)
                <option value="{{$clientes->id}}">{{$clientes->name}}</option>
             @endforeach
              </select>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-name">Parqueadero *</label>
          <select class="form-control" name="parqueadero_id">
          <option value=" " >Seleccionar parqueadero</option>
            @foreach($parqueadero as $parquear)
                <option value="{{$parquear->id}}">{{$parquear->nombre}}</option>
             @endforeach
              </select>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-name">Placa *</label>
          <input type="text" name="placa" id="input-placa" value="{{old('placa')}}" class="form-control" placeholder="Placa" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-modelo">Modelo *</label>
            <input type="text" name="modelo" id="input-modelo" value="{{old('modelo')}}" class="form-control" placeholder="Modelo" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-color">Color *</label>
            <input type="text" name="color" id="input-color" value="{{old('color')}}" class="form-control" placeholder="Color" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-puesto">Puesto *</label>
            <input type="number" name="puesto" id="input-puesto" value="{{old('puesto')}}" class="form-control" placeholder="Puesto" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-fecha_entrada">Fecha de entrada *</label>
            <input type="date" name="fecha_entrada" id="input-fecha_entrada" value="{{old('fecha_entrada')}}" class="form-control" placeholder="Fecha de entrada" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-hora">Hora de entrada *</label>
            <input type="time" name="hora" id="input-hora" value="{{old('hora')}}" class="form-control" placeholder="Hora de entrada" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-fecha_salida">Fecha de salida *</label>
            <input type="date" name="fecha_salida" id="input-fecha_salida" value="{{old('fecha_salida')}}" class="form-control" placeholder="Fecha de salida" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-hora_salida">Hora de salida *</label>
            <input type="time" name="hora_salida" id="input-hora_salida" value="{{old('hora_salida')}}" class="form-control" placeholder="Hora de salida" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-round">Crear Vehiculo</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script>

  </script>
@endsection