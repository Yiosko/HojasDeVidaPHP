@extends('layouts.app')

@section('content')
<h2>Usuarios registrados</h2>
<table class="table table-bordered table-hover mt-3">
    <thead class="table-dark">
        <tr>
            <th>#</th><th>Nombre</th><th>Documento</th><th>Correo</th><th>Teléfono</th><th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @forelse($usuarios as $u)
        <tr>
            <td>{{ $u->id_usuario }}</td>
            <td>{{ $u->primer_nombre }} {{ $u->primer_apellido }}</td>
            <td>{{ $u->numero_documento }}</td>
            <td>{{ $u->correo }}</td>
            <td>{{ $u->telefono }}</td>
            <td>
                <a href="{{ route('usuarios.show', $u->id_usuario) }}" class="btn btn-info btn-sm">Ver</a>
                <a href="{{ route('usuarios.edit', $u->id_usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                <form action="{{ route('usuarios.destroy', $u->id_usuario) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('¿Eliminar usuario?')">
                    @csrf @method('DELETE')
                    <button class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @empty
        <tr><td colspan="6" class="text-center">No hay usuarios registrados</td></tr>
        @endforelse
    </tbody>
</table>
@endsection
