@extends('layouts.app', [
'class' => 'Crear Producto',

])

@section('content')
<div class="content">
    <div class="container-fluid mt--2">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif
            <div class="col-md-12">
                <form action="{{route('product.update', [$product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="" value="">
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="card">
                                
                                <div class="card-body">
                                    <h5 class="card-title">Datos del producto</h5>
                                    <div class="form-group">
                                        <label>Imagen *</label>
                                        <input type="file" name="imgProduct" style="border-color: rgb(190, 190, 190)" class="form-control inputImg">
                                    </div>
                                    <div class="form-group">
                                        <label>Descripción</label>
                                        <textarea name="description" cols="30" rows="5"
                                            class="form-control" style="border-color: rgb(190, 190, 190)">{{$product->description}}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="card bg-secondary shadow mb-3">
                                <div class="card-header border-0" style="background-color:rgb(24, 173, 116);" >
                                    <h3 class="mb-0" style="text-align: center" >Características del producto</h3>
                                </div>
                                <div class="card-body text-black" style="background-color: #ffff;" >
                                    <div class="row">
                                        <div class="form-group col">
                                            <label>Nombre *</label>
                                            <input type="text" name="title" class="form-control" placeholder="Nombre del producto"
                                                value="{{$product->title}}">
                                        </div>
                                        <div class="form-group col">
                                            <label>Precio *</label>
                                            <div class="input-group">
                                                <input name="precio" type="number" class="form-control" placeholder="Precio" required
                                                    value="{{$product->precio}}">
                                            </div>
                                        </div>
                                        <div class="form-group col">
                                            <label>Cantidad *</label>
                                            <div class="input-group">
                                                <input name="stock" type="number" class="form-control" placeholder="Cantidad"
                                                    required value="{{$product->stock}}">
                                                
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