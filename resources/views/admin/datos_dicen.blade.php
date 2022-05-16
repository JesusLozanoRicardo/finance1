@extends('adminlte::page')

@section('title', 'Datos')
<link rel="stylesheet" href="{{ asset('/css/owl.css') }}"/>
@section('plugins.Sweetalert2',true)


@section('content_header')
    <h1>Testimonio datos</h1>
@stop


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Datos dicen</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if ($datos_dicen==null)
               <form role="form"method="POST" action="{{route('datos_dicen.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('datos_dicen.update',$datos_dicen->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($datos_dicen!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="texto1">Texto 1:</label>
                    <input type="text" value="{{$datos_dicen->texto1}}" class="form-control" name="texto1" id="texto1" placeholder="Introduzca texto1">
                </div>
                <div class="form-group">
                  <label for="texto2">Texto 2:</label>
                  <input type="text" class="form-control" value="{{$datos_dicen->texto2}}" name="texto2" id="texto2" placeholder="Introduzca texto2">
                </div>
                <div class="form-group">
                  <label for="texto3">Texto 3:</label>
                  <input type="text" class="form-control" value="{{$datos_dicen->texto3}}" name="texto3" id="texto3" placeholder="Introduzca texto3">
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                  <label for="texto1">Texto 1:</label>
                    <input type="text" value="" class="form-control" name="texto1" id="texto1" placeholder="Introduzca texto1">
                </div>
                <div class="form-group">
                  <label for="texto2">Texto 2:</label>
                  <input type="text" class="form-control" value="" name="texto2" id="texto2" placeholder="Introduzca texto2">
                </div>
                <div class="form-group">
                  <label for="texto3">Texto 3:</label>
                  <input type="text" class="form-control" value="" name="texto3" id="texto3" placeholder="Introduzca texto3">
                </div>
              </div>
            @endif
              <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success btn-lg"><span class="fas fa-external-link-alt"></span>Guardar</button>
               </div>
              </form>

        </div>

    </div>


</div>



<div class="row">
    <div class="col-sm-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar datos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

        <div class="col-sm-12"><table id="table" class="table table-striped table-responsive-sm" style="width:100%" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto 1</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto 2</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto 3</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($datos_dicen1 as $item )
                <tr role="row" class="odd">
                    <td class="" tabindex="0">{{$item->id}}</td>
                    <td>{{$item->texto1}}</td>
                    <td>{{$item->texto2}}</td>
                    <td>{{$item->texto3}}</td>
                    <td class="sorting_1">
                        <form role="form" method="GET" action="{{route('datos_dicen.show',$item->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-block btn-success btn-sm"><span class="fas fa-edit"></span>Editar</button>
                        </form>
                    </td>
                    <td class="sorting_1">
                        <form role="form" class="eliminar" method="POST" action="{{route('datos_dicen.destroy',$item->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" id="eliminar" class="btn btn-block btn-danger btn-sm"><span class="fas fa-times-circle"></span>Eliminar</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>

          </table></div>
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
        this.submit();
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
    }); </script>
@stop

