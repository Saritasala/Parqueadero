@extends('layouts.app', [
'class' => 'Tarifas',

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
                                <h5 class="card-title text-white" >Tarifas</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                    <button type="button" class=" btn bg-info btn-sm text-white" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">
                        Crear Tarifa
                        </button>
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                      <th scope="col">Propietario</th>
                                        <th scope="col">Hora de entrada</th>
                                        <th scope="col">Fecha de salida</th>
                                        <th scope="col">Hora de salida</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                            
                                   
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
        <h5 class="modal-title" id="exampleModalLabel">Crear vehiculo</h5>
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
      <form action="{{route('vehiculos.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
         
          <div class="form-group">
          <label class="form-control-label" for="input-name">Placa *</label>
          <input type="text" name="placa" id="input-placa" value="{{old('placa')}}" class="form-control" placeholder="Placa" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-modelo">Modelo *</label>
            <input type="text" name="modelo" id="input-modelo" value="{{old('modelo')}}" class="form-control" placeholder="Modelo" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-color">Color *</label>
            <input type="text" name="color" id="input-color" value="{{old('color')}}" class="form-control" placeholder="Color" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-puesto">Puesto *</label>
            <input type="number" name="puesto" id="input-puesto" value="{{old('puesto')}}" class="form-control" placeholder="Puesto" required>
          </div>
          <div class="form-group">
          <label class="form-control-label" for="input-fecha_entrada">Fecha de entrada *</label>
            <input type="date" name="fecha_entrada" id="input-fecha_entrada" value="{{old('fecha_entrada')}}" class="form-control" placeholder="Fecha de entrada" required>
          </div>
          <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary btn-round">Crear Vehiculo</button>
        </form>
      </div>
      </div>
    </div>
  </div>
</div>
<script>

  </script>
@endsection