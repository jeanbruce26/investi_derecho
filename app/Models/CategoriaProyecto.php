<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaProyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "categoria_proyecto_id";

    protected $table = 'categoria_proyecto';
    protected $fillable = [
        'categoria_proyecto_id',
        'categoria_proyecto',
        'categoria_proyecto_estado',
    ];

    public $timestamps = false;
}
