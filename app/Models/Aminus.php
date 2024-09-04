<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aminus extends Model
{
    use HasFactory;

    protected $table = 'aminus';

    protected $fillable = [
        'id_user',
        'minat',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
