@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Hoja de Vida — {{ $usuario->primer_nombre }} {{ $usuario->primer_apellido }}</h2>
    <a href="{{ route('usuarios.edit', $usuario->id_usuario) }}" class="btn btn-warning">Editar Perfil</a>
</div>

{{-- DATOS PERSONALES --}}
<div class="card mb-4">
    <div class="card-header bg-dark text-white">Datos Personales</div>
    <div class="card-body row">
        @if($usuario->foto_perfil)
            <div class="col-md-2">
                <img src="{{ asset('storage/' . $usuario->foto_perfil) }}" class="img-fluid rounded">
            </div>
        @endif
        <div class="col">
            <p><strong>Nombre:</strong> {{ $usuario->primer_nombre }} {{ $usuario->segundo_nombre }} {{ $usuario->primer_apellido }} {{ $usuario->segundo_apellido }}</p>
            <p><strong>Documento:</strong> {{ $usuario->tipo_documento }} - {{ $usuario->numero_documento }}</p>
            <p><strong>Nacimiento:</strong> {{ $usuario->fecha_nacimiento }}</p>
            <p><strong>Teléfono:</strong> {{ $usuario->telefono }} | <strong>Correo:</strong> {{ $usuario->correo }}</p>
            <p><strong>Perfil:</strong> {{ $usuario->perfil_profesional }}</p>
        </div>
    </div>
</div>

{{-- EDUCACIÓN --}}
<div class="card mb-4">
    <div class="card-header bg-primary text-white d-flex justify-content-between">
        <span>Educación</span>
        <button class="btn btn-sm btn-light" data-bs-toggle="collapse" data-bs-target="#formEdu">+ Agregar</button>
    </div>
    <div class="collapse p-3 bg-light" id="formEdu">
        <form action="{{ route('educacion.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">
            <div class="row g-2">
                <div class="col-md-3"><select name="nivel" class="form-select" required>
                    <option value="">Nivel</option>
                    <option>Bachiller</option><option>Técnico</option><option>Tecnólogo</option>
                    <option>Universitario</option><option>Especialización</option><option>Maestría</option><option>Doctorado</option>
                </select></div>
                <div class="col-md-3"><input type="text" name="institucion" class="form-control" placeholder="Institución" required></div>
                <div class="col-md-3"><input type="text" name="titulo" class="form-control" placeholder="Título"></div>
                <div class="col-md-3"><input type="text" name="area_estudio" class="form-control" placeholder="Área de estudio"></div>
                <div class="col-md-3"><input type="date" name="fecha_inicio" class="form-control"></div>
                <div class="col-md-3"><input type="date" name="fecha_fin" class="form-control"></div>
                <div class="col-md-3"><select name="estado" class="form-select">
                    <option>En curso</option><option>Finalizado</option>
                </select></div>
                <div class="col-md-3"><button class="btn btn-primary w-100">Guardar</button></div>
            </div>
        </form>
    </div>
    <div class="card-body">
        @forelse($usuario->educaciones as $edu)
        <div class="d-flex justify-content-between border-bottom py-2">
            <div>
                <strong>{{ $edu->nivel }}</strong> — {{ $edu->titulo ?? 'Sin título' }} <br>
                <small>{{ $edu->institucion }} | {{ $edu->fecha_inicio }} → {{ $edu->fecha_fin ?? 'En curso' }} | {{ $edu->estado }}</small>
            </div>
            <form action="{{ route('educacion.destroy', $edu->id_educacion) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">✕</button>
            </form>
        </div>
        @empty
        <p class="text-muted">Sin educación registrada</p>
        @endforelse
    </div>
</div>

