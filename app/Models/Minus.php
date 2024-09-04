<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Minus extends Model
{
    use HasFactory;

    protected $table ='minus';

    protected $fillable = [
        'id_user',
        'alternatif',
        'hasil',
    ];
}
