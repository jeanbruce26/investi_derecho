<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publicacion extends Model
{
    use HasFactory;

    protected $primaryKey = "publicacion_id";

    protected $table = 'publicacion';
    protected $fillable = [
        'publicacion_id',
        'publicacion_fecha',
        'revista_id',
        'revista_observacion',
        'proyecto_id',
    ];

    public $timestamps = false;

    // Proyecto
    public function Proyecto(){
        return $this->belongsTo(Proyecto::class,
        'proyecto_id','proyecto_id');
    }

    // Revista
    public function Revista(){
        return $this->belongsTo(Revista::class,
        'revista_id','revista_id');
    }
}
