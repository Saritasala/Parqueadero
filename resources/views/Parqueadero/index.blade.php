@extends('layouts.app', [
'class' => 'Parqueo',

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
                                <h5 class="card-title text-white" >Parqueadero</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <button type="button" class=" btn bg-info btn-sm text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Crear Parqueadero
                        </button>
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                        <th scope="col">Puestos</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Pisos</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($puesto as $puestoss)
                                    <tr id="{{$puestoss->id}}">   
                                            <td>{{$puestoss->puestos}}</td>
                                            <td>{{$puestoss->nombre}}</td>
                                            <td>{{$puestoss->pisos}}</td>
                                            @if($puestoss->state == 1)
                                            <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                            <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
    
                                            <td>
                                            <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('parqueadero.edit', [$puestoss->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>
                                                <a class="btn btn-danger btn-sm btnEraseParqueadero" title="Eliminar"
                                                ><i class="nc-icon nc-simple-delete"></i>
                                                </a>
                                            </td>
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
        <h5 class="modal-title" id="exampleModalLabel">Crear parqueadero</h5>
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
      <form action="{{route('parqueadero.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
    
          <div class="form-group">
          <label class="form-control-label" for="input-puestos">Puestos *</label>
          <input type="number" name="puestos" id="input-puestos" value="{{old('puestos')}}" class="form-control" placeholder="Puestos" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-nombre">Nombre *</label>
            <input type="text" name="nombre" id="input-nombre" value="{{old('nombre')}}" class="form-control" placeholder="Nombre" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-pisos">Pisos *</label>
            <input type="number" name="pisos" id="input-pisos" value="{{old('pisos')}}" class="form-control" placeholder="Pisos" required>
          </div>

          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-round">Crear Parqueadero</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
@endsection