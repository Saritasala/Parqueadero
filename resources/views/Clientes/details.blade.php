@extends('layouts.app', [
'class' => 'Ver mas Productos',

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
                <div class="container-fluid mt--7 mb-3">
                    <div class="row mt-5">
                      <div class="col-lg-12 col-12">
                        <div class="card shadow">
                          <div class="card-header border-0 pb-0">
                            <div class="row align-items-center">
                              <div class="col">
                                <h3 class="mb-0 text-uppercase text-Default"> Producto #{{$product->id}}</h3>
                              </div>
                              
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    
                                    @if (Storage::disk('public')->exists($product->img_product))
                                    <img class="profile-user-img rounded-circle" width="70"
                                    src="{{ asset('storage/' . $product->img_product) }}" alt="User profile picture">
                                    @else
                                    <img class="profile-user-img rounded-circle" width="70"
                                    src="https://scotturb.com/wp-content/uploads/2016/11/product-placeholder.jpg"
                                    alt="User profile picture">
                                    @endif
                                    
                                </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999" class="text-primary  font-weight-bold text-uppercase">Nombre del producto</b><br>
                                <span
                                  style="font-size:14px">{{$product->title}}</span>
                              </div>
                              
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Descripcion</b><br>
                                <span style="font-size:14px">{{$product->description}}</span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Precio</b><br>
                                <span
                                  style="font-size:14px">${{$product->precio}}</span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Cantidad</b><br>
                                <span style="font-size:14px">{{$product->stock}} </span><br>
                                <span style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Comercio</b><br>
                                <span style="font-size:14px">{{$product->getComercio->name}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection