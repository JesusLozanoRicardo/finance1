@extends('adminlte::page')

@section('title', 'Datos')
<link rel="stylesheet" href="{{ asset('/css/owl.css') }}"/>
@section('plugins.Sweetalert2',true)


@section('content_header')
    <h1>Footer link útiles</h1>
@stop


@section('content')

<div class="row">
    <div class="col-lg-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Footer link útiles</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if ($footer_utiles==null)
               <form role="form"method="POST" action="{{route('footer_utiles.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('footer_utiles.update',$footer_utiles->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($footer_utiles!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="nombre">Nombre:</label>
                    <input type="text" value="{{$footer_utiles->nombre}}" class="form-control" name="nombre" id="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                  <label for="link">Link:</label>
                  <input type="text" class="form-control" value="{{$footer_utiles->link}}" name="link" id="link" placeholder="link">
                </div>
              </div>
              @else
              <div class="card-body">
              <div class="form-group">
                  <label for="nombre">Nombre:</label>
                    <input type="text" value="" class="form-control" name="nombre" id="nombre" placeholder="nombre">
                </div>
                <div class="form-group">
                  <label for="link">Link:</label>
                  <input type="text" class="form-control" value="" name="link" id="link" placeholder="link">
                </div>              </div>
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
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar datos</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

        <div class="col-sm-12"><table id="table" class="table table-striped table-responsive-xl" style="width:100%" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Nombre</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Link</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($footer_utiles1 as $item )
                <tr role="row" class="odd">
                    <td class="" tabindex="0">{{$item->id}}</td>
                    <td>{{$item->nombre}}</td>
                    <td>{{$item->link}}</td>
                    <td class="sorting_1">
                        <form role="form" method="GET" action="{{route('footer_utiles.show',$item->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-block btn-success btn-sm"><span class="fas fa-edit"></span>Editar</button>
                        </form>
                    </td>
                    <td class="sorting_1">
                        <form role="form" class="eliminar" method="POST" action="{{route('footer_utiles.destroy',$item->id)}}">
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



   function nuevo(){
     window.open("/admin/footer_utiles","_self");
   }


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

