@extends('adminlte::page')

@section('title', 'Quienes')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Quienes Somos</h1>
@stop

@section('content')
<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
                <!--<h3 class="card-title">titulo card</h3>-->
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if ($quienes==null)
               <form role="form"method="POST" action="{{route('quienes.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('quienes.update',$quienes->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($quienes!=null)
              <div class="card-body">
                <div class="form-group">
                    <label for="texto1">Texto1:</label>
                    <input type="text" class="form-control" name="texto1" value="{{$quienes->texto1}}" id="texto1" placeholder="Introduzca texto1">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto2:</label>
                    <input type="text" class="form-control" name="texto2" value="{{$quienes->texto2}}" id="texto2" placeholder="Introduzca texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto3:</label>
                    <input type="text" class="form-control" name="texto3" value="{{$quienes->texto3}}" id="texto3" placeholder="Introduzca texto3">
                </div>
                <div class="form-group">
                    <label for="texto4">Texto4:</label>
                    <input type="text" class="form-control" name="texto4" value="{{$quienes->texto4}}" id="texto4" placeholder="Introduzca texto4">
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                    <label for="texto1">Texto1:</label>
                    <input type="text" class="form-control" name="texto1" value="" id="texto1" placeholder="Introduzca texto1">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto2:</label>
                    <input type="text" class="form-control" name="texto2" value="" id="texto2" placeholder="Introduzca texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto3:</label>
                    <input type="text" class="form-control" name="texto3" value="" id="texto3" placeholder="Introduzca texto3">
                </div>
                <div class="form-group">
                    <label for="texto4">Texto4:</label>
                    <input type="text" class="form-control" name="texto4" value="" id="texto4" placeholder="Introduzca texto4">
                </div>
              </div>
            @endif
              <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success btn-lg"><span class="fas fa-external-link-alt"></span>Guardar</button>
               </div>
              </form>

              @if ($quienes!=null)
                <form role="form" name="eliminar" id="eliminar"  method="POST" action="{{route('quienes.destroy',$quienes->id)}}">
                  @csrf
                  @method('delete')
              <div class="card-footer">
                   <button type="submit" class="btn btn-block btn-danger btn-lg eliminar"><span class=" fas fa-external-link-alt"></span>Eliminar</button>
              </div>
                 </form>
              @endif

        </div>

    </div>
    @if ($quienes!=null)
    <div class="col-lg-6" >
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Imagen quienes somos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"method="POST" action="{{route('quienes.update',$quienes->id)}}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="exampleInputFile">Imagen</label>
                  <div class="input-group">
                    <div class="custom-file">
                      <input type="file" accept="img/*" id="imagen" name="imagen" class="custom-file-input" >
                      <label class="custom-file-label" for="imagen">Encuentra imagen</label>
                    </div>
                    </div>
                    <div class="input-group">
                        <img src="{{asset("images/quienes/$quienes->imagen")}}" id="pre" class="imagencita mt-3" alt="">
                    </div>
                  </div>
                </div>
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
              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-success btn-lg"><span class=" fas fa-external-link-alt"></span>{{ __("Submit") }}</button>

              </div>
            </form>
        </div>
    </div>
    @endif
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
    });

  </script>
@stop
