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
                    <form action="" method="POST">
                        @csrf
                        @method('PUT')
                        @include('layouts.alerts')
                        <input type="hidden" name="id" value="">
                        <div class="row">
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-name">Nombre *</label>
                                <input type="text" name="name" id="input-name" value=""
                                    class="form-control" placeholder="Nombre" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-name">Apellidos </label>
                                <input type="text" name="last_name" id="input-name" value=""
                                    class="form-control" placeholder="Nombre" >
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-phone">Télefono *</label>
                                <input type="text" name="phone" id="input-phone" value=""
                                    class="form-control" placeholder="Telefono" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-email">Email *</label>
                                <input type="email" name="email" id="input-email" value=""
                                    class="form-control" placeholder="Email" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-password">Role *</label>
                                <select name="role" id="" class="form-control">
                                    <option value="" selected disabled> Seleccione un Role</option>
                                   
                                </select>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-password">Contraseña *</label>
                                <div class="d-flex">
                                    <input type="password" name="password" readonly v-model="password"
                                        id="input-password"  class="form-control"
                                        placeholder="Contraseña" required>
                                    <button type="button" class="btn btn-primary my-0">Generar </button>
                                </div>
                                <input type="hidden" name="password_confirmation" readonly v-model="password"
                                        id="input-password"  class="form-control"
                                        placeholder="Contraseña" required>
                            </div>
                            <div class="form-group col-md-6 col-sm-12">
                                <label class="form-control-label" for="input-state">Estado *</label>
                                <select name="state" id="" class="form-control" required>
                                    <option value="1"  > Activo</option>
                                    <option value="0"  > Inactivo</option>
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