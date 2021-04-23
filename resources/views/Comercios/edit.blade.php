@extends('layouts.app', [
'class' => 'Crear Producto',

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
                <form action="{{route('comercio.update', [$comerce->id])}})}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Nombre *</label>
                            <input type="text" name="name" id="input-name" value="{{$comerce->name}}"
                                class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-description">Descripcion *</label>
                            <textarea type="text" name="description" id="input-description" value="{{$comerce->description}}"
                                class="form-control" placeholder="Descripcion" required></textarea>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-number">Télefono *</label>
                            <input type="text" name="number" id="input-number" value="{{$comerce->number}}"
                                class="form-control" placeholder="Telefono" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-email">Email *</label>
                            <input type="email" name="email" id="input-email" value="{{$comerce->email}}"
                                class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-direccion">Direccion *</label>
                            <input type="email" name="direccion" id="input-direccion" value="{{$comerce->direccion}}"
                                class="form-control" placeholder="Direccion" required>
                        </div>
                    </div>
                    
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">Actualizar Comercio</button>
                        </div>
                       
                </form>
            </div>
        </div>
    </div>
</div>
@endsection