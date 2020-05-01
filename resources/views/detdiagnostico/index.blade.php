@extends('layouts.layout')

@section('content')

@if($message = Session::get('exito'))

<div class="alert alert-success">
        <p>{{$message}}</p>
</div>

@endif

<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($detdiagnosticos->isNotEmpty())
            <div class="card">
                <div class="card-header text-center">Diagnostico</div>

<div class="card-body">
<table class="table table-hover">


<thead class="thead-dark">
<tr>
    <th>Fecha Diagnostico</th>
    <th>Paciente</th>
    <th>Acciones</th>
</tr>
</thead>
<tbody>
    @foreach ($detdiagnosticos as $detdiagnostico)
        <tr>
           
            <td>{{$detdiagnostico->fecha}}</td>

            <td>

                {{$detdiagnostico->idPaciente}}
                
            </td>
  
            <td>
                <form action="{{route('detdiagnostico.destroy', $detdiagnostico->id)}}" method="post">
                <a href="{{route('detdiagnostico.show', $detdiagnostico->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                <a href="{{route('detdiagnostico.edit', $detdiagnostico->id)}} " class="btn btn-link"><span class="oi oi-pencil"></span></a>
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
    <a href="{{route('detdiagnostico.create')}} "><button class="btn btn-primary">Nuevo Detalle</button></a>
</div>
</div>
</div>
</div>
  
@endsection