@extends('layouts.app')

@section('title', 'Detalhes da Movimentação')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1>Detalhes da Movimentação</h1>
        <div>
            <a href="{{ route('movimentacoes.edit', $movimentacao->id) }}" class="btn btn-warning">Editar</a>
            <a href="{{ route('movimentacoes.index') }}" class="btn btn-secondary">Voltar</a>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Movimentação #{{ $movimentacao->id }}</h5>
            <p class="card-text">
                <strong>Produto:</strong> {{ $movimentacao->produto->nome }}<br>
                <strong>Tipo:</strong> {{ $movimentacao->tipo === 'entrada' ? 'Entrada' : 'Saída' }}<br>
                <strong>Quantidade:</strong> {{ $movimentacao->quantidade }} {{ $movimentacao->produto->unidade_medida }}<br>
                <strong>Data:</strong> {{ $movimentacao->data->format('d/m/Y') }}<br>
                <strong>Motivo:</strong> {{ $movimentacao->motivo ?? 'Não informado' }}<br>
                <strong>Observação:</strong> {{ $movimentacao->observacao ?? 'Não informada' }}
            </p>
        </div>
    </div>

    <div class="mt-4">
        <h3>Produto</h3>
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $movimentacao->produto->nome }}</h5>
                <p class="card-text">
                    <strong>Unidade de Medida:</strong> {{ $movimentacao->produto->unidade_medida }}<br>
                    <strong>Quantidade em Estoque:</strong> 
                    <span class="{{ $movimentacao->produto->quantidade_estoque < $movimentacao->produto->quantidade_minima ? 'text-danger' : '' }}">
                        {{ $movimentacao->produto->quantidade_estoque }}
                    </span><br>
                    <strong>Quantidade Mínima:</strong> {{ $movimentacao->produto->quantidade_minima }}
                </p>
            </div>
        </div>
    </div>
@endsection 