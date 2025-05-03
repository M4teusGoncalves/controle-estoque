@extends('layouts.app')

@section('title', 'Detalhes do Produto')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes do Produto</h1>
        <div>
            <a href="{{ route('produtos.edit', $produto->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('produtos.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $produto->nome }}</h5>
            <p class="card-text">
                <strong>Unidade de Medida:</strong> {{ $produto->unidade_medida }}<br>
                <strong>Quantidade em Estoque:</strong> 
                <span class="{{ $produto->quantidade_estoque < $produto->quantidade_minima ? 'text-danger' : '' }}">
                    {{ $produto->quantidade_estoque }}
                </span><br>
                <strong>Quantidade Mínima:</strong> {{ $produto->quantidade_minima }}
            </p>
        </div>
    </div>

    <div class="mt-4">
        <h3>Movimentações</h3>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Data</th>
                        <th>Tipo</th>
                        <th>Quantidade</th>
                        <th>Motivo</th>
                        <th>Observação</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produto->movimentacoes as $movimentacao)
                        <tr>
                            <td>{{ $movimentacao->data->format('d/m/Y') }}</td>
                            <td>{{ $movimentacao->tipo === 'entrada' ? 'Entrada' : 'Saída' }}</td>
                            <td>{{ $movimentacao->quantidade }}</td>
                            <td>{{ $movimentacao->motivo }}</td>
                            <td>{{ $movimentacao->observacao }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection 