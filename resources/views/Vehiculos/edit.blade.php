@extends('layouts.app', [
'class' => 'Editar Vehiculo',

])

@section('content')
<div class="content" id="app">
    <div class="container-fluid mt--2">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-12">
                <form action="{{route('vehiculos.update', [$vehiculs->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Nombre del cliene *</label>
                            <input type="text" name="name" id="input-name" value="{{$vehiculs->getCliente->name}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Apellido del cliene *</label>
                            <input type="text" name="name" id="input-name" value="{{$vehiculs->getCliente->last_name}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Telefono del cliene *</label>
                            <input type="number" name="name" id="input-name" value="{{$vehiculs->getCliente->phone}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Correo del cliene *</label>
                            <input type="email" name="email" id="input-name" value="{{$vehiculs->getCliente->email}}"
                                class="form-control" placeholder="Email" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-placa">Placa *</label>
                            <input type="text" name="placa" id="input-placa" value="{{$vehiculs->placa}}"
                                class="form-control" placeholder="Placa" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-modelo">Modelo *</label>
                            <input type="text" name="modelo" id="input-modelo" value="{{$vehiculs->modelo}}"
                                class="form-control" placeholder="Modelo" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-color">Color *</label>
                            <input type="text" name="color" id="input-color" value="{{$vehiculs->color}}"
                                class="form-control" placeholder="Color" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-fecha_entrada">Fecha de entrada *</label>
                            <input type="datetime" name="fecha_entrada" id="input-fecha_entrada" value="{{$vehiculs->fecha_entrada}}"
                                class="form-control" placeholder="Fecha de entrada" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-fecha_salida">Fecha de salida *</label>
                            <input type="datetime" name="fecha_salida" id="input-fecha_salida" value="{{$vehiculs->fecha_salida}}"
                                class="form-control" placeholder="Fecha de salida" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-state">Estado del vehiculo *</label>
                            <select  name="state" class="form-control" required>
                                @foreach(Config::get('const.states') as $state => $value)
                                <option value="{{$state}}" {{$vehiculs->state == $state ? 'selected' : ''}}>{{$value['name']}}
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