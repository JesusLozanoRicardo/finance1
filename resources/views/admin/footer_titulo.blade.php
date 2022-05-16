@extends('adminlte::page')

@section('title', 'Footer')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Footer Título</h1>
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


            @if ($footer_titulo==null)
               <form role="form"method="POST" action="{{route('footer_titulo.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('footer_titulo.update',$footer_titulo->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($footer_titulo!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="titulo">Titulo:</label>
                    <input type="text" value="{{$footer_titulo->titulo}}" class="form-control" name="titulo" id="titulo" placeholder="Introduzca título del footer">
                </div>
                <div class="form-group">
                  <label for="titulo1">Titulo1:</label>
                    <input type="text" value="{{$footer_titulo->titulo1}}" class="form-control" name="titulo1" id="titulo1" placeholder="Introduzca título1 del footer originalmente useful link">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción:</label>
                  <input type="text" class="form-control" value="{{$footer_titulo->descripcion}}" name="descripcion" id="descripcion" placeholder="Introduzca la descripción del footer">
                </div>
              </div>
              @else
              <div class="card-body">
              <div class="form-group">
                  <label for="titulo">Titulo:</label>
                    <input type="text" value="" class="form-control" name="titulo" id="titulo" placeholder="Introduzca título del footer">
                </div>
                <div class="form-group">
                  <label for="titulo1">Titulo 1:</label>
                    <input type="text" value="" class="form-control" name="titulo1" id="titulo1" placeholder="Introduzca título1 del footer originalmente Useful link">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción:</label>
                  <input type="text" class="form-control" value="" name="descripcion" id="descripcion" placeholder="Introduzca la descripción del footer">
                </div>
            </div>
            @endif
              <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success btn-lg"><span class="fas fa-external-link-alt"></span>Guardar</button>
               </div>
              </form>

              @if ($footer_titulo!=null)
                <form role="form" name="eliminar" id="eliminar"  method="POST" action="{{route('footer_titulo.destroy',$footer_titulo->id)}}">
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
