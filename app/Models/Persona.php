<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    use HasFactory;

    protected $primaryKey = "persona_id";

    protected $table = 'persona';
    protected $fillable = [
        'persona_id',
        'tipo_documento_id',
        'persona_numero_documento',
        'persona_nombres',
        'persona_apellidos',
        'persona_sexo',
        'persona_correo',
        'persona_celular',
        'persona_grado',
    ];

    public $timestamps = false;

    // Tipo Documento
    public function TipoDocumento(){
        return $this->belongsTo(TipoDocumento::class,
        'tipo_documento_id','tipo_documento_id');
    }


}
