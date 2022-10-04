<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ParticipanteProyecto extends Model
{
    use HasFactory;

    protected $primaryKey = "participante_proyecto_id";

    protected $table = 'participante_proyecto';
    protected $fillable = [
        'participante_proyecto_id',
        'participante_proyecto'
    ];

    public $timestamps = false;
}
