<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aplus extends Model
{
    use HasFactory;

    protected $table = 'aplus';

    protected $fillable = [
        'id_user',
        'minat',
        'pengalaman',
        'bakat',
        'prestasi',
    ];
}
