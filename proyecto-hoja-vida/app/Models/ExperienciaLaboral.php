<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ExperienciaLaboral extends Model {
    protected $table = 'experiencia_laboral';
    protected $primaryKey = 'id_experiencia';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'empresa', 'cargo', 'area', 'fecha_inicio', 'fecha_fin', 'actualmente_trabaja', 'descripcion_funciones', 'logros'];
    public function usuario() { return $this->belongsTo(Usuario::class, 'id_usuario'); }
}
