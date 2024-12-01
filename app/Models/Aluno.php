<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    public function carteirinha()
    {
        return $this->hasOne(Carteirinha::class);
    }
}
