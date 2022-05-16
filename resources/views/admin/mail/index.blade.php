@extends('adminlte::page')

@section('title', 'Email')

@section('content_header')
    <h1>{{ __("Email") }}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">{{ __("Email to send") }}</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"method="POST" action="{{route('mail.update','1')}}" enctype="multipart/form-data">
                @csrf
                @method('put')
              <div class="card-body">
                <div class="form-group">
                    <label for="mail">{{__("Email to send")}}:</label>
                    <input type="email"required value="{{$mail->mail}}" class="form-control" name="mail" id="mail" placeholder="{{__("Writte the new email")}}">
                </div>
              </div>
              <!-- /.card-body -->
              @if ($errors->has('mail'))
                    @section('plugins.Sweetalert2', true)
                    @push('js')
                    <script>
                                 Swal.fire({
                      title: "Error!",
                      text: "{{ __('Fill in all the fields') }}",
                      icon: 'error',
                        })
                    </script>
                    @endpush
                    @endif
              <div class="card-footer">
                <button type="submit" class="btn btn-block btn-primary btn-lg"><span class=" fas fa-external-link-alt"></span> {{ __("Submit") }}</button>
              </div>
            </form>
        </div>
        <div class="col-sm-12">
            <table id="table"  class="table table-striped table-responsive-sm" style="width:100%" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">ID</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ __("Nombre")}}</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ __("Email") }}</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ __("Asunto") }}</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ __("Mensaje") }}</th>
                <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">{{ __("Eliminar") }}</th></tr>
            </thead>
            <tbody>
                @foreach ($contacts as $item )
                <tr role="row" class="odd">
                    <td class="" tabindex="0">{{$item->id}}</td>
                    <td style="position: relative;">{{$item->name}}</td>
                    <td class="" tabindex="0">{{$item->email}}</td>
                    <td class="" tabindex="0">{{$item->subject}}</td>
                    <td class="" tabindex="0">{{$item->message}}</td>
                    <td class="sorting_1">
                        <form role="form"class="eliminar" method="POST" action="{{route('mail.destroy',$item->id)}}">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-block btn-danger btn-lg"><span class="fas fa-times-circle"></span>{{__("Eliminar")}}</button>
                        </form>
                    </td>
                  </tr>
                @endforeach
            </tbody>
            <tfoot>
            <tr>
                <th rowspan="1" colspan="1">ID</th>
                <th rowspan="1" colspan="1">{{__("Nombre")}}</th>
                <th rowspan="1" colspan="1">{{__("Email")}}</th>
                <th rowspan="1" colspan="1">{{__("Asunto")}}</th>
                <th rowspan="1" colspan="1">{{__("Mensaje")}}</th>
                <th rowspan="1" colspan="1">{{__("Eliminar")}}</th></tr>
            </tfoot>
          </table></div>
    </div>
</div>
@section('plugins.Sweetalert2', true)
@push('js')
<script>
$(".eliminar").click(function(e){
    e.preventDefault();
    Swal.fire({
        title: "Operación",
        text: "Eliminar?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: "Sí, eliminar",
        cancelButtonText: "Cancelar",
    })
    .then(resultado => {
        if (resultado.value) {
            Swal.fire({
        title: "Aceptado!",
        text: "{{ __('Se eliminará en breve')}}!",
        icon: 'success',
    })
    this.submit();
        } else {
            Swal.fire({
        title: "{{ __('Cancelado')}}!",
        text: "{{ __('No se elimanará')}}!",
        icon: 'error',
    })
  }
    });
})
$(document).ready(function()
    {
        // Read flag from the controller.
        let shouldFire = @json($fireAlert);
//if(shouldFire=="nulo"){
//}else{
   //// if (shouldFire) {
//Swal.fire('{{ __('Operation')}}', '{{ __('Successfully')}}!', 'success');
    //    }else{
      //      Swal.fire('{{__('Operation performed')}}', '{{ __('Image not found')}}!', 'warning');
      //  }
//}
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
@if (app()->getLocale()=="en")
<script> $('document').ready(function(){
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
}); </script>
            @else
            <script> $('document').ready(function(){
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
            }); </script>
            @endif

<script>
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
     </script>

@stop