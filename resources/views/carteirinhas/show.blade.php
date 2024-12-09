<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Detalhes da Carteirinha') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="container mt-4">
                    <!-- Mensagens de Sucesso ou Erro -->
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="row">
                        <!-- Informações do Aluno (esquerda) -->
                        <div class="col-md-6">
                            <h3>Informações do Aluno</h3>
                            <div class="mb-3">
                                <p><strong>Nome:</strong> {{ $carteirinha->aluno->nome }}</p>
                                <p><strong>Data de
                                        Nascimento:</strong> {{ \Carbon\Carbon::parse($carteirinha->aluno->data_nascimento)->format('d/m/Y') }}
                                </p>
                                <p>
                                    <strong>Idade:</strong> {{ \Carbon\Carbon::parse($carteirinha->aluno->data_nascimento)->age }}
                                    anos</p>
                                <p><strong>Responsável:</strong> {{ $carteirinha->aluno->responsavel }}</p>
                                <p><strong>Contato do
                                        Responsável:</strong> {{ $carteirinha->aluno->contato_responsavel }}</p>
                                <p><strong>Endereço:</strong> {{ $carteirinha->aluno->endereco }}</p>
                            </div>
                        </div>

                        <!-- Informações da Carteirinha (direita) -->
                        <div class="col-md-6">
                            <h3>Informações da Carteirinha</h3>
                            <div class="mb-3">
                                <p><strong>Dia de Vencimento:</strong> {{ $carteirinha->vencimento_dia }}</p>
                                <p><strong>Escola:</strong> {{ $carteirinha->escola }}</p>
                                <p><strong>Horário:</strong> {{ $carteirinha->horario }}</p>
                            </div>
                        </div>
                    </div>

                    <h3 class="mt-8">Pagamentos</h3>
                    <!-- Histórico de pagamentos -->
                    @if($carteirinha->pagamentos->isEmpty())
                        <p>Nenhum pagamento registrado.</p>
                    @else
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>Valor</th>
                                <th>Data de Pagamento</th>
                                <th>Ações</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($carteirinha->pagamentos as $pagamento)
                                <tr>
                                    <td>R$ {{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                                    <td>{{ $pagamento->data_pagamento }}</td>
                                    <td>
                                        <!-- Botão de Editar -->
                                        <button class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#editPaymentModal{{ $pagamento->id }}">
                                            Editar
                                        </button>
                                        <!-- Botão de Excluir -->
                                        <form action="{{ route('pagamentos.destroy', $pagamento->id) }}" method="POST"
                                              class="d-inline"
                                              onsubmit="return confirm('Tem certeza que deseja excluir este pagamento?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                        </form>
                                    </td>
                                </tr>
                                <!-- Modal de Edição -->
                                <div class="modal fade" id="editPaymentModal{{ $pagamento->id }}" tabindex="-1"
                                     aria-labelledby="editPaymentModalLabel{{ $pagamento->id }}" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="editPaymentModalLabel{{ $pagamento->id }}">
                                                    Editar Pagamento
                                                </h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- Formulário de Edição -->
                                                <form action="{{ route('pagamentos.update', $pagamento->id) }}"
                                                      method="POST">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="mb-3">
                                                        <label for="valor" class="form-label">Valor</label>
                                                        <input type="number" step="0.01" class="form-control"
                                                               id="valor" name="valor" value="{{ $pagamento->valor }}"
                                                               required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="data_pagamento" class="form-label">Data de
                                                            Pagamento</label>
                                                        <input type="date" class="form-control" id="data_pagamento"
                                                               name="data_pagamento"
                                                               value="{{ $pagamento->data_pagamento }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="recebedor" class="form-label">Recebedor</label>
                                                        <input type="text" class="form-control" id="recebedor"
                                                               name="recebedor" value="{{ $pagamento->recebedor }}"
                                                               required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="tipo_pagamento" class="form-label">Tipo de
                                                            Pagamento</label>
                                                        <select class="form-select" id="tipo_pagamento"
                                                                name="tipo_pagamento" required>
                                                            <option value="dinheiro" {{ $pagamento->tipo_pagamento === 'dinheiro' ? 'selected' : '' }}>
                                                                Dinheiro
                                                            </option>
                                                            <option value="cartao" {{ $pagamento->tipo_pagamento === 'cartao' ? 'selected' : '' }}>
                                                                Cartão
                                                            </option>
                                                            <option value="transferencia" {{ $pagamento->tipo_pagamento === 'transferencia' ? 'selected' : '' }}>
                                                                Transferência
                                                            </option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="observacoes" class="form-label">Observações</label>
                                                        <textarea class="form-control" id="observacoes"
                                                                  name="observacoes"
                                                                  rows="3">{{ $pagamento->observacoes }}</textarea>
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            </tbody>
                        </table>
                    @endif

                    <div class="mb-3">
                        <a href="{{ route('carteirinhas.index') }}" class="btn btn-secondary mt-3">Voltar</a>
                        <button type="button" class="btn btn-success mt-3" data-bs-toggle="modal"
                                data-bs-target="#createPaymentModal">
                            Novo Pagamento
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal de Criação -->
        <div class="modal fade" id="createPaymentModal" tabindex="-1" aria-labelledby="createPaymentModalLabel"
             aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="createPaymentModalLabel">Novo Pagamento</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Formulário de criação -->
                        <form action="{{ route('pagamentos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="carteirinha_id" value="{{ $carteirinha->id }}">
                            <div class="mb-3">
                                <label for="valor" class="form-label">Valor</label>
                                <input type="number" step="0.01" class="form-control" id="valor" name="valor"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="data_pagamento" class="form-label">Data de Pagamento</label>
                                <input type="date" class="form-control" id="data_pagamento" name="data_pagamento"
                                       required>
                            </div>
                            <div class="mb-3">
                                <label for="recebedor" class="form-label">Recebedor</label>
                                <input type="text" class="form-control" id="recebedor" name="recebedor" required>
                            </div>
                            <div class="mb-3">
                                <label for="tipo_pagamento" class="form-label">Tipo de Pagamento</label>
                                <select class="form-select" id="tipo_pagamento" name="tipo_pagamento" required>
                                    <option value="pix">Pix</option>
                                    <option value="dinheiro">Dinheiro</option>
                                    <option value="cartao_debito">Cartão de Débito</option>
                                    <option value="cartao_credito">Cartão de Crédito</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="observacoes" class="form-label">Observações</label>
                                <textarea class="form-control" id="observacoes" name="observacoes"
                                          rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Salvar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
