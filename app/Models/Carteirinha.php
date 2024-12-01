<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carteirinha extends Model
{
    protected $fillable = [
        'aluno_id',
        'vencimento_dia',
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
