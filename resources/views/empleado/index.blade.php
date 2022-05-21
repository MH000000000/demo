@extends('layouts.app')
@section('content')
<div class="container p-3 mb-2 bg-dark text-white">

@if (Session::has('mensaje'))
    <div class="alert alert-primary" role="alert">
            {{Session::get('mensaje')}}   

            
    </div>
    
@endif

<a href="{{url('empleado/create')}}" class="btn btn-success">
Registrar nuevo empleado
</a>


<br>
<br>
<div class="bg-white">
<table class="table table-light ">
    <thead class="thead-dark">
        <tr>
            <th>N°</th>
            <th>Nombres</th>
            <th>Apellido Paterno</th>
            <th>Apellido Materno</th>
            <th>Imagen</th>
            <th>Tipos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($empleados as $empleado)
        <tr>
            <td>{{++$i}}</td>

            <td>{{$empleado->Nombres}}</td>
            <td>{{$empleado->ApellidoPaterno}}</td>
            <td>{{$empleado->ApellidoMaterno}}</td>
            <td>
                <img class="img-thumbnail img-fluid" src="{{ asset('storage').'/'.$empleado->Imagen}}" width="100" alt="">
                            
            </td>
            <td>
                {{$empleado->tipo->Nombres}}
            </td>
            <td>
                
                <a href="{{ url('/empleado/'.$empleado->id.'/edit') }}" class="btn btn-warning">                Editar    
                </a>

                |

                <form action="{{ url('/empleado/'.$empleado->id)}}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE') }}
                <input class="btn btn-danger" type="submit" onclick="return confirm('¿Seguro de borrar?')" value="Borrar">
                </form>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
</div>
{!!$empleados->links()!!}
</div>
@endsection