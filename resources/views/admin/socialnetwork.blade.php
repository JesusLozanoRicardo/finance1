@extends('adminlte::page')

@section('title', 'Social network')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Social network</h1>
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


            @if ($socialnetwork==null)
               <form role="form"method="POST" action="{{route('socialnetwork.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('socialnetwork.update',$socialnetwork->id)}}">
                  @csrf
                  @method('PUT')

            @endif

            @if ($socialnetwork!=null)
              <div class="card-body">
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input type="text" class="form-control" name="facebook" value="{{$socialnetwork->facebook}}" id="facebook" placeholder="Facebook">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter:</label>
                    <input type="text" class="form-control" name="twitter" value="{{$socialnetwork->twitter}}" id="twitter" placeholder="Twitter">
                </div>
                <div class="form-group">
                    <label for="be">Be:</label>
                    <input type="text" class="form-control" name="be" value="{{$socialnetwork->be}}" id="be" placeholder="Be">
                </div>
                <div class="form-group">
                    <label for="dribbble">Dribbble:</label>
                    <input type="text" class="form-control" name="dribbble" value="{{$socialnetwork->dribbble}}" id="dribbble" placeholder="dribbble">
                </div>
                <div class="form-group">
                    <label for="github">Github:</label>
                    <input type="text" class="form-control" name="github" value="{{$socialnetwork->github}}" id="github" placeholder="github">
                </div>
              </div>
              @else
              <div class="card-body">
                <div class="form-group">
                    <label for="facebook">Facebook:</label>
                    <input type="text" class="form-control" name="facebook" value="" id="facebook" placeholder="Facebook">
                </div>
                <div class="form-group">
                    <label for="twitter">Twitter:</label>
                    <input type="text" class="form-control" name="twitter" value="" id="twitter" placeholder="Twitter">
                </div>
                <div class="form-group">
                    <label for="be">Be:</label>
                    <input type="text" class="form-control" name="be" value="" id="be" placeholder="Be">
                </div>
                <div class="form-group">
                    <label for="dribbble">Dribbble:</label>
                    <input type="text" class="form-control" name="dribbble" value="" id="dribbble" placeholder="dribbble">
                </div>
                <div class="form-group">
                    <label for="github">Github:</label>
                    <input type="text" class="form-control" name="github" value="" id="github" placeholder="github">
                </div>
              </div>

            @endif
              <!-- /.card-body -->

               <div class="card-footer">
                  <button type="submit" class="btn btn-block btn-success btn-lg"><span class="fas fa-external-link-alt"></span>Guardar</button>
               </div>
              </form>

              @if ($socialnetwork!=null)
                <form role="form" name="eliminar" id="eliminar"  method="POST" action="{{route('socialnetwork.destroy',$socialnetwork->id)}}">
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
