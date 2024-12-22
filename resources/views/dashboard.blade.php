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
                                <th>Horário</th>
                                <th>Responsável</th>
                                <th>Contato do Responsável</th>
                                <th>Vencimento</th>
                                <th>Ação</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carteirinhasEmDivida as $carteirinha)
                                <tr>
                                    <td>{{ $carteirinha->aluno->nome }}</td>
                                    <td>{{ $carteirinha->escola }}</td>
                                    <td>{{ $carteirinha->horario }}</td>
                                    <td>{{ $carteirinha->aluno->responsavel }}</td>
                                    <td>{{ $carteirinha->aluno->contato_responsavel }}</td>
                                    <td>{{ $carteirinha->vencimento_dia }}</td>
                                    <td>
                                        @if($carteirinha->aluno->contato_responsavel)
                                            <a href="https://wa.me/+55{{ $carteirinha->aluno->contato_responsavel }}?text={{ urlencode("Olá, vi que a carteirinha do(a) aluno(a) {$carteirinha->aluno->nome} venceu no dia {$carteirinha->vencimento_dia} e *não identificamos o pagamento*. Poderia verificar, por favor?\n\nAtenciosamente,\nTio Nilson | Tia Claudia | Tio Jean") }}"
                                               target="_blank"
                                               class="text-success">
                                                <i class="bi bi-whatsapp" style="font-size: 1.5rem;"></i>
                                            </a>
                                        @else
                                            <span class="text-muted">Sem contato</span>
                                        @endif
                                    </td>
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
