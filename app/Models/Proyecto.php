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
}
