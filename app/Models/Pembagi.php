<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembagi extends Model
{
    use HasFactory;

    protected $table = 'pembagi';

    protected $fillable = [
        'id_user',
        'alternatif',
        'minat',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