{{-- EXPERIENCIA LABORAL --}}
<div class="card mb-4">
    <div class="card-header bg-success text-white d-flex justify-content-between">
        <span>Experiencia Laboral</span>
        <button class="btn btn-sm btn-light" data-bs-toggle="collapse" data-bs-target="#formExp">+ Agregar</button>
    </div>
    <div class="collapse p-3 bg-light" id="formExp">
        <form action="{{ route('experiencia.store') }}" method="POST">
            @csrf
            <input type="hidden" name="id_usuario" value="{{ $usuario->id_usuario }}">
            <div class="row g-2">
                <div class="col-md-3"><input type="text" name="empresa" class="form-control" placeholder="Empresa" required></div>
                <div class="col-md-3"><input type="text" name="cargo" class="form-control" placeholder="Cargo" required></div>
                <div class="col-md-3"><input type="text" name="area" class="form-control" placeholder="Área"></div>
                <div class="col-md-3">
                    <div class="form-check mt-2">
                        <input type="checkbox" name="actualmente_trabaja" class="form-check-input" id="actTrabaja">
                        <label class="form-check-label" for="actTrabaja">Trabajo actual</label>
                    </div>
                </div>
                <div class="col-md-3"><input type="date" name="fecha_inicio" class="form-control"></div>
                <div class="col-md-3"><input type="date" name="fecha_fin" class="form-control"></div>
                <div class="col-md-6"><textarea name="descripcion_funciones" class="form-control" placeholder="Descripción de funciones" rows="2"></textarea></div>
                <div class="col-md-6"><textarea name="logros" class="form-control" placeholder="Logros" rows="2"></textarea></div>
                <div class="col-12"><button class="btn btn-success">Guardar</button></div>
            </div>
        </form>
    </div>
    <div class="card-body">
        @forelse($usuario->experiencias as $exp)
        <div class="d-flex justify-content-between border-bottom py-2">
            <div>
                <strong>{{ $exp->cargo }}</strong> en {{ $exp->empresa }} ({{ $exp->area }}) <br>
                <small>{{ $exp->fecha_inicio }} → {{ $exp->actualmente_trabaja ? 'Actualidad' : $exp->fecha_fin }}</small><br>
                <small>{{ $exp->descripcion_funciones }}</small>
            </div>
            <form action="{{ route('experiencia.destroy', $exp->id_experiencia) }}" method="POST">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-outline-danger">✕</button>
            </form>
        </div>
        @empty
        <p class="text-muted">Sin experiencia registrada</p>
        @endforelse
    </div>
</div>

{{-- HABILIDADES --}}
<div class="card mb-4">
    <div class="card-header bg-warning">Habilidades</div>
    <div class="card-body">
        @forelse($usuario->habilidades as $h)
            <span class="badge bg-secondary me-1">{{ $h->nombre_habilidad }} ({{ $h->pivot->nivel }})</span>
        @empty
            <p class="text-muted">Sin habilidades</p>
        @endforelse
    </div>
</div>

{{-- IDIOMAS --}}
<div class="card mb-4">
    <div class="card-header bg-info text-white">Idiomas</div>
    <div class="card-body">
        @forelse($usuario->idiomas as $i)
            <p><strong>{{ $i->nombre_idioma }}:</strong>
               Lectura: {{ $i->pivot->nivel_lectura }} |
               Escritura: {{ $i->pivot->nivel_escritura }} |
               Conversación: {{ $i->pivot->nivel_conversacion }}
            </p>
        @empty
            <p class="text-muted">Sin idiomas</p>
        @endforelse
    </div>
</div>

{{-- CERTIFICACIONES --}}
<div class="card mb-4">
    <div class="card-header bg-secondary text-white">Certificaciones</div>
    <div class="card-body">
        @forelse($usuario->certificaciones as $c)
            <p><strong>{{ $c->nombre_certificacion }}</strong> — {{ $c->institucion }} ({{ $c->fecha_obtencion }})</p>
        @empty
            <p class="text-muted">Sin certificaciones</p>
        @endforelse
    </div>
</div>

{{-- REFERENCIAS --}}
<div class="card mb-4">
    <div class="card-header bg-dark text-white">Referencias</div>
    <div class="card-body">
        @forelse($usuario->referencias as $r)
            <p><strong>{{ $r->nombre_referente }}</strong> — {{ $r->cargo }} en {{ $r->empresa }} | {{ $r->telefono }} | {{ $r->tipo }}</p>
        @empty
            <p class="text-muted">Sin referencias</p>
        @endforelse
    </div>
</div>

<a href="{{ route('usuarios.index') }}" class="btn btn-secondary mb-4">← Volver</a>
@endsection
