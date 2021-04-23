@extends('layouts.app', [
'class' => 'Ver mas ordenes',

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
                                <h3 class="mb-0 text-uppercase text-Default"> ORDEN #{{$element->id}}</h3>
                              </div>
                              
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-6">
                                <b style="font-size:12px; color:#999" class="text-primary  font-weight-bold text-uppercase">Nombre
                                  de Vendedor</b><br>
                                <span
                                  style="font-size:14px">{{$element->getUser->name}}</span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Celular del vendedor</b><br>
                                <span style="font-size:14px">{{$element->getUser->phone}}</span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Dirección</b><br>
                                <span
                                  style="font-size:14px">{{$element->direccion}}</span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Observación</b><br>
                                <span style="font-size:14px">{{$element->reference}} </span><br>
                                <span style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Fecha :</b><br>
                                <span style="font-size:14px">{{$element->date}}</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card shadow mt-2" style="max-height: 75vh; overflow: auto;">
                          <div class="card-header p-0">
                            <table class="table align-items-center table-flush">
                              <tbody>
                                @if(!empty($product))
                                @foreach ($product as $item)
                                <tr>
                                  <td class="p-2 text-center">
                                    @if (Storage::disk('public')->exists($item->getProduct->img_product))
                                    <img class="profile-user-img rounded-circle" width="70"
                                      src="{{ asset('storage/' . $item->getProduct->img_product) }}" alt="User profile picture">
                                    @else
                                    <img class="profile-user-img rounded-circle" width="70"
                                      src="https://scotturb.com/wp-content/uploads/2016/11/product-placeholder.jpg"
                                      alt="User profile picture">
                                    @endif
                                  </td>
                                  <td class="p-2">
                                    <h4>{{ $item->getProduct->title }} (x{{ $item->stock }})</h4>
                                    <div style="overflow: auto; max-height: 35vh;">
                                    </div>
                                  </td>
                                  <td class="text-green p-2">$ {{$item->total}}</td>
                                </tr>
                                @endforeach
                                @else
                                <span style="font-size:14px">No hay Productos asignados</span>
                                @endif
                              </tbody>
                            </table>
                          </div>
                        </div>
                        <div class="card shadow mt-2" style="max-height: 75vh; overflow: auto;">
                          <div class="card-header p-0">
                            <table class="table align-items-center table-flush">
                              <tbody>
                                <tr>
                                  <td>
                                  </td>
                                  <td>
                                    <h5>Total :</h4>
                                  </td>
                                  <td class="p-2 text-center" style="padding: 12px 6p">
                                    $ {{$element->total}}
                                  </td>
                                  <td>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                            
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