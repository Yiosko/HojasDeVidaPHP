<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Idioma extends Model {
    protected $table = 'idioma';
    protected $primaryKey = 'id_idioma';
    public $timestamps = false;
    protected $fillable = ['nombre_idioma'];
    public function usuarios() {
        return $this->belongsToMany(Usuario::class, 'persona_idioma', 'id_idioma', 'id_usuario')
                    ->withPivot('nivel_lectura', 'nivel_escritura', 'nivel_conversacion');
    }
}
