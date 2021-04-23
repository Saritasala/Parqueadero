@extends('layouts.app', [
'class' => 'Listado de ordenes',

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
                                <h3 class="mb-0 text-uppercase text-Default"> ORDEN #</h3>
                              </div>
                              <div class="col text-right">
                                <button class="btn btn-sm btn-primary"><i class="fas fa-shopping-cart"></i></button>
                              </div>
                            </div>
                          </div>
                          <div class="card-body">
                            <div class="row">
                              <div class="col-6">
                                <b style="font-size:12px; color:#999" class="text-primary  font-weight-bold text-uppercase">Nombre
                                  cliente</b><br>
                                <span
                                  style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Celular</b><br>
                                <span style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Dirección</b><br>
                                <span
                                  style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Observación</b><br>
                                <span style="font-size:14px">- </span><br>
                                <span style="font-size:14px"></span>
                              </div>
                              <div class="col-6">
                                <b style="font-size:12px; color:#999"
                                  class="text-primary  font-weight-bold text-uppercase">Comercio:</b><br>
                                <span style="font-size:14px"></span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="card shadow mt-2" style="max-height: 75vh; overflow: auto;">
                          <div class="card-header p-0">
                            <table class="table align-items-center table-flush">
                              <tbody>
                               
                                <tr>
                                  <td class="p-2 text-center">
                                   
                                  </td>
                                  <td class="p-2">
                                    <h4>u</h4>
                                    <div style="overflow: auto; max-height: 35vh;">
                                      
                  
                                    </div>
                                    
                  
                                  </td>
                                  <td class="text-green p-2"> $</td>
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