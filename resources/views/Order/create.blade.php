@extends('layouts.app', [
'class' => 'Crear Orden',

])

@section('content')
<div class="content">
    <div class="container-fluid mt--2">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif<br>
                <div class="col-md-12">
                    <br>
                    <br>
                    <div class="card">
                        <div class="card-header" style="text-align: center">
                            <h5 class="card-title" style="text-align: center" >Crear Orden</h5>
                        </div>
                        <div class="card-body">
                            <form action="{{route('order.store')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label class="form-control-label" for="input-name">Titulo *</label>
                                        <input type="text" name="name" id="input-name" value="{{old('name')}}"
                                            class="form-control" placeholder="Titulo" required>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('name') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label class="form-control-label" for="input-direccion">Direccion *</label>
                                        <input type="text" name="direccion" id="input-direccion" value="{{old('direccion')}}"
                                            class="form-control" placeholder="Direccion" required>
                                        @if ($errors->has('direccion'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('direccion') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-payment_type_vp">Estado de pago *</label>
                                    <select name="payment_type_vp" id="payment_type_vp" class="form-control">
                                        <option value="" selected disabled> Seleccione estado de pago</option>
                                        @foreach($value as $val)
                                            <option value="{{$val->id}}"
                                                {{old('payment_type_vp') == $val->id ? 'selected' : ''}}>
                                            {{$val->name}}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>

                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-payment_state">Metodo de pago *</label>
                                    <select name="payment_state" id="payment_state" class="form-control">
                                        <option value="" selected disabled> Seleccione metodo de pago</option>
                                        @foreach($pay as $pey)
                                            <option value="{{$pey->id}}"
                                                {{old('payment_state') == $pey->id ? 'selected' : ''}}>
                                            {{$pey->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label class="form-control-label" for="input-date">Fecha *</label>
                                        <input type="datetime-local" name="date" id="input-date" value="{{old('date')}}"
                                            class="form-control" placeholder="Fecha " required>
                                        @if ($errors->has('date'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('date') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-6 col-sm-12">
                                        <label class="form-control-label" for="input-reference">Descripcion *</label>
                                        <textarea name="reference" id="input-reference" value="{{old('reference')}}"
                                            class="form-control" placeholder="Descripcion" required></textarea>
                                        @if ($errors->has('reference'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('reference') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                    
                                </div>
                                
                                    <div class="row justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-round">Crear Orden</button>
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
