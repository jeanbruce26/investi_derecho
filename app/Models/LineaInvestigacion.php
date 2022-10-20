<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LineaInvestigacion extends Model
{
    use HasFactory;

    protected $primaryKey = "lineas_investigacion_id";

    protected $table = 'lineas_investigacion';
    protected $fillable = [
        'lineas_investigacion_id',
        'lineas_investigacion',
    ];

    public $timestamps = false;
}
