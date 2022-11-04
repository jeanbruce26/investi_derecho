<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "proyecto_id";

    protected $table = 'proyecto';
    protected $fillable = [
        'proyecto_id',
        'proyecto_titulo',
        'proyecto_resumen',
        'proyecto_estado',
        'categoria_proyecto_id',
        'tipo_financiamiento_id',
        'proyecto_financiamiento',
        'proyecto_monto',
        'proyecto_fecha_presentacion',
        'proyecto_fecha_fin',
        'convocatoria_id',
        'proyecto_curso',
        'proyecto_semestre',
        'lineas_investigacion_id',
        'proyecto_semillero',
    ];

    public $timestamps = false;

    // Categoria Proyecto
    public function CategoriaProyecto(){
        return $this->belongsTo(CategoriaProyecto::class,
        'categoria_proyecto_id','categoria_proyecto_id');
    }

    // Tipo Financiamiento
    public function TipoFinanciamiento(){
        return $this->belongsTo(TipoFinanciamiento::class,
        'tipo_financiamiento_id','tipo_financiamiento_id');
    }

    // Convocatoria
    public function Convocatoria(){
        return $this->belongsTo(Convocatoria::class,
        'convocatoria_id','convocatoria_id');
    }

    // LineaInvestigacion
    public function LineaInvestigacion(){
        return $this->belongsTo(LineaInvestigacion::class,
        'lineas_investigacion_id','lineas_investigacion_id');
    }
}
