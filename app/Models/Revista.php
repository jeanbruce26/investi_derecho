<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Revista extends Model
{
    use HasFactory;

    protected $primaryKey = "revista_id";

    protected $table = 'revista';
    protected $fillable = [
        'revista_id',
        'revista'
    ];

    public $timestamps = false;
}
