@extends('layouts.app', [
'class' => 'Home',

])

@section('content')
<br>
<div class="content p-4 p-md-5 pt-5">
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Usuarios</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$usuario}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Productos</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$productos}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Comercios</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$comercios}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Ordenes</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$ordenes}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
</div>


@endsection

@push('scripts')

@endpush

