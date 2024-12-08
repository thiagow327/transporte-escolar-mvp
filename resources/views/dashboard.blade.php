<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Painel') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <h2>Carteirinhas em Dívida</h2>
                    @if($carteirinhasEmDivida->isEmpty())
                        <p>Nenhuma carteirinha em dívida.</p>
                    @else
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Nome do Aluno</th>
                                <th>Escola</th>
                                <th>Vencimento</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carteirinhasEmDivida as $carteirinha)
                                <tr>
                                    <td>{{ $carteirinha->aluno->nome }}</td>
                                    <td>{{ $carteirinha->escola }}</td>
                                    <td>{{ $carteirinha->vencimento_dia }}</td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
