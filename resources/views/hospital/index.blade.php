@extends('layouts.layout')

@section('content')
@include('hospital.modal')


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

    <div class="row justify-content-center">
        <div class="col-md-10">
            @if ($hospitals->isNotEmpty())
            <div class="card">
                <div class="card-header text-center">Hospital</div>

<div class="card-body">
<table class="table table-hover">

<thead class="thead-dark">
<tr>
    <th>Nombre</th>
    <th>Dirección</th>
    <th>Acciones</th>
</tr>
</thead>
{{-- <tbody id="tablaDatos"> --}}
<tbody>
    @foreach ($hospitals as $hospital)
        <tr>
            <td>{{$hospital->nombre}}</td>
            <td>{{$hospital->direccion}}</td>
            
            <td>
                <form action="{{route('hospital.destroy', $hospital->id)}}" method="post">
                <a href="{{route('hospital.show', $hospital->id)}}" class="btn btn-link"><span class="oi oi-eye"></span></a>
                <a href="{{route('hospital.edit', $hospital->id)}}" class="btn btn-link"><span class="oi oi-pencil"></span></a>
                <!-- Button trigger modal -->
                {{-- <button type="button" data-toggle="modal" data-target="#modalEditar" value="{{$hospital->id}}" onclick="mostrar(this)" class="btn btn-link"><span class="oi oi-pencil"></span></button> --}}
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
    <a href="{{route('hospital.create')}} "><button class="btn btn-primary">Registrar Hospital</button></a>        
</div>
</div>
</div>

{{-- <script>

function mostrar(btn){
console.log(btn.value);
var ruta = "hospital/" + btn.value + "/edit";

$.get(ruta, function(respuesta){
    console.log(respuesta[0]);
    $('#nombre').val(respuesta[0].nombre);
    $('#direccion').val(respuesta[0].direccion);
    $('#telefono').val(respuesta[0].telefono);
    $('#id').val(respuesta[0].id);
});
}

$('#actualizar').click(function(){

    var id = $('#id').val();
    var datos = $('#formulario').serialize();
    var ruta = 'hospital/' + id;

    $.ajax({
        data: datos,
        url: ruta,
        type: 'PUT',
        dataType: 'json',
        success: function(){
            alert('Datos Modificados');
            cargarDatos();
        }
    });
});
function cargarDatos(){
    var tabla = $('#tablaDatos');
    var ruta = 'hospitals';

    tabla.empty();

    $.get(ruta, function(respuesta){
        console.log(respuesta);
        respuesta[0].forEach(element => {
            tabla.append("<tr><td>" + element.nombre + "</td><td>" + element.direccion + "</td></tr>");
        });
    });

}
</script> --}}

@endsection