@extends('adminlte::page')

@section('title', 'Encabezado')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Encabezado Crecimiento</h1>
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


            @if ($encabezado==null)
               <form role="form" method="POST" action="{{route('encabezado_crecimiento.store')}}">
                  @csrf
            @else
               <form role="form" method="POST" action="{{route('encabezado_crecimiento.update',$encabezado->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($encabezado!=null)
              <div class="card-body">
                <div class="form-group">
                    <label for="texto1">Texto1:</label>
                    <input type="text" class="form-control" name="texto1" value="{{$encabezado->texto1}}" id="texto1" placeholder="Introduzca texto1">
                </div>
                <div class="form-group">
                    <label for="texto2">Texto2:</label>
                    <input type="text" class="form-control" name="texto2" value="{{$encabezado->texto2}}" id="texto2" placeholder="Introduzca texto2">
                </div>
                <div class="form-group">
                    <label for="texto3">Texto3:</label>
                    <input type="text" class="form-control" name="texto3" value="{{$encabezado->texto3}}" id="texto3" placeholder="Introduzca texto3">
                </div>
                <div class="form-group">
                    <label for="texto4">Texto4:</label>
                    <input type="text" class="form-control" name="texto4" value="{{$encabezado->texto4}}" id="texto4" placeholder="Introduzca texto4">
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

              @if ($encabezado!=null)
                <form role="form" name="eliminar" id="eliminar"  method="POST" action="{{route('encabezado_crecimiento.destroy',$encabezado->id)}}">
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
