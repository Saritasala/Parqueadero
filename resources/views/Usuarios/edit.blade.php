@extends('layouts.app', [
'class' => 'Editar Usuario',

])

@section('content')
<div class="content" id="app">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Editar usuarios</h5>
                </div>
                <div class="card-body">
                    <form action="{{route('usuarios.update', [$user->id])}}" method="post">
                        @csrf
                        @method('PUT')
                        @include('layouts.alerts')
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-name">Nombre *</label>
                                <input type="text" name="name" id="input-name" value="{{$user->name}}"
                                    class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-name">Apellidos </label>
                                <input type="text" name="last_name" id="input-name" value="{{$user->last_name}}"
                                    class="form-control" placeholder="Apellido" >
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-phone">Télefono *</label>
                                <input type="text" name="phone" id="input-phone" value="{{$user->phone}}"
                                    class="form-control" placeholder="Telefono" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-email">Email *</label>
                                <input type="email" name="email" id="input-email" value="{{$user->email}}"
                                    class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-rol">Roles *</label>
                                <select name="rol_id" id="" class="form-control">
                                    @foreach($roles as $rol)
                                    <option value="{{$rol->id}}" {{$rol->id == $user->getRole->id ? 'selected' : ''}}>
                                        {{$rol->name}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-password">Contraseña *</label>
                                <input type="number" name="password" id="input-password" value="{{$user->password}}"
                                    class="form-control" placeholder="Contraseña" required>
                            </div>
                           
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-state">Estado *</label>
                                <select name="state" id="" class="form-control" required>
                                    @if($user->state == 1)
                                    <option value="1" selected> Activo</option>
                                    <option value="0"> Inactivo</option>
                                    @else
                                    <option value="1"> Activo</option>
                                    <option value="0" selected> Inactivo</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="row justify-content-center">
                            <button type="submit" class="btn btn-primary">Actualizar usuario</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection