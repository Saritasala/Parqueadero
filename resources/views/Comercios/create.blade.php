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
                <form action="{{route('comercio.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Nombre *</label>
                            <input type="text" name="name" id="input-name" value="{{old('name')}}"
                                class="form-control" placeholder="Nombre" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-name">Descripcion *</label>
                            <textarea type="text" name="description" id="input-description"
                                class="form-control" placeholder="Nombre" required>{{old('description')}}</textarea>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-number">Télefono *</label>
                            <input type="number" name="number" id="input-number" value="{{old('number')}}"
                                class="form-control" placeholder="Telefono" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-email">Email *</label>
                            <input type="email" name="email" id="input-email" value="{{old('email')}}"
                                class="form-control" placeholder="Email" required>
                        </div>
                        <div class="form-group col-md-6 col-sm-12">
                            <label class="form-control-label" for="input-direccion">Direccion *</label>
                            <input type="text" name="direccion" id="input-direccion" value="{{old('direccion')}}"
                                class="form-control" placeholder="Direccion" required>
                        </div>
                    </div>
                    
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary btn-round">Crear Comercio</button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection