<div class="sidebar" data-color="green" data-active-color="warning">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="/" class="simple-text logo-normal" >
        @if(Auth::user()->role_id==1)
            {{ __('Administrador') }}
        @else
            {{ __('Empleado') }}
        @endif
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="">
                <a href="{{ route('home') }}">
                    <i class="nc-icon nc-bank"></i>
                    <p>{{ __('Home') }}</p>
                </a>
            </li>
            <li class="">
                <a href="{{ route('clientes.index')}}">
                    <i class="nc-icon nc-box-2"></i>
                    <p>{{ __('Clientes') }}</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('parqueadero.index')}}">
                    <i class="nc-icon nc-paper"></i>
                    <p>{{ __('Parqueadero') }}</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('vehiculos.index')}}">
                    <i class="nc-icon nc-tablet-2"></i>
                    <p>{{ __('Vehiculos') }}</p>
                </a>
            </li>
            <li class="">
                <a href="{{route('tarifas.index')}}">
                    <i class="nc-icon nc-tablet-2"></i>
                    <p>{{ __('Tarifas') }}</p>
                </a>
            </li>
            @if(Auth::user()->role_id==1)
                <li class="">
                    <a href="{{route('usuarios.index')}}">
                        <i class="nc-icon nc-user-run"></i>
                        <p>{{ __('Usuarios') }}</p>
                    </a>
                </li>
            @endif

        </ul>
    </div>
</div>
