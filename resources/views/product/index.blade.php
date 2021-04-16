@extends('layouts.app', [
'class' => 'Productos',

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
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <h5 class="card-title">Proyectos</h5>
                            </div>
                            <div class="col-md-6 text-right">
                                
                                <button class="btn btn-primary btn-filter"><i class="fa fa-filter" aria-hidden="true"></i></button>
                            </div>
                        </div>
                        <div class="card  form-filter" style="display: none">
                            <div class="card-header bg-primary text-white">
                                <h5>Filtros</h5>
                            </div>
                            <div class="card-body">
                                <form  action=""  method="get">
                                    <div class="row">
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="title">Titulo</label>
                                            <input type="text" name="title" id="title" class="form-control"
                                                placeholder="Escriba titulo" aria-describedby="helpId" value="{{request()->title}}">
                                            <small id="helpId" class="text-muted">Titulo filtro</small>
                                        </div>
                                        <div class="col-12 col-md-6 form-group">
                                            <label for="name">Estado</label>
                                            <select name="state" class="form-control" id="">
                                                <option value="" selected disabled >Selecione estado</option>
                                                <option   value="1">Activo</option>
                                                <option  value="2">Inactivo</option>
                                            </select>
                                            <small id="helpId" class="text-muted">Estado filtro</small>
                                        </div>
                                        <a href="" class="btn btn-primary  btn-block">Borrar</a>
                                        <button type="submit"  class="btn btn-primary  btn-block">filtrar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Titulo</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                        <tr id="">
                                            <td></td>
                                           
                                                <td><span class="badge badge-pill badge-success">Activo</span></td>
                                        
                                                <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                           
                                            <td>
                                                <a class="btn btn-info btn-sm" title="Detalles"
                                                href=""><i class="nc-icon nc-badge"></i>
                                                </a>
                                               
                                            </td>
                                        </tr>
                                   
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
@endsection