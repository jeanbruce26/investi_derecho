<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDocenteInvestigacion extends Model
{
    use HasFactory;

    protected $primaryKey = "categoria_investigacion_id";

    protected $table = 'categoria_docente_investigacion';
    protected $fillable = [
        'categoria_investigacion_id',
        'categoria_investigacion'
    ];

    public $timestamps = false;
}
