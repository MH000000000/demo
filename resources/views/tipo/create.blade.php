@extends('layouts.app')
@section('content')
<div class="container bg-dark text-white">

<form action="{{ url('/tipo') }}" method="post" enctype="multipart/form-data">
@csrf 
<br>
@include('tipo.form',['modo'=>'Crear'])
<br>
<br>

</form>

</div>
@endsection