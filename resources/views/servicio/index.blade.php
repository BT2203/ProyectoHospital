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
            @if ($servicios->isNotEmpty())
            <div class="card">
                <div class="card-header text-center">Servicio</div>

<div class="card-body">
<table class="table table-hover">


<thead class="thead-dark">
<tr>
    <th>Fecha Servicio</th>
    <th>Hospital</th>
    <th>Acciones</th>
</tr>
</thead>
<tbody>
    @foreach ($servicios as $servicio)
        <tr>
     
            <td>{{$servicio->fecha}}</td>

            <td>

                {{$servicio->idHospital}}

            </td>

  
            <td>
                <form action="{{route('servicio.destroy', $servicio->id)}}" method="post">
                <a href="{{route('servicio.show', $servicio->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                <a href="{{route('servicio.edit', $servicio->id)}} " class="btn btn-link"><span class="oi oi-pencil"></span></a>
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
    <a href="{{route('servicio.create')}} "><button class="btn btn-primary">Nuevo Servicio</button></a>
</div>
</div>
</div>
</div>
  
@endsection