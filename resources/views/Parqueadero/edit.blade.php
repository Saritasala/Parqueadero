@extends('layouts.app', [
'class' => 'Editar Parqueadero',

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
                <form action="{{route('parqueadero.update', [$parqu->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-puestos">Puestos *</label>
                            <input type="number" name="puestos" id="input-puestos" value="{{$parqu->puestos}}"
                                class="form-control" placeholder="Puestos" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-nombre">Nombre del parqueadero *</label>
                            <input type="text" name="nombre" id="input-nombre" value="{{$parqu->nombre}}"
                                class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-pisos">Pisos *</label>
                            <input type="number" name="pisos" id="input-pisos" value="{{$parqu->pisos}}"
                                class="form-control" placeholder="Pisos" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-state">Estado del vehiculo *</label>
                            <select  name="state" class="form-control" required>
                                @foreach(Config::get('const.states') as $state => $value)
                                <option value="{{$state}}" {{$parqu->state == $state ? 'selected' : ''}}>{{$value['name']}}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">Actualizar Parqueadero</button>
                        </div>
                       
                </form>
            </div>
        </div>
    </div>
</div>
@endsection