<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'usuario';
    protected $primaryKey = 'id_usuario';
    public $timestamps = false;

    protected $fillable = [
        'primer_nombre', 'segundo_nombre', 'primer_apellido', 'segundo_apellido',
        'tipo_documento', 'numero_documento', 'fecha_nacimiento',
        'telefono', 'correo', 'fecha_registro', 'foto_perfil', 'perfil_profesional'
    ];

    public function educaciones()
    {
        return $this->hasMany(Educacion::class, 'id_usuario');
    }

    public function experiencias()
    {
        return $this->hasMany(ExperienciaLaboral::class, 'id_usuario');
    }

    public function certificaciones()
    {
        return $this->hasMany(Certificacion::class, 'id_usuario');
    }

    public function referencias()
    {
        return $this->hasMany(Referencia::class, 'id_usuario');
    }

    public function documentos()
    {
        return $this->hasMany(Documento::class, 'id_usuario');
    }

    public function habilidades()
    {
        return $this->belongsToMany(Habilidad::class, 'persona_habilidad', 'id_usuario', 'id_habilidad')
                    ->withPivot('nivel');
    }

    public function idiomas()
    {
        return $this->belongsToMany(Idioma::class, 'persona_idioma', 'id_usuario', 'id_idioma')
                    ->withPivot('nivel_lectura', 'nivel_escritura', 'nivel_conversacion');
    }
}
