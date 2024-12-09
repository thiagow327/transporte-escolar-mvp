<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Carteirinha extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'aluno_id',
        'vencimento_dia',
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
}
