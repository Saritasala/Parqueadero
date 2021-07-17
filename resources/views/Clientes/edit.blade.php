@extends('layouts.app', [
'class' => 'Crear Cliente',

])

@section('content')
<div class="content">
    <div class="container-fluid mt--2">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-12">
                <form action="{{route('clientes.update', [$cliente->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Nombre del cliente *</label>
                            <input type="text" name="name" id="input-name" value="{{$cliente->name}}"
                                class="form-control" placeholder="Nombre" >
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-last_name">Apellido del cliente *</label>
                            <input type="text" name="last_name" id="input-last_name" value="{{$cliente->last_name}}"
                                class="form-control" placeholder="Apellido" >
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-phone">Telefono del cliente *</label>
                            <input type="number" name="phone" id="input-phone" value="{{$cliente->phone}}"
                                class="form-control" placeholder="Telefono" >
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-email">Correo del cliente *</label>
                            <input type="email" name="email" id="input-email" value="{{$cliente->email}}"
                                class="form-control" placeholder="Email" >
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-cedula">Cedula *</label>
                            <input type="text" name="cedula" id="input-cedula" value="{{$cliente->cedula}}"
                                class="form-control" placeholder="Cedula">
                        </div>
                        @if($cliente->getVehiculo == null)
                        
                        @else
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-placa">Placa *</label>
                            <input type="text" name="placa" id="input-modelo" value="{{$cliente->getVehiculo->placa}}"
                                class="form-control" placeholder="Placa" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-modelo">Modelo *</label>
                            <input type="text" name="modelo" id="input-modelo" value="{{$cliente->getVehiculo->modelo}}"
                                class="form-control" placeholder="Modelo" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-color">Color *</label>
                            <input type="text" name="color" id="input-color" value="{{$cliente->getVehiculo->color}}"
                                class="form-control" placeholder="Color" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-fecha_entrada">Fecha de entrada *</label>
                            <input type="datetime" name="fecha_entrada" id="input-fecha_entrada" value="{{$cliente->getVehiculo->fecha_entrada}}"
                                class="form-control" placeholder="Fecha de entrada" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-fecha_salida">Fecha de salida *</label>
                            <input type="datetime" name="fecha_salida" id="input-fecha_salida" value="{{$cliente->getVehiculo->fecha_salida}}"
                                class="form-control" placeholder="Fecha de salida" disabled>
                        </div>
                        @endif
                        <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-password">Contraseña *</label>
                                <input type="number" name="password" id="input-password" value="{{$cliente->password}}"
                                    class="form-control" placeholder="Contraseña" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-state">Estado del vehiculo *</label>
                            <select  name="state" class="form-control" required>
                                @foreach(Config::get('const.states') as $state => $value)
                                <option value="{{$state}}" {{$cliente->state == $state ? 'selected' : ''}}>{{$value['name']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">Actualizar Vehiculo</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
