<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $primaryKey = "categoria_id";

    protected $table = 'categoria';
    protected $fillable = [
        'categoria_id',
        'categoria'
    ];

    public $timestamps = false;
}
