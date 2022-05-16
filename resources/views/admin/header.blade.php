@extends('adminlte::page')

@section('title', 'Header')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Encabezado</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <!--<h3 class="card-title">titulo card</h3>-->
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if ($header==null)
               <form role="form"method="POST" action="{{route('header.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('header.update',$header->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($header!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="horario">Horario:</label>
                    <input type="text" value="{{$header->horario}}" class="form-control" name="horario" id="horario" placeholder="Introduzca el Horario">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input type="text" class="form-control" value="{{$header->telefono}}" name="telefono" id="telefono" placeholder="Introduzca el Teléfono">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Empresa:</label>
                    <input type="text" class="form-control" value="{{$header->nombre}}" name="nombre" id="nombre" placeholder="Introduzca el Nombre de la empresa">
                </div>
                <div class="form-group">
                    <label for="texto1">Texto1:</label>
                    <input type="text" class="form-control" name="texto1" value="{{$header->texto1}}" id="texto1" placeholder="Introduzca el texto1">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto2:</label>
                    <input type="text" class="form-control" name="texto2" value="{{$header->texto2}}" id="texto2" placeholder="Introduzca el texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto3:</label>
                    <input type="text" class="form-control" name="texto3" value="{{$header->texto3}}" id="texto3" placeholder="Introduzca el texto3">
                </div>
                <div class="form-group">
                    <label for="texto4">Texto4:</label>
                    <input type="text" class="form-control" name="texto4" value="{{$header->texto4}}" id="texto4" placeholder="Introduzca el texto4">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto5:</label>
                    <input type="text" class="form-control" name="texto5" value="{{$header->texto5}}" id="texto5" placeholder="Introduzca el texto5">
                </div>
                <div class="form-group">
                    <label for="texto1_contacto">Texto1 Contacto:</label>
                    <input type="text" class="form-control" name="texto1_contacto" value="{{$header->texto1_contacto}}" id="texto1_contacto" placeholder="Introduzca el Texto1 de contacto">
                </div>
                <div class="form-group">
                    <label for="texto2_contacto">Texto2 Contacto:</label>
                    <input type="text" class="form-control" name="texto2_contacto" value="{{$header->texto2_contacto}}" id="texto2_contacto" placeholder="Introduzca el Texto2 de contacto">
                </div>
                <div class="form-group">
                    <label for="texto1_nosotros">Texto1 Nosotros:</label>
                    <input type="text" class="form-control" name="texto1_nosotros" value="{{$header->texto1_nosotros}}" id="texto1_nosotros" placeholder="Introduzca el Texto1 de nosotros">
                </div>
                <div class="form-group">
                    <label for="texto2_nosotros">Texto2 Nosotros:</label>
                    <input type="text" class="form-control" name="texto2_nosotros" value="{{$header->texto2_nosotros}}" id="texto2_nosotros" placeholder="Introduzca el Texto2 de nosotros">
                </div>
                <div class="form-group">
                    <label for="texto1_servicios">Texto1 Servicios:</label>
                    <input type="text" class="form-control" name="texto1_servicios" value="{{$header->texto1_servicios}}" id="texto1_servicios" placeholder="Introduzca el Texto1 de servicios">
                </div>
                <div class="form-group">
                    <label for="texto2_servicios">Texto2 Servicios:</label>
                    <input type="text" class="form-control" name="texto2_servicios" value="{{$header->texto2_servicios}}" id="texto2_servicios" placeholder="Introduzca el Texto2 de servicios>
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                  <label for="horario">Horario:</label>
                    <input type="text" value="" class="form-control" name="horario" id="horario" placeholder="Introduzca el Horario">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono:</label>
                  <input type="text" class="form-control" value="" name="telefono" id="telefono" placeholder="Introduzca el Teléfono">
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre Empresa:</label>
                    <input type="text" class="form-control" value="" name="nombre" id="nombre" placeholder="Introduzca el Nombre de la empresa">
                </div>
                <div class="form-group">
                    <label for="texto1">Texto1:</label>
                    <input type="text" class="form-control" name="texto1" value="" id="texto1" placeholder="Introduzca el texto1">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto2:</label>
                    <input type="text" class="form-control" name="texto2" value="" id="texto2" placeholder="Introduzca el texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto3:</label>
                    <input type="text" class="form-control" name="texto3" value="" id="texto3" placeholder="Introduzca el texto3">
                </div>
                <div class="form-group">
                    <label for="texto4">Texto4:</label>
                    <input type="text" class="form-control" name="texto4" value="" id="texto4" placeholder="Introduzca el texto4">
                </div>
                <div class="form-group">
                    <label for="texto5">Texto5:</label>
                    <input type="text" class="form-control" name="texto5" value="" id="texto5" placeholder="Introduzca el texto5">
                </div>
                <div class="form-group">
                    <label for="texto1_contacto">Texto 1 contacto:</label>
                    <input type="text" class="form-control" name="texto1_contacto" value="" id="texto1_contacto" placeholder="Introduzca el Texto1 de contacto">
                </div>
                <div class="form-group">
                    <label for="texto2_contacto">Texto 2 contacto:</label>
                    <input type="text" class="form-control" name="texto2_contacto" value="" id="texto2_contacto" placeholder="Introduzca el Texto2 de contacto">
                </div>
                <div class="form-group">
                    <label for="texto1_nosotros">Texto1 Nosotros:</label>
                    <input type="text" class="form-control" name="texto1_nosotros" value="" id="texto1_nosotros" placeholder="Introduzca el Texto1 de nosotros">
                </div>
                <div class="form-group">
                    <label for="texto2_nosotros">Texto2 Nosotros:</label>
                    <input type="text" class="form-control" name="texto2_nosotros" value="" id="texto2_nosotros" placeholder="Introduzca el Texto2 de nosotros">
                </div>
                <div class="form-group">
                    <label for="texto1_servicios">Texto1 Servicios:</label>
                    <input type="text" class="form-control" name="texto1_servicios" value="" id="texto1_servicios" placeholder="Introduzca el Texto1 de servicios">
                </div>
                <div class="form-group">
                    <label for="texto2_servicios">Texto2 Servicios:</label>
                    <input type="text" class="form-control" name="texto2_servicios" value="" id="texto2_servicios" placeholder="Introduzca el Texto2 de servicios">
                </div>
              </div>

            @endif
              <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success btn-lg"><span class="fas fa-external-link-alt"></span>Guardar</button>
               </div>
              </form>

              @if ($header!=null)
                <form role="form" name="eliminar" id="eliminar"  method="POST" action="{{route('header.destroy',$header->id)}}">
                  @csrf
                  @method('delete')
              <div class="card-footer">
                   <button type="submit" class="btn btn-block btn-danger btn-lg eliminar"><span class=" fas fa-external-link-alt"></span>Eliminar</button>
              </div>
                 </form>
              @endif

        </div>

    </div>

</div>
@stop


@section('js')
  <script>

$(".eliminar").click(function(e){
        e.preventDefault();

        Swal.fire({
            title: "",
            text: "¿Está seguro que desea eliminar?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: "Sí",
            cancelButtonText: "No",
        })
        .then(resultado => {
            if (resultado.value) {
              eliminar.submit();
      //  this.submit();
            } else {
                Swal.fire({
            title: "Cancelado",
            text: "No será eliminado ...",
            icon: 'error',
        })
      }
        });

    })
    $(document).ready(function()
    {
        // Read flag from the controller.
        let shouldFire = @json($fireAlert);
        if (shouldFire) {
            Swal.fire('', 'Eliminado correctamente', 'success');
        }

    });


  </script>
@stop
