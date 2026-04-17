<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Educacion extends Model {
    protected $table = 'educacion';
    protected $primaryKey = 'id_educacion';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'nivel', 'institucion', 'titulo', 'area_estudio', 'fecha_inicio', 'fecha_fin', 'estado'];
    public function usuario() { return $this->belongsTo(Usuario::class, 'id_usuario'); }
}
