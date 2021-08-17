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
                <form >
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Parqueadero *</label>
                            <input type="text"id="name" value="{{$tarifa->getParqueadero->nombre}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Titulo *</label>
                            <input type="text" id="title" value="{{$tarifa->title}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Descripcion *</label>
                            <input type="number"  id="description" value="{{$tarifa->description}}"
                                class="form-control" placeholder="Nombre" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Precio *</label>
                            <input type="email"  id="precio" value="{{$tarifa->precio}}"
                                class="form-control" placeholder="Email" disabled>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-placa">Tipo de Vehiculo *</label>
                            <input type="text"   id="tipo_vehiculo" value="{{$tarifa->tipo_vehiculo}}"
                                class="form-control" placeholder="Placa" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-modelo">Tiempo *</label>
                            <input type="text" id="tiempo" value="{{$tarifa->tiempo}}"
                                class="form-control" placeholder="Modelo" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-color">Estado *</label>
                            <select  name="state" class="form-control" required>
                                @foreach(Config::get('const.states') as $state => $value)
                                <option value="{{$state}}" {{$vehiculs->state == $state ? 'selected' : ''}}>{{$value['name']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">Actualizar Tarifa</button>
                        </div>
                       
                </form>
            </div>
        </div>
    </div>
</div>
@endsection