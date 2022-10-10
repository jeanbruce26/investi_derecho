<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Convocatoria extends Model
{
    use HasFactory;

    protected $primaryKey = "convocatoria_id";

    protected $table = 'convocatoria';
    protected $fillable = [
        'convocatoria_id',
        'convocatoria',
        'convocatoria_estado',
    ];

    public $timestamps = false;
}
