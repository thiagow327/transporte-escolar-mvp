<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pagamento extends Model
{
    use SoftDeletes;

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

    public function getDataPagamentoFormattedAttribute()
    {
        return Carbon::parse($this->data_pagamento)->format('d-m-Y');
    }
}
