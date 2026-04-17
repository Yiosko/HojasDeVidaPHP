<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model {
    protected $table = 'certificacion';
    protected $primaryKey = 'id_certificacion';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'nombre_certificacion', 'institucion', 'fecha_obtencion'];
    public function usuario() { return $this->belongsTo(Usuario::class, 'id_usuario'); }
}
