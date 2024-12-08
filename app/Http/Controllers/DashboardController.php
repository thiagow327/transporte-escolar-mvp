<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Carteirinha;


class DashboardController extends Controller
{
    public function index()
    {
        $mesAtual = Carbon::now()->month;
        $anoAtual = Carbon::now()->year;

        $carteirinhasEmDivida = Carteirinha::whereDoesntHave('pagamentos', function ($query) use ($mesAtual, $anoAtual) {
            $query->whereMonth('data_pagamento', $mesAtual)
                ->whereYear('data_pagamento', $anoAtual);
        })->where('vencimento_dia', '<', Carbon::now()->day)->get();

        return view('dashboard', compact('carteirinhasEmDivida'));
    }

}
