<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Documento extends Model {
    protected $table = 'documento';
    protected $primaryKey = 'id_documento';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'tipo_documento', 'url_archivo', 'fecha_subida'];
    public function usuario() { return $this->belongsTo(Usuario::class, 'id_usuario'); }
}
