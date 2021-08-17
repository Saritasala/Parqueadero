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
                <h5 class="card-title text-white">Tarifas</h5>
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
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Cuota</th>
                    <th scope="col">Tiempo</th>
                    <th scope="col">Tipo vehiculo</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Accion</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody id = "data">


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
        <form>
          <div class="form-group">
            <label class="form-control-label" for="input-name">Parquadero *</label>
            <select class="form-control" id="parqueadero_id">
              <option value=" " selected disabled>Seleccionar parqueadero</option>
              @foreach($parqueadero as $parqueo)
              <option value="{{$parqueo->id}}">{{$parqueo->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-title">Titulo *</label>
            <input type="text" id="title" value="{{old('title')}}" class="form-control" placeholder="Titulo" required>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-description">Descripcion *</label>
            <textarea id="description" cols="30" rows="5" class="form-control" style="border-color: rgb(190, 190, 190)" required></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-precio">Precio *</label>
            <input type="number" id="precio"  value="{{old('precio')}}" class="form-control" placeholder="Modelo" required>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-tiempo">Tiempo *</label>
            <select id="tiempo" class="form-control" required>
              <option value=" " selected disabled> Seleccionar el tiempo </option>
              <option value="1"> Hora </option>
              <option value="2"> Minutos </option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-modelo">Tipo de vehiculo *</label>
            <select id="tipo_vehiculo" class="form-control" required>
              <option value=" " selected disabled> Seleccionar un tipo de auto </option>
              <option value="1"> Particular </option>
              <option value="2"> Furgon </option>
              <option value="3"> Escolar </option>
              <option value="4"> Motocicleta </option>
              <option value="4"> Carga pesada </option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-round" onclick="create()">Crear Tarifa</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>



<div class="modal fade" id="Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar tarifa</h5>
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
        <form id="editForm">
          <div class="form-group">
            <label class="form-control-label" for="input-name">Parquadero *</label>
            <select class="form-control" id="parqueadero_id">
              <option value=" " selected disabled>Seleccionar parqueadero</option>
              @foreach($parqueadero as $parqueo)
              <option value="{{$parqueo->id}}">{{$parqueo->nombre}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-title">Titulo *</label>
            <input type="text" id="title" value="{{old('title')}}" class="form-control" placeholder="Titulo" required>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-description">Descripcion *</label>
            <textarea id="description" cols="30" rows="5" class="form-control" style="border-color: rgb(190, 190, 190)" required></textarea>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-modelo">Precio *</label>
            <input type="number" id="precio"  value="{{old('precio')}}" class="form-control" placeholder="Precio" required>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-modelo">Tiempo *</label>
            <select id="tiempo" class="form-control" required>
              <option value=" " selected disabled> Seleccionar el tiempo </option>
              <option value="1"> Hora </option>
              <option value="2"> Minutos </option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-control-label" for="input-modelo">Tipo de vehiculo *</label>
            <select id="tipo_vehiculo" class="form-control" required>
              <option value=" " selected disabled> Seleccionar un tipo de auto </option>
              <option value="1"> Particular </option>
              <option value="2"> Furgon </option>
              <option value="3"> Escolar </option>
              <option value="4"> Motocicleta </option>
              <option value="4"> Carga pesada </option>
            </select>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary btn-round" onclick="create()">Crear Tarifa</button>
        </form>
      </div>
    </div>
  </div>
</div>
</div>


<script>
  function create() {
    let parqueadero_id = document.getElementById('parqueadero_id').value
    let title = document.getElementById('title').value
    let description = document.getElementById('description').value
    let precio = document.getElementById('precio').value
    let tiempo = document.getElementById('tiempo').value
    let tipo_vehiculo = document.getElementById('tipo_vehiculo').value
    fetch('http://127.0.0.1:5000/tarifas', {
        method: 'POST',
        headers: {
          "Content-type": "application/json;"
        },
        body: JSON.stringify({
          'parqueadero_id': parqueadero_id,
          'title': title,
          'description': description,
          'precio': precio,
          'tiempo': tiempo,
          'tipo_vehiculo': tipo_vehiculo,
          'state': 1
        })
      })
      .then(response => response.json())
      .then(data => {
        alert('Usuario creado correctamente :)')
      })
      .catch(error => {
        console.log(error)
      })
      
  }
  let url = 'http://127.0.0.1:5000/tarifas'
        fetch(url)
            .then(response => response.json())
            .then(data => mostrarData(data))
            .catch(error => console.log(error))
           
        const mostrarData = (data) => {
        
          let vehiculos = ['Particular', 'Furgon', 'Escolar', 'Motocicleta', 'Carga Pesada']
            let body = ''
            for (let i = 0; i<data.length; i++){
                body += `<tr><td>${data[i].parqueadero_id}</td><td>${data[i].title}</td>
      <td>${data[i].description}</td><td>${data[i].precio}</td><td>${data[i].tiempo== 1 ? 'Hora' : 'Minutos'}</td><td>${vehiculos[parseInt(data[i].tipo_vehiculo)-1]}</td>
      <td>${data[i].state == 1 ? 'Activo' : 'Inactivo'}</td><td> <button class="btn btn-warning btnEdit" data-toggle="modal"
                                            data-target="#Edit">Editar</buttton></td><td><button class="btn btn-danger" onclick="eliminar()">Eliminar</button></td></tr>`                
            }

            document.getElementById('data').innerHTML = body
        
        } 

      function editTarifas() {
        let btnEdit = document.getElementsByClassName('btnEdit');
        let form = document.getElementById('editForm');

        if (btnEdit == null) {
            return;
        }
        
        fetch('http://127.0.0.1:5000/tarifa/{id}', {
              headers:
              {
               'X-CSRF-TOKEN': token
              }
            })
              .then(response => response.json())
              .then(data => {

              form.setAttribute("action", 'tarifa/' + data.data.id);
       
      })
        }
         
</script>
@endsection