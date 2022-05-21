@extends('layouts.app')
@section('content')
<div class="container bg-dark text-white">

<form action="{{ url('/empleado') }}" method="post" enctype="multipart/form-data">
@csrf 
@include('empleado.form',['modo'=>'Crear'])
</form>

</div>
@endsection