@extends('adminlte::page')

@section('title', 'Servicio')
<link rel="stylesheet" href="{{ asset('/css/owl.css') }}"/>
@section('plugins.Sweetalert2',true)


@section('content_header')
    <h1>Carrusel</h1>
@stop


@section('content')

<div class="row">
    <div class="col-lg-6" >
    <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Servicios</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            @if ($carrusel_servicios==null)
            <form role="form" method="POST" action="{{route('carrusel_servicios.store')}}" enctype="multipart/form-data">
                @csrf
            @else
            <form role="form" method="POST" action="{{route('carrusel_servicios.update',$carrusel_servicios->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
            @endif
              <div class="card-body">
                <div class="form-group">
                    <label for="imagen"></label>
                    <div class="custom-file">
                        <input type="file" accept="image/*" id="imagen" name="imagen" class="custom-file-input" >
                        <label class="custom-file-label" for="imagen">{{ __("Find image") }}</label>
                      </div>
                    </div>
                <div class="input-group">
                    @if ($carrusel_servicios!=null)
                        <img src="{{asset("images/carrusel_servicios/$carrusel_servicios->imagen")}}" id="pre" class="img-fluid mb-2" alt="No hay imagen que mostrar">
                    @endif
                    @if ($errors->has('imagen'))
                    @section('plugins.Sweetalert2', true)
                    @push('js')
                    <script>
                                Swal.fire({
                            title: "Error!",
                            text: "{{ __('The file is too large or of an invalid type, convert the image to png, jpg, jpeg, gif, svg, or tiff, and verify that it does not exceed 5000 kb') }}",
                            icon: 'error',
                        })
                    </script>
                    @endpush
                    @endif

                </div>

              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg"><span class=" fas fa-external-link-alt"></span> {{ __("Submit") }}</button>
              </div>
            </form>
        </div>






    </div>

</div>


@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
     <!-- Font Awesome -->
<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
@stop



@section('js')

<script>

    $('document').ready(function(){
        // Obtener referencia al input y a la imagen
     $('#table').DataTable({
                "language": {
                    "lengthMenu": "Resultados por página _MENU_",
                    "zeroRecords": "No se encontraron resultados",
                    "info": "Mostrando página _PAGE_ de _PAGES_",
                    "infoEmpty": "No hay resultados",
                    "infoFiltered": "(filtrar la cantidad _MAX_ total de resultados)",
                    "search":"Buscar:",
                    "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                }
            } );
            $('div.dataTables_wrapper div.dataTables_filter input').css(
             {'width':'150px','display':'inline-block'}
          );
     $('div.dataTables_wrapper div.dataTables_filter input').css(
      {'width':'150px','display':'inline-block'}
     );

    const $seleccionArchivos = document.querySelector("#imagen"),
    $imagenPrevisualizacion = document.querySelector("#pre");

    // Escuchar cuando cambie
    $seleccionArchivos.addEventListener("change", () => {
    // Los archivos seleccionados, pueden ser muchos o uno
    const archivos = $seleccionArchivos.files;
    // Si no hay archivos salimos de la función y quitamos la imagen
    if (!archivos || !archivos.length) {
    $imagenPrevisualizacion.src = "";
    return;
    }
    // Ahora tomamos el primer archivo, el cual vamos a previsualizar
    const primerArchivo = archivos[0];
    // Lo convertimos a un objeto de tipo objectURL
    const objectURL = URL.createObjectURL(primerArchivo);
    // Y a la fuente de la imagen le ponemos el objectURL
    $imagenPrevisualizacion.src = objectURL;
    });
    }); </script>
@stop

