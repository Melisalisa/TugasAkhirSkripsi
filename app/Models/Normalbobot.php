<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Normalbobot extends Model
{
    use HasFactory;

    protected $table = 'normalbobot';

    protected $fillable = [
        'id_user',
        'alternatif',
        'minat',
        'waktu',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
