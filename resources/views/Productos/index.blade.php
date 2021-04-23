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
                    <div class="card-header" style="text-align: center; background-color:rgb(17, 116, 78); font-size: 12px; ">
                        <div class="row align-items-center">
                            <div class="col-md-12">
                                <h5 class="card-title text-white" >Productos</h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <a  href="{{route('product.create')}}" class=" btn bg-info btn-sm text-white" >Crear Producto</a>
                        
                        <div class="table-responsive">
                            <table class="table align-items-center text-center table-flush">
                                <thead class="thead-light" style=" background-color:rgb(24, 173, 116);">
                                    <tr>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Precio</th>
                                        <th scope="col">Unidades</th>
                                        <th scope="col">Estado</th>
                                        <th scope="col">Accion</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($producto as $product)
                                        <tr id="{{$product->id}}">
                                            @if(!empty($product))
                                            <td>{{$product->title}}</td>
                                            <td>{{$product->precio}}</td>
                                            <td>{{$product->stock}}</td>
                                            @if($product->state==1)
                                                <td><span class="badge badge-pill badge-success">Activo</span></td>
                                            @else
                                                <td><span class="badge badge-pill badge-danger">Inactivo</span></td>
                                            @endif
                                            <td>
                                                <a class="btn btn-warning btn-sm" title="Editar"
                                                href="{{route('product.edit', [$product->id])}}"><i class="nc-icon nc-ruler-pencil"></i>
                                                </a>
                
                                                <a class="btn btn-info btn-sm" title="Detalles"
                                                href="{{route('product.show',[$product->id])}}"><i class="nc-icon nc-badge"></i>
                                                </a>

                                                <button class="btn btn-sm btn-danger btnEraseProduct" title="Eliminar">
                                                    <i class="nc-icon nc-box"></i></button>
                                            </td>
                                            @else
                                            <td>No hay productos registrados</td>
                                            @endif
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
@endsection

@push('js')

@endpush