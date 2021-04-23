@extends('layouts.app', [
'class' => 'Crear Usuario',

])

@section('content')
<div class="content" id="app">
    <div class="container-fluid mt--2">
        <div class="row">
            @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
            @endif<br>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">Crear Usuario</h5>
                    </div>
                    <div class="card-body">
                        @include('layouts.alerts')
                        <form action="" method="POST">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Nombre *</label>
                                    <input type="text" name="name" id="input-name" value="{{old('name')}}"
                                        class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-name">Apellido *</label>
                                    <input type="text" name="last_name" id="input-name" value="{{old('last_name')}}"
                                        class="form-control" placeholder="Nombre" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-number">Télefono *</label>
                                    <input type="text" name="number" id="input-number" value="{{old('phone')}}"
                                        class="form-control" placeholder="Telefono" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-email">Email *</label>
                                    <input type="email" name="email" id="input-email" value="{{old('email')}}"
                                        class="form-control" placeholder="Email" required>
                                </div>
                                <div class="form-group col-md-6 col-sm-12">
                                    <label class="form-control-label" for="input-password">Role *</label>
                                    <select name="role" id="" class="form-control">
                                        <option value="" selected disabled> Seleccione un Role</option>
                                       
                                    </select>
                                </div>
                                    
                            </div>
                            <div class="row justify-content-center">
                                <button type="submit" class="btn btn-primary">Crear Usuario</button>
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
