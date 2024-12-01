<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    protected $fillable = [
        'carteirinha_id',
        'valor',
        'data_pagamento',
        'tipo_pagamento',
        'recebedor',
        'observacoes',
    ];

    public function carteirinha()
    {
        return $this->belongsTo(Carteirinha::class);
    }
}
