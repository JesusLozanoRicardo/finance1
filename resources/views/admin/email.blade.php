@extends('adminlte::page')

@section('title', 'Email')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Email</h1>
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


            @if ($mail==null)
               <form role="form"method="POST" action="{{route('email.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('email.update',$mail->id)}}">
                  @csrf
                  @method('PUT')
            @endif

            @if ($mail!=null)
              <div class="card-body">
                <div class="form-group">
                  <label for="email">Email:</label>
                    <input type="email" value="{{$mail->mail}}" class="form-control" name="mail" id="mail" placeholder="Introduzca el email">
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                  <label for="horario">Email:</label>
                    <input type="email" value="" class="form-control" name="mail" id="mail" placeholder="Introduzca el email">
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
