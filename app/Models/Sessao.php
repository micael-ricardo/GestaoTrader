<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sessao extends Model
{
    use HasFactory;

    protected $fillable = [
        'usucod',
        'data',
        'saldo_inicial',
        'meta',
        'limite_perda',
    ];
}
