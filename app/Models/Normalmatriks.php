<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalmatriks extends Model
{
    use HasFactory;

    protected $table = 'normalmatriks';

    protected $fillable = [
        'id_user',
        'alternatif',
        'minat',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
