<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pagamento extends Model
{
    public function carteirinha()
    {
        return $this->belongsTo(Carteirinha::class);
    }
}
