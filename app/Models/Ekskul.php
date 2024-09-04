<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ekskul extends Model
{
    use HasFactory;

    protected $table = 'ekskul';

    protected $fillable = [
        'id_user',
        'alternatif',
        'minat',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
