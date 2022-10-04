<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaDocente extends Model
{
    use HasFactory;

    protected $primaryKey = "categoria_docente_id";

    protected $table = 'categoria_docente';
    protected $fillable = [
        'categoria_docente_id',
        'categoria_docente'
    ];

    public $timestamps = false;
}
