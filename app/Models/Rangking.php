<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rangking extends Model
{
    use HasFactory;

    protected $table = 'rangking';

    protected $fillable = [
        'id_user',
        'alternatif',
        'hasil',
    ];
}
