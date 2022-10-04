<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $primaryKey = "tipo_documento_id";

    protected $table = 'tipo_documento';
    protected $fillable = [
        'tipo_documento_id',
        'tipo_documento'
    ];

    public $timestamps = false;
}
