@extends('layouts.app')

@section('content')

<div class="container">
<a  href="{{url('empleado/create')}}" class="btn btn-success">Crear nuevo empleado</a>
<br>
@if (Session::has('mensaje'))
<p>{{ Session::get('mensaje') }}</p>

@endif
<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Direccion</th>
            <th>Telefono</th>
            <th>Foto</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <tbody>
            @foreach ($empleados as $empleado)
            <tr>
                <td>{{ $empleado->id }}</td>
                <td>{{ $empleado->nombre_ep }}</td>
                <td>{{ $empleado->apellido_ep }}</td>
                <td>{{ $empleado->email_ep }}</td>
                <td>{{ $empleado->direccion_ep }}</td>
                <td>{{ $empleado->telefono_ep }}</td>
                <td><img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleado->Foto }}" width="80px"></td>
                <td>
                    <a href="{{url('/empleado/' . $empleado->id . '/edit')}}" class="btn btn-warning">Editar</a>
                    |
                    <form class="d-inline" action="{{ url('/empleado/'. $empleado->id) }}" method="POST">
                        @csrf
                        {{ method_field('DELETE')}}
                        <input class="btn btn-danger" type="submit" value="Borrar" onclick="return confirm('Estas seguro que lo quieres eliminar?')">
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
</div>
@endsection
