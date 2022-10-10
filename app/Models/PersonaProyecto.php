<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonaProyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "persona_proyecto_id";

    protected $table = 'persona_proyecto';
    protected $fillable = [
        'persona_proyecto_id',
        'persona_id',
        'proyecto_id',
        'participante_proyecto_id',
        'categoria_investigacion_id',
        'categoria_docente_id',
    ];

    public $timestamps = false;

    // Persona
    public function Persona(){
        return $this->belongsTo(Persona::class,
        'persona_id','persona_id');
    }

    // Proyecto
    public function Proyecto(){
        return $this->belongsTo(Proyecto::class,
        'proyecto_id','proyecto_id');
    }

    // Participante Proyecto
    public function ParticipanteProyecto(){
        return $this->belongsTo(ParticipanteProyecto::class,
        'participante_proyecto_id','participante_proyecto_id');
    }

    // Categoria Docente Investigacion
    public function CategoriaDocenteInvestigacion(){
        return $this->belongsTo(CategoriaDocenteInvestigacion::class,
        'categoria_investigacion_id','categoria_investigacion_id');
    }

    // Categoria Docente
    public function CategoriaDocente(){
        return $this->belongsTo(CategoriaDocente::class,
        'categoria_docente_id','categoria_docente_id');
    }
}
