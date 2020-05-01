@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">Usuarios</div>

                <div class="card-body">
                    <table class="table table-hover">
                    <thead>   
                        <tr>
                            <th>Nombre</th>
                            <th>E-mail</th>
                            <th>Roles</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach ($usuarios as $usuario)
                            <tr>
                                <td>{{$usuario->name}}</td>
                                <td>{{$usuario->email}}</td>
                                <td>
                                    {{implode(',',$usuario->roles()->get()->pluck('nombre')->toArray())}}
                                </td>
                                <td>
                                    <a href="{{route('users.edit', $usuario->id)}}" class="btn btn-link float-left"><span class="oi oi-pencil"></span></a>
                                    <form action="{{route('users.destroy', $usuario)}} " method="post" class="float-left">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"  onclick="return confirm('¿Desea eliminar este Usuario?')" class="btn btn-link"><span class="oi oi-trash"></span></button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
