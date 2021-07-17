@extends('layouts.app', [
'class' => 'Pedidos',

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
                                <h5 class="card-title text-white" > Pedido </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">

                        <form action="{{route('pedidos.store',[$order->id])}}" method="POST">
                            @csrf
                            <input type="hidden" name="" value="">
                            <div class="row mt-5">
                                <div class="col-8">
                                    <div class="card bg-secondary shadow mb-3">
                                        <div class="card-header border-0" style="background-color:rgb(24, 173, 116);" >
                                            <h3 class="mb-0" style="text-align: center" >Características del producto</h3>
                                        </div>
                                        <div class="card-body text-black" style="background-color: #ffff;" >
                                            <div class="row">
                                                <br>
                                                <div class="form-group col">
                                                    <label class="form-control-label" id = "numbers" for="product[]" onchange = "myFunction()">Productos *</label>
                                                    <select name="product[]" class="form-control select2" multiple="multiple" required>
                                                        <option value="" disabled> Seleccione el/los productos</option>
                                                        @if(!@empty($producto))
                                                            @foreach ($producto as $product)
                                                                <option value="{{$product->id}}">{{$product->title}}</option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                </div>
                                                <div class="form-group col">
                                                    <label>Cantidad *</label>
                                                    <div class="input-group">
                                                        <input name="stock" type="number" class="form-control" placeholder="Cantidad"
                                                            required value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <button class="btn btn-info btn-block mt-4 text-light" > Guardar </button>
                                </div>
                                <div class="col-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Datos de las ordenes</h5>
                                            <div class="form-group">
                                                <label>Orden # </label>
                                                <input name="order_id" type="number" class="form-control" placeholder="Orden"
                                                required value="{{$order->id}}" disabled>
                                            </div>
                                            <div class="col-8">
                                                <b style="font-size:12px; color:#999" class="text-primary  font-weight-bold text-uppercase">Productos</b><br>
                                                @if($pedido == null)
                                                <span style="font-size:14px">Agregar Producto</span>      
                                                @else
                                                @foreach($pedido as $pedidos)
                                                <span style="font-size:14px">{{ $pedidos->getProduct->title }}</span>                                                
                                                 <span style="font-size:14px; float:right;">  ${{ $pedidos->total }}</span>
                                                 <span style="font-size:14px; float:right; margin:0 1em 0 auto;">  x {{ $pedidos->stock }}  </span>
                                                @endforeach
                                                @endif
                                              </div>
                                              <br>
                                            
                                              <div class="col-8">
                                                <b style="font-size:12px; color:#999;" class="text-primary  font-weight-bold text-uppercase">Total</b><br>
                                                <span style="font-size:14px; float:right;">  $ {{ $total }}  </span> <br>
                                              </div>
                                              <a href="{{ route('factura', ['id' => $order->id]) }}" class="btn btn-info btn-block"
                                                target="_blank">Facturar</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    <script>
     $(document).ready(function() {
    $('.select2').select2();
});
</script>


@endpush
