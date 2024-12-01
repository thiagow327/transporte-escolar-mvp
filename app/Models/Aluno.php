<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'responsavel',
        'contato_responsavel',
    ];

    public function carteirinha()
    {
        return $this->hasOne(Carteirinha::class);
    }
}
