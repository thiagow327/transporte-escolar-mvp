<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

class Carteirinha extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'aluno_id',
        'vencimento_dia',
        'escola',
        'horario',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function statusPagamento()
    {
        $currentMonth = Carbon::now()->format('Y-m-01');
        $pagamentos = $this->pagamentos()->where('data_pagamento', '>=', $currentMonth)
            ->where('data_pagamento', '<', Carbon::now()->addMonth()->format('Y-m-01'))
            ->count();

        return $pagamentos > 0 ? 'Em dia' : 'Pendente';
    }
}
