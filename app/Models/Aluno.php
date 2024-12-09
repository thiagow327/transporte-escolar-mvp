<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'data_nascimento',
        'responsavel',
        'contato_responsavel',
        'endereco',
    ];

    public function getIdadeAttribute()
    {
        return \Carbon\Carbon::parse($this->data_nascimento)->age;
    }

    public function carteirinha()
    {
        return $this->hasOne(Carteirinha::class);
    }
}
