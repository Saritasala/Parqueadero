<div class="wrapper">
   @include('layouts.sidebar')
   <div class="main-panel">
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
         <div class="container-fluid">
            <div class="navbar-wrapper">
               <div class="navbar-toggle">
                  <button type="button" class="navbar-toggler">
                     <span class="navbar-toggler-bar bar1"></span>
                     <span class="navbar-toggler-bar bar2"></span>
                     <span class="navbar-toggler-bar bar3"></span>
                  </button>
               </div>
               <nav aria-label="breadcrumb">
                  <ol class="breadcrumb">
                     <li class="breadcrumb-item Active"><a href="/home">Inicio</a></li>
                     @foreach (explode(".",request()->route()->getName()) as $item)
                        @if ($item!="index")
                           <li class="breadcrumb-item active" {aria-current="page"}>  <a href="{{request()->segment(1)==$item?'/'.request()->segment(1):'#'}}">{{__("$item")}}</a> </li>
                        @endif
                     @endforeach

                  </ol>
               </nav>
            </div>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
               aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
               <span class="navbar-toggler-bar navbar-kebab"></span>
               <span class="navbar-toggler-bar navbar-kebab"></span>
               <span class="navbar-toggler-bar navbar-kebab"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
               <ul class="navbar-nav">
                  <li class="nav-item btn-rotate dropdown">
                     <button type="button" class="nav-link dropdown-toggle btn btn-primary btn-sm m-0"
                        data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i> Recargar
                     </button>
                     <div class="dropdown-menu dropdown-menu-right p-3" aria-labelledby="navbarDropdownMenuLink">
                        <form method="POST" action="https://sandbox.checkout.payulatam.com/ppp-web-gateway-payu/" target="_blank"
                           id="idFormRecharge">
                           <div class="row">
                              <div class="col">
                                 <div class="form-group m-0 mb-2">
                                    <label for="idAddRoleName" class="control-label">Valor *</label>
                                    <input type="number" name="amount" class="form-control" placeholder="Valor">
                                 </div>
                              </div>
                           </div>
                           <div class="row">
                              <div class="col">
                                 <div class="form-group m-0">
                                    <button type="button"
                                       class="btn btn-primary btn-block balanceRecharge">Recargar</button>
                                 </div>
                              </div>
                           </div>

                           <input name="merchantId" type="hidden">
                           <input name="accountId" type="hidden">
                           <input name="description" type="hidden">
                           <input name="referenceCode" type="hidden">
                           <input name="tax" type="hidden">
                           <input name="taxReturnBase" type="hidden">
                           <input name="currency" type="hidden">
                           <input name="signature" type="hidden">
                           <input name="test" type="hidden">
                           <input name="buyerEmail" type="hidden">
                           <input name="responseUrl" type="hidden">
                           <input name="confirmationUrl" type="hidden">
                           <input name="extra1" type="hidden">
                        </form>
                     </div>
                  </li>
                  <li class="nav-item btn-rotate dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-bell-55"></i>
                        <p>
                           <span class="d-lg-none d-md-block">{{ __('Some Actions') }}</span>
                        </p>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">{{ __('Notificaciones') }}</a>
                     </div>
                  </li>
                  <li class="nav-item btn-rotate dropdown">
                     <a class="nav-link dropdown-toggle" href="http://example.com" id="navbarDropdownMenuLink2"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="nc-icon nc-settings-gear-65"></i>
                        <p>
                           <span class="d-lg-none d-md-block">{{ __('Account') }}</span>
                        </p>
                     </a>
                     <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink2">
                        <form class="dropdown-item" action="{{ route('logout') }}" id="formLogOut" method="POST"
                           style="display: none;">
                           @csrf
                        </form>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                           <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Mi perfil') }}</a>
                           
                             
                                 <a class="dropdown-item"  href="">
                                  
                                 </a>
                            
                           <a class="dropdown-item" onclick="logout()">{{ __('Cerrar sesion') }}</a>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </div>
      </nav>

      @yield('content')
      @include('layouts.footer')
   </div>
</div>
@push('scripts')
<script>
   function logout() {
      myAlert.Confirmation('¿Estas Seguro?', 'Se cerrara la sesion').then((result) => {
         if(result.isConfirmed){
            document.getElementById('formLogOut').submit();
         }
      });
   }
</script>
@endpush