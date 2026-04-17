<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Referencia extends Model {
    protected $table = 'referencia';
    protected $primaryKey = 'id_referencia';
    public $timestamps = false;
    protected $fillable = ['id_usuario', 'nombre_referente', 'cargo', 'empresa', 'telefono', 'correo', 'tipo'];
    public function usuario() { return $this->belongsTo(Usuario::class, 'id_usuario'); }
}
