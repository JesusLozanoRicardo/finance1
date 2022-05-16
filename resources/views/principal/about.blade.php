<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="TemplateMo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

    @if (!empty($header->nombre))
    <title>{{$header->nombre}}</title>
    @else
    <title>encabezado nombre empresa</title>
    @endif

    <!-- Bootstrap core CSS -->

      <link rel="stylesheet" href="{{ asset('/recursos/vendor/bootstrap/css/bootstrap.min.css') }}" />

    <!-- Additional CSS Files -->

    <link rel="stylesheet" href="{{ asset('/css/fontawesome.css') }}"/>
    <link rel="stylesheet" href="{{ asset('/css/templatemo-finance-business.css')}}"/>
    <link rel="stylesheet" href="{{ asset('/css/owl.css') }}"/>
    <!--

Finance Business TemplateMo

https://templatemo.com/tm-545-finance-business

-->
  </head>

  <body>
    <?php
  $i = 0;
  ?>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->

    <!-- Header -->
    <div class="sub-header">
      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12">
            <ul class="left-info">
            @if ($header!=null)
              <li><a href="#"><i class="fa fa-clock-o"></i>{{$header->horario}}</a></li>
              <li><a href="#"><i class="fa fa-phone"></i>{{$header->telefono}}</a></li>
              @else
              <li><a href="#"><i class="fa fa-clock-o">encabezado horario</i></a></li>
              <li><a href="#"><i class="fa fa-phone">encabezado telefono</i></a></li>
              @endif
            </ul>
          </div>
          <div class="col-md-4">
            <ul class="right-icons">
            @if (!empty($socialnetwork->facebook))
              <li><a href="{{$socialnetwork->facebook}}"><i class="fa fa-facebook"></i></a></li>
            @endif
            @if (!empty($socialnetwork->twitter))
              <li><a href="{{$socialnetwork->twitter}}"><i class="fa fa-twitter"></i></a></li>
            @endif
            @if (!empty($socialnetwork->be))
              <li><a href="{{$socialnetwork->be}}"><i class="fa fa-behance"></i></a></li>
            @endif
            @if (!empty($socialnetwork->dribbble))
              <li><a href="{{$socialnetwork->dribbble}}"><i class="fa fa-dribbble"></i></a></li>
            @endif
            @if (!empty($socialnetwork->github))
              <li><a href="{{$socialnetwork->github}}"><i class="fa fa-github"></i></a></li>
            @endif
            </ul>
          </div>
        </div>
      </div>
    </div>

    <header class="">
      <nav class="navbar navbar-expand-lg">
        <div class="container">
        @if (!empty($header->nombre))
          <a class="navbar-brand" href="/"><h2>{{$header->nombre}}</h2></a>
        @else
          <a class="navbar-brand" href="/"><h2>encabezado nombre empresa</h2></a>
        @endif
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" href="/">Inicio
                  <span class="sr-only">(current)</span>
                </a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="nosotros">Nosotros</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="servicios">Servicios</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="contactos">Contacto</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Page Content -->
    @if(!empty($carrusel_nosotros->imagen) )
    <div class="page-heading header-text" style="background-image: url({{asset("images/carrusel_nosotros/$carrusel_nosotros->imagen")}});">
    @else
    <div class="page-heading header-text" style="background-image: url({{asset('images/page-heading-bg.jpg')}});">
    @endif
      <div class="container">
        <div class="row">
          <div class="col-md-12">
          @if (!empty($header->texto1_nosotros))
            <h1>{{$header->texto1_nosotros}}</h1>
            <span>{{$header->texto2_nosotros}}</span>
          @else
          <h1>Encabezado texto1 nosotros</h1>
          <span>Encabezado texto2 nosotros</span>
          @endif
          </div>
        </div>
      </div>
    </div>

    <div class="more-info about-info">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="more-info-content">
              <div class="row">
                <div class="col-md-6 align-self-center">
                  <div class="right-content">
                  @if (!empty($quienes->texto1))
                    <span>{{$quienes->texto1}}</span>
                    <h2>{{$quienes->texto2}} <em>{{$quienes->texto3}}</em></h2>
                    <p class="{{++$i}} ajustar-h">{{$quienes->texto4}}</br></br>
              <a class="ajustar filled-button" id="{{$i}}">Leer más ...</a>
                  @else
                     <span>Quienes somos texto1</span>
                    <h2>Quienes somos texto2 <em>Quienes somos texto3</em></h2>
                    <p>Quienes somos texto4</p>
                    <a href="#" class="filled-button">Leer más ...</a>
                  @endif
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="left-image">
                  @if (!empty($quienes->imagen))
                      <img src="{{asset("images/quienes/$quienes->imagen")}}" id="pre" alt="">
                  @else
                      <img src="{{asset('images/about-image.jpg')}}" alt="aqui va la imagen">
                  @endif

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="team">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
            @if (!empty($encabezado_miembros->texto1))
              <h2>{{$encabezado_miembros->texto1}} <em>{{$encabezado_miembros->texto2}}</em></h2>
              <span>{{$encabezado_miembros->texto3}}</span>
            @else
            <h2>Encabezado miembros texto1 <em>Encabezado miembros texto2</em></h2>
              <span>Encabezado miembros texto3</span>
            @endif
            </div>
          </div>
          @if ($datos_miembros->count()>0)
            @foreach ($datos_miembros as $item )
          <div class="col-md-4">
            <div class="team-item">
            <div style="background:url('{{asset("images/miembros/$item->imagen")}}')no-repeat center/cover !important; height:15rem; width:100%;"></div>
              <div class="down-content">
                <h4>{{$item->texto1}}</h4>
                <span>{{$item->texto2}}</span>
                <p class="{{++$i}} ajustar-h">{{$item->texto3}}</p>
                <a class="ajustar filled-button" id="{{$i}}">Leer más ...</a>
              </div>
            </div>
          </div>
          @endforeach

          @else
          <div class="col-md-4">
            <div class="team-item">
             <div class="down-content">
                <h4>Datos miembros texto1</h4>
                <span>Datos miembros texto2</span>
                <p class="{{++$i}} ajustar-h">Datos miembros texto3</p>
                <a class="ajustar filled-button" id="{{$i}}">Leer más ...</a>
              </div>
            </div>
          </div>
          @endif
        </div>
      </div>
    </div>

    @if(!empty($carrusel_nosotros->imagen1))
    <div class="fun-facts header-text mb-2" style="background-image: url({{asset("images/carrusel_nosotros/$carrusel_nosotros->imagen1")}});">
    @else
    <div class="fun-facts header-text mb-2" style="background-image: url({{asset('images/fun-facts-bg.jpg')}});">
    @endif

      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <div class="left-content">
            @if (!empty($crecimiento->texto1))
              <span>{{$crecimiento->texto1}}</span>
              <h2>{{$crecimiento->texto2}}<em> {{$crecimiento->texto3}}</em></h2>
              <p class="{{++$i}} ajustar-h">{{$crecimiento->texto4}} </br></br>

              <a class="ajustar filled-button" id="{{$i}}">Leer más ...</a>
            @else
              <span>Encabezado Crecimiento texto1</span>
              <h2>Encabezado Crecimiento texto2<em> Encabezado Crecimiento texto3</em></h2>
              <p>Encabezado Crecimiento texto4 </br></br>
              <a href="" class="filled-button">Leer más ...</a>
            @endif
            </div>
          </div>
          <div class="col-md-6 align-self-center">
            <div class="row">
            @if ($datos->count()>0)
            @foreach ($datos as $item )
              <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">{{$item->texto2}}</div>
                  <div class="count-title">{{$item->texto1}}</div>
                </div>
              </div>
            @endforeach
            @else
            <div class="col-md-6">
                <div class="count-area-content">
                  <div class="count-digit">222</div>
                  <div class="count-title">Crecimiento datos texto</div>
                </div>
              </div>
            @endif
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="testimonials">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="section-heading">
            @if (!empty($encabezados_dicen->texto1))
              <h2>{{$encabezados_dicen->texto1}} <em>{{$encabezados_dicen->texto2}}</em></h2>
              <span>{{$encabezados_dicen->texto3}}</span>
            @else
              <h2>Testimonio encabezado texto1 <em>Testimonio encabezado texto2</em></h2>
              <span>Testimonio encabezado texto3</span>
            @endif
            </div>
          </div>
          <div class="col-md-12">
            <div class="owl-testimonials owl-carousel">

            @if ($datos_dicen->count()>0)
              @foreach ($datos_dicen as $item )
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>{{$item->texto1}}</h4>
                  <span>{{$item->texto2}}</span>
                  <p class="{{++$i}} ajustar-h">"{{$item->texto3}}"</p>
                  <a class="ajustar filled-button" id="{{$i}}">Leer más ...</a>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
              @endforeach
            @else
              <div class="testimonial-item">
                <div class="inner-content">
                  <h4>Testimonio datos texto1</h4>
                  <span>Testimonio datos texto1</span>
                  <p>"Testimonio datos texto1"</p>
                </div>
                <img src="http://placehold.it/60x60" alt="">
              </div>
            @endif

            </div>
          </div>
        </div>
      </div>
    </div>

   <!-- Footer Starts Here -->
   <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4 footer-item">
          @if (!empty($footer_titulo->titulo))
            <h4>{{$footer_titulo->titulo}}</h4>
          @else
            <h4>footer titulo</h4>
          @endif
          @if (!empty($footer_titulo->descripcion))
            <p>{{$footer_titulo->descripcion}}</p>
          @else
          <p>footer descripcion</p>
          @endif
            <ul class="social-icons">
            @if (!empty($socialnetwork->facebook))
              <li><a rel="nofollow" href="{{$socialnetwork->facebook}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
            @endif
            @if (!empty($socialnetwork->twitter))
              <li><a href="{{$socialnetwork->twitter}}"><i class="fa fa-twitter"></i></a></li>
            @endif
            @if (!empty($socialnetwork->github))
              <li><a href="{{$socialnetwork->github}}"><i class="fa fa-github"></i></a></li>
            @endif
            @if (!empty($socialnetwork->be))
              <li><a href="{{$socialnetwork->be}}"><i class="fa fa-behance"></i></a></li>
            @endif
            @if (!empty($socialnetwork->dribbble))
              <li><a href="{{$socialnetwork->dribbble}}"><i class="fa fa-dribbble"></i></a></li>
            @endif
            </ul>
          </div>
          <div class="col-md-4 footer-item">
          @if (!empty($footer_titulo->titulo1))
            <h4>{{$footer_titulo->titulo1}}</h4>
          @else
            <h4>footer titulo1</h4>
          @endif

             @if ($footer_utiles->count()>0)
                <ul class="menu-list">
                @foreach ($footer_utiles as $item )
                   <li><a href="{{$item->link}}">{{$item->nombre}}</a></li>
                @endforeach
                </ul>
             @else
             <ul class="menu-list">
             <li><a href="#">footer link útiles</a></li>
             </ul>
             @endif


          </div>
          <div class="col-md-4 footer-item last-item">
            <h4>Contáctenos</h4>
            <div class="contact-form">
              <form id="contact footer-contact" action="{{route('contacts.store')}}" method="post">
              @csrf
                <div class="row">
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="email" type="text" class="form-control" id="email" pattern="[^ @]*@[^ @]*" placeholder="E-Mail Address" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12 col-md-12 col-sm-12">
                    <fieldset>
                      <input name="subject" type="text" class="form-control" id="subject" placeholder="Subject" required>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required></textarea>
                    </fieldset>
                  </div>
                  <div class="col-lg-12">
                    <fieldset>
                      <button type="submit" id="form-submit" class="filled-button">Enviar mensaje</button>
                    </fieldset>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </footer>

    <div class="sub-footer">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <p>Copyright &copy; 2020 Financial Business Co., Ltd.

            - Design: <a rel="nofollow noopener" href="https://templatemo.com" target="_blank">TemplateMo</a></p>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="{{asset('/recursos/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('/recursos/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Additional Scripts -->
    <script src="{{asset('/js/custom.js')}}"></script>
    <script src="{{asset('/js/owl.js')}}"></script>
    <script src="{{asset('/js/slick.js')}}"></script>
    <script src="{{asset('/js/accordions.js')}}"></script>

    <script language = "text/Javascript">
      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

<script >
$('.ajustar').click(function(){

                let ajustar = $("."+$(this).attr('id')+"");
                  ajustar.toggleClass("ajustar-h");
});


      cleared[0] = cleared[1] = cleared[2] = 0; //set a cleared flag for each field
      function clearField(t){                   //declaring the array outside of the
      if(! cleared[t.id]){                      // function makes it static and global
          cleared[t.id] = 1;  // you could use true and false, but that's more typing
          t.value='';         // with more chance of typos
          t.style.color='#fff';
          }
      }
    </script>

  </body>
</html>
