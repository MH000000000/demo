@extends('layouts.app')
@section('content')

<div class="container p-3 mb-2 bg-dark text-white">

@if (Session::has('mensaje'))
    <div class="alert alert-success alert-dismissible" role="alert">
            {{Session::get('mensaje')}}   
 
            
    </div>
@endif

<a href="{{url('tipo/create')}}" class="btn btn-success">
Registrar nuevo tipo
</a>


<br>
<br>

<table class="table table-light">
    <thead class="thead-dark">
        <tr>
            <th>N°</th>
            <th>Nombres</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($tipos as $tipo)
        <tr>
            <td>{{$tipo->id}}</td>
            <td>{{$tipo->Nombres}}</td>
           
            <td>
                
                <a href="{{ url('/tipo/'.$tipo->id.'/edit') }}" class="btn btn-warning">                Editar    
                </a>

                |

                <form action="{{ url('/tipo/'.$tipo->id)}}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro de borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{!!$tipos->links()!!}
</div>
@endsection