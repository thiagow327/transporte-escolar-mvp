<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Carteirinha extends Model
{
    protected $fillable = [
        'aluno_id',
        'data_validade',
    ];

    public function aluno()
    {
        return $this->belongsTo(Aluno::class);
    }

    public function pagamentos()
    {
        return $this->hasMany(Pagamento::class);
    }

    public function getDataValidadeFormattedAttribute()
    {
        return Carbon::parse($this->data_validade)->format('d-m-Y');
    }
}
