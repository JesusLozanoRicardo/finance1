@extends('adminlte::page')

@section('title', 'Mapa')

@section('plugins.Sweetalert2',true)

@section('content_header')
    <h1>Mapa</h1>
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


            @if ($mapa==null)
               <form role="form"method="POST" action="{{route('mapa.store')}}">
                  @csrf
            @else
               <form role="form"method="POST" action="{{route('mapa.update',$mapa->id)}}">
                  @csrf
                  @method('PUT')
            @endif
              <div class="card-b">
              <div class="card-body">
                <div class="form-group">
                  <label for="horario">Mapa:</label>
                   @if ($mapa!=null)
                   <input type="text" value="{{$mapa->mapa}}" class="form-control" name="mapa" id="mapa" placeholder="Introduzca el mapa">
                   @else
                   <input type="text" class="form-control" name="mapa" id="mapa" placeholder="Introduzca el mapa">
                   @endif

                </div>
              </div>

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



  </script>
@stop
