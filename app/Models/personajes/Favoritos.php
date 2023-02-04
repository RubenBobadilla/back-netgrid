<?php

namespace App\Models\personajes;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favoritos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario', 'ref_api'
    ];
}
