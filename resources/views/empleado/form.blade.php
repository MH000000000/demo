<br>
<h1> {{$modo}} empleado </h1>
@if(count($errors)>0)
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                 <li>
                    {{ $error }}
                 </li>
            @endforeach

        </ul>
    </div>
@endif

<div class="form-group">
<label for="Nombre">Nombres</label>
<input type="text" class="form-control" name="Nombres" value="{{ isset($empleado->Nombres)?$empleado->Nombres:old('Nombres')}}" id="Nombres">
</div>

<div class="form-group">
<label for="ApellidoPaterno">Apellido Paterno</label>
<input type="text" class="form-control" name="ApellidoPaterno" value="{{ isset($empleado->ApellidoPaterno)?$empleado->ApellidoPaterno:old('ApellidoPaterno')}}" id="ApellidoPaterno">
</div>

<div class="form-group">
<label for="ApellidoMaterno">Apellido Materno</label>
<input type="text" class="form-control" name="ApellidoMaterno" value="{{ isset($empleado->ApellidoMaterno)?$empleado->ApellidoMaterno:old('ApellidoMaterno')}}" id="ApellidoMaterno">
</div>

<div class="form-group">
<label for="Imagen"></label>
@if(isset($empleado->Imagen))
<img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Imagen}}" width="100" alt="">
@endif
<input class="form-control" type="file" name="Imagen" value="" id="Imagen">
</div>

<div class="form-group">
    {{  Form::label('tipo_id')  }}  
    {{  Form::select('tipo_id', $tipos, $empleado->tipo_id, ['class' => 'form-control' . ($errors->has('tipo_id')? 'is-invalid':''),'placeholder'=>'Tipo id']) }}   
    {!!  $errors->first('tipo_id',  '<div class="invalid-feedback">:message</p>')  !!} 
</div>

<br>
<input class="btn btn-warning" type="submit" value="{{$modo}} datos">

<a class="btn btn-success" href="{{url('empleado/')}}">
    Volver a inicio
</a>

<br>
<br>
