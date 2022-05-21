<h1> {{$modo}} tipo </h1>

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
<label for="Nombres">Nombres</label>
<input type="text" class="form-control" name="Nombres" value="{{ isset($tipo->Nombres)?$tipo->Nombres:old('Nombres')}}" id="Nombres">
</div>
<br>
<input class="btn btn-warning" type="submit" value="{{$modo}} datos">

<a class="btn btn-success" href="{{url('tipo/')}}">
    Volver a inicio
</a>