@extends('layouts.app')
@section('content')
<div class="container p-3 mb-2 bg-dark text-white">

<form action="{{url('/empleado/'.$empleado->id)}}" method="post" enctype="multipart/form-data">
    
@csrf
{{method_field('PATCH')}}
@include('empleado.form',['modo'=>'Modificar'])
</form>

</div>
@endsection