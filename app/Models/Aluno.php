<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Aluno extends Model
{
    use SoftDeletes;

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
