@extends('adminlte::page')

@section('title', 'Carrusel')
<link rel="stylesheet" href="{{ asset('/css/owl.css') }}"/>
@section('plugins.Sweetalert2',true)


@section('content_header')
    <h1>Carrusel</h1>
@stop


@section('content')

<div class="row">
    <div class="col-lg-6">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Texto Carrusel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->


            @if ($carrusel==null)
               <form role="form"method="POST" action="{{route('new_carrusel.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('new_carrusel.update',$carrusel->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($carrusel!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="texto1">Texto 1:</label>
                    <input type="text" value="{{$carrusel->texto1}}" class="form-control" name="texto1" id="texto1" placeholder="Introduza texto1">
                </div>
                <div class="form-group">
                  <label for="texto2">Texto 2:</label>
                  <input type="text" class="form-control" value="{{$carrusel->texto2}}" name="texto2" id="texto2" placeholder="Introduza texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto 3:</label>
                    <input type="text" class="form-control" value="{{$carrusel->texto3}}" name="texto3" id="texto3" placeholder="Introduza texto3">
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                  <label for="texto1">Texto 1:</label>
                    <input type="text" value="" class="form-control" name="texto1" id="texto1" placeholder="Introduza texto1">
                </div>
                <div class="form-group">
                  <label for="texto2">Texto 2:</label>
                  <input type="text" class="form-control" value="" name="texto2" id="texto2" placeholder="Introduza texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto 3:</label>
                    <input type="text" class="form-control" value="" name="texto3" id="texto3" placeholder="Introduza texto3">
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

    @if ($carrusel!=null)
    <div class="col-lg-6" >
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Imagen Carrusel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"method="POST" action="{{route('new_carrusel.update',$carrusel->id)}}" enctype="multipart/form-data">
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
                        <img src="{{asset("images/carrusel/$carrusel->imagen")}}" id="pre" class="imagencita mt-3" alt="">
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



<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Editar Carrusel</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->

        <div class="col-sm-12"><table id="table" class="table table-striped table-responsive-xl" style="width:100%" role="grid" aria-describedby="example2_info">
            <thead>
                <tr role="row">
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ID</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto1</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto2</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Texto3</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">Imagen</th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                  <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending"></th>
                </tr>
            </thead>
            <tbody>

                @foreach ($carrusel1 as $item )
                <tr role="row" class="odd">
                    <td class="" tabindex="0">{{$item->id}}</td>
                    <td>{{$item->texto1}}</td>
                    <td>{{$item->texto2}}</td>
                    <td>{{$item->texto3}}</td>
                    <td><img src="{{asset("images/carrusel/$item->imagen")}}" id="pre" class="imagencita1 mt-1 mb-1" alt=""></td>
                    <td class="sorting_1">
                        <form role="form" method="GET" action="{{route('new_carrusel.show',$item->id)}}">
                        @csrf
                        <button type="submit" class="btn btn-block btn-success btn-sm"><span class="fas fa-edit"></span>Editar</button>
                        </form>
                    </td>
                    <td class="sorting_1">
                        <form role="form" class="eliminar" method="POST" action="{{route('new_carrusel.destroy',$item->id)}}">
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

