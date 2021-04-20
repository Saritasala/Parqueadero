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
                <form action="" method="POST" enctype="multipart/form-data">
                    <input type="hidden" name="" value="">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="card">
                                <img class="card-img-top imgUpdate"
                                    src="https://scotturb.com/wp-content/uploads/2016/11/product-placeholder.jpg"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h5 class="card-title">Datos del Comercio</h5>
                                    <div class="form-group">
                                        <label>Imagen *</label>
                                        <input type="file" style="z-index: 100% !important" name="productImg" id="inputImg" class="form-control-file">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea name="description" cols="30" rows="5"
                                            class="form-control" style="border-color: rgb(190, 190, 190)"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card bg-secondary shadow mb-3">
                                <div class="card-header border-0" style="background-color:rgb(24, 173, 116);" >
                                    <h3 class="mb-0" style="text-align: center" >Características del comercio</h3>
                                </div>
                                <div class="card-body text-black" style="background-color: #ffff;" >
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Nombre *</label>
                                            <input type="text" name="name" class="form-control" placeholder="Nombre del Comercio"
                                                value="">
                                        </div>
                                        <div class="form-group col">
                                            <label>Descripcion *</label>
                                            <div class="input-group">
                                                <input name="description" type="text" class="form-control" placeholder="Descripcion" required
                                                    value="">
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label>Telefono *</label>
                                            <div class="input-group">
                                                <input name="number" type="number" class="form-control" placeholder="Telefono"
                                                    required value="">
                                                
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Correo *</label>
                                            <div class="input-group">
                                                <input name="email" type="text" class="form-control" placeholder="Correo"
                                                     value="">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label>Direccion *</label>
                                            <div class="input-group">
                                                <input name="direccion" type="text" class="form-control" placeholder="Direccion"
                                                    required value="">
                                                
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-info btn-block mt-4 text-light" > Guardar </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection