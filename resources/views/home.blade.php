@extends('layouts.app', [
'class' => 'Home',

])

@section('content')
<br>
<div class="content p-4 p-md-5 pt-5">
  <h1 class="center" align="center" style="color:rgb(28, 172, 117)">Bienvenido {{Auth::user()->name}}</h1>
  <br>
<div class="container-lg my-3">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Carousel indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Wrapper for carousel items -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img  src="{{ asset('paper') }}/img/img1.jpg" alt="First Slide">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('paper') }}/img/img2.jpg" alt="Second Slide" >  
            </div>
            <div class="carousel-item">
                <img src="{{ asset('paper') }}/img/img3.jpg" alt="Third Slide">  
        </div>
        <!-- Carousel controls -->
        <a class="carousel-control-prev" href="#myCarousel" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next" href="#myCarousel" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>
</div>
<br>
<br>
<br>

<h2 class="center" align="center" style="color:rgb(28, 172, 117)">{{Auth::user()->name}}, tal vez te interese esta informacion</h2>
  <br>
  <br>
    <div class="row">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Usuarios</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$usuario}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">clientes</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$clientes}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Vehiculos</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$vehiculo}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card bg-light mb-4" style="padding: 30px 20px;">
                <div class="card-header" style="background-color:rgb(28, 172, 117);  text-align: center;">
                    <p class="text-white">Parqueaderos</p></div>
                <div class="card-body">
                  <h5 class="card-title" style=" text-align: center;" >{{$parqueaderos}}</h5>
                  <p class="card-text" style=" text-align: center;">Registrados</p>
                </div>
              </div>
        </div>
  </div>
  
<br>
<br>
<br>
<br>
<br>
<br>
<h2 style="color:rgb(28, 172, 117)" class="center" align="center">MONITOREO DE PARKING</h2>
<br>
<br>
<div class="blog-area pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section-title ">
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-img">
                          <img src="{{ asset('paper') }}/img/grid.jpg" width="365" height="235"> 
                                <div class="blog-hover">
                                    <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                
                                <div class="blog-bottom">
                                    <h2>Zonas de parqueamiento</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="single-blog">
                            <div class="blog-img">
                          <img src="{{ asset('paper') }}/img/grid2.jpg" alt="blog" width="365" height="235"></a>
                                <div class="blog-hover">
                                    <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="blog-content">
                                
                                <div class="blog-bottom">
                                    <h2>Estacionamiento regular</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 hidden-sm col-xs-12">
                        <div class="single-blog">
                            <div class="blog-img">
                           <img src="{{ asset('paper') }}/img/grid3.jpg" alt="blog" width="365" height="246"></a>
                                <div class="blog-hover">
                                    <a href="blog-details.html"><i class="fa fa-link"></i></a>
                                </div>
                            </div>
                            <div class="blog-content">
                             
                                <div class="blog-bottom">
                                    <h2>Parqueo publicos y privados</h2>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                    	</div>
                </div>
            </div>
            <br>
<br>
<br>
<br>
            </div>
            <main class="container">
            <section class="row mt-5">

            <div class="col-md-6 ">
            <iframe width="560" height="315" src="https://www.youtube.com/embed/KfPgw10RhF4" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
               
              

        <div class="col-md-6">
         <div class="single-notice-left mb-25 pb-25">
           <h4 > No se convierta en infractor</h4>
                <p>
                Es importante tener en cuenta que el hecho que el conductor permanezca en el carro mientras está estacionado en una zona
                 prohibida no es motivo para evitar que la policía le ponga la multa respectiva y lo inmovilice.
                </p>


                <h4> Cómo estacionar en vías públicas</h4>
                <p>
                Tenga en cuenta que cuando requiera ¿por alguna emergencia¿ parquear en un vía pública siempre debe poner las luces de parqueo y
                 alejarse lo más que pueda de la zona de tránsito.
                </p>


                <h4>Manual de conducción</h4>
                <p>
                El Manual de Conductores del Automóvil Club da unas instrucciones que sirven para parquear paralelamente de manera más fácil, pero es importante tener en cuenta que estas
                 instrucciones son básicas y se deben modificar de acuerdo a cada circunstancia.
                </p>
                 </div>
             </div>
        </section>

    </main>

<br>
<br>
<br>
<br>
 <main class="container">
            <section>
            <div class="container-fluid">
            <div class="section-title text-center">
                            <h2>Contactenos</h2>
                        </div>
               
<hr>
 <div class="row">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d125335.26163296038!2d-74.88805881281787!3d10.983972467400418!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8ef42d44d12ae605%3A0x2633844581b917b2!2sBarranquilla%2C%20Atl%C3%A1ntico!5e0!3m2!1ses!2sco!4v1623868907988!5m2!1ses!2sco"" width="100%" height="320" frameborder="0" style="border:0" allowfullscreen></iframe>
 </div>
	<div class="row text-center">
	  <div class="col-4 box1 pt-4">
        <a href="tel:+123456789"><i class="fas fa-phone fa-3x"></i>
        <h3 class="d-none d-lg-block d-xl-block">Telefono</h3>
        <p class="d-none d-lg-block d-xl-block">+57 3659875</p></a>
      </div>
      <div class="col-4 box2 pt-4">
        <a href=""><i class="fas fa-home fa-3x"></i>
        <h3 class="d-none d-lg-block d-xl-block">Dirección</h3>
        <p class="d-none d-lg-block d-xl-block">Barranquilla</p></a>
      </div>
      <div class="col-4 box3 pt-4">
        <a href="mailto:test@test.com"><i class="fas fa-envelope fa-3x"></i>
        <h3 class="d-none d-lg-block d-xl-block">E-mail</h3>
        <p class="d-none d-lg-block d-xl-block">test@test.com</p></a>
      </div>
	</div>
</div>




            </main>
            </section>                  
                                    
            </div>
            
</div>
</div>

@endsection

@push('scripts')

@endpush

