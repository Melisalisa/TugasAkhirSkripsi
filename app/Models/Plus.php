<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Plus extends Model
{
    use HasFactory;

    protected $table ='plus';

    protected $fillable = [
        'id_user',
        'alternatif',
        'hasil',
    ];
}
