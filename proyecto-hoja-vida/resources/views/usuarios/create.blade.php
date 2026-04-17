@extends('layouts.app')

@section('content')
<h2>Nuevo Usuario</h2>
<form action="{{ route('usuarios.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row g-3">
        <div class="col-md-3">
            <label>Primer Nombre *</label>
            <input type="text" name="primer_nombre" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label>Segundo Nombre</label>
            <input type="text" name="segundo_nombre" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Primer Apellido *</label>
            <input type="text" name="primer_apellido" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label>Segundo Apellido</label>
            <input type="text" name="segundo_apellido" class="form-control">
        </div>
        <div class="col-md-3">
            <label>Tipo Documento *</label>
            <select name="tipo_documento" class="form-select" required>
                <option value="">Selecciona...</option>
                <option value="CC">Cédula de Ciudadanía</option>
                <option value="TI">Tarjeta de Identidad</option>
                <option value="CE">Cédula Extranjería</option>
                <option value="PA">Pasaporte</option>
            </select>
        </div>
        <div class="col-md-3">
            <label>Número Documento *</label>
            <input type="text" name="numero_documento" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label>Fecha Nacimiento *</label>
            <input type="date" name="fecha_nacimiento" class="form-control" required>
        </div>
        <div class="col-md-3">
            <label>Teléfono *</label>
            <input type="text" name="telefono" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>Correo *</label>
            <input type="email" name="correo" class="form-control" required>
        </div>
        <div class="col-md-4">
            <label>Foto de Perfil</label>
            <input type="file" name="foto_perfil" class="form-control" accept="image/*">
        </div>
        <div class="col-12">
            <label>Perfil Profesional</label>
            <textarea name="perfil_profesional" class="form-control" rows="3"
                      placeholder="Descripción profesional..."></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Cancelar</a>
        </div>
    </div>
</form>
@endsection
