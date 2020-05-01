@extends('layouts.layout')

@section('content')

@if ($consulta )

<div class="alert alert-primary">
<p>Los registros de la búsqueda <strong>{{$consulta}}</strong> son:</p>
</div>

@endif

@if($message = Session::get('exito'))

<div class="alert alert-success">
        <p>{{$message}}</p>
</div>

@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($medicos->isNotEmpty())
            <div class="card">
                <div class="card-header text-center">Medico</div>

<div class="card-body">
<table class="table table-hover">


<thead class="thead-dark">
<tr>
    
    <th>Nombre</th>
    <th>Nro Identificación</th>
    <th>Acciones</th>
</tr>
</thead>
<tbody>
    @foreach ($medicos as $medico)
        <tr>
        
            <td>{{$medico->nombre}}</td>
            <td>{{$medico->cedula}}</td>

            <td>
                <form action="{{route('medico.destroy', $medico->id)}}" method="post">
                <a href="{{route('medico.show', $medico->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                <a href="{{route('medico.edit', $medico->id)}} " class="btn btn-link"><span class="oi oi-pencil"></span></a>
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('¿Desea eliminar estos datos?')" class="btn btn-link"><span class="oi oi-trash"></span></button>
                </form>
             </td>
        </tr>
@endforeach
</tbody>
</table>
</div>
</div>
@else
    <p>No hay Datos Registrados.</p>
@endif
<br>
<div>
    <a href="{{route('medico.create')}} "><button class="btn btn-primary">Registrar Medico</button></a>
</div>
</div>
</div>
</div>
  
@endsection