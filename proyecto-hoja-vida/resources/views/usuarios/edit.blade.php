@extends('layouts.app')

@section('content')
<h2>Editar Perfil</h2>
<form action="{{ route('usuarios.update', $usuario->id_usuario) }}" method="POST" enctype="multipart/form-data">
    @csrf @method('PUT')
    <div class="row g-3">
        <div class="col-md-3">
            <label>Primer Nombre</label>
            <input type="text" name="primer_nombre" class="form-control" value="{{ $usuario->primer_nombre }}" required>
        </div>
        <div class="col-md-3">
            <label>Segundo Nombre</label>
            <input type="text" name="segundo_nombre" class="form-control" value="{{ $usuario->segundo_nombre }}">
        </div>
        <div class="col-md-3">
            <label>Primer Apellido</label>
            <input type="text" name="primer_apellido" class="form-control" value="{{ $usuario->primer_apellido }}" required>
        </div>
        <div class="col-md-3">
            <label>Segundo Apellido</label>
            <input type="text" name="segundo_apellido" class="form-control" value="{{ $usuario->segundo_apellido }}">
        </div>
        <div class="col-md-3">
            <label>Teléfono</label>
            <input type="text" name="telefono" class="form-control" value="{{ $usuario->telefono }}">
        </div>
        <div class="col-md-4">
            <label>Correo</label>
            <input type="email" name="correo" class="form-control" value="{{ $usuario->correo }}">
        </div>
        <div class="col-md-4">
            <label>Nueva Foto de Perfil</label>
            <input type="file" name="foto_perfil" class="form-control" accept="image/*">
        </div>
        <div class="col-12">
            <label>Perfil Profesional</label>
            <textarea name="perfil_profesional" class="form-control" rows="3">{{ $usuario->perfil_profesional }}</textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Actualizar</button>
            <a href="{{ route('usuarios.show', $usuario->id_usuario) }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>
@endsection
