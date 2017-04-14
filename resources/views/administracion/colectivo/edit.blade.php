@extends ('layouts.admin')
<?php
use Illuminate\Support\Facades\Redirect;
?>

@section ('contenido')
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-sx-12">
            <h3>Editar colectivo: {{ $colectivo->idColectivos}} </h3>
            @if (count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $err)
                        <li>{{$err}}</li>
                    @endforeach
                </ul>

            </div>
            @endif
            
            {!!Form::model($colectivo,['method'=>'PATCH','route'=>['administracion.colectivo.update',$colectivo->idColectivos]])!!}
            
           {{Form::token()}}
             <div class="form-group">
                <label for="marca">Marca</label>
                <input class="form-control" name="marca" id="marca" value="{{$colectivo->marca}}" placeholder="Marca ...">   
            </div>
            <div class="form-group">
                <label for="modelo">Modelo</label>
                <input class="form-control" name="modelo" id="modelo" value="{{$colectivo->modelo}}" placeholder="Modelo ...">   
            </div>
            <div class="form-group">
                <label for="matricula">Matricula</label>
                <input class="form-control" name="matricula" id="matricula" value="{{$colectivo->matricula}}" data-default="20:48" placeholder="Matricula ...">
            </div>
            
            <div class="form-group">
                <button class = "btn btn-primary" type="submit"> Guardar</button>
                <button class = "btn btn-danger" type="reset"> Cancelar</button>                
                
                
            </div>
            
            {!!Form::close()!!}
            
        </div>
    </div>

@endsection