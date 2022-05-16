@extends('adminlte::page')

@section('title', 'Password')

@section('content_header')
    <h1>{{__("Password's form")}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{__("Change the password")}}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"method="POST" action="{{route('pass.update',"1")}}">
                @csrf
                @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="sub">{{__("New password")}}:</label>
                  <input type="password" value="" class="form-control" name="password" id="password" placeholder="{{__("Writte the new password")}}">
                </div>
                               <!-- Error -->
                @if ($errors->has('pass'))
                @section('plugins.Sweetalert2', true)
                @push('js')
                <script>
                            Swal.fire({
                        title: "Error!",
                        text: "verifique que los campos sean iguales y que presenten más de 8 caracteres",
                        icon: 'error',
                    })
                </script>
                @endpush
                @endif
                <div class="form-group">
                      <label for="pass">{{__("Validate the password")}}:</label>
                      <input type="password" class="form-control" value="" name="pass" id="pass" placeholder="{{__("Validate the new password")}}">
                </div>
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-success btn-lg"><span class=" fas fa-external-link-alt"></span>{{__("Submit")}}</button>
              </div>
            </form>
        </div>
    </div>
</div>
@section('plugins.Sweetalert2', true)
@push('js')
<script>
$(document).ready(function()
    {
        // Read flag from the controller.
        let shouldFire = @json($fireAlert);
if(shouldFire=="nulo"){
}else{
    if (shouldFire) {
            Swal.fire('{{ __('Operation')}}', '{{ __('Satisfactoria')}}!', 'success');
        }else{
            Swal.fire('Error!', '{{ __('passwords do not match')}}', 'warning');
        }
}
    });
</script>
@endpush
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <!-- Font Awesome -->
<link rel="stylesheet" href="vendor/fontawesome-free/css/all.min.css">
@stop

@section('js')
    <script> $('document').ready(function(){
        $('#table').DataTable();
        // Obtener referencia al input y a la imagen
    const $seleccionArchivos = document.querySelector("#img"),
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