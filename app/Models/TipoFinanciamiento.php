<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoFinanciamiento extends Model
{
    use HasFactory;

    protected $primaryKey = "tipo_financiamiento_id";

    protected $table = 'tipo_financiamiento';
    protected $fillable = [
        'tipo_financiamiento_id',
        'tipo_financiamiento',
    ];

    public $timestamps = false;
}
