<div class="sidebar" data-color="black" data-active-color="warning">
    <div class="logo">
        <a href="/" class="simple-text logo-mini">
            <div class="logo-image-small">
                <img src="{{ asset('paper') }}/img/logo-small.png">
            </div>
        </a>
        <a href="/" class="simple-text logo-normal">
            {{ __('Administrador') }}
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
                <a href="{{ route('product.index')}}">
                    <p>{{ __('Productos') }}</p>
                </a>
            </li>
            
        </ul>
    </div>
</div>
